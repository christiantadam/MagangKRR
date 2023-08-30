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
    tableHeight = null
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
        scrollY: tableHeight != null ? tableHeight : "250px",
        scrollX: colWidths != null ? "1000000px" : "",
        data: listData,
        columns: colObject,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder:
                " Tabel " + tableId.replace("table_", "") + "...",
            search: "",
            info: "Menampilkan _TOTAL_ data",
        },

        rowCallback: function (row, data, index) {
            if ($(row).hasClass("odd") || $(row).hasClass("even")) {
                if (rowFun != null) {
                    row.style.cursor = "pointer";
                    row.addEventListener("click", function () {
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

function addSearchBar_DataTable(tableId) {
    var searchInput = $(`#${tableId}_filter input[type="search"]`).addClass(
        "form-control"
    );

    searchInput.wrap('<div class="input-group"></div>');
    searchInput.before('<span class="input-group-text">Cari:</span>');
}

function clearSelection_DataTable(tableId) {
    const dataTable = $("#" + tableId).DataTable();
    const rows = dataTable.rows().nodes().toArray();
    rows.forEach((row) => {
        row.style.backgroundColor = "white";
    });
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

function addOptionIfNotExists(
    selectEle,
    value,
    text = "",
    autoSelectTrue = true
) {
    const options = selectEle.options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value === value) {
            if (autoSelectTrue) options[i].selected = true;
            return;
        }
    }

    const newOption = new Option(text, value);
    if (autoSelectTrue) newOption.selected = true;
    selectEle.appendChild(newOption);
}

function addLoadingOption(selectEle) {
    const loadingOption = new Option("Memuat data...", "loading");
    loadingOption.disabled = true;
    selectEle.appendChild(loadingOption);

    return loadingOption;
}

function removeOption(selectEle, optValue) {
    const optionToRemove = selectEle.querySelector(
        'option[value="' + optValue + '"]'
    );

    if (optionToRemove) {
        selectEle.removeChild(optionToRemove);
    }
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
    `;

    selectEle.selectedIndex = 0;
}
//#endregion

function fetchStmt(urlString, postAction = null, catchAction = null) {
    fetch(urlString)
        .then((response) => response.json())
        .then((data) => {
            console.log("urlString = " + urlString);
            if (data == 1) console.log("QUERY BERHASIL KAWAN!");

            if (postAction != null) {
                postAction();
            }
        })
        .catch((error) => {
            if (catchAction != null) {
                catchAction();
            }

            alert(
                "Terdapat kendala saat memproses data, mohon segera hubungi Pak Adam.\n" +
                    "ERROR: " +
                    urlString
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
            console.log("urlString = " + urlString);

            if (data.length == 0) {
                console.log("DATA KOSONG!");

                if (selectOption != null) {
                    selectOption.textContent = "Data tidak ditemukan!";
                }
            }

            console.log("Data yang terfetch:");
            console.log(data);

            postAction(data);
        })
        .catch((error) => {
            if (catchAction != null) {
                catchAction();
            }

            if (selectOption != null) {
                selectOption.textContent = "Terdapat kendala saat memuat data.";
            } else {
                alert(
                    "Terdapat kendala saat memuat data, mohon segera hubungi Pak Adam.\nERROR: " +
                        urlString
                );
            }

            console.error("Error: ", error);
        });
}

function clearCheckedBoxes(checkboxes, checkedCheckbox) {
    checkboxes.forEach(function (checkbox) {
        if (checkbox !== checkedCheckbox) {
            checkbox.checked = false;
        }
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

function getCurrentDate(monthYearOnly = false) {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, "0");
    const day = String(currentDate.getDate()).padStart(2, "0");

    if (monthYearOnly) {
        return `${month}/${year}`;
    } else {
        return `${year}-${month}-${day}`;
    }
}

function getCurrentTime() {
    const currentTime = new Date();
    const hours = currentTime.getHours();
    const minutes = currentTime.getMinutes();
    const seconds = currentTime.getSeconds();

    return `${hours} : ${minutes} : ${seconds}`;
}

function getTimeDiff(startTime, endTime, type) {
    const timeDifference = startTime.getTime() - endTime.getTime();

    if (type == "hour") {
        timeDifference = timeDifference / (1000 * 60 * 60);
    } else if (type == "minute") {
        timeDifference = timeDifference / (1000 * 60);
    }

    return timeDifference;
}

function dateTimeToDate(inputStr) {
    return inputStr.substr(0, 10);
}

function dateTimetoTime(inputStr) {
    return inputStr.split(" ")[1].substr(0, 8);
}
