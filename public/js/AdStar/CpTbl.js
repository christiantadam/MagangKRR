var a=0
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
                var row = [item.Namacust, item.IDCUST];
                $("#tbl_customer1").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tbl_customer1").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
