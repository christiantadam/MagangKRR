let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
let tabelDetailPelunasan = document.getElementById('tabelDetailPelunasan');
let pilihBank = document.getElementById('pilihBank');
let selectedRows = [];
let selectedIdPelunasan;
let dataTable;
let dataTable2;
//let proses;

let idPelunasan = document.getElementById('idPelunasan');
let tanggalInput = document.getElementById('tanggalInput');
let tanggalTagih = document.getElementById('tanggalTagih');
let jenisBayar = document.getElementById('jenisBayar');
let namaBankSelect = document.getElementById('namaBankSelect');
let mataUang = document.getElementById('mataUang');
let nilaiPelunasan = document.getElementById('nilaiPelunasan');
let noBukti = document.getElementById('noBukti');

let btnOK = document.getElementById("btnOK");
let btnPilihBank = document.getElementById("btnPilihBank");
let btnProses = document.getElementById("btnProses");
let btnTutup = document.getElementById("btnTutup");
let btnTutupModal = document.getElementById("btnTutupModal");
let btnKoreksiDetail = document.getElementById("btnKoreksiDetail");

let modalkoreksi = document.getElementById("formkoreksi");
let methodform = document.getElementById("methodkoreksi");

btnTutupModal.addEventListener('click', function(event) {
    event.preventDefault();
    $('#pilihBank').modal('hide')
});

btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
        fetch("/detailtabelpenagihan/" + bulan.value +"/"+ tahun.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                dataTable = $("#tabelDataPelunasan").DataTable({
                    data: options,
                    columns: [
                        {
                            title: "Tgl Pelunasan", data: "Tgl_Pelunasan",
                            render: function (data) {
                                return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        { title: "Id. Pelunasan", data: "Id_Pelunasan" },
                        { title: "Id. Bank", data: "Id_bank" },
                        { title: "Jenis Pembayaran", data: "Jenis_Pembayaran" },
                        { title: "Mata Uang", data: "Nama_MataUang" },
                        { title: "Total Pelunasan", data: "Nilai_Pelunasan" },
                        { title: "No. Bukti", data: "No_Bukti" },
                        { title: "Tgl Pembuatan", data: "Tgl_Pembuatan" },
                    ],
                });
            });
});

function validatePilihBank() {
    const checkedRows = document.querySelectorAll('input[name="divisiCheckbox"]:checked');
    if (checkedRows.length === 0) {
        alert('Pilih 1 Data Pelunasan!');
        return;
    } else {
        $('#pilihBank').modal('show');
    }
    const modal = document.getElementById('pilihBankModal');
    modal.style.display = 'block';

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
}

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        const idBankInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idBank = selectedValue.split(" | ")[0];
        idBankInput.value = idBank;
    }
});

btnPilihBank.addEventListener('click', function (event) {
    event.preventDefault();
    validatePilihBank();
    fetch("/detailbank/")
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            namaBankSelect.innerHTML="";

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
     // Menyimpan data dari baris yang dicentang
    let rows = tabelDataPelunasan.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            let rowData = {
                Tgl_Pelunasan: cells[0].innerText,
                Id_Pelunasan: cells[1].innerText,
                Id_bank: cells[2].innerText,
                Jenis_Pembayaran: cells[3].innerText,
                Nama_MataUang: cells[4].innerText,
                Nilai_Pelunasan: cells[5].innerText,
                No_Bukti: cells[6].innerText,
                //No_Bukti: cells[8].innerText
            };
            selectedRows.push(rowData);
        }
    }
    console.log(selectedRows);
})

