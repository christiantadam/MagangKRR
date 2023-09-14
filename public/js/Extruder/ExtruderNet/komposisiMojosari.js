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

// const radKomposisi = document.getElementById("radio_bb");
// const radHP = document.getElementById("radio_hp");
// const radAF = document.getElementById("radio_af");

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
var refetchHP = false;
var pilKomposisi = -1;
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
            "Anda akan memasukkan data Bahan Pembantu, apakah anda telah memasukkan semua <b>Bahan Baku</b>?",
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

    const postModal = () => {
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
    };

    showModal(
        "Hapus Semua",
        "Apakah anda ingin menghapus semua data komposisi bahan atau hanya sebagian?",
        () => {
            modeProses = "hapus";
            postModal();
        },
        () => {
            modeProses = "hapus_detail";
            postModal();
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

    let [hp_found, bb_found, bp_found, type_found] = [-1, -1, -1, -1];

    if (findClickedRowInList(listKomposisi, "IdType", slcType.value) != -1)
        type_found = 1;

    if (
        findClickedRowInList(
            listKomposisi,
            "NamaSubKelompok",
            slcSubkel.options[slcSubkel.selectedIndex].text
        ) != -1
    )
        bp_found = 1;

    if (
        jenis == "HP" &&
        findClickedRowInList(listKomposisi, "StatusType", jenis) != -1
    ) {
        hp_found = 1;
        slcKelut.focus();
        alert("Hasil produksi telah dipilih.");
    } else if (
        jenis == "BB" &&
        findClickedRowInList(listKomposisi, "StatusType", jenis) != -1
    ) {
        bb_found = 1;
    } else if (jenis == "AF") {
        slcKelut.focus();
        alert("Afalan telah dipilih.");
    }

    jumlah += parseFloat(numPersentase.value);
    jumlah = jumlah.toString().substring(0, 6);

    if (parseFloat(jumlah) > 100 || numPersentase.value <= 0) {
        if (parseFloat(jumlah) > 100) {
            alert("Persentase yang dimasukkan tidak boleh lebih dari 100%!");
        } else alert("Persentase harus diisi terlebih dahulu.");

        jumlah += parseFloat(numPersentase.value);
        numPersentase.focus();
        return;
    }

    if (type_found == 1) {
        alert("Sudah ada type yang sama dalam Komposisi.");
        return;
    } else if (hp_found == 1) {
        alert("Hanya boleh terdapat 1 Hasil Produksi dalam Komposisi.");
        return;
    } else if (bb_found == 1) {
        alert("Hanya boleh terdapat 1 Bahan Baku dalam Komposisi.");
        return;
    } else if (bp_found == 1) {
        alert(
            "Sudah ada Bahan Pembantu dengan Sub-kelompok yang sama dalam Komposisi."
        );
        return;
    } else {
        listKomposisi.push({
            StatusType: jenis,
            IdType: slcType.value,
            NamaType: slcType.options[slcType.selectedIndex].text,
            JumlahPrimer: numPrimer.value,
            SatuanPrimer: txtSatPrimer.value,
            JumlahSekunder: numSekunder.value,
            SatuanSekunder: txtSatSekunder.value,
            JumlahTritier: numTritier.value,
            SatuanTritier: txtSatTritier.value,
            Persentase: numPersentase.value,
            IdObjek: slcObjek.value,
            NamaObjek: slcObjek.options[slcObjek.selectedIndex].text,
            IdKelompokUtama: slcKelut.value,
            NamaKelompokUtama: slcKelut.options[slcKelut.selectedIndex].text,
            IdKelompok: slcKelompok.value,
            NamaKelompok: slcKelompok.options[slcKelompok.selectedIndex].text,
            IdSubKelompok: slcSubkel.value,
            NamaSubKelompok: slcSubkel.options[slcSubkel.selectedIndex].text,
            KodeBarang: txtKodeBarang.value,
            Cadangan: numCadangan.value,
        });

        addTable_DataTable(
            "table_komposisi",
            listKomposisi,
            colKomposisi,
            rowClickedFetch
        );

        showModal(
            "Tambah Lagi",
            "Ingin input data bahan / hasil produksi lagi?",
            () => {
                clearDataDetail("select_objek");
                slcKelut.focus();
            },
            () => {
                btnProses.focus();
            }
        );
    }
});

