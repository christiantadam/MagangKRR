$(document).ready(function () {
    // Dropdown submenu click handler
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    // DataTable initialization for TableType
    $('#TableType').DataTable({
        order: [[0, 'desc']],
    });

    // Event listeners for buttons
    document.getElementById('ButtonShift').addEventListener("click", function (event) {
        event.preventDefault();
    });

    document.getElementById('ButtonType').addEventListener("click", function (event) {
        event.preventDefault();
    });

    document.getElementById('ButtonJumlahBarang').addEventListener("click", function (event) {
        event.preventDefault();
    });

    document.getElementById('tanggalInput').addEventListener('change', function () {
        // Get the selected date
        const selectedDate = this.value;

        // Update the output/input field with the selected date
        document.getElementById('tanggalOutput').value = selectedDate;
    });

    var BarcodeInput = document.getElementById('BarcodeInput');
    BarcodeInput.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var BarcodeInput = document.getElementById('BarcodeInput');
            var str = BarcodeInput.value;
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/BalJadiPalet/" + parts[0] + "." + parts[1] + ".getBarcode")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Handle the data retrieved from the server (data should be an object or an array)
                    console.log(data);
                    // Clear the existing table rows
                    $("#TableType1").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var kodebarcode = parts[0] + "-" + parts[1]
                        var row = [kodebarcode, item.qty_primer, item.qty_sekunder, item.qty];
                        $("#TableType1").DataTable().row.add(row);
                        $("#Primer").val(item.qty_primer)
                        $("#Sekunder").val(item.qty_sekunder)
                        $("#Tritier").val(item.qty)
                    });

                    // Redraw the table to show the changes
                    $("#TableType1").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });


    var ButtonPrintBarcodeKonversi = document.getElementById('ButtonPrintBarcodeKonversi');
    ButtonPrintBarcodeKonversi.addEventListener("click", function (event) {
        // Mengatur tombol menjadi tidak dapat diakses (disabled)
        // ButtonPrintBarcode.disabled = true;

        // Mendapatkan tanggal paling baru setiap hari
        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
        var day = currentDate.getDate().toString().padStart(2, '0');
        var tanggalSekarang = year + '-' + month + '-' + day;

        var getBarcodePrintUlang = document.getElementById('BarcodeInput');
        var str = getBarcodePrintUlang.value
        var parts = str.split("-");
        console.log(parts);

        // Lakukan operasi pencetakan barcode
        var idtypeasal = '0011';
        var idtypetujuan = '0017';
        var userid = 'U001';
        var tanggal = tanggalSekarang;
        var jumlahmasukprimer = document.getElementById('Primer').value;
        var jumlahmasuksekunder = document.getElementById('Sekunder').value;
        var jumlahmasuktertier = document.getElementById('Tritier').value;
        var asalidsubkelompok = 'SKL16';
        var tujuanidsubkelompok = 'SKL16';
        var kodebarangasal = parts[0];
        var kodebarangtujuan = parts[0];
        var noindeksasal = parts[1];
        var uraian = 'Pagi';

        // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
        fetch("/BalJadiPalet/" + idtypeasal + "." + idtypetujuan + "." + userid + "." +
            tanggal + "." + jumlahmasukprimer + "." + jumlahmasuksekunder + "." + jumlahmasuktertier + "." +
            asalidsubkelompok + "." + tujuanidsubkelompok + "." + kodebarangasal + "." + kodebarangtujuan + "."
            + noindeksasal + "." + uraian + "." + ".buatBarcode")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                console.log(data);
                if (data === true) {
                    // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
                    console.log("Barcode berhasil dibuat.");
                    alert('Barcode berhasil dibuat.');

                    // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
                    fetch("/BuatBarcode/" + kodebarang + ".getIndex")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then((data) => {
                            // Handle data yang diterima dari fetch kedua di sini
                            console.log("Data dari fetch kedua:", data);
                            var kodebarcode = kodebarang.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
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

// Functions for opening and closing modals
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

function openModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function setShiftValue() {
    const selectedShift = document.getElementById("Shift").value;
    document.getElementById("shift").value = selectedShift;

    closeModal();
}
// Rest of your JavaScript code for handling modals and other functionality can be placed here
// Make sure you have already defined the functions: openModal, closeModal, etc.

