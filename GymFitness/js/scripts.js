jQuery(document).ready($ => {
    $('.site-header .menu_principal .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    });
});


function gymWordPress(){
    if(document.querySelector('.swiper')){
        const opciones = {
            loop: true,
            autoplay:{
                delay: 3000
            }
        }
        new Swiper('.swiper', opciones);
    }
}


//Animacion Hero
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');

if(textWrapper){
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
    .add({
        targets: '.ml2 .letter',
        scale: [4,1],
        opacity: [0,1],
        translateZ: 0,
        easing: "easeOutExpo",
        duration: 950,
        delay: (el, i) => 70*i
    }).add({
        targets: '.ml2',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
    });
}

document.addEventListener('DOMContentLoaded', gymWordPress);


window.onscroll = function(){

    const scroll = window.scrollY;
    const barraNav = document.querySelector('.barra-navegacion');

    if(scroll > 300){
          barraNav.classList.add('fixed-top');
    } else{
          barraNav.classList.remove('fixed-top');
    }
}

