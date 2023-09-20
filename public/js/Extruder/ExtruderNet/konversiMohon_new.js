//#region Variables
const slcNomor = document.getElementById("select_nomor");
const slcOrder = document.getElementById("select_nomor_order");
const slcSpek = document.getElementById("select_spek");
const slcMesin = document.getElementById("select_mesin");
const slcKomposisi = document.getElementById("select_komposisi");

const txtShift = document.getElementById("shift");
const txtWarna = document.getElementById("warna");
const txtIdProd = document.getElementById("id_produksi");
const txtNamaProd = document.getElementById("nama_produksi");
const txtJenis = document.getElementById("jenis");

const numLot = document.getElementById("lot");
const numUkuran = document.getElementById("ukuran");
const numDenier = document.getElementById("denier");
const numStokPrimer = document.getElementById("stok_primer");
const numPrimer = document.getElementById("primer");
const numStokSekunder = document.getElementById("stok_sekunder");
const numSekunder = document.getElementById("sekunder");
const numStokTritier = document.getElementById("stok_tritier");
const numTritier = document.getElementById("tritier");

const dateTanggal = document.getElementById("tanggal");
const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");
const timeMulai = document.getElementById("waktu_mulai");
const timeSelesai = document.getElementById("waktu_selesai");

const spnSatPrimer = document.getElementById("sat_primer");
const spnSatSekunder = document.getElementById("sat_sekunder");
const spnSatTritier = document.getElementById("sat_tritier");

const btnTambahDetail = document.getElementById("btn_baru_detail");
const btnKoreksiDetail = document.getElementById("btn_koreksi_detail");
const btnHapusDetail = document.getElementById("btn_hapus_detail");
const btnBaruMaster = document.getElementById("btn_baru_master");
const btnKoreksiMaster = document.getElementById("btn_koreksi_master");
const btnHapusMaster = document.getElementById("btn_hapus_master");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const hidNoUrut = document.getElementById("no_urut");

const listKonversi = [];
/* ISI LIST KONVERSI
    0 Type
    1 IdType *hidden
    2 JumlahPrimer
    3 SatPrimer
    4 JumlahSekunder
    5 SatSekunder
    6 JumlahTritier
    7 SatTrititer
    8 Persentase
    9 StatusType *Jenis
    10 IdSubKelompok
*/

const listKomposisi = [];
/* ISI LIST KOMPOSISI
    0 StatusType *Jenis
    1 IdType *hidden
    2 NamaType
    3 NamaSubKelompok
    4 SatuanPrimer *hidden
    5 SatuanSekunder *hidden
    6 SatuanTritier *hidden
    7 IdSubKelompok
*/

const colKonversi = [
    { width: "350px" }, // Nama Type
    { width: "100px" }, // Qty. Primer
    { width: "100px" }, // Sat. Primer
    { width: "125px" }, // Qty. Sekunder
    { width: "125px" }, // Sat. Sekunder
    { width: "100px" }, // Qty. Tritier
    { width: "100px" }, // Sat. Tritier
    { width: "60px" }, // Presentase
    { width: "60px" }, // Jenis
    { width: "125px" }, // Sub-kelompok
    { width: "0px" }, // IdType
];

const colKomposisi = [
    { width: "50px" }, // Jenis
    { width: "275px" }, // Nama Type
    { width: "125px" }, // Sub-kelompok
    { width: "100px" }, // Id Sub-kel.
    { width: "0px" }, // IdType
];

const posKonversi = $("#table_konversi").offset().top - 125;
const posKomposisi = $("#table_komposisi").offset().top - 125;
const listOfDetail = document.querySelectorAll(".card input, .card span");
const listOfMaster = document.querySelectorAll("input:not(.card input)");
const listOfSelect = document.querySelectorAll("select");

var refetchKomposisi = false;
var refetchSpek = false;
var refetchNomor = false;
var pilKomposisi = -1;
var pilKonversi = -1;
var modeProses = "";
var koreksiDetail = false;
//#endregion

//#region Events
slcNomor.addEventListener("mousedown", function () {
    if (refetchNomor) {
        refetchNomor = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKonversi",
            textKey: "NamaKomposisi",
        };

        // SP_5298_EXT_LIST_KONVERSI
        fetchSelect(
            "/Konversi/getListKonversi/EXT",
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchNomor = true;
            },
            errorOption
        );
    }
});

slcNomor.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (refetchNomor) {
            refetchNomor = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdKonversi",
                textKey: "NamaKomposisi",
            };

            // SP_5298_EXT_LIST_KONVERSI
            fetchSelect(
                "/Konversi/getListKonversi/EXT",
                (data) => {
                    if (data.length > 0) {
                        addOptions(this, data, optionKeys);
                        this.removeChild(errorOption);
                    } else refetchNomor = true;
                },
                errorOption
            );
        }
    }
});

