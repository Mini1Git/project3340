import { startAddressAPI } from '../temp/autocomplete.js';


startAddressAPI();
// for the address bar ^


// now we got to take care of card number, expiration, security code?
console.log(JSON.parse(sessionStorage.getItem("cart")));
console.log("loadeded");




const form = document.getElementById("order");

form.addEventListener('submit', function (event) {
    event.preventDefault();

    console.log("lmao SUBMITTED!");
    getItems();
    console.log("SHOULD REDIRECT NOW");
    window.location.replace('../services/orders.php');
});
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
            console.log('Success:', data); // Handle the successful response data

        })
        .catch((error) => {
            console.error('Error:', error); // Handle errors during the fetch operation
        });


}


