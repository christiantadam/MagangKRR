$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $(document).ready(function() {
        var table = $('#TableType').DataTable({
            order: [
                [0, 'desc']
            ],
        }); // Initialize DataTable

        var rowCount = table.rows().count();
        $('#total').val(rowCount);

        console.log("Number of rows:", rowCount);
    });

    var ButtonProcess = document.getElementById('ButtonProcess')

    ButtonProcess.addEventListener("click", function (event) {
        event.preventDefault();
        var get_tgl_total_barcode = document.getElementById('tgl_total_barcode');
        fetch("/TotalBarcode/" + get_tgl_total_barcode.value + ".get_tgl_total_barcode")
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
                    var row = [item.IdSubkontraktor, item.NamaType, item.Primer, item.Sekunder, item.Tritier];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});

