$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $("#TableSubKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#TableSubKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='ID_Subkelompok']").val(rowData[0]);
        $("input[name='Subkelompok']").val(rowData[1]);

        $("input[name='ID_Kelompok']").val("6493");
        $("input[name='Kelompok']").val("Roll Sisa Potong");

        fetch("/ABM/BarcodeRollWoven/BRS/" + rowData[0] + ".txtType")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableType").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.IdType, item.NamaType];
                    $("#TableType").DataTable().row.add(row);
                });
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableType').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='IdType']").val(rowData[0]);
        $("input[name='Type']").val(rowData[1]);
        fetch("/ABM/BarcodeRollWoven/BRS/" + rowData[0] + ".getTampil")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                data.forEach((item) => {
                    $("#Barang").val(item.KodeBarang)
                    $("#stok_Primer").val((item.SaldoPrimer && item.SatPrimer) ? item.SaldoPrimer + " " + item.SatPrimer : "");
                    $("#stok_Sekunder").val((item.SaldoSekunder  && item.SatSekunder) ? item.SaldoSekunder + " " + item.SatSekunder : "");
                    $("#stok_Tritier").val((item.SaldoTritier  && item.SatTritier) ? item.SaldoTritier + " " + item.SatTritier : "");
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');
    ButtonPrintBarcode.addEventListener("click", function (event) {
        // Mengatur tombol menjadi tidak dapat diakses (disabled)
        ButtonPrintBarcode.disabled = true;

        // var getBarcodePrintUlang = document.getElementById('BarcodeInput');
        // var str = getBarcodePrintUlang.value
        // var parts = str.split("-");
        // console.log(parts);

        // Lakukan operasi pencetakan barcode
        var idtype = type;
        var tanggal = document.getElementById('tanggalOutput').value;
        var primer = document.getElementById('Primer').value;
        var sekunder = document.getElementById('SekunderOutput').value;
        var tritier = document.getElementById('tritier').value;
        var UserID = '4384';
        var asalidsubkelompok = subKelompok;
        var Kode_Barang = kodebarang;
        var uraian = document.getElementById('shift').value;
        var idsubkontraktor = kodebarang;

        // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
        fetch("/ABM/BarcodeKerta2/BuatBarcode/" + idtype + "." + UserID + "." + tanggal + "." +
            primer + "." + sekunder + "." + tritier + "." + asalidsubkelompok + "." +
            idsubkontraktor + "." + Kode_Barang + "." + uraian + "." + ".buatBarcode")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                if (data === true) {
                    // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
                    console.log("Barcode berhasil dibuat.");
                    alert('Barcode berhasil dibuat.');

                    // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
                    fetch("/ABM/BarcodeKerta2/BuatBarcode/" + kodebarang + ".getIndex")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then((data) => {
                            // Handle data yang diterima dari fetch kedua di sini
                            console.log("Data dari fetch kedua:", data);
                            var kodebarcode = Kode_Barang.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
                            console.log(kodebarcode);
                            // Show an alert for each 'kodebarang'
                            alert('Kode Barang: ' + kodebarcode);
                        })
                        .catch((error) => {
                            console.error("Error dalam fetch kedua:", error);
                        });
                } else {
                    console.error("Unexpected response data:", data);
                    // Handle other unexpected responses here
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});

function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

// var ButtonShift = document.getElementById('ButtonShift')
// ButtonShift.addEventListener("click", function(event) {
//     event.preventDefault();
// });

function setShiftValue() {
    // Mendapatkan nilai shift yang dipilih dari dropdown
    var selectedShift = document.getElementById('Shift').value;

    // Menetapkan nilai shift ke dalam input field
    document.getElementById('shiftInput').value = selectedShift;

    // Menutup modal setelah memilih shift
    closeModal();
}
