 // // Click event handler for table rows
 $('#tabel_noorder tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var nama = $(this).data('nama');
    var kode = $(this).data('kode');
    var idbrng = $(this).data('idbrng');

    // Populate the form fields with the data
    $('#nama-barang').val(idbrng);
    $('#input1').val(nama);
});

var a=0
const btn_noorder = document.getElementById('btn_noorder')
btn_noorder.addEventListener("click", function () {
    var Kode=""
    if (a=1) {
        Kode = '10'
    }
    else{
        Kode = "14"
    }
    fetch("/StpOrdPrs/" + Kode + ".dataOrder")
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
            $("#tabel_noorder").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.GrupMesinOrder, item.IDLOG];
                $("#tabel_noorder").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tabel_noorder").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
