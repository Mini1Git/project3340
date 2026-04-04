/*
Fetch and render favouriterestaurants
 */
async function fetchFavourites(favesUrl) {
    const favouritesBox = document.querySelector(".orders");
    if (!favouritesBox) return console.error('No .orders element found');

    const favouritesList = document.createElement("ul");
    favouritesList.className = "favourites-list";

    try { //hard refresh each time to avoid caching issues during development
        
        const response = await fetch(favesUrl, { cache: 'no-store' });
        const json = await response.json();
        console.debug('fetchFavourites: received favourites array length', Array.isArray(json) ? json.length : typeof json);
        //debug message to verify data structure

        if (!Array.isArray(json) || json.length === 0) {
            const p = document.createElement('p');
            p.textContent = 'No favourites found.';
            favouritesBox.appendChild(p);
            return;
        }

    // Loop through the Top 4 restaurants
        json.forEach(fav => {
            const listitem = document.createElement("li");
            listitem.className = "favourite-item";

            const anchor = document.createElement("a");
            anchor.className = "favourite-link";
            //link to that restaurant menu
            anchor.href = `../services/menu.php?id=${fav["restaurant_id"]}`;

            // Image Section
            const imgWrap = document.createElement("div");
            imgWrap.className = "order-image-wrap";
            const image = document.createElement("img");
            image.className = "order-image";
            image.src = "../" + fav["img_path"];
            image.alt = fav["business_name"];
            imgWrap.appendChild(image);

            // Text Info Section
            const info = document.createElement("div");
            info.className = "order-info";

            const busName = document.createElement("h3");
            busName.className = "order-name";
            busName.textContent = fav["business_name"];
            info.appendChild(busName);

            const orderStats = document.createElement("span");
            orderStats.className = "order-date";
            orderStats.textContent = `You've ordered here ${fav["order_count"]} times!`;
            info.appendChild(orderStats);

            const viewMenuButton = document.createElement("a");
            viewMenuButton.className = "order-more";
            viewMenuButton.textContent = "View Menu";
            viewMenuButton.href = `../services/menu.php?id=${fav["restaurant_id"]}`;
            info.appendChild(viewMenuButton);

            anchor.appendChild(imgWrap);
            anchor.appendChild(info);
            listitem.appendChild(anchor);
            favouritesList.appendChild(listitem);
        });

        favouritesBox.appendChild(favouritesList);

    } catch (e) {
        console.error("Error loading favourites:", e);
        const p = document.createElement('p');
        p.textContent = 'Failed to load your favourites. Please try again later.';
        favouritesBox.appendChild(p);
    }
}

// Load favourites when the page finishes loading
window.addEventListener('load', () => fetchFavourites("../server/get_favourites.php"));