slcNomor.addEventListener("change", function () {
    if (this.selectedIndex != 0) {
        listKonversi.length = 0;
        clearTable_DataTable(
            "table_konversi",
            colKonversi.length,
            "Memuat data..."
        );

        if (modeProses != "hapus") {
            listKomposisi.length = 0;
            clearTable_DataTable(
                "table_komposisi",
                colKomposisi.length,
                "Memuat data..."
            );
        }

        clearDataDetail();
        getDataKonversiFetch(slcNomor.value, () => {
            if (modeProses == "koreksi") {
                disableMaster();
                disableDetail();
                $("html, body").animate({ scrollTop: posKonversi }, 100);
                getDataKomposisiFetch(slcKomposisi.value);
            } else if (modeProses == "hapus") {
                btnProses.disabled = false;
                btnProses.focus();
            }
        });
    }
});

btnBaruMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", colKonversi.length);
    slcOrder.disabled = false;
    slcOrder.focus();
    modeProses = "baru";
    toggleButtons(2);
});

btnKoreksiMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", colKonversi.length);
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    slcNomor.disabled = false;
    slcNomor.focus();
    modeProses = "koreksi";
    toggleButtons(2);
});

btnHapusMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", colKonversi.length);
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    slcNomor.disabled = false;
    slcNomor.focus();
    modeProses = "hapus";
    toggleButtons(2);
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButtons(1);
        clearDataMaster();
        clearDataDetail();
        disableDetail();
        disableMaster();
        modeProses = "";
        listOfButtonDetail.forEach((btn) => (btn.disabled = true));
        listKomposisi.length = 0;
        clearTable_DataTable("table_komposisi", colKomposisi.length);
        listKonversi.length = 0;
        clearTable_DataTable("table_konversi", colKonversi.length);

        btnBaruMaster.focus();
    }
});

slcMesin.addEventListener("change", function () {
    slcKomposisi.selectedIndex = 0;
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", colKonversi.length);

    if (modeProses == "baru") {
        clearDataDetail();
        slcKomposisi.disabled = false;
        slcKomposisi.focus();
    }

    refetchKomposisi = true;
});

slcOrder.addEventListener("change", function () {
    clearDataDetail();
    slcSpek.selectedIndex = 0;
    refetchSpek = true;

    if (modeProses == "baru") {
        slcSpek.disabled = false;
        slcSpek.focus();
    } else this.focus();
});

slcKomposisi.addEventListener("mousedown", function () {
    if (refetchKomposisi) {
        refetchKomposisi = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKomposisi",
            textKey: "NamaKomposisi",
        };

        // SP_5298_EXT_LIST_KOMPOSISI
        fetchSelect(
            "/Konversi/getListKomposisi/1/" + slcMesin.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchKomposisi = true;
            },
            errorOption
        );
    }
});

slcKomposisi.addEventListener("keydown", function (event) {
    if (event.key === "Enter" && refetchKomposisi) {
        refetchKomposisi = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKomposisi",
            textKey: "NamaKomposisi",
        };

        // SP_5298_EXT_LIST_KOMPOSISI
        fetchSelect(
            "/Konversi/getListKomposisi/1/" + slcMesin.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchKomposisi = true;
            },
            errorOption
        );
    }
});

slcKomposisi.addEventListener("change", function () {
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    listKonversi.length = 0;
    clearSelection_DataTable("table_konversi", colKonversi.length);
    clearDataDetail();

    if (modeProses == "baru") {
        getDataKomposisiFetch(this.value, () => {
            numLot.disabled = false;
            numLot.focus();
        });
    }
});

slcSpek.addEventListener("mousedown", function () {
    if (refetchSpek) {
        refetchSpek = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "TypeBenang",
            textKey: "NoUrutOrder",
        };

        // SP_5298_EXT_LIST_SPEK_ORDER
        fetchSelect(
            "/Konversi/getListSpek/" + slcOrder.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchSpek = true;
            },
            errorOption
        );
    }
});

slcSpek.addEventListener("keydown", function (event) {
    if (event.key === "Enter" && refetchSpek) {
        refetchSpek = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "NoUrutOrder",
            textKey: "TypeBenang",
        };

        // SP_5298_EXT_LIST_SPEK_ORDER
        fetchSelect(
            "/Konversi/getListSpek/" + slcOrder.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchSpek = true;
            },
            errorOption
        );
    }
});

slcSpek.addEventListener("change", function () {
    clearDataDetail();
    ambilDataUkuran(this.options[this.selectedIndex].text);
    hidNoUrut.value = this.value;

    if (modeProses == "baru") {
        slcMesin.disabled = false;
        slcMesin.focus();
    } else slcSpek.focus();
});

numLot.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        numUkuran.disabled = false;
        numUkuran.focus();
    }
});

numUkuran.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        numDenier.disabled = false;
        numDenier.focus();
    }
});

numDenier.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtWarna.disabled = false;
        txtWarna.focus();
    }
});

