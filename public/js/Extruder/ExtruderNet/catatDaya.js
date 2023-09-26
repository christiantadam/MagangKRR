//#region Variables
const dateInput = document.getElementById("tanggal");
const timeJamProd = document.getElementById("jam_produksi");
const slcMesin = document.getElementById("select_mesin");

const txtCounter = document.getElementById("counter");
const txtId = document.getElementById("teks_id");
const txtFaktor = document.getElementById("faktor");
const txtTanggal = document.getElementById("data_tgl");

const btnOk = document.getElementById("btn_ok");
const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listOfInput = document.querySelectorAll("#card_daya .form-control");

const tableDayaCol = [
    { width: "50px" }, // No.
    { width: "140px" }, // Tanggal
    { width: "140px" }, // Id Mesin
    { width: "140px" }, // Jam Produksi
    { width: "140px" }, // Counter
    { width: "100px" }, // Faktor Kali
    { width: "140px" }, // Id User
    { width: "100px" }, // Id KWaH
];

const listDaya = [];
/* ISI LIST DAYA
    0 IdKwahMesin1
    1 Tanggal
    2 IdMesin
    3 Jam
    4 CounterKWaH
    5 FaktorKali
    6 UserInput
    8 IdKwahMesin2
*/

var checkboxesDaya = null;
var pilDaya = -1;
var modeProses = "";
//#endregion

//#region Events
dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") slcMesin.focus();
});

timeJamProd.addEventListener("keypress", function (event) {
    if (event.key == "Enter") txtCounter.focus();
});

slcMesin.addEventListener("change", function () {
    timeJamProd.focus();
});

txtCounter.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        // SP_5298_EXT_FAKTOR_KALI
        fetchSelect("/Catat/getFaktorKali/" + slcMesin.value, (data) => {
            if (data.length > 0) {
                txtFaktor.value = data[0].FaktorKali;
                btnProses.focus();
            } else
                alert(
                    "Faktor Kali untuk Mesin " +
                        slcMesin.value +
                        " tidak ditemukan."
                );
        });
    }
});

btnIsi.addEventListener("click", function () {
    modeProses = "isi";
    toggleButtons(2);
    setEnable(true);
    clearData();
    dateInput.focus();
});

btnKoreksi.addEventListener("click", function () {
    if (pilDaya != -1) {
        modeProses = "koreksi";
        toggleButtons(2);
        setEnable(true);
        slcMesin.disabled = true;
        txtCounter.focus();
    } else alert("Belum ada data yang terpilih!");
});

btnHapus.addEventListener("click", function () {
    if (pilDaya != -1) {
        modeProses = "hapus";
        toggleButtons(2);
        btnProses.focus();
    } else alert("Belum ada data yang terpilih!");
});

btnOk.addEventListener("click", function () {
    listDaya.length = 0;
    clearTable_DataTable("table_daya", 8);

    // SP_5298_EXT_KWAH_MESIN_PERBULAN
    fetchSelect(
        "/Catat/getKwahMesinPerbulan/" +
            txtTanggal.value.split("/")[0] +
            "/" +
            txtTanggal.value.split("/")[1],
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listDaya.push({
                    IdKwahMesin1: data[i].IdKWaHMesin,
                    Tanggal: data[i].Tanggal,
                    IdMesin: data[i].IdMesin,
                    Jam: dateTimetoTime(data[i].Jam),
                    CounterKWaH: data[i].CounterKWaH,
                    FaktorKali: data[i].FaktorKali,
                    UserInput: data[i].UserInput,
                    IdKwahMesin2: data[i].IdKWaHMesin,
                });

                checkboxesDaya = document.querySelectorAll(
                    'input[name="checkbox_daya"]'
                );
            }

            if (listDaya.length > 0) {
                addTable_DataTable(
                    "table_daya",
                    listDaya.map((item, index) => {
                        return {
                            ...item,
                            IdKwahMesin1: `<input class="form-check-input" type="checkbox" value="${index}" name="checkbox_daya"> ${item.IdKwahMesin1}`,
                        };
                    })
                );
            }
        }
    );
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
        clearData();
        setEnable(false);
        loadDataKwah();

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

function setEnable(m_value) {
    slcMesin.disabled = !m_value;
    listOfInput.forEach((input) => (input.disabled = !m_value));
}

function clearData() {
    slcMesin.selectedIndex = 0;
    listOfInput.forEach((input) => (input.value = ""));
    timeJamProd.value = "00:00";
    dateInput.value = getCurrentDate();

    listDaya.length = 0;
    clearTable_DataTable("table_daya", 8);
}

