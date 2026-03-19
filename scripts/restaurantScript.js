async function fetchRestaurant(vendors){ //it'a json for now
    //temp 
    const restaurantBox = document.querySelector(".restaurant");
    const restaurantList = document.createElement("ul");
    
    fetch(vendors) //fetching from the json
    .then(response => response.json())
    .then(json => {
        json.forEach(restaurant =>{
            const listitem = document.createElement("li");
            const anchor = document.createElement("a");
            anchor.href = "../services/menu.html"; //adding it temporariliy like this
            
            const image = document.createElement("img");
            image.src = restaurant["img_path"];
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
        })
    })
    .catch(e => {
        console.log(e); //printing the error
    });

    restaurantBox.appendChild(restaurantList); //making the ul child of restaurant box

}

window.onload = ()=> fetchRestaurant("/scripts/restaurant.json");