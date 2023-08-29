let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let idCustomer = document.getElementById('idCustomer');
let btnOK = document.getElementById('btnOK');
let btnPilihBKM = document.getElementById('btnPilihBKM');
let dataTable;
let lastCheckedCheckbox = null;

//CARD BKK
let tanggal = document.getElementById('tanggal');
let idBKK = document.getElementById('idBKK');
let mataUangSelect = document.getElementById('mataUangSelect');
let kursRupiah = document.getElementById('kursRupiah');
let jumlahUang = document.getElementById('jumlahUang');
let namaBankSelect = document.getElementById('namaBankSelect');
let idBankBKK = document.getElementById('idBankBKK');
let jenisBankBKK = document.getElementById('jenisBankBKK');
let idKodePerkiraanBKK = document.getElementById('idKodePerkiraanBKK');
let kodePerkiraanSelectBKK = document.getElementById('kodePerkiraanSelectBKK');
let uraian = document.getElementById('uraian');
let idMataUang = document.getElementById('idMataUang');

let idbkm;
let saldo;
let IdPelunasan;
let jenisBank;
let idMtUang;
let IdCust;

let saldoRp;

fetch("/getcust/")
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

//#region ambil list kode perkiraan
fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanSelectBKK.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanSelectBKK.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanSelectBKK.appendChild(option);
        });
});

kodePerkiraanSelectBKK.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanSelectBKK.options[kodePerkiraanSelectBKK.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idkp = selectedValue.split(" | ")[0];
        idKodePerkiraanBKK.value = idkp;
    }
});
//#endregion

btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    // clickOK();
        fetch("/getTabelPelunasanBKMDP/" + idCustomer.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);

                dataTable = $("#tabelDataPelunasan").DataTable({
                    data: options,
                    columns: [
                        {
                            title: "Tgl Input", data: "Tgl_Input",
                            render: function (data) {
                                return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        { title: "Id. BKM", data: "Id_BKM" },
                        { title: "Id. Bank", data: "Id_bank" },
                        { title: "Nama Bank", data: "Bank" },
                        { title: "Mata Uang ", data: "MataUang" },
                        { title: "Customer", data: "NamaCust" },
                        { title: "Total Pelunasan", data: "Nilai_Pelunasan" },
                        { title: "Saldo Pelunasan", data: "SaldoPelunasan" },
                        { title: "Id. Pelunasan", data: "Id_Pelunasan"},
                        { title: "Jenis Bank", data: "Jenis_Bank"},
                        { title: "Id. Uang", data: "Id_MataUang"},
                        { title: "Id. Cust", data: "ID_Cust"},
                    ],
                });
            });
});

$('#tabelDataPelunasan').on('change', 'input[name="divisiCheckbox"]', function() {
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

btnPilihBKM.addEventListener('click', function(event) {
    event.preventDefault();
    if (lastCheckedCheckbox) {
        const rowData = dataTable.row($(lastCheckedCheckbox).closest('tr')).data();

        // Assuming the order of columns is the same as you provided
        idbkm = rowData['Id_BKM'];
        saldo = rowData['SaldoPelunasan'];
        IdPelunasan = rowData['Id_Pelunasan'];
        jenisBank = rowData['Jenis_Bank'];
        idMtUang = rowData['Id_MataUang'];
        IdCust = rowData['ID_Cust'];

        tanggal.disabled = false;
        idBKK.disabled = false;
        mataUangSelect.disabled = false;
        kursRupiah.disabled = false;
        jumlahUang.disabled = false;
        namaBankSelect.disabled = false;
        idKodePerkiraanBKK.disabled = false;
        kodePerkiraanSelectBKK.disabled = false;
        uraian.disabled = false;


        // console.log('Selected Data:');
        // console.log('Id BKM:', idbkm);
        // console.log('Saldo:', saldo);
        // console.log('Id Pelunasan:', IdPelunasan);
        // console.log('Jenis Bank:', jenisBank);
        // console.log('Id Mata Uang:', idMtUang);
        // console.log('Id Cust:', IdCust);
    }
});

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
                jenisBankBKK.value = options[0].jenis;
                console.log(options);
            });
    }
});
//#endregion

fetch("/getmatauang/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        mataUangSelect.innerHTML="";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Mata Uang";
        mataUangSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_MataUang;
            option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
            mataUangSelect.appendChild(option);
        });

});

mataUangSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangSelect.options[mataUangSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idMataUang');
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        idKodeInput.value = idMU;
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

jumlahUang.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let jumlah = parseFloat(jumlahUang.value).toFixed(2);
        let kurs = parseFloat(kursRupiah.value);

        if (jumlah === '0.00') {
            alert('Jumlah Uang TIDAK BOLEH = 0 !');
            jumlahUang.focus();
        } else {
            let total = 0;
            console.log(idMtUang);
            if (idMataUang.value == 1 && idMtUang == 3) {
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
            // else if (idMataUang.value === 2 && idMtUang === 1) {
            //     let nilaipelunasan = parseFloat(jumlahUang.value) / parseFloat(kursRupiah.value);
            //     let saldodollar = saldo / parseFloat(kursRupiah.value);

            //     jumlahUang.value = nilaipelunasan.toFixed(2);

            //     if (nilaipelunasan > saldodollar) {
            //         alert('Jumlah Uang TIDAK BOLEH lebih besar dari Saldo Pelunasan!');
            //         jumlahUang.focus();
            //     }
            // }
        }
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
    }
});
