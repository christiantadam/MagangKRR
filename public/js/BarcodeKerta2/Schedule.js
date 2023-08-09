$(document).ready(function () {
    $("#TableType").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableSubKelompok").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableKelompok").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableKelut").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableDivisi").DataTable({
        order: [[0, "desc"]],
    });

    $("#TypeTable").DataTable({
        order: [[0, "desc"]],
    });
    $(".dropdown-submenu a.test").on("click", function (e) {
        $(this).next("ul").toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    // Add an event listener to the "Hapus" button
    $("#DeleteButton").on("click", function () {
        var table = $("#TypeTable").DataTable();
        var selectedRows = table.rows(".selected");

        // Remove selected rows from the DataTable
        selectedRows.remove().draw();
        event.preventDefault();
    });
    // Add an event listener to the "Pilih Semua" button
    $("#SelectAllButton").on("click", function () {
        var table = $("#TypeTable").DataTable();
        table.rows().select();
        event.preventDefault();
    });
    $("#TypeTable tbody").on("click", "tr", function () {
        // Check if the clicked row is already selected
        if ($(this).hasClass("selected")) {
            // If it's already selected, remove the 'selected' class
            $(this).removeClass("selected");

            // Hide the modal (if needed)
            closeModal4();
        } else {
            // Remove 'selected' class from all rows
            $("#TypeTable tbody tr").removeClass("selected");

            // Add 'selected' class to the clicked row
            $(this).addClass("selected");

            var rowData = $("#TableType").DataTable().row(this).data();

            // Populate the input fields with the data
            $("#id_Type").val(rowData[0]);
            $("#Type").val(rowData[1]);

            // Hide the modal (if needed)
            closeModal4();
        }
    });
    $("#TableDivisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisi").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdDivisi").val(rowData[0]);
        $("#Divisi").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    $("#TableKelut tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelut").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_Kelut").val(rowData[0]);
        $("#Kelut").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $("#TableKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_Kelompok").val(rowData[0]);
        $("#Kelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    $("#TableSubKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableSubKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_SubKelompok").val(rowData[0]);
        $("#Sub_kelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal3();
    });

    $("#TableType tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableType").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_Type").val(rowData[0]);
        $("#Type").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal4();
    });

    var ButtonDivisi = document.getElementById("ButtonDivisi");

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelut = document.getElementById("ButtonKelut");

    ButtonKelut.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelompok = document.getElementById("ButtonKelompok");

    ButtonKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonSubKelompok = document.getElementById("ButtonSubKelompok");

    ButtonSubKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonType = document.getElementById("ButtonType");

    ButtonType.addEventListener("click", function (event) {
        event.preventDefault();
    });

    function addDataToTable() {
        // Extract data from input fields
        var divisi = document.getElementById('Divisi').value;
        var kelut = document.getElementById('Kelut').value;
        var kelompok = document.getElementById('Kelompok').value;
        var subKelompok = document.getElementById('Sub_kelompok').value;
        var type = document.getElementById('Type').value;

        // Get the DataTable instance
        var table = $('#TypeTable').DataTable();

        // Add the new row to the DataTable
        table.row.add([divisi, kelut, kelompok, subKelompok, type]).draw();
    }

    // Add an event listener to the "Tambah" button
    var tambahButton = document.getElementById('TambahButton');
    tambahButton.addEventListener('click', function(event) {
        event.preventDefault();
        addDataToTable();
    });


});
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById("myModal2");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById("myModal2");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal3() {
    var modal = document.getElementById("myModal3");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal3() {
    var modal = document.getElementById("myModal3");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal4() {
    var modal = document.getElementById("myModal4");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal4() {
    var modal = document.getElementById("myModal4");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}
