(function () {
    "use strict";

    // Animation on scroll
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
const btnConfirm = document.getElementById("btn_confirm_md");
const btnCancel = document.getElementById("btn_cancel_md");
const btnClose = document.getElementById("btn_close_md");
const modalConfirmBody = document.getElementById("modal_body");

$("#confirmation_modal").on("shown.bs.modal", function () {
    $("#btn_confirm_md").focus();
});

$("#confirmation_modal").on("keydown", function (event) {
    const btnConfirmJQ = $("#btn_confirm_md");
    const btnCancelJQ = $("#btn_cancel_md");

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

function showModal(
    txtBtn,
    txtBody,
    confirmFun,
    cancelFun = null,
    txtCancel = null,
    closeFun = null
) {
    modalConfirmBody.innerHTML = txtBody;
    btnConfirm.textContent = txtBtn;
    btnConfirm.onclick = confirmFun;
    btnCancel.textContent = "Batal";
    btnCancel.onclick = cancelFun;
    btnClose.onclick = closeFun == null ? cancelFun : closeFun;
    if (txtCancel != null) btnCancel.textContent = txtCancel;

    $("#confirmation_modal").modal({ backdrop: "static", keyboard: false });
    $("#confirmation_modal").modal("show");
}
//#endregion

//#region Table DataTable
function addTable_DataTable(
    tableId,
    listData,
    columnsWidth = null,
    rowFun = null,
    tableHeight = null,
    extraParam = ""
) {
    if ($.fn.DataTable.isDataTable("#" + tableId)) {
        $("#" + tableId)
            .DataTable()
            .destroy();
    }

    $("#" + tableId + " tbody").empty();

    let colObject = "";
    if (columnsWidth != null) {
        colObject = columnsWidth.map((colWidth, index) => {
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

    if (extraParam == "table_only") {
        /**
         * Digunakan pada Tabel Afalan di formKomposisiMojosari
         */

        $("#" + tableId).DataTable({
            responsive: true,
            paging: false,
            scrollY: tableHeight != null ? tableHeight : "250px",
            scrollX: columnsWidth != null ? "1000000px" : "",
            data: listData,
            columns: colObject,
            searching: false,
            info: false,

            rowCallback: function (row, data, index) {
                if ($(row).hasClass("odd") || $(row).hasClass("even")) {
                    if (rowFun != null) {
                        row.style.cursor = "pointer";
                        row.onclick = () => {
                            rowFun(row, data, index);
                        };
                    }
                }
            },
        });
    } else if (extraParam == "dom_empty") {
        /**
         * Digunakan pada Tabel Konversi di formBenangACC
         */

        $("#" + tableId).DataTable({
            responsive: true,
            paging: false,
            scrollY: tableHeight != null ? tableHeight : "250px",
            scrollX: columnsWidth != null ? "1000000px" : "",
            data: listData,
            columns: colObject,
            language: {
                searchPlaceholder:
                    " Tabel " +
                    tableId.replace("table_", "").replace("_", " ") +
                    "...",
                search: "",
                info: "Menampilkan _TOTAL_ data",
            },

            rowCallback: function (row, data, index) {
                if ($(row).hasClass("odd") || $(row).hasClass("even")) {
                    if (rowFun != null) {
                        row.style.cursor = "pointer";
                        row.onclick = () => {
                            rowFun(row, data, index);
                        };
                    }
                }
            },
        });

        addSearchBar_DataTable(tableId);
    } else {
        $("#" + tableId).DataTable({
            responsive: true,
            paging: false,
            scrollY: tableHeight != null ? tableHeight : "250px",
            scrollX: columnsWidth != null ? "1000000px" : "",
            data: listData,
            columns: colObject,
            dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
            language: {
                searchPlaceholder:
                    " Tabel " +
                    tableId.replace("table_", "").replace("_", " ") +
                    "...",
                search: "",
                info: "Menampilkan _TOTAL_ data",
            },

            rowCallback: function (row, data, index) {
                if ($(row).hasClass("odd") || $(row).hasClass("even")) {
                    if (rowFun != null) {
                        row.style.cursor = "pointer";
                        row.onclick = () => {
                            rowFun(row, data, index);
                        };
                    }
                }
            },
        });

        addSearchBar_DataTable(tableId);
    }
}

function clearTable_DataTable(tableId, tableWidth, msg = null) {
    $("#" + tableId)
        .DataTable()
        .clear()
        .draw();

    const tbodyKu = document.querySelector("#" + tableId + " tbody");

    /**
     * Keterangan untuk variabel "msg"
     *
     * Bila input variabel berupa array maka:
     * 0 Padding teks keterangan (dgn. format "padding=999px")
     * 1 Isi teks keterangan yang akan ditampilkan
     *
     * Input bisa berupa String saja,
     * Maka akan melakukan aksi indeks 1 saja
     */

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

function clearCheckedBoxes(checkboxes, checkedCheckbox) {
    checkboxes.forEach(function (checkbox) {
        if (checkbox !== checkedCheckbox) {
            checkbox.checked = false;
        }
    });
}

function findClickedRowInList(list, targetKey, targetValue) {
    // console.log("Item yang dicari: " + targetValue);
    for (let i = 0; i < list.length; i++) {
        const item = list[i];
        if (item.hasOwnProperty(targetKey) && item[targetKey] === targetValue) {
            // console.log("Item yang ditemukan: " + item[targetKey]);
            return i;
        }
    }
    return -1;
}
//#endregion

//#region Select Options
function addOptions(selectEle, optionData, keyMapping, showId = true) {
    for (let i = 0; i < optionData.length; i++) {
        const newOption = document.createElement("option");

        if (keyMapping.valueKey && keyMapping.textKey) {
            if (showId == "swap") {
                newOption.value = optionData[i][keyMapping.textKey];
                newOption.text = `${optionData[i][keyMapping.valueKey]}`;
            } else {
                newOption.value = optionData[i][keyMapping.valueKey];
                newOption.text = showId
                    ? `${optionData[i][keyMapping.valueKey]} |
                        ${optionData[i][keyMapping.textKey]}`
                    : optionData[i][keyMapping.textKey];
            }

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

    const newOption = new Option(text == "" ? value : text, value);
    if (autoSelectTrue) newOption.selected = true;
    selectEle.appendChild(newOption);
}

function addLoadingOption(selectEle) {
    const loadingOption = new Option("Memuat data...", "loading");
    loadingOption.disabled = true;
    selectEle.appendChild(loadingOption);

    return loadingOption;
}

function removeOption(selectEle, optValue = "", optChar = "") {
    /**
     * optValue, menghapus option dengan value tersebut
     *
     * optChar, menghapus option yang tidak memiliki karakter tersebut,
     * Indeks ke-0 tidak ikut diseleksi.
     */

    let optionToRemove = null;
    if (optValue != "") {
        optionToRemove = selectEle.querySelector(
            'option[value="' + optValue + '"]'
        );
    } else if (optChar != "") {
        for (var i = 1; i < selectEle.options.length; i++) {
            var optionText = selectEle.options[i].textContent;

            if (optionText.indexOf(optChar) === -1) {
                optionToRemove = selectEle.options[i];
            }
        }
    }

    if (optionToRemove) {
        selectEle.removeChild(optionToRemove);
    }
}

function clearOptions(selectEle, selectLbl = "") {
    selectHead =
        selectLbl == ""
            ? "Pilih " +
              snakeCaseToTitleCase(
                  selectEle.getAttribute("id").replace("select_", "")
              )
            : selectLbl;

    selectEle.innerHTML = `
        <option selected disabled>
            -- ${selectHead} --
        </option>
    `;

    selectEle.selectedIndex = 0;
}
//#endregion

function fetchStmt(urlString, postAction = null, catchAction = null) {
    fetch(encodeURL(urlString))
        .then((response) => {
            if (!response.ok) throw new Error("Network response was not ok!");
            return response.json();
        })
        .then((data) => {
            console.log("urlString = " + urlString);
            if (data == 1) console.log("QUERY BERHASIL KAWAN!");
            if (postAction != null) postAction();
        })
        .catch((error) => {
            if (catchAction != null) catchAction();

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
    fetch(encodeURL(urlString))
        .then((response) => {
            if (!response.ok) throw new Error("Network response was not ok!");
            return response.json();
        })
        .then((data) => {
            console.log("urlString = " + urlString);

            if (data.length == 0) {
                console.log("DATA KOSONG!");

                if (selectOption != null)
                    selectOption.textContent = "Data tidak ditemukan!";
            }

            console.log("Data yang terfetch:");
            console.log(data);

            postAction(data);
        })
        .catch((error) => {
            if (catchAction != null) catchAction();

            if (selectOption != null) {
                selectOption.textContent = "Terdapat kendala saat memuat data.";
            } else {
                alert(
                    "Terdapat kendala saat memuat data, mohon segera hubungi Pak Adam." +
                        "\nERROR: " +
                        urlString
                );
            }

            console.error("Error: ", error);
        });
}

function encodeURL(urlString) {
    return urlString.replace(/:/g, "%3A");
}

function padLeft(str, length, char) {
    while (str.length < length) str = char + str;
    return str;
}

function snakeCaseToTitleCase(inputStr) {
    return inputStr
        .split("_")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");
}

function toSnakeCase(inputStr) {
    return inputStr.toLowerCase().replace(/\s+/g, "_");
}

function getCurrentDate(monthYearOnly = false, extraParam = null) {
    const currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = String(currentDate.getMonth() + 1).padStart(2, "0");
    let day = String(currentDate.getDate()).padStart(2, "0");

    if (extraParam != null) {
        if (extraParam.split(",")[0] == "month") {
            month = parseFloat(month) + parseFloat(extraParam.split(",")[1]);
            month = String(month).padStart(2, "0");
        }
    }

    if (monthYearOnly) {
        return `${month}/${year}`;
    } else {
        return `${year}-${month}-${day}`;
    }
}

function formatDateToDDMMYY(inputDate) {
    const date = new Date(inputDate);
    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const year = String(date.getFullYear()).slice(-2);
    return `${day}-${month}-${year}`;
}

function getCurrentTime(timeStr = "") {
    const currentTime = new Date();
    const hours = currentTime.getHours().toString().padStart(2, "0");
    const minutes = currentTime.getMinutes().toString().padStart(2, "0");
    const seconds = currentTime.getSeconds().toString().padStart(2, "0");

    if (timeStr === "hh:mm") {
        return `${hours}:${minutes}`;
    } else {
        return `${hours}:${minutes}:${seconds}`;
    }
}

function calculateTimeDifference(dt_ele1, dt_ele2) {
    // Get the values of the datetime inputs
    const datetime1 = new Date(dt_ele1.value);
    const datetime2 = new Date(dt_ele2.value);

    // Calculate the time difference in milliseconds
    const timeDifference = Math.abs(datetime1 - datetime2);

    // Calculate hours and minutes
    const hoursDifference = Math.floor(timeDifference / (60 * 60 * 1000));
    const minutesDifference = Math.floor(
        (timeDifference % (60 * 60 * 1000)) / (60 * 1000)
    );

    // Display the difference
    // console.log(`Hour Difference: ${hoursDifference} hours`);
    // console.log(`Minute Difference: ${minutesDifference} minutes`);

    return [hoursDifference, minutesDifference];
}

function dateTimeToDate(dateTimeStr) {
    return dateTimeStr.substr(0, 10);
}

function dateTimetoTime(dateTimeStr) {
    return dateTimeStr.split(" ")[1].substr(0, 8);
}
