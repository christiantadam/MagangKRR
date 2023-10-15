$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });


    // fetch("/ABM/Scan/" + txtIdObjek.value + ".txtIdObjek")
    //     .then((response) => {
    //         if (!response.ok) {
    //             throw new Error("Network response was not ok");
    //         }
    //         return response.json(); // Assuming the response is in JSON format
    //     })
    //     .then((data) => {
    //         // Handle the data retrieved from the server (data should be an object or an array)
    //         console.log(data);
    //         // Clear the existing table rows
    //         $("#TableType").DataTable().clear().draw();

    //         // Loop through the data and create table rows
    //         data.forEach((item) => {
    //             var row = [item.IdTransaksi, item.NamaKelompok, item.NamaType, item.JumlahPengeluaranPrimer, item.JumlahPengeluaranSekunder, item.JumlahPengeluaranTritier];
    //             $("#TableType").DataTable().row.add(row);
    //         });

    //         // Redraw the table to show the changes
    //         $("#TableType").DataTable().draw();
    //     })
    //     .catch((error) => {
    //         console.error("Error:", error);
    //     });
});
