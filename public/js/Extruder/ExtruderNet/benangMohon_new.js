//#region Variables
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

const dateMohon = document.getElementById("tanggal_mohon");
const dateInput = document.getElementById("tanggal");
const listOfSlc = document.querySelectorAll("select");

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
    { width: "100px" }, // Nama Kelompok Utama
    { width: "100px" }, // Nama Kelompok
    { width: "100px" }, // Nama Sub-kelompok
    { width: "100px" }, // Id Objek
    { width: "100px" }, // Id Kelompok Utama
    { width: "100px" }, // Id Kelompok
    { width: "100px" }, // Id Sub-kelompok
    { width: "100px" }, // Id Transaksi
];

var modeProses = "";
var refetchNomor = false;
var [pilAsal, pilTujuan] = [-1, -1];
//#endregion

//#region Events
btnIsi.addEventListener("click", function () {
    clearAll();
    dateInput.disabled = false;
    dateInput.value = dateMohon.value;
    dateInput.focus();
    modeProses = "isi";
    toggleButtons(2);
    slcNomor.disabled = true;
});

btnKoreksi.addEventListener("click", function () {
    clearAll();
    slcNomor.disabled = false;
    slcNomor.focus();
    modeProses = "koreksi";
    toggleButtons(2);
});

btnHapus.addEventListener("click", function () {
    clearAll();
    slcNomor.disabled = false;
    slcNomor.focus();
    modeProses = "hapus";
    toggleButtons(2);
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent != "Keluar") {
        toggleButtons(1);
        clearAll();
        disableAll();
        modeProses = "";
    } else window.location.href = "/Extruder/ExtruderNet";
});

dateInput.addEventListener("change", function () {
    refetchNomor = true;
});

slcNomor.addEventListener("mousedown", function () {
    if (refetchNomor) {
        refetchNomor = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "MesinShift",
            textKey: "IdKonversiNG",
        };

        // SP_5298_EXT_KOREKSI_SORTIRNG_BLMACC
        fetchSelect(
            "/Master/getKoreksiSortirNGBlmAcc/" + dateInput.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys, false);
                    this.removeChild(errorOption);
                } else refetchNomor = true;
            },
            errorOption
        );
    }
});

slcNomor.addEventListener("keydown", function (event) {
    if (event.key === "Enter" && refetchNomor) {
        refetchNomor = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "MesinShift",
            textKey: "IdKonversiNG",
        };

        // SP_5298_EXT_KOREKSI_SORTIRNG_BLMACC
        fetchSelect(
            "/Master/getKoreksiSortirNGBlmAcc/" + dateInput.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys, false);
                    this.removeChild(errorOption);
                } else refetchNomor = true;
            },
            errorOption
        );
    }
});

slcNomor.addEventListener("change", function () {
    // Memasukkan data ke teks shift & select mesin
    // Dilakukan setelah melihat format dari data

    lihatDataKonversiNGFetch(this.options[this.selectedIndex].text, () => {
        if (modeProses == "koreksi") {
            $("html, body").animate({ scrollTop: pilAsal }, 100);
        } else if (modeProses == "hapus") {
            btnProses.focus();
        }
    });
});
//#endregion

//#region Functions
function lihatDataKonversiNGFetch(id_konversi, post_action = null) {
    listAsal.length = 0;
    clearTable_DataTable("table_asal", colTable.length, "padding=250px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", colTable.length, "padding=250px");

    let id_konv_inv = "";
    // SP_5298_EXT_LISTDATA_NG
    fetchSelect(
        "/Benang/getListDataNG/" + id_konversi.trim() + "/" + dateInput.value,
        (data) => {
            if (data.length > 0) {
                timeAwal.value = data[0].AwalShift;
                timeAkhir.value = data[0].AkhirShift;
                id_konv_inv = data[0].IdKonversiINV;

                addOptionIfNotExists(
                    slcNoKonversi,
                    data[0].IdKonversiEXT,
                    data[0].IdKonversiEXT + " | " + data[0].NamaKomposisi
                );

                // SP_5298_EXT_DETAILURAIAN_KONV_NG
                fetchSelect(
                    "/Benang/getDetailUraianKonvNG/" + data[0].IdKonversiINV,
                    (data2) => {
                        for (let i = 0; i < data2.length; i++) {
                            if (
                                data2[i].UraianDetailUkuran == "Asal Konversi"
                            ) {
                                listAsal.push({
                                    IdType: data2[i].IdType,
                                    NamaType: data2[i].NamaType,
                                    JumlahPrimer:
                                        data2[i].JumlahPengeluaranPrimer,
                                    JumlahSekunder:
                                        data2[i].JumlahPengeluaranSekunder,
                                    JumlahTritier:
                                        data2[i].JumlahPengeluaranTritier,
                                    NamaObjek: data2[i].NamaObjek,
                                    NamaKelompokUtama:
                                        data2[i].NamaKelompokUtama,
                                    IdObjek: data2[i].IdObjek,
                                    IdKelompokUtama: data2[i].IdKelompokUtama,
                                    IdKelompok: data2[i].IdKelompok,
                                    IdSubKelompok: data2[i].IdSubKelompok,
                                    IdTransaksi: data2[i].IdTransaksi,
                                });
                            } else if (
                                data2[i].UraianDetailUkuran == "Tujuan Konversi"
                            ) {
                                listTujuan.push({
                                    IdType: data2[i].IdType,
                                    NamaType: data2[i].NamaType,
                                    JumlahPrimer:
                                        data2[i].JumlahPemasukanPrimer,
                                    JumlahSekunder:
                                        data2[i].JumlahPemasukanSekunder,
                                    JumlahTritier:
                                        data2[i].JumlahPemasukanTritier,
                                    NamaObjek: data2[i].NamaObjek,
                                    NamaKelompokUtama:
                                        data2[i].NamaKelompokUtama,
                                    IdObjek: data2[i].IdObjek,
                                    IdKelompokUtama: data2[i].IdKelompokUtama,
                                    IdKelompok: data2[i].IdKelompok,
                                    IdSubKelompok: data2[i].IdSubKelompok,
                                    IdTransaksi: data2[i].IdTransaksi,
                                });
                            }

                            if (data2.length <= 0)
                                alert("Data konversi tidak ditemukan.");
                        }

                        if (post_action != null) post_action();
                    }
                );
            } else alert("Data NG tidak ditemukan.");
        }
    );
}

function rowClickedAsal(row, data, _) {}
function rowClickedTujuan(row, data, _) {}

function disableAll() {
    listOfSlc.forEach((slc) => (slc.disabled = true));
    timeAwal.disabled = true;
    timeAkhir.disabled = true;
    txtShift.disabled = true;
}

function clearAll() {
    listOfSlc.forEach((slc) => (slc.selectedIndex = 0));
    timeAwal.value = "00:00";
    timeAkhir.value = "00:00";
    txtShift.value = "";
    listAsal.length = 0;
    clearTable_DataTable("table_asal", colTable.length, "padding=250px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", colTable.length, "padding=250px");
}

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
//#endregion

function init() {
    $("#table_asal").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colTable,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel asal...",
            search: "",
        },
    });

    $("#table_tujuan").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colTable,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel tujuan...",
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

    clearTable_DataTable("table_asal", colTable.length, "padding=250px");
    clearTable_DataTable("table_tujuan", colTable.length, "padding=250px");
    dateInput.value = getCurrentDate();
    dateMohon.value = getCurrentDate();
}

$(document).ready(() => init());
