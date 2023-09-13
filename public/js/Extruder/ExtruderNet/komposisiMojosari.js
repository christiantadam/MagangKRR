//#region Variables
const slcKomposisi = document.getElementById("select_id_komposisi");
const slcMesin = document.getElementById("select_mesin");
const slcObjek = document.getElementById("select_objek");
const slcKelut = document.getElementById("select_kelompok_utama");
const slcKelompok = document.getElementById("select_kelompok");
const slcSubkel = document.getElementById("select_sub_kelompok");
const slcType = document.getElementById("select_type");
const slcHP = document.getElementById("select_hp");
const slcNG = document.getElementById("select_hp_ng");
const slcAF = document.getElementById("select_afalan");

const numPrimer = document.getElementById("primer");
const numSekunder = document.getElementById("sekunder");
const numTritier = document.getElementById("tritier");
const numPersentase = document.getElementById("persentase");
const numCadangan = document.getElementById("cadangan");
const numPersentase2 = document.getElementById("persentase2");
const numCadangan2 = document.getElementById("cadangan2");

const txtSatPrimer = document.getElementById("sat_primer");
const txtSatSekunder = document.getElementById("sat_sekunder");
const txtSatTritier = document.getElementById("sat_tritier");
const txtKodeBarang = document.getElementById("kode_barang");
const txtNamaKomposisi = document.getElementById("nama_komposisi");

const btnTambahDetail = document.getElementById("btn_tambah_detail");
const btnKoreksiDetail = document.getElementById("btn_koreksi_detail");
const btnHapusDetail = document.getElementById("btn_hapus_detail");
const btnCadanganDetail = document.getElementById("btn_cadangan_detail");
const btnBaruMaster = document.getElementById("btn_baru_master");
const btnKoreksiMaster = document.getElementById("btn_koreksi_master");
const btnHapusMaster = document.getElementById("btn_hapus_master");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const btnTambahAfalan = document.getElementById("btn_tambah_afalan");

const radKomposisi = document.getElementById("radio_bb");
const radHP = document.getElementById("radio_hp");
const radAF = document.getElementById("radio_af");

const listOfMaster = document.querySelectorAll("#master .form-select");
const listOfDetail = document.querySelectorAll(
    ".card .form-control, .card .form-select"
);

const posKomposisi = $("#table_komposisi").offset().top - 125;
const colKomposisi = [
    { width: "1px" }, // Jenis
    { width: "100px" }, // Id Type
    { width: "250px" }, // Nama Type
    { width: "100px" }, // Qty. Primer
    { width: "100px" }, // Sat. Primer
    { width: "110px" }, // Qty. Sekunder
    { width: "110px" }, // Sat. Sekunder
    { width: "100px" }, // Qty. Tritier
    { width: "100px" }, // Sat. Tritier
    { width: "1px" }, // Persentase
    { width: "80px" }, // Id Objek
    { width: "100px" }, // Nama Objek
    { width: "80px" }, // Id KelUt.
    { width: "100px" }, // Nama KelUt.
    { width: "100px" }, // Id Kelompok
    { width: "100px" }, // Kelompok
    { width: "80px" }, // Id SubKel.
    { width: "100px" }, // SubKel.
    { width: "100px" }, // Kode Barang
    { width: "1px" }, // Cadangan
];

const listKomposisi = [];
/* ISI LIST KOMPOSISI
    0 StatusType
    1 IdType
    2 NamaType
    3 JumlahPrimer
    4 SatuanPrimer
    5 JumlahSekunder
    6 SatuanSekunder
    7 JumlahTritier
    8 SatuanTritier
    9 Persentase
    10 IdObjek
    11 NamaObjek
    12 IdKelompokUtama
    13 NamaKelompokUtama
    14 IdKelompok
    15 NamaKelompok
    16 IdSubKelompok
    17 NamaSubKelompok
    18 KodeBarang
    19 Cadangan
*/

const listAfalan = [];
/* ISI LIST AFALAN
    0 KodeBarang
    1 NamaType
*/

var [unitPrimer, unitSekunder, unitTritier] = ["", "", "", ""];
var jumlah = 0;
var modeProses = "";
var refetchKelut = false;
var refetchKelompok = false;
var refetchSubkel = false;
var refetchType = false;
var refetchKomposisi = false;
//#endregion

