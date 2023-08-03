//#region Variables
const dateInput = document.getElementById("tanggal");

const txtSpek = document.getElementById("spek");
const txtJmlhOrder = document.getElementById("jmlh_order");
const txtJmlhProd = document.getElementById("jmlh_produksi");
const txtKeterangan = document.getElementById("keterangan");

const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const slcOrder = document.getElementById("select_order");
const slcStatus = document.getElementById("select_status");

const listOfInput = document.querySelectorAll(".card .form-control");
//#endregion

//#region Events
slcOrder.addEventListener("change", function () {
    if (this.value != "-- Pilih Nomor Order --") {
        listOfInput.forEach((input) => {
            input.value = "";
        });

        const tableTypeRow = document.querySelector("#table_order tbody");
        tableTypeRow.innerHTML = `
            <tr>
                <td colspan="4" class="text-center">
                    <h1 class="mt-3">Memuat data...</h1>
                </td>
                <td style="display: none"></td>
                <td style="display: none"></td>
                <td style="display: none"></td>
            </tr>
        `;

        fetch("/ExtruderNet/getListOrderBtl/" + slcOrder.value)
            .then((response) => response.json())
            .then((data) => {
                listForTable = [];
                var tglKu = "";
                for (let i = 0; i < data.length; i++) {
                    tglKu = data[i].TanggalOrder.split(" ")[0].split("-");
                    listForTable.push({
                        TanggalOrder: `${tglKu[2]}-${tglKu[1]}-${tglKu[0]}`,
                        TypeBenang: data[i].TypeBenang,
                        JumlahTritier: data[i].JumlahTritier,
                        JumlahProduksiTritier: data[i].JumlahProduksiTritier,
                    });
                }

                addTable_DataTable("table_order", listForTable, rowClicked);
                window.scrollTo(0, document.body.scrollHeight);
            })
            .catch((error) => {
                console.error("Error: ", error);
            });

        slcStatus.focus();
    }
});

slcStatus.addEventListener("change", function () {
    if (this.value != "-- Pilih Status --") {
        txtKeterangan.focus();
    }
});

txtKeterangan.addEventListener("keyup", function (event) {
    if (event.key == "Enter") {
        btnProses.disabled = false;
        btnProses.focus();
    }
});

btnProses.addEventListener("click", function () {
    if (slcStatus.value == "-- Pilih Status --") {
        alert("Status masih belum terpilih!");
        slcStatus.focus();
    } else if (txtKeterangan.value == "") {
        alert("Keterangan masih belum terisi!");
        txtKeterangan.focus();
    } else {
        fetchStmt(
            "/ExtruderNet/updStatusOrder/" +
                slcOrder.value +
                "/" +
                slcStatus.value +
                "/" +
                toSnakeCase(txtKeterangan.value)
        );

        alert("Data telah diproses!");
        btnProses.disabled = true;
        clearData();
    }
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
function clearData() {
    slcOrder.selectedIndex = 0;
    txtJmlhOrder.value = "";
    txtJmlhProd.value = "";
    txtKeterangan.value = "";
}

function rowClicked(data) {
    tglKu = data.TanggalOrder.split("-");
    dateInput.value = `${tglKu[2]}-${tglKu[1]}-${tglKu[0]}`;

    txtSpek.value = data.TypeBenang;
    txtJmlhOrder.value = data.JumlahTritier;
    txtJmlhProd.value = data.JumlahProduksiTritier;
}

function init() {
    $("#table_order").DataTable({ responsive: true, paging: false });
    slcOrder.focus();
}
//#endregion

$(document).ready(() => {
    init();
});
