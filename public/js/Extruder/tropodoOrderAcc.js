//#region Variables
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

var checkboxes = null;

var listOrder = [];
var listDetail = [];
//#endregion

//#region Events
btnProses.addEventListener("click", function () {
    var success = true;
    const checkedOrder = [];
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            checkedOrder.push(checkbox.id);
        }
    });
});
//#endregion

//#region Functions
function showOrder() {
    listOrder = [];
    listDetail = [];

    fetch("/ExtruderNet/getOrderBlmAcc/EXT")
        .then((response) => response.json())
        .then((data) => {
            listOrder = [];
            const strCheckBox = `<input class="form-check-input" type="checkbox" id="`;
            for (let i = 0; i < data.length; i++) {
                listOrder.push({
                    Identifikasi:
                        strCheckBox +
                        data[i].Identifikasi +
                        `"> ` +
                        data[i].Identifikasi,
                    IDOrder: data[i].IDOrder,
                });
            }

            addDataToTable("table_order", listOrder);
            clickableTableOrder();

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

function clickableTableOrder() {
    const tableRows = document.querySelectorAll("#table_order tbody tr");
    tableRows.forEach((row) => {
        row.addEventListener("click", function () {
            const tableTypeRow = document.querySelector("#table_type tbody");
            tableTypeRow.innerHTML = `
                <tr><h1 class="mt-3">Memuat data...</h1></tr>
            `;

            const cells = this.querySelectorAll("td");
            console.log(cells[1].textContent);
            fetch("/ExtruderNet/getListSpek/" + cells[1].textContent)
                .then((response) => response.json())
                .then((data) => {
                    listDetail = [];
                    for (let i = 0; i < data.length; i++) {
                        listDetail.push({
                            TypeBenang: data[i].TypeBenang,
                            JumlahPrimer: data[i].JumlahPrimer,
                            SatuanPrimer: "NULL",
                            JumlahSekunder: data[i].JumlahSekunder,
                            SatuanSekunder: "NULL",
                            JumlahTritier: data[i].JumlahTritier,
                            SatuanTritier: "KG",
                        });
                    }

                    addDataToTable("table_type", listDetail);

                    if (data.length <= 0) {
                        const tableTypeRow =
                            document.querySelector("#table_type tbody");
                        tableTypeRow.innerHTML =
                            `<tr><td colspan="7"><h3 class="mt-3">Data untuk <b>Order ` +
                            cells[0].textContent +
                            `</b> tidak ditemukan.</h3></td></tr>`;
                    }
                });
        });
    });
}
//#endregion
