$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    var Barcode = document.getElementById('Barcode');
    Barcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var getBarcodePrintUlang = document.getElementById('Barcode');
            var str = getBarcodePrintUlang.value
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/PrintUlang/" + parts[0] + "." + parts[1] + ".getBarcodePrintUlang")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var row = [item.NoIndeks, item.Kode_barang, item.NamaType, item.Qty_Sekunder, item.Qty, item.SatSekunder, item.SatTritier];
                        $("#Item").val(item.NoIndeks)
                        $("#Kode").val(item.Kode_barang)
                        $("#nama_type").val(item.NamaType)
                        $("#Sekunder").val(item.Qty_Sekunder + " " + item.SatSekunder)
                        $("#Tritier").val(item.Qty + " " + item.SatTritier)
                    });

                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });

    $(document).ready(function () {
        // Select semua tombol
        var timbangButton = document.getElementById('timbangButton');
        var printUlangButton = document.getElementById('printUlangBtn');
        var scanBarcodeButton = document.getElementById('scanBarcodeBtn');

        // Fungsi yang dijalankan saat tombol Enter ditekan di dalam input barcode
        var Barcode = document.getElementById('Barcode');
        Barcode.addEventListener("keypress", function (event) {
            if (event.key == "Enter") {
                var getBarcodePrintUlang = document.getElementById('Barcode');
                var str = getBarcodePrintUlang.value
                var parts = str.split("-");

                if (parts.length !== 2) {
                    // Tampilkan alert jika format barcode salah
                    alert('Barcode Tidak Bisa Di Print Ulang.');
                    return;
                }

                // Aktifkan semua tombol setelah barcode diisi dengan benar
                timbangButton.removeAttribute('disabled');
                printUlangButton.removeAttribute('disabled');
                // scanBarcodeButton.removeAttribute('disabled'); // Remove this line
            }
        });

        // Tombol "Print Ulang" event handler
        var printUlangButton = document.getElementById('printUlangBtn');
        printUlangButton.addEventListener("click", function () {
            // Lakukan tindakan yang diperlukan saat tombol "Print Ulang" ditekan

            // Aktifkan tombol "Scan Barcode" setelah tombol "Print Ulang" ditekan
            scanBarcodeButton.removeAttribute('disabled');
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
