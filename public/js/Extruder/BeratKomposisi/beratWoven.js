//#region Variables
const txtWoven = document.getElementById("kode_woven");
const txtType = document.getElementById("txt_type");
const numKarung = document.getElementById("berat_karung");
const numInner = document.getElementById("berat_inner");
const numLami = document.getElementById("berat_lami");
const numLain = document.getElementById("berat_lain");
const numTotal = document.getElementById("berat_total");

const btnKoreksi = document.getElementById("btn_koreksi");
const btnBatal = document.getElementById("btn_batal");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const listOfTxt = document.querySelectorAll("input, textarea");
//#endregion

//#region Events
btnKoreksi.addEventListener("click", function () {
    listOfTxt.forEach((ele) => (ele.disabled = false));
    listOfTxt.forEach((ele) => (ele.value = ""));
    txtWoven.select();
    btnProses.disabled = false;
    btnBatal.disabled = false;
});

txtWoven.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (this.value.trim() != "") {
            let kode = "000000000";
            kode += this.value.trim();
            loadDataFetch(kode);
        } else this.focus();
    }
});

numKarung.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = "0";
        numInner.select();
    }
});

numInner.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = "0";
        numLami.select();
    }
});

numLami.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = "0";
        numLain.select();
    }
});

numLain.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        numTotal.value =
            parseFloat(numKarung.value) +
            parseFloat(numInner.value) +
            parseFloat(numLami.value) +
            parseFloat(numLain.value);
        numTotal.select();
    }
});

numTotal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        numTotal.value =
            parseFloat(numKarung.value) +
            parseFloat(numInner.value) +
            parseFloat(numLami.value) +
            parseFloat(numLain.value);
        btnProses.focus();
    }
});

btnProses.addEventListener("click", function () {
    // Me.Cursor = Cursors.WaitCursor
    numTotal.value =
        parseFloat(numKarung.value) +
        parseFloat(numInner.value) +
        parseFloat(numLami.value) +
        parseFloat(numLain.value);

    fetchSelect(
        "/beratWoven/SP_1273_PRG_CEK_KOMPOSISI_1/" + txtWoven.value,
        (data) => {
            if (data.length > 0) {
                if (data[0].Total > 0) {
                    // User_id <> "1001" And User_id <> "1703"
                    alert(
                        "Berat Standard tidak bisa dikoreksi, \nkarena sudah memiliki Komposisi Konversi."
                    );
                } else {
                    let ket =
                        numKarung.value +
                        "-" +
                        numInner.value +
                        "-" +
                        numLami.value +
                        "-" +
                        numLain.value +
                        "-" +
                        numTotal.value;

                    fetchStmt(
                        "/beratWoven/SP_7775_PBL_UPDATE_BERAT_WOVEN/" +
                            txtWoven.value +
                            "~" +
                            numKarung.value +
                            "~" +
                            ket +
                            "~" +
                            numKarung.value +
                            "~" +
                            numInner.value +
                            "~" +
                            numLami.value +
                            "~" +
                            numLain.value +
                            "~" +
                            numTotal.value +
                            "~4384",
                        () => {
                            alert("Berat karung berhasil dikoreksi.");
                            listOfTxt.forEach((ele) => (ele.disabled = true));
                            btnBatal.disabled = true;
                            btnProses.disabled = true;
                            btnKoreksi.disabled = false;
                            btnKoreksi.focus();
                        }
                    );
                }
            }
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
    fetchSelect(
        "/beratWoven/SP_7775_PBL_SELECT_WOVEN/" + s_kode_brg,
        (data) => {
            if (data.length > 0) {
                txtWoven.value = s_kode_brg;
                txtType.value = data[0].NAMA_BRG;
                numKarung.value = data[0].BERAT_KARUNG;
                numInner.value = data[0].BERAT_INNER;
                numLami.value = data[0].BERAT_LAMI;
                numLain.value = data[0].BERAT_LAIN;
                numTotal.value = data[0].BERAT_TOTAL;
            } else {
                listOfTxt.forEach((ele) => (ele.value = ""));
                alert("Kode barang tidak ditemukan.");
            }
        }
    );
}
//#endregion

function init() {}

$(document).ready(() => init());
