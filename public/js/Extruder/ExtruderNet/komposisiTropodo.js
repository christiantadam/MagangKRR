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

const txtNamaKomposisi = document.getElementById("nama_komposisi");
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

const listOfDetail = document.querySelectorAll(".card input, .card select");
const listOfButtonDetail = document.querySelectorAll(".card button");

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
*/

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
    { width: "1x" }, // Persentase
    { width: "80px" }, // Id Objek
    { width: "100px" }, // Nama Objek
    { width: "80px" }, // Id KelUt.
    { width: "100px" }, // Nama KelUt.
    { width: "100px" }, // Id Kelompok
    { width: "100px" }, // Kelompok
    { width: "80px" }, // Id SubKel.
    { width: "100px" }, // SubKel.
];

var modeProses = "";
var [unitPrimer, unitSekunder, unitTritier] = ["", "", "", ""];
var refetchKelut = false;
var refetchKelompok = false;
var refetchSubkel = false;
var refetchType = false;
var pilKomposisi = -1;
//#endregion

//#region Events
slcKomposisi.addEventListener("change", function () {
    // SP_5298_EXT_LIST_KOMPOSISI_1
    fetchSelect("/Master/getListKomposisi/EXT/" + this.value, (data) => {
        addOptionIfNotExists(slcMesin, data[0].IdMesin);

        getDataKomposisiFetch(this.value, () => {
            listOfDetail.forEach((ele) => (ele.disabled = false));
            listOfButtonDetail.forEach((btn) => (btn.disabled = false));

            if (modeProses == "koreksi") {
                slcObjek.disabled = false;
                slcObjek.focus();
            } else if (modeProses == "hapus") {
                btnProses.focus();
            } else if (modeProses == "hapus_detail") {
                btnHapusDetail.disabled = false;
                $("html, body").animate({ scrollTop: posKomposisi }, 100);
            }
        });
    });
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

slcMesin.addEventListener("change", function () {
    if (modeProses == "baru") {
        listKomposisi.length = 0;
        clearTable_DataTable(
            "table_komposisi",
            colKomposisi.length,
            "padding=250px"
        );
        listOfDetail.forEach((ele) => {
            if (ele.tagName == "INPUT") ele.value = "";
        });

        // listOfDetail.forEach((ele) => (ele.disabled = false));
        // listOfButtonDetail.forEach((ele) => (ele.disabled = false));
        slcObjek.disabled = false;
        slcObjek.focus();
    }
});

slcObjek.addEventListener("change", function () {
    slcKelut.selectedIndex = 0;
    slcKelut.disabled = false;
    slcKelut.focus();
    slcKelompok.selectedIndex = 0;
    slcType.selectedIndex = 0;
    slcSubkel.selectedIndex = 0;
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

    if (
        slcKelut.value == "0057" ||
        slcKelut.value == "0121" ||
        slcKelut.value == "0009"
    ) {
        // Pengecekkan mesin pada DB Inventory dan Extruder
        // SP_5298_EXT_CEK_KELOMPOK_MESIN
        fetchSelect("/Master/getCekMesin/" + this.value, (data) => {
            if (slcMesin.value == data[0].IdMesin) {
                alert("Mesin tidak sama.");
                slcSubkel.disabled = true;
                refetchSubkel = false;
                this.selectedIndex = 0;
                this.focus();
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
    }
});

slcType.addEventListener("change", function () {
    getSatuanFetch(this.value);
    numPrimer.disabled = false;
    numPrimer.value = "";
    numPrimer.focus();
});

btnKoreksiMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );
    slcKomposisi.disabled = false;
    slcKomposisi.focus();
    modeProses = "koreksi";
    toggleButtons(2);
});

btnBaruMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );
    slcKomposisi.classList.add("hidden");
    txtNamaKomposisi.classList.remove("hidden");
    txtNamaKomposisi.disabled = false;
    txtNamaKomposisi.focus();
    modeProses = "baru";
    toggleButtons(2);
});

btnHapusMaster.addEventListener("click", function () {
    showModal(
        "Hapus",
        "Apakah anda ingin menghapus semua data komposisi bahan?",
        () => {
            modeProses = "hapus";
        },
        () => {
            modeProses = "hapus_detail";
        }
    );

    clearDataMaster();
    clearDataDetail();
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );
    slcKomposisi.disabled = false;
    slcKomposisi.focus();
    toggleButtons(2);
});

