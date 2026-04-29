console.log("placeOrder.js loaded successfully");

// Address API functionality removed - file not found


// now we got to take care of card number, expiration, security code?
console.log(JSON.parse(sessionStorage.getItem("cart")));
console.log("loadeded");




const form = document.getElementById("order");

console.log("Form element:", form);

if (form) {
    console.log("Attaching submit event listener");
    form.addEventListener('submit', function (event) {
        console.log("Form submit event triggered");
        event.preventDefault();

        console.log("lmao SUBMITTED!");
        getItems();
        console.log("SHOULD REDIRECT NOW");
        // Removed immediate redirect
    });
} else {
    console.log("ERROR: Form with id 'order' not found!");
}
//debug purposes.
//setTimeout(getItems, 1000);

function getItems() {
    const cart = JSON.parse(sessionStorage.getItem("cart"));;


    console.log(JSON.parse(sessionStorage.getItem('total')));

    const dataSent = {
        cart: cart,
        creditCard: document.getElementById("card-num").value,
        total: JSON.parse(sessionStorage.getItem('total'))
    };


    fetch('../server/shoppingCart_backend.php', {
        method: 'POST', // Specify the method as POST
        headers: {
            'Content-Type': 'application/json', // Inform the server the body is JSON
        },
        body: JSON.stringify(dataSent), // Convert the JS object to a JSON string
    })
        .then(response => {
            // Check if the request was successful
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json(); // Parse the JSON response body
        })
        .then(data => {
            console.log('Response:', data);
            if (data.error) {
                alert('Error: ' .concat(data.error));
            } else if (data.success && data.order_id) {
                window.location.replace('../forms/order_success.php');
            } else {
                alert('Unexpected response from server');
            }
        })
        .catch((error) => {
            console.error('Error:', error); // Handle errors during the fetch operation
        });


}


