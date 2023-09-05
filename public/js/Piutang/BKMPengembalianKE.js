let tanggal = document.getElementById('tanggal');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let idCustomer = document.getElementById('idCustomer');
let mataUangBKMSelect = document.getElementById('mataUangBKMSelect');
let idMataUangBKM = document.getElementById('idMataUangBKM');
let namaBankBKMSelect = document.getElementById('namaBankBKMSelect');
let idBankBKM = document.getElementById('idBankBKM');
let jenisBankBKM = document.getElementById('jenisBankBKM');
let jenisPembayaranBKMSelect = document.getElementById('jenisPembayaranBKMSelect');
let idJenisPembayaranBKM = document.getElementById('idJenisPembayaranBKM');
let kodePerkiraanBKMSelect = document.getElementById('kodePerkiraanBKMSelect');
let idKodePerkiraanBKM = document.getElementById('idKodePerkiraanBKM');
let jumlahUangBKM = document.getElementById('jumlahUangBKM');
let kurs = document.getElementById('kurs');
let uraianBKM = document.getElementById('uraianBKM');
let idBKM = document.getElementById('idBKM');

let btnProses = document.getElementById('btnProses');
let btnBatal = document.getElementById('btnBatal');

let namaMU;
let namaBank;
let namaJenisPemb;

//CARD BKK
let idBKK = document.getElementById('idBKK');
let mataUangBKK = document.getElementById('mataUangBKK');
let jumlahUangBKK = document.getElementById('jumlahUangBKK');
let namaBankBKK = document.getElementById('namaBankBKK');
let jenisPembayaranBKK = document.getElementById('jenisPembayaranBKK');
let kodePerkiraanBKKSelect = document.getElementById('kodePerkiraanBKKSelect');
let idKodePerkiraanBKK = document.getElementById('idKodePerkiraanBKK');
let uraianBKK = document.getElementById('uraianBKK');

tanggal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();

        var tanggalInput = new Date(tanggal.valueAsNumber);
        var currentDate = new Date();
        if (tanggalInput > currentDate) {
            alert("Tanggal SALAH!");
        } else {
            namaCustomerSelect.focus();
        }
    }
});

//#region ambil list customer
fetch("/getcustomer/")
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
        const idcust = bagiansatu[1];
        namacust = bagiansatu[2];
        idCustomer.value = idcust;
    }
});
//#endregion

//#region untuk ambil list mata uang untuk BKM
fetch("/getmatauang/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        mataUangBKMSelect.innerHTML="";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Mata Uang";
        mataUangBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_MataUang;
            option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
            mataUangBKMSelect.appendChild(option);
        });
});

mataUangBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangBKMSelect.options[mataUangBKMSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idMataUangBKM');
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        namaMU = selectedValue.split("|")[1];
        idKodeInput.value = idMU;
        //console.log(namaMU);
    }
});
//#endregion

mataUangBKMSelect.addEventListener('click', function(event) {
    event.preventDefault();
    if (idMataUangBKM.value == '1') {
        kurs.setAttribute("readonly", true);
    } else {
        kurs.removeAttribute("readonly");
    }
})

//#region ambil list bank untuk bkm
fetch("/getbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Bank";
        namaBankBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank;
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank;
            namaBankBKMSelect.appendChild(option);
        });

});

namaBankBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankBKMSelect.options[namaBankBKMSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        namaBank = selectedValue.split("|")[1];
        idBankBKM.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBankBKM.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBankBKM.value = options[0].jenis;
                console.log(options);
            });
    }
});
//#endregion

//#region ambil list jenis pembayaran
fetch("/jenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Jenis Pembayaran";
        jenisPembayaranBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranBKMSelect.appendChild(option);
        });
    });

jenisPembayaranBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranBKMSelect.options[jenisPembayaranBKMSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idJenisPembayaranBKM');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        namaJenisPemb = selectedValue.split("|")[1];
        idJenisInput.value = idJenis;
    }
});
//#endregion

//#region untuk ambil list kode perkiraan
fetch("/detailkodeperkiraan/" + 1)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanBKMSelect.appendChild(option);
        });
    });

kodePerkiraanBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = kodePerkiraanBKMSelect.options[kodePerkiraanBKMSelect.selectedIndex];
    if (selectedOption) {

        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idKodePerkiraanBKM.value = idJenis;
    }
});
//#endregion

jumlahUangBKM.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        if (parseFloat(jumlahUangBKM.value) > 0) {
            kurs.focus();
        } else {
            alert('Jumlah Uang TIDAK BOLEH = 0 !');
        }
    }
});

kurs.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        if (parseFloat(kurs.value) > 0) {
            namaBankBKMSelect.focus();
        } else {
            alert('Kurs TIDAK BOLEH = 0 !');
        }
    }
});

