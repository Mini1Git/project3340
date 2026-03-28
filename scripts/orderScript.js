/**
 *
 *
 * @param {Array} orders - A list of orders, in this case
 * this function provides orders from orders.json
 * 
 */
async function fetchOrders(orders){
    
    const ordersBox = document.querySelector(".orders");
    if (!ordersBox) return console.error('No .orders element found');
    const ordersList = document.createElement("ul");
    ordersList.className = "orders-list";
    
    fetch(orders) //fetching from the json
    .then(response => response.json())
    .then(json => {
        // For every individual order
        json.forEach(order =>{
            // Create a list item
            const listitem = document.createElement("li");
            listitem.className = "order-item";

            const anchor = document.createElement("a");
            anchor.className = "order-link";
            anchor.href = "../services/orders.html"; // temporary link

            const imgWrap = document.createElement("div");
            imgWrap.className = "order-image-wrap";
            const image = document.createElement("img");
            image.className = "order-image";
            image.src = order["img_path"];
            image.alt = order["business_name"];
            imgWrap.appendChild(image);

            const info = document.createElement("div");
            info.className = "order-info";

            const busName = document.createElement("h3");
            busName.className = "order-name";
            busName.textContent = order["business_name"];
            info.appendChild(busName);

            const orderDate = document.createElement("span");
            orderDate.className = "order-date";
            orderDate.textContent = order["order_date"];
            info.appendChild(orderDate);

            const orderId = document.createElement("span");
            orderId.className = "order-id";
            orderId.textContent = `Order #${order["order_id"]}`;
            info.appendChild(orderId);

            const moreButton = document.createElement("a");
            moreButton.className = "order-more";
            moreButton.textContent = "View More";
            moreButton.href = `../services/order-details.html?id=${order["order_id"]}`;
            info.appendChild(moreButton);

            anchor.appendChild(imgWrap);
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