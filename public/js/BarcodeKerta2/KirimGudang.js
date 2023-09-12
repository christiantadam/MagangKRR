$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#RekapKirim').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#DaftarKirim').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableProcess').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableSP').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
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

    var ButtonProcess = document.getElementById('ButtonProcess')
    ButtonProcess.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonSP = document.getElementById('ButtonSP')
    ButtonSP.addEventListener("click", function (event) {
        event.preventDefault();
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
    // let No_barcode = document.getElementById("No_barcode");
    // let s = "";
    // s += String.fromCharCode(27) + "D0451,0975,0421" + String.fromCharCode(10) + String.fromCharCode(0);
    // s += String.fromCharCode(27) + "C" + String.fromCharCode(10) + String.fromCharCode(0);
    // s += String.fromCharCode(27) + "U2;0160" + String.fromCharCode(10) + String.fromCharCode(0);

    // No_barcode.value = s;
    // // No_barcode.value = "abc";
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
    fetch("/KirimGudang/" + IdDiv + ".getKelut")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableKelut").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdKelompokUtama, item.NamaKelompokUtama];
                $("#TableKelut").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableKelut").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
