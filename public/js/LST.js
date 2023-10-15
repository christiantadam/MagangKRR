$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $("#TableDivisiPengiriman").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableDivisiPenerima").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableObjek").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableABM").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableADS").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableADSMOJO").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableDivisiPengiriman tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisiPengiriman").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdDivisi_pengiriman").val(rowData[0]);
        $("#Divisi_pengiriman").val(rowData[1]);

    });

    $('#TableDivisiPenerima tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableDivisiPenerima').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi_penerima').val(rowData[0]);
        $('#Divisi_penerima').val(rowData[1]);

    });

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#Objek').val(rowData[1]);

    });

    // Function to hide extend cards
    function hideExtendCards() {
        var extendCards = document.querySelectorAll(".extend-card");
        extendCards.forEach(function (card) {
            card.style.display = "none";
        });
    }

    // Call the function to hide extend cards
    hideExtendCards();
});

function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdDivisi = document.getElementById('IdDivisi_pengiriman');
    fetch("/ABM/LST/" + txtIdDivisi.value + ".getXIdDivisi")
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

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
