let tanggal = document.getElementById('tanggal');
let tanggal2 = document.getElementById('tanggal2');
let radiogrupElement = document.getElementsByName('radiogrup');
let btnOk = document.getElementById('btnOk');
let statusPenagihan = document.getElementById('statusPenagihan');

let formkoreksi = document.getElementById('formkoreksi');
let methodkoreksi = document.getElementById('methodkoreksi');

//INPUTAN
let tanggalInput = document.getElementById('tanggalInput');
let noReferensi = document.getElementById('noReferensi');
let totalNilai = document.getElementById('totalNilai');
let ketDariBank = document.getElementById('ketDariBank');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let idCustomer = document.getElementById('idCustomer');
let radiogrup2 = document.getElementById('radiogrup2');
let radiobtn = document.getElementsByName('radiogrup2');

const tgl = new Date();
const formattedDate = tgl.toISOString().substring(0, 10);
tanggal.value = formattedDate;

const tgl2 = new Date();
const formattedDate2 = tgl2.toISOString().substring(0, 10);
tanggal2.value = formattedDate2;

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
        const idcust = bagiansatu[1];
        namacust = bagiansatu[2];
        idCustomer.value = idcust;
    }
});

btnOk.addEventListener('click', function (event) {
    event.preventDefault();
    // clickOK();

    var radiogrup;
    for (var i = 0; i < radiogrupElement.length; i++) {
        if (radiogrupElement[i].checked) {
            radiogrup = radiogrupElement[i].value;
            break; // Keluar dari loop setelah menemukan yang dipilih
        }
    }
    fetch("/getTabelAnalisis/" + tanggal.value + "/" + tanggal2.value + "/" + radiogrup)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            // console.log(tanggal.value);

            dataTable = $("#tabelAnalisa").DataTable({
                data: options,
                columns: [
                    { title: "Id. Referensi", data: "IdReferensi" },
                    { title: "Nama Bank", data: "Nama_Bank" },
                    { title: "Mata Uang", data: "Nama_MataUang" },
                    { title: "Nilai", data: "Nilai" },
                    { title: "Keterangan", data: "Keterangan" },
                    { title: "Nama Customer", data: "NamaCust" },
                    { title: "Type", data: "TypeTransaksi" },
                    { title: "Id. Pelunasan", data: "Id_Pelunasan" },
                    { title: "Tagihan (Y/N)", data: "Status_Tagihan" },
                    { title: "Jenis", data: "Jenis_Pembayaran" }
                ],
            });
        });
});

$("#tabelAnalisa tbody").off("click", "tr");
$("#tabelAnalisa tbody").on("click", "tr", function () {
    let checkSelectedRows = $("#tabelAnalisa tbody tr.selected");

    if (checkSelectedRows.length > 0) {
        // Remove "selected" class from previously selected rows
        checkSelectedRows.removeClass("selected");
    }
    $(this).toggleClass("selected");
    const table = $("#tabelAnalisa").DataTable();
    let selectedRows = table.rows(".selected").data().toArray();
    console.log(selectedRows[0]);
    tanggalInput.value = selectedRows[0].Tanggal;
    noReferensi.value = selectedRows[0].IdReferensi;
    ketDariBank.value = selectedRows[0].Keterangan;
    totalNilai.value = selectedRows[0].Nilai;
    idCustomer.value = selectedRows[0].Id_Cust;

    statusPenagihan.value = selectedRows[0].Status_Tagihan;

    const cust = selectedRows[0].Id_Cust;
    const options3 = namaCustomerSelect.options;
    for (let i = 0; i < options3.length; i++) {
        let value = options3[i].value.split(/[-|]/);
        if (value[1] === cust) {
            console.log(value[2]);
            namaCustomerSelect.selectedIndex = i;
            break;
        }
    };

    for (var i = 0; i < radiobtn.length; i++) {
        if (radiobtn[i].value === selectedRows[0].TypeTransaksi) {
            radiobtn[i].checked = true;
            break;
        }
    }
    btnProses.disabled = false;

});

btnProses.addEventListener('click', function(event) {
    event.preventDefault();

    let radioChecked = false;
    for (let i = 0; i < radiobtn.length; i++) {
        if (radiobtn[i].checked) {
            radioChecked = true;
            break;
    }};

    if (radioChecked) {
        methodkoreksi.value = "PUT";
        formkoreksi.action = "/AnalisaInformasiBank/" + noReferensi.value;
        formkoreksi.submit();
    } else {
        alert("Pilih button dulu.");
    }
})
