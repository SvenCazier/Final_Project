//ContactFormAnimator.js

"use strict";

class ContactFormAnimator {
	#smallScreenBreakpoint;
	#minTranslateX;
	#maxTranslateX;
	#scrollSpeed;

	/**
	 * @param {number} [smallScreenBreakpoint=0] - The screen width threshold to enable the animation.
	 * @param {number} [minTranslateX=0] - The minimum translation percentage along the X-axis.
	 * @param {number} [maxTranslateX=100] - The maximum translation percentage along the X-axis.
	 * @param {number} [scrollSpeed=15] - The rate at which the translation happens relative to the scroll position.
	 */
	constructor(smallScreenBreakpoint = 0, minTranslateX = 0, maxTranslateX = 100, scrollSpeed = 15) {
		this.#smallScreenBreakpoint = smallScreenBreakpoint;
		this.#minTranslateX = minTranslateX;
		this.#maxTranslateX = maxTranslateX;
		this.#scrollSpeed = Math.abs(scrollSpeed) * -1;
		this.#animateContactForm();
		window.addEventListener("scroll", this.#animateContactForm.bind(this));
		window.addEventListener("resize", this.#animateContactForm.bind(this));
	}

	#animateContactForm() {
		const contactSection = document.getElementById("contact");
		const contactForm = document.getElementById("contactForm");
		if (!contactSection || !contactForm) return;

		const finalPosition = contactSection.offsetTop;
		const finalHeight = contactSection.offsetHeight;
		const scrollPosition = window.scrollY;
		const finalCalc = finalPosition - finalHeight / 2;

		if (window.innerWidth >= this.#smallScreenBreakpoint) {
			const translateXPercentage = Math.min(Math.max(Math.min(scrollPosition - finalCalc, finalHeight) / this.#scrollSpeed, this.#minTranslateX), this.#maxTranslateX);
			contactForm.style.transform = `translateX(${translateXPercentage}%)`;
		} else {
			contactForm.style.transform = `translateX(${this.#minTranslateX}%)`;
		}
	}
}

export default ContactFormAnimator;