//#region Events
slcKomposisi.addEventListener("mousedown", function () {
    if (refetchKomposisi) {
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKomposisi",
            textKey: "NamaKomposisi",
        };

        // SP_5298_EXT_LIST_KOMPOSISI_1
        fetchSelect(
            "/Master/getListKomposisi/MEX",
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKomposisi.addEventListener("keydown", function (event) {
    if (event.key == "Enter") {
        if (refetchKomposisi) {
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdKomposisi",
                textKey: "NamaKomposisi",
            };

            // SP_5298_EXT_LIST_KOMPOSISI_1
            fetchSelect(
                "/Master/getListKomposisi/MEX",
                (data) => {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                },
                errorOption
            );
        }
    }
});

slcKomposisi.addEventListener("change", function () {
    clearDataDetail();
    jumlah = 0;
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );

    // SP_5298_EXT_LIST_KOMPOSISI_1
    fetchSelect(
        "/Master/getListKomposisi/MEX/" + slcKomposisi.value,
        (data) => {
            if (data.length > 0) {
                addOptionIfNotExists(
                    slcMesin,
                    data[0].IdMesin,
                    data[0].IdMesin + " | " + data[0].TypeMesin
                );
            } else
                addOptionIfNotExists(slcMesin, "Data mesin tidak ditemukan.");

            // SP_1273_PRG_BOM_Barang Kode 5
            fetchSelect(
                "/Master/getPrgBomBarang/5/MEX/" + slcKomposisi.value,
                (data2) => {
                    if (data2.length > 0) {
                        addOptionIfNotExists(
                            slcHP,
                            data2[0].KodeBarang,
                            data2[0].KodeBarang + " | " + data2[0].NamaType
                        );
                    } else
                        addOptionIfNotExists(
                            slcHP,
                            "Data barang tidak ditemukan."
                        );

                    // SP_1273_PRG_BOM_Barang Kode 6
                    fetchSelect(
                        "/Master/getPrgBomBarang/6/MEX/" + slcKomposisi.value,
                        (data3) => {
                            if (data3.length > 0) {
                                addOptionIfNotExists(
                                    slcNG,
                                    data3[0].KodeBarang,
                                    data3[0].KodeBarang +
                                        " | " +
                                        data3[0].NamaType
                                );
                            } else
                                addOptionIfNotExists(
                                    slcNG,
                                    "Data barang tidak ditemukan."
                                );

                            listAfalan.length = 0;
                            clearTable_DataTable(
                                "table_afalan",
                                2,
                                "Memuat data..."
                            );

                            // SP_1273_PRG_BOM_Barang Kode 7
                            fetchSelect(
                                "/Master/getPrgBomBarang/7/MEX/" +
                                    slcKomposisi.value +
                                    "/7227",
                                (data3) => {
                                    for (let i = 0; i < data3.length; i++) {
                                        listAfalan.push({
                                            KodeBarang: data3[i].KodeBarang,
                                            NamaType: data3[i].NamaType,
                                        });
                                    }

                                    getDataKomposisiFetch(
                                        slcKomposisi.value,
                                        () => {
                                            if (modeProses == "baru") {
                                                slcMesin.disabled = false;
                                                slcMesin.focus();
                                            } else if (
                                                modeProses == "koreksi"
                                            ) {
                                                addOptionIfNotExists(
                                                    slcObjek,
                                                    213,
                                                    213 +
                                                        " | " +
                                                        "Bahan dan Hasil Produksi"
                                                );
                                                btnKoreksiDetail.disabled = false;
                                                numPersentase.disabled = false;
                                                numCadangan.disabled = false;
                                                slcKelut.disabled = false;
                                                slcKelut.focus();
                                            } else if (modeProses == "hapus") {
                                                btnProses.focus();
                                            } else if (
                                                modeProses == "hapus_detail"
                                            ) {
                                                btnHapusDetail.disabled = false;
                                                $("html, body").animate(
                                                    { scrollTop: posKomposisi },
                                                    100
                                                );
                                            }
                                        }
                                    );
                                }
                            );
                        }
                    );
                }
            );
        }
    );
});

slcMesin.addEventListener("change", function () {
    jumlah = 0;
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    clearDataDetail();
    slcHP.disabled = false;
    numCadangan.value = "";
    slcHP.focus();
});

slcObjek.addEventListener("change", function () {
    slcKelut.selectedIndex = 0;
    slcKelompok.selectedIndex = 0;
    slcType.selectedIndex = 0;
    slcSubkel.selectedIndex = 0;
    slcKelut.disabled = false;
    slcKelut.focus();
});

slcKelut.addEventListener("mousedown", function () {
    if (this.querySelectorAll("option").length <= 1 || refetchKelut) {
        refetchKelut = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKelompokUtama",
            textKey: "NamaKelompokUtama",
        };

        // SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA
        fetchSelect(
            "/Master/getIdObjekKelompokUtama/" + slcObjek.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKelut.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (this.querySelectorAll("option").length <= 1 || refetchKelut) {
            refetchKelut = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdKelompokUtama",
                textKey: "NamaKelompokUtama",
            };

            // SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA
            fetchSelect(
                "/Master/getIdObjekKelompokUtama/" + slcObjek.value,
                (data) => {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                },
                errorOption
            );
        }
    }
});

