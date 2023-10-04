let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
// let tabelDataPelunasan = $('#tabelDataPelunasan').DataTable();
let btnInputTanggalBKM = document.getElementById('btnInputTanggalBKM');
let tanggalInput = document.getElementById('tanggalInput');
let btnProsesss = document.getElementById("btnProsesss");
let kodePerkiraanSelect = document.getElementById("kodePerkiraanSelect");
let idKodePerkiraan = document.getElementById("idKodePerkiraan");
let tabelTampilBKM = document.getElementById("tabelTampilBKM");
let dataTable3;
let idBankNew;
let tglInputNew = document.getElementById("tglInputNew");
let idBKMNew = document.getElementById("idBKMNew");
let totalPelunasan = document.getElementById("total1");
let konversi = document.getElementById('konversi');

let selectedRows = [];

let btnOK = document.getElementById("btnOK");
let btnTampilBkm = document.getElementById("btnTampilBkm");
let btnGroupBKM = document.getElementById("btnGroupBKM");
let btnTutupModal = document.getElementById("btnTutupModal");

let modalkoreksi = document.getElementById("formkoreksi");
let methodform = document.getElementById("methodkoreksi");
let modalTampilBKM = document.getElementById("modalTampilBKM");
let methodTampilBKM = document.getElementById("methodTampilBKM");
let formTampilBKM = document.getElementById("formTampilBKM");
let btnCetakBKM = document.getElementById('btnCetakBKM');

const tglInput = new Date();
const formattedDate2 = tglInput.toISOString().substring(0, 10);
tanggalInput.value = formattedDate2;

btnTampilBkm.addEventListener('click', function(event) {
    event.preventDefault();
    modalTampilBKM = $("#modalTampilBKM");
    modalTampilBKM.modal('show');

    const tglTampilBKM = new Date();
    const formattedDate3 = tglTampilBKM.toISOString().substring(0, 10);
    tanggalInputTampil.value = formattedDate3;

    const tglTampilBKM2 = new Date();
    const formattedDate4 = tglTampilBKM2.toISOString().substring(0, 10);
    tanggalInputTampil2.value = formattedDate4;
});

btnTutupModal.addEventListener('click', function(event) {
    event.preventDefault();
    $('#pilihInputTanggal').modal('hide')
})

btnOkTampil.addEventListener('click', function(event) {
    event.preventDefault();
    fetch("/tabeltampilbkm/" + tanggalInputTampil.value + "/" + tanggalInputTampil2.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            tabelTampilBKM = $("#tabelTampilBKM").DataTable({
                data: options,
                columns: [
                    {
                        title: "Tgl. Input", data: "Tgl_Input",
                        render: function (data) {
                            var date = new Date(data);
                            var formattedDate = date.toLocaleDateString();

                            return `<div>
                                        <input type="checkbox" name="dataCheckbox" value="${formattedDate}" />
                                        <span>${formattedDate}</span>
                                    </div>`;
                        }
                    },
                    { title: "Id. BKM", data: "Id_BKM" },
                    { title: "Nilai Pelunasan", data: "Nilai_Pelunasan" },
                    { title: "Terjemahan", data: "Terjemahan" },
                ]
            });

            let lastCheckedCheckbox = null;

            tabelTampilBKM.on('change', 'input[name="dataCheckbox"]', function() {
                if (lastCheckedCheckbox && lastCheckedCheckbox !== this) {
                    lastCheckedCheckbox.checked = false;
                }
                lastCheckedCheckbox = this;

                const checkedCheckbox = tabelTampilBKM.row($(this).closest('tr')).data();
                const idBKMInput = document.getElementById("idBKM");

                if ($(this).prop("checked")) {
                    idBKMInput.value = checkedCheckbox.Id_BKM;
                } else {
                    idBKMInput.value = "";
                }
            });

        });
});

// $.ajax({
//     url: "/CreateBKM/" + idBKMNew.value, // Replace with your actual route
//     type: "POST",
//     data: {
//         _token: $('meta[name="csrf-token"]'.attr('content')), // Required for Laravel CSRF protection
//         key1: "idBKM",
//         key2: "formkoreksi"
//     },
//     success: function(response) {
//         $("#response").html(response);
//     },
//     error: function(xhr, status, error) {
//         console.log(error);
//     }
// });

const selectedDataArray = [];  // Deklarasikan array untuk menyimpan data yang dicentang

