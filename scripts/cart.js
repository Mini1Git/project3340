const cartBox = document.querySelector('.cart-box');

if(cartBox){

    create_cart()

}


function create_cart(){
    cartBox.innerHTML =""; //emptying everything beforehand
    const cart = JSON.parse(sessionStorage.getItem("cart"));
    let total = 0;  //it'll change inside the loop


    if(cart){ //if cart not null
        cart.forEach(async item => {
            const foodCell = document.createElement('div');
            foodCell.className='food-cell';
            const cross = document.createElement('span');
            cross.textContent = '✕';
            cross.className = 'x';
            cross.addEventListener('click', ()=>{
                console.log('hello');
                remove_item(item);
            });
            foodCell.appendChild(cross);
            const food_info = document.createElement('div');

            total += Number(item.price);

            fetch('../server/vendorID.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'text/plain',
                },
                body: item.vendor_id.toString(),
            })
                .then(response => response.text())
                .then(data => {

                    console.log('Success:', data);

                    food_info.innerHTML += `Restaurant: <p style="font-size: 30px;"><strong>${data}</strong></p>`;
                    food_info.innerHTML += `
                <h3>${item.product_name}</h3>
                <p>${item.description}</p>
                <p>Price: $${item.price}</p>`;

                    foodCell.appendChild(food_info);

                    cartBox.appendChild(foodCell);
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        });
    }

    const show_total = document.createElement('h3');
    show_total.textContent= `
        Your Total is $${total.toFixed(2)}`;
    cartBox.appendChild(show_total);
    if(total !== 0 ){ //if there is something in the cart
        const order_btn = document.createElement('a');
        order_btn.className = "order-place"; // ORDER BUTTON here!
        order_btn.textContent = `Place Your Order`;
        order_btn.href = "../forms/orderform.php"
        cartBox.appendChild(order_btn);
    }
    sessionStorage.setItem('total', total.toFixed(2)); //setting the total

}

//function for removing item from the cart
function remove_item(food){
    const cart = JSON.parse(sessionStorage.getItem("cart"));
    if(cart)
    {
        const index = cart.findIndex(item =>  //finding the index
            item.product_name === food.product_name && item.description === food.description && item.price == food.price
        );
        if(index != -1)
        {
            cart.splice(index, 1); //removing from cart array
            sessionStorage.setItem("cart", JSON.stringify(cart));
        }
        create_cart()
    }
}
