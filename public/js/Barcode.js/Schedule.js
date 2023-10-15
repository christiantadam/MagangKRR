var a=0
const btn_noorder = document.getElementById('btn_noorder')
btn_noorder.addEventListener("click", function () {
    var Kode=""
    if (a==1) {
        Kode = 3
    }
    else if (a==2) {
        Kode = 1
    } else
    fetch("/Schedule/" + Kode + ".dataOrder")
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
                var row = [item.NAMA_BRG, item.No_Order];
                $("#tabel_noorder").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tabel_noorder").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

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

    const IdKelut = document.getElementById("id_Kelut").value;
    var modal = document.getElementById("myModal2");
    fetch("/Schedule/" + IdKelut + ".getKelompok")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.idkelompok, item.namakelompok];
                $("#TableKelompok").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });

        const IdKelompok = document.getElementById("id_Kelompok").value;
    var modal = document.getElementById("myModal3");
    fetch("/Schedule/" + IdKelompok + ".getSubKelompok")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableSubKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdSubkelompok, item.NamaSubKelompok];
                $("#TableSubKelompok").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableSubKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });

        const IdSubKelompok = document.getElementById("id_SubKelompok").value;
    var modal = document.getElementById("myModal4");
    fetch("/Schedule/" + IdSubKelompok + ".getType")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableType").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdType, item.NamaType];
                $("#TableType").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableType").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
