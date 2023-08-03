//#region Variables
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

var checkboxes = null;

var listOrder = [];
var listDetail = [];
//#endregion

//#region Events
btnProses.addEventListener("click", function () {
    const checkedOrder = [];
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            checkedOrder.push(checkbox.id);
        }
    });

    checkedOrder.forEach((order) => {
        fetchStmt("/ExtruderNet/updAccOrder/" + order + "/tmpUser");
    });

    alert("Data berhasil tersimpan!");
    clearTable("table_type");
    showOrder();
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/ExtruderNet";
});

btnProses.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") {
        btnKeluar.focus();
    }
});

btnKeluar.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        btnProses.focus();
    }
});
//#endregion

//#region Functions
function showOrder() {
    listTableOrder = [];

    fetch("/ExtruderNet/getOrderBlmAcc/EXT")
        .then((response) => response.json())
        .then((data) => {
            listTableOrder = [];
            const strCheckBox = `<input class="form-check-input" type="checkbox" id="`;
            for (let i = 0; i < data.length; i++) {
                listTableOrder.push({
                    Identifikasi:
                        strCheckBox +
                        data[i].IDOrder +
                        `"> ` +
                        data[i].Identifikasi,
                    IDOrder: data[i].IDOrder,
                });
            }

            addTable_DataTable("table_order", listTableOrder, rowClicked);

            checkboxes = document.querySelectorAll("input[type='checkbox']");
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("click", function (event) {
                    event.stopPropagation();
                });
            });
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function rowClicked(data) {
    const tbodyType = document.querySelector("#table_type tbody");
    tbodyType.innerHTML = `
        <tr>
            <td colspan="7" class="text-center">
                <h1 class="mt-3">Memuat data...</h1>
            </td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
        </tr>
    `;

    fetch("/ExtruderNet/getListSpek/" + data.IDOrder)
        .then((response) => response.json())
        .then((dataFetch) => {
            listTableType = [];
            for (let i = 0; i < dataFetch.length; i++) {
                listTableType.push({
                    TypeBenang: dataFetch[i].TypeBenang,
                    JumlahPrimer: dataFetch[i].JumlahPrimer,
                    SatuanPrimer: "NULL",
                    JumlahSekunder: dataFetch[i].JumlahSekunder,
                    SatuanSekunder: "NULL",
                    JumlahTritier: dataFetch[i].JumlahTritier,
                    SatuanTritier: "KG",
                });
            }

            addTable_DataTable("table_type", listTableType);

            if (dataFetch.length <= 0) {
                tbodyType.innerHTML =
                    `<tr><td colspan="7"><h3 class="mt-3">Data untuk <b>Order ` +
                    data.IDOrder +
                    `</b> tidak ditemukan.</h3></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td></tr>`;
            }
        });
}

function init() {
    $("#table_order").DataTable({ responsive: true, paging: false });
    $("#table_type").DataTable({ responsive: true, paging: false });
    showOrder();
}
//#endregion

$(document).ready(() => {
    init();
});
