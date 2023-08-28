let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataBKM = document.getElementById('tabelDataBKM');
let tabelRincianData = document.getElementById('tabelRincianData');
let btnOK = document.getElementById("btnOK");
let dataTable;
let dataTable2;

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
                        { title: "Tgl. BKM", data: "Tgl_Input" },
                        { title: "Nilai Pelunasan", data: "Total" },
                    ],
                });
            });
});

$("#tabelDataBKM tbody").off("click", "input[type='checkbox'");
$("#tabelDataBKM tbody").off("change", "input[type='checkbox']");
$("#tabelDataBKM tbody").on("change", "input[type='checkbox']", function () {
});
$("#tabelDataBKM tbody").on("click", "input[type='checkbox']", function (event) {
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
                    console.log();
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
                        ],
                    });
                    // Setelah fetch selesai, masukkan data detail pelunasan ke dalam tabelDetailPelunasan
                    dataTable2.clear().rows.add(options).draw();
                });
        }
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
}
