// // Click event handler for table rows
$('#tbl_customer tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var idcust = $(this).data('idcust');
    var namacust = $(this).data('namacust');
    // var idbrng = $(this).data('idbrng');

    // Populate the form fields with the data
    $('#idcust').val(idcust);
    $('#namacust').val(namacust);
});

// // Click event handler for table rows
$('#tbl_noordkrj tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var NAMA_BRG = $(this).data('NAMA_BRG');
    var No_Order = $(this).data('No_Order');
    // var idbrng = $(this).data('idbrng');

    // Populate the form fields with the data
    $('#NAMA_BRG').val(NAMA_BRG);
    $('#No_Order').val(No_Order);
});

const ldBrng = document.getElementById('ld-Brng')


ldBrng.addEventListener("click", function () {
    var idcust = document.getElementById('idcust');
    fetch("/MnOrdPrs/" + idcust.value + ".dataBrng")
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
            $("#tbl_nmbrng").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.NamaType, item.KodeBarang];
                $("#tbl_nmbrng").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tbl_nmbrng").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

const idstkordsblm = document.getElementById('id-stkordsblm')


idstkordsblm.addEventListener("click", function () {
    var idcust = document.getElementById('idcust');
    fetch("/MnOrdPrs/" + idcust.value + ".dataSrtPsn")
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
            $("#tbl_stkordsblm").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.No_Sp, item.TglOrder];
                $("#tbl_stkordsblm").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tbl_stkordsblm").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