btnKoreksiDetail.addEventListener("click", function () {
    if (pilKomposisi != -1) {
        showModal(
            "Koreksi",
            "Anda yakin akan mengoreksi Type <b>" +
                listKomposisi[pilKomposisi].NamaType +
                "</b>?",
            () => {
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

                let isEmpty = false;
                for (let i = 0; i < listOfDetail.length; i++) {
                    const ele = listOfDetail[i];
                    if (ele.tagName == "INPUT") {
                        if (ele.value.trim() == "") isEmpty = true;
                    } else if (ele.tagName == "SELECT") {
                        if (ele.selectedIndex == 0) isEmpty = true;
                    }

                    if (isEmpty) {
                        alert(
                            "Ada data yang belum terisi, mohon periksa kembali."
                        );
                        ele.focus();
                        return;
                    }
                }

                let found = false;
                for (let i = 0; i < listKomposisi.length; i++) {
                    if (
                        listKomposisi[i].IdType == slcType.value &&
                        listKomposisi[i].Cadangan == numCadangan.value &&
                        listKomposisi[i].Persentase == numPersentase.value
                    ) {
                        found = true;
                        break;
                    }
                }

                if (numCadangan.value == 0) {
                    jumlah -= numPersentase2.value - numPersentase.value;
                    jumlah = jumlah.toString().substring(0, 6);

                    if (parseFloat(jumlah) > 100) {
                        alert(
                            "Persentase yang dimasukkan tidak boleh lebih dari 100%!"
                        );
                        jumlah -= parseFloat(numPersentase.value);
                        numPersentase.focus();
                        return;
                    }
                }

                let found2 = false;
                // SP_1273_MEX_CEK_JumlahKomposisi
                fetchSelect(
                    "/Master/getCekJumlahKomposisi/3/" +
                        slcKomposisi.value +
                        "/" +
                        numPersentase.value +
                        "/" +
                        jenis,
                    (data) => {
                        if (data[0].Ada1 !== undefined) {
                            found2 = data[0].Ada1;
                        }

                        if (numCadangan.value == 1 && numCadangan2.value != 1) {
                            if (found2 > 0) {
                                alert(
                                    "Sudah ada Cadangan yang sama dalam Komposisi."
                                );
                                numCadangan.value = "";
                                numCadangan.focus();
                                return;
                            }
                        }

                        if (numPersentase.value <= 0) {
                            alert("Persentase tidak boleh kosong!");
                            numPersentase.focus();
                            return;
                        }

                        if (!found) {
                            listKomposisi[pilKomposisi] = {
                                StatusType: jenis,
                                IdType: slcType.value,
                                NamaType:
                                    slcType.options[
                                        slcType.selectedIndex
                                    ].text.split(" | ")[1],
                                JumlahPrimer: numPrimer.value,
                                SatuanPrimer: txtSatPrimer.value,
                                JumlahSekunder: numSekunder.value,
                                SatuanSekunder: txtSatSekunder.value,
                                JumlahTritier: numTritier.value,
                                SatuanTritier: txtSatTritier.value,
                                Persentase: numPersentase.value,
                                IdObjek: slcObjek.value,
                                NamaObjek:
                                    slcObjek.options[
                                        slcObjek.selectedIndex
                                    ].text.split(" | ")[1],
                                IdKelompokUtama: slcKelut.value,
                                NamaKelompokUtama:
                                    slcKelut.options[
                                        slcKelut.selectedIndex
                                    ].text.split(" | ")[1],
                                IdKelompok: slcKelompok.value,
                                NamaKelompok:
                                    slcKelompok.options[
                                        slcKelompok.selectedIndex
                                    ].text.split(" | ")[1],
                                IdSubKelompok: slcSubkel.value,
                                NamaSubKelompok:
                                    slcSubkel.options[
                                        slcSubkel.selectedIndex
                                    ].text.split(" | ")[1],
                                KodeBarang: txtKodeBarang.value,
                                Cadangan: numCadangan.value,
                            };

                            addTable_DataTable(
                                "table_komposisi",
                                listKomposisi,
                                colKomposisi
                            );
                        } else
                            alert("Sudah ada Type yang sama dalam Komposisi.");
                    }
                );
            }
        );
    } else alert("Pilih dulu data yang akan dikoreksi.");
});

