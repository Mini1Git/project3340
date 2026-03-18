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
            image.src = order["img_path"];
            image.alt = order["business_name"];
            anchor.appendChild(image);

            const info = document.createElement("div");
            info.className = "info";

            const busName = document.createElement("h3");
            busName.textContent = order["business_name"];
            info.appendChild(busName);

            const orderDate = document.createElement("span");
            orderDate.textContent = order["order_date"];

            info.appendChild(orderDate);

            const orderId = document.createElement("span");
            orderId.textContent = order["order_id"];

            info.appendChild(orderId);

            anchor.appendChild(info);
            listitem.appendChild(anchor);
            ordersList.appendChild(listitem);
        })
    })
    .catch(e => {
        console.log(e); //printing the error
    });

    ordersBox.appendChild(ordersList); //making the ul child of orders box

}

window.addEventListener('load', () => fetchOrders("../scripts/orders.json"));