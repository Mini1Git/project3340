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