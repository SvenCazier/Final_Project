//CustomSelect.js

"use strict";

class CustomSelect {
	toggleOption = Object.freeze({
		SHOW: 0,
		HIDE: 1,
		TOGGLE: 2,
	});
	specialKeys = ["F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8", "F9", "F10", "F11", "F12", "Tab", "Shift", "Control", "Alt", "Meta"];
	target = null;
	options = null;
	hiddenInput = null;
	currentIndex = -1;
	debounceTime;
	searchString = "";
	clearSearchTimeout = null;
	visibleElements;

	constructor(debounceTime = 300, visibleElements = 5) {
		this.debounceTime = debounceTime;
		this.visibleElements = visibleElements;

		const customSelects = document.querySelectorAll(".custom__select");

		customSelects.forEach((customSelect) => {
			customSelect.addEventListener("click", this.handleSelectClick.bind(this));
			customSelect.addEventListener("keydown", this.handleSelectKeyDown.bind(this));
		});

		document.addEventListener("click", this.handleClickOutside.bind(this));
	}

	handleSelectClick(e) {
		this.target = e.target;
		this.toggleOptions(this.toggleOption.TOGGLE);
	}

	handleSelectKeyDown(e) {
		this.target = e.target;
		if (!this.specialKeys.includes(e.key)) e.preventDefault();
		switch (e.key) {
			case "Enter":
				this.setCurrentValue();
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
				this.setCurrentValue();
				break;
			case "ArrowDown":
				this.moveIndexBy(1);
				this.setCurrentValue();
				break;
			case "Home":
			case "PageUp":
				this.setIndex(0);
				this.setCurrentValue();
				break;
			case "End":
			case "PageDown":
				this.setIndex(this.options.length - 1);
				this.setCurrentValue();
				break;
			default:
				this.typeSearch(e.key);
				this.setCurrentValue();
				break;
		}
	}

	clearSearchString() {
		this.searchString = "";
	}

	typeSearch(key) {
		clearTimeout(this.clearSearchTimeout);

		this.searchString += key.toLowerCase();
		console.log(this.searchString);
		const startIndex = this.currentIndex + 1; // Start searching from next item
		const foundIndex = this.findIndex(startIndex);
		if (foundIndex !== -1) this.setIndex(foundIndex);

		this.clearSearchTimeout = setTimeout(() => {
			this.clearSearchString();
		}, this.debounceTime);
	}

	findIndex(startIndex) {
		if (!this.options || this.options.length === 0 || this.searchString === "") return -1;

		for (let i = 0; i < this.options.length; i++) {
			const index = (startIndex + i) % this.options.length;
			if (this.options[index].innerText.toLowerCase().startsWith(this.searchString)) {
				return index;
			}
		}

		return -1;
	}

	moveIndexBy(amount) {
		this.setIndex(Math.min(Math.max(this.currentIndex + amount, 0), this.options.length - 1));
	}

	setIndex(index) {
		this.currentIndex = index;
		this.highlightIndex(index);
	}

	highlightIndex(index) {
		this.options.forEach((option) => {
			option.classList.remove("highlight");
		});
		this.options[index].classList.add("highlight");
	}

	setCurrentValue() {
		if (this.currentIndex !== -1 && this.options) {
			this.target.value = this.options[this.currentIndex].innerText;
			this.hiddenInput.value = this.options[this.currentIndex].dataset.value;
		}
	}

	handleClickOutside(e) {
		if (this.target && this.target !== e.target) {
			this.toggleOptions(this.toggleOption.HIDE);
		}
	}

	toggleOptions(toggleOption) {
		this.hiddenInput = this.target.parentElement.querySelector("input[type='hidden']");
		const optionsList = this.target.parentElement.querySelector(".custom__select__options");
		if (!optionsList) return;

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

		optionsList.style.maxHeight = `${optionsList.firstElementChild.offsetHeight * this.visibleElements}px`;
		optionsList.style.overflowY = "auto";

		this.options = optionsList.querySelectorAll("li");
		this.options.forEach((option, index) => {
			option.addEventListener("mouseenter", () => {
				this.setIndex(index);
			});
			option.addEventListener("click", this.setCurrentValue.bind(this));
		});
	}

	hideOptions(optionsList) {
		optionsList.classList.remove("show");
		this.options?.forEach((option) => option.replaceWith(option.cloneNode(true))); // Replace with clone to easily remove all event listeners
		this.options = this.target = null;
	}
}

export default CustomSelect;
