//rules for password in forms
const eye = document.querySelector(".eye");
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