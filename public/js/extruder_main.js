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
    modalConfirmBody.innerHTML = txtBody;

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
    tableHeight = "250px",
    isDblClick = false
) {
    if ($.fn.DataTable.isDataTable("#" + tableId)) {
        $("#" + tableId)
            .DataTable()
            .destroy();
    }

    $("#" + tableId + " tbody").empty();

    let colObject = "";
    if (colWidths != null) {
        colObject = colWidths.map((colWidth, index) => {
            return {
                data: Object.keys(listData[0])[index],
                width: colWidth.width || "auto",
            };
        });
    } else {
        colObject = Object.keys(listData[0]).map((key) => ({
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

                if (!isDblClick) {
                    row.addEventListener("click", function () {
                        rowFun(row, data, index);
                    });
                } else {
                    row.addEventListener("click", function () {
                        if (row.style.background == "white") {
                            row.style.background = "aliceblue";
                        }
                    });

                    row.addEventListener("dblclick", function () {
                        if (row.style.background != "lightblue") {
                            row.style.background = "lightblue";
                        } else {
                            row.style.background = "white";
                        }

                        rowFun(row, data, index);
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
    var styleStr = `class="text-center"`;
    if (msg != null) {
        if (msg instanceof Array) {
            styleStr = `style="padding-left: ${msg[0].split("=")[1]}"`;
            headingStr = `<h1 class="mt-3">${msg[1]}</h1>`;
        } else {
            if (msg.includes("padding=")) {
                styleStr = `style="padding-left: ${msg.split("=")[1]}"`;
            } else {
                headingStr = `<h1 class="mt-3">${msg}</h1>`;
            }
        }
    }

    var tableStr = `<tr><td colspan="${tableWidth}" ${styleStr}>${headingStr}</td>`;
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
}

function addRadioToData(listData, modifiedCol, radioName) {
    const modifiedData = listData;
    const radioBtnStr = `<input class="form-check-input" type="radio" id="`;

    modifiedData[modifiedCol] = `
        ${radioBtnStr}${modifiedData[modifiedCol]}" name="${radioName}"> ${modifiedData[modifiedCol]}
    `;

    return modifiedData;
}
//#endregion

//#region Select Options
function addOptions(selectEle, optionData, keyMapping, showId = true) {
    for (let i = 0; i < optionData.length; i++) {
        const newOption = document.createElement("option");

        if (keyMapping.valueKey && keyMapping.textKey) {
            newOption.value = optionData[i][keyMapping.valueKey];
            newOption.text = showId
                ? `${optionData[i][keyMapping.valueKey]} |
                    ${optionData[i][keyMapping.textKey]}`
                : optionData[i][keyMapping.textKey];

            selectEle.appendChild(newOption);
        }
    }
}

function addOptionIfNotExists(selectEle, value, text = "", autoSelect = true) {
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

function addLoadingOption(selectEle) {
    const loadingOption = new Option("Memuat data...", "loading");
    loadingOption.disabled = true;
    selectEle.appendChild(loadingOption);

    return loadingOption;
}

function clearOptions(selectEle, selectLbl = "") {
    selectHead =
        selectLbl == ""
            ? snakeCaseToTitleCase(
                  selectEle.getAttribute("id").replace("select_", "")
              )
            : selectLbl;

    selectEle.innerHTML = `
        <option selected disabled>
            -- Pilih ${selectHead} --
        </option>

        <option value="loading" style="display: none" disabled>
            Memuat data...
        </option>
    `;

    selectEle.selectedIndex = 0;
}
//#endregion

function fetchStmt(urlString, postAction = null, catchAction = null) {
    fetch(urlString)
        .then((response) => response.json())
        .then((data) => {
            if (data == 1) console.log("QUERY BERHASIL KAWAN!");
            console.log("urlString = " + urlString);

            if (postAction != null) {
                postAction();
            }
        })
        .catch((error) => {
            if (catchAction != null) {
                catchAction();
            }

            alert(
                "Terdapat kendala saat memproses data, mohon segera hubungi Pak Adam."
            );
            console.error("Error: ", error);
        });
}

function fetchSelect(
    urlString,
    postAction,
    selectOption = null,
    catchAction = null
) {
    fetch(urlString)
        .then((response) => response.json())
        .then((data) => {
            if (data.length == 0) {
                console.log("DATA KOSONG!");

                if (selectOption != null) {
                    selectOption.textContent = "Data tidak ditemukan!";
                }
            }
            postAction(data);

            console.log("urlString = " + urlString);
            console.log("data = " + data);
        })
        .catch((error) => {
            if (catchAction != null) {
                catchAction();
            }

            if (selectOption != null) {
                selectOption.textContent = "Terdapat kendala saat memuat data.";
            } else {
                alert(
                    "Terdapat kendala saat memuat data, mohon segera hubungi Pak Adam."
                );
            }

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
    return `${year}-${month}-${day}`;
}

function dateTimeToDate(inputStr) {
    return inputStr.substr(0, 10);
}

function dateTimetoTime(inputStr) {
    return inputStr.split(" ")[1].substr(0, 8);
}
