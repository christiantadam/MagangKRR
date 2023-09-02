let dataTable;
let btnPilihNotaKredit = document.getElementById('btnPilihNotaKredit');
let btnProses = document.getElementById('btnProses');

let idMataUangBKM = document.getElementById('idMataUangBKM');
let mataUangBKMSelect = document.getElementById('mataUangBKMSelect');
let namaBankBKMSelect = document.getElementById('namaBankBKMSelect');
let idBankBKM = document.getElementById('idBankBKM');
let kodePerkiraanSelectBKM = document.getElementById('kodePerkiraanSelectBKM');
let idKodePerkiraanBKM = document.getElementById('idKodePerkiraanBKM');
let uraianBKM = document.getElementById('uraianBKM');
let jumlahUangBKM = document.getElementById('jumlahUangBKM');
let kursRupiah = document.getElementById('kursRupiah');

let idPembayaran = document.getElementById('idPembayaran');

//CARD BKK
let idBKK = document.getElementById('idBKK');
let jumlahUangBKK = document.getElementById('jumlahUangBKK');
let namaBankBKKSelect = document.getElementById('namaBankBKKSelect');
let idBankBKK = document.getElementById('idBankBKK');
let jenisBankBKK = document.getElementById('jenisBankBKK');
let kodePerkiraanBKKSelect = document.getElementById('kodePerkiraanBKKSelect');
let idKodePerkiraanBKK = document.getElementById('idKodePerkiraanBKK');
let uraianBKK = document.getElementById('uraianBKK');

let NoNotaKredit;
let NoPenagihan;
let idMtUang;
let IdCust;
let tglNota;
let bulan;
let tahun;
let jmlUang;

let total1 = 0;
let total2;
let nilai1 = document.getElementById('nilai1');
let konversi = document.getElementById('konversi');
let nilaiUang = document.getElementById('nilaiUang');
let lastCheckedCheckbox = null;
let rowData;

tanggal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();

        var tanggalInput = new Date(tanggal.valueAsNumber);
        var currentDate = new Date();
        if (tanggalInput > currentDate) {
            alert("Tanggal SALAH!");
        } else {
            mataUangBKMSelect.focus();
        }
    }
});

fetch("/getTabelNotaKredit/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);

        dataTable = $("#tabelNotaKredit").DataTable({
            data: options,
            columns: [
                {
                    title: "Customer", data: "NamaCust",
                    render: function (data) {
                        return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                    },
                },
                { title: "Tgl. Nota Kredit", data: "Tanggal" },
                { title: "No. Nota Kredit", data: "Id_NotaKredit" },
                { title: "No. Penagihan", data: "Id_Penagihan" },
                { title: "Jenis Nota Kredit ", data: "NamaNotaKredit" },
                { title: "Jumlah Uang", data: "Nilai" },
                { title: "Mata Uang", data: "Nama_MataUang" },
                { title: "Id. Mata Uang", data: "Id_MataUang" },
                { title: "Id. Customer", data: "Id_Customer"},
            ],
        });
    });

$('#tabelNotaKredit').on('change', 'input[name="divisiCheckbox"]', function() {
    if ($(this).prop('checked')) {
        if (lastCheckedCheckbox && lastCheckedCheckbox !== this) {
            $(lastCheckedCheckbox).prop('checked', false);
        }
        lastCheckedCheckbox = this;
        const checkboxValue = $(this).val();
        const rowData = dataTable.row($(this).closest('tr')).data();
        console.log('Checkbox checked:', checkboxValue, rowData);
    }
});

btnPilihNotaKredit.addEventListener('click', function(event) {
    event.preventDefault();
    if (lastCheckedCheckbox) {
        rowData = dataTable.row($(lastCheckedCheckbox).closest('tr')).data();

        // Assuming the order of columns is the same as you provided
        NoNotaKredit = rowData['Id_NotaKredit'];
        NoPenagihan = rowData['Id_Penagihan'];
        idMtUang = rowData['Id_MataUang'];
        IdCust = rowData['Id_Customer'];
        tglNota = rowData['Tanggal'];
        jmlUang = rowData['Nilai'];

        nilaiUang.value = parseFloat(jmlUang);
        for (var i = 0; i < rowData.length; i++) {
        nilaiUang.value += parseFloat(rowDataArray[i]['Nilai']);
        }

        const dateObject = new Date(tglNota);

        // Get month and year separately
        bulan = dateObject.getMonth() + 1; // +1 karena bulan dimulai dari 0 (Januari) - 11 (Desember)
        tahun = dateObject.getFullYear();

        console.log('Bulan:', bulan);
        console.log('Tahun:', tahun);
        console.log(nilaiUang.value);

        rowData['bulan'] = bulan;
        rowData['tahun'] = tahun;

        // tanggal.disabled = false;
        // idBKK.disabled = false;
        // mataUangSelect.disabled = false;
        // kursRupiah.disabled = false;
        // jumlahUang.disabled = false;
        // namaBankSelect.disabled = false;
        // idKodePerkiraanBKK.disabled = false;
        // kodePerkiraanSelectBKK.disabled = false;
        // uraian.disabled = false;
    }
});

