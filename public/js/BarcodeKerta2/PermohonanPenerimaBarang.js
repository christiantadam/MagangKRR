$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableTransaksi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableTypeBarang').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableNamaBarang').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePenerimaSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePemberiSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePemberiKelut').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePenerimaKelut').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePemberiObjek').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePenerimaObjek').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePemberiDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePenerimaDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePemberiKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TablePenerimaKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    // Mendapatkan elemen input tanggal
    var inputTanggal = document.getElementById('Jenis');

    // Mendapatkan tanggal dan waktu saat ini
    var tanggalSekarang = new Date();

    // Mengubah tanggal dan waktu saat ini menjadi format tanggal HTML yang valid (YYYY-MM-DD)
    var tanggalFormat = tanggalSekarang.toISOString().slice(0, 10);

    // Mengatur nilai input tanggal dengan tanggal saat ini
    inputTanggal.value = tanggalFormat;

    $('#TablePemberiDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePemberiDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi2').val(rowData[0]);
        $('#Divisi2').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal7();
    });

    $('#TablePenerimaDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePenerimaDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi').val(rowData[0]);
        $('#Divisi').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    $('#TablePemberiObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePemberiObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek2').val(rowData[0]);
        $('#Objek2').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal8();
    });

    $('#TablePenerimaObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePenerimaObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#Objek').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TablePemberiKelut tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePemberiKelut').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdKelompokUtama2').val(rowData[0]);
        $('#NamaKelompokUtama2').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal9();
    });

    $('#TablePenerimaKelut tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePenerimaKelut').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdKelompokUtama').val(rowData[0]);
        $('#NamaKelompokUtama').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    $('#TablePemberiKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePemberiKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdKelompok2').val(rowData[0]);
        $('#Kelompok2').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal10();
    });

    $('#TablePenerimaKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePenerimaKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdKelompok').val(rowData[0]);
        $('#NamaKelompok').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal3();
    });

    $('#TablePenerimaSubKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePenerimaSubKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdSubKelompok').val(rowData[0]);
        $('#NamaSubKelompok').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal4();
    });

    $('#TablePemberiSubKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TablePemberiSubKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdSubKelompok2').val(rowData[0]);
        $('#SubKelompok2').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal11();
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonObjek = document.getElementById('ButtonObjek')

    ButtonObjek.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelut = document.getElementById('ButtonKelut')

    ButtonKelut.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelompok = document.getElementById('ButtonKelompok')

    ButtonKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonSubKelompok = document.getElementById('ButtonSubKelompok')

    ButtonSubKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonNamaBarang = document.getElementById('ButtonNamaBarang')

    ButtonNamaBarang.addEventListener("click", function (event) {
        event.preventDefault();
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
    var txtIdDivisi = document.getElementById('IdDivisi');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdDivisi.value + ".getXIdDivisi")
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
            $("#TablePenerimaObjek").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdObjek, item.NamaObjek];
                $("#TablePenerimaObjek").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TablePenerimaObjek").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdObjek = document.getElementById('IdObjek');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdObjek.value + ".getXIdObjek_KelompokUtama")
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
            $("#TablePenerimaKelut").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdKelompokUtama, item.NamaKelompokUtama];
                $("#TablePenerimaKelut").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TablePenerimaKelut").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdKelompokUtama = document.getElementById('IdKelompokUtama');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdKelompokUtama.value + ".XIdKelompokUtama_Kelompok")
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
            $("#TablePenerimaKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.idkelompok, item.namakelompok];
                $("#TablePenerimaKelompok").DataTable().row.add(row);
            });
            // Redraw the table to show the changes
            $("#TablePenerimaKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdKelompok = document.getElementById('IdKelompok');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdKelompok.value + ".XIdKelompok_SubKelompok")
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
            $("#TablePenerimaSubKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdSubkelompok, item.NamaSubKelompok];
                $("#TablePenerimaSubKelompok").DataTable().row.add(row);
            });
            // Redraw the table to show the changes
            $("#TablePenerimaSubKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal5() {
    var modal = document.getElementById('myModal5');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal5() {
    var modal = document.getElementById('myModal5');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal6() {
    var modal = document.getElementById('myModal6');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal6() {
    var modal = document.getElementById('myModal6');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal7() {
    var modal = document.getElementById('myModal7');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal7() {
    var modal = document.getElementById('myModal7');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal8() {
    var modal = document.getElementById('myModal8');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdDivisi = document.getElementById('IdDivisi2');
    console.log(txtIdDivisi.value);
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdDivisi.value + ".getXIdDivisi")
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
            $("#TablePemberiObjek").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdObjek, item.NamaObjek];
                $("#TablePemberiObjek").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TablePemberiObjek").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal8() {
    var modal = document.getElementById('myModal8');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal9() {
    var modal = document.getElementById('myModal9');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdObjek = document.getElementById('IdObjek2');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdObjek.value + ".getXIdObjek_KelompokUtama")
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
            $("#TablePemberiKelut").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdKelompokUtama, item.NamaKelompokUtama];
                $("#TablePemberiKelut").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TablePemberiKelut").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal9() {
    var modal = document.getElementById('myModal9');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal10() {
    var modal = document.getElementById('myModal10');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdKelompokUtama = document.getElementById('IdKelompokUtama2');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdKelompokUtama.value + ".XIdKelompokUtama_Kelompok")
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
            $("#TablePemberiKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.idkelompok, item.namakelompok];
                $("#TablePemberiKelompok").DataTable().row.add(row);
            });
            // Redraw the table to show the changes
            $("#TablePemberiKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal10() {
    var modal = document.getElementById('myModal10');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal11() {
    var modal = document.getElementById('myModal11');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdKelompok = document.getElementById('IdKelompokUtama2');
    fetch("/ABM/PermohonanPenerimaBarang/" + txtIdKelompok.value + ".XIdKelompok_SubKelompok")
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
            $("#TablePemberiSubKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdSubkelompok, item.NamaSubKelompok];
                $("#TablePemberiSubKelompok").DataTable().row.add(row);
            });
            // Redraw the table to show the changes
            $("#TablePemberiSubKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal11() {
    var modal = document.getElementById('myModal11');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal12() {
    var modal = document.getElementById('myModal12');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal12() {
    var modal = document.getElementById('myModal12');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

document.addEventListener("DOMContentLoaded", function () {
    var hiddenTable = document.getElementById('hiddenTable');
    hiddenTable.style.display = 'block'; // Tampilkan tabel type saat halaman pertama kali dibuka

    var hiddenSection = document.getElementById('hiddenSection');
    hiddenSection.style.display = 'none'; // Sembunyikan pemberi barang2 saat halaman pertama kali dibuka
});

function toggleHiddenTable() {
    var hiddenTable = document.getElementById('hiddenTable');
    var hiddenSection = document.getElementById('hiddenSection');
    const batalButton = document.getElementById('batalButton');
    const keluarButton = document.getElementById('keluarButton');
    batalButton.classList.remove("d-none");
    keluarButton.classList.add("d-none");

    hiddenTable.style.display = 'none'; // Tampilkan tabel type saat tombol "Isi" ditekan
    hiddenSection.style.display = 'block'; // Sembunyikan pemberi barang2 saat tombol "Isi" ditekan

}

function toggleHiddenTable2() {
    var hiddenTable = document.getElementById('hiddenTable');
    var hiddenSection = document.getElementById('hiddenSection');
    const batalButton = document.getElementById('batalButton');
    const keluarButton = document.getElementById('keluarButton');
    batalButton.classList.add("d-none");
    keluarButton.classList.remove("d-none");

    hiddenTable.style.display = 'block'; // Sembunyikan tabel type saat tombol "Isi" ditekan lagi
    hiddenSection.style.display = 'none'; // Tampilkan pemberi barang2 saat tombol "Isi" ditekan lagi

}
