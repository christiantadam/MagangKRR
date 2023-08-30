let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
let tabelDetailPelunasan = document.getElementById('tabelDetailPelunasan');
let tabelDetailKurangLebih = document.getElementById('tabelDetailKurangLebih');
let tabelDetailBiaya = document.getElementById('tabelDetailBiaya');
var arrIdPelunasan = [];
let selectedRowsDetail = [];
let selectedRowsDetailKrgLbh = [];
let selectedRowsDetailBiaya = [];
let dataTable2;
let dataTable3;
let dataTable4;
let formdetpelunasan = document.getElementById("formdetpelunasan");
let methoddetail = document.getElementById("methoddetail");
let TDet = document.getElementById("TDet");
let kodePerkiraanKrgLbhSelect = document.getElementById("kodePerkiraanKrgLbhSelect");
let kodePerkiraanBiayaSelect = document.getElementById("kodePerkiraanBiayaSelect");
let idDetailBiaya = document.getElementById("idDetailBiaya");

let methodkoreksi = document.getElementById("methodkoreksi");
let formkoreksi = document.getElementById("formkoreksi");

let methodbiaya = document.getElementById("methodbiaya");
let formDetailBiaya = document.getElementById("formDetailBiaya");

let methodkuranglebih = document.getElementById("methodkuranglebih");
let formDetailKurangLebih = document.getElementById("formDetailKurangLebih");

let btnOK = document.getElementById("btnOK");
let btnKoreksiDetail = document.getElementById("btnKoreksiDetail");
let btnProsesDetail = document.getElementById("btnProsesDetail");
let btnPilihBank = document.getElementById("btnPilihBank");
let idPelunasan1 = document.getElementById('idPelunasan');
let btnTampilBKM = document.getElementById("btnTampilBKM");
let btnCetakBKM = document.getElementById("btnCetakBKM");

btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
    fetch("/tabeldatapelunasan/" + bulan.value + "/" + tahun.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);

        const dataToShow = []; // Array untuk mengumpulkan data yang akan ditampilkan

        // Loop melalui data pertama
        options.forEach(option => {
            fetch("/cektabelpelunasan/" + option.Id_Pelunasan)
                .then((response) => response.json())
                .then((options2) => {
                    console.log(options2);
                    if (options2[0].ada > 0) {
                        console.log(option);
                        dataToShow.push(option); // Tambahkan data ke dalam array
                    }

                    // Setelah selesai loop, inisialisasi DataTable dengan data yang dikumpulkan
                    if (option === options[options.length - 1]) {
                        initializeDataTable(dataToShow);
                    }
                });
        });
    });
});

btnTampilBKM.addEventListener('click', function(event) {
    event.preventDefault();
    modalTampilBKM = $("#modalTampilBKM");
    modalTampilBKM.modal('show');
});

