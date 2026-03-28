async function fetchRestaurant() {
    const container = document.querySelector(".restaurant-list");

    // clear old content
    container.innerHTML = "";

    try {
        const response = await fetch("../server/frontPageRestaurantBackend.php");
        const data = await response.json();

        const limit = 9;

        data.slice(0, limit).forEach(restaurant => {

            // CARD
            const card = document.createElement("div");
            card.className = "card";

            // IMAGE
            const image = document.createElement("img");
            image.src = `../${restaurant.image_path}`;
            image.alt = restaurant.business_name;
            image.style.width = "100%";
            image.style.height = "10rem";
            image.style.objectFit = "cover";

            // BODY
            const body = document.createElement("div");
            body.className = "card-body";

            // NAME
            const name = document.createElement("h3");
            name.textContent = restaurant.business_name;

            // INFO
            const info = document.createElement("p");
            info.innerHTML = `<i class="fa-solid fa-star"></i> ${restaurant.rating} | ${restaurant.cuisine_name}`;

            // ADDRESS
            const address = document.createElement("p");
            address.textContent = restaurant.address;

            // LINK
            const link = document.createElement("a");
            link.href = `../services/menu.php?id=${restaurant.restaurant_id}`;
            link.style.textDecoration = "none";
            link.style.color = "inherit";

            // BUILD
            body.appendChild(name);
            body.appendChild(info);
            body.appendChild(address);

            card.appendChild(image);
            card.appendChild(body);

            link.appendChild(card);
            container.appendChild(link);
        });

    } catch (error) {
        console.error("Error fetching restaurants:", error);
    }
}

document.addEventListener("DOMContentLoaded", fetchRestaurant);