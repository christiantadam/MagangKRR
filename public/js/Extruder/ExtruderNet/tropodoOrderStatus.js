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

const listOrder = [];

const tableOrderWidth = 4;
const tableOrderCol = [
    { width: "225px" },
    { width: "500px" },
    { width: "225px" },
    { width: "225px" },
];
//#endregion

//#region Events
slcOrder.addEventListener("change", function () {
    if (this.value != "-- Pilih Nomor Order --") {
        listOfInput.forEach((input) => {
            input.value = "";
        });

        clearTable_DataTable("table_order", tableOrderWidth, "Memuat data...");

        fetch("/Order/getListOrderBtl/" + slcOrder.value)
            .then((response) => response.json())
            .then((data) => {
                listOrder.length = 0;
                var tglKu = "";
                for (let i = 0; i < data.length; i++) {
                    tglKu = data[i].TanggalOrder.split(" ")[0].split("-");
                    listOrder.push({
                        TanggalOrder: `${tglKu[2]}-${tglKu[1]}-${tglKu[0]}`,
                        TypeBenang: data[i].TypeBenang,
                        JumlahTritier: data[i].JumlahTritier,
                        JumlahProduksiTritier: data[i].JumlahProduksiTritier,
                    });
                }

                addTable_DataTable(
                    "table_order",
                    listOrder,
                    tableOrderCol,
                    rowClicked
                );
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
            "/Order/updStatusOrder/" +
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
    $("#table_order").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableOrderCol,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel order...",
            search: "",
        },

        initComplete: function () {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );
            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });
    slcOrder.focus();
}
//#endregion

$(document).ready(() => {
    init();
});
