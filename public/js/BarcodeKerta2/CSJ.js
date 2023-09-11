$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TypeTable').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableOpenSJ').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    var SJ = document.getElementById('SJ');
    SJ.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $(document).ready(function () {
        // ... kode lainnya ...

        // Mendapatkan elemen input tanggal
        var tanggalInput = document.getElementById('tgl');

        // Mendapatkan tanggal saat ini
        var today = new Date();

        // Format tanggal menjadi YYYY-MM-DD (sesuai dengan format input tanggal)
        var formattedDate = today.toISOString().slice(0, 10);

        // Set nilai input tanggal ke tanggal saat ini
        tanggalInput.value = formattedDate;

        // ... kode lainnya ...
    });

    $(document).ready(function () {
        // Add a click event listener to rows in the TableOpenSJ table
        $('#TableOpenSJ tbody').on('click', 'tr', function () {
            // Get the data from the clicked row
            var rowData = $("#TableOpenSJ").DataTable().row(this).data();

            // Extract the No SJ value (assuming it's in the first column)
            var noSJ = rowData[0]; // Adjust the index as needed

            // Set the No SJ value in the Surat_jalan input field
            $('#Surat_jalan').val(noSJ);
        });
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
    fetch("/CSJ/" + ".getSJ")
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
                $("#TableOpenSJ").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    console.log();
                    var row = [item.No_SJ, item.Tgl_Terima];
                    $("#TableOpenSJ").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableOpenSJ").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
