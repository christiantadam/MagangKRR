//#region Variables
const dateInput = document.getElementById("tanggal");

const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");
const timeGangAwal = document.getElementById("waktu_awal");
const timeGangAkhir = document.getElementById("waktu_akhir");

const slcKodeMesin = document.getElementById("select_kode_mesin");
const slcKomposisi = document.getElementById("select_komposisi");
const slcGangguan = document.getElementById("select_gangguan");

const txtNoTransaksi = document.getElementById("no_transaksi");
const txtShift = document.getElementById("shift");
const txtJmlhJam = document.getElementById("jmlh_jam");
const txtJmlhMenit = document.getElementById("jmlh_menit");
const txtKeterangan = document.getElementById("keterangan");
const txtTanggal = document.getElementById("data_tgl");

const radMasuk = document.getElementById("radio_masuk");
const radLibur = document.getElementById("radio_libur");

const btnOk = document.getElementById("btn_ok");
const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const tableGangguanCol = [
    { width: "125px" }, // No. Transaksi
    { width: "100px" }, // Tanggal
    { width: "100px" }, // Id Mesin
    { width: "100px" }, // Nama Mesin
    { width: "100px" }, // Id Konversi
    { width: "50px" }, // Id Gangguan
    { width: "125px" }, // Nama Gangguan
    { width: "100px" }, // Awal Gangguan
    { width: "100px" }, // Akhir Gangguan
    { width: "100px" }, // Jumlah Jam
    { width: "110px" }, // Jumlah Menit
    { width: "125px" }, // Keterangan
];

const listOfInputTransaksi = document.querySelectorAll(
    "#card_transaksi .form-control, .form-check-input, #card_transaksi .form-select"
);

const listOfInputGangguan = document.querySelectorAll(
    "#card_gangguan .form-control, #card_gangguan .form-select"
);

var modeProses = "";
//#endregion

//#region Events
dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        slcKodeMesin.focus();
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
    listOfInputTransaksi.forEach((input) => {
        input.disabled = m_value;
    });

    listOfInputGangguan.forEach((input) => {
        input.disabled = m_value;
    });
}

function clearData() {
    listOfInputTransaksi.forEach((input) => {
        if (
            input.tagName == "INPUT" &&
            input.classList.contains("form-control")
        ) {
            input.value = "";
        } else if (input.tagName == "SELECT") {
            input.selectedIndex = 0;
        }
    });

    listOfInputGangguan.forEach((input) => {
        if (input.tagName == "INPUT") {
            input.value = "";
        } else if (input.tagName == "SELECT") {
            input.selectedIndex = 0;
        }
    });
}
//#endregion

function init() {
    $("#table_gangguan").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableGangguanCol,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel gangguan...",
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

    toggleButtons(1);
    setEnable(false);

    btnIsi.focus();
    txtTanggal.value = getCurrentDate(true);
}

$(document).ready(() => {
    init();
});