txtWarna.addEventListener("keypress", function (event) {
    if (event.key == "Enter") dateTanggal.focus();
});

dateTanggal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtShift.disabled = false;
        txtShift.focus();
    }
});

txtShift.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = this.value.toUpperCase();
        timeAwal.classList.remove("unclickable");
        timeAwal.focus();
    }
});

timeAwal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeAkhir.classList.remove("unclickable");
        timeAkhir.focus();
    }
});

timeAkhir.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeMulai.classList.remove("unclickable");
        timeMulai.focus();
    }
});

timeMulai.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeSelesai.classList.remove("unclickable");
        timeSelesai.focus();
    }
});

timeSelesai.addEventListener("keypress", function (event) {
    if (event.key == "Enter")
        $("html, body").animate({ scrollTop: posKomposisi }, 100);
});

numPrimer.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        numSekunder.disabled = false;
        if (koreksiDetail) {
            numSekunder.select();
        } else numSekunder.focus();
    }
});

numSekunder.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = 0;
        numTritier.disabled = false;
        if (koreksiDetail) {
            numTritier.select();
        } else numTritier.focus();
    }
});

numTritier.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (txtJenis.value.trim() == "BB" || txtJenis.value.trim() == "BP") {
            numSekunder.value = Math.round(parseFloat(numTritier.value) / 25);
        }

        if (modeProses == "baru" && koreksiDetail) {
            btnKoreksiDetail.disabled = false;
            btnHapusDetail.disabled = false;
            btnKoreksiDetail.focus();
        } else {
            /**
             * Pada saat mode koreksi hanya bisa menambahkan data konversi baru
             * Tidak bisa mengoreksi ataupun menghapus data sebelumnya
             */

            btnTambahDetail.disabled = false;
            btnTambahDetail.focus();
        }
    }
});

btnTambahDetail.addEventListener("click", function () {
    let isEmpty = false;
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") {
            if (ele.value.trim() == "") {
                if (!isEmpty) {
                    ele.focus();
                    alert(
                        "Masih terdapat data yang belum terisi. Mohon periksa kembali!"
                    );
                }

                isEmpty = true;
            }
        }
    });

    if (!isEmpty) {
        if (
            findClickedRowInList(listKonversi, "IdType", txtIdProd.value) != -1
        ) {
            alert("Sudah ada data yang sama dalam tabel konversi.");
        } else {
            listKonversi.push({
                Type: txtNamaProd.value,
                JumlahPrimer: numPrimer.value,
                SatPrimer: spnSatPrimer.textContent,
                JumlahSekunder: numSekunder.value,
                SatSekunder: spnSatSekunder.textContent,
                JumlahTritier: numTritier.value,
                SatTritier: spnSatTritier.textContent,
                Persentase: "0",
                StatusType: listKomposisi[pilKomposisi].StatusType,
                IdSubKelompok: listKomposisi[pilKomposisi].IdSubKelompok,
                IdType: txtIdProd.value,
            });

            addTable_DataTable(
                "table_konversi",
                listKonversi,
                colKonversi,
                rowClickedKonversi
            );

            clearDataDetail();
            disableDetail();
            clearSelection_DataTable("table_komposisi");
            pilKomposisi = -1;

            showModal(
                "Tambah Data",
                "Ingin input data konversi lagi?",
                () => {
                    $("html, body").animate({ scrollTop: posKomposisi }, 100);
                },
                () => {
                    btnProses.focus();
                }
            );
        }
    }
});

btnKoreksiDetail.addEventListener("click", function () {
    if (pilKonversi == -1) {
        alert("Belum ada data konversi yang dipilih!");
    } else {
        showModal(
            "Koreksi",
            `Apakah anda yakin akan mengoreksi jumlah item untuk data konversi <b>${listKonversi[pilKonversi].Type}</b>?`,
            () => {
                listKonversi[pilKonversi].JumlahPrimer = numPrimer.value;
                listKonversi[pilKonversi].JumlahSekunder = numSekunder.value;
                listKonversi[pilKonversi].JumlahTritier = numTritier.value;

                disableDetail();
                addTable_DataTable(
                    "table_konversi",
                    listKonversi.map((item) => {
                        const newItem = Object.fromEntries(
                            Object.entries(item).map(([key, value]) => [
                                key,
                                value === undefined ? "NULL" : value,
                            ])
                        );
                        const { ["IdType"]: _, ...finalItem } = newItem;

                        return finalItem;
                    }),
                    colKonversi,
                    rowClickedKonversi
                );

                alert(
                    "Data konversi " +
                        listKonversi[pilKonversi].Type +
                        " berhasil dikoreksi!"
                );
            },
            () => {}
        );
    }
});

