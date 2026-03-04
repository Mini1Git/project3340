const hamMenu = document.querySelector('.ham');
const hamImg = document.querySelector('.ham img');
const offscreenMenu = document.querySelector('.offscreen-menu');


hamMenu.addEventListener('click', () => { 
    hamMenu.classList.toggle("active");
    offscreenMenu.classList.toggle('active');
    
    // Toggle between hamburger.svg and circle_x.svg
    if (hamMenu.classList.contains('active')) {
        hamImg.src = 'circle_x.svg';
    } else {
        hamImg.src = 'hamburger.svg';
    }
})