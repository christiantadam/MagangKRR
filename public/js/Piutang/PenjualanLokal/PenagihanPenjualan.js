let btnIsi = document.getElementById('btnIsi');
let btnSimpan = document.getElementById('btnSimpan');
let btnBatal = document.getElementById('btnBatal');
let btnKoreksi = document.getElementById('btnKoreksi');

let tanggal = document.getElementById('tanggal');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let noPenagihanSelect = document.getElementById('noPenagihanSelect');
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');
let alamat = document.getElementById('alamat');
let jnsCustomer = document.getElementById('jnsCustomer');
let nomorSPSelect = document.getElementById('nomorSPSelect');
let noSP = document.getElementById('noSP');
let namaMataUang = document.getElementById('namaMataUang');
let idMataUang = document.getElementById('idMataUang');
let nomorPO  = document.getElementById('nomorPO');
let syaratPembayaran = document.getElementById('syaratPembayaran');
let nilaiKurs = document.getElementById('nilaiKurs');
let userPenagihSelect = document.getElementById('userPenagihSelect');
let idUserPenagih = document.getElementById('idUserPenagih');
let jenisPajakSelect = document.getElementById('jenisPajakSelect');
let idJenisPajak = document.getElementById('idJenisPajak');

let nilaiPenagihan = document.getElementById('nilaiPenagihan');
let nilaiUangMuka = document.getElementById('nilaiUangMuka');

let selectcust = 0;
let namacust;
var addmode=false;
const tanggalPenagihan = new Date();
const formattedDate2 = tanggalPenagihan.toISOString().substring(0, 10);
tanggal.value = formattedDate2;

const tanggalInput = new Date();
const formattedDate = tanggalInput.toISOString().substring(0, 10);
penagihanPajak.value = formattedDate;

btnIsi.addEventListener("click", function (event) {
    event.preventDefault();
    btnIsi.style.display = "none";
    btnSimpan.style.display = "block";
    btnKoreksi.style.display = "none";
    btnBatal.style.display = "block";

    tanggal.removeAttribute("readonly");
    namaCustomerSelect.removeAttribute("readonly");
    idCustomer.removeAttribute("readonly");
    jnsCustomer.removeAttribute("readonly");
    alamat.removeAttribute("readonly");
    nomorSPSelect.removeAttribute("readonly");
    nomorPO.removeAttribute("readonly");
    namaMataUang.removeAttribute("readonly");
    idMataUang.removeAttribute("readonly");
    nilaiKurs.removeAttribute("readonly");
    syaratPembayaran.removeAttribute("readonly");
    penagihanPajak.removeAttribute("readonly");
    userPenagihSelect.removeAttribute("readonly");
    Ppn.removeAttribute("readonly");

    iniKlikIsi();
});


function iniKlikIsi() {
    fetch("/getCustomerr/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaCustomerSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Cust";
        namaCustomerSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IDCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IDCust + "|" + entry.NAMACUST; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            namaCustomerSelect.appendChild(option);
        });
    });

    namaCustomerSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            const bagiansatu = selectedValue.split(/[-|]/);
            const jenis = bagiansatu[0];
            const idcust = bagiansatu[1];
            namacust = bagiansatu[2];
            idCustomer.value = idcust;
            idJenisCustomer.value  = jenis;

            lihatCustomer();
        }
        nomorSPSelect.focus();
    });
}

function iniKlikKoreksi() {
    fetch("/getCustomer/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaCustomerSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Cust";
        namaCustomerSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IDCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IDCust + "|" + entry.NAMACUST; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            namaCustomerSelect.appendChild(option);
        });
    });

    namaCustomerSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            const bagiansatu = selectedValue.split(/[-|]/);
            const jenis = bagiansatu[0];
            const idcust = bagiansatu[1];
            namacust = bagiansatu[2];
            idCustomer.value = idcust;
            idJenisCustomer.value  = jenis;

            lihatCustomer();
        }
    });
};

fetch("/getUserPenagih/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        userPenagihSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Cust";
        userPenagihSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IdCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IdUser + "|" + entry.Nama; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            userPenagihSelect.appendChild(option);
        });
});

