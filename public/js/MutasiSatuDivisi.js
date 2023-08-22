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

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')
    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
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
});

function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