$("#tabelDataPelunasan tbody").off("click", "tr");
    $("#tabelDataPelunasan tbody").off("change", "input[type='checkbox']");
    // $("#tabelDataPelunasan tbody").on("click", "tr", function () {
    //     const checkbox = $(this).find("input[type='checkbox']");
    //     checkbox.prop("checked", !checkbox.prop("checked"));
    //     checkbox.trigger("change");
    // });

    // Tangkap event saat checkbox di tabelDataPelunasan dicentang atau dibatalkan pemilihannya
    $("#tabelDataPelunasan tbody").on("change", "input[type='checkbox']", function () {
        const checkbox = $(this);
        const isChecked = checkbox.prop("checked");

        // Handle checkbox click event
        const row = checkbox.closest("tr");
        const cells = row.find("td");
        const rowData = {
            Tgl_Pelunasan: cells.eq(0).text(),
            Id_Pelunasan: cells.eq(1).text(),
            Id_bank: cells.eq(2).text(),
            Jenis_Pembayaran: cells.eq(3).text(),
            Nama_MataUang: cells.eq(4).text(),
            Nilai_Pelunasan: cells.eq(5).text(),
            No_Bukti: cells.eq(6).text(),
        };

        // Ambil nilai Id_Pelunasan dari data tersebut
        const selectedIdPelunasan = rowData.Id_Pelunasan;

        if (isChecked) {
            // Lakukan fetch untuk mendapatkan data detail pelunasan berdasarkan Id_Pelunasan
            fetch("/tabeldetailpelunasan/" + selectedIdPelunasan)
                .then((response) => response.json())
                .then((options) => {
                    dataTable2 = $("#tabelDetailPelunasan").DataTable({
                        data: options,
                        columns: [
                            {
                                title: "Id. Penagihan", data: "ID_Penagihan",
                                render: function (data) {
                                    return `<input type="checkbox" name="dataCheckbox" value="${data}" /> ${data}`;
                                },
                            },
                            { title: "Nilai Pelunasan", data: "Nilai_Pelunasan" },
                            { title: "Pelunasan Rupiah", data: "Pelunasan_Rupiah" },
                            { title: "Kode Perkiraan", data: "Kode_Perkiraan" },
                            { title: "Customer", data: "NamaCust" },
                            { title: "Id. Detail", data: "ID_Detail_Pelunasan" },
                            { title: "Tgl Penagihan", data: "Tgl_Penagihan" },
                        ],
                    });
                    // Setelah fetch selesai, masukkan data detail pelunasan ke dalam tabelDetailPelunasan
                    dataTable2.clear().rows.add(options).draw();
                });
        } else {
            dataTable2.clear().draw();
        }
    });

$('#formPilihBank').on('submit', function (event) {
    event.preventDefault();
    const selectedRowsData = []; // Menyimpan data dari baris yang dicentang dalam bentuk objek
    const selectedCheckboxes = $("#tabelDataPelunasan tbody input[type='checkbox']:checked");
    selectedCheckboxes.each(function () {
        const row = $(this).closest("tr");
        const rowData = dataTable.row(row).data();
        selectedRowsData.push(rowData);
    });
    console.log(selectedRowsData);
});

$("#btnPilihBank").on("click", function (event) {
    event.preventDefault();

    // Ambil modal dan elemen-elemennya berdasarkan ID
    const tglPelunasan = $("#tglPelunasan");
    const idPelunasan = $("#idPelunasan");
    //const tanggalInput = $("#tanggalInput");
    //const tanggalTagih = $("#tanggalTagih");
    const jenisBayar = $("#jenisBayar");
    const idBank = $("#idBank");
    const mataUang = $("#mataUang");
    const nilaiPelunasan = $("#nilaiPelunasan");
    const noBukti = $("#noBukti");

    const selectedData = selectedRows[0];

    // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
    tglPelunasan.val(selectedData.Tgl_Pelunasan);
    idPelunasan.val(selectedData.Id_Pelunasan);
    //tanggalInput.val(selectedData.Tgl_Pelunasan);
    //tanggalTagih.val(selectedData.Tgl_Tagih);
    jenisBayar.val(selectedData.Jenis_Pembayaran);
    idBank.val(selectedData.Id_bank);
    mataUang.val(selectedData.Nama_MataUang);
    nilaiPelunasan.val(selectedData.Nilai_Pelunasan);
    noBukti.val(selectedData.No_Bukti);
});

