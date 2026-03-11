const hamMenu = document.querySelector('.ham');
const hamImg = document.querySelector('.ham img');
const offscreenMenu = document.querySelector('.offscreen-menu');


hamMenu.addEventListener('click', () => { 
    hamMenu.classList.toggle("active");
    offscreenMenu.classList.toggle('active');
    
    // Toggle between hamburger.svg and circle_x.svg
    if (hamMenu.classList.contains('active')) {
        hamImg.src = './icons/circle_x.svg';
    } else {
        hamImg.src = './icons/hamburger.svg';
    }
});

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

})