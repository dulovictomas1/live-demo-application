import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




//Mobile menu
document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.querySelector(".menu-toggle");
    const toggle2 = document.querySelector(".menu-toggle2");
    const nav = document.querySelector(".main-nav");
    const header = document.querySelector(".site-header");

    // Otváranie / zatváranie menu
    toggle.addEventListener("click", function () {
        toggle.classList.toggle("active");
        nav.classList.toggle("active");
    });

    // Otváranie / zatváranie menu
    toggle2.addEventListener("click", function () {
        toggle.classList.toggle("active");
        nav.classList.toggle("active");
    });

});



//Carousel Hero section
document.querySelectorAll('.nekonecny').forEach(carousel => {

    const track = carousel.querySelector('.track');
    if (!track) return;
    let setWidth = track.scrollWidth / 2;
    let x = 0;
    const speed = parseFloat(carousel.dataset.speed) || 0.8;

    function animate() {
        x -= speed;
        if (Math.abs(x) >= setWidth) {
            x += setWidth;
        }

        track.style.transform = `translate3d(${x}px, 0, 0)`;
        requestAnimationFrame(animate);
    }

    animate();
    window.addEventListener('resize', () => {
        setWidth = track.scrollWidth / 2;
    });

});

//Carousel news
const carousel = document.querySelector('.carousel');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');

const itemWidth = carousel.querySelector('.item').offsetWidth;

nextBtn.addEventListener('click', () => {
  carousel.scrollBy({ left: itemWidth, behavior: 'smooth' });
});

prevBtn.addEventListener('click', () => {
  carousel.scrollBy({ left: -itemWidth, behavior: 'smooth' });
});

