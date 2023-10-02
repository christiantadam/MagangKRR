$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    const fs = require('fs');


    $('#simpanButton').on('click', function () {
        // Di sini Anda dapat memeriksa apakah simpan berhasil atau tidak
        var simpanBerhasil = true; // Gantilah dengan logika sesuai kebutuhan Anda

        if (simpanBerhasil) {
            // Jika simpan berhasil, tampilkan pesan alert sukses
            alert('Setting Timbangan Tersimpan, Sebelum Digunakan Tutup Dulu Aplikasi Ini Kemudian Buka Kembali');
        } else {
            // Jika simpan gagal, tampilkan pesan alert gagal
            alert('Gagal menyimpan timbangan. Silakan coba lagi.');
        }
        btnSimpan_Click()
    });
});

function btnSimpan_Click() {
    const fileName = 'timbangan.txt';
    const data = rd500.checked ? '9600,N,8,1' : '9600,e,7,1';

    fs.writeFileSync(fileName, data);

    alert('Setting Timbangan Tersimpan, Sebelum Digunakan Tutup Dulu Aplikasi Ini Kemudian Buka Kembali');
}
