import { autocomplete } from '../scripts/autocomplete.js';

let autoCompleteList = [];

// Fetch all results for autocomplete
fetch('../server/browseBackend.php') // no query = all products
    .then(res => res.json())
    .then(data => {
        // data.results contains array of objects {name, cuisine, product, id}
        autoCompleteList = data.results.flatMap(item => [
            item.product,
            item.name,
            item.cuisine
        ]).filter(Boolean);
        autoCompleteList = [...new Set(autoCompleteList)];
    });

let timer;
document.getElementById("searchbox").addEventListener("input", function () {
    clearTimeout(timer);
    timer = setTimeout(() => {
        autocomplete(document.getElementById("searchbox"), autoCompleteList);
    }, 200);
});


const browseBox = document.querySelector('.searchResults');
if (browseBox) {
    getSearchResults();
}

function getSearchResults() {
    document.getElementById("search").addEventListener("submit", function (e) {
        e.preventDefault();

        const query = document.getElementById("searchbox").value;

        browseBox.innerHTML = "<p>Loading...</p>";

        fetch(`../server/browseBackend.php?query=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                const results = data.results || [];
                browseBox.innerHTML = "";

                if (results.length === 0) {
                    browseBox.innerHTML = "<p>No results found.</p>";
                    return;
                }

                results.forEach(item => {
                    const image = item.image && item.image.trim() !== ""
                        ? item.image
                        : "../images/placeholder/placeholder.png";

                    const price = item.price
                        ? `$${parseFloat(item.price).toFixed(2)}`
                        : "N/A";

                    const card = document.createElement("div");
                    card.classList.add("card");

                    card.innerHTML = `
                        <img src="../${image}" alt="${item.name}" class="card-img" style="object-fit: cover; width: 100%; height: 10rem;">

                        <div class="card-body">
                            <h3>${item.product}</h3>
                            <p style="opacity: 0.7;">${item.name}</p>
                            <p style="font-size: 0.85rem; color: var(--clr-muted);">
                                ${item.cuisine || ""}
                            </p>
                            <p class="price">${price}</p>

                            <button class="btn btn-primary long-btn">
                                Add to Cart
                            </button>
                        </div>
                    `;

                    const button = card.querySelector("button");
                    button.addEventListener('click', () => {
                        fetch(`../server/browseBackend.php?productID=${item.id}`)
                            .then(res => res.json())
                            .then(productDetails => {
                                const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                                cart.push(productDetails);
                                sessionStorage.setItem('cart', JSON.stringify(cart));

                                button.textContent = "Added!";
                                setTimeout(() => {
                                    button.textContent = "Add to Cart";
                                }, 1000);
                            });
                    });

                    browseBox.appendChild(card);
                });
            })
            .catch(err => {
                console.error(err);
                browseBox.innerHTML = "<p>Error loading results.</p>";
            });
    });
}

console.log("JS Loaded");