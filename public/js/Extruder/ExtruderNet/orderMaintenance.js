//#region Variables
const dateInput = document.getElementById("tanggal");

const txtNoOrder = document.getElementById("no_order");
const txtIdentifikasi = document.getElementById("identifikasi");
const txtPrimerQty = document.getElementById("primer_qty");
const txtSekunderQty = document.getElementById("sekunder_qty");
const txtTersierQty = document.getElementById("tersier_qty");

const spnPrimerSat = document.getElementById("primer_sat");
const spnSekunderSat = document.getElementById("sekunder_sat");
const spnTersierSat = document.getElementById("tersier_sat");

const btnBaru = document.getElementById("btn_baru");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const btnDetail = document.getElementById("btn_detail");

const slcType = document.getElementById("select_benang");

const listOfDetail = document.querySelectorAll(".card .detail_order");

const listOrder = [];

const tableOrderCol = [
    { width: "300px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
];
//#endregion

//#region Events
btnBaru.addEventListener("click", function () {
    clearTable_DataTable("table_order", tableOrderCol.length);
    clearDataDetail();
    toggleButtons(2);

    txtNoOrder.value = "";
    txtIdentifikasi.value = "";
    listOrder.length = 0;
    txtIdentifikasi.focus();
});

txtIdentifikasi.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        const inputValue = txtIdentifikasi.value.trim();
        if (inputValue === "") {
            txtIdentifikasi.focus();

            alert("Masukkan identifikasi order terlebih dahulu");
        } else {
            slcType.disabled = false;
            slcType.focus();
        }
    }
});

slcType.addEventListener("change", function () {
    if (this.value != "-- Pilih Type Benang --") {
        const [SatPrimer, SatSekunder, SatTirtier] = this.value.split(",");
        spnPrimerSat.textContent = SatPrimer;
        spnSekunderSat.textContent = SatSekunder;
        spnTersierSat.textContent = SatTirtier;

        txtPrimerQty.disabled = false;
        txtPrimerQty.focus();
        txtPrimerQty.value = "";
        txtSekunderQty.value = "";
        txtTersierQty.value = "";
    }
});

txtPrimerQty.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtSekunderQty.disabled = false;
        txtSekunderQty.focus();

        if (this.value == "") {
            this.value = 0;
        }
    }
});

txtSekunderQty.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtTersierQty.disabled = false;
        txtTersierQty.focus();

        if (this.value == "") {
            this.value = 0;
        }
    }
});

txtTersierQty.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        btnDetail.disabled = false;
        btnDetail.focus();

        if (this.value == "") {
            this.value = 0;
        }
    }
});

btnDetail.addEventListener("click", function () {
    // Lakukan pengecekkan untuk tiap input pada card Detail Order
    var isDetailEmpty = false;

    if (slcType.selectedIndex != 0) {
        listOfDetail.forEach((ele) => {
            if (ele.value == "") isDetailEmpty = true;
        });

        if (slcType.selectedIndex == 0) {
            isDetailEmpty = true;
        }
    } else isDetailEmpty = true;

    if (isDetailEmpty) {
        alert("Ada data yang belum terisi. \nMohon periksa kembali.");
        return;
    }

    // Lakukan pencarian terhadap tabel berdasarkan Nama Type
    const isTypeExist = listOrder.some((order) => {
        return order.namaType.includes(
            slcType.options[slcType.selectedIndex].text
        );
    });

    if (isTypeExist) {
        slcType.focus();

        alert("Sudah ada type benang yang sama dalam order.");
    } else {
        let pushedOrder = {
            namaType: slcType.options[slcType.selectedIndex].text,
            satPrimer: spnPrimerSat.textContent,
            qtyPrimer: txtPrimerQty.value,
            satSekunder: spnSekunderSat.textContent,
            qtySekunder: txtSekunderQty.value,
            satTersier: spnTersierSat.textContent,
            qtyTersier: txtTersierQty.value,
        };

        listOrder.push(pushedOrder);
        addTable_DataTable("table_order", listOrder, tableOrderCol);

        // Lakukan konfirmasi apakah ingin melakukan penambahan data lagi
        showModal(
            "Tambah Data",
            "Ingin input data bahan / hasil produksi lagi?",
            () => {
                clearDataDetail();
                slcType.focus();
            },
            () => {
                btnProses.focus();
            }
        );
    }
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButtons(1);
        clearTable_DataTable("table_order", tableOrderCol.length);
        clearDataDetail();
        disableDetail();

        listOrder.length = 0;
    }
});

txtNoOrder.addEventListener("change", function () {
    for (let i = 0; i < listOrder.length; i++) {
        fetchStmt(
            "/Order/insOrderDetail/" +
                txtNoOrder.value +
                "/" +
                toSnakeCase(listOrder[i].namaType) +
                "/" +
                listOrder[i].qtyPrimer +
                "/" +
                listOrder[i].qtySekunder +
                "/" +
                listOrder[i].qtyTersier +
                "/0/0/0"
        );
    }

    fetchStmt("/Order/updCounterOrder/EXT");

    alert("Data berhasil disimpan!");
    toggleButtons(1);
    disableDetail();

    btnBaru.focus();
});

btnProses.addEventListener("click", function () {
    if (listOrder.length < 1) {
        alert("Data order masih kosong!");
    } else {
        fetchStmt(
            "/Order/insOrderBenang/" +
                dateInput.value +
                "/" +
                txtIdentifikasi.value +
                "/tmpUser"
        );

        fetchSelect("/Order/getNoOrder", (data) => {
            txtNoOrder.value = data.NoOrder;
            txtNoOrder.dispatchEvent(new Event("change"));
        });
    }
});

btnBaru.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") {
        if (btnProses.disabled == false) {
            btnProses.focus();
        } else {
            btnKeluar.focus();
        }
    }
});

btnProses.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        btnBaru.focus();
    } else if (event.key === "ArrowRight") {
        btnKeluar.focus();
    }
});

btnKeluar.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        if (btnProses.disabled == false) {
            btnProses.focus();
        } else {
            btnBaru.focus();
        }
    }
});
//#endregion

//#region Functions
function toggleButtons(tmb) {
    switch (tmb) {
        case 1:
            txtIdentifikasi.disabled = true;
            btnBaru.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;
        case 2:
            txtIdentifikasi.disabled = false;
            btnBaru.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";
            break;

        default:
            break;
    }
}

function clearDataDetail() {
    slcType.selectedIndex = 0;
    listOfDetail.forEach((ele) => {
        ele.value = "";
    });
}

function disableDetail() {
    slcType.disabled = true;
    listOfDetail.forEach((ele) => {
        ele.disabled = true;
    });
}

function init() {
    if ($.fn.DataTable.isDataTable("#table_order")) {
        $("#table_order").DataTable().destroy();
    }

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
            info: "Menampilkan _TOTAL_ data",
        },

        initComplete: function () {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    toggleButtons(1);

    btnBaru.focus();
    dateInput.value = getCurrentDate();
}
//#endregion

$(document).ready(() => {
    init();
});
