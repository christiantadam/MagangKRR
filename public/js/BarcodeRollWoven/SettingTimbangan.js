$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    // $('#simpanButton').on('click', function () {
    //     // Di sini Anda dapat memeriksa apakah simpan berhasil atau tidak
    //     var simpanBerhasil = true; // Gantilah dengan logika sesuai kebutuhan Anda

    //     if (simpanBerhasil) {
    //         // Jika simpan berhasil, tampilkan pesan alert sukses
    //         alert('Setting Timbangan Tersimpan, Sebelum Digunakan Tutup Dulu Aplikasi Ini Kemudian Buka Kembali');
    //     } else {
    //         // Jika simpan gagal, tampilkan pesan alert gagal
    //         alert('Gagal menyimpan timbangan. Silakan coba lagi.');
    //     }
    // });

    document.getElementById("btnKeluar").addEventListener("click", function() {
        window.close();
    });

    document.addEventListener("DOMContentLoaded", function() {
        var timbangan = ""; // Gantilah dengan logika yang sesuai untuk menginisialisasi variabel timbangan

        if (timbangan.trim() === "9600,N,8,1") {
            document.getElementById("rd500").checked = true;
        } else {
            document.getElementById("rd1000").checked = true;
        }
    });

    document.getElementById("btnSimpan").addEventListener("click", function() {
        var x;

        if (document.getElementById("rd500").checked) {
            x = "9600,N,8,1";
        } else {
            x = "9600,e,7,1";
        }

        var blob = new Blob([x], { type: 'text/plain' });

        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = 'timbangan.txt';
        a.style.display = 'none';
        document.body.appendChild(a);

        a.click();

        window.URL.revokeObjectURL(a.href);
        document.body.removeChild(a);

        alert("Setting Timbangan Tersimpan, Sebelum Digunakan Tutup Dulu Aplikasi Ini Kemudian Buka Kembali");
    });

    // $('#simpanButton').on('click', function () {
    //     var timbangan = $('input[name="timbangan"]:checked').val();
    //     event.preventDefault();
    //     // Kirim data ke kontroler melalui AJAX
    //     let csrfToken = document
    //     .querySelector('meta[name="csrf-token"]')
    //     .getAttribute("content");

    //     $.ajax({
    //         url: '/simpan_data/',
    //         method: 'POST',
    //         data: {
    //             timbangan: timbangan,
    //             _token: csrfToken // Add this line
    //         },
    //         success: function (response) {
    //             alert(response.message);
    //         },
    //         error: function () {
    //             alert('Gagal menyimpan timbangan. Silakan coba lagi.');
    //         }
    //     });
    // });

    // $('#simpanButton').on('click', function () {
    //     var selectedValue = $("input[name='unit']:checked").val();
    //     var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Ambil token CSRF

    //     var form = document.createElement("form");
    //     form.setAttribute("method", "POST");
    //     form.setAttribute("action", "/pengaturan"); // Ganti dengan URL yang sesuai

    //     // Input untuk CSRF Token
    //     var csrfInput = document.createElement("input");
    //     csrfInput.setAttribute("type", "hidden");
    //     csrfInput.setAttribute("name", "_token");
    //     csrfInput.value = csrfToken;
    //     form.appendChild(csrfInput);

    //     // Input untuk data timbangan
    //     var timbanganInput = document.createElement("input");
    //     timbanganInput.setAttribute("type", "hidden");
    //     timbanganInput.setAttribute("name", "timbangan");
    //     timbanganInput.value = selectedValue;
    //     form.appendChild(timbanganInput);

    //     document.body.appendChild(form);

    //     form.submit();
    // });
});

// function btnSimpan_Click() {
//     const fileName = 'timbangan.txt';
//     const data = rd500.checked ? '9600,N,8,1' : '9600,e,7,1';

//     fs.writeFileSync(fileName, data);

//     alert('Setting Timbangan Tersimpan, Sebelum Digunakan Tutup Dulu Aplikasi Ini Kemudian Buka Kembali');
// }