btnHapusDetail.addEventListener("click", function () {
    if (pilKonversi == -1) {
        alert("Belum ada data konversi yang dipilih!");
    } else {
        showModal(
            "Hapus",
            `Apakah anda yakin akan menghapus data konversi <b>${listKonversi[pilKonversi].Type}</b>?`,
            () => {
                if (listKonversi.length > 1) {
                    let namaKonversi = listKonversi[pilKonversi].Type;
                    listKonversi.splice(pilKonversi, 1);
                    clearDataDetail();
                    disableDetail();
                    addTable_DataTable(
                        "table_konversi",
                        listKonversi.map((item) => {
                            const newItem = Object.fromEntries(
                                Object.entries(item).map(([key, value]) => [
                                    key,
                                    value === undefined ? "NULL" : value,
                                ])
                            );
                            const { ["IdType"]: _, ...finalItem } = newItem;

                            return finalItem;
                        }),
                        colKonversi,
                        rowClickedKonversi
                    );

                    alert(
                        "Data konversi " + namaKonversi + " berhasil dihapus!"
                    );
                } else {
                    alert(
                        "Data konversi hanya tersisa satu, sehingga tidak boleh dihapus."
                    );
                }
            }
        );
    }
});

btnProses.addEventListener("click", function () {
    if (modeProses == "baru") {
        if (listKomposisi.length < 1) {
            alert("Data tidak dapat diproses karena tidak ada data komposisi.");
            return;
        } else {
            prosesIsiFetch();
        }
    } else if (modeProses == "koreksi") {
        if (slcNomor.selectedIndex == 0) {
            alert("Pilih terlebih dahulu data konversi yang akan dikoreksi.");
        } else {
            showModal(
                "Koreksi",
                "Apakah anda yakin akan mengoreksi data ini?",
                () => {
                    prosesKoreksiFetch(slcNomor.value);
                },
                () => {}
            );
        }
    } else if (modeProses == "hapus") {
        if (slcNomor.selectedIndex == 0) {
            alert("Pilih terlebih dahulu data konversi yang akan dihapus.");
        } else {
            showModal(
                "Hapus",
                "Apakah anda yakin akan menghapus data ini?",
                () => {
                    prosesHapusFetch(slcNomor.value);
                },
                () => {}
            );
        }
    }
});

btnBaruMaster.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") {
        btnKoreksiMaster.focus();
    }
});

btnKoreksiMaster.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        btnBaruMaster.focus();
    } else if (event.key === "ArrowRight") {
        btnHapusMaster.focus();
    }
});

btnHapusMaster.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        btnKoreksiMaster.focus();
    } else if (event.key === "ArrowRight") {
        btnKeluar.focus();
    }
});

btnProses.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") {
        btnKeluar.focus();
    } else if (event.key === "ArrowUp") {
        if (btnTambahDetail.disabled == false) {
            btnTambahDetail.focus();
        }
    }
});

btnKeluar.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        if (btnProses.disabled == false) {
            btnProses.focus();
        } else btnHapusMaster.focus();
    } else if (event.key === "ArrowUp") {
        if (btnKoreksiDetail.disabled == false) {
            btnKoreksiDetail.focus();
        }
    }
});

btnTambahDetail.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") {
        btnKoreksiDetail.focus();
    } else if (event.key === "ArrowDown") {
        if (btnProses.disabled == false) {
            btnProses.focus();
        } else btnKeluar.focus();
    }
});

btnKoreksiDetail.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        if (btnTambahDetail.disabled == false) {
            btnTambahDetail.focus();
        }
    } else if (event.key === "ArrowRight") {
        btnHapusDetail.focus();
    } else if (event.key === "ArrowDown") {
        btnKeluar.focus();
    }
});

btnHapusDetail.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        btnKoreksiDetail.focus();
    } else if (event.key === "ArrowDown") {
        btnKeluar.focus();
    }
});
//#endregion

//#region Functions
function clearDataDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") {
            ele.value = "";
        } else ele.textContent = "";
    });
}

function clearDataMaster() {
    listOfMaster.forEach((ele) => {
        if (ele.type == "text" || ele.type == "number") {
            ele.value = "";
        } else if (ele.type == "time") {
            ele.value = "00:00";
        } else ele.value = getCurrentDate();
    });

    listOfSelect.forEach((ele) => (ele.selectedIndex = 0));
}

function disableDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") ele.disabled = true;
    });
}

function disableMaster() {
    listOfSelect.forEach((slc) => {
        if (slc.id != slcNomor.id) slc.disabled = true;
    });

    listOfMaster.forEach((txt) => {
        if (txt.type == "text" || txt.type == "number") {
            txt.disabled = true;
        } else txt.classList.add("unclickable");
    });
}