btnTambahDetail.addEventListener("click", function () {
    let jenis = "";
    switch (slcKelut.value) {
        case "0057":
        case "2480":
            jenis = "BB";
            break;
        case "0117":
            jenis = "BP";
            break;
        case "0121":
        case "2481":
            jenis = "HP";
            break;
        case "0213":
            jenis = "AF";
            break;
        default:
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

    let found = false;
    for (let i = 0; i < listKomposisi.length; i++) {
        if (
            findClickedRowInList(
                listKomposisi,
                "IdType",
                listKomposisi[i].IdType
            ) != -1
        ) {
            found = true;
            break;
        }
    }

    if (found) {
        alert("Sudah ada type yang sama dalam tabel komposisi.");
    } else {
        listKomposisi.push({
            StatusType: jenis,
            IdType: slcType.value,
            NamaType:
                slcType.options[slcType.selectedIndex].text.split(" | ")[1],
            JumlahPrimer: numPrimer.value,
            SatuanPrimer: txtSatPrimer.value,
            JumlahSekunder: numSekunder.value,
            SatuanSekunder: txtSatSekunder.value,
            JumlahTritier: numTritier.value,
            SatuanTritier: txtSatTritier.value,
            Persentase: numPersentase.value,
            IdObjek: slcObjek.value,
            NamaObjek:
                slcObjek.options[slcObjek.selectedIndex].text.split(" | ")[1],
            IdKelompokUtama: slcKelut.value,
            NamaKelompokUtama:
                slcKelut.options[slcKelut.selectedIndex].text.split(" | ")[1],
            IdKelompok: slcKelompok.value,
            NamaKelompok:
                slcKelompok.options[slcKelompok.selectedIndex].text.split(
                    " | "
                )[1],
            IdSubKelompok: slcSubkel.value,
            NamaSubKelompok:
                slcSubkel.options[slcSubkel.selectedIndex].text.split(" | ")[1],
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
                clearDataDetail();
                slcKelut.focus();
            },
            () => {
                btnProses.focus();
            }
        );
    }
});

btnKoreksiDetail.addEventListener("click", function () {
    if (pilKomposisi == -1) {
        alert("Pilih dulu data yang akan dikoreksi.");
    } else {
        showModal(
            "Koreksi",
            "Anda yakin akan mengoreksi type: " +
                listKomposisi[pilKomposisi].NamaType +
                "?",
            () => {
                let jenis = "";
                switch (slcKelut.value) {
                    case "0057":
                    case "2480":
                        jenis = "BB";
                        break;
                    case "0117":
                        jenis = "BP";
                        break;
                    case "0121":
                    case "2481":
                        jenis = "HP";
                        break;
                    case "0213":
                        jenis = "AF";
                        break;
                    default:
                        break;
                }

                for (let i = 0; i < listOfDetail.length; i++) {
                    const ele = listOfDetail[i];
                    if (ele.tagName == "INPUT") {
                        if (ele.value.trim() == "") {
                            alert(
                                "Ada data yang belum terisi, mohon periksa kembali."
                            );
                            ele.focus();
                            return;
                        }
                    } else if (ele.tagName == "SELECT") {
                        if (ele.selectedIndex == 0) {
                            alert(
                                "Ada data yang belum terisi, mohon periksa kembali."
                            );
                            ele.focus();
                            return;
                        }
                    }
                }

                let found = false;
                for (let i = 0; i < listKomposisi.length; i++) {
                    if (
                        findClickedRowInList(
                            listKomposisi,
                            "IdType",
                            listKomposisi[i].IdType
                        ) != -1
                    ) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    alert("Sudah ada type yang sama dalam tabel komposisi.");
                } else {
                    listKomposisi[pilKomposisi] = {
                        StatusType: jenis,
                        IdType: slcType.value,
                        NamaType:
                            slcType.options[slcType.selectedIndex].text.split(
                                " | "
                            )[1],
                        JumlahPrimer: numPrimer.value,
                        SatuanPrimer: txtSatPrimer.value,
                        JumlahSekunder: numSekunder.value,
                        SatuanSekunder: txtSatSekunder.value,
                        JumlahTritier: numTritier.value,
                        SatuanTritier: txtSatTritier.value,
                        Persentase: numPersentase.value,
                        IdObjek: slcObjek.value,
                        NamaObjek:
                            slcObjek.options[slcObjek.selectedIndex].text.split(
                                " | "
                            )[1],
                        IdKelompokUtama: slcKelut.value,
                        NamaKelompokUtama:
                            slcKelut.options[slcKelut.selectedIndex].text.split(
                                " | "
                            )[1],
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
                    };

                    addTable_DataTable(
                        "table_komposisi",
                        listKomposisi,
                        colKomposisi,
                        rowClickedFetch
                    );
                }
            },
            () => {}
        );
    }
});

btnHapusDetail.addEventListener("click", function () {
    if (listKomposisi.length > 1) {
        if (posKomposisi == -1) {
            alert("Pilih dulu data yang akan dihapus.");
        } else {
            showModal(
                "Hapus",
                "Anda yakin akan menghapus type: " +
                    listKomposisi[pilKomposisi].NamaType +
                    "?",
                () => {
                    // SP_5409_EXT_CEK_KONVERSI
                    fetchSelect(
                        "/Master/getCekKonversi/" +
                            slcKomposisi.value +
                            "/" +
                            listKomposisi[pilKomposisi].IdType,
                        (data) => {
                            if (data[0].ada <= 0) {
                                // SP_5298_EXT_DELETE_KOMPOSISI_BAHAN_1
                                fetchStmt(
                                    "/Master/delKomposisiBahan1/" +
                                        slcKomposisi.value +
                                        "/" +
                                        listKomposisi[pilKomposisi].IdType,
                                    () => {
                                        listKomposisi.splice(pilKomposisi);
                                        clearDataDetail();
                                    }
                                );
                            } else
                                alert(
                                    "Type tidak dapat dihapus karena pernah digunakan untuk konversi."
                                );
                        }
                    );
                }
            );
        }
    } else alert("Data komposisi hanya tersisa satu, sehingga tidak boleh dihapus.");
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent != "Keluar") {
        toggleButtons(1);
        clearDataMaster();
        clearDataDetail();
        disableDetail();
        modeProses = "";
    } else window.location.href = "/Extruder/ExtruderNet";
});

