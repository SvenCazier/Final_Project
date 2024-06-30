//TabGroup.js
"use strict";

class TabGroup {
    constructor() {
        this.init();
    }

    init() {
        document.querySelectorAll("[data-tab-group]").forEach((radio) => {
            // radio.addEventListener("keydown", (e) => {
            //     this.handleKeyDown(e, radio);
            // });
            radio.addEventListener("change", function () {
                const targetId = this.getAttribute("aria-controls");
                const targetPanel = document.getElementById(targetId);

                if (targetPanel) {
                    document.querySelectorAll(".tab-panel").forEach((panel) => {
                        panel.classList.remove("active");
                    });
                    targetPanel.classList.add("active");
                }
            });
            //radio.addEventListener("focus", () => this.handleFocus(radio));
        });
    }

    handleKeyDown(e, radio) {
        if (e.key === "Tab") {
            e.preventDefault();
            let group = radio.getAttribute("data-tab-group");
            let radios = Array.from(
                document.querySelectorAll(`[data-tab-group="${group}"]`)
            );
            let index = radios.indexOf(radio);
            let nextIndex = e.shiftKey ? index - 1 : index + 1;

            if (nextIndex >= 0 && nextIndex < radios.length) {
                radios[nextIndex].focus();
            } else {
                radio.blur();
                let allFocusable = Array.from(
                    document.querySelectorAll("input, button")
                );
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

    handleFocus(radio) {
        radio.checked = true;
    }
}

export default TabGroup;
