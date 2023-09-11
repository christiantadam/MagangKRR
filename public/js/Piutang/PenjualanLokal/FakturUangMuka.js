let tanggal = document.getElementById('tanggal');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let noPenagihanSelect = document.getElementById('noPenagihanSelect');
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');
let alamat = document.getElementById('alamat');
let jenisCustomer = document.getElementById('jenisCustomer');
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
let dokumenSelect = document.getElementById('dokumenSelect');
let idJenisDokumen = document.getElementById('idJenisDokumen');
let penagihanPajak = document.getElementById('penagihanPajak');

let uangMasuk = document.getElementById('uangMasuk');
let nilaiSblmPPN = document.getElementById('nilaiSblmPPN');
let Ppn = document.getElementById('Ppn');
let nilaiPpn = document.getElementById('nilaiPpn');
let total = document.getElementById('total');
let terbilang = document.getElementById('terbilang');

let btnIsi = document.getElementById('btnIsi');
let btnSimpan = document.getElementById('btnSimpan');
let btnKoreksi = document.getElementById('btnKoreksi');
let btnBatal = document.getElementById('btnBatal');
let btnHapus = document.getElementById('btnHapus');
let formkoreksi = document.getElementById('formkoreksi');

let namacust;

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
    jenisCustomer.removeAttribute("readonly");
    alamat.removeAttribute("readonly");
    nomorSPSelect.removeAttribute("readonly");
    nomorPO.removeAttribute("readonly");
    namaMataUang.removeAttribute("readonly");
    idMataUang.removeAttribute("readonly");
    nilaiKurs.removeAttribute("readonly");
    syaratPembayaran.removeAttribute("readonly");
    penagihanPajak.removeAttribute("readonly");
    userPenagihSelect.removeAttribute("readonly");
    jenisPajakSelect.removeAttribute("readonly");
    Ppn.removeAttribute("readonly");
    dokumenSelect.removeAttribute("readonly");

    uangMasuk.removeAttribute("readonly");
    total.removeAttribute("readonly");
    nilaiSblmPPN.removeAttribute("readonly");
    nilaiPpn.removeAttribute("readonly");
    terbilang.removeAttribute("readonly");
});

btnSimpan.addEventListener('click', function(event) {
    event.preventDefault();
    formkoreksi.submit();
})

btnKoreksi.addEventListener("click", function (event) {
    event.preventDefault();
    btnIsi.style.display = "none";
    btnSimpan.style.display = "block";
    btnKoreksi.style.display = "none";
    btnBatal.style.display = "block";

    tanggal.removeAttribute("readonly");
    namaCustomerSelect.removeAttribute("readonly");
    noPenagihanSelect.removeAttribute("readonly");
    idCustomer.removeAttribute("readonly");
    jenisCustomer.removeAttribute("readonly");
    alamat.removeAttribute("readonly");
    nomorSPSelect.removeAttribute("readonly");
    nomorPO.removeAttribute("readonly");
    namaMataUang.removeAttribute("readonly");
    idMataUang.removeAttribute("readonly");
    nilaiKurs.removeAttribute("readonly");
    syaratPembayaran.removeAttribute("readonly");
    penagihanPajak.removeAttribute("readonly");
    userPenagihSelect.removeAttribute("readonly");
    jenisPajakSelect.removeAttribute("readonly");
    Ppn.removeAttribute("readonly");
    dokumenSelect.removeAttribute("readonly");

    uangMasuk.removeAttribute("readonly");
    total.removeAttribute("readonly");
    nilaiSblmPPN.removeAttribute("readonly");
    nilaiPpn.removeAttribute("readonly");
    terbilang.removeAttribute("readonly");
});

