async function fetchRestaurant() {
    const backendUrl = "../server/frontPageRestaurantBackend.php";

    // appends a unique timestamp to the URL
    const fetchUrl = backendUrl + (backendUrl.includes('?') ? '&' : '?') + '_=' + Date.now();
    
    try {
        // Fetch the data while explicitly telling the browser NOT to store or use a cache
        const response = await fetch(fetchUrl, { cache: 'no-store' });
        if (!response.ok) throw new Error('Network response was not ok');
        
        const jsonData = await response.json();
        const restaurantBox = document.querySelector(".restaurant");

        // Clear existing list to prevent duplicates on refresh
        restaurantBox.innerHTML = ''; 
        const restaurantList = document.createElement("ul");

        let limit = 12;
        let count = 0;
        jsonData.forEach(restaurant => {
            count++;
            if (count <= limit) {
                console.log(count);
                const listitem = document.createElement("li");
                const anchor = document.createElement("a");
                anchor.href = `../services/menu.php?id=${restaurant["restaurant_id"]}`; //adding it temporariliy like this

                const image = document.createElement("img");
                image.src = `../${restaurant["image_path"]}`;
                image.alt = restaurant["business_name"];
                anchor.appendChild(image);

                const info = document.createElement("div");
                info.className = "info";
                const icon = document.createElement("i");
                icon.classList.add("fa-solid", "fa-star");
                info.appendChild(icon);

                const rateCuisne = document.createElement("span");
                rateCuisne.textContent = restaurant["rating"] + " | " + restaurant["cuisine_name"];
                info.appendChild(rateCuisne);

                const address = document.createElement("address");
                address.textContent = restaurant["address"];

                info.appendChild(address);

                const name = document.createElement("h3");
                name.textContent = restaurant["business_name"];

                info.appendChild(name);

                anchor.appendChild(info);
                listitem.appendChild(anchor);
                restaurantList.appendChild(listitem);

            }
        });
        restaurantBox.appendChild(restaurantList); //append at end.
    } catch (error){
        console.error("fetchRestaurant Error:", error);
    }
}

window.addEventListener('load', fetchRestaurant);