slcKelut.addEventListener("change", function () {
    if (this.value == "0117") {
        showModal(
            "Konfirmasi",
            "Anda akan memasukkan data bahan pembantu, apakah anda telah memasukkan semua <b>bahan baku</b>?",
            () => {
                slcKelompok.disabled = false;
                slcKelompok.focus();
            },
            () => {
                this.focus();
            }
        );
    } else {
        slcKelompok.disabled = false;
        slcKelompok.focus();
    }

    slcKelompok.selectedIndex = 0;
    slcType.selectedIndex = 0;
    slcSubkel.selectedIndex = 0;
    refetchKelompok = true;
});

slcKelompok.addEventListener("mousedown", function () {
    if (this.querySelectorAll("option").length <= 1 || refetchKelompok) {
        refetchKelompok = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "idkelompok",
            textKey: "namakelompok",
        };

        // SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK
        fetchSelect(
            "/Master/getIdKelompokUtamaKelompok/" + slcKelut.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKelompok.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (this.querySelectorAll("option").length <= 1 || refetchKelompok) {
            refetchKelompok = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "idkelompok",
                textKey: "namakelompok",
            };

            // SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK
            fetchSelect(
                "/Master/getIdKelompokUtamaKelompok/" + slcKelut.value,
                (data) => {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                },
                errorOption
            );
        }
    }
});

slcKelompok.addEventListener("change", function () {
    refetchSubkel = true;
    slcSubkel.disabled = false;
    slcSubkel.focus();
    slcType.selectedIndex = 0;
    slcSubkel.selectedIndex = 0;

    if (slcKelut.value == "1977" || slcKelut.value == "1994") {
        // Pengecekkan mesin pada DB Inventory dan Extruder
        // SP_5298_EXT_CEK_KELOMPOK_MESIN
        fetchSelect("/Master/getCekKelompokMesin/" + this.value, (data) => {
            if (data.length < 1 || slcMesin.value != data[0].IdMesin) {
                slcSubkel.disabled = true;
                refetchSubkel = false;
                this.selectedIndex = 0;
                this.focus();

                if (data.length < 1) {
                    alert("Mesin tidak ditemukan");
                } else alert("Mesin tidak sama.");
            }
        });
    }
});

slcSubkel.addEventListener("mousedown", function () {
    if (this.querySelectorAll("option").length <= 1 || refetchSubkel) {
        refetchSubkel = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "idsubkelompok",
            textKey: "namasubkelompok",
        };

        // SP_5298_EXT_IDKELOMPOK_SUBKELOMPOK
        fetchSelect(
            "/Master/getIdKelompokSubKelompok/" + slcKelompok.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcSubkel.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (this.querySelectorAll("option").length <= 1 || refetchSubkel) {
            refetchSubkel = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "idsubkelompok",
                textKey: "namasubkelompok",
            };

            // SP_5298_EXT_IDKELOMPOK_SUBKELOMPOK
            fetchSelect(
                "/Master/getIdKelompokSubKelompok/" + slcKelompok.value,
                (data) => {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                },
                errorOption
            );
        }
    }
});

