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
// const btnRK = document.getElementById("btn_rk");

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
var refetchType = false;
var refetchKonversi = false;
var [pilAsal, pilTujuan] = [-1, -1];
//#endregion

//#region Events
dateInput.addEventListener("change", function () {
    refetchNomor = true;
    refetchKonversi = true;
});

dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (modeProses == "isi") {
            txtShift.disabled = false;
            txtShift.focus();
        } else if (modeProses == "koreksi" || modeProses == "hapus") {
            slcNomor.disabled = false;
            slcNomor.focus();
        }
    }
});

txtShift.addEventListener("change", function () {
    refetchKonversi = true;
});

txtShift.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = this.value.toUpperCase();
        slcNoKonversi.disabled = false;
        slcNoKonversi.focus();
    }
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
            "/Benang/getKoreksiSortirNGBlmAcc/" + dateInput.value,
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
            "/Benang/getKoreksiSortirNGBlmAcc/" + dateInput.value,
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
    let type_mesin = this.value.split("/")[0];
    addOptionIfNotExists(slcMesin, type_mesin);
    txtShift.value = this.value.split("/")[1];

    lihatDataKonversiNGFetch(this.options[this.selectedIndex].text, () => {
        if (modeProses == "koreksi") {
            $("html, body").animate({ scrollTop: pilAsal }, 100);
        } else if (modeProses == "hapus") {
            btnProses.focus();
        }
    });
});

slcNoKonversi.addEventListener("mousedown", function () {
    if (refetchKonversi) {
        refetchKonversi = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "Konversi",
            textKey: "TypeMesin",
        };

        // SP_5298_EXT_LIST_IDKONV
        fetchSelect(
            "/Benang/getListIdKonv/1/EXT/" +
                dateInput.value +
                "/" +
                txtShift.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchKonversi = true;
            },
            errorOption
        );
    }
});

slcNoKonversi.addEventListener("keydown", function (event) {
    if (event.key === "Enter" && refetchKonversi) {
        refetchKonversi = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "Konversi",
            textKey: "TypeMesin",
        };

        // SP_5298_EXT_LIST_IDKONV
        fetchSelect(
            "/Benang/getListIdKonv/1/EXT/" +
                dateInput.value +
                "/" +
                txtShift.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchKonversi = true;
            },
            errorOption
        );
    }
});

slcNoKonversi.addEventListener("change", function () {
    refetchType = true;
    listAsal.length = 0;
    clearTable_DataTable("table_asal", colTable.length, "padding=250px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", colTable.length, "padding=250px");

    let id_konv = this.value.split("//")[0];
    let komposisi = this.value.split("//")[1];
    let type_mesin = this.options[this.selectedIndex].text.split("|")[1].trim();
    addOptionIfNotExists(slcMesin, type_mesin);
    addOptionIfNotExists(this, id_konv, id_konv + " | " + komposisi);
});

slcType.addEventListener("mousedown", function () {
    if (listTujuan.length <= 0) {
        if (refetchType) {
            refetchType = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdType",
                textKey: "Type",
            };

            // SP_5298_EXT_LIST_PROD_NG
            fetchSelect(
                "/Benang/getListProdNG/" + slcNoKonversi.value,
                (data) => {
                    if (data.length > 0) {
                        addOptions(this, data, optionKeys, false);
                        this.removeChild(errorOption);
                    } else refetchType = true;
                },
                errorOption
            );
        }
    } else alert("Tidak Boleh Ubah Type, Karena Sudah Ada Item Tujuan Konversi");
});

slcType.addEventListener("keydown", function (event) {
    if (listTujuan.length <= 0) {
        if (event.key === "Enter" && refetchType) {
            refetchType = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdType",
                textKey: "Type",
            };

            // SP_5298_EXT_LIST_PROD_NG
            fetchSelect(
                "/Benang/getListProdNG/" + slcNoKonversi.value,
                (data) => {
                    if (data.length > 0) {
                        addOptions(this, data, optionKeys, false);
                        this.removeChild(errorOption);
                    } else refetchType = true;
                },
                errorOption
            );
        }
    } else alert("Tidak Boleh Ubah Type, Karena Sudah Ada Item Tujuan Konversi");
});

