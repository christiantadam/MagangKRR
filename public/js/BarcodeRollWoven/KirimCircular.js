$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableKelut').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TypeTable').DataTable({

        order: [
            [0, 'desc']
        ],
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonKelut = document.getElementById('ButtonKelut')

    ButtonKelut.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelompok = document.getElementById('ButtonKelompok')

    ButtonKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $("#TableKelut tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelut").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdKelut").val(rowData[0]);
        $("#Kelut").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/KirimCircular/" + rowData[0] + ".getKelompok")
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

                // Get the value of "No. SP" from the input field

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.idkelompok,
                        item.namakelompok
                    ];
                    $("#TableKelompok").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableKelompok").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal();
    });

    $("#TableKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdKelompok").val(rowData[0]);
        $("#Kelompok").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/KirimCircular/" + rowData[0] + ".getSubKelompok")
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

                // Get the value of "No. SP" from the input field

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.IdSubkelompok,
                        item.NamaSubKelompok
                    ];
                    $("#TableSubKelompok").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableSubKelompok").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $("#TableSubKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableSubKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdSubKelompok").val(rowData[0]);
        $("#SubKelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    var ScanBarcode = document.getElementById('No_barcode');
    ScanBarcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var ScanBarcodeValue = document.getElementById('No_barcode').value;
            console.log(ScanBarcodeValue);

            var parts = ScanBarcodeValue.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch(`/ABM/BarcodeRollWoven/KirimCircular/${parts[0]}.${parts[1]}.getDataStatus`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then(data => {
                    // Handle the data retrieved from the server (data should be an object or an array)
                    console.log("Data dari server:", data);

                    // Assuming sts is a property in the data object, adjust this part accordingly
                    var sts = data;

                    // Handling different statuses
                    if (sts === "1") {
                        // Fetch additional data for status 1
                        fetch(`/ABM/BarcodeRollWoven/KirimCircular/${parts[0]}.${parts[1]}.getTampilData`)
                            .then(responseSP => {
                                if (!responseSP.ok) {
                                    throw new Error("Network response was not ok");
                                }
                                return responseSP.json(); // Assuming the response is in JSON format
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
                            .catch(error => {
                                console.error("Error fetching additional data for status 1:", error);
                            });
                    } else if (sts === "2") {
                        // Do something for status 2
                        alert("Barcode Sudah Diterima Gudang, Cek Lagi Barcode Anda!");
                    } else if (sts === "3") {
                        // Do something for status 3
                        alert("Barcode Sudah Pernah Ditembak!");
                    } else {
                        // Do something for other statuses
                        alert("Data Barcode Tidak Ditemukan!");
                    }
                })
                .catch(error => {
                    console.error("Error checking status:", error);
                });
        }
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
