//#region Variables
const txtKodeBarang = document.getElementById("kode_barang");
const txtType = document.getElementById("txt_type");
const listOfInput = document.querySelectorAll("input, textarea");
const listOfPersen = document.querySelectorAll("span .lbl_persen");

const numBerat = document.getElementById("berat_standar");
const numPpGram = document.getElementById("pp_gram");
const numPpPersen = document.getElementById("pp_persen");
const numPeGram = document.getElementById("pe_gram");
const numPePersen = document.getElementById("pe_persen");
const numCaco3Gram = document.getElementById("caco3_gram");
const numCac03Persen = document.getElementById("caco3_persen");
const numMasterGram = document.getElementById("masterbatch_gram");
const numMasterPersen = document.getElementById("masterbatch_persen");
const numUvGram = document.getElementById("UV_gram");
const numUvPersen = document.getElementById("UV_persen");
const numAntiGram = document.getElementById("anti_static_gram");
const numAntiPersen = document.getElementById("anti_static_persen");
const numKertasGram = document.getElementById("kertas_gram");
const numKertasPersen = document.getElementById("kertas_persen");
const numLdpeGram = document.getElementById("ldpe_gram");
const numLdpePersen = document.getElementById("ldpe_persen");
const numLldpeGram = document.getElementById("lldpe_gram");
const numLldpePersen = document.getElementById("lldpe_persen");
const numHdpeGram = document.getElementById("hdpe_gram");
const numHdpePersen = document.getElementById("hdpe_persen");
const numTotal = document.getElementById("total_gram");
const numJumlah = document.getElementById("total_persen");

const btnKoreksi = document.getElementById("btn_koreksi");
const btnBatal = document.getElementById("btn_batal");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
//#endregion

//#region Events
btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/BeratKomposisi";
});
//#endregion

//#region Functions
function clearForm() {
    listOfInput.forEach((input) => (input.value = ""));
    listOfPersen.forEach((span) => (span.textContent = "%"));
}
//#endregion

function init() {}

$(document).ready(() => init());
