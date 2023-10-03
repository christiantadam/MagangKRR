let tanggal = document.getElementById('tanggal');
let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataBKM = document.getElementById('tabelDataBKM');
let tabelRincianData = document.getElementById('tabelRincianData');
let idKodePerkiraan = document.getElementById('idKodePerkiraan');
let kodePerkiraanSelect = document.getElementById('kodePerkiraanSelect');
let uraian = document.getElementById('uraian');
let btnOK = document.getElementById("btnOK");
let dataTable;
let dataTable2;
let namaBankSelect = document.getElementById('namaBankSelect');
let idBank = document.getElementById('idBank');
let jenisBank = document.getElementById('jenisBank');
let jumlahUang = document.getElementById('jumlahUang');

let btnPilihBKM = document.getElementById('btnPilihBKM');

const tgl = new Date();
const formattedDate2 = tgl.toISOString().substring(0, 10);
tanggal.value = formattedDate2;

btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
        fetch("/tabeldetailbkmbkk/" + bulan.value +"/"+ tahun.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                dataTable = $("#tabelDataBKM").DataTable({
                    data: options,
                    columns: [
                        {
                            title: "No. BKM", data: "Id_BKM",
                            render: function (data) {
                                return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        { title: "Tgl. BKM", data: "Tgl_Input",
                            render: function (data) {
                                var date = new Date(data);
                                return date.toLocaleDateString();
                            }
                        },
                        { title: "Nilai Pelunasan", data: "Total" },
                    ],
                });
            });
});

$("#tabelDataBKM tbody").off("click", "input[type='checkbox'");
$("#tabelDataBKM tbody").off("change", "input[type='checkbox']");
// $("#tabelDataBKM tbody").on("change", "input[type='checkbox']", function () {
// });
$("#tabelDataBKM tbody").on("change", "input[type='checkbox']", function (event) {
    event.preventDefault();

    let rows = tabelDataBKM.getElementsByTagName("tr");
    selectedRows = [];
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            let rowData = {
                Id_BKM: cells[0].innerText,
            };
            selectedRows.push(rowData);

            fetch("/tabeldetbiayabkmbkk/" + cells[0].innerText.trim())
                .then((response) => response.json())
                .then((options) => {
                    console.log(options);
                    dataTable2 = $("#tabelRincianData").DataTable({
                        data: options,
                        columns: [
                            {
                                title: "Customer", data: "NamaCust",
                                render: function (data) {
                                    return `<input type="checkbox" name="dataCheckbox" value="${data}" /> ${data}`;
                                },
                            },
                            { title: "No. Bukti", data: "No_Bukti" },
                            { title: "Invoice", data: "ID_Penagihan" },
                            { title: "Mata Uang", data: "Id_MataUang" },
                            { title: "Nilai Rincian", data: "Rincian" },
                            { title: "Id. Bank", data: "Id_bank" },
                            { title: "Id. Jenis", data: "Jenis_Bank" },
                            { title: "Id. Uang", data: "Id_MataUang" }
                        ],
                    });
                    // Setelah fetch selesai, masukkan data detail pelunasan ke dalam tabelDetailPelunasan
                    dataTable2.clear().rows.add(options).draw();
                });
        }
    }
});

$("#tabelRincianData tbody").off("click", "input[type='checkbox'");
$("#tabelRincianData tbody").off("change", "input[type='checkbox']");
// $("#tabelDataBKM tbody").on("change", "input[type='checkbox']", function () {
// });
$("#tabelRincianData tbody").on("change", "input[type='checkbox']", function (event) {
    event.preventDefault();

    let rowsRincianData = $("#tabelRincianData tbody tr");
    let rowsDataBKM = $("#tabelDataBKM tbody tr");
    selectedRows = [];

    // Iterate over the rows in tabelRincianData
    for (let i = 0; i < rowsRincianData.length; i++) {
        let cellsRincianData = rowsRincianData[i].cells;
        let checkbox = cellsRincianData[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            // Assuming the row index in 'tabelDataBKM' corresponds to the row in 'tabelRincianData'
            let dataBKMRow = rowsDataBKM[i];
            if (dataBKMRow) {
                let dataBKMCells = dataBKMRow.cells;

                let rowData = {
                    Id_BKM: dataBKMCells[0].innerText,  // Assuming Id_BKM is in the first cell
                    NilaiPelunasan: dataBKMCells[1].innerText,  // Assuming NilaiPelunasan is in the second cell
                    Id_bank: cellsRincianData[5].innerText,
                    Jenis_Bank: cellsRincianData[6].innerText,
                    Jumlah_Uang: dataBKMCells[2].innerText
                };
                selectedRows.push(rowData);
            }
        }
    }
    console.log(selectedRows);
});

btnPilihBKM.addEventListener('click', function(event) {
    event.preventDefault();
    jumlahUang.value = selectedRows[0].Jumlah_Uang;
    tanggal.focus();
});

tanggal.addEventListener('keypress', function(event) {
    if (event.key == "Enter") {
        event.preventDefault();
        const tanggalHariIni = new Date();
        const formattedDate2 = tanggalHariIni.toISOString().substring(0, 10);
        console.log(tanggalHariIni, tanggal.value);
        if (tanggal.value > formattedDate2) {
            alert('Tanggal SALAH!');
            tanggal.focus();
        } else {
            kodePerkiraanSelect.focus();
        }
    }
});

fetch("/getBankPembulatan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Cust";
        namaBankSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            namaBankSelect.appendChild(option);
        });
});

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
        const bagiansatu = selectedValue.split(/[-|]/);
        const jenis = bagiansatu[0];
        const idcust = bagiansatu[1];
        idBank.value = jenis;
    }

    fetch("/getJenisBankPembulatan/" + idBank.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisBank.value = options[0].jenis;
    });

})

fetch("/detailkodeperkiraan/" + 1)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanSelect.innerHTML="";

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
    const selectedOption = kodePerkiraanSelect.options[kodePerkiraanSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idKodePerkiraan');
        const selectedValue = selectedOption.value;
        const idKode = selectedValue.split(" | ")[0];
        idKodeInput.value = idKode;
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

function clickOK() {
    let bulanValue = bulan.value;
    let tahunValue = tahun.value;
    if (bulanValue.trim() === '' || tahunValue.trim() === '') {
        alert('Harap isi bulan dan tahun terlebih dahulu!');
        return;
    }
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1;
    const currentYear = currentDate.getFullYear();

    const selectedMonth = parseInt(bulanValue, 10);
    const selectedYear = parseInt(tahunValue, 10);

    if (selectedYear > currentYear || (selectedYear === currentYear && selectedMonth >= currentMonth)) {
        alert('TIDAK BOLEH CREATE BKM U/ BLN INI!!!');
        bulan.value = "";
        tahun.value = "";
        return;
    }
};
