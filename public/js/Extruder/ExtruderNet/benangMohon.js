// Saat table asal di-double-klik akan memunculkan form rincian konversi

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

const listOfTxt = document.querySelectorAll(
    ".form-control:not(input[type='date'])"
);
const listOfSlc = document.querySelectorAll("select");

const listAsal = [];
/* ISI LIST ASAL
    0 IdType
    1 NamaType
    2 JumlahPengeluaranPrimer
    3 JumlahPengeluaranSekunder
    4 JumlahPengeluaranTritier
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

const listTujuan = [];
/* ISI LIST TUJUAN
    Sama seperti list asal namun, JumlahPengeluaran diganti JumlahPemasukkan
*/

const tableCol = [
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
const tableWidth = 14;

var modeProses = "";
var pilAsal = -1; // "tabel_asal"
var pilNoKonv = -1; // "select_nomor_konversi"
var refetchType = false; // "select_type"
var refetchKonv = false; // "select_konversi"
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
    clearData();
    toggleButtons(2);

    modeProses = "hapus";
    slcNomor.disabled = false;
    slcNomor.focus();
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButtons(1);
        clearData();
        disableControl();

        modeProses = "";
    }
});

btnProses.addEventListener("click", function () {
    if (modeProses == "isi") {
        if (listAsal.length < 1 || listTujuan.length < 1) {
            alert(
                "Data tidak dapat diproses karena tidak ada asal atau tujuan konversi."
            );
        } else {
            prosesIsi();
        }
    } else {
        if (slcNomor.selectedIndex == 0) {
            alert(
                `Belum ada data konversi yang terpilih.
                \nMohon periksa kembali bagian "-- Pilih Nomor --"`
            );
        } else if (modeProses == "koreksi") {
            showModal(
                "Koreksi",
                "Apakah anda yakin akan mengoreksi data ini?",
                () => {
                    prosesKoreksi();
                },
                () => {}
            );
        } else if (modeProses == "hapus") {
            showModal(
                "Hapus",
                "Apakah anda yakin akan menghapus data ini?",
                () => {
                    posesHapus();
                },
                () => {}
            );
        }
    }
});

slcNomor.addEventListener("click", function () {
    if (dateInput.value != getCurrentDate() || this.options.length <= 2) {
        clearOptions("select_nomor");
        const loadingOption = this.querySelector('[value="loading"]');
        loadingOption.style.display = "block";

        // SP_5298_EXT_KOREKSI_SORTIRNG_BLMACC
        fetch(`/Benang/getKoreksiSrtBlmAcc/${dateInput.value}`)
            .then((response) => response.json())
            .then((data) => {
                addOptions(
                    "select_nomor",
                    data,
                    {
                        valueKey: "IdKonversiNG",
                        textKey: "MesinShift",
                    },
                    false
                );
                loadingOption.style.display = "none";
            })
            .catch((error) => {
                loadingOption.textContent =
                    "Terdapat kendala saat memuat data, mohon segera hubungi Pak Adam.";
                console.error("Error: ", error);
            });
    }
});

slcNomor.addEventListener("change", function () {
    lihatDataKonversiNG(this.value);
    if (modeProses == "koreksi") {
        $("html, body").animate(
            {
                scrollTop: $("##table_asal").offset().top - 125,
            },
            100
        );
        pilAsal = 0;
    } else if (modeProses == "hapus") {
        btnProses.focus();
    }
});

slcType.addEventListener("click", function () {
    if (this.options.length <= 3 || refetchType) {
        const loadingOption = this.querySelector('[value="loading"]');
        loadingOption.style.display = "block";

        // SP_5298_EXT_LIST_PROD_NG
        fetch(`/Benang/getListProdNG/${slcNoKonversi.value}`)
            .then((response) => response.json())
            .then((data) => {
                addOptions("select_type", data, {
                    valueKey: "Type",
                    textKey: "IdType",
                });
                loadingOption.style.display = "none";
            })
            .catch((error) => {
                loadingOption.textContent =
                    "Terdapat kendala saat memuat data, mohon segera hubungi Pak Adam.";
                console.error("Error: ", error);
            });

        loadingOption.style.display = "none";
        refetchType = false;
    } else {
        alert(
            "Type tidak boleh diubah, karena sudah terdapat Item Tujuan Konversi"
        );
    }
});

