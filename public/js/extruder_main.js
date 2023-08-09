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

//#region Table DataTable
function addTable_DataTable(
    tableId,
    listData,
    colWidths = null,
    rowFun = null,
    isDblClicked = false,
    tableHeight = "250px"
) {
    if ($.fn.DataTable.isDataTable("#" + tableId)) {
        $("#" + tableId)
            .DataTable()
            .destroy();
    }

    $("#" + tableId + " tbody").empty();

    let colObject = "";
    if (colWidths != null) {
        colObject = Object.keys(listData[0]).map((key, index) => ({
            data: key,
            width: colWidths[index].width || "auto",
        }));
    } else {
        colObject = Object.keys(listData[0]).map((key, index) => ({
            data: key,
        }));
    }

    $("#" + tableId).DataTable({
        responsive: true,
        paging: false,
        scrollY: tableHeight,
        scrollX: colWidths != null ? "1000000px" : "",
        data: listData,
        columns: colObject,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder:
                " Tabel " + tableId.replace("table_", "") + "...",
            search: "",
        },

        rowCallback: function (row, data, index) {
            if (rowFun != null) {
                row.style.cursor = "pointer";

                if (!isDblClicked) {
                    row.addEventListener("click", function () {
                        rowFun(data, index);
                    });
                } else {
                    row.addEventListener("dblclick", function () {
                        rowFun(data, index);
                    });
                }
            }
        },
    });

    addSearchBar_DataTable(tableId);
}

function clearTable_DataTable(tableId, tableWidth, msg = null) {
    $("#" + tableId)
        .DataTable()
        .clear()
        .draw();

    const tbodyKu = document.querySelector("#" + tableId + " tbody");

    var headingStr = `<h1 class="mt-3">Tabel masih kosong...</h1>`;
    if (msg != null) {
        headingStr = `<h1 class="mt-3">${msg}</h1>`;
    }

    var tableStr = `<tr><td colspan="${tableWidth}" class="text-center">${headingStr}</td>`;
    for (let i = 0; i < tableWidth; i++) {
        tableStr += `<td style="display: none"></td>`;
    }
    tableStr += `</tr>`;

    tbodyKu.innerHTML = tableStr;
}

function searchTable_DataTable(tableId, searchStr) {
    const dataTable = $("#" + tableId).DataTable();
    const columnIdx = 0;
    const foundRows = dataTable
        .column(columnIdx)
        .search(searchStr, true, false)
        .draw();

    return foundRows > 0;
}

function addSearchBar_DataTable(tableId) {
    var searchInput = $(`#${tableId}_filter input[type="search"]`).addClass(
        "form-control"
    );
    searchInput.wrap('<div class="input-group"></div>');
    searchInput.before('<span class="input-group-text">Cari:</span>');

    // console.log("Halo dunia!");
}
//#endregion

//#region Select Options
function addOptions(selectId, optionData, keyMapping) {
    const selectEle = document.getElementById(selectId);
    optionData = JSON.parse(optionData);

    for (let i = 0; i < optionData.length; i++) {
        const newOption = document.createElement("option");

        if (keyMapping.valueKey && keyMapping.textKey) {
            newOption.value = optionData[i][keyMapping.valueKey];
            newOption.text = optionData[i][keyMapping.textKey];
            selectEle.appendChild(newOption);
        }
    }
}

function addOptionIfNotExists(selectEle, value, text, autoSelect = true) {
    const options = selectEle.options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value === value) {
            if (autoSelect) options[i].selected = true;
            return;
        }
    }

    const newOption = new Option(text, value);
    if (autoSelect) newOption.selected = true;
    selectEle.appendChild(newOption);
}

function clearOptions(selectId, onlySelection) {
    const selectEle = document.getElementById(selectId);
    selectEle.selectedIndex = 0;

    if (!onlySelection) {
        selectEle.innerHTML = `
            <option selected disabled>
                -- Pilih ${snakeCaseToTitleCase(
                    selectId.replace("select_", "")
                )} --
            </option>

            <option value="loading" style="display: none" disabled>
                Loading...
            </option>
        `;
    }
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

function snakeCaseToTitleCase(input) {
    return input
        .split("_")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");
}

function toSnakeCase(inputStr) {
    return inputStr.toLowerCase().replace(/\s+/g, "_");
}

function getCurrentDate() {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, "0");
    const day = String(currentDate.getDate()).padStart(2, "0");
    dateInput.value = `${year}-${month}-${day}`;
}

function dateTimeToDate(inputStr) {
    return inputStr.substr(0, 10);
}

function dateTimetoTime(inputStr) {
    return inputStr.split(" ")[1].substr(0, 8);
}
