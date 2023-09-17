//#region Variables
const rdoPembebasan = document.getElementById("fasilitas_pembebasan");
const rdoPengembalian = document.getElementById("fasilitas_pengembalian");
const dateStart = document.getElementById("tgl_start");
const slcKodeBarang = document.getElementById("kode_barang");

const txtNamaBarang = document.getElementById("nama_barang");
const txtBahanPP = document.getElementById("bahan_pp");
const txtBenang = document.getElementById("benang");
const txtHasil = document.getElementById("hasil");
const txtSisa = document.getElementById("sisa");

const hidMeter = document.getElementById("meter");
const hidRoll = document.getElementById("roll");
const hidAwal = document.getElementById("meter_awal");

const btnCekKode = document.getElementById("btn_cek_kode");
const btnSimpan = document.getElementById("btn_simpan");
const btnKeluar = document.getElementById("btn_keluar");

const listOfTxt = document.querySelectorAll(".form-control");

var refetchKode = true;
//#endregion

//#region Events
rdoPembebasan.addEventListener("change", function () {
    refetchKode = true;
});

slcKodeBarang.addEventListener("mousedown", function () {
    if (refetchKode) {
        refetchKode = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "KodeBarang",
            textKey: "NamaType",
        };

        let kode = -1;
        if (rdoPembebasan.checked) {
            kode = 1;
        } else kode = 2;

        // SP_1273_EXT_Cek_Bahan_KITE
        fetchSelect(
            "/Master/getCekBahanKite/" + kode,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKodeBarang.addEventListener("keydown", function (event) {
    if (refetchKode || event.key === "Enter") {
        refetchKode = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "KodeBarang",
            textKey: "NamaType",
        };

        let kode = -1;
        if (rdoPembebasan.checked) {
            kode = 1;
        } else kode = 2;

        // SP_1273_EXT_Cek_Bahan_KITE
        fetchSelect(
            "/Master/getCekBahanKite/" + kode,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKodeBarang.addEventListener("change", function () {
    txtBahanPP.focus();
});

txtBahanPP.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtBenang.value =
            ((parseFloat(txtBahanPP.value) / 0.0757) * 97.01) / 1000;
        txtBenang.value = parseFloat(txtBenang.value).toFixed(2);
        txtHasil.value = 0;
        txtSisa.value = 0;
        hidMeter.value = parseFloat(txtBahanPP.value) / 0.0757;
        hidAwal.value = parseFloat(hidMeter.value).toFixed(2);
        hidRoll.value = parseFloat(hidMeter.value) / 2000;
        hidRoll.value = parseFloat(hidRoll.value).toFixed(0);
        hidMeter = parseFloat(hidRoll.value) * 2000;

        btnSimpan.focus();
    }
});

btnSimpan.addEventListener("click", function () {
    if (slcKodeBarang.selectedIndex == 0) {
        alert("Pilih Kode Barang Fasilitas terlebih dahulu!");
        slcKodeBarang.focus();
    } else if (txtBenang.value == "") {
        alert("Isi Bahan PP dan Benang terlebih dahulu!");
        txtBahanPP.focus();
    } else {
        let jenis = "";
        if (rdoPembebasan.checked) {
            jenis = "Fas Pembebasan";
        } else jenis = "Fas Pengembalian";

        // SP_1273_EXT_KITE Kode 1
        fetchStmt(
            "/Master/getKiteExtruder/1/" +
                dateStart.value +
                "/" +
                jenis +
                "/" +
                slcKodeBarang.value +
                "/" +
                txtBahanPP.value +
                "/" +
                txtBenang.value +
                "/" +
                hidMeter.value +
                "/" +
                hidRoll.value +
                "/" +
                hidAwal.value +
                "/" +
                txtHasil.value,
            () => {
                alert("Data berhasil tersimpan.");
                clearAll();
            }
        );
    }
});

btnCekKode.addEventListener("click", function () {
    let kodeBarang = "";
    if (rdoPembebasan.checked) {
        // SP_1273_EXT_KITE Kode 2
        fetchSelect("/Master/getKiteExtruder/2", (data) => {
            if (data.length > 0) {
                kodeBarang = data[0].KodeBarang;
                dateStart.value = dateTimeToDate(data[0].TglStart);
            } else {
                alert("Tidak ditemukan data untuk Fas Pembebasan.");
                return;
            }
        });
    } else {
        // SP_1273_EXT_KITE Kode 3
        fetchSelect("/Master/getKiteExtruder/3", (data) => {
            if (data.length > 0) {
                kodeBarang = data[0].KodeBarang;
                dateStart.value = dateTimeToDate(data[0].TglStart);
            } else {
                alert("Tidak ditemukan data untuk Fas Pengembalian.");
                return;
            }
        });
    }

    // SP_1273_EXT_KITE Kode 4
    fetchSelect(
        "/Master/getKiteExtruder/4/" + dateStart.value + "/" + kodeBarang,
        (data) => {
            if (data.length > 0) {
                addOptionIfNotExists(
                    slcKodeBarang,
                    kodeBarang,
                    kodeBarang + " | " + data[0].NAMA_BRG
                );
                txtBahanPP.value = data[0].BahanPP;
                txtBenang.value = data[0].Benang;
                txtHasil.value = data[0].Hasil;
                txtSisa.value =
                    parseFloat(txtBenang.value) - parseFloat(txtHasil.value);
                btnSimpan.disabled = true;
            } else
                alert("Tidak ditemukan data Kode Barang " + kodeBarang + ".");
        }
    );
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/ExtruderNet";
});
//#endregion

//#region Functions
function clearAll() {
    listOfTxt.forEach((txt) => (txt.value = ""));
    dateStart.value = getCurrentDate();
    rdoPembebasan.checked = true;
    slcKodeBarang.selectedIndex = 0;
}
//#endregion

function init() {
    rdoPembebasan.checked = true;
    dateStart.value = getCurrentDate();
}

$(document).ready(() => init());
