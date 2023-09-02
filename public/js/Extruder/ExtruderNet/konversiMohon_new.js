//#region Variables
const slcNomor = document.getElementById("select_nomor");
const slcOrder = document.getElementById("select_nomor_order");
const slcSpek = document.getElementById("select_spek");
const slcMesin = document.getElementById("select_mesin");
const slcKomposisi = document.getElementById("select_komposisi");

const txtLot = document.getElementById("lot");
const txtShift = document.getElementById("shift");
const txtWarna = document.getElementById("warna");
const txtIdProd = document.getElementById("id_produksi");
const txtNamaProd = document.getElementById("nama_produksi");
const txtJenis = document.getElementById("jenis");

const numUkuran = document.getElementById("ukuran");
const numDenier = document.getElementById("denier");
const numStokPrimer = document.getElementById("stok_primer");
const numPrimer = document.getElementById("primer");
const numStokSekunder = document.getElementById("stok_sekunder");
const numSekunder = document.getElementById("sekunder");
const numStokTritier = document.getElementById("stok_tritier");
const numTritier = document.getElementById("tritier");

const dateTanggal = document.getElementById("tanggal");
const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");
const timeMulai = document.getElementById("waktu_mulai");
const timeSelesai = document.getElementById("waktu_selesai");

const spnSatPrimer = document.getElementById("sat_primer");
const spnSatSekunder = document.getElementById("sat_sekunder");
const spnSatTritier = document.getElementById("sat_tritier");

const btnTambahDetail = document.getElementById("btn_baru_detail");
const btnKoreksiDetail = document.getElementById("btn_koreksi_detail");
const btnHapusDetail = document.getElementById("btn_hapus_detail");
const btnBaruMaster = document.getElementById("btn_baru_master");
const btnKoreksiMaster = document.getElementById("btn_koreksi_master");
const btnHapusMaster = document.getElementById("btn_hapus_master");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const hidNoUrut = document.getElementById("no_urut");

const listKonversi = [];
/* ISI LIST KONVERSI
    0 Type
    1 IdType *hidden
    2 JumlahPrimer
    3 SatPrimer
    4 JumlahSekunder
    5 SatSekunder
    6 JumlahTritier
    7 SatTrititer
    8 Persentase
    9 StatusType *Jenis
    10 IdSubKelompok
*/

const listKomposisi = [];
/* ISI LIST KOMPOSISI
    0 StatusType *Jenis
    1 IdType *hidden
    2 NamaType
    3 NamaSubKelompok
    4 SatuanPrimer *hidden
    5 SatuanSekunder *hidden
    6 SatuanTritier *hidden
    7 IdSubKelompok
*/

const colKonversi = [
    { width: "350px" }, // Nama Type
    { width: "100px" }, // Qty. Primer
    { width: "100px" }, // Sat. Primer
    { width: "125px" }, // Qty. Sekunder
    { width: "125px" }, // Sat. Sekunder
    { width: "100px" }, // Qty. Tritier
    { width: "100px" }, // Sat. Tritier
    { width: "60px" }, // Presentase
    { width: "60px" }, // Jenis
    { width: "125px" }, // Sub-kelompok
];

const colKomposisi = [
    { width: "50px" }, // Jenis
    { width: "275px" }, // Nama Type
    { width: "125px" }, // Sub-kelompok
    { width: "100px" }, // Id Sub-kel.
];

var modeProses = "";
//#endregion

//#region Events
//#endregion

//#region Functions
function getDataKomposisiFetch() {
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);

    // SP_5298_EXT_LIST_KOMPOSISI_BAHAN
}
//#endregion

function initKonversiMohon() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKonversi,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
        },
    });

    $("#table_komposisi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKomposisi,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel komposisi...",
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

    clearTable_DataTable("table_konversi", colKonversi.length);
    clearTable_DataTable("table_komposisi", colKomposisi.length);
}

$(document).ready(() => initKonversiMohon());
