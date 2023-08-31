let dataTable;
let btnPilihNotaKredit = document.getElementById('btnPilihNotaKredit');

let idMataUangBKM = document.getElementById('idMataUangBKM');
let mataUangBKMSelect = document.getElementById('mataUangBKMSelect');
let namaBankBKMSelect = document.getElementById('namaBankBKMSelect');
let idBankBKM = document.getElementById('idBankBKM');
let kodePerkiraanSelectBKM = document.getElementById('kodePerkiraanSelectBKM');
let idKodePerkiraanBKM = document.getElementById('idKodePerkiraanBKM');
let uraianBKM = document.getElementById('uraianBKM');

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
let idMataUang;
let IdCust;
let tglNota;
let bulan;
let tahun;
let jmlUang;
let nilaiUang;
let lastCheckedCheckbox = null;

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

//let NoNotaKredit;
// let NoPenagihan;
// let idMataUang;
// let IdCust;
// let tglNota;
// let bulan;
// let tahun;
// let jmlUang;
// let nilaiUang;

btnPilihNotaKredit.addEventListener('click', function(event) {
    event.preventDefault();
    if (lastCheckedCheckbox) {
        const rowData = dataTable.row($(lastCheckedCheckbox).closest('tr')).data();

        // Assuming the order of columns is the same as you provided
        NoNotaKredit = rowData['Id_NotaKredit'];
        NoPenagihan = rowData['Id_Penagihan'];
        idMataUang = rowData['Id_MataUang'];
        IdCust = rowData['Id_Customer'];
        tglNota = rowData['Tanggal'];
        // bulan = rowData['ID_Cust'];
        // tahun = rowData['Id_MataUang'];
        jmlUang = rowData['Nilai'];

        const dateObject = new Date(tglNota);

        // Get month and year separately
        bulan = dateObject.getMonth() + 1; // +1 karena bulan dimulai dari 0 (Januari) - 11 (Desember)
        tahun = dateObject.getFullYear();

        console.log('Bulan:', bulan);
        console.log('Tahun:', tahun);

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

        // console.log('Selected Data:');
        // console.log('Id BKM:', idbkm);
        // console.log('Saldo:', saldo);
        // console.log('Id Pelunasan:', IdPelunasan);
        // console.log('Jenis Bank:', jenisBank);
        // console.log('Id Mata Uang:', idMtUang);
        // console.log('Id Cust:', IdCust);
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

//#region untuk ambil LIST BANK
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

        fetch("/getidbkmBKMNota/" + idBankBKM.value + "/" + tanggal.value)
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