btnHapusDetail.addEventListener("click", function () {
    if (listKomposisi.length > 1) {
        if (posKomposisi != -1) {
            showModal(
                "Hapus",
                "Anda yakin akan menghapus type <b>" +
                    listKomposisi[pilKomposisi].NamaType +
                    "</b>?",
                () => {
                    let id_komposisi = slcKomposisi.classList.contains("hidden")
                        ? "-"
                        : slcKomposisi.value;

                    // SP_5409_EXT_CEK_KONVERSI
                    fetchSelect(
                        "/Master/getCekKonversi/" +
                            id_komposisi +
                            "/" +
                            listKomposisi[pilKomposisi].IdType,
                        (data) => {
                            if (data[0].ada <= 0) {
                                // SP_5298_EXT_DELETE_KOMPOSISI_BAHAN_1
                                fetchStmt(
                                    "/Master/delKomposisiBahan1/" +
                                        id_komposisi +
                                        "/" +
                                        listKomposisi[pilKomposisi].IdType,
                                    () => {
                                        listKomposisi.splice(pilKomposisi, 1);
                                        clearDataDetail();

                                        addTable_DataTable(
                                            "table_komposisi",
                                            listKomposisi,
                                            colKomposisi
                                        );

                                        pilKomposisi = -1;
                                        clearSelection_DataTable(
                                            "table_komposisi"
                                        );
                                    }
                                );
                            } else {
                                pilKomposisi = -1;
                                clearSelection_DataTable("table_komposisi");

                                alert(
                                    "Type tidak dapat dihapus karena pernah digunakan untuk konversi."
                                );
                            }
                        }
                    );
                },
                () => {
                    pilKomposisi = -1;
                    clearSelection_DataTable("table_komposisi");
                }
            );
        } else alert("Pilih dulu data yang akan dihapus.");
    } else {
        pilKomposisi = -1;
        clearSelection_DataTable("table_komposisi");

        alert(
            "Data komposisi hanya tersisa satu, sehingga tidak boleh dihapus."
        );
    }
});

txtNamaKomposisi.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") {
            alert("Masukan nama komposisi terlebih dahulu.");
            this.focus();
        } else {
            slcMesin.disabled = false;
            slcMesin.focus();
        }
    }
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent != "Keluar") {
        toggleButtons(1);
        clearDataMaster();
        clearDataDetail();
        disableDetail();
        modeProses = "";
        jumlah = 0;

        listAfalan.length = 0;
        clearTable_DataTable("table_afalan", 2);

        listKomposisi.length = 0;
        clearTable_DataTable(
            "table_komposisi",
            colKomposisi.length,
            "padding=250px"
        );

        pilKomposisi = -1;
        clearSelection_DataTable();
    } else window.location.href = "/Extruder/ExtruderNet";
});

numPrimer.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        numSekunder.disabled = false;
        if (numSekunder.value != "") {
            numSekunder.select();
        } else numSekunder.focus();
    }
});

