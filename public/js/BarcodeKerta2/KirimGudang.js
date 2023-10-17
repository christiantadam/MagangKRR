$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#RekapKirim').DataTable({
        select: {
            style: "single"
        },
        order: [
            [0, 'desc']
        ],
        "scrollX": true,
        columns: [{ width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },]
    });

    $('#DaftarKirim').DataTable({
        order: [
            [0, 'desc']
        ],
        "scrollX": true,
        columns: [{ width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },
        { width: "150px" },]
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

        fetch("/ABM/BarcodeKerta2/KirimGudang/" + parts[0] + "." + parts[1] + ".getTampilData")
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


    // var ScanBarcode = document.getElementById('No_barcode');
    // ScanBarcode.addEventListener("keypress", function (event) {
    //     if (event.key == "Enter") {
    //         var ScanBarcodeValue = document.getElementById('No_barcode').value;
    //         console.log(ScanBarcodeValue);

    //         var parts = ScanBarcodeValue.split("-");
    //         console.log(parts); // Output: ["A123", "a234"]

    //         fetch("/KirimGudang/" + parts[0] + "." + parts[1] + ".getDataStatus")
    //             .then((response) => {
    //                 if (!response.ok) {
    //                     throw new Error("Network response was not ok");
    //                 }
    //                 return response.json(); // Assuming the response is in JSON format
    //             })
    //             .then((data) => {
    //                 // Handle the data retrieved from the server (data should be an object or an array)
    //                 console.log("Data dari server:", data);

    //                 // Assuming sts is a property in the data object, adjust this part accordingly
    //                 var sts = data.Status;

    //                 // Handling different statuses
    //                 if (sts === "1") {
    //                     // Do something for status 1
    //                     console.log("Barcode Sudah Pernah Ditembak, Cek Kembali!!!");

    //                     // Additional logic or actions for sts === "1"
    //                 } else if (sts === "2") {
    //                     // Do something for status 2
    //                     alert("Barcode Sudah Diterima Gudang, Cek Lagi Barcode Anda!");

    //                     // Additional logic or actions for sts === "2"
    //                 } else if (sts === "3") {
    //                     // Do something for status 3
    //                     alert("Barcode Sudah Pernah Ditembak!");

    //                     // Additional logic or actions for sts === "3"
    //                 } else {
    //                     // Do something for other statuses
    //                     alert("Data Barcode Tidak Ditemukan!");

    //                     // Additional logic or actions for other statuses
    //                 }

    //                 // Clear the existing table rows
    //                 // $("#TableSP").DataTable().clear().draw();

    //                 // Loop through the data and create table rows
    //                 data.forEach((item) => {
    //                     // Additional logic for processing data and updating the table
    //                 });
    //             })
    //             .catch((error) => {
    //                 console.error("Error:", error);
    //             });
    //     }
    // });

    // var ScanBarcode = document.getElementById('No_barcode');
    // ScanBarcode.addEventListener("keypress", function (event) {
    //     if (event.key == "Enter") {
    //         var ScanBarcodeValue = document.getElementById('No_barcode').value;
    //         console.log(ScanBarcodeValue);

    //         var parts = ScanBarcodeValue.split("-");
    //         console.log(parts); // Output: ["A123", "a234"]

    //         fetch("/ABM/BarcodeKerta2/KirimGudang/" + parts[0] + "." + parts[1] + ".getDataStatus")
    //             .then((response) => {
    //                 if (!response.ok) {
    //                     throw new Error("Network response was not ok");
    //                 }
    //                 return response.json(); // Assuming the response is in JSON format
    //             })
    //             .then((data) => {
    //                 // Handle the data retrieved from the server (data should be an object or an array)
    //                 console.log("Data dari server:", data);

    //                 // Assuming sts is a property in the data object, adjust this part accordingly
    //                 var sts = data.status;

    //                 // Handling different statuses
    //                 if (sts === "1") {
    //                     // Fetch additional data for status 1
    //                     fetch("/ABM/BarcodeKerta2/KirimGudang/" + parts[0] + "." + parts[1] + ".getSP")
    //                         .then((responseSP) => {
    //                             if (!responseSP.ok) {
    //                                 throw new Error("Network response was not ok");
    //                             }
    //                             return responseSP.json(); // Assuming the response is in JSON format
    //                         })
    //                         .then((dataSP) => {
    //                             // Clear the existing table rows
    //                             $("#TableSP").DataTable().clear().draw();

    //                             // Loop through the dataSP and create table rows
    //                             if (Array.isArray(dataSP)) {
    //                                 dataSP.forEach((item) => {
    //                                     var row = [item.IDSuratPesanan, item.NamaJnsBrg];
    //                                     $("#TableSP").DataTable().row.add(row);
    //                                 });
    //                             } else {
    //                                 console.error("Data SP is not an array:", dataSP);
    //                             }

    //                             // Redraw the table to show the changes
    //                             $("#TableSP").DataTable().draw();
    //                         })
    //                         .catch((error) => {
    //                             console.error("Error fetching additional data for status 1:", error);
    //                         });
    //                 } else if (sts === "2") {
    //                     // Do something for status 2
    //                     alert("Barcode Sudah Diterima Gudang, Cek Lagi Barcode Anda!");
    //                 } else if (sts === "3") {
    //                     // Do something for status 3
    //                     alert("Barcode Sudah Pernah Ditembak!");
    //                 } else {
    //                     // Do something for other statuses
    //                     alert("Data Barcode Tidak Ditemukan!");
    //                 }
    //             })
    //             .catch((error) => {
    //                 console.error("Error checking status:", error);
    //             });
    //     }
    // });

    var ScanBarcode = document.getElementById('No_barcode');
    ScanBarcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var ScanBarcodeValue = document.getElementById('No_barcode').value;
            console.log(ScanBarcodeValue);

            var parts = ScanBarcodeValue.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch(`/ABM/BarcodeKerta2/KirimGudang/${parts[0]}.${parts[1]}.getDataStatus`)
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
                        fetch(`/ABM/BarcodeKerta2/KirimGudang/${parts[0]}.${parts[1]}.getSP`)
                            .then(responseSP => {
                                if (!responseSP.ok) {
                                    throw new Error("Network response was not ok");
                                }
                                return responseSP.json(); // Assuming the response is in JSON format
                            })
                            .then(dataSP => {
                                // Clear the existing table rows
                                $("#TableSP").DataTable().clear().draw();

                                // Loop through the dataSP and create table rows
                                if (Array.isArray(dataSP)) {
                                    dataSP.forEach(item => {
                                        var row = [item.IDSuratPesanan, item.NamaJnsBrg];
                                        $("#TableSP").DataTable().row.add(row);
                                    });
                                } else {
                                    console.error("Data SP is not an array:", dataSP);
                                }

                                // Redraw the table to show the changes
                                $("#TableSP").DataTable().draw();
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

// function ProcessData() {
//     var ScanBarcode = document.getElementById('No_barcode');
//     var str = ScanBarcode.value;
//     var parts = str.split("-");

//     var UserId = "U001";
//     var kodebarang = parts[0];
//     var noindeks = parts[1];

//     // Extract values from form elements
//     var divisi = document.getElementById('IdDivisi').value;
//     var NoSP = document.getElementById('NoSP').value;

//     // Create a data object to hold the values
//     const data = {
//         UserId: UserId,
//         kodebarang: kodebarang,
//         noindeks: noindeks,
//         divisi: divisi,
//         NoSP: NoSP,
//     };

//     // Add CSRF token input field (assuming the csrfToken is properly fetched)
//     let csrfToken = document
//         .querySelector('meta[name="csrf-token"]')
//         .getAttribute("content");

//     // Send the data to the server using AJAX
//     $.ajax({
//         url: "KirimGudang/NoSP", // Replace with the correct action URL
//         method: "POST",  // Use either POST or PUT, not both
//         data: {
//             ...data,
//             _token: csrfToken,
//             _method: "PUT" ,
//             // Remove _method if you are using POST
//             _ifUpdate: "Update Status"
//         },
//         success: function (response) {
//             console.log("Form submitted successfully!");
//             // Handle the server's response if needed
//         },
//         error: function (error) {
//             console.error("Form submission error:", error);
//             // Handle the error if needed
//         }
//     });
// }

function ProcessData(data) {
    var str = No_barcode.value;
    var parts = str.split("-");

    var UserId = "4384";
    var kodebarang = parts[0];
    var noindeks = parts[1];

    // Extract values from form elements
    var divisi = document.getElementById('IdDivisi').value;
    var NoSP = document.getElementById('NoSP').value;

    const formData = {
        UserId: UserId,
        kodebarang: kodebarang,
        noindeks: noindeks,
        divisi: divisi,
        NoSP: NoSP,
    };
    console.log(formData);
    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", "KirimGudang/NoSP");
    form.setAttribute("method", "POST");

    // Loop through the formData object and add hidden input fields to the form
    for (const key in formData) {
        const input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", key);
        input.value = formData[key]; // Set the value of the input field to the corresponding data
        form.appendChild(input);
    }
    // Create method input with "PUT" Value
    const method = document.createElement("input");
    method.setAttribute("type", "hidden");
    method.setAttribute("name", "_method");
    method.value = "PUT"; // Set the value of the input field to the corresponding data
    form.appendChild(method);

    // Create input with "Update Keluarga" Value
    const ifUpdate = document.createElement("input");
    ifUpdate.setAttribute("type", "hidden");
    ifUpdate.setAttribute("name", "_ifUpdate");
    ifUpdate.value = "Update Barcode"; // Set the value of the input field to the corresponding data
    form.appendChild(ifUpdate);

    formContainer.appendChild(form);

    // Add CSRF token input field (assuming the csrfToken is properly fetched)
    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    let csrfInput = document.createElement("input");
    csrfInput.type = "hidden";
    csrfInput.name = "_token";
    csrfInput.value = csrfToken;
    form.appendChild(csrfInput);

    // Wrap form submission in a Promise
    function submitForm() {
        return new Promise((resolve, reject) => {
            form.onsubmit = resolve; // Resolve the Promise when the form is submitted
            form.submit();
        });
    }

    // Call the submitForm function to initiate the form submission
    submitForm()
        .then(() => console.log("Form submitted successfully!"))
        .catch((error) => console.error("Form submission error:", error));
}
