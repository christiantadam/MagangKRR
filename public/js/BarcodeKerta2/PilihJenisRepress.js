$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableObjek').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType').DataTable({
        "scrollX": true,
        order: [
            [0, 'desc']
        ],
    });

    $('#TableBarcode').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi').val(rowData[0]);
        $('#Divisi').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#NamaObjek').val(rowData[1]);

        var txtIdObjek = document.getElementById('IdObjek');
        fetch("/ABM/PilihJenisRepress/" + txtIdObjek.value + ".txtIdObjek")
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
                $("#TableType").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.IdTransaksi, item.namakelompokutama, item.namakelompok, item.namasubkelompok, item.NamaType, item.UraianDetailTransaksi, item.NamaUser, item.JumlahPengeluaranPrimer, item.JumlahPengeluaranSekunder, item.JumlahPengeluaranTritier, "", item.SaatAwalTransaksi];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonObjek = document.getElementById('ButtonObjek')

    ButtonObjek.addEventListener("click", function (event) {
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
    fetch("/ABM/PilihJenisRepress/" + txtIdDivisi.value + ".getXIdDivisi")
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
            $("#TableObjek").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdObjek, item.NamaObjek];
                $("#TableObjek").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableObjek").DataTable().draw();
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
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