numSekunder.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value <= 0 && numPrimer.value == 1) {
            alert(
                "Isikan jumlah " +
                    txtSatSekunder.value.trim() +
                    " untuk 1 " +
                    txtSatPrimer.value.trim() +
                    " bahan ini."
            );
            this.focus();
        } else {
            numTritier.disabled = false;
            if (numTritier.value != "") {
                numTritier.select();
            } else numTritier.focus();
        }
    }
});

numTritier.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "" || this.value == 0) {
            alert("Jumlah tritier tidak boleh kosong.");
            this.focus();
        } else {
            numPersentase.disabled = false;
            if (numPersentase.value != "") {
                numPersentase.select();
            } else numPersentase.focus();
        }
    }
});

numPersentase.addEventListener("keypress", function (event) {
    /**
     * Bila mode proses koreksi tidak bisa lagi mengubah data yang sudah ada,
     * hanya bisa menambahkan data baru ke komposisi yang sudah ada
     */

    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        if (modeProses == "baru") {
            btnTambahDetail.disabled = false;
            btnKoreksiDetail.disabled = false;
            btnHapusDetail.disabled = false;

            if (pilKomposisi != -1) {
                btnKoreksiDetail.focus();
            } else btnTambahDetail.focus();
        } else if (modeProses == "koreksi") {
            btnTambahDetail.disabled = false;
            btnTambahDetail.focus();
        }
    }
});

btnProses.addEventListener("click", function () {
    let [jmlh_bb, jmlh_bom] = [-1, -1];
    if (modeProses == "baru") {
        if (listKomposisi.length < 1) {
            alert(
                "Data tidak dapat diproses karena tidak ditemukan data pada tabel komposisi."
            );
            return;
        } else if (listAfalan.length < 1) {
            alert(
                "Data tidak dapat diproses karena tidak ditemukan data pada tabel afalan."
            );
            return;
        } else {
            jmlh_bb = 0;
            for (let i = 0; i < listKomposisi.length; i++) {
                if (listKomposisi[i].StatusType.trim() == "BB")
                    jmlh_bb += parseFloat(listKomposisi[i].JumlahTritier);
            }

            // SP_1273_PRG_BOM_Barang
            fetchSelect("/Master/getPrgBomBarang/1/" + slcHP.value, (data) => {
                if (data[0].JumlahBOM !== undefined) {
                    jmlh_bom = data[0].JumlahBOM;
                } else alert("Jumlah BOM tidak ditemukan.");

                if (jmlh_bom > 0) {
                    alert(
                        'Kode barang ini sudah mempunyai Komposisi, Jika ingin melakukan perubahan pilih "Koreksi".'
                    );
                    btnKoreksiMaster.focus();
                    return;
                } else {
                    // SP_5298_EXT_INSERT_MASTER_KOMPOSISI
                    fetchStmt("/Master/updIdKomposisiCounter/MEX", () => {
                        alert("Data berhasil tersimpan.");
                        toggleButtons(1);
                        disableDetail();
                        modeProses = "";
                    });
                }
            });
        }
    } else if (modeProses == "koreksi") {
        deleteDetailFetch(slcKomposisi.value, () => {
            insertDetailFetch(() => {
                alert("Data berhasil tersimpan.");
                toggleButtons(1);
                disableDetail();
                modeProses = "";
            });
        });
    } else if (modeProses == "hapus") {
        let allowed = true;
        // SP_5298_EXT_CEK_KOMPOSISI
        fetchSelect("/Master/getCekKomposisi/" + slcKomposisi.value, (data) => {
            if (data[0].ada !== undefined) {
                if (data[0].ada > 0) allowed = false;
            }

            if (allowed) {
                // SP_5298_EXT_DELETE_MASTER_KOMPOSISI
                fetchStmt(
                    "/Master/delMasterKomposisi/" + slcKomposisi.value,
                    () => {
                        alert("Komposisi berhasil dihapus.");
                    }
                );
            } else
                alert(
                    "Data komposisi hanya tersisa satu, sehingga tidak boleh dihapus."
                );
        });
    } else if (modeProses == "hapus_detail") {
        let allowed = true;
        // SP_5298_EXT_CEK_KOMPOSISI
        fetchSelect("/Master/getCekKomposisi/" + slcKomposisi.value, (data) => {
            if (data[0].ada !== undefined) {
                if (data[0].ada > 0) allowed = false;
            }

            if (allowed) {
                deleteDetailFetch(slcKomposisi.value, () => {
                    insertDetailFetch(() => {
                        alert("Data berhasil tersimpan.");
                        toggleButtons(1);
                        disableDetail();
                        modeProses = "";
                    });
                });
            } else
                alert(
                    "Data komposisi hanya tersisa satu, sehingga tidak boleh dihapus."
                );
        });
    }
});

