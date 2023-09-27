//#region Variables
const dateInput = document.getElementById("tanggal");
const hidKode = document.getElementById("kode");
const timeMulai = document.getElementById("waktu_mulai");
const timeSelesai = document.getElementById("waktu_selesai");

const txtNama = document.getElementById("nama");
const txtShift = document.getElementById("shift");
const txtWinder = document.getElementById("winder");

const slcJam = document.getElementById("select_jam");
const slcBagian = document.getElementById("select_bagian");
const slcMesin = document.getElementById("select_mesin");
const slcWinder = document.getElementById("select_winder");
const slcGangguan = document.getElementById("select_gangguan");
const slcPenyebab = document.getElementById("select_penyebab");
const slcPenyelesaian = document.getElementById("select_penyelesaian");

const btnIsi = document.getElementById("button_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const groupBox1Slc = document.querySelectorAll("#group_box1 .form-select");
const groupBox1Ctr = document.querySelectorAll("#group_box1 .form-control");
const groupBox2Slc = document.querySelectorAll("#group_box2 .form-select");
const groupBox2Ctr = document.querySelectorAll("#group_box2 .form-control");

var modeProses = "";
var refetchWinder = false;
var refetchGangguan = false;
//#endregion

//#region Events
dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (modeProses == "isi") {
            txtShift.select();
        } else txtNama.select();
    }
});

txtNama.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        /**
         * Membuka modal berisi data-data perawatan yang telah tersimpan.
         * Setelah memilih data dan klik OK akan kembali ke halaman ini,
         * menampilkan data terhadap perawatan yang dipilih.
         *
         * Akan dimigrasi pada modalDaftarPerawatan.blade.php
         */
    }
});

txtShift.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = this.value.toUpperCase();
        slcJam.focus();
    }
});

slcJam.addEventListener("change", function () {
    if (modeProses == "Koreksi" || modeProses == "Hapus") {
        slcMesin.focus();
    } else slcBagian.focus();
});

slcBagian.addEventListener("change", function () {
    refetchWinder = true;
    slcMesin.focus();
});

slcMesin.addEventListener("change", function () {
    refetchWinder = true;
    slcWinder.focus();
});

slcWinder.addEventListener("mousedown", function () {
    if (refetchWinder) {
        refetchWinder = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "NoWinder",
            textKey: "Winder",
        };

        // SP_5298_EXT_LIST_WINDER
        fetchSelect(
            "/Catat/getListWinder/" + slcBagian.value + "/" + slcMesin.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchWinder = true;
            },
            errorOption
        );
    }
});

slcWinder.addEventListener("keydown", function (event) {
    if (event.key === "Enter" && refetchWinder) {
        refetchWinder = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "NoWinder",
            textKey: "Winder",
        };

        // SP_5298_EXT_LIST_WINDER
        fetchSelect(
            "/Catat/getListWinder/" + slcBagian.value + "/" + slcMesin.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchWinder = true;
            },
            errorOption
        );
    }
});

slcWinder.addEventListener("change", function () {
    slcGangguan.focus();
});

slcGangguan.addEventListener("mousedown", function () {
    if (refetchGangguan) {
        refetchGangguan = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "idgangguan",
            textKey: "namagangguan",
        };

        // SP_5298_EXT_JENIS_GANGGUAN
        fetchSelect(
            "/Catat/getJenisGangguan/" + slcBagian.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchGangguan = true;
            },
            errorOption
        );
    }
});

slcGangguan.addEventListener("keydown", function (event) {
    if (event.key === "Enter" && refetchGangguan) {
        refetchGangguan = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "idgangguan",
            textKey: "namagangguan",
        };

        // SP_5298_EXT_JENIS_GANGGUAN
        fetchSelect(
            "/Catat/getJenisGangguan/" + slcBagian.value,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchGangguan = true;
            },
            errorOption
        );
    }
});

//#endregion

//#region Functions
function setEnable(m_value) {
    groupBox1Ctr.forEach((ele) => (ele.disabled = !m_value));
    groupBox1Slc.forEach((ele) => (ele.disabled = !m_value));
    groupBox2Ctr.forEach((ele) => (ele.disabled = !m_value));
    groupBox2Slc.forEach((ele) => (ele.disabled = !m_value));
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

function clearAll() {
    groupBox1Ctr.forEach((ele) => (ele.value = ""));
    groupBox1Slc.forEach((ele) => (ele.selectedIndex = 0));
    groupBox2Ctr.forEach((ele) => (ele.value = ""));
    groupBox2Slc.forEach((ele) => (ele.selectedIndex = 0));
}
//#endregion

function init() {}

$(document).ready(() => init());
