$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});

$(document).ready(function() {
    // Menambahkan event handler ke tombol "Simpan"
    $('#simpanButton').on('click', function() {
        // Di sini Anda dapat memeriksa apakah simpan berhasil atau tidak
        var simpanBerhasil = true; // Gantilah dengan logika sesuai kebutuhan Anda

        if (simpanBerhasil) {
            // Jika simpan berhasil, tampilkan pesan alert sukses
            alert('Setting Timbangan Tersimpan, Sebelum Digunakan Tutup Dulu Aplikasi Ini Kemudian Buka Kembali');
        } else {
            // Jika simpan gagal, tampilkan pesan alert gagal
            alert('Gagal menyimpan timbangan. Silakan coba lagi.');
        }
    });
});
