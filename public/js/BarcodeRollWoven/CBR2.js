$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});

$(document).ready(function () {
    // Menambahkan event handler ke tombol "Print"
    $('#printButton').on('click', function () {
        // Mendapatkan nilai dari input Barcode
        var barcodeValue = $('#Barcode').val().trim();

        // Memeriksa apakah input Barcode kosong
        if (barcodeValue === '') {
            // Jika kosong, tampilkan alert
            alert('Scan Barcode Yang Akan diPrint...!');
        } else {
            // Jika tidak kosong, lanjutkan dengan tindakan yang diinginkan, misalnya, mencetak
            // Implementasikan tindakan cetak di sini
        }
    });
});