btnGroupBKM.addEventListener('click', function(event) {
    event.preventDefault();
    const totalColumnIndex = 5;
    let idBKMGenerated = false;

    $("input[name='dataPelunasanCheckbox']:checked").each(function(){
        const isChecked = $(this).prop("checked");
        let rowIndex = $(this).closest("tr").index();

        const totalCellValue = dataTable3.cell(rowIndex, totalColumnIndex).data();

        if (isChecked) {
            if (dataTable3.cell(rowIndex,8).data() == null && dataTable3.cell(rowIndex,7).data() == null && dataTable3.cell(rowIndex,2).data() == null) {
                alert("Input Tgl Pembuatan BKM & Id.Bank, Klik Tombol Pilih Bank");
            } else {
                totalPelunasan.value += parseFloat(totalCellValue);
                console.log(totalPelunasan.value);
            }
            idBKMGenerated = true;

            const rowData = dataTable3.row(rowIndex).data();
            rowData.idBKM = '';  // Menambahkan placeholder untuk idBKM pada setiap data
            selectedDataArray.push(rowData);  // Tambahkan data ke array selectedDataArray

        }
    });

    if (idBKM.value === "") {
        if (idBank.value == "KRR1") {
            idBank.value = "KI";
        }
        else if (idBank.value == "KRR2") {
            idBank.value = "KKM";
        }
    } else {
        idBank = idBank.value;
    }

    if (idBKMGenerated) {
        fetch("/getidbkm/" + idBank.value + "/" + tglInputNew.value)
            .then((response) => response.json())
            .then((options) => {
                idBKMNew.value = options;

                // Tambahkan ID BKM ke setiap data yang dicentang
                selectedDataArray.forEach(data => {
                    data.idBKM = options;
                });

                alert('Id. BKM nya: ' + idBKMNew.value);
                console.log(options);
                console.log(idBKMNew.value);
                console.log(tglInputNew.value);
            });
            console.log(selectedDataArray);
    }
});


btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
        fetch("/detailtabelpelunasan2/" + bulan.value +"/"+ tahun.value)
            .then((response) => response.json())
            .then((optionss) => {
                console.log(optionss);
                dataTable3 = $("#tabelDataPelunasan").DataTable({
                    data: optionss,
                    columns: [
                        {
                            title: "Tgl. Pelunasan",
                            data: "Tgl_Pelunasan",
                            render: function (data) {
                                var date = new Date(data);
                                var formattedDate = date.toLocaleDateString();

                                return `<div>
                                            <input type="checkbox" name="dataPelunasanCheckbox" value="${formattedDate}" />
                                            <span>${formattedDate}</span>
                                        </div>`;
                            }
                        },
                        { title: "Id. Pelunasan", data: "Id_Pelunasan" },
                        { title: "Id. Bank", data: "Id_bank" },
                        { title: "Jenis Pembayaran", data: "Jenis_Pembayaran" },
                        { title: "Mata Uang", data: "Nama_MataUang" },
                        { title: "Total Pelunasan", data: "Nilai_Pelunasan" },
                        { title: "No. Bukti", data: "No_Bukti" },
                        { title: "Tgl. Input", data: "TglInput",
                            render: function (data) {
                                var date = new Date(data);
                                return date.toLocaleDateString();
                            }
                        },
                        { title: "Kode Perkiraan", data: "KodePerkiraan" },
                    ],
                });

                if (idBank.value == "KRR1") {
                    idBankNew = "KKM"
                } else if (idBank.value == "KKR2") {
                    idBankNew = "KI"
                } else {
                    idBankNew = idBank.value;

                }
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

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        const idNamaBank = document.getElementById('idBank');
        const selectedValue = selectedOption.value;
        const idbank = selectedValue.split(" | ")[0];
        idNamaBank.value = idbank;
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
            let tglInputFull = cells[7].innerText; // Nilai datetime lengkap dari kolom "Tgl. Input"
            let tglInputDate = new Date(tglInputFull);
            let tgl = tglInputDate.getDate();
            let bulan = tglInputDate.getMonth() + 1; // Ingat, bulan dimulai dari 0
            let tahun = tglInputDate.getFullYear();

            // Format tanggal, bulan, dan tahun menjadi bentuk "YYYY-MM-DD"
            tglInputNew.value = `${tahun}-${bulan < 10 ? '0' : ''}${bulan}-${tgl < 10 ? '0' : ''}${tgl}`;
            // console.log(tglInputNew);

            let rowData = {
                Tgl_Pelunasan: cells[0].innerText,
                Id_Pelunasan: cells[1].innerText,
                Id_bank: cells[2].innerText,
                Jenis_Pembayaran: cells[3].innerText,
                Nama_MataUang: cells[4].innerText,
                Nilai_Pelunasan: cells[5].innerText,
                No_Bukti: cells[6].innerText,
                TglInput: cells[7].innerText,
                KodePerkiraan: cells[8].innerText
            };
            selectedRows.push(rowData);
            console.log(selectedRows);
        }}
})

