async function fetchOrders(orders){ //it'a json for now
    //temp 
    const ordersBox = document.querySelector(".orders");
    const ordersList = document.createElement("ul");
    
    fetch(orders) //fetching from the json
    .then(response => response.json())
    .then(json => {
        json.forEach(order =>{
            const listitem = document.createElement("li");
            const anchor = document.createElement("a");
            anchor.href = "../services/orders.html"; //adding it temporariliy like this
            
            const image = document.createElement("img");
            image.src = restaurant["img_path"];
            image.alt = restaurant["buisness_name"];
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
            name.textContent = restaurant["buisness_name"];

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