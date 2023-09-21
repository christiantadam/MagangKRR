$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#RekapKirim').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#DaftarKirim').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableProcess').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableSP').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
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

    var ButtonSP = document.getElementById('ButtonSP')
    ButtonSP.addEventListener("click", function (event) {
        event.preventDefault();
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

    // $("#TableSP tbody").on("click", "tr", function () {
    //     // Get the data from the clicked row

    //     var rowData = $("#TableSP").DataTable().row(this).data();

    //     // Populate the input fields with the data
    //     $("#NoSP").val(rowData[0]);

    //     var ScanBarcode = document.getElementById('No_barcode');
    //     var str = ScanBarcode.value
    //     var parts = str.split("-");
    //     console.log(parts); // Output: ["A123", "a234"]

    //     fetch("/KirimGudang/" + parts[0] + "." + parts[1] + ".getTampilData")
    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json(); // Assuming the response is in JSON format
    //         })
    //         .then((data) => {
    //             // Handle the data retrieved from the server (data should be an object or an array)

    //             // Clear the existing table rows
    //             $("#RekapKirim").DataTable().clear().draw();
    //             $("#DaftarKirim").DataTable().clear().draw();


    //             // Loop through the data and create table rows
    //             data.forEach((item) => {
    //                 var row = [item.tgl_mutasi, item.namatype, item.uraiandetailtransaksi, item.qty_primer, item.qty_sekunder, item.qty, item.idtype,"IDSP1"];
    //                 var row2 = [item.tgl_mutasi, item.namatype, item.uraiandetailtransaksi, ScanBarcode.value, item.namasubkelompok, item.namakelompok, parts[0], parts[1], item.qty_primer, item.qty_sekunder, item.qty, "IDSP1"];
    //                 $("#RekapKirim").DataTable().row.add(row);
    //                 $("#DaftarKirim").DataTable().row.add(row2);
    //             });

    //             // Redraw the table to show the changes
    //             $("#RekapKirim").DataTable().draw();
    //             $("#DaftarKirim").DataTable().draw();
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });


    //     closeModal2();
    // });

    $("#TableSP tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#TableSP").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#NoSP").val(rowData[0]);

        var ScanBarcode = document.getElementById('No_barcode');
        var str = ScanBarcode.value
        var parts = str.split("-");
        console.log(parts); // Output: ["A123", "a234"]

        fetch("/KirimGudang/" + parts[0] + "." + parts[1] + ".getTampilData")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#RekapKirim").DataTable().clear().draw();
                $("#DaftarKirim").DataTable().clear().draw();

                // Get the value of "No. SP" from the input field
                var noSP = $("#NoSP").val();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.tgl_mutasi,
                        item.namatype,
                        item.uraiandetailtransaksi,
                        item.qty_primer,
                        item.qty_sekunder,
                        item.qty,
                        item.idtype,
                        noSP // Menggunakan nilai dari input "No. SP"
                    ];
                    var row2 = [
                        item.tgl_mutasi,
                        item.namatype,
                        item.uraiandetailtransaksi,
                        ScanBarcode.value,
                        item.namasubkelompok,
                        item.namakelompok,
                        parts[0],
                        parts[1],
                        item.qty_primer,
                        item.qty_sekunder,
                        item.qty,
                        noSP // Menggunakan nilai dari input "No. SP"
                    ];
                    $("#RekapKirim").DataTable().row.add(row);
                    $("#DaftarKirim").DataTable().row.add(row2);
                });

                // Redraw the table to show the changes
                $("#RekapKirim").DataTable().draw();
                $("#DaftarKirim").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        closeModal2();
    });


    var ScanBarcode = document.getElementById('No_barcode');
    ScanBarcode.addEventListener("keypress", function (event) {
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
                    $("#TableSP").DataTable().clear().draw();


                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var row = [item.IDSuratPesanan, item.NamaJnsBrg];
                        $("#TableSP").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#TableSP").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }


    });

    // var ScanBarcode = document.getElementById('No_barcode');
    // ScanBarcode.addEventListener("keypress", function (event) {
    //     if (event.key == "Enter") {
    //         var ScanBarcode = document.getElementById('No_barcode');
    //         var str = ScanBarcode.value
    //         var parts = str.split("-");
    //         console.log(parts); // Output: ["A123", "a234"]

    //         fetch("/KirimGudang/" + parts[0] + parts[1] + ".getTampilData")
    //             .then((response) => {
    //                 if (!response.ok) {
    //                     throw new Error("Network response was not ok");
    //                 }
    //                 return response.json(); // Assuming the response is in JSON format
    //             })
    //             .then((data) => {
    //                 // Handle the data retrieved from the server (data should be an object or an array)

    //                 // Clear the existing table rows
    //                 $("#RekapKirim").DataTable().clear().draw();
    //                 $("#DaftarKirim").DataTable().clear().draw();


    //                 // Loop through the data and create table rows
    //                 data.forEach((item) => {
    //                     var row = [item.tgl_mutasi, item.namatype, item.uraiandetailtransaksi, item.qty_primer, item.qty_sekunder, item.qty, "IDSP1"];
    //                     var row2 = [item.tgl_mutasi, item.namatype, item.uraiandetailtransaksi, ScanBarcode, item.namasubkelompok, item.namakelompok, ScanBarcode.split("-")[1], item.noindeks, item.qty_primer, item.qty_sekunder, item.qty, "IDSP1"];
    //                     $("#RekapKirim").DataTable().row.add(row);
    //                     $("#DaftarKirim").DataTable().row.add(row2);
    //                 });

    //                 // Redraw the table to show the changes
    //                 $("#RekapKirim").DataTable().draw();
    //                 $("#DaftarKirim").DataTable().draw();
    //             })
    //             .catch((error) => {
    //                 console.error("Error:", error);
    //             });
    //     }
    // });

    $(document).ready(function () {
        // Buat variabel penanda apakah data sudah diproses
        var dataProcessed = false;

        // Event listener untuk tombol "Process"
        $("#ButtonProcess").on("click", function () {
            // Periksa apakah data sudah diproses
            if (dataProcessed) {
                alert("Data Sudah Selesai Diproses");
            } else {
                // Periksa apakah kedua input kosong
                var idDivisi = $("#IdDivisi").val().trim();
                var divisi = $("#Divisi").val().trim();

                if (idDivisi === '' || divisi === '') {
                    alert("Pilih dulu Divisinya !!...");
                } else if (isTableEmpty("RekapKirim") && isTableEmpty("DaftarKirim")) {
                    alert("Scan dulu Barcode Yang akan dikirim...!");
                } else {
                    // Lakukan aksi yang sesuai jika kondisi sesuai
                    // Contoh: Lanjutkan dengan proses lain atau pengiriman data

                    // Set variabel penanda bahwa data sudah diproses
                    dataProcessed = true;
                }
            }
        });

        // ...
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

function isTableEmpty(tableId) {
    var table = $("#" + tableId).DataTable();
    return table.rows().count() === 0;
}
