const list = [...document.querySelectorAll('li')];
const statistics = [...document.querySelectorAll('.statistics')];
statistics.forEach(one=>one.style.width=`${one.innerHTML * 10}px`);

const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.navUlTop');
const container = document.querySelector('.container');

hamburger.addEventListener("click", ()=> {
    menu.style.display = "block";
    container.style.margin = "50px auto";
    menu.classList.toggle(".On");
    
    if(menu.classList == "navUlTop .On") {
        menu.style.display = "none";
        container.style.margin =  "120px auto";
    }
})