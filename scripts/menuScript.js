//function to render menu items
async function fetchmenu(foods) { //foods is array of food items also temp for now

    //temp
    const menu = document.querySelector(".menu");
    let imagePath = "../images/indianfood.jpg" //hardcoded for now will change later
    let restaurant = "Be Desi";
    const image = document.createElement("img");
    image.src = imagePath;
    image.alt = restaurant + " banner";
    image.loading = "lazy";
    image.className = "banner";
    const restaurantName = document.createElement("h2");
    restaurantName.textContent = restaurant;
    menu.appendChild(image);
    menu.appendChild(restaurantName);

    // create a container for dish cards so CSS grid can target it
    const dishesContainer = document.createElement("div");
    dishesContainer.className = "dishes";
    menu.appendChild(dishesContainer);

    fetch(foods) //fetching from json now will change later
    .then(response => response.json())
    .then(json => {
        json.forEach(item =>{

        if(item["inStock"]){
            const foodcell = document.createElement("div");
            foodcell.className = "dish";
            foodcell.innerHTML =`<h3 class=\"dish-name\">
                ${item["product_name"]}
                </h3>\n<p class=\"details\">
                ${item["description"]}
                </p>\n<button class=\"add-btn\" aria-label=\"Add item\">+</button>`
            dishesContainer.appendChild(foodcell);
        }

        });


    })
    .catch(e => {
        console.log(e); //printing the error
    });
    
}

window.onload = ()=> fetchmenu("scripts/tempmenu.json");