fetch("/getJenisPajak/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPajakSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Jns Pajak";
        jenisPajakSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IdCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Nama_Jns_PPN + "|" + entry.Jns_PPN; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            jenisPajakSelect.appendChild(option);

            // dokumenSelect.focus();
        });
});
// jenisPajakSelect.addEventListener("change", function (event) {
//     event.preventDefault();
//     const selectedOption = jenisPajakSelect.options[jenisPajakSelect.selectedIndex];
//     if (selectedOption) {
//         const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
//         const bagiansatu = selectedValue.split(/[-|]/);
//         const jenis = bagiansatu[1];
//         idJenisPajak.value = jenis;
//     }

// });

fetch("/getNoPenagihanUM/" + noSP.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        noPenagihanSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Jns Pajak";
        noPenagihanSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Penagihan; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Id_Penagihan + "|" + entry.Nilai_blm_Pajak; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            noPenagihanSelect.appendChild(option);
        });
});

function lihatCustomer() {
    if (idJenisCustomer.value === 'NPX') {
        jenisPajakSelect.setAttribute("readonly", true);
    } else {
        jenisPajakSelect.removeAttribute("readonly");
    }

    fetch("/getJenisCustomer/" + idJenisCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jnsCustomer.value = options[0].NamaJnsCust;
    });

    if (jnsCustomer.value == "PNX") {
        fetch("/getAlamatCust/" + idCustomer.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            alamat.value = options[0].Alamat + " " + options[0].Kota;

        });
    } else {
        fetch("/getAlamatCust/" + idCustomer.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            alamat.value = options[0].AlamatNPWP;

        });
    }

    fetch("/getNoSP/" + idCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        nomorSPSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih No. SP";
        nomorSPSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IDSuratPesanan; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IDSuratPesanan; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            nomorSPSelect.appendChild(option);
        });
    });

    nomorSPSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = nomorSPSelect.options[nomorSPSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            noSP.value  = selectedValue.toString();

            fetch("/getNomorPO/" + noSP.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);

                if (options[0].IDMataUang == "IDR") {
                    idMataUang.value = 1;
                } else if (options[0].IDMataUang == "USD") {
                    idMataUang.value = 2;
                }
                nomorPO.value = options[0].NO_PO;
                syaratPembayaran.value = options[0].SyaratBayar;
                namaMataUang.value = options[0].MataUang;

                if (idMataUang.value == 1) {
                    nilaiKurs.setAttribute("readonly", true);
                } else {
                    nilaiKurs.focus();
                    nilaiKurs.removeAttribute("readonly");
                }
            });
        }
    })
};

function saveData() {
    nilaiPenagihan.value = nilaiPenagihan.value - nilaiUangMuka.value;
    if (jnsCustomer.value == "PWX" || jnsCustomer.value == "PNX" || jnsCustomer.value == "PXX") {
        if (Ppn.value == 11) {
            nilaiPenagihan.value = Math.round(nilaiPenagihan.value * 0.11);
        } else {
            nilaiPenagihan.value = Math.round(nilaiPenagihan.value * 0.1);
        }
    }

    if (idMataUang.value == 1) {
        terbilang.value = F_Rupiah(nilaiPenagihan.value);
    } else {
        if (nilaiKurs.value <= 0) {
            alert("ISI DULU NILAI KURSNYA");
            if ((jnsCustomer.value == "PWX" || jnsCustomer.value == "PNX" || jnsCustomer.value == "PXX") && (idJenisPajak.value == 3 || idJenisPajak.value == 4)) {
                if (Ppn.value == 1) {
                    nilaiPenagihan.value = nilaiPenagihan.value / 0.11;
                }else {
                    nilaiPenagihan.value = nilaiPenagihan.value / 0.1;
                }
            }
            nilaiKurs.focus();
        }
        terbilang.value = F_Dollar(nilaiPenagihan.value);
    }

    if ((jnsCustomer.value == "PWX" || jnsCustomer.value == "PNX" || jnsCustomer.value == "PXX") && (idJenisPajak.value == 1 || idJenisPajak.value == 2 || idJenisPajak.value == 5)) {
        if (Ppn.value == 11) {
            nilaiPenagihan.value = nilaiPenagihan.value / 0.11;
        } else {
            nilaiPenagihan.value = nilaiPenagihan.value / 0.1;
        }
    }
}

function F_Rupiah() {
    var formatted = parseFloat(total.value).toFixed(0).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    return formatted;
}
function F_Dollar() {
    var formatted = parseFloat(total.value).toFixed(0);
    return formatted;
}






