//#region Variables
const dateInput = document.getElementById("tanggal");
const rdoMasuk = document.getElementById("radio_masuk");
const rdoLibur = document.getElementById("radio_libur");

const timeShiftAwal = document.getElementById("shift_awal");
const timeShiftAkhir = document.getElementById("shift_akhir");
const timeGangAwal = document.getElementById("waktu_awal");
const timeGangAkhir = document.getElementById("waktu_akhir");

const slcKodeMesin = document.getElementById("select_kode_mesin");
const slcKomposisi = document.getElementById("select_komposisi");
const slcGangguan = document.getElementById("select_gangguan");

const txtNoTransaksi = document.getElementById("no_transaksi");
const txtShift = document.getElementById("shift");
const txtJmlhJam = document.getElementById("jmlh_jam");
const txtJmlhMenit = document.getElementById("jmlh_menit");
const txtKeterangan = document.getElementById("keterangan");
const txtTanggal = document.getElementById("data_tgl");

const btnOk = document.getElementById("btn_ok");
const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listOfTransaksi = document.querySelectorAll(
    "#card_transaksi .form-control, .form-check-input, #card_transaksi .form-select"
);

const listOfGangguan = document.querySelectorAll(
    "#card_gangguan .form-control, #card_gangguan .form-select"
);

const listGangguan = [];
/* ISI LIST GANGGUAN
    0 NoTrans
    1 Tanggal
    2 IdMesin
    3 TypeMesin
    4 IdKonversi
    5 IdGangguan
    6 NamaGangguan
    7 AwalGangguan
    8 AkhirGangguan
    9 JumlahJam
    10 JumlahMenit
    11 Keterangan
*/

const posGangguan = $("#table_gangguan").offset().top - 125;
const colGangguan = [
    { width: "125px" }, // No. Transaksi
    { width: "100px" }, // Tanggal
    { width: "100px" }, // Id Mesin
    { width: "100px" }, // Nama Mesin
    { width: "125px" }, // Id Konversi
    { width: "50px" }, // Id Gangguan
    { width: "125px" }, // Nama Gangguan
    { width: "100px" }, // Awal Gangguan
    { width: "100px" }, // Akhir Gangguan
    { width: "100px" }, // Jumlah Jam
    { width: "110px" }, // Jumlah Menit
    { width: "125px" }, // Keterangan
];

var checkboxesGangguan = null;
var pilGangguan = -1;
var modeProses = "";
var refetchKomposisi = false;
//#endregion

//#region Events
dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        slcKodeMesin.focus();
    }
});

timeShiftAwal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeShiftAkhir.focus();
    }
});

timeGangAkhir.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value < timeGangAwal.value) {
            const tglGangAkhir = new Date(timeGangAkhir.value.split(" ")[0]);
            timeGangAkhir.value =
                tglGangAkhir.setDate(tglGangAkhir.getDate() + 1) +
                " " +
                timeGangAkhir.value.split(" ")[1];
        }

        txtJmlhJam.value = getTimeDiff(
            new Date(timeGangAwal.value),
            new Date(timeGangAkhir.value),
            "hour"
        );

        txtJmlhMenit.value = getTimeDiff(
            new Date(timeGangAwal.value),
            new Date(timeGangAkhir.value),
            "minute"
        );

        txtKeterangan.focus();
    }
});

timeShiftAkhir.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        slcGangguan.focus();
    }
});

rdoLibur.addEventListener("change", function () {
    slcKomposisi.selectedIndex = 0;
});

rdoMasuk.addEventListener("change", function () {
    slcKomposisi.selectedIndex = 0;
});

btnOk.addEventListener("click", function () {
    listGangguan.length = 0;
    clearTable_DataTable("table_gangguan", colGangguan.length, "padding=250px");

    loadDataGangguanProdEXT();
});

