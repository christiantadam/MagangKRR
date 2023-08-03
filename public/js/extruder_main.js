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
function addTable_DataTable(
    tableId,
    listData,
    rowFun = null,
    tableHeight = "250px"
) {
    if ($.fn.DataTable.isDataTable("#" + tableId)) {
        $("#" + tableId)
            .DataTable()
            .destroy();
    }

    $("#" + tableId + " tbody").empty();

    $("#" + tableId).DataTable({
        responsive: true,
        paging: false,
        scrollY: tableHeight,
        data: listData,
        columns: Object.keys(listData[0]).map((key) => ({ data: key })),
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
    $("#" + tableId)
        .DataTable()
        .clear()
        .draw();

    const tbodyKu = document.querySelector("#" + tableId + " tbody");
    tbodyKu.innerHTML = `
        <tr>
            <td colspan="7" class="text-center">
                <h1 class="mt-3">Tabel masih kosong...</h1>
            </td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
        </tr>
    `;
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
