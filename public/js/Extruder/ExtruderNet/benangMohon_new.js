//#region Variables
const dateMohon = document.getElementById("tanggal_mohon");
const dateInput = document.getElementById("tanggal");

const slcMesin = document.getElementById("select_mesin");
const slcNomor = document.getElementById("select_nomor");
const slcNoKonversi = document.getElementById("select_nomor_konversi");
const slcType = document.getElementById("select_type");

const txtShift = document.getElementById("shift");
const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");

const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const btnRK = document.getElementById("btn_rk");

const listAsal = [];
const listTujuan = [];
/* ISI LIST ASAL & TUJUAN
    0 IdType
    1 NamaType
    2 JumlahPrimer
    3 JumlahSekunder
    4 JumlahTritier
    5 NamaObjek
    6 NamaKelompokUtama
    7 NamaKelompok
    8 NamaSubKelompok
    9 IdObjek
    10 IdKelompokUtama
    11 IdKelompok
    12 IdSubKelompok
    13 IdTransaksi
*/

const posAsal = $("#table_asal").offset().top - 125;
const posTujuan = $("#table_tujuan").offset().top - 125;
const colTable = [
    { width: "200px" }, // Id Type
    { width: "200px" }, // Nama Type
    { width: "100px" }, // Jumlah Primer
    { width: "100px" }, // Jumlah Sekunder
    { width: "100px" }, // Jumlah Tritier
    { width: "100px" }, // Nama Objek
    { width: "125px" }, // Nama Kelompok Utama
    { width: "100px" }, // Nama Kelompok
    { width: "125px" }, // Nama Sub-kelompok
    { width: "100px" }, // Id Objek
    { width: "100px" }, // Id Kelompok Utama
    { width: "100px" }, // Id Kelompok
    { width: "100px" }, // Id Sub-kelompok
    { width: "100px" }, // Id Transaksi
];
//#endregion

//#region Events
//#endregion

//#region Functions
//#endregion

function init() {}

$(document).ready(() => init());