slcSubkel.addEventListener("change", function () {
    refetchType = true;
    slcType.disabled = false;
    slcType.focus();
});

slcType.addEventListener("mousedown", function () {
    if (this.querySelectorAll("option").length <= 1 || refetchType) {
        refetchType = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdType",
            textKey: "NamaType",
        };

        // SP_5298_EXT_IDSUBKELOMPOK_TYPE
        fetchSelect(
            "/Master/getIdSubKelompokType/" + slcSubkel.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcType.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        refetchType = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdType",
            textKey: "NamaType",
        };

        // SP_5298_EXT_IDSUBKELOMPOK_TYPE
        fetchSelect(
            "/Master/getIdSubKelompokType/" + slcSubkel.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcType.addEventListener("change", function () {
    getSatuanFetch(this.value);
    if (txtSatPrimer.value.trim() == "Null") {
        numPrimer.value = 1;
        numSekunder.disabled = false;
        numSekunder.value = "";
        numSekunder.focus();
    } else if (txtSatSekunder.value.trim() == "Null") {
        numPrimer.value = 0;
        numSekunder.value = 1;
        numTritier.disabled = false;
        numTritier.value = "";
        numTritier.focus();
    } else if (txtSatTritier.value.trim() == "Null") {
        numPrimer.value = 0;
        numSekunder.value = 0;
        numTritier.disabled = false;
        numTritier.value = "";
        numTritier.focus();
    }
});

btnKoreksiMaster.addEventListener("click", function () {
    if (slcKomposisi.classList.contains("hidden")) {
        txtNamaKomposisi.classList.add("hidden");
        slcKomposisi.classList.remove("hidden");
    }

    clearDataMaster();
    clearDataDetail();
    jumlah = 0;
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    slcKomposisi.disabled = false;
    slcKomposisi.focus();
    modeProses = "koreksi";
    toggleButtons(2);
});

btnBaruMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();
    jumlah = 0;
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    slcKomposisi.classList.add("hidden");
    txtNamaKomposisi.classList.remove("hidden");
    txtNamaKomposisi.focus();
    toggleButtons(2);
    modeProses = "baru";
    numCadangan.value = "";
});

btnHapusMaster.addEventListener("click", function () {
    if (slcKomposisi.classList.contains("hidden")) {
        txtNamaKomposisi.classList.add("hidden");
        slcKomposisi.classList.remove("hidden");
    }

    showModal(
        "Hapus Semua",
        "Apakah anda ingin menghapus semua data komposisi bahan atau hanya sebagian?",
        () => {
            modeProses = "hapus";
            jumlah = 0;

            clearDataMaster();
            clearDataDetail();
            slcKomposisi.disabled = false;
            slcKomposisi.focus();
            toggleButtons(2);

            listKomposisi.length = 0;
            clearTable_DataTable(
                "table_komposisi",
                colKomposisi.length,
                "padding=250px"
            );
        },
        () => {
            modeProses = "hapus_detail";
            jumlah = 0;

            clearDataMaster();
            clearDataDetail();
            slcKomposisi.disabled = false;
            slcKomposisi.focus();
            toggleButtons(2);

            listKomposisi.length = 0;
            clearTable_DataTable(
                "table_komposisi",
                colKomposisi.length,
                "padding=250px"
            );
        },
        "Hapus Sebagian"
    );
});

btnTambahDetail.addEventListener("click", function () {
    let jenis = "";
    switch (slcKelut.value) {
        case "1977":
            jenis = "BB";
            break;
        case "1978":
            jenis = "BP";
            break;
        case "1994":
            jenis = "HP";
            break;
        case "1976":
            jenis = "AF";
            break;
        default:
            jenis = "__";
            break;
    }

    for (let i = 0; i < listOfDetail.length; i++) {
        const ele = listOfDetail[i];
        if (ele.tagName == "INPUT") {
            if (ele.value.trim() == "") {
                alert("Ada data yang belum terisi, mohon periksa kembali.");
                ele.focus();
                return;
            }
        } else if (ele.tagName == "SELECT") {
            if (ele.selectedIndex == 0) {
                alert("Ada data yang belum terisi, mohon periksa kembali.");
                ele.focus();
                return;
            }
        }
    }

    let jmlh = listKomposisi.length;
    let id_type_found = findClickedRowInList(
        listKomposisi,
        "IdType",
        slcType.value
    );
    let hp_found = findClickedRowInList(listKomposisi, "Jenis", "HP");
    let bb_found = findClickedRowInList(listKomposisi, "Jenis", "BB");
    // LAST butuh tahu subitem 17
});
//#endregion

//#region Functions
function getDataKomposisiFetch(no_komposisi, post_action = null) {
    jumlah = 0;
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length, [
        "padding=250px",
        "Memuat data...",
    ]);

    // SP_1273_EXT_LIST_KOMPOSISI_BAHAN
    fetchSelect("/Master/getListKomposisiBahanMjs/" + no_komposisi, (data) => {
        for (let i = 0; i < data.length; i++) {
            listKomposisi.push({
                StatusType: data[i].StatusType,
                IdType: data[i].IdType,
                NamaType: data[i].NamaType,
                JumlahPrimer: data[i].JumlahPrimer,
                SatuanPrimer:
                    data[i].SatuanPrimer !== undefined
                        ? data[i].SatuanPrimer
                        : "Null",
                JumlahSekunder: data[i].JumlahSekunder,
                SatuanSekunder:
                    data[i].SatuanSekunder !== undefined
                        ? data[i].SatuanSekunder
                        : "Null",
                JumlahTritier: data[i].JumlahTritier,
                SatuanTritier:
                    data[i].SatuanTritier !== undefined
                        ? data[i].SatuanTritier
                        : "Null",
                Persentase: data[i].Persentase,
                IdObjek: data[i].IdObjek,
                NamaObjek: data[i].NamaObjek,
                IdKelompokUtama: data[i].IdKelompokUtama,
                NamaKelompokUtama: data[i].NamaKelompokUtama,
                IdKelompok: data[i].IdKelompok,
                NamaKelompok: data[i].NamaKelompok,
                IdSubKelompok: data[i].IdSubKelompok,
                NamaSubKelompok: data[i].NamaSubKelompok,
                KodeBarang: data[i].KodeBarang,
                Cadangan: data[i].Cadangan,
            });
        }

        // SP_1273_MEX_CEK_JumlahKomposisi
        fetchSelect(
            "/Master/getCekJumlahKomposisi/2/" + slcKomposisi.value,
            (data) => {
                if (data[0].Jumlah !== undefined) jumlah = data[0].Jumlah;
                if (post_action != null) post_action();
            }
        );
    });
}

