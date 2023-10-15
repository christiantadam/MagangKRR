const btn_nosp = document.getElementById('No_barcode');
btn_nosp.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var ScanBarcode = document.getElementById('No_barcode').value;
            console.log(ScanBarcode);

            fetch("/KirimGudang/" + ScanBarcode.split("-")[0] + ".getSP")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Handle the data retrieved from the server (data should be an object or an array)

                    // Clear the existing table rows
                    $("#tbl_nosp").DataTable().clear().draw();


                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var row = [item.IDSuratPesanan, item.NamaJnsBrg];
                        $("#tbl_nosp").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#tbl_nosp").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }


    });
