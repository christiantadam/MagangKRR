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

const hidRincianKonv = document.getElementById("form_rk_return");
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
var clickedTable = "";
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

dateMohon.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        dateInput.value = dateMohon.value;
        btnIsi.focus();
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
            prosesIsiFetch();
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

hidRincianKonv.addEventListener("change", function () {
    // console.log("halo");
    if (clickedTable == "asal") {
        if (modeProses == "isi") {
            listTujuan.push({
                IdType: RK_slcType.value,
                NamaType: RK_slcType.options[RK_slcType.selectedIndex].text,
                JumlahPrimer: txtPrimerTujuan.value,
                JumlahSekunder: txtSekunderTujuan.value,
                JumlahTritier: txtTritierTujuan.value,
                NamaObjek: "Bahan & Hasil Produksi",
                NamaKelompokUtama: RK_slcKelut.value,
                NamaKelompok:
                    RK_slcKelut.options[RK_slcKelut.selectedIndex].text,
                NamaSubKelompok:
                    RK_slcSubkel.options[RK_slcSubkel.selectedIndex].text,
                IdObjek: "032",
                IdKelompokUtama: RK_slcKelut.value,
                IdKelompok: RK_slcKelompok.value,
                IdSubKelompok: RK_slcSubkel.value,
                IdTransaksi: "",
            });

            addTable_DataTable(
                "table_tujuan",
                listTujuan,
                colTable,
                rowClickedTujuan
            );
        } else if (modeProses == "koreksi") {
            listAsal[pilAsal].JumlahPrimer = txtPrimerAsal.value;
            listAsal[pilAsal].JumlahSekunder = txtSekunderAsal.value;
            listAsal[pilAsal].JumlahTritier = txtTritierAsal.value;
        }
    } else if (clickedTable == "tujuan") {
        listTujuan[pilTujuan].JumlahPrimer = txtPrimerTujuan.value;
        listTujuan[pilTujuan].JumlahSekunder = txtSekunderTujuan.value;
        listTujuan[pilTujuan].JumlahTritier = txtTritierTujuan.value;
    }

    clickedTable = "";
    btnProses.focus();
});

$("#form_rincian_konversi").on("hidden.bs.modal", function () {
    RK_clearAll();
    pilAsal = -1;
    clearSelection_DataTable("table_asal");
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
        "/Benang/getListIdKonv/3/" + slcNoKonversi.value + "/" + slcType.value,
        (d) => {
            if (d.length > 0) {
                $("html, body").animate({ scrollTop: pilAsal }, 100);
                for (let i = 0; i < d.length; i++) {
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
                        IdSubKelompok: d[i].IdSubKelompok,
                        IdTransaksi: "Tidak ada.",
                    });
                }

                addTable_DataTable(
                    "table_asal",
                    listAsal,
                    colTable,
                    rowClickedAsal
                );
            } else alert("Hasil Konversi Tidak Menghasilkan Benang NG");
            if (post_action != null) post_action();
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
                            insertDetailFetch(
                                padLeft(dataCounter[0].NoKonversi, 9, "0"),
                                () => {
                                    clearAll();
                                    disableAll();
                                    toggleButtons(1);
                                    modeProses = "";
                                    alert("Data berhasil tersimpan.");
                                }
                            );
                        }
                    });
                } else alert("SP_5298_EXT_INSERT_MASTERKONV_NG");
            });
        }
    );
}

function insertDetailFetch(id_konv_inv, post_action = null) {
    for (let i = 0; i < listAsal.length; i++) {
        // SP_5298_EXT_INSERT_DETAILKONV_NG
        fetchStmt(
            "/Benang/insDetailKonvNG/" +
                slcNomor.options[slcNomor.selectedIndex].text +
                "/" +
                listAsal[i].IdType +
                "/" +
                listAsal[i].JumlahPrimer +
                "/" +
                listAsal[i].JumlahSekunder +
                "/" +
                listAsal[i].JumlahTritier +
                "/" +
                id_konv_inv,
            () => {
                if (i == listAsal.length - 1) {
                    createTmpTransaksiInventoryFetch(i, id_konv_inv, 0, () => {
                        if (post_action != null) post_action();
                    });
                } else {
                    createTmpTransaksiInventoryFetch(i, id_konv_inv, 0);
                }
            }
        );
    }

    for (let i = 0; i < listTujuan.length; i++) {
        // SP_5298_EXT_INSERT_DETAILKONV_NG
        fetchStmt(
            "/Benang/insDetailKonvNG/" +
                slcNomor.options[slcNomor.selectedIndex].text +
                "/" +
                listTujuan[i].IdType +
                "/" +
                listTujuan[i].JumlahPrimer +
                "/" +
                listTujuan[i].JumlahSekunder +
                "/" +
                listTujuan[i].JumlahTritier +
                "/" +
                id_konv_inv,
            () => {
                if (i == listTujuan.length - 1) {
                    createTmpTransaksiInventoryFetch(i, id_konv_inv, 1, () => {
                        if (post_action != null) post_action();
                    });
                } else {
                    createTmpTransaksiInventoryFetch(i, id_konv_inv, 1);
                }
            }
        );
    }
}

