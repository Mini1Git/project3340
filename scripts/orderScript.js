/**
Fetch and render orders (4 per page).
 * @param {string} ordersUrl - URL to the orders JSON file
 */
async function fetchOrders(ordersUrl){
    const ordersBox = document.querySelector(".orders");
    if (!ordersBox) return console.error('No .orders element found');

    const ordersList = document.createElement("ul");
    ordersList.className = "orders-list";

    const moreBtn = document.createElement('button');
    moreBtn.className = 'more-orders-btn';
    moreBtn.type = 'button';
    moreBtn.textContent = 'More orders';
    moreBtn.style.display = 'none';

    try { //hard refresh each time to avoid caching issues during development
        const fetchUrl = ordersUrl + (ordersUrl.includes('?') ? '&' : '?') + '_=' + Date.now();
        console.debug('fetchOrders: fetching from', fetchUrl); //debug message to verify URL
        const response = await fetch(fetchUrl, { cache: 'no-store' });
        const json = await response.json();
        console.debug('fetchOrders: received orders array length', Array.isArray(json) ? json.length : typeof json);
        //debug message to verify data structure

        if (!Array.isArray(json) || json.length === 0) {
            const p = document.createElement('p');
            p.textContent = 'No orders found.';
            ordersBox.appendChild(p);
            return;
        }

        let currentIndex = 0;

        function renderBatch(){
            const end = Math.min(currentIndex + 4, json.length);
            console.debug('renderBatch: currentIndex', currentIndex, 'end', end, 'total', json.length);
            for (currentIndex; currentIndex < end; currentIndex++){
                const order = json[currentIndex];
                const listitem = document.createElement("li");
                listitem.className = "order-item";

                const anchor = document.createElement("a");
                anchor.className = "order-link";
                anchor.href = "../services/orders.html";

                const imgWrap = document.createElement("div");
                imgWrap.className = "order-image-wrap";
                const image = document.createElement("img");
                image.className = "order-image";
                image.src = "../" + order["img_path"];
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
                orderDate.textContent = `Ordered on ${order["order_date"]}`;
                info.appendChild(orderDate);

                const orderId = document.createElement("span");
                orderId.className = "order-id";
                orderId.textContent = `Order #${order["order_id"]}`;
                info.appendChild(orderId);

                const moreButton = document.createElement("a");
                moreButton.className = "order-more";
                moreButton.textContent = "Details";
                moreButton.href = `../services/order-details.php?id=${order["order_id"]}`;
                info.appendChild(moreButton);

                anchor.appendChild(imgWrap);
                anchor.appendChild(info);
                listitem.appendChild(anchor);
                ordersList.appendChild(listitem);
            }

            currentIndex = end;
            if (currentIndex >= json.length) {
                //debug message to verify if all items have been rendered
                console.debug('renderBatch: all items rendered, hiding moreBtn');
                moreBtn.style.display = 'none';
            } else {
                //debug message to verify if more items are available
                console.debug('renderBatch: more items available, showing moreBtn');
                moreBtn.style.display = 'block';
            }
        }

        ordersBox.appendChild(ordersList);
        ordersBox.appendChild(moreBtn);

        moreBtn.addEventListener('click', renderBatch);

        // render first batch
        renderBatch();

    } catch (e) {
        console.error(e);
        const p = document.createElement('p');
        p.textContent = 'Failed to load orders.';
        ordersBox.appendChild(p);
    }
}

window.addEventListener('load', () => fetchOrders("../server/get_orders.php"));