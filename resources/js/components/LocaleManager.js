// LocaleManager.js

"use strict";

class LocaleManager {
	cookieManager = null;

	constructor(cookieManager) {
		this.cookieManager = cookieManager;
		const storedLang = this.cookieManager?.getLocalStorageValue("lang");

		if (storedLang !== null) {
			this.redirectToLocale(storedLang);
		}

		this.initLocaleLinks();
	}

	initLocaleLinks() {
		const localeLinks = document.querySelectorAll(".locale-link");
		localeLinks.forEach((localeLink) => {
			localeLink.addEventListener("click", (event) => this.handleLocaleChange(event));
		});
	}

	handleLocaleChange(event) {
		event.preventDefault();
		const lang = event.target.getAttribute("href").replace(/^\//, "");
		this.cookieManager?.setLocalStorageValue("lang", lang);
		this.redirectToLocale(lang);
	}

	redirectToLocale(lang) {
		lang = `/${lang}`;
		if (!window.location.pathname.startsWith(lang)) {
			window.location.href = `${lang}${window.location.hash}`;
		}
	}
}

export default LocaleManager;
