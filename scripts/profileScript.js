function formatPhoneNum(phoneNumberString) {
    const cleaned = ('' + phoneNumberString).replace(/\D/g, '');
    const match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
    return match ? `(${match[1]}) ${match[2]}-${match[3]}` : phoneNumberString;
}

async function fetchUserProfile() {
    try {
        const response = await fetch("../server/resolve_profile.php");
        const userData = await response.json();

        document.querySelector('#profile-name').textContent = userData.name;
        document.querySelector('#profile-email').textContent = userData.email;

        document.querySelector('#profile-phone').textContent = formatPhoneNum(userData.phone_number);

        const addressInput = document.querySelector('#profile-address');
        addressInput.value = userData.address || "";
    } catch (e) {
        console.error("Profile fetch error:", e);
    }
}


const input = document.getElementById("profile-address");
let debounceTimer;

input.addEventListener("input", () => {
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {
        handleAutocomplete(input.value);
    }, 250);
});

async function handleAutocomplete(query) {
    closeAllLists();

    if (query.length < 3) return;

    const url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(query)}&filter=rect:-83.1,42.2,-82.9,42.35&format=json&apiKey=db26106f97f14ae684d957547558370d`;

    try {
        const results = await fetchAddresses(url);
        renderSuggestions(results, query);
    } catch (err) {
        console.error("Autocomplete error:", err);
    }
}

async function fetchAddresses(url) {
    const response = await fetch(url);
    const data = await response.json();

    if (!data.results) return [];

    return data.results.map(r =>
        r.formatted.replace(/[,']/g, "")
    );
}

function renderSuggestions(list, query) {
    const container = document.createElement("div");
    container.setAttribute("class", "autocomplete-items");
    container.setAttribute("id", "autocomplete-list");

    input.parentNode.appendChild(container);

    if (!list.length) {
        const item = document.createElement("div");
        item.textContent = "No results found";
        item.classList.add("no-results");
        container.appendChild(item);
        return;
    }

    list.forEach(address => {
        if (!address.toLowerCase().includes(query.toLowerCase())) return;

        const item = document.createElement("div");

        const index = address.toLowerCase().indexOf(query.toLowerCase());
        if (index !== -1) {
            item.innerHTML =
                address.substring(0, index) +
                "<strong>" +
                address.substring(index, index + query.length) +
                "</strong>" +
                address.substring(index + query.length);
        } else {
            item.textContent = address;
        }

        item.addEventListener("click", () => {
            input.value = address;
            closeAllLists();
        });

        container.appendChild(item);
    });
}


function closeAllLists() {
    const items = document.querySelectorAll(".autocomplete-items");
    items.forEach(el => el.remove());
}

document.addEventListener("click", (e) => {
    if (e.target !== input) {
        closeAllLists();
    }
});


document.getElementById("save-address-btn")
.addEventListener("click", async () => {
    const address = input.value;

    try {
        await fetch("../server/update_address.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({address})
        });

        console.log("Address saved!");
    } catch (err) {
        console.error("Save failed:", err);
    }
});


window.onload = fetchUserProfile;