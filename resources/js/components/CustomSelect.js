//CustomSelect.js

"use strict";

class CustomSelect {
	toggleOption = Object.freeze({
		SHOW: 0,
		HIDE: 1,
		TOGGLE: 2,
	});
	specialKeys = ["F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8", "F9", "F10", "F11", "F12", "Tab"];
	target = null;
	currentIndex = -1;

	constructor() {
		const customSelects = document.querySelectorAll(".custom__select");

		customSelects.forEach((customSelect) => {
			customSelect.addEventListener("click", this.handleSelectClick);
			customSelect.addEventListener("keydown", this.handleSelectKeyDown);
		});

		document.addEventListener("click", this.somethingElse);
	}

	handleSelectClick(e) {
		this.target = e.target;
		//e.target.blur();
		this.toggleOptions(this.toggleOption.TOGGLE);
	}

	handleSelectKeyDown(e) {
		this.target = e.target;
		if (!this.specialKeys.includes(e.key)) e.preventDefault();
		switch (e.key) {
			case "Enter":
				this.toggleOptions(this.toggleOption.TOGGLE);
				break;
			case " ":
				this.toggleOptions(this.toggleOption.SHOW);
				break;
			case "Escape":
			case "Tab":
				this.toggleOptions(this.toggleOption.HIDE);
				break;
			case "ArrowUp":
				this.moveIndexBy(-1);
				break;
			case "ArrowDown":
				this.moveIndexBy(1);
				break;
			case "Home":
			case "End":
				this.setIndex(0);
				break;
			case "PageUp":
			case "PageDown":
				this.setIndex(this.target.nextElementSibling.querySelectorAll("li").length - 1);
				break;
			default:
				this.typeSearch(e.key);
				break;
		}
	}

	typeSearch(key) {
		this.target.nextElementSibling.querySelectorAll("li").forEach((option, index) => {
			if (option.innerText.startsWith(key)) {
				this.setIndex(index);
			}
		});

		// CHANGE TO GOING AROUND WITH MODULO

		// for (let i = 0; i < this.target.nextElementSibling.querySelectorAll("li").length - 1; i++) {
		//     translate to index using modulo, with current index equivalent of 0
		// }
	}

	moveIndexBy(amount) {
		this.setIndex(min(max(this.currentIndex + amount, 0), this.target.nextElementSibling.querySelectorAll("li").length - 1));
	}

	setIndex(index) {
		this.currentIndex = index;
	}

	somethingElse(e) {
		if (this.target && this.target !== e.target) {
			this.toggleOptions(this.toggleOption.HIDE);
			this.target = null;
		}
	}

	toggleOptions(toggleOption) {
		const options = this.target.nextElementSibling;
		switch (toggleOption) {
			case 0:
				options.classList.add("show");
				break;
			case 1:
				options.classList.remove("show");
				break;
			case 2:
				options.classList.toggle("show");
				break;
		}
	}
}

export default CustomSelect;

/*

ENTER => OPEN/CLOSE, ON CLOSE SELECT THE HOVERED OPTION

SPACE, ESC, TAB => JUST OPEN AND CLOSE, DOESN'T CHANGE SELECTION

ARROW UP/DOWN, HOME, END, PAGE UP, PAGE DOWN, CLICK => SELECT THE ELEMENT

ARROW UP/DOWN, HOME, END, PAGE UP, PAGE DOWN, HOVER => CHANGE STYLE OF ELEMENT

TYPING => LOOK UP FIRST VALUE IN ARRAY OF OPTIONS, STARTING FROM CURRENTLY SELECTED/HOVERED (HAS PRECEDENCE OVER CURRENTLY SELECTED) ELEMENT, IF NOT FOUND => GO AROUND UNTIL BACK TO CURRENTLY SELECTED/HOVERED ELEMENT

*/
