// CookieManager.js

"use strict";

class CookieManager {
	cookieBanner;
	cookieBannerContent;
	cookieBannerToggle;
	cookieBannerCollapsedHeight;
	acceptButton;
	declineButton;
	clearButton;

	constructor() {
		this.cookieBanner = document.getElementById("cookieBanner");
		this.cookieBannerCollapsedHeight = this.cookieBanner.style.height;

		this.cookieBannerContent = document.getElementById("cookieBannerContent");

		this.cookieBannerToggle = document.querySelector(".cookie-banner-toggle");

		this.acceptButton = document.getElementById("acceptCookies");
		this.declineButton = document.getElementById("declineCookies");
		this.clearButton = document.getElementById("clearCookies");

		this.init();
	}

	init() {
		this.cookieBannerToggle.addEventListener("change", () => {
			if (this.cookieBannerToggle.checked) {
				this.expandBanner();
			} else {
				this.collapseBanner();
			}
		});

		if (this.acceptsCookies()) {
			this.collapseBanner();
		} else {
			this.expandBanner();
			this.cookieBannerToggle.checked = true;
		}

		this.acceptButton.addEventListener("click", this.acceptCookies.bind(this));
		this.declineButton.addEventListener("click", this.declineCookies.bind(this));
		this.clearButton.addEventListener("click", this.clearStorage.bind(this));

		const resizeObserver = new ResizeObserver(this.refreshBanner.bind(this));

		resizeObserver.observe(this.cookieBannerContent);
	}

	cloneCookieBanner() {
		const cookieBannerClone = this.cookieBanner.cloneNode(true);
		cookieBannerClone.style.visibility = "hidden";
		cookieBannerClone.style.position = "absolute";
		cookieBannerClone.style.height = "auto";
		cookieBannerClone.classList.add("expanded");

		document.body.appendChild(cookieBannerClone);
		const height = cookieBannerClone.offsetHeight;
		document.body.removeChild(cookieBannerClone);

		return height;
	}

	expandBanner() {
		const height = this.cloneCookieBanner();
		this.cookieBanner.style.height = `${height}px`;
		this.cookieBanner.classList.add("expanded");
	}

	collapseBanner() {
		this.cookieBanner.style.height = this.cookieBannerCollapsedHeight;
		this.cookieBanner.classList.remove("expanded");
	}

	refreshBanner() {
		if (this.cookieBanner.classList.contains("expanded")) {
			this.collapseBanner();
			this.expandBanner();
		}
	}

	acceptCookies() {
		localStorage.setItem("acceptsCookies", true);
	}

	acceptsCookies() {
		return localStorage.getItem("acceptsCookies") === "true";
	}

	declineCookies() {
		localStorage.clear();
	}

	setLocalStorageValue(key, value) {
		if (this.acceptsCookies()) {
			localStorage.setItem(key, value);
		}
	}

	getLocalStorageValue(key) {
		if (this.acceptsCookies()) {
			return localStorage.getItem(key);
		}
		return null;
	}

	clearStorage() {
		// clear all stored preferences except for cookie acceptance
		const acceptsCookies = this.acceptsCookies();
		this.declineCookies();
		if (acceptsCookies) this.acceptCookies();
	}
}

export default CookieManager;
