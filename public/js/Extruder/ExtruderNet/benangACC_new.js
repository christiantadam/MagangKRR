//#region Variables
const dateAwal = document.getElementById("tanggal_awal");
const dateAkhir = document.getElementById("tanggal_akhir");

const btnOK = document.getElementById("btn_ok");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listKonversi = [];
/* ISI LIST KONVERSI
    0 IdKonversiNG
    1 Tanggal
*/

const listDetail = [];
/* ISI LIST DETAIL
    0 Tanggal
    1 IdKonversiNG
    2 UraianDetailTransaksi
    3 NamaType
    4 JumlahPrimer
    5 JumlahSekunder
    6 JumlahTritier
    7 NamaObjek
    8 NamaKelompokUtama
    9 NamaSubKelompok
    10 IdSubKelompok
    11 IdType
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

var radios = null;
//#endregion

//#region Events
btnOK.addEventListener("click", function () {
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", 2);
    listDetail.length = 0;
    clearTable_DataTable("table_detail", colDetail, "padding=250px");
    daftarKonversiBelumACCFetch();
});
//#endregion

//#region Functions
function daftarKonversiBelumACCFetch() {
    // SP_5298_EXT_LIST_IDKONVERSI_NG
    fetchSelect(
        "/Benang/getListIdKonversiNG/" + dateAwal.value + "/" + dateAkhir.value,
        (data) => {
            for (let i = 0; i < data.length; i++) {
                const strRdo = `<input class="form-check-input" type="radio" name="rdo_konversi" id="`;
                listKonversi.push({
                    IdKonversiNG: `${strRdo}rdo_${data[i].IdKonversiNG}"> &nbsp; ${data[i].IdKonversiNG}`,
                    Tanggal: dateTimeToDate(data[i].Tanggal),
                });

                $("html, body").animate({ scrollTop: posTable }, 100);
                addTable_DataTable(
                    "table_konversi",
                    listKonversi,
                    null,
                    null,
                    null,
                    "dom_empty"
                );

                radios = document.querySelectorAll("input[type='radio']");
                radios.forEach((radio) => {
                    radio.addEventListener("click", function () {
                        console.log(radio.id.split("_")[1]);
                        tampilDetailKonversiFetch(radio.id.split("_")[1]);
                    });
                });
            }
        }
    );
}

function tampilDetailKonversiFetch(id_konversi_ng) {
    listDetail.length = 0;
    clearTable_DataTable("table_detail", colDetail.length, [
        "padding=250px",
        "Memuat data...",
    ]);

    // SP_5298_EXT_DETAILDATA_BENANG_NG
    fetchSelect("/Benang/getDetailDataBenangNG/" + id_konversi_ng, (data) => {
        for (let i = 0; i < data.length; i++) {
            let [jmlhPrimer, jmlhSekunder, jmlhTritier] = ["", "", ""];
            if (data[i].UraianDetailTransaksi == "Asal Konversi") {
                jmlhPrimer = data[i].JumlahPengeluaranPrimer;
                jmlhSekunder = data[i].JumlahPengeluaranSekunder;
                jmlhTritier = data[i].JumlahPengeluaranTritier;
            } else if (data[i].UraianDetailTransaksi == "Tujuan Konversi") {
                jmlhPrimer = data[i].JumlahPemasukanPrimer;
                jmlhSekunder = data[i].JumlahPemasukanSekunder;
                jmlhTritier = data[i].JumlahPemasukanTritier;
            }

            listDetail.push({
                Tanggal: data[i].Tanggal,
                IdKonversiNG: data[i].IdKonversiNG,
                UraianDetailTransaksi: data[i].UraianDetailTransaksi,
                NamaType: data[i].NamaType,
                JumlahPrimer: jmlhPrimer,
                JumlahSekunder: jmlhSekunder,
                JumlahTritier: jmlhTritier,
                NamaObjek: data[i].NamaObjek,
                NamaKelompokUtama: data[i].NamaKelompokUtama,
                NamaSubKelompok: data[i].NamaSubKelompok,
                IdSubKelompok: data[i].IdSubKelompok,
                IdType: data[i].IdType,
            });
        }

        if (data.length <= 0) {
            clearTable_DataTable("table_detail", colDetail.length, [
                "padding=100px",
                "Data untuk <b>Konversi " +
                    id_konversi_ng +
                    "</b> tidak ditemukan.",
            ]);
        }
    });
}
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

    /**
     * DEBUG
     */

    dateAwal.value = "2023-08-01";
    dateAkhir.value = getCurrentDate();
    daftarKonversiBelumACCFetch();
}

$(document).ready(() => init());
