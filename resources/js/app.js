"use strict";

import "./bootstrap";

window.addEventListener("resize", toggleMenu);
window.addEventListener("scroll", navScrollFunction);
document.addEventListener("DOMContentLoaded", navScrollFunction);

function navScrollFunction() {
    const navbar = document.getElementById("navbar");
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        navbar.classList.remove("expanded");
    } else {
        navbar.classList.add("expanded");
    }
}

const contactSection = document.getElementById("contact");
const contactForm = document.getElementById("contactForm");
const $finalPosition = contactSection.offsetTop;
const $finalHeight = contactSection.offsetHeight;
const smallScreenBreakpoint = 1240;

// window.addEventListener("scroll", () => {
//     const scrollPosition = window.scrollY;
//     const $finalCalc = $finalPosition - $finalHeight / 2;

//     if (window.innerWidth >= smallScreenBreakpoint) {
//         const translateY = Math.min(scrollPosition - $finalCalc, $finalHeight);
//         if (scrollPosition > $finalPosition - $finalHeight) {
//             contactForm.style.transform = `translateX(${Math.max(
//                 translateY / -10,
//                 -50
//             )}%)`;
//         }
//     } else {
//         contactForm.style.transform = `translate(0, -50px)`;
//     }
// });

const navHamburger = document.getElementById("navHamburger");

navHamburger.addEventListener("click", toggleMenu);
const navMain = document.getElementById("navMain");

function toggleMenu(event) {
    if (window.innerWidth < smallScreenBreakpoint) {
        if (event.type === "click") {
            navMain.classList.toggle("show");
        }
    } else {
        navMain.classList.remove("show");
    }
}

const localeLinks = document.querySelectorAll(".locale-link");
localeLinks.forEach((localeLink) => {
    localeLink.addEventListener("click", redirectWithHash);
});

function redirectWithHash(event) {
    event.preventDefault();
    window.location.href = `${event.target.getAttribute("href")}${
        window.location.hash
    }`;
}
