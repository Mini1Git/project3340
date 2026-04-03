const toggleBtn = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");
const mobileNav = document.querySelector(".mobile-nav");
const headerNav = document.querySelector(".header");

toggleBtn.addEventListener("click", () => {
    if (window.innerWidth > 768) {
        sidebar.classList.toggle("hidden");
    } else {
        mobileNav.classList.toggle("hidden");
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