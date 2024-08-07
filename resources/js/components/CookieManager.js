// CookieManager.js

"use strict";

class CookieManager {
	isPreventRefresh = false;
	delay = 1500;
	hideContentTimeout = null;
	setScrollTimeout = null;

	constructor(dimension) {
		this.cookieBanner = document.getElementById("cookieBanner");

		if (this.cookieBanner) {
			this.cookieBannerContent = document.getElementById("cookieBannerContent");
			this.cookieBannerToggle = document.querySelector(".cookie-banner-toggle");
			this.acceptButton = document.getElementById("acceptCookies");
			this.declineButton = document.getElementById("declineCookies");
			this.clearButton = document.getElementById("clearCookies");
			this.cookieBannerCollapsedHeight = dimension + "em";

			this.init();
		}
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
		resizeObserver.observe(document.body);
	}

	getBannerHeight() {
		// if opened close and reopen?
		const cookieBannerClone = this.cookieBanner.cloneNode(true);
		cookieBannerClone.style.visibility = "hidden";
		cookieBannerClone.style.position = "absolute";
		cookieBannerClone.style.height = "auto";

		const cookieBannerContentClone = cookieBannerClone.querySelector("#cookieBannerContent");
		cookieBannerContentClone.style.display = "flex";

		cookieBannerClone.classList.add("expanded");

		document.body.appendChild(cookieBannerClone);

		const height = cookieBannerClone.offsetHeight;
		document.body.removeChild(cookieBannerClone);

		return height;
	}

	expandBanner() {
		clearTimeout(this.hideContentTimeout);
		this.cookieBanner.classList.remove("no-transition");
		this.cookieBanner.classList.add("expanded");
		this.cookieBanner.style.height = `${this.getBannerHeight()}px`;
		this.cookieBannerContent.style.display = "flex";

		this.setScrollTimeout = setTimeout(() => {
			this.cookieBannerContent.style.overflowY = "auto";
		}, this.delay);

		this.preventRefresh();
	}

	collapseBanner() {
		clearTimeout(this.setScrollTimeout);
		this.cookieBannerContent.style.overflowY = "hidden";
		this.cookieBanner.classList.remove("no-transition");
		this.cookieBanner.style.height = this.cookieBannerCollapsedHeight;
		this.cookieBanner.classList.remove("expanded");

		this.hideContentTimeout = setTimeout(() => {
			this.cookieBannerContent.style.display = "none";
		}, this.delay);

		this.preventRefresh();
	}

	preventRefresh() {
		// necessary evil to allow the banner to expand without refreshbanner being triggered and preventing the transition
		this.isPreventRefresh = true;
		setTimeout(() => {
			this.isPreventRefresh = false;
		}, this.delay);
	}

	refreshBanner() {
		if (!this.isPreventRefresh && this.cookieBanner.classList.contains("expanded")) {
			this.cookieBanner.classList.add("no-transition");
			this.cookieBanner.style.height = `${this.getBannerHeight()}px`;
			this.cookieBanner.offsetHeight;
			this.cookieBanner.classList.remove("no-transition");
		} else if (!this.isPreventRefresh && !this.cookieBanner.classList.contains("expanded")) {
			this.cookieBanner.classList.add("no-transition");
			this.cookieBanner.style.height = this.cookieBannerCollapsedHeight;
			this.cookieBanner.offsetHeight;
			this.cookieBanner.classList.remove("no-transition");
		}
	}

	acceptCookies() {
		localStorage.setItem("acceptsCookies", true);
		this.collapseBanner();
	}

	acceptsCookies() {
		return localStorage.getItem("acceptsCookies") === "true";
	}

	declineCookies() {
		localStorage.clear();
		this.collapseBanner();
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
		// Clear all stored preferences except for cookie acceptance
		const acceptsCookies = this.acceptsCookies();
		this.declineCookies();
		if (acceptsCookies) this.acceptCookies();
	}
}

export default CookieManager;
