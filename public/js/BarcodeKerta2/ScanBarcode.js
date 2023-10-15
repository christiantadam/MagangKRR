var isitable = []

$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableObjek').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var counter1 = 1; // Initialize the counter for TableType1
    var counter2 = 1; // Initialize the counter for TableType2

    var tableType = $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    var tableType1 = $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    // Initialize DataTable for TableType2
    var tableType2 = $('#TableType2').DataTable({
        order: [
            [0, 'desc']
        ],
    });



    $('#TableDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi').val(rowData[0]);
        $('#Divisi').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    // $('#TableObjek tbody').on('click', 'tr', function () {
    //     // Get the data from the clicked row

    //     var rowData = $('#TableObjek').DataTable().row(this).data();

    //     // Populate the input fields with the data
    //     $('#IdObjek').val(rowData[0]);
    //     $('#NamaObjek').val(rowData[1]);

    //     var txtIdObjek = document.getElementById('IdObjek');
    //     fetch("/ABM/ScanBarcode/" + txtIdObjek.value + ".txtIdObjek")
    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json(); // Assuming the response is in JSON format
    //         })
    //         .then((data) => {
    //             // Handle the data retrieved from the server (data should be an object or an array)
    //             console.log(data);
    //             // Clear the existing table rows
    //             $("#TableType").DataTable().clear().draw();

    //             // Loop through the data and create table rows
    //             data.forEach((item) => {
    //                 var row = [item.IdTransaksi, item.NamaKelompokUtama, item.NamaKelompok, item.NamaSubKelompok, item.NamaType, item.UraianDetailTransaksi, item.NamaUser, item.JumlahPengeluaranPrimer, item.JumlahPengeluaranSekunder, item.JumlahPengeluaranTritier, item.SaatAwalTransaksi];
    //                 $("#TableType").DataTable().row.add(row);
    //             });

    //             // Redraw the table to show the changes
    //             $("#TableType").DataTable().draw();
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });

    //     // Hide the modal immediately after populating the data
    //     closeModal1();
    // });

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row
        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#NamaObjek').val(rowData[1]);

        var txtIdObjek = document.getElementById('IdObjek');
        fetch("/ABM/ScanBarcode/" + txtIdObjek.value + ".txtIdObjek")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);

                // Clear the existing table rows in TableType1 and TableType2
                $("#TableType").DataTable().clear().draw();


                // Loop through the data and create table rows in both TableType1 and TableType2
                data.forEach((item) => {
                    var row = [
                        item.IdTransaksi,
                        item.NamaKelompokUtama,
                        item.NamaKelompok,
                        item.NamaSubKelompok,
                        item.NamaType,
                        item.UraianDetailTransaksi,
                        item.NamaUser,
                        item.JumlahPengeluaranPrimer,
                        item.JumlahPengeluaranSekunder,
                        item.JumlahPengeluaranTritier,
                        item.SaatAwalTransaksi
                    ];

                    // Add the row to both TableType1 and TableType2
                    $("#TableType").DataTable().row.add(row);

                });

                // Redraw both tables to show the changes
                $("#TableType").DataTable().draw();

            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row in TableType
        var rowData = $('#TableType').DataTable().row(this).data();
        console.log(rowData[0]);

        fetch("/ABM/ScanBarcode/" + rowData[0] + ".getHasilBarcode") // Perbaiki tanda titik menjadi garis miring
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);

                // Clear the existing table rows in TableType1 and TableType2
                var table1 = $("#TableType1").DataTable();
                var table2 = $("#TableType2").DataTable();
                table1.clear().draw();
                table2.clear().draw();

                // Loop through the data and create table rows in both TableType1 and TableType2
                data.forEach((item) => {
                    var row1 = [
                        counter1,
                        item.IdTransaksi,
                        item.Kode_barang,
                        item.NamaType,
                        item.Qty_Primer,
                        item.Qty_sekunder,
                        item.Qty,
                    ];
                    isitable.push([
                        counter1,
                        item.IdTransaksi,
                        item.Kode_barang,
                        item.NoIndeks,
                        item.NamaType,
                        item.Qty_Primer,
                        item.Qty_sekunder,
                        item.Qty,
                    ])
                    var row2 = [
                        counter1,
                        item.IdTransaksi,
                        item.Kode_barang,
                        item.NoIndeks,
                        item.NamaType,
                        item.Qty_Primer,
                        item.Qty_sekunder,
                        item.Qty,
                    ];

                    // Add the rows to both TableType1 and TableType2
                    table1.row.add(row1);
                    table2.row.add(row2);
                });

                // Redraw both tables to show the changes
                table1.draw();
                table2.draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    var Barcode = document.getElementById('barcode');
    Barcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var getHasilBarcode = document.getElementById('barcode');
            var str = getHasilBarcode.value
            var parts = str.split("-");

            console.log(isitable); // Output: ["A123", "a234"]
            for (let i = 0; i < isitable.length; i++) {
                 if (isitable[i].includes(parts[1])){
                    alert("Data Sudah Discan")
                    break
                 }
                 else alert("Barcode Tidak Ditemukan")
            }
            // if (isitable.includes(parts[1])) alert("Data Sudah Discan")
            // else alert("Barcode Tidak Ditemukan")

            fetch("/ABM/ScanBarcode/" + ".getHasilBarcode")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                // .then((data) => {

                //     // Loop through the data and create table rows
                //     data.forEach((item) => {
                //         var row = [item.NoIndeks, item.Kode_barang, item.NamaType, item.Qty_Sekunder, item.Qty, item.SatSekunder, item.SatTritier];
                //         $("#Item").val(item.NoIndeks)
                //         $("#Kode").val(item.Kode_barang)
                //         $("#nama_type").val(item.NamaType)
                //         $("#Sekunder").val(item.Qty_Sekunder + " " + item.SatSekunder)
                //         $("#Tritier").val(item.Qty + " " + item.SatTritier)
                //     });

                // })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonObjek = document.getElementById('ButtonObjek')

    ButtonObjek.addEventListener("click", function (event) {
        event.preventDefault();
    });

    // Add this below your existing JavaScript code
    document.getElementById('ButtonRefresh').addEventListener('click', function () {
        location.reload(); // Refresh the page
    });
});

function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdDivisi = document.getElementById('IdDivisi');
    fetch("/ABM/ScanBarcode/" + txtIdDivisi.value + ".getXIdDivisi")
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
            $("#TableObjek").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdObjek, item.NamaObjek];
                $("#TableObjek").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableObjek").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