btnIsi.addEventListener("click", function () {
    toggleButtons(2);
    setEnable(true);
    clearAll();

    dateInput.focus();
    timeGangAwal.value = getCurrentDate() + " " + getCurrentTime();
    timeGangAkhir.value = getCurrentDate() + " " + getCurrentTime();

    modeProses = "isi";
});

btnKoreksi.addEventListener("click", function () {
    if (pilGangguan != -1) {
        toggleButtons(2);
        setEnable(true, "groupbox1");
        clearAll();

        modeProses = "koreksi";

        timeGangAwal.focus();
    } else {
        alert("Belum ada data yang dipilih.");
    }
});

btnHapus.addEventListener("click", function () {
    if (pilGangguan != -1) {
        toggleButtons(2);
        clearAll();

        modeProses = "hapus";

        btnProses.focus();
    } else {
        alert("Belum ada data yang dipilih.");
    }
});

btnProses.addEventListener("click", function () {
    if (modeProses == "isi") {
        prosesIsi();
    } else if (modeProses == "koreksi") {
        prosesUpdate();
    } else if (modeProses == "hapus") {
        prosesDelete();
    }
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButtons(1);
        clearAll();
        setEnable(false);

        listGangguan.length = 0;
        clearTable_DataTable("table_gangguan", colGangguan.length);

        modeProses = "";
    }
});

slcKodeMesin.addEventListener("change", function () {
    if (modeProses == "Koreksi" || modeProses == "Hapus") {
        btnOk.disabled = false;
        btnOk.focus();
    } else if (modeProses == "Isi") {
        slcGangguan.disabled = false;
        slcGangguan.focus();
    }

    if (rdoLibur.checked) {
        slcKomposisi.disabled = true;
        txtShift.disabled = false;
        txtShift.focus();
    } else {
        slcKomposisi.disabled = false;
        slcKomposisi.focus();
    }

    refetchKomposisi = true;
});

slcKomposisi.addEventListener("mousedown", function () {
    if (this.options.length <= 1 || refetchKomposisi) {
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKonversi",
            textKey: "NamaKomposisi",
        };

        // SP_5298_EXT_LIST_IDKOMPOSISI
        fetchSelect(
            "/Catat/getListIdKomposisi/" +
                dateInput.value +
                "/" +
                slcMesin.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKomposisi.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (this.options.length <= 1 || refetchKomposisi) {
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdKonversi",
                textKey: "NamaKomposisi",
            };

            // SP_5298_EXT_LIST_IDKOMPOSISI
            fetchSelect(
                "/Catat/getListIdKomposisi/" +
                    dateInput.value +
                    "/" +
                    slcMesin.value,
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
    // SP_5298_EXT_DISPLAY_SHIFT
    fetchSelect("/Catat/getDisplayShift/" + this.value, (data) => {
        txtShift.value = data[0].Shift;
        timeShiftAwal.value = dateTimetoTime(data[0].AwalShift);
        timeShiftAkhir.value = dateTimetoTime(data[0].AkhirShift);

        slcGangguan.focus();
    });
});

slcGangguan.addEventListener("mousedown", function () {
    timeGangAwal.disabled = false;
    timeGangAwal.focus();
});

slcGangguan.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        timeGangAwal.disabled = false;
        timeGangAwal.focus();
    }
});

txtShift.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = this.value.toUpperCase();
        timeShiftAwal.focus();
    }
});

txtKeterangan.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtKeterangan.value = txtKeterangan.value.toUpperCase();
        btnProses.focus();
    }
});

txtTanggal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        btnOk.focus();
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

function setEnable(m_value, group_box = "") {
    // Bagian Transaksi
    if (group_box != "gangguan") {
        listOfTransaksi.forEach((ele) => {
            if (ele.type == "date" || ele.type == "time") {
                if (m_value) {
                    ele.classList.remove("unclickable");
                } else ele.classList.add("unclickable");
            } else ele.disabled = !m_value;
        });
    }

    // Bagian Gangguan
    if (group_box != "transaksi") {
        listOfGangguan.forEach((ele) => {
            if (ele.type == "datetime") {
                if (m_value) {
                    ele.classList.remove("unclickable");
                } else ele.classList.add("unclickable");
            } else ele.disabled = !m_value;
        });
    }
}

