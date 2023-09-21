//#region Variables
const dateAwal = document.getElementById("tanggal_awal");
const dateAkhir = document.getElementById("tanggal_akhir");

const btnOK = document.getElementById("btn_ok");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listKonversi = [];
/* ISI LIST KONVERSI
    0 IdKonversiNG
*/

const listDetail = [];
/* ISI LIST DETAIL
    0 Tanggal
*/

const posTable = $("#table_konversi").offset().top - 125;
const colDetail = [
    { width: "100px" }, // Tanggal
    { width: "125px" }, // Id Konversi
    { width: "125px" }, // Uraian
    { width: "200px" }, // Nama Type
    { width: "125px" }, // Qty. Primer
    { width: "125px" }, // Qty. Sekunder
    { width: "125px" }, // Qty. Tritier
    { width: "100px" }, // Objek
    { width: "100px" }, // Kel. Ut.
    { width: "100px" }, // Kelompok
    { width: "100px" }, // Sub-kel.
    { width: "100px" }, // Id Sub-kel.
    { width: "100px" }, // Id Type
];
//#endregion

//#region Events
//#endregion

//#region Functions
//#endregion

function init() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
            info: "",
        },
    });

    $("#table_detail").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colDetail,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel detail...",
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

    clearTable_DataTable("table_konversi", 2);
    clearTable_DataTable("table_detail", colDetail.length, "padding=250px");
}

$(document).ready(() => init());
