//function to render menu items
async function fetchmenu(foods) { //foods is array of food items also temp for now

    //temp
    const menu = document.querySelector(".menu");
    let imagePath = "indianfood.jpg" //hardcoded for now will change later
    let restaurant = "Be Desi";
    const image = document.createElement("img");
    image.src = imagePath;
    image.width= "400";
    const restaurantName = document.createElement("h2");
    restaurantName.textContent = restaurant;
    menu.appendChild(image);
    menu.appendChild(restaurantName);

    fetch(foods) //fetching from json now will change later
    .then(response => response.json())
    .then(json => {
        json.forEach(item =>{

        if(item["inStock"]){
            const foodcell = document.createElement("div");
            foodcell.className = "dish";
            foodcell.innerHTML =`<h3 class="dish-name">${item["product_name"]}</h3>\n<p class="details">${item["description"]}</p>`
            menu.appendChild(foodcell);
        }

        });


    });
    
    
}

window.onload = ()=> fetchmenu("tempmenu.json");