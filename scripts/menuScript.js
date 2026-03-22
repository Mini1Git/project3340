async function fetchmenu() {
    const menu = document.querySelector(".menu");

    const params = new URLSearchParams(window.location.search);
    const id = params.get("id"); // this comes from the link

    if (!id) return; // exit if no ID

    try {
        const response = await fetch(`../server/resolve_menu.php?id=${id}`);
        const data = await response.json();

        // Vendor banner
        const image = document.createElement("img");
        image.src = `../${data.vendor.image_path}`;
        image.alt = data.vendor.business_name + " banner";
        image.className = "banner";
        menu.appendChild(image);

        const restaurantName = document.createElement("h2");
        restaurantName.textContent = data.vendor.business_name;
        menu.appendChild(restaurantName);

        // Dishes container
        const dishesContainer = document.createElement("div");
        dishesContainer.className = "dishes";
        menu.appendChild(dishesContainer);

        // Products
        data.products.forEach(item => {
            if(item.instock > 0){
                const foodcell = document.createElement("div");
                foodcell.className = "dish";
                foodcell.innerHTML = `
                    <h3 class="dish-name">${item.product_name}</h3>
                    <p class="details">${item.description}</p>
                    <p class="price">$${item.price}</p>
                    <button class="add-btn" aria-label="Add item">+</button>
                `;
                dishesContainer.appendChild(foodcell);
            }
        });

    } catch (e) {
        console.error("Error fetching menu:", e);
    }
}

window.onload = fetchmenu;