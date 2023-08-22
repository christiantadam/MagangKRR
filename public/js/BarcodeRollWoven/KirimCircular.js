$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableKelut').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TypeTable').DataTable({

        order: [
            [0, 'desc']
        ],
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonKelut = document.getElementById('ButtonKelut')

    ButtonKelut.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelompok = document.getElementById('ButtonKelompok')

    ButtonKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $("#TableKelut tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelut").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdKelut").val(rowData[0]);
        $("#Kelut").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    $("#TableKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdKelompok").val(rowData[0]);
        $("#Kelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $("#TableSubKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableSubKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdSubKelompok").val(rowData[0]);
        $("#SubKelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal2();
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
