"use strict";

import "./bootstrap";
import NavigationManager from "./components/NavigationManager";
import TabGroup from "./components/TabGroup";
import ContactFormAnimator from "./components/ContactFormAnimator";
import CookieManager from "./components/CookieManager";
import LocaleManager from "./components/LocaleManager";
import SettingsManager from "./components/SettingsManager";
import CustomSelect from "./components/CustomSelect";

const smallScreenBreakpoint = 1240;

document.addEventListener("DOMContentLoaded", () => {
	navScrollFunction();
	duplicateSecondaryNav();
	const cookieManager = new CookieManager();
	const navigationManager = new NavigationManager();
	navigationManager.setActiveNav(window.location.hash);
	new LocaleManager(cookieManager);
	new SettingsManager(cookieManager);
	new TabGroup();
	new ContactFormAnimator(smallScreenBreakpoint);
	new CustomSelect();
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
