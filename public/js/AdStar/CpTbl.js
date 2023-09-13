const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Mematikan semua checkbox
            checkboxes.forEach(function(cb) {
                if (cb !== this) {
                    cb.checked = false;
                }
            }, this);
        });
    });

//--------------------------------------------------------------------------------------//

$('#tbl_customer1 tbody').on('click', 'tr', function () {
    // Get the data from the clicked row
    var rowData = $("#tbl_customer1").DataTable().row(this).data();
    // var idbrng = $(this).data('idbrng');
    // console.log(GrupMesinOrder);
    // Populate the form fields with the data
    $('#idcust').val(rowData[1]);
    $('#namacust').val(rowData[0]);
});

//--------------------------------------------------------------------------------------//

var a=0;

document.querySelectorAll('input[name="optradio"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        a = parseInt(this.value); // Mengubah string menjadi angka
    });
});

const btncust1 = document.getElementById('btncust1')
btncust1.addEventListener("click", function () {
    var Kode=""
    if (a==1) {
        Kode = 6
    }
    else if (a==2) {
        Kode = 3
    }
    fetch("/CpTbl/" + Kode + ".dataCust1")
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
            $("#tbl_customer1").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.NamaCust, item.IDCust];
                $("#tbl_customer1").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tbl_customer1").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

var b=0;

document.querySelectorAll('input[name="optioncheck"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        b = parseInt(this.value); // Mengubah string menjadi angka
    });
});

const btnprodtype = document.getElementById('btnprodtype')
btnprodtype.addEventListener("click", function () {
    var Kode="";
    var idCust = document.getElementById('idcust');
    if (b==1) {
        Kode = 7
    }
    else if (b==2) {
        Kode = 1
    }
    fetch("/CpTbl/" + Kode +"."+ idCust.value + ".dataProdType")
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
            $("#tbl_prodtype").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.Nama_brg, item.id];
                $("#tbl_prodtype").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tbl_prodtype").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
