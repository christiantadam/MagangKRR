const ldtransaksi = document.getElementById('ld-transaksi')


ldtransaksi.addEventListener("click", function () {
    var tanggal = document.getElementById('tanggal');
    fetch("/HslPrdPrs/" + tanggal.value + ".dataTransaksi")
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
            $("#tabel_notransaksi").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.GrupMesinOrder, item.IDLOG];
                $("#tabel_notransaksi").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tabel_notransaksi").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
