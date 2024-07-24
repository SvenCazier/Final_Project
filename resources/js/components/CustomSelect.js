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
	debounceTime = 300;
	searchString = "";
	options = null;
	clearSearchTimeout = null;

	constructor() {
		const customSelects = document.querySelectorAll(".custom__select");

		customSelects.forEach((customSelect) => {
			customSelect.addEventListener("click", this.handleSelectClick.bind(this));
			customSelect.addEventListener("keydown", this.handleSelectKeyDown.bind(this));
		});

		document.addEventListener("click", this.somethingElse.bind(this));
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
				this.setIndex(this.options.length - 1);
				break;
			default:
				this.typeSearch(e.key);
				break;
		}
	}

	clearSearchString() {
		this.searchString = "";
	}

	typeSearch(key) {
		clearTimeout(this.clearSearchTimeout);

		this.searchString += key;
		const startIndex = this.currentIndex + 1; // starts at first element after current index, if current index === -1 => starts at beginning
		const foundIndex = this.findIndex(startIndex);
		if (foundIndex !== -1) this.setIndex(foundIndex);

		this.clearSearchTimeout = setTimeout(() => {
			this.clearSearchString();
		}, this.debounceTime);
	}

	findIndex(startIndex) {
		const noIndex = -1;

		if (!this.options || this.options.length === 0) return noIndex;
		if (this.searchString === "") return noIndex; // safety check since every string "starts with" ""

		for (let i = 0; i < this.options.length; i++) {
			const index = (startIndex + i) % this.options.length;
			if (this.options[index].innerText.startsWith(this.searchString)) {
				return index;
			}
		}

		return noIndex;
	}

	moveIndexBy(amount) {
		this.setIndex(Math.min(Math.max(this.currentIndex + amount, 0), this.options.length - 1));
	}

	setIndex(index) {
		this.options.forEach((option) => {
			option.classList.remove("highlight");
		});
		this.options[index].classList.add("highlight");
		this.currentIndex = index;
	}

	setCurrentValue() {
		// set the value to whatever the value of the li on the current index is (if not -1)
	}

	somethingElse(e) {
		if (this.target && this.target !== e.target) {
			this.toggleOptions(this.toggleOption.HIDE);
		}
	}

	toggleOptions(toggleOption) {
		const optionsList = this.target.nextElementSibling;

		switch (toggleOption) {
			case this.toggleOption.SHOW:
				this.showOptions(optionsList);
				break;
			case this.toggleOption.HIDE:
				this.hideOptions(optionsList);
				break;
			case this.toggleOption.TOGGLE:
				optionsList.classList.contains("show") ? this.hideOptions(optionsList) : this.showOptions(optionsList);
				break;
		}
	}

	showOptions(optionsList) {
		optionsList.classList.add("show");
		this.options = optionsList.querySelectorAll("li");
		this.options.forEach((option, index) => {
			option.addEventListener("mouseenter", () => this.setIndex(index));
		});
	}

	hideOptions(optionsList) {
		optionsList.classList.remove("show");
		this.options.forEach((option) => {
			option.parentNode.replaceChild(option.cloneNode(true), option); // replace with clone to remove eventlisteners
		});
		this.options = null;
		this.target = null;
	}

	handleOptionHover() {
		index = 0;
		this.setIndex(index);
		// set currently hovered as currentIndex
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
