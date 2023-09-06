//#region Variables
const slcKomposisi = document.getElementById("select_id_komposisi");
const slcMesin = document.getElementById("select_mesin");
const slcObjek = document.getElementById("select_objek");
const slcKelut = document.getElementById("select_kelompok_utama");
const slcKelompok = document.getElementById("select_kelompok");
const slcSubkel = document.getElementById("select_sub_kelompok");
const slcType = document.getElementById("select_type");

const numPrimer = document.getElementById("primer");
const numSekunder = document.getElementById("sekunder");
const numTritier = document.getElementById("tritier");
const numPersentase = document.getElementById("persentase");

const txtSatPrimer = document.getElementById("sat_primer");
const txtSatSekunder = document.getElementById("sat_sekunder");
const txtSatTritier = document.getElementById("sat_tritier");

const btnTambahDetail = document.getElementById("btn_tambah_detail");
const btnKoreksiDetail = document.getElementById("btn_koreksi_detail");
const btnHapusDetail = document.getElementById("btn_hapus_detail");
const btnBaruMaster = document.getElementById("btn_baru_master");
const btnKoreksiMaster = document.getElementById("btn_koreksi_master");
const btnHapusMaster = document.getElementById("btn_hapus_master");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listKomposisi = [];
/* ISI LIST KOMPOSISI
    0 Halo Dunia!
*/

const colKomposisi = [
    { width: "350px" }, // Jenis
    { width: "100px" }, // Id Type
    { width: "100px" }, // Nama Type
    { width: "125px" }, // Qty. Primer
    { width: "125px" }, // Sat. Primer
    { width: "100px" }, // Qty. Sekunder
    { width: "100px" }, // Sat. Sekunder
    { width: "60px" }, // Qty. Tritier
    { width: "60px" }, // Sat. Tritier
    { width: "125px" }, // Persentase
    { width: "0px" }, // Id Objek
    { width: "0px" }, // Nama Objek
    { width: "0px" }, // Id KelUt.
    { width: "0px" }, // Nama KelUt.
    { width: "0px" }, // Id Kelompok
    { width: "0px" }, // Kelompok
    { width: "0px" }, // Id SubKel.
    { width: "0px" }, // SubKel.
];
//#endregion

//#region Events
//#endregion

//#region Functions
//#endregion

function init() {
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
}

$(document).ready(() => init());
