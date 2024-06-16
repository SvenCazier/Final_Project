"use strict";

import "./bootstrap";

// window.addEventListener("pageshow", function (event) {
//     if (
//         event.persisted ||
//         performance.getEntriesByType("navigation")[0].type === "back_forward"
//     ) {
//         location.reload();
//     }
// });

const tableRows = document.querySelectorAll("tbody tr");
for (const tableRow of tableRows) {
    tableRow.addEventListener("click", function () {
        window.location.href = this.dataset.href;
    });
}

const inboxTable = document.getElementById("inbox");
document.addEventListener("DOMContentLoaded", makeMessageArray);

function makeMessageArray() {
    const messageRows = Array.from(inboxTable.querySelectorAll(".message"));
    const messagesWithLocalDates = [];

    messageRows.forEach((messageRow) => {
        const messageRowTimeElement = messageRow.querySelector(".time time");
        const messageDate = new Date(
            messageRowTimeElement.getAttribute("datetime")
        );
        messageRowTimeElement.setAttribute("datetime", messageDate.toString());
        const localTime = messageDate.toLocalTimeString();
        messageRowTimeElement.textContent = localTime;
        const localDate = messageDate.toLocalDateString();
        messagesWithLocalDates.push({
            localDate,
            localTime,
            messageRow: messageRow,
        });
    });
    createTable(messagesWithLocalDates);
}

function createTable(messageArray) {
    const tableBodyArray = [];
    messageArray.forEach(({ localDate, localTime, messageRow }) => {
        let tableBodyIndex = tableBodyArray.findIndex(
            (index) => index.date === localDate
        );
        if (tableBodyIndex === -1) {
            const tableBody = createTBody(new Date(localDate));
            tableBodyArray.push({ date: localDate, tableBody });
            tableBodyIndex = tableBodyArray.length - 1;
        }
        tableBodyArray[tableBodyIndex].tableBody.appendChild(messageRow);
    });

    inboxTable.querySelectorAll("tbody").forEach((tbody) => {
        inboxTable.removeChild(tbody);
    });

    tableBodyArray.forEach(({ tableBody }) => {
        inboxTable.append(tableBody);
    });
}

function createTBody(date) {
    const headerCell = document.createElement("th");
    headerCell.classList.add("table__cell");
    headerCell.innerText = date.toISODateString();
    headerCell.setAttribute("colspan", 4);

    const headerRow = document.createElement("tr");
    headerRow.classList.add("table__row", "header", "header--body");
    headerRow.appendChild(headerCell);

    const tbody = document.createElement("tbody");
    tbody.appendChild(headerRow);

    return tbody;
}

// Function to format date as YYYY-MM-DD format
Date.prototype.toISODateString = function () {
    const year = this.getFullYear();
    const month = `${this.getMonth() + 1}`.padStart(2, "0");
    const day = `${this.getDate()}`.padStart(2, "0");
    return `${year}-${month}-${day}`;
};

// Function to format date as local long date string
Date.prototype.toLocalDateString = function () {
    const options = { day: "numeric", month: "long", year: "numeric" };
    return this.toLocaleDateString(navigator.language, options);
};

// Function to format time as local time string
Date.prototype.toLocalTimeString = function () {
    const options = { hour: "2-digit", minute: "2-digit" };
    const timezoneOffset = this.getTimezoneOffset();
    return `${this.toLocaleTimeString(navigator.language, options)} UTC${
        timezoneOffset >= 0 ? "-" : "+"
    }${Math.abs(Math.floor(timezoneOffset / 60))
        .toString()
        .padStart(2, "0")}:${Math.abs(timezoneOffset % 60)
        .toString()
        .padStart(2, "0")}`;
};
