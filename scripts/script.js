/*const hamMenu = document.querySelector('.ham');
const hamImg = document.querySelector('.ham img');
const offscreenMenu = document.querySelector('.offscreen-menu');


hamMenu.addEventListener('click', () => { 
    hamMenu.classList.toggle("active");
    offscreenMenu.classList.toggle('active');
    // also toggle a class on the content wrapper so layout can adjust
    const contentWrap = document.querySelector('.content');
    if (contentWrap) contentWrap.classList.toggle('nav-hidden');
    
    // Toggle between hamburger.svg and circle_x.svg
    // On wide screens we always show the hamburger icon
    if (window.innerWidth >= 768) {
        hamImg.src = '../icons/hamburger.svg';
    } else {
        if (hamMenu.classList.contains('active')) {
            hamImg.src = '../icons/circle_x.svg';
        } else {
            hamImg.src = '../icons/hamburger.svg';
        }
    }
});
*/

const toggleBtn = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");

toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("hidden");
});


// Settings menu click and keydown events
const settingsX = document.querySelector(".settings-menu-window .fa-x");
const settingsMenu = document.querySelector(".settings-menu-window");
const settingsBtn = document.querySelector(".settings-menu-btn");

settingsBtn.addEventListener('click', () => {
    if (settingsMenu.classList.contains("hidden")) {
        settingsMenu.classList.remove("hidden");
    }
});

settingsX.addEventListener('click', () => {
    if (!(settingsMenu.classList.contains("hidden"))) {
        settingsMenu.classList.add("hidden");
    }
});

document.addEventListener('keydown', (e) => {
    if (!(settingsMenu.classList.contains("hidden"))) {
        if (e.key === "Escape") {
            settingsMenu.classList.add("hidden");
        }
    }
    
});


document.addEventListener("DOMContentLoaded", () => {
    const savedTheme = sessionStorage.getItem("theme");
    if (savedTheme) {
        document.body.classList.add(savedTheme);
    }
});

function setTheme(theme) {
    document.body.classList.remove("theme2", "theme3");
    if (theme) {
        document.body.classList.add(theme);
        sessionStorage.setItem("theme", theme);
    } else {
        sessionStorage.removeItem("theme");
    }
}

const themeButtons = document.querySelectorAll(".theme-btn");

themeButtons.forEach(btn => {
    btn.addEventListener("click", () => {
        const theme = btn.dataset.theme;
        setTheme(theme);
    });
});