slcType.addEventListener("change", function () {
    // SP_5298_EXT_CEK_DATA_NG Kode 1
    fetchSelect(
        "/Benang/getCekDataNG/1/" + slcNoKonversi.value + "/" + slcType.value,
        (data) => {
            if (data.length > 0) {
                if (data[0].ada > 0) {
                    // SP_5298_EXT_CEK_DATA_NG Kode 2
                    fetchSelect(
                        "/Benang/getCekDataNG/2/" +
                            slcNoKonversi.value +
                            "/" +
                            slcType.value,
                        (data2) => {
                            if (data2.length > 0) {
                                let nama_type =
                                    slcType.options[slcType.selectedIndex].text;

                                if (data2[0].SaatLog == "Ada") {
                                    alert(
                                        "Type: " +
                                            nama_type +
                                            " sudah disortir dan di-ACC.\n" +
                                            "Cek datanya di Kartu Barang Inventory."
                                    );
                                } else if (
                                    data2[0].SaatLog.toLowerCase() == "null"
                                ) {
                                    alert(
                                        "Type: " +
                                            nama_type +
                                            " sudah disortir namun belum di-ACC.\n" +
                                            "Cek datanya di ACC Sortir Benang NG."
                                    );
                                }
                            }
                        }
                    );
                } else {
                    displayDataBenangNGFetch();
                }
            } else alert("Data Benang NG tidak ditemukan.");
        }
    );
});

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

btnProses.addEventListener("click", function () {
    if (modeProses == "isi") {
        if (listAsal.length <= 0 || listTujuan.length <= 0) {
            alert(
                "Data tidak dapat diproses karena tidak ada asal atau tujuan konversi."
            );
        } else {
            // prosesIsi()
        }
    } else if (modeProses == "koreksi") {
        if (slcNomor.value.trim() == "") {
            alert("Pilih dulu data konversi yang akan dikoreksi.");
        } else {
            showModal(
                "Koreksi",
                "Apakah anda yakin akan mengoreksi data <b>" +
                    slcNomor.value +
                    "</b>?",
                () => {
                    // prosesKoreksi(txtIdKonversi.Text)
                }
            );
        }
    } else if (modeProses == "hapus") {
        if (slcNomor.value.trim() == "") {
            alert("Pilih dulu data konversi yang akan dikoreksi.");
        } else {
            showModal(
                "Hapus",
                "Apakah anda yakin akan menghapus data <b>" +
                    slcNomor.value +
                    "</b>?",
                () => {
                    // prosesHapus(txtIdKonversi.Text)
                }
            );
        }
    }
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent != "Keluar") {
        toggleButtons(1);
        clearAll();
        disableAll();
        modeProses = "";
    } else window.location.href = "/Extruder/ExtruderNet";
});
//#endregion

//#region Functions
function lihatDataKonversiNGFetch(id_konversi, post_action = null) {
    listAsal.length = 0;
    clearTable_DataTable("table_asal", colTable.length, "padding=250px");
    listTujuan.length = 0;
    clearTable_DataTable("table_tujuan", colTable.length, "padding=250px");

    // SP_5298_EXT_LISTDATA_NG
    fetchSelect(
        "/Benang/getListDataNG/" + id_konversi.trim() + "/" + dateInput.value,
        (data_ng) => {
            if (data_ng.length > 0) {
                timeAwal.value = dateTimetoTime(data_ng[0].AwalShift);
                timeAkhir.value = dateTimetoTime(data_ng[0].AkhirShift);

                addOptionIfNotExists(
                    slcNoKonversi,
                    data_ng[0].IdKonversiEXT,
                    data_ng[0].IdKonversiEXT + " | " + data_ng[0].NamaKomposisi
                );

                // SP_5298_EXT_DETAILURAIAN_KONV_NG
                fetchSelect(
                    "/Benang/getDetailUraianKonvNG/" + data_ng[0].IdKonversiINV,
                    (d) => {
                        for (let i = 0; i < d.length; i++) {
                            if (d[i].UraianDetailTransaksi == "Asal Konversi") {
                                listAsal.push({
                                    IdType: d[i].IdType,
                                    NamaType: d[i].NamaType,
                                    JumlahPrimer: d[i].JumlahPengeluaranPrimer,
                                    JumlahSekunder:
                                        d[i].JumlahPengeluaranSekunder,
                                    JumlahTritier:
                                        d[i].JumlahPengeluaranTritier,
                                    NamaObjek: d[i].NamaObjek,
                                    NamaKelompokUtama: d[i].NamaKelompokUtama,
                                    NamaKelompok: d[i].NamaKelompok,
                                    NamaSubKelompok: d[i].NamaSubKelompok,
                                    IdObjek: d[i].IdObjek,
                                    IdKelompokUtama: d[i].IdKelompokUtama,
                                    IdKelompok: d[i].IdKelompok,
                                    IdSubKelompok: d[i].IdSubkelompok,
                                    IdTransaksi: d[i].IdTransaksi,
                                });

                                addTable_DataTable(
                                    "table_asal",
                                    listAsal,
                                    colTable,
                                    rowClickedAsal
                                );
                            } else if (
                                d[i].UraianDetailTransaksi == "Tujuan Konversi"
                            ) {
                                listTujuan.push({
                                    IdType: d[i].IdType,
                                    NamaType: d[i].NamaType,
                                    JumlahPrimer: d[i].JumlahPemasukanPrimer,
                                    JumlahSekunder:
                                        d[i].JumlahPemasukanSekunder,
                                    JumlahTritier: d[i].JumlahPemasukanTritier,
                                    NamaObjek: d[i].NamaObjek,
                                    NamaKelompokUtama: d[i].NamaKelompokUtama,
                                    NamaKelompok: d[i].NamaKelompok,
                                    NamaSubKelompok: d[i].NamaSubKelompok,
                                    IdObjek: d[i].IdObjek,
                                    IdKelompokUtama: d[i].IdKelompokUtama,
                                    IdKelompok: d[i].IdKelompok,
                                    IdSubKelompok: d[i].IdSubkelompok,
                                    IdTransaksi: d[i].IdTransaksi,
                                });

                                addTable_DataTable(
                                    "table_tujuan",
                                    listTujuan,
                                    colTable,
                                    rowClickedTujuan
                                );
                            }

                            if (d.length <= 0)
                                alert("Data konversi tidak ditemukan.");
                        }

                        if (post_action != null) post_action();
                    }
                );
            } else alert("Data NG tidak ditemukan.");
        }
    );
}