function createTmpTransaksiInventoryFetch(
    i,
    id_konv_inv,
    status,
    post_action = null
) {
    if (status == 0) {
        // SP_5298_EXT_INSERT_04_ASALTMPTRANSAKSI
        fetchStmt(
            "/Benang/insAsalTmpTrans/04/asal_konversi/" +
                listAsal[i].IdType.trim() +
                "/4384/" +
                dateMohon.value +
                "/" +
                listAsal[i].JumlahPrimer +
                "/" +
                listAsal[i].JumlahSekunder +
                "/" +
                listAsal[i].JumlahTritier +
                "/" +
                listAsal[i].IdSubKelompok.trim() +
                "/" +
                id_konv_inv.trim(),
            () => {
                if (post_action != null) post_action();
            }
        );
    } else if (status == 1) {
        // SP_5298_EXT_INSERT_04_TUJUANTMPTRANSAKSI
        fetchStmt(
            "/Benang/insTujuanTmpTrans/04/tujuan_konversi/" +
                listAsal[i].IdType.trim() +
                "/4384/" +
                dateMohon.value +
                "/" +
                listAsal[i].JumlahPrimer +
                "/" +
                listAsal[i].JumlahSekunder +
                "/" +
                listAsal[i].JumlahTritier +
                "/" +
                listAsal[i].IdSubKelompok.trim() +
                "/" +
                id_konv_inv.trim(),
            () => {
                if (post_action != null) post_action();
            }
        );
    }
}

function prosesKoreksiFetch() {
    let [asalDone, tujuanDone] = [false, false];
    const post_action = () => {
        clearAll();
        disableAll();
        toggleButtons(1);
        modeProses = "";
        alert("Data berhasil dikoreksi.");
    };

    for (let i = 0; i < listAsal.length; i++) {
        // SP_5298_EXT_UPDATE_DETAIL_KONV_NG
        fetchStmt(
            "/Benang/updDetailKonvNG/" +
                slcNomor.options[slcNomor.selectedIndex].text +
                "/" +
                listAsal[i].IdType +
                "/" +
                listAsal[i].JumlahPrimer +
                "/" +
                listAsal[i].JumlahSekunder +
                "/" +
                listAsal[i].JumlahTritier,
            () => {
                // SP_5298_EXT_UPDATE_TMPTRANSAKSI
                fetchStmt(
                    "/Benang/updTmpTransaksi/" +
                        listAsal[i].IdTransaksi +
                        "/asal_konversi/" +
                        listAsal[i].JumlahPrimer +
                        "/" +
                        listAsal[i].JumlahSekunder +
                        "/" +
                        listAsal[i].JumlahTritier,
                    () => {
                        asalDone = true;
                        if (i == listAsal.length - 1 && tujuanDone)
                            post_action();
                    }
                );
            }
        );
    }

    for (let i = 0; i < listTujuan.length; i++) {
        // SP_5298_EXT_UPDATE_DETAIL_KONV_NG
        fetchStmt(
            "/Benang/updDetailKonvNG/" +
                slcNomor.options[slcNomor.selectedIndex].text +
                "/" +
                listTujuan[i].IdType +
                "/" +
                listTujuan[i].JumlahPrimer +
                "/" +
                listTujuan[i].JumlahSekunder +
                "/" +
                listTujuan[i].JumlahTritier,
            () => {
                // SP_5298_EXT_UPDATE_TMPTRANSAKSI
                fetchStmt(
                    "/Benang/updTmpTransaksi/" +
                        listTujuan[i].IdTransaksi +
                        "/asal_konversi/" +
                        listTujuan[i].JumlahPrimer +
                        "/" +
                        listTujuan[i].JumlahSekunder +
                        "/" +
                        listTujuan[i].JumlahTritier,
                    () => {
                        tujuanDone = true;
                        if (i == listTujuan.length - 1 && asalDone)
                            post_action();
                    }
                );
            }
        );
    }
}

