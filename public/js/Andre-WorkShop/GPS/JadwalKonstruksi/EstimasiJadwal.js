var proses;
let Isi = document.getElementById("Isi");
let NoOrder = document.getElementById("NoOrder");
let FormEstimasiJadwal = document.getElementById("FormEstimasiJadwal");
let divisi = document.getElementById('divisi');
let Kode_Barang = document.getElementById('Kode_Barang');
let NamaBarang = document.getElementById('NamaBarang');
let NoGambarRev = document.getElementById('NoGambarRev');
let OdSts = document.getElementById('OdSts');
let KetOrder = document.getElementById('KetOrder');
let Mesin = document.getElementById('Mesin');
let Pengorder = document.getElementById('Pengorder');
let TglStart = document.getElementById('TglStart');
let TglFinish = document.getElementById('TglFinish');
let btnProses = document.getElementById('Proses');


//#region btn isi on click
function isi() {
    proses = 1;
}
//#endregion

//#region tgl start dan tgl finish on enter

TglStart.addEventListener('keypress', function(event){
    if (event.key = "Enter") {
        event.preventDefault();
        TglFinish.focus();
    }
});

TglFinish.addEventListener('keypress', function(event){
    if (event.key = "Enter") {
        event.preventDefault();
        if (TglFinish.value < TglStart.value) {
            alert("Tidak boleh.. Tgl finish < tgl start.");
            return;
        }
        else{
            btnProses.disable = false;
            btnProses.focus();
        }
    }
});
//#endregion

//#region no order on enter

NoOrder.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        let NoOrder6digit;
        NoOrder6digit = document.getElementById("NoOrder");
        if (NoOrder6digit.value.length < 6) {
            NoOrder6digit.value = NoOrder.value.padStart(6, "0");
        }
        NoOrder.value = NoOrder6digit.value;
        loaddata(NoOrder.value);
    }
});

//#endregion

//#region Load Data

function loaddata(NomorOrder) {
    fetch("/LoadDataEstimasiJadwal/" + NomorOrder)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length == 0) {
                alert("Nomer order gambar: " + NomorOrder + ", tidak ada, blm di-ACC, ditolak, atau sudah finish.")
                NoOrder.focus();
                return;
            }
            else{
                divisi.value = datas[0].NamaDivisi;
                Kode_Barang.value = datas[0].Kd_Brg;
                NamaBarang.value = datas[0].Nama_Brg;
                NoGambarRev.value = datas[0].No_Gbr_Rev;
                OdSts.textContent = datas[0].OdSts;
                KetOrder.value = datas[0].Ket_Order;
                Mesin.value = datas[0].Mesin;
                Pengorder.value = datas[0].Pengorder;
                TglStart.focus();
            }
        });
}

//#endregion

//#region koreksi

function koreksiklik(){
    proses = 2;
}

//#endregion

//#region Proses

function Prosesdiklik() {
    // this.preventDefault();
    console.log(proses);
    // console.log(NoOrder.value);
    if (proses == 1) {
        fetch("/CekEstimasiKonstruksi/" + NoOrder.value)
            .then((response) => response.json())
            .then((datas) => {
                console.log(datas);
                if (datas[0].ada > 0) {
                    alert("No. Order " + NoOrder.value + ", sudah ada.");
                    return;
                } else {
                    FormEstimasiJadwal.submit();
                }
            });
    }
    if (proses == 2) {
        let tglmulai;
        let sampaitgl;
        let ada = false;
        fetch("/GetTanggalEstimasiJadwal/" + NoOrder.value)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            tglmulai = datas[0].TglMulai;
            sampaitgl = datas[0].SampaiTgl;
            ada = true;
        });
    }
}

//#endregion
