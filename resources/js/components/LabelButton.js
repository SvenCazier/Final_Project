// LabelButtons.js

"use strict";

class LabelButton {
	constructor() {
		this.labelButtons = document.querySelectorAll("label[tabindex]");
		this.init();
	}

	init() {
		this.labelButtons.forEach((label) => {
			label.addEventListener("keydown", this.registerEnter);
		});
	}

	registerEnter(event) {
		if (event.key === "Enter" || event.key === " ") {
			event.preventDefault();
			const inputId = event.currentTarget.getAttribute("for");
			if (inputId) {
				const inputElement = document.getElementById(inputId);
				if (inputElement) {
					inputElement.click();
				}
			}
		}
	}
}

export default LabelButton;
