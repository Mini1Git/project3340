//rules for password in forms
const eye = document.querySelector(".eye");
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