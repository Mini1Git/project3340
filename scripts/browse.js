import { autocomplete } from '../temp/autocomplete.js';

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

        fetch(`../server/browseBackend.php?query=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                // data.results contains array of search results
                const results = data.results || [];
                browseBox.innerHTML = "";

                results.forEach(item => {
                    const div = document.createElement("div");
                    div.style.cssText = "color: black; background-color: red; border: 1px solid black; padding: 10px; margin: 5px;";

                    div.innerHTML = `<strong>${item.product}</strong>`;

                    const cross = document.createElement('span');
                    cross.textContent = '+';
                    cross.style.cssText = "display: flex; justify-content: center; align-items: center; height: 65px; font-size: 50px; cursor: pointer;";

                    cross.addEventListener('click', () => {
                        // fetch full product info by productID
                        fetch(`../server/browseBackend.php?productID=${item.id}`)
                            .then(res => res.json())
                            .then(productDetails => {
                                const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                                cart.push(productDetails);
                                sessionStorage.setItem('cart', JSON.stringify(cart));
                                alert(`${productDetails.product_name} has been added to your cart!`);
                            });
                    });

                    div.appendChild(cross);
                    browseBox.appendChild(div);
                });
            })
            .catch(err => console.error(err));
    });
}