function prosesIsi() {
    // SP_5298_EXT_INSERT_KWAH_MESIN
    fetchStmt(
        "/Catat/insKwahMesin/" +
            dateInput.value +
            "/" +
            slcMesin.value +
            "/" +
            timeJamProd.value +
            "/" +
            txtCounter.value +
            "/" +
            txtFaktor.value +
            "/" +
            getCurrentTime() +
            "/4384",
        () => {
            setEnable(false);
            toggleButtons(1);
            clearData();
            loadDataKwah();
            btnIsi.focus();
            modeProses = "";
        }
    );
}

function prosesUpdate() {
    // SP_5298_EXT_UPDATE_KWAH_MESIN
    fetchStmt(
        "/Catat/updKwahMesin/" + txtId.value + "/" + txtCounter.value,
        () => {
            setEnable(false);
            slcMesin.disabled = false;
            modeProses = "";
            toggleButtons(1);
            clearData();
            loadDataPerDivisi();
            btnIsi.focus();

            alert("Data berhasil dikoreksi!");
        }
    );
}

function prosesDelete() {
    // SP_5298_EXT_DELETE_KWAH_MESIN
    fetchStmt("/Catat/delKwahMesin/" + txtId.value, () => {
        setEnable(false);
        modeProses = "";
        toggleButtons(1);
        clearData();
        loadDataPerDivisi();
        btnIsi.focus();

        alert("Data berhasil dihapus!");
    });
}

function loadDataKwah() {
    // loadDataKwahMesin()
    listDaya.length = 0;
    clearTable_DataTable("table_daya", 8);

    // SP_5298_EXT_LISTDATA_KWAH_MESIN
    fetchSelect(
        "/Catat/getListDataKwahMesin/" +
            txtTanggal.value.split("/")[0] +
            "/" +
            txtTanggal.value.split("/")[1],
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listDaya.push({
                    IdKwahMesin1: data[i].IdKWaHMesin,
                    Tanggal: data[i].Tanggal,
                    IdMesin: data[i].IdMesin,
                    Jam: dateTimetoTime(data[i].Jam),
                    CounterKWaH: data[i].CounterKWaH,
                    FaktorKali: data[i].FaktorKali,
                    UserInput: data[i].UserInput,
                    IdKwahMesin2: data[i].IdKWaHMesin,
                });
            }

            if (listDaya.length > 0) {
                addTable_DataTable(
                    "table_daya",
                    listDaya.map((item, index) => {
                        return {
                            ...item,
                            IdKwahMesin1: `<input class="form-check-input" type="checkbox" value="${index}" name="checkbox_daya"> ${item.IdKwahMesin1}`,
                        };
                    })
                );
            }
        }
    );
}

function loadDataPerDivisi() {
    listDaya.length = 0;
    clearTable_DataTable("table_daya", 8);

    // SP_5298_EXT_KWAH_MESIN
    fetchSelect("/Catat/getKwahMesin/" + dateInput.value + "/EXT", (data) => {
        for (let i = 0; i < data.length; i++) {
            listDaya.push({
                IdKwahMesin1: data[i].IdKWaHMesin,
                Tanggal: data[i].Tanggal,
                IdMesin: data[i].IdMesin,
                Jam: dateTimetoTime(data[i].Jam),
                CounterKWaH: data[i].CounterKWaH,
                FaktorKali: data[i].FaktorKali,
                UserInput: data[i].UserInput,
                IdKwahMesin2: data[i].IdKWaHMesin,
            });
        }

        if (listDaya.length > 0) {
            addTable_DataTable(
                "table_daya",
                listDaya.map((item, index) => {
                    return {
                        ...item,
                        IdKwahMesin1: `<input class="form-check-input" type="checkbox" value="${index}" name="checkbox_daya"> ${item.IdKwahMesin1}`,
                    };
                })
            );
        }
    });
}

function rowClickedDaya(row, data, index) {
    if (pilDaya == index) {
        row.style.background = "white";
        pilDaya = -1;
        checkboxesDaya[index].checked = false;
    } else {
        clearSelection_DataTable("table_daya");
        clearCheckedBoxes(checkboxesDaya, checkboxesDaya[index]);

        row.style.background = "aliceblue";
        pilDaya = index;
        checkboxesDaya[index].checked = true;

        dateInput.value = data.Tanggal;
        addOptionIfNotExists(slcMesin, data.IdMesin);
        timeJamProd.value = data.Jam;
        txtCounter.value = data.CounterKWaH;
        txtFaktor.value = data.FaktorKali;
        txtId.value = data.IdKwahMesin;
    }
}
//#endregion

function init() {
    $("#table_daya").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel daya...",
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

    dateInput.value = getCurrentDate();
    timeJamProd.value = "00:00";
    txtTanggal.value = getCurrentDate(true);

    toggleButtons(1);
    setEnable(false);
    loadDataKwah();
    btnIsi.focus();
}

$(document).ready(() => {
    init();
});