slcHP.addEventListener("change", function () {
    slcNG.disabled = false;
    slcNG.focus();
});

slcAF.addEventListener("change", function () {
    jumlah = 0;
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    clearDataDetail();
    addOptionIfNotExists(slcObjek, 213, 213 + " | Bahan dan Hasil Produksi");
    btnTambahAfalan.disabled = false;
    btnTambahAfalan.focus();
});

btnTambahAfalan.addEventListener("click", function () {
    if (slcAF.selectedIndex == 0) {
        alert("Pilih Afalan terlebih dahulu.");
        btnTambahAfalan.focus();
    } else {
        let found = false;
        for (let i = 0; i < listAfalan.length; i++) {
            if (slcAF.value == listAfalan[i].KodeBarang) {
                found = true;
            }
        }

        if (found) {
            alert("Sudah ada Type yang sama dalam Komposisi.");
            slcAF.focus();
        } else {
            listAfalan.push({
                KodeBarang: slcAF.value,
                NamaType: slcAF.options[slcAF.selectedIndex].text,
            });
            addTable_DataTable("table_afalan", listAfalan);

            slcKelut.disabled = false;
            slcKelut.focus();
        }
    }
});

slcNG.addEventListener("change", function () {
    btnTambahAfalan.disabled = false;
    btnTambahAfalan.focus();
});

