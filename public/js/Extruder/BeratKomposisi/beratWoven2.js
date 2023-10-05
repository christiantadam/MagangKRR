//#region Variables
const txtWoven = document.getElementById("kode_woven");
const txtType = document.getElementById("berat_type");
const numStandar1 = document.getElementById("berat_standar1");
const numStandar2 = document.getElementById("berat_standar2");
const numKarung = document.getElementById("berat_karung");
const numInner = document.getElementById("berat_inner");
const numLami = document.getElementById("berat_lami");
const numLain = document.getElementById("berat_lain");

const hidKarung = document.getElementById("hid_karung");
const hidInner = document.getElementById("hid_inner");
const hidLami = document.getElementById("hid_lami");
const hidLain = document.getElementById("hid_lain");

const btnKoreksi = document.getElementById("btn_koreksi");
const btnBatal = document.getElementById("btn_batal");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const listOfTxt = document.querySelectorAll("input, textarea");
//#endregion

//#region Events
//#endregion

//#region Functions
function enableForm(bool_state) {
    btnKoreksi.disabled = bool_state;
    btnProses.disabled = !bool_state;
    btnBatal.disabled = !bool_state;
    listOfTxt.forEach((ele) => (ele.disabled = !bool_state));
}

function loadDataFetch(s_kode_brg) {
    fetchSelect(
        "/beratStandar/SP_7775_PBL_SELECT_WOVEN_1/" + s_kode_brg,
        (data) => {
            if (data.length > 0) {
                txtWoven.value = s_kode_brg;
                txtType.value = data[0].NAMA_BRG;
                numStandar2.value = data[0].BERAT_TOTAL2;
                numKarung.value = data[0].BERAT_KARUNG2;
                numInner.value = data[0].BERAT_INNER2;
                numLami.value = data[0].BERAT_LAMI2;
                numLain.value = data[0].BERAT_LAIN2;
                numStandar1.value = data[0].BERAT_TOTAL;
                hidKarung.value = data[0].BERAT_KARUNG;
                hidInner.value = data[0].BERAT_INNER;
                hidLami.value = data[0].BERAT_LAMI;
                hidLain.value = data[0].BERAT_LAIN;

                if (
                    numStandar1.value == "" ||
                    parseFloat(numStandar1.value) == 0
                ) {
                    // LAST
                }
            } else {
                alert("Kode barang tidak ditemukan.");
                listOfTxt.forEach((ele) => (ele.value = ""));
            }
        }
    );
}
//#endregion

function init() {}

$(document).ready(() => init());
