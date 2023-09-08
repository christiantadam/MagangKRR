// // Click event handler for table customer
$('#tbl_customer tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var idcust = $(this).data('idcust');
    var namacust = $(this).data('namacust');
    $('#idcust').val(idcust);
    $('#namacust').val(namacust);
});

// // Click event handler for table barang
$('#tbl_nmbrng tbody').on('click', 'tr', function () {
    // Get the data from the clicked row
    var rowData = $("#tbl_nmbrng").DataTable().row(this).data();
    $('#kd_brng').val(rowData[1]);
    $('#nm_type').val(rowData[0]);
});

// // Click event handler for surat pesanan
$('#tbl_srtpsn tbody').on('click', 'tr', function () {
    // Get the data from the clicked row
    var rowData = $("#tbl_srtpsn").DataTable().row(this).data();
    $('#idsurat').val(rowData[0]);
    $('#qty_ordr').val(rowData[1]);
});

// // Click event handler for table no order kerja
$('#tbl_noordkrj tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var rowData = $("#tbl_noordkrj").DataTable().row(this).data();
    $('#inputNoOrder').val(rowData[1]);
});

//fetch untuk barang
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

//fetch untuk surat pesanan
const ld_srtpsn = document.getElementById('ld_srtpsn')

ld_srtpsn.addEventListener("click", function () {
    var kd_brng = document.getElementById('kd_brng');
    var idcust = document.getElementById('idcust');
    fetch("/MnOrdPrs/" + idcust.value +"."+ kd_brng.value + ".dataSrtPsn")
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
            $("#tbl_srtpsn").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IDSuratPesanan, item.Qty];
                $("#tbl_srtpsn").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tbl_srtpsn").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});


//fetch untuk stok order sebelum
const idstkordsblm = document.getElementById('id-stkordsblm')

idstkordsblm.addEventListener("click", function () {
    var kd_brng = document.getElementById('kd_brng');
    fetch("/MnOrdPrs/" + kd_brng.value + ".datastkordsblm")
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