slcType.addEventListener("change", function () {
    // SP_5298_EXT_CEK_DATA_NG Kode 1
    fetch(`/Benang/getDataNG/1/
            ${slcNoKonversi.value}/
            ${this.value}`)
        .then((response) => response.json())
        .then((data) => {
            if (data[0].ada > 0) {
                // SP_5298_EXT_CEK_DATA_NG Kode 2
                fetch(`/Benang/getDataNG/2/
                        ${slcNoKonversi.value}/
                        ${this.value}`)
                    .then((response) => response.json())
                    .then((data) => {
                        if (data[0].saatLog !== undefined) {
                            alert(
                                "Type: " +
                                    this.value.split(" | ")[1] +
                                    "telah disortir dan di-ACC\n" +
                                    "Data dapat dilihat pada Kartu Barang Inventory"
                            );
                        } else {
                            alert(
                                "Type: " +
                                    this.value.split(" | ")[1] +
                                    "telah disortir dan di-ACC\n" +
                                    "Data dapat dilihat pada ACC Sortir Benang NG"
                            );
                        }
                    })
                    .catch((error) => console.error("Error: ", error));
            } else {
                displayDataBenangNG();
            }
        })
        .catch((error) => console.error("Error: ", error));
});

slcNoKonversi.addEventListener("click", function () {
    if (
        this.options.length <= 3 ||
        dateInput.value != getCurrentDate() ||
        refetchKonv
    ) {
        const loadingOption = this.querySelector('[value="loading"]');
        loadingOption.style.display = "block";

        // SP_5298_EXT_LIST_IDKONV
        fetch(`/Benang/getListIdKonv/1/null/null/EXT/
                ${dateInput.value}/
                ${txtShift.value}`)
            .then((response) => response.json())
            .then((data) => {
                addOptions("select_nomor_konversi", data, {
                    valueKey: "Konversi",
                    textKey: "TypeMesin",
                });

                loadingOption.style.display = "none";
                refetchKonv = false;
            })
            .catch((error) => console.error("Error: ", error));
    }
});

slcNoKonversi.addEventListener("change", function () {
    listAsal.length = 0;
    clearTable_DataTable("table_asal", tableWidth, "padding=100px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", tableWidth, "padding=100px");

    if (pilNoKonv != -1) {
        this.remove(pilNoKonv);
    }

    selectedOpt = {
        value: this.value,
        text: this.textContent.split(" | ")[1],
    };

    addOptionIfNotExists(slcMesin, selectedOpt.text, selectedOpt.text);
    addOptionIfNotExists(
        slcNoKonversi,
        selectedOpt.value,
        selectedOpt.value.substring(0, 14) +
            " | " +
            selectedOpt.value.substring(17, 17 + selectedOpt.value.length - 16)
    );

    pilNoKonv = this.selectedIndex;
    refetchType = true;
});

dateInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        if (modeProses == "isi") {
            txtShift.disabled = false;
            txtShift.focus();
        } else {
            slcNomor.disabled = false;
            slcNomor.focus();
        }
    }
});

txtShift.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        this.value = this.value.toUpperCase();
        slcNoKonversi.disabled = false;
        slcNoKonversi.focus();
    }
});