function clearAll() {
    listOfTransaksi.forEach((input) => {
        if (input.tagName == "INPUT") {
            input.value = "";
        } else input.selectedIndex = 0;
    });

    listOfGangguan.forEach((input) => {
        if (input.tagName == "INPUT") {
            input.value = "";
        } else input.selectedIndex = 0;
    });

    timeShiftAwal.value = "00:00";
    timeShiftAkhir.value = "00:00";
    timeGangAwal.value = "00:00";
    tglGangAkhir.value = "00:00";
}

function loadDataGangguanProdEXT() {
    // SP_5409_EXT_LIST_GANGGUAN_PROD
    fetchSelect(
        "/Catat/getListGangguanProd/" +
            txtTanggal.value.split("/")[0] +
            "/" +
            txtTanggal.value.split("/")[1],
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listGangguan.push({
                    NoTrans: data[i].NoTrans,
                    Tanggal: dateTimeToDate(data[i].Tanggal),
                    IdMesin: data[i].IdMesin,
                    TypeMesin: data[i].TypeMesin,
                    IdKonversi:
                        data[i].IdKonversi === undefined
                            ? ""
                            : data[i].IdKonversi,
                    IdGangguan: data[i].IdGangguan,
                    NamaGangguan: data[i].NamaGangguan,
                    AwalGangguan: data[i].AwalGangguan,
                    AkhirGangguan: data[i].AkhirGangguan,
                    JumlahJam: data[i].JumlahJam,
                    JumlahMenit: data[i].JumlahMenit,
                    Keterangan: data[i].Keterangan,
                });
            }

            addTable_DataTable(
                "table_gangguan",
                listGangguan.map((item, index) => {
                    return {
                        ...item,
                        NoTrans: `<input class="form-check-input" type="checkbox" value="${index}" name="checkbox_gangguan"> ${item.NoTrans}`,
                    };
                }),
                colGangguan,
                rowClickedGangguan
            );

            checkboxesGangguan = document.querySelectorAll(
                'input[name="checkbox_gangguan"]'
            );
        }
    );
}

function rowClickedGangguan(row, data, index) {
    if (pilGangguan == index) {
        row.style.background = "white";
        pilGangguan = -1;
        checkboxesGangguan[index].checked = false;
    } else {
        clearSelection_DataTable("table_gangguan");
        clearCheckedBoxes(checkboxesGangguan, checkboxesGangguan[index]);

        row.style.background = "aliceblue";
        pilGangguan = index;
        checkboxesGangguan[index].checked = true;

        txtNoTransaksi.value = listGangguan[index].NoTrans;
        dateInput.value = data.Tanggal;
        timeGangAwal.value = data.AwalGangguan;
        timeGangAkhir.value = data.AkhirGangguan;
        txtJmlhJam.value = data.JumlahJam;
        txtJmlhMenit.value = data.JumlahMenit;
        txtKeterangan.value = data.Keterangan;

        addOptionIfNotExists(
            slcKodeMesin,
            data.IdMesin,
            data.IdMesin + " | " + data.NamaMesin
        );

        addOptionIfNotExists(
            slcGangguan,
            data.IdGangguan,
            data.IdGangguan + " | " + data.NamaGangguan
        );

        addOptionIfNotExists(slcKomposisi, data.IdKonversi);

        // SP_5298_EXT_LIST_SHIFT
        fetchSelect("/Catat/getListShift/" + slcKomposisi.value, (data) => {
            if (data[0].Shift !== undefined) {
                txtShift.value = data[0].Shift;
                timeShiftAwal.value = data[0].AwalShift;
                timeShiftAkhir.value = data[0].AkhirShift;
            } else {
                txtShift.value = "***";
            }
        });
    }
}

