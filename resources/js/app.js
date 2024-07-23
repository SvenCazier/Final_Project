"use strict";

import "./bootstrap";
import NavigationManager from "./components/NavigationManager";
import TabGroup from "./components/TabGroup";
import ContactFormAnimator from "./components/ContactFormAnimator";

const smallScreenBreakpoint = 1240;

document.addEventListener("DOMContentLoaded", () => {
	navScrollFunction();
	duplicateSecondaryNav();
	loadSettings();
	const navigationManager = new NavigationManager();
	const tabGroup = new TabGroup();
	const contactFormAnimator = new ContactFormAnimator(smallScreenBreakpoint);
	navigationManager.setActiveNav(window.location.hash);
});

window.addEventListener("resize", () => {
	toggleMenu(event);
	duplicateSecondaryNav();
});
window.addEventListener("scroll", () => {
	navScrollFunction();
});

function navScrollFunction() {
	const navbar = document.getElementById("navbar");
	if (navbar) {
		if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
			navbar.classList.remove("expanded");
		} else {
			navbar.classList.add("expanded");
		}
	}
}

function duplicateSecondaryNav() {
	document.getElementById("navSecondaryDuplicate")?.remove();
	if (window.innerWidth >= smallScreenBreakpoint) {
		const navSecondary = document.getElementById("navSecondary")?.cloneNode(true);
		if (navSecondary) {
			navSecondary.querySelectorAll(".submenu").forEach((el) => el.remove());
			navSecondary.id = "navSecondaryDuplicate";
			navSecondary.classList.add("invisible");
			document.getElementById("navMain")?.append(navSecondary);
		}
	}
}

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
	window.location.href = `${event.target.getAttribute("href")}${window.location.hash}`;
}

const htmlElement = document.querySelector("html");

const darkModeSwitch = document.getElementById("switch-dark-mode");
const dyslexiaModeSwitch = document.getElementById("switch-dyslexia-mode");

darkModeSwitch.addEventListener("change", setDarkMode);
dyslexiaModeSwitch.addEventListener("change", setDyslexiaMode);

function loadSettings() {
	const prefersColorSchemeDark = window?.matchMedia("(prefers-color-scheme: dark)")?.matches ?? false;
	const darkModeLocalStorage = localStorage.getItem("darkmode");
	const darkModeEnabled = darkModeLocalStorage === null ? prefersColorSchemeDark : darkModeLocalStorage === "true";
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
	darkModeEnabled ? htmlElement.classList.add("darkmode") : htmlElement.classList.remove("darkmode");
}

function toggleDyslexiaMode(dyslexiaModeEnabled) {
	dyslexiaModeEnabled ? htmlElement.classList.add("dyslexia-friendly") : htmlElement.classList.remove("dyslexia-friendly");
}
