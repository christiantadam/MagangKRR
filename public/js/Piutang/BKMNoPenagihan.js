let idBKM = document.getElementById('idBKM');
let tanggalInput = document.getElementById('tanggalInput');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let mataUangSelect = document.getElementById('mataUangSelect');
let idMataUang = document.getElementById('idMataUang');
let namaBankSelect = document.getElementById('namaBankSelect');
let idBank = document.getElementById('idBank');
let jenisPembayaranSelect = document.getElementById('jenisPembayaranSelect');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let kursRupiah = document.getElementById('kursRupiah');
let nilaiPelunasan = document.getElementById('nilaiPelunasan');
let uraian = document.getElementById('uraian');
let jenisBank = document.getElementById('jenisBank');
let btnTambahData = document.getElementById('btnTambahData');
let idCustomer = document.getElementById('idCustomer');
let jenisCustomer = document.getElementById('jenis');

const tanggal = new Date();
const formattedDate = tanggal.toISOString().substring(0, 10);
tanggalInput.value = formattedDate;

namaCustomerSelect.addEventListener('click', function (event) {
    event.preventDefault();
    const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];

    const selectedText = selectedOption.textContent; // Atau selectedOption.innerText
    const bagiansatu = selectedText.split(/[-|]/);
    const idcust = bagiansatu[0];
    const jnscust = bagiansatu[1];
    idCustomer.value = idcust;
    jenisCustomer.value = jnscust;
});

// kursRupiahInput.addEventListener('input', function() {
//     const kursValue = parseFloat(kursRupiahInput.value);

//     if (!isNaN(kursValue)) {
//         kursRupiahInput.value = kursValue.toFixed(2);
//     }
// });

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
            option.value = entry.IdCust;
            option.innerText = entry.IdCust + "|" + entry.NamaCust;
            namaCustomerSelect.appendChild(option);
        });
    })

mataUangSelect.addEventListener('click', function (event) {
    event.preventDefault();
});

fetch("/detailmatauang/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        mataUangSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih MataUang";
        mataUangSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_MataUang;
            option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
            mataUangSelect.appendChild(option);
        });
    })

mataUangSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangSelect.options[mataUangSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idMataUang');
        const selectedValue = selectedOption.value;
        const idKode = selectedValue.split(" | ")[0];
        idKodeInput.value = idKode;
    }
});


kursRupiah.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        if (parseFloat(kursRupiah.value) > 0) {
            // Nilai kurs Rupiah lebih besar dari 0, tidak perlu alert
        } else {
            alert('Nilai kurs Rupiah harus lebih besar dari 0!');
        }
    }
});

nilaiPelunasan.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let jumlah = parseFloat(nilaiPelunasan.value).toFixed(2);
        let kurs = parseFloat(kursRupiah.value);

        if (jumlah === '0.00') {
            alert('Jumlah Uang TIDAK BOLEH = 0 !');
            nilaiPelunasan.focus();
        } else {
            if (kurs === 0) {
                nilaiPelunasan.value = formatNumberWithCommas(parseFloat(nilaiPelunasan.value).toFixed(2));
            } else {
                let jum = parseFloat(jumlah) * kurs;
                nilaiPelunasan.value = jum.toFixed(2);
            }
        }
    }
});

fetch("/jenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Jenis Pembayaran";
        jenisPembayaranSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranSelect.appendChild(option);
        });
    });

jenisPembayaranSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranSelect.options[jenisPembayaranSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idJenisPembayaran');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split(" | ")[0];
        idJenisInput.value = idJenis;
    }
});

fetch("/detailbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Bank";
        namaBankSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank;
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank;
            namaBankSelect.appendChild(option);
        });

    });

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split(" | ")[0];
        idBank.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBank.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBank.value = options[0].jenis;
                console.log(options);
            });
    }
});

fetch("/detailkodeperkiraan/" + 1)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanSelect.appendChild(option);
        });
    });

kodePerkiraanSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = kodePerkiraanSelect.options[kodePerkiraanSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idKodePerkiraan');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split(" | ")[0];
        idJenisInput.value = idJenis;
    }
});

uraian.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        if (namaCustomerSelect.value !== '' && parseFloat(nilaiPelunasan.value) !== 0 &&
            jenisPembayaranSelect.value !== '' && namaBankSelect.value !== '' &&
            idMataUang.value !== '' && uraian.value !== '' && mataUangSelect.value !== '') {
            btnTambahData.disabled = false;
        } else {
            alert('Isi semua data');
        }

        if (IdBKM.value === "") {
            if (idBank.value === "KRR1" || idBank.value === "KRR2") {
                if (idBank.value === "KRR2") idBank = "KI";
                if (idBank.value === "KRR1") idBank = "KKM";
            } else {
                idBank = idBank.value;
            }
        }
    }
});