$("#btnInputTanggalBKM").on("click", function (event) {
    event.preventDefault();

    // Ambil modal dan elemen-elemennya berdasarkan ID
    const tglPelunasan = $("#tglPelunasan");
    const idPelunasan = $("#idPelunasan");
    const jenisBayar = $("#jenisBayar");
    // const idBank = $("#idBank");
    const mataUang = $("#mataUang");
    const nilaiPelunasan = $("#nilaiPelunasan");
    const noBukti = $("#noBukti");

    const selectedData = selectedRows[0];
    console.log(selectedRows[0]);

    // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
    tglPelunasan.val(selectedData.Tgl_Pelunasan);
    idPelunasan.val(selectedData.Id_Pelunasan);
    console.log(idPelunasan.val());
    jenisBayar.val(selectedData.Jenis_Pembayaran);
    // idBank.val(selectedData.Id_bank);
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

$("#btnProsesss").on('click', function (event) {
    event.preventDefault();

    const selectedRowsIndices = [];
    $("#tabelDataPelunasan tbody input[type='checkbox']:checked").each(function () {
        const row = $(this).closest("tr");
        const rowIndex = dataTable3.row(row).index();
        selectedRowsIndices.push(rowIndex);
    });
    console.log(idKodePerkiraan);
    updateKpColumn2(idKodePerkiraan, selectedRowsIndices);
    updateBank(idBank, selectedRowsIndices);

    $('#pilihInputTanggal').modal('hide');
});

btnCetakBKM.addEventListener('click', function(event) {
    event.preventDefault();

    methodTampilBKM.value="PUT";
    formTampilBKM.action = "/CreateBKM/" + idBKM.value;
    console.log(idBKM.value);
    formTampilBKM.submit();
});

function updateKpColumn2(kodePerkiraanSelect, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
        // Get the DataTable row object for the selected row index
        const row = dataTable3.row(rowIdx);
        if (row) {
            // Get the current data for the row
            const rowData = row.data();

            // Update the "Kode Perkiraan" data in the rowData
            rowData["KodePerkiraan"] = idKodePerkiraan.value; // Pastikan nama properti sesuai dengan properti dalam data
            row.data(rowData).draw(); // Terapkan perubahan ke tampilan DataTable
            console.log(rowData);
        }
    });
}

function updateBank(namaBankSelect, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
        // Get the DataTable row object for the selected row index
        const row = dataTable3.row(rowIdx);
        if (row) {
            // Get the current data for the row
            const rowData = row.data();

            // Update the "Kode Perkiraan" data in the rowData
            rowData["Id_bank"] = idBank.value; // Pastikan nama properti sesuai dengan properti dalam data
            row.data(rowData).draw(); // Terapkan perubahan ke tampilan DataTable
        }
    });
}

function validatePilihBank() {
    const checkedRows = document.querySelectorAll('input[name="dataPelunasanCheckbox"]:checked');
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
};

const ones = ['', 'Satu ', 'Dua ', 'Tiga ', 'Empat ', 'Lima ', 'Enam ', 'Tujuh ', 'Delapan ', 'Sembilan ' ];
const teens = ['Sepuluh', 'Sebelas', 'Dua Belas', 'Tiga Belas', 'Empat Belas', 'Lima Belas', 'Enam Belas', 'Tujuh Belas', 'Delapan Belas', 'Sembilan Belas'];
const tens = ['', 'Sepuluh', 'Dua Puluh', 'Tiga Puluh', 'Empat Puluh', 'Lima Puluh', 'Enam Puluh', 'Tujuh Puluh', 'Delapan Puluh', 'Sembilan Puluh'];
const thousands = ['', 'Ribu', 'Juta', 'Miliar', 'Triliun'];

function numberToWords(number) {

  if (number === 0) {
    return 'Nol';
  }

  let result = '';

  // Convert each group of three digits
  for (let i = 0; number > 0; i++) {
    const currentGroup = number % 1000;
    if (currentGroup !== 0) {
      result = convertThreeDigitsToWords(currentGroup) + thousands[i] + ' ' + result;
    }
    number = Math.floor(number / 1000);
  }

  // Trim trailing whitespace and return the result
  return result.trim();
}

function convertThreeDigitsToWords(num) {
  let result = '';

  // Convert hundreds place
  const hundredsPlace = Math.floor(num / 100);
  if (hundredsPlace > 0) {
    result += ones[hundredsPlace] + ' Ratus ';
  }

  // Convert tens and ones place
  const remainder = num % 100;
  if (remainder < 10) {
    result += ones[remainder];
  } else if (remainder < 20) {
    result += teens[remainder - 10];
  } else {
    const tensPlace = Math.floor(remainder / 10);
    const onesPlace = remainder % 10;
    result += tens[tensPlace] + ' ' + ones[onesPlace];
  }

  return result;
}
