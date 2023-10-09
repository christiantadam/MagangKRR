let NoOrder = document.getElementById("NoOrder");
let divisi = document.getElementById("divisi");
let Kode_Barang = document.getElementById("Kode_Barang");
let NamaBarang = document.getElementById("NamaBarang");
let NoGambarRev = document.getElementById("NoGambarRev");
let OdSts = document.getElementById("OdSts");
let KetOrder = document.getElementById("KetOrder");
let Mesin = document.getElementById('Mesin');
let Pengorder = document.getElementById('Pengorder');
//#region NoOrder on enter

NoOrder.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        let NoOrder6digit;
        NoOrder6digit = document.getElementById("NoOrder");
        if (NoOrder6digit.value.length < 6) {
            NoOrder6digit.value = NoOrder.value.padStart(6, "0");
        }
        NoOrder.value = NoOrder6digit.value;
        loaddata();
        // loadnamabagian(NoOrder.value);
        // btnbatal.disabled = false;
        // NamaBagian.focus();
    }
});
//#endregion

//#region load data

function loaddata() {
    fetch("/LoadDataEditPerOrderKonstruksi/" + NoOrder.value)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                divisi.value = datas[0].NamaDivisi;
                Kode_Barang.value = datas[0].Kd_Brg;
                NamaBarang.value = datas[0].Nama_Brg;
                NoGambarRev.value = datas[0].No_Gbr_Rev;
                OdSts.textContent = datas[0].OdSts;
                KetOrder.value = datas[0].Ket_Order;
                Mesin.value = datas[0].Mesin;
                Pengorder.value = datas[0].Pengorder;
            }
            else{
                alert("Nomer order gambar: " + NoOrder.value + ", tidak ada, blm diACC, ditolak, atau sudah finish.");
                return;
            }
        });
}

//#endregion
