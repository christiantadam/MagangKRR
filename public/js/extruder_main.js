(function () {
    "use strict";

    /**
     * Animation on scroll
     */
    window.addEventListener("load", () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    });
})();

//#region Modal jQuery
const btnConfirm = document.getElementById("btn_confirm");
const btnCancel = document.getElementById("btn_cancel");
const modalConfirmBody = document.getElementById("modal_body");

$("#confirmation_modal").on("shown.bs.modal", function () {
    $("#btn_confirm").focus();
});

$("#confirmation_modal").on("keydown", function (event) {
    const btnConfirmJQ = $("#btn_confirm");
    const btnCancelJQ = $("#btn_cancel");

    if (event.key === "ArrowLeft") {
        if (document.activeElement === btnConfirmJQ[0]) {
            btnCancelJQ.focus();
        } else if (document.activeElement === btnCancelJQ[0]) {
            btnConfirmJQ.focus();
        }
    }

    if (event.key === "ArrowRight") {
        if (document.activeElement === btnConfirmJQ[0]) {
            btnCancelJQ.focus();
        } else if (document.activeElement === btnCancelJQ[0]) {
            btnConfirmJQ.focus();
        }
    }
});

function showModal(txtBtn, txtBody, confirmFun, cancelFun) {
    btnConfirm.textContent = txtBtn;
    modalConfirmBody.textContent = txtBody;

    btnConfirm.addEventListener("click", function () {
        confirmFun();
    });
    btnCancel.addEventListener("click", function () {
        cancelFun();
    });

    $("#confirmation_modal").modal("show");
}
//#endregion

//#region Table Functions
function addTable_DataTable(tableId, listData, rowFun = null, hidden = null) {
    if ($.fn.DataTable.isDataTable("#" + tableId)) {
        $("#" + tableId)
            .DataTable()
            .destroy();
    }

    $("#" + tableId + " tbody").empty();

    $("#" + tableId).DataTable({
        data: listData,
        columns: Object.keys(listData[0]).map((key, index) => ({
            data: key,
            visible: index !== hidden,
        })),
        responsive: true,
        rowCallback: function (row, data, index) {
            if (rowFun != null) {
                row.style.cursor = "pointer";

                row.addEventListener("click", function () {
                    rowFun(data, index);
                });
            }
        },
    });
}

function clearTable_DataTable(tableId) {
    const tbodyKu = document.querySelector("#" + tableId + " tbody");
    const numColumns = document.querySelector(
        "#" + tableId + " thead th"
    ).length;

    var str =
        `<tr><td colspan="` +
        numColumns +
        `" class="text-center">
            <h1 class="mt-3">Tabel masih kosong...</h1>
        </td>`;
    for (let i = 0; i < numColumns.length - 1; i++) {
        str += `<td style="display: none"></td>`;
    }
    tbodyKu.innerHTML = str;

    if ($.fn.DataTable.isDataTable("#" + tableId)) {
        $("#" + tableId)
            .DataTable()
            .destroy();
    }

    $("#" + tableId + " tbody").empty();
    $("#" + tableId).DataTable({ responsive: true });
}

function searchTable_DataTable(tableId, searchStr) {}

function addTable_Vanilla(tableId, listData, hidden = null) {
    const tableBody = document.querySelector("#" + tableId + " tbody");
    tableBody.innerHTML = "";

    for (const item of listData) {
        const row = document.createElement("tr");

        let columnIndex = 0; // Counter for the second loop

        for (const [key, value] of Object.entries(item)) {
            const cell = document.createElement("td");
            cell.innerHTML = value || "";

            if (hidden !== null && columnIndex === hidden) {
                // Hidden cell
                cell.style.display = "none";
            }
            row.appendChild(cell);

            columnIndex++; // Increment the column index
        }

        tableBody.appendChild(row);
    }
}

function clearTable_Vanilla(tableId) {
    const tabelKu = document.getElementById(tableId);

    const tableBody = tabelKu.querySelector("tbody");
    const numColumns = tabelKu.querySelectorAll("thead th").length;

    tableBody.innerHTML =
        `<td colspan="` +
        numColumns +
        `" class="text-center">
            <h1 class="mt-3">Tabel masih kosong...</h1>
        </td>`;
}

function searchTable_Vanilla(tableId, searchStr) {
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        for (let j = 0; j < cells.length; j++) {
            if (cells[j].textContent.includes(searchStr)) {
                return true; // The string is found, return true
            }
        }
    }

    return false; // The string is not found, return false
}
//#endregion

function fetchStmt(urlString) {
    fetch(urlString)
        .then((response) => response.json())
        .then((data) => {
            if (data == 1) console.log("QUERY BERHASIL KAWAN!");
            console.log("urlString = " + urlString);
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function toSnakeCase(inputString) {
    return inputString.toLowerCase().replace(/\s+/g, "_");
}

function getCurrentDate() {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, "0");
    const day = String(currentDate.getDate()).padStart(2, "0");
    dateInput.value = `${year}-${month}-${day}`;
}
