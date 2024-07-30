//TabGroup.js
"use strict";

class TabGroup {
	imageRatio = 4.2;

	constructor() {
		this.init();
	}

	init() {
		this.radiobutton = document.getElementById("project-0");
		document.querySelectorAll("[data-tab-group]").forEach((radio) => {
			radio.addEventListener("keydown", (e) => {
				this.handleKeyDown(e, radio);
			});
			radio.addEventListener("change", () => this.changeActivePanel(radio));
			radio.addEventListener("focus", () => this.handleFocus(radio));

			if (radio.checked) {
				this.changeActivePanel(radio);
			}
		});

		this.changePanelHeight();
		window.addEventListener("resize", this.handleResize.bind(this));
	}

	handleKeyDown(e, radio) {
		if (e.key === "Tab") {
			e.preventDefault();
			let group = radio.getAttribute("data-tab-group");
			let radios = Array.from(document.querySelectorAll(`[data-tab-group="${group}"]`));
			let index = radios.indexOf(radio);
			let nextIndex = e.shiftKey ? index - 1 : index + 1;

			if (nextIndex >= 0 && nextIndex < radios.length) {
				radios[nextIndex].focus();
			} else {
				radio.blur();
				let allFocusable = Array.from(document.querySelectorAll("input, button"));
				let currentIndex = allFocusable.indexOf(radio);
				let newIndex = e.shiftKey ? currentIndex - 1 : currentIndex + 1;
				if (newIndex >= 0 && newIndex < allFocusable.length) {
					allFocusable[newIndex].focus();
				}
			}
		} else if (e.key === " ") {
			radio.checked = true;
		}
	}

	changeActivePanel(radio) {
		const targetId = radio.getAttribute("aria-controls");
		const targetPanel = document.getElementById(targetId);

		if (targetPanel) {
			document.querySelectorAll(".tab-panel").forEach((panel) => {
				panel.classList.remove("active");
			});
			targetPanel.classList.add("active");
			this.setBannerImage();
		}
	}

	handleFocus(radio) {
		if (!radio.checked) {
			radio.checked = true;
			this.changeActivePanel(radio);
		}
	}

	setBannerImage() {
		const bannerElement = this.getBannerElement();
		if (!bannerElement) return;

		const blurredURL = bannerElement.querySelector("img").getAttribute("src").replace("x1040.png", "xblurred.jpg");

		bannerElement.style.backgroundImage = `url("${blurredURL}")`;
		bannerElement.style.backgroundPosition = "center";
		bannerElement.style.backgroundRepeat = "no-repeat";
		bannerElement.style.backgroundSize = "cover";

		this.resizeBannerHeight();
	}

	resizeBannerHeight() {
		const bannerElement = this.getBannerElement();
		if (!bannerElement) return;

		const bannerWidth = bannerElement.offsetWidth;
		bannerElement.style.height = `${bannerWidth / this.imageRatio}px`;
	}

	getBannerElement() {
		const activePanel = document.querySelector(".tab-panel.active");
		if (!activePanel) return;

		const bannerElement = activePanel.querySelector("header picture");
		if (!bannerElement) return;

		return bannerElement;
	}

	handleResize() {
		this.resizeBannerHeight();
		this.changePanelHeight();
	}

	changePanelHeight() {
		const projectsSection = document.getElementById("projects");
		if (!projectsSection) return;

		const largestContentHeight = this.getLargestContentsHeight(projectsSection);
		if (!largestContentHeight) return;

		const tabPanelContents = projectsSection.querySelectorAll(".tab-panel__content");
		this.setContentsHeight(tabPanelContents, largestContentHeight);
	}

	getLargestContentsHeight(projectsSection) {
		const projectsSectionClone = projectsSection.cloneNode(true);
		projectsSectionClone.querySelector(".nav-tabs").remove();
		projectsSectionClone.style.visibility = "hidden";

		const clonedtabPanelContents = projectsSectionClone.querySelectorAll(".tab-panel__content");
		if (!clonedtabPanelContents) return 0;
		this.setContentsHeight(clonedtabPanelContents, 0);

		const clonedTabPanels = projectsSectionClone.querySelectorAll(".tab-panel");
		if (!clonedTabPanels) return 0;

		clonedTabPanels.forEach((panel) => {
			panel.style.display = "contents";
		});

		document.body.appendChild(projectsSectionClone);

		const content = clonedTabPanels[0].querySelector(".tab-panel__content");
		const contentHeight = content.offsetHeight;

		document.body.removeChild(projectsSectionClone);

		return contentHeight;
	}

	setContentsHeight(contents, contentHeight) {
		contents.forEach((content) => {
			content.style.minHeight = `${contentHeight}px`;
		});
	}
}

export default TabGroup;
