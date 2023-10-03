//#region Variables
const txtJumbo = document.getElementById("kode_jumbo");
const txtType = document.getElementById("txt_type");
const numKarung = document.getElementById("berat_karung");
const numInner = document.getElementById("berat_inner");
const numLami = document.getElementById("berat_lami");
const numConductive = document.getElementById("berat_conductive");
const numTotal = document.getElementById("berat_total");

const btnKoreksi = document.getElementById("btn_koreksi");
const btnBatal = document.getElementById("btn_batal");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const listOfTxt = document.querySelectorAll("input, textarea");
//#endregion

//#region Events
btnKoreksi.addEventListener("click", function () {
    listOfTxt.forEach((ele) => (ele.value = ""));
    this.disabled = true;
    txtJumbo.disabled = false;
    txtJumbo.select();
    btnProses.disabled = false;
    btnBatal.disabled = false;
});

txtJumbo.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value.trim() != "") {
            let kode = ("000000000" + this.value.trim()).slice(-9);
            this.value = kode;
            loadDataFetch(kode);
        } else this.focus();
    }
});

numKarung.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = "0";
        numInner.select();
    }
});

numInner.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = "0";
        numLami.select();
    }
});

numLami.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = "0";
        numConductive.select();
    }
});

numConductive.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value == "") this.value = "0";
        numTotal.value =
            parseFloat(numKarung.value) +
            parseFloat(numInner.value) +
            parseFloat(numLami.value) +
            parseFloat(numConductive.value);
        btnProses.focus();
    }
});

btnProses.addEventListener("click", function () {
    formWait(true);
    numTotal.value =
        parseFloat(numKarung.value) +
        parseFloat(numInner.value) +
        parseFloat(numLami.value) +
        parseFloat(numConductive.value);

    fetchSelect(
        "/beratStandar/SP_1273_PRG_CEK_KOMPOSISI_1/" + txtJumbo.value,
        (data) => {
            const koreksiBerat = () => {
                let ket =
                    numKarung.value +
                    "-" +
                    numInner.value +
                    "-" +
                    numLami.value +
                    "-" +
                    numConductive.value +
                    "-" +
                    numTotal.value;

                fetchStmt(
                    "/beratStandar/SP_7775_PBL_UPDATE_BERAT_WOVEN/" +
                        txtJumbo.value +
                        "~" +
                        ket +
                        "~" +
                        numKarung.value +
                        "~" +
                        numInner.value +
                        "~" +
                        numLami.value +
                        "~" +
                        numConductive.value +
                        "~" +
                        numTotal.value +
                        "~4384",
                    () => {
                        formWait(false);
                        alert("Berat karung berhasil dikoreksi.");
                        listOfTxt.forEach((ele) => (ele.disabled = true));
                        btnBatal.disabled = true;
                        btnProses.disabled = true;
                        btnKoreksi.disabled = false;
                        btnKoreksi.focus();
                    }
                );
            };

            if (data.length > 0) {
                if (data[0].Total > 0) {
                    // User_id <> "1001" And User_id <> "1703"
                    alert(
                        "Berat Standard tidak bisa dikoreksi, \nkarena sudah memiliki Komposisi Konversi."
                    );
                } else koreksiBerat();
            } else koreksiBerat();
        }
    );
});

btnBatal.addEventListener("click", function () {
    listOfTxt.forEach((ele) => (ele.value = ""));
    btnProses.disabled = true;
    this.disabled = true;
    listOfTxt.forEach((ele) => (ele.disabled = true));
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/BeratKomposisi";
});
//#endregion

//#region Functions
function loadDataFetch(s_kode_brg) {
    formWait(true);
    fetchSelect(
        "/beratStandar/SP_7775_PBL_SELECT_WOVEN/" + s_kode_brg,
        (data) => {
            if (data.length > 0) {
                txtJumbo.value = s_kode_brg;
                txtType.value = data[0].NAMA_BRG;
                numKarung.value = data[0].BERAT_KARUNG;
                numInner.value = data[0].BERAT_INNER;
                numLami.value = data[0].BERAT_LAMI;
                numConductive.value = data[0].BERAT_LAIN;
                numTotal.value = data[0].BERAT_TOTAL;
                enableForm(true);
                numKarung.select();
            } else {
                listOfTxt.forEach((ele) => (ele.value = ""));
                alert("Kode barang tidak ditemukan.");
            }

            formWait(false);
        }
    );
}

function enableForm(bool_state) {
    btnKoreksi.disabled = bool_state;
    btnProses.disabled = !bool_state;
    btnBatal.disabled = !bool_state;
    listOfTxt.forEach((ele) => (ele.disabled = !bool_state));
    numTotal.disabled = true;
}

function formWait(bool_state) {
    if (bool_state) {
        document.body.style.cursor = "wait";
        btnKoreksi.style.cursor = "wait";
        btnKeluar.style.cursor = "wait";
        btnProses.style.cursor = "wait";
        btnBatal.style.cursor = "wait";
        listOfTxt.forEach((ele) => (ele.style.cursor = "wait"));
    } else {
        document.body.style.cursor = "default";
        btnKoreksi.style.cursor = "default";
        btnKeluar.style.cursor = "default";
        btnProses.style.cursor = "default";
        btnBatal.style.cursor = "default";
        listOfTxt.forEach((ele) => (ele.style.cursor = "default"));
    }
}
//#endregion

function init() {
    enableForm(false);
    btnKoreksi.focus();
}

$(document).ready(() => init());