function prosesHapusFetch(id_konversi_ng) {
    // SP_5409_EXT_DELETE_KONVERSI_NG
    fetchStmt("/Benang/delKonversiNG/" + id_konversi_ng, () => {
        clearAll();
        disableAll();
        toggleButtons(1);
        modeProses = "";
        alert("Data berhasil dihapus.");
    });
}

function rowClickedAsal(row, data, _) {
    if (pilAsal == findClickedRowInList(listAsal, "IdType", data.IdType)) {
        row.style.background = "white";
        pilAsal = -1;
    } else {
        pilAsal = findClickedRowInList(listAsal, "IdType", data.IdType);
        clearSelection_DataTable("tabel_asal");
        row.style.background = "aliceblue";
        clickedTable = "asal";

        // $("#form_rincian_konversi").modal("show");

        if (modeProses == "koreksi" || modeProses == "isi") {
            RK_txtIdKelut.value = data.IdKelompokUtama;
            RK_txtNamaKelut.value = data.NamaKelompokUtama;
            RK_txtIdKelompok.value = data.IdKelompok;
            RK_txtNamaKelompok.value = data.NamaKelompok;
            RK_txtIdSubkel.value = data.IdSubKelompok;
            RK_txtNamaKelompok.value = data.NamaSubKelompok;
            RK_txtIdType.value = data.IdType;
            RK_txtNamaType.value = data.NamaType;

            if (modeProses == "koreksi") {
                txtPrimerAsal.value = data.JumlahPrimer;
                txtSekunderAsal.value = data.JumlahSekunder;
                txtTritierAsal.value = data.JumlahTritier;
                boxTujuanKonversi.forEach((ele) => (ele.disabled = true));
            }

            $("#form_rincian_konversi").modal("show");
        }
    }
}
function rowClickedTujuan(row, data, _) {
    if (pilTujuan == findClickedRowInList(listTujuan, "IdType", data.IdType)) {
        row.style.background = "white";
        pilTujuan = -1;
    } else {
        pilTujuan = findClickedRowInList(listTujuan, "IdType", data.IdType);
        clearSelection_DataTable("tabel_asal");
        row.style.background = "aliceblue";
        clickedTable = "tujuan";

        // $("#form_rincian_konversi").modal("show");

        if (modeProses == "koreksi") {
            addOptionIfNotExists(
                RK_slcKelut,
                listTujuan[pilTujuan].IdKelompokUtama,
                listTujuan[pilTujuan].IdKelompokUtama +
                    " | " +
                    listTujuan[pilTujuan].NamaKelompokUtama
            );

            addOptionIfNotExists(
                RK_slcKelompok,
                listTujuan[pilTujuan].IdKelompok,
                listTujuan[pilTujuan].IdKelompok +
                    " | " +
                    listTujuan[pilTujuan].NamaKelompok
            );

            addOptionIfNotExists(
                RK_slcSubkel,
                listTujuan[pilTujuan].IdSubKelompok,
                listTujuan[pilTujuan].IdSubKelompok +
                    " | " +
                    listTujuan[pilTujuan].NamaSubKelompok
            );

            addOptionIfNotExists(
                RK_slcType,
                listTujuan[pilTujuan].IdType,
                listTujuan[pilTujuan].IdType +
                    " | " +
                    listTujuan[pilTujuan].NamaType
            );

            boxAsalKonversi.forEach((ele) => (ele.disabled = true));
            txtPrimerTujuan.focus();
        }
    }
}

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

    // dateInput.value = "2023-08-22";
    // lihatDataKonversiNGFetch("1");

    // txtShift.value = "P";

    addOptionIfNotExists(slcNoKonversi, "EXT-0000009043");
    addOptionIfNotExists(slcType, "1");
    displayDataBenangNGFetch();
}

$(document).ready(() => init());
