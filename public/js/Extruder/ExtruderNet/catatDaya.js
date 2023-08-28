//#region Variables
const dateInput = document.getElementById("tanggal");
const timeJamProd = document.getElementById("jam_produksi");

const txtCounter = document.getElementById("counter");
const txtId = document.getElementById("teks_id");
const txtFaktor = document.getElementById("faktor_kali");
const txtTanggal = document.getElementById("data_tgl");

const slcMesin = document.getElementById("select_mesin");

const btnOk = document.getElementById("btn_ok");
const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listOfInput = document.querySelectorAll("#card_daya .form-control");

const tableDayaCol = [
    { width: "50px" }, // No.
    { width: "140px" }, // Tanggal
    { width: "140px" }, // Id Mesin
    { width: "140px" }, // Jam Produksi
    { width: "140px" }, // Counter
    { width: "100px" }, // Faktor Kali
    { width: "140px" }, // Id User
    { width: "140px" }, // Id KwaH
];

const listDaya = [];
/* ISI LIST DAYA
    0 Tanggal
    1 IdMesin
    2 Jam
    3 CounterKWaH
    4 FaktorKali
    5 UserInput
*/

var pilDaya = -1;
var modeProses = "";
//#endregion

//#region Events
dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") slcMesin.focus();
});

timeJamProd.addEventListener("keypress", function (event) {
    if (event.key == "Enter") txtCounter.focus();
});

slcMesin.addEventListener("change", function () {
    timeJamProd.focus();
});

txtCounter.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        // SP_5298_EXT_FAKTOR_KALI
        fetchStmt("/Catat/getFaktorKali/" + slcMesin.value, (data) => {
            if (data[0].FaktorKali !== undefined) {
                txtFaktor.value = data[0].FaktorKali;
            } else {
                alert("Faktor kali tidak ditemukan!");
            }

            btnProses.focus();
        });
    }
});

btnIsi.addEventListener("click", function () {
    modeProses = "isi";
    toggleButtons(2);
    setEnable(true);
    clearData();
    dateInput.focus();
});

btnKoreksi.addEventListener("click", function () {
    if (pilDaya != -1) {
        modeProses = "koreksi";
        toggleButtons(2);
        setEnable(true);
        slcMesin.disabled = true;
        txtCounter.focus();
    } else alert("Belum ada data yang terpilih!");
});

btnHapus.addEventListener("click", function () {
    if (pilDaya != -1) {
        modeProses = "hapus";
        toggleButtons(2);
        btnProses.focus();
    } else alert("Belum ada data yang terpilih!");
});

btnOk.addEventListener("click", function () {
    listDaya.length = 0;
    clearTable_DataTable("table_daya", tableDayaCol.length);

    // SP_5298_EXT_KWAH_MESIN_PERBULAN
    fetchSelect(
        "/Catat/getKwahMesinPerbulan/" +
            txtTanggal.value.split("/")[0] +
            "/" +
            txtTanggal.value.split("/")[1],
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listDaya.push({
                    Tanggal: data[i].Tanggal,
                    IdMesin: data[i].IdMesin,
                    Jam: dateTimetoTime(data[i].Jam),
                    CounterKWaH: data[i].CounterKWaH,
                    UserInput: data[i].UserInput,
                });
            }
        }
    );
});

btnProses.addEventListener("click", function () {
    if (modeProses == "isi") {
        prosesIsi();
    } else if (modeProses == "koreksi") {
        prosesUpdate();
    } else if (modeProses == "hapus") {
        prosesDelete();
    }
});
//#endregion

//#region Functions
function toggleButtons(tmb) {
    switch (tmb) {
        case 1:
            btnIsi.disabled = false;
            btnKoreksi.disabled = false;
            btnHapus.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;

        case 2:
            btnIsi.disabled = true;
            btnKoreksi.disabled = true;
            btnHapus.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";
            break;

        default:
            break;
    }
}

function setEnable(m_value) {
    slcMesin.disabled = !m_value;
    listOfInput.forEach((input) => (input.disabled = !m_value));
}

function clearData() {
    slcMesin.selectedIndex = 0;
    listOfInput.forEach((input) => (input.value = ""));
    timeJamProd.value = "00:00";

    listDaya.length = 0;
    clearTable_DataTable("table_daya", tableDayaCol.length);
}

function prosesIsi() {
    // SP_5298_EXT_INSERT_KWAH_MESIN
    fetchStmt(
        "/Catat/insKwahMesin/" +
            dateInput.value +
            "/" +
            slcMesin.value +
            "/" +
            txtCounter.value +
            "/" +
            txtFaktor.value +
            "/" +
            timeJamProd.value +
            "/" +
            getCurrentTime() +
            "/tmpUser",
        () => {
            setEnable(false);
            toggleButtons(1);
            clearData();
            loadDataKwah();
            btnIsi.focus();
            modeProses = "";
        }
    );
}

function prosesUpdate() {
    // SP_5298_EXT_UPDATE_KWAH_MESIN
    fetchStmt(
        "/Catat/updKwahMesin/" + txtId.value + "/" + txtCounter.value,
        () => {
            setEnable(false);
            slcMesin.disabled = false;
            modeProses = "";
            toggleButtons(1);
            clearData();
            loadDataPerDivisi();
            btnIsi.focus();

            alert("Data berhasil dikoreksi!");
        }
    );
}

function prosesDelete() {
    // SP_5298_EXT_DELETE_KWAH_MESIN
    fetchStmt("/Catat/delKwahMesin/" + txtId.value, () => {
        setEnable(false);
        modeProses = "";
        toggleButtons(1);
        clearData();
        loadDataPerDivisi();
        btnIsi.focus();

        alert("Data berhasil dihapus!");
    });
}

function loadDataKwah() {
    listDaya.length = 0;
    clearTable_DataTable("table_daya", tableDayaCol.length);

    // SP_5298_EXT_LISTDATA_KWAH_MESIN
}
//#endregion

function init() {
    $("#table_daya").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableDayaCol,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel daya...",
            search: "",
            info: "Menampilkan _TOTAL_ data",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    dateInput.value = getCurrentDate();
    timeJamProd.value = "00:00";
    txtTanggal.value = getCurrentDate(true);

    toggleButtons(1);
    setEnable(false);
    loadDataKwahMesin();
    btnIsi.focus();
}

$(document).ready(() => {
    init();
});
