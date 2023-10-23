let tabelDataNotaK = $("#tabelDataNotaK").DataTable();
let idNotaK = document.getElementById('idNotaK');
let noTagih = document.getElementById('noTagih');
let namaCustomer = document.getElementById('namaCustomer');
let jumlahUang = document.getElementById('jumlahUang');
let mataUang = document.getElementById('mataUang');
let jenisBayarSelect = document.getElementById('jenisBayarSelect');
let namaBankSelect = document.getElementById('namaBankSelect');
let idBank = document.getElementById('idBank');

//HIDDEN
let id_Bank = document.getElementById('id_Bank');
let jenis_Bayar = document.getElementById('jenis_Bayar');
let idJenisBayar = document.getElementById('idJenisBayar');

let btnIsi = document.getElementById('btnIsi');
let btnKoreksi = document.getElementById('btnKoreksi');
let btnHapus = document.getElementById('btnHapus');
let btnProses = document.getElementById('btnProses');

fetch("/loadDataNotaK/")
.then((response) => response.json())
.then((options) => {
    console.log(options);

    tabelDataNotaK = $("#tabelDataNotaK").DataTable({
        destroy : true,
        data: options,
        columns: [
            { title: "Tanggal", data: "Tanggal" },
            { title: "Id. Nota Kredit", data: "Id_NotaKredit" },
            { title: "Id. Penagihan", data: "Id_Penagihan" },
            { title: "Customer", data: "NamaCust" },
            { title: "Mata Uang", data: "Nama_MataUang" },
            { title: "Jml Uang", data: "Nilai" },
            { title: "Id Bank", data: "Id_Bank" },
            { title: "Jenis Bayar", data: "Jenis_Pembayaran" },
            { title: "Rincian Bayar", data: "Rincian_Bayar" },
        ],
    });
});

let selectedRows;

$("#tabelDataNotaK tbody").off("click", "tr");
$("#tabelDataNotaK tbody").on("click", "tr", function () {
    let checkSelectedRows = $("#tabelDataNotaK tbody tr.selected");

    if (checkSelectedRows.length > 0) {
        // Remove "selected" class from previously selected rows
        checkSelectedRows.removeClass("selected");
    }
    $(this).toggleClass("selected");
    const table = $("#tabelDataNotaK").DataTable();
    selectedRows = table.rows(".selected").data().toArray();
    console.log(selectedRows[0]);
    selectedRows[0].Id_Bank = id_Bank.value;
    selectedRows[0].Jenis_Pembayaran = jenis_Bayar.value;;
});

btnIsi.addEventListener('click', function(event) {
    event.preventDefault();
    btnKoreksi.disabled = true;
    btnHapus.disabled = true;
    btnProses.disabled = false;
    btnIsi.disabled = true;

    console.log(selectedRows[0]);
    console.log(id_Bank.value);

    if (id_Bank.value == "" && jenis_Bayar.value == "") {
        idNotaK.value = selectedRows[0].Id_NotaKredit;
        noTagih.value = selectedRows[0].Id_Penagihan;
        namaCustomer.value = selectedRows[0].NamaCust;
        jumlahUang.value = selectedRows[0].Nilai;
        mataUang.value = selectedRows[0].Nama_MataUang;
        jenisBayarSelect.focus();
    }
});

fetch("/getJenisBayarPenagajuan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisBayarSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Jenis Bayar";
        jenisBayarSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            jenisBayarSelect.appendChild(option);
        });
    });


jenisBayarSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = jenisBayarSelect.options[jenisBayarSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value;
        const idKode = selectedValue.split(" | ")[0];
        idJenisBayar.value = idKode;
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
        const idJenis = selectedValue.split("|")[0];
        idBank.value = idJenis;
        //console.log(idBank.value);
        // fetch("/detailjenisbank/" + idBank.value)
        //     .then((response) => response.json())
        //     .then((options) => {
        //         jenisBank.value = options[0].jenis;
        //         console.log(options);
        //     });
    }
});