numPrimer.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        numSekunder.disabled = false;
        numSekunder.focus();
    }
});

numSekunder.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        numTritier.disabled = false;
        numTritier.focus();
    }
});

numTritier.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "" || this.value == 0) {
            alert("Jumlah tritier tidak boleh kosong.");
            this.focus();
        } else {
            numPersentase.disabled = false;
            numPersentase.focus();
        }
    }
});

numPersentase.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (modeProses == "baru") {
            btnTambahDetail.disabled = false;
            btnKoreksiDetail.disabled = false;
            btnHapusDetail.disabled = false;
            btnTambahDetail.focus();
        } else if (modeProses == "Koreksi") {
            btnTambahDetail.disabled = false;
            btnTambahDetail.focus();
        }
    }
});

btnProses.addEventListener("click", function () {
    if (modeProses == "baru") {
        if (listKomposisi.length < 1) {
            alert("Data tidak dapat diproses karena tidak ada data komposisi.");
            return;
        } else {
            let jmlh_bb = 0;
            for (let j = 0; j < listKomposisi.length; j++) {
                if (listKomposisi[j].StatusType == "BB") {
                    jmlh_bb += parseFloat(listKomposisi[j].JumlahTritier);
                }
            }

            // SP_5298_EXT_INSERT_MASTER_KOMPOSISI
            fetchStmt(
                "/Master/insMasterKomposisi/" +
                    slcKomposisi.options[slcKomposisi.selectedIndex].text.split(
                        " | "
                    )[1] +
                    "/" +
                    slcMesin.value +
                    "/EXT/4384",
                () => {
                    fetchSelect("/Master/getMasterKomposisi/EXT", (data) => {
                        addOptionIfNotExists(slcKomposisi, data.NoKomposisi);
                        insertDetailFetch(jmlh_bb, () => {
                            // SP_5298_EXT_UPDATE_IDKOMPOSISI_COUNTER
                            fetchStmt(
                                "/Master/updIdKomposisiCounter/EXT",
                                () => {
                                    alert("Data berhasil disimpan.");
                                    toggleButtons(1);
                                    disableDetail();
                                    modeProses = "";
                                }
                            );
                        });
                    });
                }
            );
        }
    } else if (modeProses == "koreksi") {
        deleteDetailFetch(slcKomposisi.value, () => {
            let jmlh_bb = 0;
            for (let j = 0; j < listKomposisi.length; j++) {
                if (listKomposisi[j].StatusType == "BB") {
                    jmlh_bb += parseFloat(listKomposisi[j].JumlahTritier);
                }
            }

            insertDetailFetch(jmlh_bb, () => {
                alert("Data berhasil tersimpan.");
                toggleButtons(1);
                disableDetail();
                modeProses = "";
            });
        });
    } else if (modeProses == "hapus") {
        // SP_5298_EXT_CEK_KOMPOSISI
        fetchSelect(
            "/Master/getCekKomposisi/" + slcKomposisi.value.trim(),
            (data) => {
                if (data[0].ada <= 0) {
                    // SP_5298_EXT_DELETE_MASTER_KOMPOSISI
                    fetchStmt(
                        "/Master/delMasterKomposisi/" +
                            slcKomposisi.value.trim(),
                        () => {
                            alert("Komposisi berhasil dihapus.");
                        }
                    );
                } else
                    alert(
                        "Komposisi tidak dapat dihapus, karena telah terpakai untuk konversi."
                    );
            }
        );
    } else if (modeProses == "hapus_detail") {
        // SP_5298_EXT_CEK_KOMPOSISI
        fetchSelect(
            "/Master/getCekKomposisi/" + slcKomposisi.value.trim(),
            (data) => {
                if (data[0].ada <= 0) {
                    deleteDetailFetch(slcKomposisi.value, () => {
                        let jmlh_bb = 0;
                        for (let j = 0; j < listKomposisi.length; j++) {
                            if (listKomposisi[j].StatusType == "BB") {
                                jmlh_bb += parseFloat(
                                    listKomposisi[j].JumlahTritier
                                );
                            }
                        }

                        insertDetailFetch(jmlh_bb, () => {
                            alert("Data berhasil disimpan.");
                            toggleButtons(1);
                            disableDetail();
                            modeProses = "";
                        });
                    });
                } else
                    alert(
                        "Komposisi tidak dapat dihapus, karena telah terpakai untuk konversi."
                    );
            }
        );
    }
});
//#endregion