function getDataKomposisiFetch(no_komposisi, post_action = null) {
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "Memuat data..."
    );

    // SP_5298_EXT_LIST_KOMPOSISI_BAHAN
    fetchSelect(
        "/Konversi/getListKomposisiBahan/" + no_komposisi.trim(),
        (data) => {
            if (data.length < 1) {
                clearTable_DataTable(
                    "table_komposisi",
                    colKomposisi.length,
                    `Data komposisi untuk <b>${slcNomor.value}</b> tidak ditemukan.`
                );
            } else {
                let tableList = [];
                for (let i = 0; i < data.length; i++) {
                    listKomposisi.push({
                        StatusType: data[i].StatusType,
                        IdType: data[i].IdType,
                        NamaType: data[i].NamaType,
                        NamaSubKelompok: data[i].NamaSubKelompok,
                        SatuanPrimer:
                            data[i].SatuanPrimer !== undefined
                                ? data[i].SatuanPrimer
                                : "Null",
                        SatuanSekunder:
                            data[i].SatuanSekunder !== undefined
                                ? data[i].SatuanSekunder
                                : "Null",
                        SatuanTritier:
                            data[i].SatuanTritier !== undefined
                                ? data[i].SatuanTritier
                                : "Null",
                        IdSubKelompok: data[i].IdSubKelompok,
                    });

                    tableList.push({
                        StatusType: data[i].StatusType,
                        NamaType: data[i].NamaType,
                        NamaSubKelompok: data[i].NamaSubKelompok,
                        IdSubKelompok: data[i].IdSubKelompok,
                        IdType: data[i].IdType,
                    });
                }

                addTable_DataTable(
                    "table_komposisi",
                    tableList,
                    colKomposisi,
                    rowClickedKomposisi
                );
            }

            if (post_action != null) {
                post_action();
            }
        }
    );
}

function getSatuanFetch(id_type, i, post_action = null) {
    // SP_5298_EXT_GET_SATUAN
    fetchSelect("/Konversi/getSatuan/" + id_type, (data) => {
        listKonversi[i].SatPrimer = data[0].SatPrimer;
        listKonversi[i].SatSekunder = data[0].SatSekunder;
        listKonversi[i].SatTritier = data[0].SatTritier;

        if (i == listKonversi.length - 1) {
            addTable_DataTable(
                "table_konversi",
                listKonversi,
                colKonversi,
                rowClickedKonversi
            );

            if (post_action != null) {
                post_action();
            }
        }
    });
}

function getSaldoFetch(id_type, post_action = null) {
    /**
     * Fungsi getSaldo() dipakai untuk mengambil saldo dari DB Extruder
     * Fungsi ini dipakai pada tabel komposisi
     * Diharapkan untuk tidak dibingungkan dengan fungsi loadSaldoFetch()
     */

    // SP_5298_EXT_SALDO_BARANG
    fetchSelect("/Konversi/getSaldoBarang/" + id_type.trim(), (data) => {
        numStokPrimer.value = data[0].SaldoPrimer;
        numStokSekunder.value = data[0].SaldoSekunder;
        numStokTritier.value = data[0].SaldoTritier;

        if (post_action != null) {
            post_action();
        }
    });
}

function loadSaldoFetch(s_id_type) {
    /**
     * Fungsi loadSaldoFetch() dipakai untuk mengambil saldo dari DB Inventory
     * Fungsi ini dipakai pada tabel konversi
     * Diharapkan untuk tidak dibingungkan dengan fungsi getSaldoFetch()
     */

    // SP_1003_INV_Saldo_Barang
    fetchSelect("/Konversi/getSaldoInv/" + s_id_type.trim(), (data) => {
        numStokPrimer.value =
            data[0].SaldoPrimer !== undefined ? data[0].SaldoPrimer : "0";
        numStokSekunder.value =
            data[0].SaldoSekunder !== undefined ? data[0].SaldoSekunder : "0";
        numStokTritier.value =
            data[0].SaldoTritier !== undefined ? data[0].SaldoTritier : "0";
    });
}

