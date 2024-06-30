"use strict";

import "./bootstrap";
import NavigationManager from "./components/NavigationManager";
import TabGroup from "./components/TabGroup";

const smallScreenBreakpoint = 1240;

window.addEventListener("resize", () => {
    toggleMenu(event);
    duplicateSecondaryNav();
});
window.addEventListener("scroll", () => {
    navScrollFunction();
});
document.addEventListener("DOMContentLoaded", () => {
    navScrollFunction();
    loadSettings();
    const navigationManager = new NavigationManager();
    navigationManager.setActiveNav(window.location.hash);
    const tabGroup = new TabGroup();
    duplicateSecondaryNav();
});

function navScrollFunction() {
    const navbar = document.getElementById("navbar");
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        navbar.classList.remove("expanded");
    } else {
        navbar.classList.add("expanded");
    }
}

function duplicateSecondaryNav() {
    document.getElementById("navSecondaryDuplicate")?.remove();
    if (window.innerWidth >= smallScreenBreakpoint) {
        const navSecondary = document
            .getElementById("navSecondary")
            .cloneNode(true);
        navSecondary.querySelectorAll(".submenu").forEach((el) => el.remove());
        navSecondary.id = "navSecondaryDuplicate";
        navSecondary.classList.add("invisible");

        const navMain = document.getElementById("navMain");
        navMain.append(navSecondary);
    }
}

// const contactSection = document.getElementById("contact");
// const contactForm = document.getElementById("contactForm");
// const $finalPosition = contactSection.offsetTop;
// const $finalHeight = contactSection.offsetHeight;

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

const htmlElement = document.querySelector("html");

const darkModeSwitch = document.getElementById("switch-dark-mode");
const dyslexiaModeSwitch = document.getElementById("switch-dyslexia-mode");

darkModeSwitch.addEventListener("change", setDarkMode);
dyslexiaModeSwitch.addEventListener("change", setDyslexiaMode);

function loadSettings() {
    const darkModeEnabled = localStorage.getItem("darkmode") === "true";
    const dyslexiaModeEnabled = localStorage.getItem("dyslexiamode") === "true";

    darkModeSwitch.checked = darkModeEnabled;
    dyslexiaModeSwitch.checked = dyslexiaModeEnabled;

    toggleDarkMode(darkModeEnabled);
    toggleDyslexiaMode(dyslexiaModeEnabled);
}

function setDarkMode() {
    localStorage.setItem("darkmode", this.checked);
    toggleDarkMode(this.checked);
}

function setDyslexiaMode() {
    localStorage.setItem("dyslexiamode", this.checked);
    toggleDyslexiaMode(this.checked);
}

function toggleDarkMode(darkModeEnabled) {
    darkModeEnabled
        ? htmlElement.classList.add("darkmode")
        : htmlElement.classList.remove("darkmode");
}

function toggleDyslexiaMode(dyslexiaModeEnabled) {
    dyslexiaModeEnabled
        ? htmlElement.classList.add("dyslexia-friendly")
        : htmlElement.classList.remove("dyslexia-friendly");
}
