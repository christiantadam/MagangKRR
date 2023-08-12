
//form
let formGambar = document.getElementById("formUpdateGambar");
let methodgambar = document.getElementById("Methodform");

//isi form
let nama_barang = document.getElementById("nama_barang");
let kd_barang = document.getElementById("kd_barang");
let no_gambar = document.getElementById("no_gambar");

//button
let batal = document.getElementById("batal");
let proses = document.getElementById("proses");


kd_barang.addEventListener("change", function () {
    if (this.value !== "") {
        this.classList.add("input-error");
        this.setCustomValidity("Tekan Enter!");
        this.reportValidity();
    }
});

kd_barang.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        //console.log(kd_barang.value);
        fetch("/getdata/" + kd_barang.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                // console.log(kd_barang.value);
                nama_barang.value = options[0].NAMA_BRG;
                no_gambar.value = options[0].NO_GAMBAR;
                nama_barang.readOnly = true;
                kd_barang.readOnly = true;
                batal.disabled = false;
                proses.disabled = false;

            });
    }
});

function klikproses(){
    methodgambar.value = "PUT";
    formGambar.action = "/UpdateNoGambar/" + kd_barang.value;
    formGambar.submit();

}
function klikbatal(){
    nama_barang.value = "";
    kd_barang.value = "";
    no_gambar.value = "";
    nama_barang.readOnly = false;
    kd_barang.readOnly = false;
    batal.disabled = true;
    proses.disabled = true;

}


