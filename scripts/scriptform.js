const eye = document.querySelector('.eye');
let visible = false;

eye.addEventListener('click', () => {
    const pass = document.querySelector('.password');
    if(visible === false) {
        pass.type="text";
        visible = true;
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    }
    else{
        pass.type="password";
        visible = false;
        eye.classList.add("fa-eye");
        eye.classList.remove("fa-eye-slash");
    }

});

//rule for showing total
const total = sessionStorage.getItem('total') || 0; //getting it from sesson storage
const showTotal = document.querySelector('.show-total');
if(showTotal) {
    showTotal.innerHTML =`Your Total is $${total}`;
}