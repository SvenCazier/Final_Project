//NavigationManager.js

"use strict";

class NavigationManager {
	#navLinks;
	#sectionArray;

	constructor() {
		this.#navLinks = document.querySelectorAll(".main-link") ?? [];
		this.#buildNavTree();
		window.addEventListener("resize", this.#buildNavTree.bind(this));
		window.addEventListener("scroll", this.#scrollSpy.bind(this));
	}

	#buildNavTree() {
		this.#sectionArray = [];

		const windowHeight = window.innerHeight;
		const navbarHeight = document.querySelector("nav")?.offsetHeight;
		if (navbarHeight) {
			this.#navLinks.forEach((navLink) => {
				const section = document.getElementById(navLink.hash.substring(1));
				if (section) {
					const sectionTopOffset = Math.max(0, windowHeight - section.offsetHeight);
					this.#sectionArray.push({
						hash: navLink.hash,
						top: section.offsetTop - sectionTopOffset - (sectionTopOffset === 0 ? navbarHeight : 0),
					});
				}
			});
		}
	}

	#scrollSpy() {
		const scrollPosition = window.scrollY;
		let activeHash = "";

		this.#sectionArray.forEach((section) => {
			if (scrollPosition >= section.top) activeHash = section.hash;
		});

		this.#setURLHash(activeHash);
		this.setActiveNav(activeHash);
	}

	#setURLHash(hash) {
		if (hash !== window.location.hash) {
			history.replaceState(null, null, hash || window.location.pathname);
		}
	}

	setActiveNav(hash) {
		this.#navLinks.forEach((navLink) => {
			navLink.hash === hash ? navLink.classList.add("active") : navLink.classList.remove("active");
		});
	}
}

export default NavigationManager;
