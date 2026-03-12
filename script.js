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



//theme changing logic
document.addEventListener("DOMContentLoaded", ()=> { //when page loads
    const savedTheme = localStorage.getItem("theme"); //checking what theme was saved
    if (savedTheme === "theme2") {
        applyTheme2(); //so applying 2nd theme
    }
    else if(savedTheme === "theme3") {
        applyTheme3(); //applying 3rd theme
    }
    else {

    }
});

const defaultTheme = document.querySelector("#default");
const theme2 = document.querySelector("#theme2");
const theme3 = document.querySelector("#theme3");

defaultTheme.addEventListener('click', ()=>{
    localStorage.removeItem("theme"); //removing the item
    removeAll();

});


theme2.addEventListener('click', ()=>{
   removeAll(); //removing everything
   applyTheme2();
   localStorage.setItem("theme", "theme2"); //applying theme and saving to local storage
});

theme3.addEventListener('click', ()=>{
    removeAll();
    applyTheme3();
    localStorage.setItem("theme", "theme3");
});

function applyTheme3() { //for the 2nd theme
    const headerTheme = document.querySelector("header");
    const jumboTheme = document.querySelector(".overlay");
    const onPage = document.querySelector("#on-page a");
    const jumboBrowse = document.querySelector(".jumbotron a");
    const partnerTheme = document.querySelectorAll(".partner li a");
    const menubar = document.querySelectorAll(".services li a, .partner li a, #on-page a"); //this returns a list
    const themeBar = document.querySelector("#theme-changer");
    //for the header
    if(headerTheme) {//checking to make sure the elements are not null
        headerTheme.classList.add("theme3"); 
        const signTheme = document.querySelector(".sign");
        if(signTheme)
            signTheme.classList.add("theme3");
        const login = document.querySelector(".login a");
        if(login){
            login.classList.add("theme3");
            login.classList.add("theme3-hover");
        }
    }
    //for the jumbotron
    if(jumboTheme)
        jumboTheme.style.backgroundColor = "rgba(46, 19, 136, 0.95)";
    
    
    if(partnerTheme) {
        partnerTheme.forEach (link => {
            link.classList.add("theme3");
        });
    }

    if(jumboBrowse) {
        jumboBrowse.classList.add("theme3-hover");
        jumboBrowse.classList.add("theme3");
    }

    if(menubar) {
        menubar.forEach (link => {
            link.classList.add("theme3");
        });
         menubar.forEach (link => {
            link.classList.add("theme3-hover");
        });
    }

    if(onPage){
        onPage.classList.add("theme3");
        onPage.style.color ="#fbfbfb";
    }

    themeBar.style.backgroundColor ="rgba(46, 19, 136, 0.95)";

}

function applyTheme2() { //for the dark theme
    const headerTheme = document.querySelector("header");
    const jumboTheme = document.querySelector(".overlay");
    const onPage = document.querySelector("#on-page a");
    const jumboBrowse = document.querySelector(".jumbotron a");
    const partnerTheme = document.querySelectorAll(".partner li a");
    const menubar = document.querySelectorAll(".services li a, .partner li a, #on-page a"); //this returns a list
    const themeBar = document.querySelector("#theme-changer");

    //for the header
    if(headerTheme) {//checking to make sure the elements are not null
        headerTheme.classList.add("theme2"); 
        const signTheme = document.querySelector(".sign");
        if(signTheme){
            signTheme.classList.add("theme2");
            signTheme.classList.add("theme2-hover");
        }
        const login = document.querySelector(".login a");
        if(login)
        {
            login.classList.add("theme2");
            login.classList.add("theme2-hover");
        }

        const signin = document.querySelector(".sign a");
        if(signin){
            signin.classList.add("theme2-hover");
            signin.classList.add("theme2-hover");
        }
           
    }
    if(jumboTheme)
        jumboTheme.style.backgroundColor = "#e93629da";

    if(partnerTheme) {
        partnerTheme.forEach (link => {
            link.classList.add("theme2");
        });
    }

    if(jumboBrowse) {
        jumboBrowse.classList.add("theme2-hover");
        jumboBrowse.classList.add("theme2");
    }

   if(menubar) {
        menubar.forEach (link => {
            link.classList.add("theme2");
        });
         menubar.forEach (link => {
            link.classList.add("theme2-hover");
        });
    }

    if(onPage){
        onPage.classList.add("theme2");
        onPage.style.color ="#fbfbfb";
    }


    themeBar.style.backgroundColor ="#e93729";
}

function removeAll () {
   const headerTheme = document.querySelector("header");
    const jumboTheme = document.querySelector(".overlay");
    const onPage = document.querySelector("#on-page a");
    const jumboBrowse = document.querySelector(".jumbotron a");
    const partnerTheme = document.querySelectorAll(".partner li a");
    const menubar = document.querySelectorAll(".services li a, .partner li a"); //this returns a list
    const themeBar = document.querySelector("#theme-changer");
    //for the header
    if(headerTheme) {//making eveything empty
        headerTheme.classList.remove("theme2", "theme3");
        const signTheme = document.querySelector(".sign");
        if(signTheme)
           signTheme.classList.remove("theme2", "theme3", "theme2-hover");
        const login = document.querySelector(".login a");
        if(login)
            login.classList.remove("theme2", "theme3", "theme2-hover", "theme3-hover");
        const signin = document.querySelector(".sign a");
        if(signin){
            signin.classList.remove("theme2-hover", "theme2-hover");
        }
    }
    
    if(jumboTheme)
        jumboTheme.style.backgroundColor = "";

    if(jumboBrowse) {
        jumboBrowse.classList.remove("theme3-hover", "theme3", "theme2", "theme2-hover");
    }

    if(menubar) {
        menubar.forEach (link => {
            link.classList.remove("theme3", "theme2");
        });
         menubar.forEach (link => {
            link.classList.remove("theme3-hover", "theme2-hover");
        });
    }


    if(partnerTheme) {
        partnerTheme.forEach (link => {
            link.classList.remove("theme3");
        });
    }


    if(onPage){
        onPage.classList.remove("theme2","theme3");
        onPage.style.color ="#fbfbfb";
    }



    themeBar.style.backgroundColor ="";
}
