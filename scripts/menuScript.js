// Function doesn't return anything and doesn't require parameters
// Essentially builds the restaurants menu based on the restaurant id
async function fetchmenu() {
    // Select the main tag with a class attribute of 'menu'
    const menu = document.querySelector(".menu");
    // Collect search parameters
    const params = new URLSearchParams(window.location.search);
    // Assign the id parameter to a constant called id
    const id = params.get("id"); 
    // Exit this function if no id exists
    if (!id) return;

    // Try and catch based on the corresponding retrieval from php and mysql
    try {
        // Cashe refresh fix thing ---
        const baseUrl = `../server/resolve_menu.php?id=${id}`;
        
        // This line checks if the URL already has a ? and appends the timestamp
        const fetchUrl = baseUrl + (baseUrl.includes('?') ? '&' : '?') + '_=' + Date.now();
        
        // Fetch with no store to ensure the browser doesnt use an old version of the data
        const response = await fetch(fetchUrl, { cache: 'no-store' });

        // Assign the response in json form to the data constant we'll be using
        const data = await response.json();

        // Create the vendor banner
        const image = document.createElement("img");
        // Assign the image source attribute
        image.src = `../${data.vendor.image_path}`;
        // Assign the alt attribute
        image.alt = data.vendor.business_name + " banner";
        // Assign the className to banner
        image.className = "banner";
        // Append this image to the top of the menu container
        menu.appendChild(image);

        // Create an h2 to hold the restaurant name
        const restaurantName = document.createElement("h2");
        // Grab the business name and assign it to the h2 text content
        restaurantName.textContent = data.vendor.business_name;
        // Append this text right below the banner
        menu.appendChild(restaurantName);

        // Product container, this contains all of the products
        const dishesContainer = document.createElement("div");
        // Assign the className to dishes
        dishesContainer.className = "dishes";
        // Append this container to the menu container
        menu.appendChild(dishesContainer);

        // Loop through each product retrieved with the vendor
        data.products.forEach(item => {
            // If the instock attribute is 0, don't append to the container
            if(item.instock > 0){
                // Create a container for the product
                const foodcell = document.createElement("div");
                // Assign the className as dish
                foodcell.className = "dish";
                // Assign the following innnerHTML
                foodcell.innerHTML = `
                    <h3 class="dish-name">${item.product_name}</h3>
                    <p class="details">${item.description}</p>
                    <p class="price">$${item.price}</p>
                `;
                const add =  document.createElement('button');
                add.className = "add-btn";
                add.ariaLabel = "Add item";
                add.textContent ='+';
                //<button class= aria-label=>+</button> 

                add.addEventListener('click', () =>{
                   const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                   cart.push(item);
                   console.log();
                   sessionStorage.setItem('cart', JSON.stringify(cart));
                   alert(`${item.product_name} has been added to your cart!`);
                   console.log('pushed');
                    //the function of putting it inside cart
                })
                foodcell.appendChild(add);
            

                // Append this product container to the dishes container
                dishesContainer.appendChild(foodcell);
            }
        });

    } catch (e) {
        // Catch any error and display
        console.error("Error fetching menu:", e);
    }
}

// Initiate this function as soon as the window loads
window.onload = fetchmenu;