btnOkTampil.addEventListener('click', function(event) {
    event.preventDefault();
    fetch("/tabeltampilbkmcashadv/" + tanggalInputTampil.value + "/" + tanggalInputTampil2.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            tabelTampilBKM = $("#tabelTampilBKM").DataTable({
                data: options,
                columns: [
                    {
                        title: "Tgl. Input", data: "Tgl_Input",
                        render: function (data) {
                            return `<input type="checkbox" name="dataCheckbox" value="${data}" /> ${data}`;
                        },
                    },
                    { title: "Id. BKM", data: "Id_BKM" },
                    { title: "Nilai Pelunasan", data: "Nilai_Pelunasan" },
                    { title: "Terjemahan", data: "Terjemahan" },
                ]
            });

            tabelTampilBKM.on('change', 'input[name="dataCheckbox"]', function() {
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

$("#tabelDataPelunasan tbody").off("click", "input[type='checkbox'");
$("#tabelDataPelunasan tbody").off("change", "input[type='checkbox']");
$("#tabelDataPelunasan tbody").on("change", "input[type='checkbox']", function () {
});
$("#tabelDataPelunasan tbody").on("click", "input[type='checkbox']", function (event) {
    event.preventDefault();

    let rows = tabelDataPelunasan.getElementsByTagName("tr");
    selectedRows = [];
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            let rowData = {
                Tgl_Pelunasan: cells[0].innerText,
                Id_Pelunasan: cells[3].innerText,
            };
            selectedRows.push(rowData);

            fetch("/tabeldetpelunasan/" + cells[3].innerText)
                .then((response) => response.json())
                .then((options) => {
                    console.log();
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
                            { title: "Id. Pelunasan", data: "ID_Pelunasan" }
                        ],
                    });
                    // Setelah fetch selesai, masukkan data detail pelunasan ke dalam tabelDetailPelunasan
                    dataTable2.clear().rows.add(options).draw();
                });

            fetch("/dettabelkuranglebih/" + cells[3].innerText)
                .then((response) => response.json())
                .then((options) => {
                    //console.log(cells[1].innerText);
                    dataTable3 = $("#tabelDetailKurangLebih").DataTable({
                        data: options,
                        columns: [
                            {
                                title: "Keterangan", data: "Keterangan",
                                render: function (data) {
                                    return `<input type="checkbox" name="dataCheckbox" value="${data}" /> ${data}`;
                                },
                            },
                            { title: "Jumlah Biaya", data: "KurangLebih" },
                            { title: "Kode Perkiraan", data: "Kode_Perkiraan" },
                            { title: "Id. Detail", data: "Id_Detail_Pelunasan" },
                        ],
                    });
                    // Setelah fetch selesai, masukkan data detail pelunasan ke dalam tabelDetailPelunasan
                    dataTable3.clear().rows.add(options).draw();
                });

            fetch("/dettabelbiaya/" + cells[3].innerText)
            .then((response) => response.json())
            .then((options) => {
                //console.log(cells[1].innerText);
                dataTable4 = $("#tabelDetailBiaya").DataTable({
                    data: options,
                    columns: [
                        {
                            title: "Keterangan", data: "Keterangan",
                            render: function (data) {
                                return `<input type="checkbox" name="dataCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        { title: "Jumlah Biaya", data: "Biaya" },
                        { title: "Kode Perkiraan", data: "Kode_Perkiraan" },
                        { title: "Id. Detail", data: "Id_Detail_Pelunasan" },
                    ],
                });
                // Setelah fetch selesai, masukkan data detail pelunasan ke dalam tabelDetailPelunasan
                dataTable4.clear().rows.add(options).draw();
            });
        }
    }
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

btnKoreksiDetail.addEventListener('click', function (event) {
    event.preventDefault();
});

//Untuk ngecek radiobutton mana yang dipilih, karena akan menampilkan modal yang berbeda
function validateTabel() {
    let radiogrupDetail = document.getElementsByName("radiogrupDetail");
    let isSelected = false;
    for (let radio of radiogrupDetail) {
        if (radio.checked) {
            isSelected = true;
            break;
        }
    }
    if (isSelected) {
        let selectedValue = document.querySelector('input[name="radiogrupDetail"]:checked').value;
        if (selectedValue === "1") {
            DetailPelunasan();
        } else if (selectedValue === "2") {
            DetailBiaya();
        } else if(selectedValue === "3") {
            DetailKurangLebih();
        }
    } else {
        alert("Pilih Detail Yang Akan DiKoreksi!");
    }
};

$("#btnProsesDetail").on("click", function (event) {
    event.preventDefault();
    const idKodePerkiraan = $("#idKodePerkiraan").val();
    const selectedRowsIndices = [];
    $("#tabelDetailPelunasan tbody input[type='checkbox']:checked").each(function () {
        const row = $(this).closest("tr");
        const rowIndex = dataTable2.row(row).index();
        selectedRowsIndices.push(rowIndex);
    });

    updateKpColumn(idKodePerkiraan, selectedRowsIndices);

    // console.log("methoddetail:", methoddetail);
    console.log("formDetailPelunasan:", TDet.value);
    //console.log(formdetpelunasan);
    methoddetail.value="PUT";
    formdetpelunasan.action = "/UpdateDetailBKM/" + TDet.value;
    formdetpelunasan.submit();
    //$('#modalDetailPelunasan').modal('hide');
});

$("#btnProsesKurangLebih").on("click", function (event) {
    event.preventDefault();
    const idKodePerkiraanKrgLbh = $("#idKodePerkiraanKrgLbh").val();
    const selectedRowsIndices = [];
    $("#tabelDetailKurangLebih tbody input[type='checkbox']:checked").each(function () {
        const row = $(this).closest("tr");
        const rowIndex = dataTable3.row(row).index();
        selectedRowsIndices.push(rowIndex);
    });

    updateKpColumn2(idKodePerkiraanKrgLbh, selectedRowsIndices);

    methodkuranglebih.value = "PUT";
    formDetailKurangLebih.action = "/UpdateDetailBKM/" + idcoba.value;
    formDetailKurangLebih.submit();

    //$('#modalDetailKurangLebih').modal('hide');
});

$("#btnProsesBiaya").on("click", function (event) {
    event.preventDefault();
    const idKodePerkiraanBiaya = $("#idKodePerkiraanBiaya").val();
    const selectedRowsIndices = [];
    $("#tabelDetailBiaya tbody input[type='checkbox']:checked").each(function () {
        const row = $(this).closest("tr");
        const rowIndex = dataTable4.row(row).index();
        selectedRowsIndices.push(rowIndex);
    });

    updateKpColumn3(idKodePerkiraanBiaya, selectedRowsIndices);

    methodbiaya.value = "PUT";
    formDetailBiaya.action = "/UpdateDetailBKM/" + idDetailBiaya.value;
    formDetailBiaya.submit();

    //$('#modalDetailKurangLebih').modal('hide');
});

function DetailPelunasan() {
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
                ID_Pelunasan: cells[7].innerText
            };
            selectedRowsDetail.push(rowData);
            console.log(rowData);
        }
    }

    const idPenagihan = $("#idPenagihan");
    const idPelunasan = $("#idPelunasan");
    const nilaiPelunasanDetail = $("#nilaiPelunasanDetail");
    const pelunasanRupiah = $("#pelunasanRupiah");
    const kodePerkiraan = $("#kodePerkiraan");
    const namaCustomer = $("#namaCustomer");
    const tdet = $("#TDet");

    const selectedData = selectedRowsDetail[0];

    // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
    idPenagihan.val(selectedData.ID_Penagihan);
    idPelunasan.val(selectedData.ID_Pelunasan);
    idPelunasan1.value = selectedData.ID_Pelunasan;
    console.log(idPelunasan.val());
    nilaiPelunasanDetail.val(selectedData.Nilai_Pelunasan);
    pelunasanRupiah.val(selectedData.Pelunasan_Rupiah);
    namaCustomer.val(selectedData.NamaCust);
    kodePerkiraan.val(selectedData.Kode_Perkiraan);
    tdet.val(selectedData.ID_Detail_Pelunasan);

    const modal = $("#modalDetailPelunasan");
    modal.modal('show');
    //untuk ambil list kode perkiraan
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
}

kodePerkiraanKrgLbhSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanKrgLbhSelect.options[kodePerkiraanKrgLbhSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idKodePerkiraanKrgLbh');
        const selectedValue = selectedOption.value;
        const idKode = selectedValue.split(" | ")[0];
        idKodeInput.value = idKode;
    }
});

function DetailKurangLebih() {
    let rows = tabelDetailKurangLebih.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            let rowData = {
                Keterangan: cells[0].innerText,
                KurangLebih: cells[1].innerText,
                Kode_Perkiraan: cells[2].innerText,
                Id_Detail_Pelunasan: cells[3].innerText,
            };
            selectedRowsDetailKrgLbh.push(rowData);
        }
    }
    const keterangan = $("#keterangan");
    const kurangLebih = $("#jumlahUang")
    const kodePerkiraan = $("#kodePerkiraanKrgLbhSelect");
    const idcoba = $("#idcoba");

    const selectedData = selectedRowsDetailKrgLbh[0];

    // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
    keterangan.val(selectedData.Keterangan);
    kurangLebih.val(selectedData.KurangLebih);
    idcoba.val(selectedData.Id_Detail_Pelunasan);
    kodePerkiraan.val(selectedData.Kode_Perkiraan);
    console.log(idcoba);
    const modal = $("#modalDetailKurangLebih");
    modal.modal('show');
    //untuk ambil list kode perkiraan
    fetch("/detailkodeperkiraan/" + 1)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            kodePerkiraanKrgLbhSelect.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Kode Perkiraan";
            kodePerkiraanKrgLbhSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.NoKodePerkiraan;
                option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
                kodePerkiraanKrgLbhSelect.appendChild(option);
            });
        });
}

kodePerkiraanBiayaSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanBiayaSelect.options[kodePerkiraanBiayaSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idKodePerkiraanBiaya');
        const selectedValue = selectedOption.value;
        const idKode = selectedValue.split(" | ")[0];
        idKodeInput.value = idKode;
    }
});

btnCetakBKM.addEventListener('click', function(event) {
    event.preventDefault();

    methodTampilBKM.value="PUT";
    formTampilBKM.action = "/UpdateDetailBKM/" + idBKM.value;
    console.log(idBKMTampil.value);
    formTampilBKM.submit();
});

function DetailBiaya() {
    let rows = tabelDetailBiaya.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0];
        if (checkbox.checked) {
            let rowData = {
                Keterangan: cells[0].innerText,
                Biaya: cells[1].innerText,
                Kode_Perkiraan: cells[2].innerText,
                Id_Detail_Pelunasan: cells[3].innerText,
            };
            selectedRowsDetailBiaya.push(rowData);
        }
    }
    const keteranganBiaya = $("#keteranganBiaya");
    const biaya = $("#jumlahBiaya")
    const kodePerkiraan = $("#kodePerkiraanBiayaSelect");
    const idDetailBiaya = $("#idDetailBiaya");

    const selectedData = selectedRowsDetailBiaya[0];

    // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
    keteranganBiaya.val(selectedData.Keterangan);
    biaya.val(selectedData.Biaya);
    idDetailBiaya.val(selectedData.Id_Detail_Pelunasan);
    kodePerkiraan.val(selectedData.Kode_Perkiraan);
    console.log(idDetailBiaya);
    const modal = $("#modalDetailBiaya");
    modal.modal('show');
    //untuk ambil list kode perkiraan
    fetch("/detailkodeperkiraan/" + 1)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            kodePerkiraanBiayaSelect.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Kode Perkiraan";
            kodePerkiraanBiayaSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.NoKodePerkiraan;
                option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
                kodePerkiraanBiayaSelect.appendChild(option);
            });
        });
}

function initializeDataTable(data) {
    dataTable = $("#tabelDataPelunasan").DataTable({
        data: data,
        columns: [
            {
                title: "Tgl Input", data: "Tgl_Input",
                render: function (data) {
                    return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                },
            },
            { title: "Id. BKM", data: "Id_BKM" },
            { title: "Tgl. Pelunasan", data: "Tgl_Pelunasan" },
            { title: "Id. Pelunasan", data: "Id_Pelunasan" },
            { title: "Id. Bank", data: "Id_bank" },
            { title: "Jenis Pembayaran", data: "Jenis_Pembayaran" },
            { title: "Mata Uang", data: "Nama_MataUang" },
            { title: "Total Pelunasan", data: "Nilai_Pelunasan" },
            { title: "No. Bukti", data: "No_Bukti" },
        ],
    });
}

function updateKpColumn(kodePerkiraanSelect, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
      // Get the DataTable row object for the selected row index
      const row = dataTable2.row(rowIdx);
      if (row) {
        // Get the current data for the row
        const rowData = row.data();
        const selectedValue = kodePerkiraanSelect.split("|");
        const idKpValue = selectedValue[0];

        rowData["Kode_Perkiraan"] = idKpValue;
        row.data(rowData).draw();
      }
    });
}

function updateKpColumn2(kodePerkiraanKrgLbhSelect, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
      // Get the DataTable row object for the selected row index
      const row = dataTable3.row(rowIdx);
      if (row) {
        // Get the current data for the row
        const rowData = row.data();
        const selectedValue = kodePerkiraanKrgLbhSelect.split("|");
        const idKpValue = selectedValue[0];

        rowData["Kode_Perkiraan"] = idKpValue;
        row.data(rowData).draw();
      }
    });
}

function updateKpColumn3(kodePerkiraanBiayaSelect, selectedRows) {
    // Loop through each selected row index and update the data for the specific column
    selectedRows.forEach((rowIdx) => {
      // Get the DataTable row object for the selected row index
      const row = dataTable4.row(rowIdx);
      if (row) {
        // Get the current data for the row
        const rowData = row.data();
        const selectedValue = kodePerkiraanBiayaSelect.split("|");
        const idKpValue = selectedValue[0];

        rowData["Kode_Perkiraan"] = idKpValue;
        row.data(rowData).draw();
      }
    });
}

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
