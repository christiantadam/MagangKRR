let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
let btnInputTanggalBKM = document.getElementById('btnInputTanggalBKM');
let tanggalInput = document.getElementById('tanggalInput');
let btnProses = document.getElementById("btnProses");
let kodePerkiraanSelect = document.getElementById("kodePerkiraanSelect");
let idKodePerkiraan = document.getElementById("idKodePerkiraan");
let idPelunasan;

let selectedRows = [];

let btnOK = document.getElementById("btnOK");

let modalkoreksi = document.getElementById("formkoreksi");
let methodform = document.getElementById("methodkoreksi");


btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
        fetch("/detailtabelpelunasan/" + bulan.value +"/"+ tahun.value)
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
                        { title: "Tgl. Input", data: "TglInput" },
                        { title: "Kode Perkiraan", data: "Kode_Perkiraan" },
                    ],
                });
            });
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

btnInputTanggalBKM.addEventListener('click', function (event) {
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
     // Menyimpan data dari baris yang dicentang
    let rows = tabelDataPelunasan.getElementsByTagName("tr");
    selectedRows = [];
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
        }}

})

$("#btnInputTanggalBKM").on("click", function (event) {
    event.preventDefault();

    // Ambil modal dan elemen-elemennya berdasarkan ID
    const tglPelunasan = $("#tglPelunasan");
    idPelunasan = $("#idPelunasan");
    const tanggalTagih = $("#tanggalTagih");
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
    tanggalTagih.val(selectedData.Tgl_Penagihan);
    jenisBayar.val(selectedData.Jenis_Pembayaran);
    idBank.val(selectedData.Id_bank);
    mataUang.val(selectedData.Nama_MataUang);
    nilaiPelunasan.val(selectedData.Nilai_Pelunasan);
    noBukti.val(selectedData.No_Bukti);
})

tanggalInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Menghentikan perilaku bawaan tombol Enter

        let tanggal = tanggalInput.value;
        let today = new Date();
        let inputDate = new Date(tanggal);

        if (inputDate > today || inputDate.getFullYear() > today.getFullYear()) {
            alert("Tanggal SALAH!");
            tanggalInput.focus();
        }
    }
});

$("#btnProses").on("click", function (event) {
    event.preventDefault();
    const idKodePerkiraan = $("#idKodePerkiraan").val();
    const selectedRowsIndices = [];
    $("#tabelDataPelunasan tbody input[type='checkbox']:checked").each(function () {
        const row = $(this).closest("tr");
        const rowIndex = dataTable3.row(row).index();
        selectedRowsIndices.push(rowIndex);
    });

    const selectedKodePerkiraan = $("#kodePerkiraanSelect option:selected").text();

    updateKpColumn2(idKodePerkiraan, selectedRowsIndices);

    selectedRowsIndices.forEach((rowIdx) => {
        const row = dataTable3.row(rowIdx);
        if (row) {
            const rowData = row.data();
            rowData["Kode_Perkiraan"] = selectedKodePerkiraan; // Menggunakan nilai yang sudah didapatkan sebelumnya
            row.data(rowData).draw();
        }
    });

    // methodInputTanggal.value = "PUT";
    // modalInputTanggal.action = "/CreateBKM/" + idPelunasan.value;
    // modalInputTanggal.submit();

    //$('#modalDetailKurangLebih').modal('hide');
});

function updateKpColumn2(idKodePerkiraan, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
      // Get the DataTable row object for the selected row index
      const row = dataTable3.row(rowIdx);
      if (row) {
        // Get the current data for the row
        const rowData = row.data();
        const selectedValue = idKodePerkiraan.split("|");
        const idKpValue = selectedValue[0];

        rowData["Kode_Perkiraan"] = idKpValue;
        row.data(rowData).draw();
      }
    });
}

function validatePilihBank() {
    const checkedRows = document.querySelectorAll('input[name="divisiCheckbox"]:checked');
    if (checkedRows.length === 0) {
        alert('Pilih 1 Data Pelunasan!');
        return;
    } else {
        $('#pilihInputTanggal').modal('show');
    }
    const modal = document.getElementById('pilihBankModal');
    modal.style.display = 'block';

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
}




