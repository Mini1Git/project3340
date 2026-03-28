//rules for password in forms
const eye = document.querySelector(".eye");
if(eye){

    let visible = false;

    eye.addEventListener('click', ()=>{
        eye.classList.toggle("active");
        const pass = document.querySelector('.password');
        if(visible===false) {
            pass.type="text";
            visible = true;
        }
        else{
            pass.type="password";
            visible = false;
        }

    });
}

//rule for showing total
const total = sessionStorage.getItem('total') || 0; //getting it from sesson storage
const showTotal = document.querySelector('.show-total');
if(showTotal){
    showTotal.innerHTML =`Your Total is $${total}`;
}