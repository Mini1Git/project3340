const ORDERS_PER_PAGE = 4;

window.addEventListener('load', () => {
    initOrders("../server/get_orders.php");
});

async function initOrders(url) {
    const ordersBox = document.querySelector(".orders");
    if (!ordersBox) return console.error("No .orders element found");

    try {
        const orders = await fetchOrders(url);

        if (!orders.length) {
            ordersBox.innerHTML = "<p>No orders found.</p>";
            return;
        }

        renderOrders(orders, ordersBox);

    } catch (err) {
        console.error(err);
        ordersBox.innerHTML = "<p>Failed to load orders.</p>";
    }
}

async function fetchOrders(url) {
    const fetchUrl = url + (url.includes('?') ? '&' : '?') + '_=' + Date.now();

    const res = await fetch(fetchUrl, { cache: 'no-store' });
    const data = await res.json();

    if (!Array.isArray(data)) {
        throw new Error("Invalid orders data");
    }

    return data;
}

function renderOrders(orders, container) {
    let currentIndex = 0;

    const list = document.createElement("ul");
    list.className = "orders-list";

    const btn = document.createElement("button");
    btn.className = "btn btn-primary long-btn";
    btn.textContent = "More orders";

    container.appendChild(list);
    container.appendChild(btn);

    function renderBatch() {
        const nextOrders = orders.slice(currentIndex, currentIndex + ORDERS_PER_PAGE);

        nextOrders.forEach(order => {
            list.appendChild(createOrderItem(order));
        });

        currentIndex += ORDERS_PER_PAGE;

        btn.style.display = currentIndex >= orders.length ? "none" : "block";
    }

    btn.addEventListener("click", renderBatch);

    renderBatch(); // initial load
}

function createOrderItem(order) {
    const li = document.createElement("li");
    li.className = "order-item";

    li.innerHTML = `
        <div class="card">
            <img src="../${order.img_path}" 
                 alt="${order.business_name}"
                 style="width: 100%; height: 10rem; object-fit: cover;">

            <div class="card-body">
                <h3 class="order-name">${order.business_name}</h3>
                <p class="order-date">Ordered on ${order.order_date}</p>
                <p class="order-id">Order #${order.order_id}</p>
                <div style="width: 100%; display: flex; margin: var(--space-sm) 0;">
                    <a class="btn btn-primary long-btn" style="text-align: center;"
                    href="../services/order-details.php?id=${order.order_id}">
                    Details
                    </a>
                </div>
                
            </div>
            
        </div>
    `;

    return li;
} 