function getSatuanFetch(id_type) {
    // SP_5298_EXT_DETAIL_BAHAN
    fetchSelect("/Master/getDetailBahan/" + id_type, (data) => {
        txtKodeBarang.value = data[0].KodeBarang;
        unitPrimer = data[0].UnitPrimer;
        unitSekunder = data[0].UnitSekunder;
        unitTritier = data[0].UnitTritier;
        txtSatPrimer.value = data[0].satPrimer;
        txtSatSekunder.value = data[0].satSekunder;
        txtSatTritier.value = data[0].nama_satuan;
    });
}

function clearDataDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.id != exception_ele) {
            if (ele.tagName == "INPUT") {
                ele.value = "";
            } else ele.selectedIndex = 0;
        }
    });
}

function clearDataMaster() {
    listOfMaster.forEach((slc) => (slc.selectedIndex = 0));
}

function disableDetail() {
    listOfDetail.forEach((ele) => (ele.disabled = true));
}

function toggleButtons(tmb) {
    switch (tmb) {
        case 1:
            slcKomposisi.disabled = true;
            btnBaruMaster.disabled = false;
            btnKoreksiMaster.disabled = false;
            btnHapusMaster.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;
        case 2:
            btnBaruMaster.disabled = true;
            btnKoreksiMaster.disabled = true;
            btnHapusMaster.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";
            break;

        default:
            break;
    }
}
//#endregion

function init() {
    $("#table_afalan").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        searching: false,
        info: false,
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

    // toggleButtons(1);
    clearTable_DataTable("table_afalan", 2);
    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );
}

$(document).ready(() => init());
