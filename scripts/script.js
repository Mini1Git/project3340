const toggleBtn = document.getElementById("menu-toggle"); //menu toggle button
const sidebar = document.getElementById("sidebar"); 
const mobileNav = document.querySelector(".mobile-nav");
const headerNav = document.querySelector(".header");

toggleBtn.addEventListener("click", () => {
    if (window.innerWidth > 768) {
        sidebar.classList.toggle("hidden");
        //if width is bit we hide the siedbar
    } else { //mobile nav toggle set to hidden
        mobileNav.classList.toggle("hidden");
        //if we show the mobile nav, we set header to fixed so it stays on top of the mobile nav
        if (!mobileNav.classList.contains("hidden")) {
            headerNav.style.position = "fixed";
            headerNav.style.zIndex = "101";
        } else {
            headerNav.style.position = "static";
        }
    }
});


// Settings menu click and keydown events
const settingsX = document.querySelector(".settings-menu-window .fa-x");
const settingsMenu = document.querySelector(".settings-menu-window");
const settingsBtn = document.querySelector(".settings-menu-btn");

settingsBtn.addEventListener('click', () => { //toggle settings menu on click
    if (settingsMenu.classList.contains("hidden")) {
        settingsMenu.classList.remove("hidden");
    }
});

settingsX.addEventListener('click', () => { //close settings menu on click
    if (!(settingsMenu.classList.contains("hidden"))) {
        settingsMenu.classList.add("hidden");
    }
});

document.addEventListener('keydown', (e) => { //close settings menu on esc key
    if (!(settingsMenu.classList.contains("hidden"))) {
        if (e.key === "Escape") {
            settingsMenu.classList.add("hidden");
        }
    }
    
});

//get chosen theme from session storage so it remains consistent
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