//#region Functions
function clearDataDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") {
            ele.value = "";
        } else ele.selectedIndex = 0;
    });
}

function clearDataMaster() {
    slcKomposisi.selectedIndex = 0;
    slcMesin.selectedIndex = 0;
}

function disableDetail() {
    listOfButtonDetail.forEach((btn) => (btn.disabled = true));
    numPrimer.disabled = true;
    numSekunder.disabled = true;
    numTritier.disabled = true;
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

function getDataKomposisiFetch(no_komposisi, post_action = null) {
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length, [
        "padding=250px",
        "Memuat data...",
    ]);

    // SP_5298_EXT_LIST_KOMPOSISI_BAHAN
    fetchSelect(
        "/Master/getListKomposisiBahan/" + no_komposisi.trim(),
        (data) => {
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
                });
            }

            if (post_action != null) post_action();
        }
    );
}

function getSatuanFetch(id_type) {
    // SP_5298_EXT_DETAIL_BAHAN
    fetchSelect("/Master/getDetailBahan/" + id_type, (data) => {
        unitPrimer = data[0].UnitPrimer;
        unitSekunder = data[0].UnitSekunder;
        unitTritier = data[0].UnitTritier;
        txtSatPrimer.value = data[0].satPrimer;
        txtSatSekunder.value = data[0].satSekunder;
        txtSatTritier.value = data[0].nama_satuan;
    });
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
                    slcKelompok.options[slcKelompok.selectedIndex].text.split(
                        " | "
                    )[1]
            );
        });
    }
}

function insertDetailFetch(jmlh_bb, post_action = null) {
    for (let i = 0; i < listKomposisi.length; i++) {
        let persentaseKu = -1;
        if (listKomposisi[i].StatusType == "BP") {
            if (jmlh_bb == 0) {
                persentaseKu = 0;
            } else {
                Math.round(
                    (listKomposisi[i].JumlahTritier / jmlh_bb) * 100 * 100
                ) / 100;
            }
        } else listKomposisi[i].Persentase;

        // SP_5298_EXT_INSERT_KOMPOSISI_BAHAN
        fetchStmt(
            "/Master/insKomposisiBahan/" +
                slcKomposisi.value +
                "/" +
                listKomposisi[i].IdObjek +
                "/" +
                listKomposisi[i].NamaObjek +
                "/" +
                listKomposisi[i].IdKelompokUtama +
                "/" +
                listKomposisi[i].NamaKelompokUtama +
                "/" +
                listKomposisi[i].IdKelompok +
                "/" +
                listKomposisi[i].NamaKelompok +
                "/" +
                listKomposisi[i].IdSubKelompok +
                "/" +
                listKomposisi[i].NamaSubKelompok +
                "/" +
                listKomposisi[i].IdType +
                "/" +
                listKomposisi[i].NamaType +
                "/" +
                listKomposisi[i].JumlahPrimer +
                "/" +
                listKomposisi[i].SatuanPrimer +
                "/" +
                listKomposisi[i].JumlahSekunder +
                "/" +
                listKomposisi[i].SatuanSekunder +
                "/" +
                listKomposisi[i].JumlahTritier +
                "/" +
                listKomposisi[i].SatuanTritier +
                "/" +
                persentaseKu +
                "/" +
                listKomposisi[i].StatusType
        );

        if (i == listKomposisi.length - 1) {
            if (post_action != null) {
                post_action();
            }
        }
    }
}

function deleteDetailFetch(id_komposisi, post_action = null) {
    // SP_5298_EXT_DELETE_KOMPOSISI_BAHAN
    fetchStmt("/Master/delKomposisiBahan/" + id_komposisi.trim(), () => {
        if (post_action != null) post_action();
    });
}
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

    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );

    // toggleButtons(1);
    btnBaruMaster.focus();
}

$(document).ready(() => init());
