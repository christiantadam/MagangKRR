let tanggal = document.getElementById('tanggal');
let idBKK = document.getElementById('idBKK');
let mataUangSelect = document.getElementById('mataUangSelect');
let jumlahUang = document.getElementById('jumlahUang');
let namaBankSelect = document.getElementById('namaBankSelect');
let jenisPembayaranSelect  = document.getElementById('jenisPembayaranSelect');
let idKodePerkiraan = document.getElementById('idKodePerkiraan');
let kodePerkiraanSelect = document.getElementById('kodePerkiraanSelect');
let uraian = document.getElementById('uraian');
let idBankBKK = document.getElementById('idBankBKK');
let jenisBank = document.getElementById('jenisBank');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let btnTambahBiaya = document.getElementById('btnTambahBiaya');
let cardBKM = document.getElementById('cardBKM');
let kodePerkiraanTambahBiayaSelect = document.getElementById('kodePerkiraanTambahBiayaSelect');
let idKodePerkiraanTambahBiaya = document.getElementById('idKodePerkiraanTambahBiaya');
let btnProsesTambahBiaya = document.getElementById('btnProsesTambahBiaya');
let jumlahBiaya = document.getElementById('jumlahBiaya');
let keterangan = document.getElementById('keterangan');

//untuk card BKM
let tanggalBKM = document.getElementById('tanggalBKM');
let idBKM = document.getElementById('idBKM');
let mataUangBKMSelect = document.getElementById('mataUangBKMSelect');
let kurs = document.getElementById('kurs');
let jumlahUangBKM = document.getElementById('jumlahUangBKM');
let namaBankBKMSelect = document.getElementById('namaBankBKMSelect');
let jenisPembayaranBKMSelect = document.getElementById('jenisPembayaranBKMSelect');
let btnTambahBiayaBKM = document.getElementById('btnTambahBiayaBKM');
let kodePerkiraanBKMSelect = document.getElementById('kodePerkiraanBKMSelect');
let idKodePerkiraanBKMSelect = document.getElementById('idKodePerkiraanBKMSelect');
let uraianBKM = document.getElementById('uraianBKM');
let idBankBKM = document.getElementById('idBankBKM');
let jenisBankBKM = document.getElementById('jenisBankBKM');
let idJenisPembayaranBKM = document.getElementById('idJenisPembayaranBKM');

let tabelDetailBiayaBKK;
// let tabelDetailBiayaBKK = document.getElementById('tabelDetailBiayaBKK');

tanggal.addEventListener('keypress', function (event) {
    event.preventDefault();
    mataUangSelect.focus();
});

mataUangSelect.addEventListener('click', function (event) {
    event.preventDefault();
});;

kodePerkiraanSelect.addEventListener('click', function (event) {
    event.preventDefault();
});

kodePerkiraanSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanSelect.options[kodePerkiraanSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idBank = selectedValue.split(" | ")[0];
        idKodePerkiraan.value = idBank;
    }
});

//#region ambil list mata uang
fetch("/getmatauang/")
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            mataUangSelect.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Kode Perkiraan";
            mataUangSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Id_MataUang;
                option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
                mataUangSelect.appendChild(option);
            });
        });
//#endregion

//#region ambil list bank
fetch("/getbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Bank";
        namaBankSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank;
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank;
            namaBankSelect.appendChild(option);
        });

});
//#endregion

//#region ambil list jenis bayar
fetch("/getjenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Jenis Pembayaran";
        jenisPembayaranSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranSelect.appendChild(option);
        });

});
//#endregion

//#region ambil list kode perkiraan
fetch("/getkodeperkiraan/")
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
//#endregion

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idBankBKK.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBankBKK.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBank.value = options[0].jenis;
                console.log(options);
            });
    }
});

jenisPembayaranSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranSelect.options[jenisPembayaranSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idJenisPembayaran');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idJenisInput.value = idJenis;
    }
});

uraian.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'P';

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

        fetch("/getidbkk/" + idBankBKK.value + "/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKK.value = options;
            });

            // var adaBiaya = confirm('Apakah ada BIAYA?');
            // if (adaBiaya) {
            //     btnTambahBiaya.disabled = false; // Aktifkan tombol jika ada biaya
            // } else {
            //     btnTambahBiaya.disabled = true;  // Nonaktifkan tombol jika tidak ada biaya
            //     if (cardBKM.classList.contains('disabled')) {
            //         cardBKM.classList.remove('disabled'); // Mengaktifkan card
            //     }
            // }
    }
});

kodePerkiraanTambahBiayaSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanTambahBiayaSelect.options[kodePerkiraanTambahBiayaSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idkp = selectedValue.split(" | ")[0];
        idKodePerkiraanTambahBiaya.value = idkp;
    }
});

btnTambahBiaya.addEventListener('click', function (event) {
    event.preventDefault();
    modalTambahBiaya = $("#modalTambahBiaya");
    modalTambahBiaya.modal('show');

    fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanTambahBiayaSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanTambahBiayaSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanTambahBiayaSelect.appendChild(option);
        });

    });

})

//#region tambah data ke tabel Detail Biaya BKK
btnProsesTambahBiaya.addEventListener('click', function (event) {
    event.preventDefault();
    tabelDetailBiayaBKK = $('#tabelDetailBiayaBKK').DataTable({
        // Opsi kolom yang ditampilkan
        columns: [
            {
                title: 'Keterangan',
                render: function () {
                    return `<input type="checkbox" class="row-checkbox"/>`;
                },
            },
            { title: 'Biaya' },
            { title: 'Kode Perkiraan' }
        ],
    });

    const Keterangan = keterangan.value;
    const Biaya = jumlahBiaya.value;
    const KodePerkiraan = idKodePerkiraanTambahBiaya.value;

    // Tambahkan data ke dalam DataTable
    tabelDetailBiayaBKK.row.add([
        Keterangan,
        Biaya,
        KodePerkiraan
    ]).draw();
})
//#endregion


// UNTUK CARD BKM

tanggalBKM.addEventListener('keypress', function (event) {
    event.preventDefault();
    mataUangBKMSelect.focus();
});

//#region ambil list bank (BKM)
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
//#endregion

fetch("/getjenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Jenis Pembayaran";
        jenisPembayaranBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranBKMSelect.appendChild(option);
        });

});

namaBankBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankBKMSelect.options[namaBankBKMSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
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

jenisPembayaranBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranBKMSelect.options[jenisPembayaranBKMSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idJenisPembayaranBKM');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idJenisInput.value = idJenis;
    }
});

