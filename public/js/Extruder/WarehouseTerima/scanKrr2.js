//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const txtNoBarcode = document.getElementById("no_barcode");
const spnBarcode = document.getElementById("btn_barcode");

const spnTujuan = document.getElementById("spn_tujuan");
const rdoNganjuk = document.getElementById("radio_nganjuk");
const rdoMjs = document.getElementById("radio_mojosari");
const rdoBrebek = document.getElementById("radio_brebek");

const btnLihat = document.getElementById("btn_lihat");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listRekap = [];
/** ISI LIST REKAP
 * 0 - Tanggal
 * 1 - Type
 * 2 - Primer
 * 3 - Sekunder
 * 4 - Tritier
 * 5 - IdType
 * 6 - Divisi
 */

const listKirim = [];
/** ISI LIST KIRIM
 * 0 - TglMutasi
 * 1 - NamaType
 * 2 - NoBarcode
 * 3 - NamaSubKelompok
 * 4 - NamaKelompok
 * 5 - KodeBarang
 * 6 - NoIndeks
 * 7 - QtyPrimer
 * 8 - QtySekunder
 * 9 - QtyTritier
 * 10 - IdDivisi
 */

const colRekap = [
    { width: "1px" }, // Tanggal
    { width: "1px" }, // Type
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Id Type
    { width: "1px" }, // Divisi
];

const colKirim = [
    { width: "1px" }, // Tanggal
    { width: "200px" }, // Type
    { width: "125px" }, // No. Barcode
    { width: "125px" }, // Sub-kelompok
    { width: "1px" }, // Kelompok
    { width: "125px" }, // Kode Barang
    { width: "125px" }, // No. Indeks
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Divisi
];
//#endregion

//#region Events
//#endregion

//#region Functions
//#endregion

function init() {
    $("#table_rekap").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel rekap...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]:last').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    $("#table_kirim").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKirim,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel kirim...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]:last').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    clearTable_DataTable("table_rekap", colRekap.length);
    clearTable_DataTable("table_kirim", colKirim.length);
}

$(document).ready(() => init());

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/WarehouseTerima";
});