kursRupiah.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        kursRupiah.value = parseFloat(kursRupiahInput.value.replace(/[^0-9.]/g, '')).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

        if (kursRupiah.value = 0) {
            alert('Nilai kurs Rupiah harus lebih besar dari 0!');
        } else {
            if (idMataUangBKM.value == 1 && idMtUang == 2) {
                console.log('masuk');
                let nilaipelunasan = parseFloat(kursRupiah.value) * parseFloat(jumlahUang.value);
                let saldorp = parseFloat(kursRupiah.value) * saldo;

                jumlahUang.value = nilaipelunasan.toFixed(2);

                console.log(nilaipelunasan, saldorp);

                if (nilaipelunasan > saldorp) {
                    alert('Jumlah Uang TIDAK BOLEH lebih besar dari Saldo Pelunasan!');
                    jumlahUang.focus();
                }
            }
        }
    }
});

//#region ambil list mata uang
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
        idKodeInput.value = idMU;
    }
});
//#endregion

//#region untuk ambil LIST BANK BKM
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
//#endregion

//#region ambil list kode perkiraan
fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanSelectBKM.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanSelectBKM.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanSelectBKM.appendChild(option);
        });
});

kodePerkiraanSelectBKM.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanSelectBKM.options[kodePerkiraanSelectBKM.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idkp = selectedValue.split(" | ")[0];
        idKodePerkiraanBKM.value = idkp;
    }
});
//#endregion

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

        fetch("/getidBKMNota/" + idBankBKM.value + "/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKM.value = options;
            });

            idBKK.disabled = false;
            jumlahUangBKK.disabled = false;
            namaBankBKKSelect.disabled = false;
            idBankBKK.disabled = false;
            jenisBankBKK.disabled = false;
            idKodePerkiraanBKK.disabled = false;
            kodePerkiraanBKKSelect.disabled = false;
            uraianBKK.disabled = false;
    }
});

//UNTUK CARD BKK
jumlahUangBKK.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let jumlah = parseFloat(jumlahUangBKK.value).toFixed(2);
        console.log(nilaiUang.value);
        let nilai = parseFloat(nilaiUang.value);
        // let kurs = parseFloat(kursRupiah.value);

        if (jumlah === '0.00') {
            alert('Jumlah Uang TIDAK BOLEH = 0 !');
            jumlahUangBKK.focus();
        } else if (jumlah != nilai) {
            alert('Jumlah Uang TIDAK BOLEH berbeda !');
            var formattedValue = nilai.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            jumlahUangBKK.value = formattedValue;
            // console.log(jumlahUangBKK.value);
        } else {
            namaBankBKKSelect.focus();
        }
    }
});

//#region untuk ambil LIST BANK BKM
fetch("/getbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankBKKSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Bank";
        namaBankBKKSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank;
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank;
            namaBankBKKSelect.appendChild(option);
        });

});

namaBankBKKSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankBKKSelect.options[namaBankBKKSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idBankBKK.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBankBKK.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBankBKK.value = options[0].jenis;
                console.log(options);
            });
    }
});
//#endregion

//#region ambil list kode perkiraan
fetch("/getkodeperkiraan/")
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
    const selectedOption = kodePerkiraanBKKSelect.options[kodePerkiraanBKKSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idkp = selectedValue.split(" | ")[0];
        idKodePerkiraanBKK.value = idkp;
    }
});
//#endregion

uraianBKK.addEventListener("keypress", function(event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'P';
        console.log("masuk");

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

        fetch("/getidBKKNota/" + idBankBKK.value + "/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKK.value = options;
            });

            idBKK.disabled = true;
            jumlahUangBKK.disabled = true;
            namaBankBKKSelect.disabled = true;
            idBankBKK.disabled = true;
            jenisBankBKK.disabled = true;
            idKodePerkiraanBKK.disabled = true;
            kodePerkiraanBKKSelect.disabled = true;
            uraianBKK.disabled = true;

        btnProses.focus();
    }
});


btnProses.addEventListener('click', function(event) {
    event.preventDefault();
    if (idBKM.value != "" || idBKM.value != "") {
        nilai1.value = parseFloat(jumlahUangBKM.value);
        total2 = nilai1.toString();
        // console.log("masuk");
        if (parseInt(idMataUang.value) == 1) {
            konversi.value = F_Rupiah(total2); // Menggunakan fungsi F_Rupiah jika kondisi terpenuhi
        } else {
            konversi.value = F_Dollar(total2); // Menggunakan fungsi F_DOLLAR jika kondisi tidak terpenuhi
        }
    }
    else {
        console.log("Tidak Ada Yg diPROSES!");
    }
})

//#region untuk koversi jumlah uang
function F_Rupiah() {
    var formatted = parseFloat(nilai1.value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    return formatted;
}
function F_Dollar() {
    var formatted = parseFloat(nilai1.value).toFixed(2);
    return formatted;
}
//#endregion