uraianBKM.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'P';

        if (idBKM.value === "") {
            if (idBankBKM.value == "KRR1") {
                idBankBKM.value = "KI";
            }
            else if (idBankBKM.value == "KRR2") {
                idBankBKM.value = "KKM";
            }
        } else {
            idBankBKM = idBankBKM.value;
        }

        fetch("/getidbkmke/" + idBankBKM.value + "/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKM.value = options;

                // id_bkm.value = (idBKM.value).substring(4);
                // console.log(id_bkm.value);
            });

        mataUangBKK.value = namaMU;
        jumlahUangBKK.value = jumlahUangBKM.value;
        namaBankBKK.value = namaBank;
        idBankBKK.value = idBankBKM.value;
        jenisBankBKK.value = jenisBankBKM.value;
        jenisPembayaranBKK.value = namaJenisPemb;
        kodePerkiraanBKKSelect.focus();

            // tanggal.setAttribute("readonly", true);
            // idBKM.setAttribute("readonly", true);
            // mataUangBKMSelect.setAttribute("readonly", true);
            // kursRupiah.setAttribute("readonly", true);
            // mataUangBKMSelect.setAttribute("readonly", true);
            // jumlahUangBKM.setAttribute("readonly", true);
            // idBankBKM.setAttribute("readonly", true);
            // namaBankBKMSelect.setAttribute("readonly", true);
            // idKodePerkiraanBKM.setAttribute("readonly", true);
            // kodePerkiraanSelectBKM.setAttribute("readonly", true);
            // uraianBKM.setAttribute("readonly", true);

        //Untuk card bkk
        mataUangBKK.removeAttribute("readonly");
        jumlahUangBKK.removeAttribute("readonly");
        namaBankBKK.removeAttribute("readonly");
        jenisPembayaranBKK.removeAttribute("readonly");
        idKodePerkiraanBKK.removeAttribute("readonly");
        kodePerkiraanBKKSelect.removeAttribute("readonly");
        uraianBKK.removeAttribute("readonly");
    }
});

fetch("/detailkodeperkiraan/" + 1)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanBKKSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanBKKSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanBKKSelect.appendChild(option);
        });
});

kodePerkiraanBKKSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = kodePerkiraanBKKSelect.options[kodePerkiraanBKKSelect.selectedIndex];
    if (selectedOption) {

        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idKodePerkiraanBKK.value = idJenis;
    }
    uraianBKK.focus();
});

uraianBKK.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'R';

        if (idBKK.value === "") {
            if (idBankBKK.value == "KRR1") {
                idBankBKK.value = "KI";
            }
            else if (idBankBKK.value == "KRR2") {
                idBankBKK.value = "KKM";
            }
        } else {
            idBankBKK = idBankBKK.value;
        }

        fetch("/getidbkkke/" + idBankBKK.value + "/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKK.value = options;

                // id_bkm.value = (idBKM.value).substring(4);
                // console.log(id_bkm.value);
        });

        btnProses.focus();

            // tanggal.setAttribute("readonly", true);
            // idBKM.setAttribute("readonly", true);
            // mataUangBKMSelect.setAttribute("readonly", true);
            // kursRupiah.setAttribute("readonly", true);
            // mataUangBKMSelect.setAttribute("readonly", true);
            // jumlahUangBKM.setAttribute("readonly", true);
            // idBankBKM.setAttribute("readonly", true);
            // namaBankBKMSelect.setAttribute("readonly", true);
            // idKodePerkiraanBKM.setAttribute("readonly", true);
            // kodePerkiraanSelectBKM.setAttribute("readonly", true);
            // uraianBKM.setAttribute("readonly", true);

            // //Untuk card bkk
            // jumlahUangBKK.removeAttribute("readonly");
            // namaBankBKKSelect.removeAttribute("readonly");
            // idBankBKK.removeAttribute("readonly");
            // jenisBankBKK.removeAttribute("readonly");
            // idKodePerkiraanBKK.removeAttribute("readonly");
            // kodePerkiraanBKKSelect.removeAttribute("readonly");
            // uraianBKK.removeAttribute("readonly");
    }
});

btnBatal.addEventListener('click', function(event) {
    event.preventDefault();

    tanggal.value = "";
    idBKM.value = "";
    namaCustomerSelect.selectedIndex = 0;
    idCustomer.value = "";
    mataUangBKMSelect.selectedIndex = 0;
    idMataUangBKM.value = "";
    jumlahUangBKM.value = "";
    kurs.value = "";
    namaBankBKMSelect.selectedIndex = 0;
    idBankBKM.value = "";
    jenisBankBKM.value = "";
    jenisPembayaranBKMSelect.selectedIndex = 0;
    idJenisPembayaranBKM.value = "";
    kodePerkiraanBKMSelect.selectedIndex = 0;
    idKodePerkiraanBKM.value = "";
    uraianBKM.value = "";

    idBKK.value = "";
    mataUangBKK.value = "";
    jumlahUangBKK.value = "";
    namaBankBKK.value = "";
    idBankBKK.value = "";
    jenisBankBKK.value = "";
    jenisPembayaranBKK.value = "";
    kodePerkiraanBKKSelect.selectedIndex = 0;
    idKodePerkiraanBKK.value = "";
    uraianBKK.value = "";
})