btnCadanganDetail.addEventListener("click", function () {
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

    if (slcKelut.value != "1994") {
        alert("Data yang akan ditambahkan bukan Hasil Produksi.");
        return;
    } else {
        listOfDetail.forEach((ele) => {
            if (ele.tagName == "INPUT") {
                if (ele.value.trim() == "") {
                    ele.focus();
                    alert("Ada data yang belum terisi.");
                    return;
                }
            } else {
                if (ele.selectedIndex == 0) {
                    ele.focus();
                    alert("Ada data yang belum terisi.");
                    return;
                }
            }
        });
    }

    let [type_found, hp_found] = [false, false];
    for (let i = 0; i < listKomposisi.length; i++) {
        if (listKomposisi[i].IdType == slcType.value) {
            type_found = true;
        }

        if (jenis == "HP") {
            if (listKomposisi.StatusType == jenis) {
                hp_found = true;
            }
        }
    }

    if (jenis == "HP") {
        alert("Hasil Produksi telah dipilih.");
        slcKelut.focus();
        return;
    } else if (jenis == "AF") {
        alert("Afalah telah dipilih.");
        slcKelut.focus();
        return;
    }

    jumlah += parseFloat(numPersentase.value);

    if (parseFloat(numPersentase.value) > 100) {
        alert("Persentase yang dimasukkan tidak boleh lebih dari 100%!");
        jumlah -= parseFloat(numPersentase.value);
        return;
    } else if (numCadangan.value == "" || numCadangan.value < 1) {
        alert("Cadangan tidak boleh kosong!");
        numCadangan.select();
    }

    if (type_found) {
        alert("Sudah ada Type yang sama dalam Komposisi.");
    } else if (hp_found) {
        alert("Hanya boleh ada 1 Hasil Produksi dalam Komposisi.");
    } else {
        listKomposisi.push({
            StatusType: jenis,
            IdType: slcType.value,
            NamaType: slcType.options[slcType.selectedIndex].text,
            JumlahPrimer: numPrimer.value,
            SatuanPrimer: txtSatPrimer.value,
            JumlahSekunder: numSekunder.value,
            SatuanSekunder: txtSatSekunder.value,
            JumlahTritier: numTritier.value,
            SatuanTritier: txtSatTritier.value,
            Persentase: numPersentase.value,
            IdObjek: slcObjek.value,
            NamaObjek: slcObjek.options[slcObjek.selectedIndex].text,
            IdKelompokUtama: slcKelut.value,
            NamaKelompokUtama: slcKelut.options[slcKelut.selectedIndex].text,
            IdKelompok: slcKelompok.value,
            NamaKelompok: slcKelompok.options[slcKelompok.selectedIndex].text,
            IdSubKelompok: slcSubkel.value,
            NamaSubKelompok: slcSubkel.options[slcSubkel.selectedIndex].text,
            KodeBarang: txtKodeBarang.value,
            Cadangan: numCadangan.value,
        });
        addTable_DataTable(
            "table_komposisi",
            listKomposisi,
            colKomposisi,
            rowClickedFetch
        );

        showModal(
            "Tambah Lagi",
            "Ingin input data bahan / hasil produksi lagi?",
            () => {
                clearDataDetail("select_objek");
                slcKelut.focus();
            },
            () => {
                btnProses.focus();
            }
        );
    }
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
            addTable_DataTable(
                "table_komposisi",
                listKomposisi,
                colKomposisi,
                rowClickedFetch
            );
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

function insertDetailFetch(post_action = null) {
    for (let i = 0; i < listKomposisi.length; i++) {
        // SP_5298_EXT_INSERT_KOMPOSISI_BAHAN
        fetchStmt(
            "/Master/insKomposisiBahan/" +
                slcKomposisi.value.trim() +
                "/" +
                listKomposisi[i].IdObjek.trim() +
                "/" +
                listKomposisi[i].NamaObjek.replace(/ /g, "_") +
                "/" +
                listKomposisi[i].IdKelompokUtama.trim() +
                "/" +
                listKomposisi[i].NamaKelompokUtama.trim() +
                "/" +
                listKomposisi[i].IdKelompok.trim() +
                "/" +
                listKomposisi[i].NamaKelompok.trim() +
                "/" +
                listKomposisi[i].IdSubKelompok.trim() +
                "/" +
                listKomposisi[i].NamaSubKelompok.trim() +
                "/" +
                listKomposisi[i].IdType.trim() +
                "/" +
                listKomposisi[i].NamaType.trim() +
                "/" +
                listKomposisi[i].KodeBarang +
                "/" +
                listKomposisi[i].JumlahPrimer +
                "/" +
                listKomposisi[i].SatuanPrimer.trim() +
                "/" +
                listKomposisi[i].JumlahSekunder +
                "/" +
                listKomposisi[i].SatuanSekunder.trim() +
                "/" +
                listKomposisi[i].JumlahTritier +
                "/" +
                listKomposisi[i].SatuanTritier.trim() +
                "/" +
                listKomposisi[i].Persentase +
                "/" +
                listKomposisi[i].StatusType.trim() +
                "/" +
                listKomposisi[i].Cadangan,
            () => {
                if (listKomposisi[i].Cadangan == 0) {
                    // SP_1273_MEX_INSERT_KOMPOSISI_BAHAN Kode 1
                    fetchStmt(
                        "/Master/insKomposisiBahanMjs/1/" +
                            slcHP.value +
                            "/" +
                            listKomposisi[i].IdType +
                            "/" +
                            slcKomposisi.value +
                            "/MEX/" +
                            listKomposisi[i].Persentase +
                            "/" +
                            listKomposisi[i].JumlahPrimer +
                            "/" +
                            listKomposisi[i].JumlahSekunder +
                            "/" +
                            listKomposisi[i].JumlahTritier +
                            "/0"
                    );
                }

                // if (listKomposisi[i].Cadangan == 1) {
                //     let cadangan = -1;
                //     // SP_1273_MEX_INSERT_KOMPOSISI_BAHAN Kode 3
                //     fetchSelect(
                //         "/Master/insKomposisiBahanMjs/3/" +
                //             slcKomposisi.value +
                //             "/" +
                //             numPersentase.value,
                //         (data) => {
                //             if (data[0].Cadangan !== undefined) {
                //                 cadangan = data[0].Cadangan;
                //                 cadangan += 1;
                //             } else alert("Data cadangan tidak ditemukan.");
                //         }
                //     );
                // }

                if (i == listKomposisi.length - 1) {
                    for (let j = 0; j < listAfalan.length; j++) {
                        // SP_1273_MEX_INSERT_KOMPOSISI_BAHAN Kode 2
                        fetchSelect(
                            "/Master/insKomposisiBahanMjs/2/" +
                                slcKomposisi.value +
                                "/MEX"
                        );
                    }

                    if (post_action != null) post_action();
                }
            }
        );
    }
}

function deleteDetailFetch(id_komposisi) {
    // SP_1273_MEX_DELETE_KOMPOSISI_BAHAN
    fetchStmt("/Master/delKomposisiBahanMjs/" + id_komposisi.trim());
}

function rowClickedFetch(row, data, _) {
    if (
        pilKomposisi ==
        findClickedRowInList(listKomposisi, "IdType", data.IdType)
    ) {
        row.style.background = "white";
        pilKomposisi = -1;
        clearDataDetail();
        disableDetail();
    } else {
        if (modeProses == "baru" || modeProses == "hapus_detail") {
            pilKomposisi = findClickedRowInList(
                listKomposisi,
                "IdType",
                data.IdType
            );

            clearSelection_DataTable("table_komposisi");
            row.style.background = "aliceblue";

            numPrimer.value = data.JumlahPrimer;
            txtSatPrimer.value = data.SatuanPrimer;
            numSekunder.value = data.JumlahSekunder;
            txtSatSekunder.value = data.SatuanSekunder;
            numTritier.value = data.JumlahTritier;
            txtSatTritier.value = data.SatuanTritier;
            numPersentase.value = data.Persentase;
            numPersentase2.value = data.Persentase;
            txtKodeBarang.value = data.KodeBarang;
            numCadangan.value = data.Cadangan;
            numCadangan2.value = data.Cadangan;

            addOptionIfNotExists(
                slcType,
                data.IdType,
                data.IdType + " | " + data.NamaType
            );

            addOptionIfNotExists(
                slcObjek,
                data.IdObjek,
                data.IdObjek + " | " + data.NamaObjek
            );

            addOptionIfNotExists(
                slcKelut,
                data.IdKelompokUtama,
                data.IdKelompokUtama + " | " + data.NamaKelompokUtama
            );

            addOptionIfNotExists(
                slcKelompok,
                data.IdKelompok,
                data.IdKelompok + " | " + data.NamaKelompok
            );

            addOptionIfNotExists(
                slcSubkel,
                data.IdSubKelompok,
                data.IdSubKelompok + " | " + data.NamaSubKelompok
            );

            // SP_5298_EXT_IDMESIN
            fetchSelect("/Master/getIdMesin/" + slcKelompok.value, (data) => {
                addOptionIfNotExists(
                    slcMesin,
                    data[0].IdMesin,
                    data[0].IdMesin +
                        " | " +
                        slcKelompok.options[
                            slcKelompok.selectedIndex
                        ].text.split(" | ")[1]
                );

                if (modeProses == "baru") {
                    numPrimer.disabled = false;
                    numPrimer.select();
                } else {
                    btnHapusDetail.focus();
                }
            });
        }
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