function getDataKonversiFetch(id_konversi, post_action = null) {
    listKonversi.length = 0;
    clearTable_DataTable(
        "table_konversi",
        colKonversi.length,
        "Memuat data..."
    );

    // SP_5298_EXT_DATA_KONVERSI
    fetchSelect("/Konversi/getDataKonversi/" + id_konversi.trim(), (data) => {
        dateTanggal.value = dateTimeToDate(data[0].Tanggal);
        txtShift.value = data[0].Shift.trim();
        timeAwal.value = dateTimetoTime(data[0].AwalShift);
        timeAkhir.value = dateTimetoTime(data[0].AkhirShift);
        numUkuran.value = data[0].Ukuran;
        numDenier.value = data[0].Denier;
        timeMulai.value = dateTimetoTime(data[0].JamMulai);
        timeSelesai.value = dateTimetoTime(data[0].JamSelesai);
        txtWarna.value = data[0].Warna.trim();
        numLot.value = data[0].LotNumber.trim();
        hidNoUrut.value = data[0].NoUrutOrderEXT;

        addOptionIfNotExists(
            slcMesin,
            data[0].IdMesin.trim(),
            data[0].IdMesin.trim() + " | " + data[0].TypeMesin.trim()
        );

        addOptionIfNotExists(
            slcOrder,
            data[0].IdOrder.trim(),
            data[0].IdOrder.trim() + " | " + data[0].Identifikasi.trim()
        );

        addOptionIfNotExists(
            slcKomposisi,
            data[0].IdKomposisi.trim(),
            data[0].IdKomposisi.trim() + " | " + data[0].NamaKomposisi.trim()
        );

        addOptionIfNotExists(slcSpek, data[0].TypeBenang.trim());

        // SP_5298_EXT_LIST_DETAIL_KONVERSI_1
        fetchSelect(
            "/Konversi/getListDetailKonversi/" + id_konversi.trim(),
            (data) => {
                if (data.length < 1) {
                    clearTable_DataTable(
                        "table_konversi",
                        colKonversi.length,
                        `Data konversi untuk <b>${slcNomor.value}</b> tidak ditemukan.`
                    );

                    if (post_action != null) {
                        post_action();
                    }
                } else {
                    for (let i = 0; i < data.length; i++) {
                        listKonversi.push({
                            Type: data[i].Type,
                            JumlahPrimer: data[i].JumlahPrimer,
                            SatPrimer: "",
                            JumlahSekunder: data[i].JumlahSekunder,
                            SatSekunder: "",
                            JumlahTritier: data[i].JumlahTritier,
                            SatTritier: "",
                            Persentase: data[i].Persentase,
                            StatusType: data[i].StatusType,
                            IdSubKelompok: data[i].IdSubKelompok,
                            IdType: data[i].IdType,
                        });
                    }

                    for (let i = 0; i < listKonversi.length; i++) {
                        getSatuanFetch(
                            listKonversi[i].IdType.trim(),
                            i,
                            post_action
                        );
                    }
                }
            }
        );
    });
}

function createTmpTransaksiInventoryFetch(i, id_konv_inv, post_action = null) {
    let uraian = "";
    if (
        listKonversi[i].StatusType.trim() == "BB" ||
        listKonversi[i].StatusType.trim() == "BP"
    ) {
        uraian = "asal_konversi";
    } else if (
        listKonversi[i].StatusType == "HP" ||
        listKonversi[i].StatusType == "AF"
    ) {
        uraian = "tujuan_konversi";
    } else {
        alert("Jenis tidak valid.");
        return;
    }

    // SP_5298_EXT_INSERT_04_ASALTMPTRANSAKSI
    // SP_5298_EXT_INSERT_04_TUJUANTMPTRANSAKSI
    fetchStmt(
        "/Konversi/insTmpTransaksi/04/" +
            uraian +
            "/" +
            listKonversi[i].IdType.trim() +
            "/4384/" +
            dateTanggal.value +
            "/" +
            listKonversi[i].JumlahPrimer.replace(".", "_") +
            "/" +
            listKonversi[i].JumlahSekunder.replace(".", "_") +
            "/" +
            listKonversi[i].JumlahTritier.replace(".", "_") +
            "/" +
            listKonversi[i].IdSubKelompok.trim() +
            "/" +
            id_konv_inv.trim(),
        () => {
            if (post_action != null) {
                post_action();
            }
        }
    );
}

function insertDetailFetch(id_konv_inv, post_action = null) {
    let totalBahan = hitungTotalBahan();
    let persentase = 0;
    for (let i = 0; i < listKonversi.length; i++) {
        if (
            listKonversi[i].StatusType == "BB" ||
            listKonversi[i].StatusType == "BP" ||
            listKonversi[i].StatusType == "AF"
        ) {
            persentase = persentaseFun(
                listKonversi[i].JumlahTritier,
                totalBahan
            );
        }

        // SP_5409_EXT_INSERT_DETAILKONVERSI
        fetchStmt(
            "/Konversi/insDetailKonversi/" +
                slcNomor.value +
                "/" +
                listKonversi[i].IdType.trim() +
                "/" +
                listKonversi[i].JumlahPrimer.replace(".", "_") +
                "/" +
                listKonversi[i].JumlahSekunder.replace(".", "_") +
                "/" +
                listKonversi[i].JumlahTritier.replace(".", "_") +
                "/" +
                persentase +
                "/" +
                id_konv_inv,
            () => {
                if (i == listKonversi.length - 1) {
                    createTmpTransaksiInventoryFetch(
                        i,
                        id_konv_inv,
                        post_action
                    );
                } else createTmpTransaksiInventoryFetch(i, id_konv_inv);
            }
        );
    }
}

