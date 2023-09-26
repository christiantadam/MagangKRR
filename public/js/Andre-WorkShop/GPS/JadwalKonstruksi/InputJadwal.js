let NoOrder = document.getElementById("NoOrder");
let OdSts = document.getElementById("OdSts");
let divisi = document.getElementById("divisi");
let Kode_Barang = document.getElementById("Kode_Barang");
let NoGambarRev = document.getElementById("NoGambarRev");
let NamaBarang = document.getElementById("NamaBarang");
let Mesin = document.getElementById("Mesin");
let Pengorder = document.getElementById("Pengorder");
let KetOrder = document.getElementById("KetOrder");
let estStart = document.getElementById("estStart");
let estFinish = document.getElementById("estFinish");
let NamaBagian = document.getElementById("NamaBagian");
let WorkStation = document.getElementById("WorkStation");
let tglStart = document.getElementById("tglStart");
let hariKe = document.getElementById("hariKe");
let jam = document.getElementById("jam");
let menit = document.getElementById("menit");
let btnbatal = document.getElementById('batal');
const currentDate = new Date();
// Format the current date to be in 'YYYY-MM-DD' format for setting the input value
const formattedCurrentDate = currentDate.toISOString().slice(0, 10);
tglStart.value = formattedCurrentDate;

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
        loadnamabagian(NoOrder.value);
        btnbatal.disabled = false;
    }
});

//#endregion

//#region Load Data

function loaddata(NomorOrder) {
    fetch("/LoadDataInputJadwal/" + NomorOrder)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length == 0) {
                alert(
                    "Nomer order gambar: " +
                        NomorOrder +
                        ", tidak ada, blm di-ACC, ditolak, atau sudah finish."
                );
                NoOrder.focus();
                return;
            } else {
                OdSts.textContent = datas[0].OdSts;
                divisi.value = datas[0].NamaDivisi;
                Kode_Barang.value = datas[0].Kd_Brg;
                NoGambarRev.value = datas[0].No_Gbr_Rev;
                NamaBarang.value = datas[0].Nama_Brg;
                Mesin.value = datas[0].Mesin;
                Pengorder.value = datas[0].Pengorder;
                KetOrder.value = datas[0].Ket_Order;
                NamaBagian.disabled = false;
                WorkStation.disabled = false;
                tglStart.disabled = false;
                hariKe.disabled = false;
                jam.disabled = false;
                menit.disabled = false;
                // NamaBagian.focus();
                fetch("/cekdataestimasiInputJadwal/" + NomorOrder)
                    .then((response) => response.json())
                    .then((datas) => {
                        console.log(datas);
                        if (datas[0].ada == 0) {
                            alert(
                                "No. Order " +
                                    NomorOrder +
                                    ", belum ada estimasi jadwalnya. Hubungi PPIC."
                            );
                            return;
                        } else {
                            estStart.textContent = ubahtanggal(datas[0].TglS);
                            estFinish.textContent = ubahtanggal(datas[0].TglF);
                        }
                    });
            }
        });
}

//#endregion

//#region ubah tgl

function ubahtanggal(inputTanggal) {
    var tanggal = new Date(inputTanggal);
    var dd = String(tanggal.getDate()).padStart(2, "0");
    var mm = String(tanggal.getMonth() + 1).padStart(2, "0"); // Perhatikan bahwa bulan dimulai dari 0 (Januari) hingga 11 (Desember)
    var yyyy = tanggal.getFullYear();

    return dd + "-" + mm + "-" + yyyy;
}

//#endregion

//#region LOAD NAMA BAGIAN

function loadnamabagian(NomorOrder) {
    fetch("/GetdatabagianInputJadwal/" + NomorOrder)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            NamaBagian.innerHTML = "";
            //
            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Pilih Bagian";
            NamaBagian.appendChild(defaultOption);
            //
            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.IdBagian;
                option.innerText = entry.NamaBagian + "--" + entry.IdBagian;
                NamaBagian.appendChild(option);
            });
        });
}

//#endregion