btnBatal.addEventListener('click', function(event) {
    tanggal.value = "";
    namaCustomerSelect.selectedIndex = 0;
    idCustomer.value = "";
    jenisCustomer.value = "";
    noPenagihanSelect.selectedIndex = 0;
    jenisCustomer.value = "";
    alamat.value = "";
    nomorSPSelect.selectedIndex = 0;
    nomorPO.value = "";
    noSP.value = "";
    namaMataUang.value = "";
    idMataUang.value = "";
    nilaiKurs.value = "";
    penagihanPajak.value = "";
    userPenagihSelect.selectedIndex = 0;
    idUserPenagih.value = "";
    jenisPajakSelect.selectedIndex = 0;
    idJenisPajak.value = "";
    Ppn.value = "";
    dokumenSelect.selectedIndex = 0;
    idJenisDokumen.value = "";

    uangMasuk.value = "";
    total.value = "";
    nilaiSblmPPN.value = "";
    nilaiPpn.value = "";
    terbilang.value = "";
})

btnHapus.addEventListener("click", function(event) {
    event.preventDefault();
    noPenagihanSelect.focus();
    namaCustomerSelect.removeAttribute("readonly");
    noPenagihanSelect.removeAttribute("readonly");
})

fetch("/detailcustomer/")
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
            option.value = entry.IdCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IdCust + "|" + entry.NamaCust; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
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
    }

    fetch("/getNoPenagihan/" + idCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);

        noPenagihanSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih No Penagihan";
        noPenagihanSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IdCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Id_Penagihan + "|" + entry.Tgl_Penagihan; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            noPenagihanSelect.appendChild(option);
        });
    });

    fetch("/getJenisCustomer/" + idJenisCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisCustomer.value = options[0].NamaJnsCust;

    });

    if (jenisCustomer.value == "PNX") {
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
    });

    let kode;
    if (idJenisCustomer.value === 'NPX') {
        kode = 3;
    } else {
        kode = 2;
    }
    // console.log(idJenisCustomer.value);
    fetch("/getDokumen/" + kode)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        dokumenSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Dokumen";
        dokumenSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Dokumen; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Id_Jenis_Dokumen + "|" + entry.Nama_Dokumen; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            dokumenSelect.appendChild(option);
    });

    dokumenSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = dokumenSelect.options[dokumenSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            const bagiansatu = selectedValue.split(/[-|]/);
            const jenis = bagiansatu[0];
            idJenisDokumen.value  = jenis;
        }
        uangMasuk.focus();
    });
});
});

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
userPenagihSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = userPenagihSelect.options[userPenagihSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
        const bagiansatu = selectedValue.split(/[-|]/);
        const jenis = bagiansatu[0];
        idUserPenagih.value  = jenis;
    }
    jenisPajakSelect.focus();
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
jenisPajakSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = jenisPajakSelect.options[jenisPajakSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
        const bagiansatu = selectedValue.split(/[-|]/);
        const jenis = bagiansatu[1];
        idJenisPajak.value  = jenis;
    }
});

uangMasuk.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();

        if (idJenisCustomer.value == "NPX") {
            nilaiSblmPPN.value = uangMasuk.value;
            if (Ppn.value == 11) {
                nilaiPpn.value = uangMasuk.value * 0.11;
            } else {
                nilaiPpn.value = uangMasuk.value * 0.1;
            }
            total.value = uangMasuk.value;
        }
    } else {
        if(Ppn.value == 11) {
            nilaiSblmPPN.value = Math.round(uangMasuk.value / 1.11 * 100) / 100;
            nilaiPpn.value =    nilaiSblmPPN.value * 0.11;
        } else {
            nilaiSblmPPN.value = Math.round(uangMasuk.value / 1.11 * 100) / 100;
            nilaiPpn.value =    nilaiSblmPPN.value * 0.1;
        }
        total.value = Math.round(nilaiSblmPPN.value + nilaiPpn.value);
    }

    if (idMataUang.value == 1) {
        terbilang.value = F_Rupiah(total.value);
    } else {
        if (nilaiKurs.value <= 0) {
            alert("ISI DULU NILAI KURSNYA");
            nilaiKurs.focus();
        }
        terbilang.value = F_Dollar(total.value);
    }
});

function F_Rupiah() {
    var formatted = parseFloat(total.value).toFixed(0).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    return formatted;
}
function F_Dollar() {
    var formatted = parseFloat(total.value).toFixed(0);
    return formatted;
}
