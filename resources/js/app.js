import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {

    const btnAdd = document.querySelector("#btn_add_section");
    const formAddsection = document.querySelector("#form-add-sections");
    const btnCreateSection = document.querySelector("#btn_add_section_new");
    const select = document.querySelector('select[name="sections"]');
    const wrapper = document.querySelector("#sections-wrapper");

    //let sectionIndex = 0;
    let sectionIndex = window.sectionIndex ?? 0;

    btnAdd.addEventListener("click", function () {
        formAddsection.style.display = "block";
    });

    btnCreateSection.addEventListener("click", async function () {

        if (select.value === "txt_blok") {

            const response = await fetch(`/admin/pages/sections/text-block?index=${sectionIndex}`);
            const html = await response.text();

            wrapper.insertAdjacentHTML("beforeend", html);

            sectionIndex++;
        } else if (select.value === "half_blok") {
            const response = await fetch(`/admin/pages/sections/half-block?index=${sectionIndex}`);
            const html = await response.text();

            wrapper.insertAdjacentHTML("beforeend", html);

            sectionIndex++;
        }
    });

});

document.addEventListener('click', function(e) {

    if (e.target.classList.contains('remove-section')) {
        e.target.closest('.section-item').remove();
    }

});


//Mobile menu
document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.querySelector(".menu-toggle");
    const nav = document.querySelector(".main-nav");

    if (toggle && nav) {
        toggle.addEventListener("click", function () {
            toggle.classList.toggle("active");
            nav.classList.toggle("active");
        });

    }

    document.querySelectorAll(".submenu-toggle").forEach(function (submenuToggle) {
        submenuToggle.addEventListener("click", function () {
            const parent = submenuToggle.closest(".menu-item-has-children");
            parent.classList.toggle("active");
        });
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
