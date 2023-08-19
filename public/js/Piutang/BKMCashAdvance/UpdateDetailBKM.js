let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
var arrIdPelunasan = [];

let btnOK = document.getElementById("btnOK");

btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
    fetch("/detailtabelpelunasan/" + bulan.value + "/" + tahun.value)
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
})

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
            { title: "No. Bukti", data: "No_Bukti" }
        ],
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