function prosesIsi() {
    // SP_5298_EXT_INSERT_GANGGUAN_PROD
    fetchStmt(
        "/Catat/insGangguanProd/" +
            dateInput.value +
            "/" +
            slcKodeMesin.value +
            "/" +
            slcGangguan.value +
            "/" +
            slcKomposisi.value +
            "/" +
            txtShift.value +
            "/" +
            timeShiftAwal.value +
            "/" +
            timeShiftAkhir.value +
            "/" +
            timeGangAwal.value +
            "/" +
            timeGangAkhir.value +
            "/" +
            txtJmlhJam.value +
            "/" +
            txtJmlhMenit.value +
            "/" +
            rdoLibur.checked
            ? "L"
            : "M" +
                  "/" +
                  txtKeterangan.value +
                  "/" +
                  getCurrentTime() +
                  "/tmpUser",
        () => {
            // SP_5298_EXT_NO_TRANS
            fetchSelect("/Catat/getNoTrans", (data) => {
                txtNoTransaksi.value = data[0].No_Trans;

                setEnable(false);
                modeProses = "";
                toggleButtons(1);
                btnIsi.focus();

                listGangguan.push({
                    NoTrans: txtNoTransaksi.value,
                    Tanggal: dateInput.value,
                    IdMesin: slcKodeMesin.value,
                    TypeMesin: slcKodeMesin.textContent.split(" | ")[1],
                    IdKonversi: slcKomposisi.value,
                    IdGangguan: slcGangguan.value,
                    NamaGangguan: slcGangguan.textContent.split(" | ")[1],
                    AwalGangguan: timeGangAwal.value,
                    AkhirGangguan: timeGangAkhir.value,
                    JumlahJam: txtJmlhJam.value,
                    JumlahMenit: txtJmlhMenit.value,
                    Keterangan: txtKeterangan.value,
                });
            });
        }
    );
}

function prosesUpdate() {
    // SP_5298_EXT_UPDATE_GANGGUAN_PROD
    fetchStmt(
        "/Catat/updGangguanProd/" +
            txtNoTransaksi.value +
            "/" +
            timeGangAwal.value +
            "/" +
            timeGangAkhir.value +
            "/" +
            txtJmlhJam.value +
            "/" +
            txtJmlhMenit.value +
            "/" +
            txtKeterangan.value,
        () => {
            setEnable(false);
            slcKodeMesin.disabled = false;
            modeProses = "";
            toggleButtons(1);
            clearAll();
            listGangguan.length = 0;
            clearTable_DataTable("table_gangguan", colGangguan.length);
            btnIsi.focus();

            alert("Data berhasil dikoreksi!");
        }
    );
}

function prosesDelete() {
    // SP_5298_EXT_DELETE_GANGGUAN_PROD
    fetchStmt("/Catat/delGangguanProd/" + txtNoTransaksi.value, () => {
        setEnable(false);
        modeProses = "";
        toggleButtons(1);
        clearAll();
        listGangguan.length = 0;
        clearTable_DataTable("table_gangguan", colGangguan.length);
        btnIsi.focus();

        alert("Data berhasil dihapus!");
    });
}
//#endregion

function init() {
    $("#table_gangguan").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colGangguan,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel gangguan...",
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

    toggleButtons(1);
    setEnable(false);

    btnIsi.focus();
    txtTanggal.value = getCurrentDate(true);
    dateInput.value = getCurrentDate();
    timeShiftAwal.value = "00:00";
    timeShiftAkhir.value = "00:00";
    timeGangAwal.value = getCurrentDate() + " 00:00";
    timeGangAkhir.value = getCurrentDate() + " 00:00";
}

$(document).ready(() => {
    init();
});
