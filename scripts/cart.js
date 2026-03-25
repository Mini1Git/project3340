const cart = sessionStorage.getItem('cart') || [];
console.log(cart);
let total = sessionStorage.getItem('total') || 0; 
if(cart.length === 0){
    //if cart is empty
}
else{
    create_cart()
}

function create_cart(){

}