function displayDataBenangNGFetch(post_action = null) {
    // SP_5298_EXT_LIST_IDKONV Kode 3
    fetchSelect(
        "/Benang/getListIdKonversiNG/3/" +
            slcNoKonversi.value +
            "/" +
            slcType.value,
        (data) => {
            if (data.length > 0) {
                $("html, body").animate({ scrollTop: pilAsal }, 100);
                for (let i = 0; i < data.length; i++) {
                    listAsal.push({
                        IdType: d[i].IdType,
                        NamaType: d[i].NamaType,
                        JumlahPrimer: d[i].JumlahPrimer,
                        JumlahSekunder: d[i].JumlahSekunder,
                        JumlahTritier: d[i].JumlahTritier,
                        NamaObjek: d[i].NamaObjek,
                        NamaKelompokUtama: d[i].NamaKelompokUtama,
                        NamaKelompok: d[i].NamaKelompok,
                        NamaSubKelompok: d[i].NamaSubKelompok,
                        IdObjek: d[i].IdObjek,
                        IdKelompokUtama: d[i].IdKelompokUtama,
                        IdKelompok: d[i].IdKelompok,
                        IdSubKelompok: d[i].IdSubkelompok,
                        IdTransaksi: "Tidak ada.",
                    });
                }
            } else alert("Hasil Konversi Tidak Menghasilkan Benang NG");
        }
    );
}

function prosesIsiFetch() {
    // SP_5298_EXT_INSERT_MASTERKONV_NG
    fetchStmt(
        "/Benang/insMasterKonvNG/" +
            dateMohon.value +
            "/4384/" +
            slcNoKonversi.value,
        () => {
            fetchSelect("/Benang/getMasterKonversiNG", (data) => {
                if (data.IdKonversiNG !== undefined) {
                    addOptionIfNotExists(slcNomor, data.IdKonversiNG);

                    // SP_5298_EXT_LIST_COUNTER
                    fetchSelect("/Benang/getListCounter", (dataCounter) => {
                        if (dataCounter.length > 0) {
                            // idkonvInv = dr.Item("NoKonversi")
                            // idkonvInv = idkonvInv.PadLeft(9, "0"c)
                            // InsertDetail(idkonvInv)
                        }
                    });
                } else alert("SP_5298_EXT_INSERT_MASTERKONV_NG");
            });
        }
    );
}

function insertDetailFetch(id_konv_inv, post_action = null) {
    // SP_5298_EXT_INSERT_DETAILKONV_NG
}

function rowClickedAsal(row, data, _) {
    if (pilAsal == findClickedRowInList(listAsal, "IdType", data.IdType)) {
        row.style.background = "white";
        pilAsal = -1;
    } else {
        pilAsal = findClickedRowInList(listAsal, "IdType", data.IdType);
        clearSelection_DataTable("tabel_asal");
        row.style.background = "aliceblue";
    }
}
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

    /**
     * DEBUG
     */

    dateInput.value = "2023-08-22";
    lihatDataKonversiNGFetch("1");

    // txtShift.value = "P";
}

$(document).ready(() => init());
