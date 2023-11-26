let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let loginFormBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let loginformClose = document.querySelector('#login-form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');
let registerForm = document.querySelector('.register-form-container');
let registerFormBtn = document.querySelector('#register-btn');
let registerFormClose = document.querySelector('#register-form-close');


window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
})

searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
})

loginFormBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});

loginformClose.addEventListener('click', () =>{
    registerForm.classList.remove('active');
    loginForm.classList.remove('active');
});

registerFormBtn.addEventListener('click', () =>{
    registerForm.classList.add('active');
});

registerFormClose.addEventListener('click', () => {
    loginForm.classList.remove('active');
    registerForm.classList.remove('active');
});


videoBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        let videoElement = document.querySelector('.video-container video');
        videoElement.src = src;
    });
});

var swiper = new Swiper(".mySwiper", {
    spaceBetween: 20,
    loop:true,
    autoplay:{
        delay:2500,
        disableOnIneraction: false,
    },
    breakpoints: {
        640:{
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});