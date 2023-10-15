const IdDiv = document.getElementById("IdDivisi").value;
var modal = document.getElementById("myModal1");
fetch("/Schedule/" + IdDiv + ".getKelut")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json(); // Assuming the response is in JSON format
    })
    .then((data) => {
        // Handle the data retrieved from the server (data should be an object or an array)

        // Clear the existing table rows
        $("#TableKelut").DataTable().clear().draw();

        // Loop through the data and create table rows
        data.forEach((item) => {
            var row = [item.IdKelompokUtama, item.NamaKelompokUtama];
            $("#TableKelut").DataTable().row.add(row);
        });

        // Redraw the table to show the changes
        $("#TableKelut").DataTable().draw();
    })
    .catch((error) => {
        console.error("Error:", error);
    });

