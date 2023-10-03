$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });


    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    $("#TableDivisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisi").DataTable().row(this).data();

        // Populate the input fields with the data
        // $("#IdDivisi").val(rowData[0]);
        // $("#Divisi").val(rowData[1]);

        // var txtIdDivisi = document.getElementById(rowData[0]);
        fetch("/ABM/BalJadiPalet/" + rowData[0] + ".getType")
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
                $("#TableType").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.NamaType, item.IdType];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // Hide the modal immediately after populating the data
        closeModal();
    });

    $("#TableType tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableType").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdType").val(rowData[1]);
        $("#NamaType").val(rowData[0]);

        // var txtIdDivisi = document.getElementById(rowData[0]);
        // Hide the modal immediately after populating the data
        closeModal();
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')
    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonType = document.getElementById('ButtonType')
    ButtonType.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var BarcodeInput = document.getElementById('BarcodeInput');
    BarcodeInput.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var BarcodeInput = document.getElementById('BarcodeInput');
            var str = BarcodeInput.value;
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/BalJadiPalet/" + parts[0] + "." + parts[1] + ".getBarcode")
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
                    $("#TableType1").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var kodebarcode = parts[0] + "-" + parts[1]
                        var row = [kodebarcode, item.qty_primer, item.qty_sekunder, item.qty];
                        $("#TableType1").DataTable().row.add(row);
                        $("#primer").val(item.qty_primer)
                        $("#sekunder").val(item.qty_sekunder)
                        $("#tritier").val(item.qty)
                    });

                    // Redraw the table to show the changes
                    $("#TableType1").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });

    // var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');
    // ButtonPrintBarcode.addEventListener("click", function (event) {
    //     // Mengatur tombol menjadi tidak dapat diakses (disabled)
    //     ButtonPrintBarcode.disabled = true;

    //     // Lakukan operasi pencetakan barcode
    //     var idtype = '0016';
    //     var tanggal = document.getElementById('tanggalOutput').value;
    //     var primer = document.getElementById('Primer').value;
    //     var sekunder = document.getElementById('SekunderOutput').value;
    //     var tritier = document.getElementById('tritier').value;
    //     var UserID = 'U001';
    //     var asalidsubkelompok = 'SKL01';
    //     var kodebarang = '00000KB02';
    //     var uraian = document.getElementById('shift').value;
    //     var idsubkontraktor = '00000KB02';

    //     // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
    //     fetch("/ABM/BalJadiPalet/" + idtype + UserID + tanggal +
    //         primer + sekunder + tritier + asalidsubkelompok +
    //         idsubkontraktor + kodebarang + uraian + ".buatBarcode")
    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json();
    //         })
    //         .then((data) => {
    //             if (data === true) {
    //                 // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
    //                 console.log("Barcode berhasil dibuat.");
    //                 alert('Barcode berhasil dibuat.');

    //                 // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
    //                 fetch("/BuatBarcode/" + kodebarang + ".getIndex")
    //                     .then((response) => {
    //                         if (!response.ok) {
    //                             throw new Error("Network response was not ok");
    //                         }
    //                         return response.json();
    //                     })
    //                     .then((data) => {
    //                         // Handle data yang diterima dari fetch kedua di sini
    //                         console.log("Data dari fetch kedua:", data);
    //                         var kodebarcode = kodebarang.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
    //                         console.log(kodebarcode);
    //                         // Show an alert for each 'kodebarang'
    //                         alert('Kode Barang: ' + kodebarcode);
    //                     })
    //                     .catch((error) => {
    //                         console.error("Error dalam fetch kedua:", error);
    //                     });
    //             } else {
    //                 console.error("Unexpected response data:", data);
    //                 // Handle other unexpected responses here
    //             }
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });
    // });

    var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');