function ambilDataUkuran(nama_spek) {
    try {
        let x = nama_spek.split("-", 5);
        numUkuran.value = parseFloat(x[1]) / 100;

        let denier = -1;
        switch (x[2].substring(0, 1)) {
            case "A":
                denier = 1000;
                break;
            case "B":
                denier = 1100;
                break;
            case "C":
                denier = 1200;
                break;
            case "D":
                denier = 1300;
                break;
            case "E":
                denier = 1400;
                break;
            case "F":
                denier = 1500;
                break;
            case "G":
                denier = 1600;
                break;
            case "H":
                denier = 1700;
                break;
            case "I":
                denier = 1800;
                break;
            case "J":
                denier = 1900;
                break;
            case "K":
                denier = 2000;
                break;
            case "L":
                denier = 2100;
                break;
            case "M":
                denier = 2200;
                break;
            case "N":
                denier = 2300;
                break;

            default:
                if (!isNaN(x[2].substring(0, 1))) {
                    denier = x[2] * 10;
                } else alert("Denier tidak valid.");
                break;
        }

        numDenier.value = denier;
        txtWarna.value = x[3];
    } catch (error) {
        console.error("Error: ", error);
        alert("Gagal menentukan ukuran.");
    }
}

function hitungTotalBahan() {
    let qty = 0;
    for (let i = 0; i < listKonversi.length; i++) {
        if (
            listKonversi[i].StatusType.trim() == "BB" ||
            listKonversi[i].StatusType.trim() == "BP"
        ) {
            qty += listKonversi[i].JumlahTritier;
        }
    }

    return qty;
}

function persentaseFun(qty_tritier, total_bahan) {
    return Math.round((qty_tritier / total_bahan) * 100 * 100) / 100;
}

function prosesIsiFetch() {
    let isEmpty = false;
    listOfMaster.forEach((ele) => {
        if (ele.value.trim() == "" && ele.id != "no_urut") {
            if (!isEmpty) {
                alert(
                    "Terdapat data yang masih belum terisi. Mohon periksa kembali!"
                );
                ele.focus();

                console.log(ele);
            }

            isEmpty = true;
        }
    });

    if (!isEmpty) {
        let id_konv_inv = "";

        // SP_5298_EXT_INSERT_MASTER_KONVERSI
        fetchStmt(
            "/Konversi/insMasterKonversi/" +
                dateTanggal.value +
                "/" +
                txtShift.value +
                "/" +
                timeAwal.value.replace(/:/g, "_") +
                "/" +
                timeAkhir.value.replace(/:/g, "_") +
                "/" +
                slcMesin.value +
                "/" +
                numUkuran.value.replace(".", "_") +
                "/" +
                numDenier.value.replace(".", "_") +
                "/" +
                txtWarna.value +
                "/" +
                numLot.value.replace(".", "_") +
                "/" +
                slcOrder.value +
                "/" +
                hidNoUrut.value +
                "/" +
                slcKomposisi.value +
                "/" +
                timeMulai.value.replace(/:/g, "_") +
                "/" +
                timeSelesai.value.replace(/:/g, "_") +
                "/4384",
            () => {
                fetchSelect("/Konversi/getMasterKonversi", (data) => {
                    addOptionIfNotExists(slcNomor, data.NoKonversi);

                    // SP_5298_EXT_LIST_COUNTER
                    fetchStmt("/Konversi/updListCounter", () => {
                        fetchSelect("/Konversi/getListCounter", (data) => {
                            id_konv_inv = data.NoKonversi.padStart(9, "0");

                            insertDetailFetch(id_konv_inv, () => {
                                toggleButtons(1);
                                disableDetail();
                                disableMaster();
                                modeProses = "";
                                btnTambahDetail.disabled = true;
                                refetchNomor = true;
                                slcNomor.disabled = true;

                                alert("Data berhasil tersimpan!");
                            });
                        });
                    });
                });
            }
        );
    }
}

function prosesKoreksiFetch(id_konversi_ext) {
    let id_konv_inv = "";

    // SP_5298_EXT_IDKONVERSI_INV
    fetchSelect(
        "/Konversi/getIdKonversiInv/" + id_konversi_ext.trim(),
        (data) => {
            id_konv_inv = data[0].IdKonversi_Inv;

            // SP_5409_EXT_DELETE_DETAIL_KONVERSI
            fetchStmt(
                "/Konversi/delDetailKonversi/" +
                    id_konversi_ext +
                    "/" +
                    id_konv_inv,
                () => {
                    insertDetailFetch(id_konv_inv, () => {
                        // SP_5409_EXT_UPDATE_MASTER_KONVERSI
                        fetchStmt(
                            "/Konversi/updMasterKonversi/" +
                                dateTanggal.value +
                                "/" +
                                txtShift.value +
                                "/" +
                                timeAwal.value.replace(/:/g, "_") +
                                "/" +
                                timeAkhir.value.replace(/:/g, "_") +
                                "/" +
                                numUkuran.value.replace(".", "_") +
                                "/" +
                                numDenier.value.replace(".", "_") +
                                "/" +
                                txtWarna.value +
                                "/" +
                                numLot.value.trim().replace(".", "_") +
                                "/" +
                                timeMulai.value.replace(/:/g, "_") +
                                "/" +
                                timeSelesai.value.replace(/:/g, "_") +
                                "/" +
                                slcNomor.value,
                            () => {
                                toggleButtons(1);
                                disableDetail();
                                modeProses = "";
                                refetchNomor = true;
                                slcNomor.disabled = true;

                                alert("Data berhasil dikoreksi!");
                            }
                        );
                    });
                }
            );
        }
    );
}

