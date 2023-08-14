// Inisialisasi item pada select nomor

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

const listOfTxt = document.querySelectorAll(".form-control");
const listOfSlc = document.querySelectorAll("select");

const listAsal = [];
const listTujuan = [];

var modeProses = "";
//#endregion

//#region Events
btnIsi.addEventListener("click", function () {
    clearData();
    toggleButtons(2);

    modeProses = "isi";
    slcNomor.disabled = true;
    dateInput.disabled = false;
    dateInput.value = dateMohon.value;
    dateInput.focus();
});

btnKoreksi.addEventListener("click", function () {
    clearData();
    toggleButtons(2);

    modeProses = "koreksi";
    slcNomor.disabled = false;
    slcNomor.focus();
});

btnHapus.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButtons(1);
        clearData();
        disableControl();

        modeProses = "";
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

function clearData() {
    listOfTxt.forEach((txt) => {
        txt.value = "";
    });

    listOfSlc.forEach((slc) => {
        slc.selectedIndex = 0;
    });

    listAsal.length = 0;
    clearTable_DataTable("table_asal", 2);
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", 2);
}

function disableControl() {
    slcNomor.disabled = true;
    slcNoKonversi.disabled = true;
    slcType.disabled = true;
    slcMesin.disabled = true;
    txtShift.disabled = true;
}

function lihatDataKonversiNG(id_konversi) {
    listAsal.length = 0;
    clearTable_DataTable("table_asal", 2);
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", 2);

    // SP_5298_EXT_LISTDATA_NG
    let id_konv_inv = "";
    fetch(`/Benang/getListDataNG/${id_konversi}/${dateInput.value}`)
        .then((response) => response.json())
        .then((data) => {
            timeAwal.value = dateTimetoTime(data[0].AwalShift);
            timeAkhir.value = dateTimetoTime(data[0].AkhirShift);
            // slcKonversi -> data[0].IdKonversiEXT
            id_konv_inv = data[0].IdKonversiINV;

            // SP_5298_EXT_DETAILURAIAN_KONV_NG
            fetch(`/Benang/getDetailUraianKonvNG/${id_konversi}`)
                .then((response) => response.json())
                .then((data) => {
                    /*
                        0 IdType,
                        1 NamaType,
                        2 JumlahPengeluaranPrimer/Sekunder/Tritier,
                        3 NamaObjek,
                        4 NamaKelompokUtama,
                        5 NamaKelompok,
                        6 NamaSubKelompok,
                        7 IdObjek,
                        8 IdKelompokUtama,
                        9 IdKelompok,
                        10 IdSubKelompok,
                        11 IdTransaksi
                    */

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].UraianDetailTransaksi == "Asal Konversi") {
                            listAsal.push(data[i]);
                        } else if (
                            data[i].UraianDetailTransaksi == "Tujuan Konversi"
                        ) {
                            listTujuan.push(data[i]);
                        }
                    }
                })
                .catch((error) => console.error("Error: ", error));
        })
        .catch((errror) => console.error("Error: ", errror));
}
//#endregion

function init() {
    $("#table_asal").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
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
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel tujuan...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );
            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    dateMohon.value = getCurrentDate();
    dateInput.value = getCurrentDate();

    dateMohon.focus();
}

$(document).ready(function () {
    init();
});