txtShift.addEventListener("change", function () {
    refetchKonv = true;
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
    clearTable_DataTable("table_asal", tableWidth, "padding=100px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", tableWidth, "padding=100px");
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
    clearTable_DataTable("table_asal", tableWidth, "padding=100px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", tableWidth, "padding=100px");

    // SP_5298_EXT_LISTDATA_NG
    let id_konv_inv = "";
    fetch(`/Benang/getListDataNG/${id_konversi}/${dateInput.value}`)
        .then((response) => response.json())
        .then((data) => {
            timeAwal.value = dateTimetoTime(data[0].AwalShift);
            timeAkhir.value = dateTimetoTime(data[0].AkhirShift);
            id_konv_inv = data[0].IdKonversiINV;

            addOptionIfNotExists(
                slcNoKonversi,
                data[0].IdKonversiEXT,
                data[0].IdKonversiEXT + " | " + data[0].NamaKomposisi
            );

            // SP_5298_EXT_DETAILURAIAN_KONV_NG
            fetch(`/Benang/getDetailUraianKonvNG/${id_konv_inv}`)
                .then((response) => response.json())
                .then((data) => {
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

function displayDataBenangNG() {
    // SP_5298_EXT_LIST_IDKONV Kode 3
    fetch(`/Benang/getListIdKonv/3/${slcNoKonversi.value}/${slcType.value}`)
        .then((response) => response.json())
        .then((data) => {
            if (data.length != 0) {
                for (let i = 0; i < data.length; i++) {
                    listAsal.push(data[i]);
                    addTable_DataTable("table_asal", listAsal, tableCol);

                    $("html, body").animate(
                        {
                            scrollTop: $("#table_asal").offset().top - 125,
                        },
                        100
                    );

                    pilAsal = 0;
                }
            } else {
                alert("Hasil konversi tidak menghasilkan Benang NG.");
            }
        });
}

function prosesIsi() {
    let id_konv_inv = "";

    // SP_5298_EXT_INSERT_MASTERKONV_NG
    fetchStmt(
        `/Benang/insMasterKonvNG/${dateMohon.value}/${slcNoKonversi.value}/tmpUser`,
        () => {
            fetch(`/Benang/getIdKonversiNG`)
                .then((response) => response.json())
                .then((data) => {
                    addOptionIfNotExists(slcNomor, data.IdKonversiNG);

                    // SP_5298_EXT_LIST_COUNTER
                    fetch(`/Benang/getListCounter`)
                        .then((response) => response.json())
                        .then((data) => {
                            id_konv_inv = data.NoKonversi.padStart(9, "0");
                            modeProses = "";

                            insertDetail(id_konv_inv);
                        })
                        .catch((error) => console.error("Error: ", error));
                })
                .catch((error) => console.error("Error: ", error));
        }
    );
}

function insertDetail(id_konv_inv) {
    // SP_5298_EXT_INSERT_DETAILKONV_NG
    for (let i = 0; i < listAsal.length; i++) {
        fetchStmt(
            `/Benang/insDetailKonvNG/${slcNomor.value}/
                ${listAsal[i].IdType}/${listAsal[i].JumlahPengeluaranPrimer}/
                ${listAsal[i].JumlahPengeluaranSekunder}/
                ${listAsal[i].JumlahPengeluaranTritier}/${id_konv_inv}`,
            () => {
                createTmpTransaksiInventory(i, id_konv_inv, 0);
            }
        );
    }

    for (let i = 0; i < listTujuan.length; i++) {
        fetchStmt(
            `/Benang/insDetailKonvNG/${slcNomor.value}/
                ${listTujuan[i].IdType}/${listTujuan[i].JumlahPemasukanPrimer}/
                ${listTujuan[i].JumlahPemasukanSekunder}/
                ${listTujuan[i].JumlahPemasukanTritier}/${id_konv_inv}`,
            () => {
                createTmpTransaksiInventory(i, id_konv_inv, 1);
            }
        );
    }
}

function createTmpTransaksiInventory(i, id_konv_inv, status) {
    let urlString = "";
    switch (status) {
        case 0:
            // SP_5298_EXT_INSERT_04_ASALTMPTRANSAKSI
            urlString = `/Benang/insAsalTmpTrans/04/asal_konversi/
                ${listAsal[i].IdType}/tmpUser/${dateMohon.value}/
                ${listAsal[i].JumlahPengeluaranPrimer}/
                ${listAsal[i].JumlahPengeluaranSekunder}/
                ${listAsal[i].JumlahPengeluaranTritier}/
                ${listAsal[i].IdSubKelompok}/${id_konv_inv}`;
            break;
        case 1:
            // SP_5298_EXT_INSERT_04_TUJUANTMPTRANSAKSI
            urlString = `/Benang/insTujuanTmpTrans/04/tujuan_konversi/
                ${listTujuan[i].IdType}/tmpUser/${dateMohon.value}/
                ${listTujuan[i].JumlahPemasukanPrimer}/
                ${listTujuan[i].JumlahPemasukanSekunder}/
                ${listTujuan[i].JumlahPemasukanTritier}/
                ${listTujuan[i].IdSubKelompok}/${id_konv_inv}`;
            break;

        default:
            break;
    }

    fetchStmt(urlString, () => {
        clearData();
        disableControl();
        toggleButtons(1);

        alert("Data berhasil tersimpan!");
    });
}

function prosesKoreksi() {
    for (let i = 0; i < listAsal.length; i++) {
        // SP_5298_EXT_UPDATE_DETAIL_KONV_NG
        fetchStmt(
            `/Benang/updDetailKonvNG/${slcNomor.value}/${listAsal[i].IdType}/
                ${listAsal[i].JumlahPengeluaranPrimer}/
                ${listAsal[i].JumlahPengeluaranSekunder}/
                ${listAsal[i].JumlahPengeluaranTritier}`
        );

        // SP_5298_EXT_UPDATE_TMPTRANSAKSI
        fetchStmt(
            `/Benang/updTmpTransaksi/${listAsal[i].IdTransaksi}/
                asal_konversi/${listAsal[i].JumlahPengeluaranPrimer}/
                ${listAsal[i].JumlahPengeluaranSekunder}/
                ${listAsal[i].JumlahPengeluaranTritier}`
        );
    }

    for (let i = 0; i < listTujuan.length; i++) {
        fetchStmt(
            `/Benang/updDetailKonvNG/${slcNomor.value}/${listTujuan[i].IdType}/
                ${listTujuan[i].JumlahPengeluaranPrimer}/
                ${listTujuan[i].JumlahPengeluaranSekunder}/
                ${listTujuan[i].JumlahPengeluaranTritier}`
        );

        fetchStmt(
            `/Benang/updTmpTransaksi/${listTujuan[i].IdTransaksi}/
                tujuan_konversi/${listTujuan[i].JumlahPengeluaranPrimer}/
                ${listTujuan[i].JumlahPengeluaranSekunder}/
                ${listTujuan[i].JumlahPengeluaranTritier}`
        );
    }

    clearData();
    disableControl();
    toggleButtons(1);

    modeProses = "";

    alert("Data telah berhasil dikoreksi!");
}

function prosesHapus() {
    // SP_5409_EXT_DELETE_KONVERSI_NG
    fetchStmt(`/Benang/delKonversiNG/${slcNomor.value}`, () => {
        clearData();
        disableControl();
        toggleButtons(1);

        modeProses = "";

        alert("Data telah berhasil dihapus!");
    });
}

function listAsalClicked() {}
//#endregion

function init() {
    if ($.fn.DataTable.isDataTable("#table_tujuan")) {
        $("#table_tujuan").DataTable().destroy();
    }

    if ($.fn.DataTable.isDataTable("#table_asal")) {
        $("#table_asal").DataTable().destroy();
    }

    $("#table_asal").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableCol,
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
        columns: tableCol,
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

    document.getElementById("btn_tes").focus();
});