function prosesHapusFetch(id_konversi_ext) {
    // SP_5409_EXT_DELETE_KONVERSI
    fetchStmt("/Konversi/delKonversi/" + id_konversi_ext, () => {
        toggleButtons(1);
        disableDetail();
        clearDataMaster();
        clearDataDetail();
        modeProses = "";
        refetchNomor = true;
        slcNomor.disabled = true;

        listKonversi.length = 0;
        clearTable_DataTable("table_konversi", colKonversi.length);

        alert("Data berhasil dihapus!");
    });
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

        default:
            break;
    }
}

function rowClickedKomposisi(row, data, _) {
    pilKonversi = -1;
    clearSelection_DataTable("table_konversi");

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

        txtIdProd.value = listKomposisi[pilKomposisi].IdType;
        txtNamaProd.value = listKomposisi[pilKomposisi].NamaType;
        spnSatPrimer.textContent =
            listKomposisi[pilKomposisi].SatuanPrimer !== undefined
                ? listKomposisi[pilKomposisi].SatuanPrimer
                : "NULL";
        spnSatSekunder.textContent =
            listKomposisi[pilKomposisi].SatuanSekunder !== undefined
                ? listKomposisi[pilKomposisi].SatuanSekunder
                : "NULL";
        spnSatTritier.textContent =
            listKomposisi[pilKomposisi].SatuanTritier !== undefined
                ? listKomposisi[pilKomposisi].SatuanTritier
                : "NULL";
        numPrimer.value = "";
        numSekunder.value = "";
        numTritier.value = "";
        txtJenis.value = listKomposisi[pilKomposisi].StatusType;
        getSaldoFetch(listKomposisi[pilKomposisi].IdType, () => {
            if (
                listKomposisi[pilKomposisi].StatusType.trim() == "BB" ||
                listKomposisi[pilKomposisi].StatusType.trim() == "BP"
            ) {
                if (numStokTritier.value == 0) {
                    alert(
                        txtNamaProd.value +
                            " tidak dapat digunakan untuk transaksi karena stok telah habis."
                    );
                    clearDataDetail();
                    listKomposisi.length = 0;
                    clearTable_DataTable(
                        "table_komposisi",
                        colKomposisi.length
                    );
                    return;
                }
            }

            if (modeProses != "") {
                numPrimer.disabled = false;
                numPrimer.focus();
            }

            koreksiDetail = false;
        });
    }
}

function rowClickedKonversi(row, data, _) {
    /**
     * Data pada tabel konversi menampilkan dari listKonversi secara terbalik
     * Row pertama menampilkan data listKonversi index terakhir
     * Row kedua menampilkan data listKonversi index terakhir - 1 dan seterusnya
     */

    pilKomposisi = -1;
    clearSelection_DataTable("table_komposisi");

    if (
        pilKonversi == findClickedRowInList(listKonversi, "IdType", data.IdType)
    ) {
        row.style.background = "white";
        pilKonversi = -1;
        clearDataDetail();
        disableDetail();
    } else {
        pilKonversi = findClickedRowInList(listKonversi, "IdType", data.IdType);
        clearSelection_DataTable("table_konversi");
        row.style.background = "aliceblue";

        txtIdProd.value = listKonversi[pilKonversi].IdType;
        txtNamaProd.value = listKonversi[pilKonversi].Type;
        numPrimer.value = listKonversi[pilKonversi].JumlahPrimer;
        spnSatPrimer.textContent = listKonversi[pilKonversi].SatPrimer;
        numSekunder.value = listKonversi[pilKonversi].JumlahSekunder;
        spnSatSekunder.textContent = listKonversi[pilKonversi].SatSekunder;
        numTritier.value = listKonversi[pilKonversi].JumlahTritier;
        spnSatTritier.textContent = listKonversi[pilKonversi].SatTritier;
        txtJenis.value = listKonversi[pilKonversi].StatusType;
        loadSaldoFetch(listKonversi[pilKonversi].IdType);

        if (modeProses != "") {
            numPrimer.disabled = false;
            numPrimer.select();
        }

        koreksiDetail = true;
    }
}
//#endregion

function init() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKonversi,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
        },
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

    clearTable_DataTable("table_konversi", colKonversi.length);
    clearTable_DataTable("table_komposisi", colKomposisi.length);
    toggleButtons(1);
    btnBaruMaster.focus();
    dateTanggal.value = getCurrentDate();
}

$(document).ready(() => init());