$('#formDetailPelunasan').on('submit', function (event) {
    event.preventDefault();
    const selectedRowsData = []; // Menyimpan data dari baris yang dicentang dalam bentuk objek
    const selectedCheckboxes = $("#tabelDetailPelunasan tbody input[type='checkbox']:checked");
    selectedCheckboxes.each(function () {
        const row = $(this).closest("tr");
        const rowData = dataTable2.row(row).data();
        selectedRowsData.push(rowData);
    });
    console.log(selectedRowsData);
});

$("#btnProses").on("click", function (event) {
    event.preventDefault();

    const currentDate = new Date();
    const day = currentDate.getDate();
    const month = currentDate.getMonth() + 1;
    const year = currentDate.getFullYear();
    const formattedDate = `${month}/${day}/${year}`;

    const idBank = $("#idBank").val();
    const selectedRowsIndices = [];
    $("#tabelDataPelunasan tbody input[type='checkbox']:checked").each(function () {
        const row = $(this).closest("tr");
        const rowIndex = dataTable.row(row).index();
        selectedRowsIndices.push(rowIndex);
    });
    // Update the "Id. Bank" column with the selected value for the selected rows
    updateIdBankColumn(idBank, selectedRowsIndices);

    selectedRowsIndices.forEach((rowIdx) => {
        const row = dataTable.row(rowIdx);
        if (row) {
          const rowData = row.data();
          rowData["Tgl_Pembuatan"] = formattedDate;
          row.data(rowData).draw();
        }
      });

    $('#pilihBank').modal('hide');
});

$("#btnKoreksiDetail").on("click", function (event) {
    event.preventDefault();

    // Ambil modal dan elemen-elemennya berdasarkan ID
    const idPenagihan = $("#idPenagihan");
    const nilaiPelunasan = $("#nilaiPelunasan");
    const pelunasanRupiah = $("#pelunasanRupiah");
    const kodePerkiraan = $("#kodePerkiraan");
    const namaCustomer = $("#namaCustomer");

    const selectedData = selectedRows[0];

    // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
    idPenagihan.val(selectedData.ID_Penagihan);
    namaCustomer.val(selectedData.NamaCust);
    nilaiPelunasan.val(selectedData.Nilai_Pelunasan);
    pelunasanRupiah.val(selectedData.Pelunasan_Rupiah);
    kodePerkiraan.val(selectedData.Kode_Perkiraan);
});

$("#btnKoreksiDetail").on("click", function (event) {
    event.preventDefault();
    const modal = $("#modalDetailPelunasan");
    modal.modal('show');
});

btnKoreksiDetail.addEventListener('click', function (event) {
    event.preventDefault();
     // Menyimpan data dari baris yang dicentang
    let rows = tabelDetailPelunasan.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            let rowData = {
                ID_Penagihan: cells[0].innerText,
                Nilai_Pelunasan: cells[1].innerText,
                Pelunasan_Rupiah: cells[2].innerText,
                Kode_Perkiraan: cells[3].innerText,
                NamaCust: cells[4].innerText,
                ID_Detail_Pelunasan: cells[5].innerText,
                Tgl_Penagihan: cells[6].innerText,
                //No_Bukti: cells[8].innerText
            };
            selectedRows.push(rowData);
        }
    }
    console.log(selectedRows);
})


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
}

function updateIdBankColumn(namaBankSelect, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
      // Get the DataTable row object for the selected row index
      const row = dataTable.row(rowIdx);
      if (row) {
        // Get the current data for the row
        const rowData = row.data();
        const selectedValue = namaBankSelect.split("|");
        const idBankValue = selectedValue[0];

        // Update the "Id. Bank" column in the selected row with the id value
        rowData["Id_bank"] = idBankValue;
        row.data(rowData).draw();
      }
    });
  }



