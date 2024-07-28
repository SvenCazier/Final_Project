// SettingsManager.js

"use strict";

class SettingsManager {
	cookieManager = null;

	constructor(cookieManager) {
		this.cookieManager = cookieManager;
		this.htmlElement = document.querySelector("html");
		this.darkModeSwitch = document.getElementById("switch-dark-mode");
		this.dyslexiaModeSwitch = document.getElementById("switch-dyslexia-mode");

		this.init();
	}

	init() {
		this.loadSettings();
		this.darkModeSwitch.addEventListener("change", () => this.setDarkMode());
		this.dyslexiaModeSwitch.addEventListener("change", () => this.setDyslexiaMode());
	}

	loadSettings() {
		const prefersColorSchemeDark = window.matchMedia("(prefers-color-scheme: dark)").matches ?? false;
		const darkModeLocalStorage = this.cookieManager?.getLocalStorageValue("darkmode");
		const darkModeEnabled = darkModeLocalStorage === null ? prefersColorSchemeDark : darkModeLocalStorage === "true";
		const dyslexiaModeEnabled = this.cookieManager?.getLocalStorageValue("dyslexiamode") === "true";

		this.darkModeSwitch.checked = darkModeEnabled;
		this.dyslexiaModeSwitch.checked = dyslexiaModeEnabled;

		this.toggleDarkMode(darkModeEnabled);
		this.toggleDyslexiaMode(dyslexiaModeEnabled);
	}

	setDarkMode() {
		const darkModeEnabled = this.darkModeSwitch.checked;
		this.cookieManager?.setLocalStorageValue("darkmode", darkModeEnabled);
		this.toggleDarkMode(darkModeEnabled);
	}

	setDyslexiaMode() {
		const dyslexiaModeEnabled = this.dyslexiaModeSwitch.checked;
		this.cookieManager?.setLocalStorageValue("dyslexiamode", dyslexiaModeEnabled);
		this.toggleDyslexiaMode(dyslexiaModeEnabled);
	}

	toggleDarkMode(darkModeEnabled) {
		darkModeEnabled ? this.htmlElement.classList.add("darkmode") : this.htmlElement.classList.remove("darkmode");
	}

	toggleDyslexiaMode(dyslexiaModeEnabled) {
		dyslexiaModeEnabled ? this.htmlElement.classList.add("dyslexia-friendly") : this.htmlElement.classList.remove("dyslexia-friendly");
	}
}

export default SettingsManager;