ButtonPrintBarcode.addEventListener("click", function (event) {
    // Mengatur tombol menjadi tidak dapat diakses (disabled)
    ButtonPrintBarcode.disabled = true;

    // Mendapatkan tanggal paling baru setiap hari
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    var day = currentDate.getDate().toString().padStart(2, '0');
    var tanggal = year + '-' + month + '-' + day;

    // Lakukan operasi pencetakan barcode
    var idtype = document.getElementById('IdType').value;
    var primer = document.getElementById('primer').value;
    var sekunder = document.getElementById('sekunder').value;
    var tritier = document.getElementById('tritier').value;
    var UserID = 'U001';
    var asalidsubkelompok = 'SKL01';
    var kodebarang = '00000KB02';
    var uraian = document.getElementById('shiftInput').value;
    var idsubkontraktor = '00000KB02';

    // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
    fetch("/ABM/BalJadiPalet/" + idtype + UserID + tanggal +
            primer + sekunder + tritier + asalidsubkelompok +
            idsubkontraktor + kodebarang + uraian + ".buatBarcode")
        .then((response) => {
            console.log("Response Status:", response.status);

            if (!response.ok) {
                throw new Error("Network response was not ok");
            }

            // Check for empty response
            if (response.status === 204 || response.headers.get('content-length') === '0') {
                console.error("Empty response received");
                alert("Empty response received. Check server logs for details.");
                return null;
            }

            return response.json();
        })
        .then((data) => {
            console.log("Data:", data);

            if (data === null) {
                // Handle empty response
                console.error("Empty response data");
                alert("Empty response data. Check server logs for details.");
                return;
            }

            try {
                // Attempt to parse the JSON response
                if (data === true) {
                    // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
                    console.log("Barcode berhasil dibuat.");
                    alert('Barcode berhasil dibuat.');

                    // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
                    fetch("/BuatBarcode/" + kodebarang + ".getIndex")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }

                            return response.json();
                        })
                        .then((data) => {
                            // Handle data yang diterima dari fetch kedua di sini
                            console.log("Data dari fetch kedua:", data);

                            if (data.NoIndeks) {
                                var kodebarcode = kodebarang.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
                                console.log(kodebarcode);
                                // Show an alert for each 'kodebarang'
                                alert('Kode Barang: ' + kodebarcode);
                            } else {
                                console.error("NoIndeks not found in the response");
                                alert("NoIndeks not found in the response. Check server logs for details.");
                            }
                        })
                        .catch((error) => {
                            console.error("Error dalam fetch kedua:", error);
                            alert("Error in second fetch. Check server logs for details.");
                        });
                } else {
                    console.error("Unexpected response data:", data);
                    // Handle other unexpected responses here
                    alert("Unexpected response data. Check server logs for details.");
                }
            } catch (jsonError) {
                console.error("Error parsing JSON response:", jsonError);
                alert("Error parsing JSON response. Check server logs for details.");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Error. Check console logs and server logs for details.");
        });
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
    modal.style.display = 'block';

    // Enable the "Pilih Type" button
    document.getElementById('ButtonType').disabled = false;
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block';

    // Enable the "Scan Barcode" button
    document.getElementById('ScanBarcodeButton').disabled = false;
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function setShiftValue() {
    var selectedShift = document.getElementById('Shift').value;
    document.getElementById('shiftInput').value = selectedShift;

    // Enable the "Divisi" button
    document.getElementById('ButtonDivisi').disabled = false;

    closeModal(); // Close the modal or adjust as needed
}

function scanBarcode() {
    // Get the "No Barcode" input element based on its ID
    var barcodeInput = document.getElementById('BarcodeInput');

    // Set the readonly attribute to false
    barcodeInput.readOnly = false;

    // Focus the cursor on the "No Barcode" input
    barcodeInput.focus();

    // Enable the "Print Barcode" button
    var printBarcodeButton = document.getElementById('ButtonPrintBarcode');
    if (printBarcodeButton) {
        printBarcodeButton.disabled = false;
    } else {
        console.error('ButtonPrintBarcode element not found');
    }
}
