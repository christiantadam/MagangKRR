$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    var Barcode = document.getElementById('Barcode');
    Barcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var getBarcodePrintUlang = document.getElementById('Barcode');
            var str = getBarcodePrintUlang.value
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/PrintUlang/" + parts[0] + "." + parts[1] + ".getBarcodePrintUlang")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var row = [item.NoIndeks, item.Kode_barang, item.NamaType, item.Qty_Sekunder, item.Qty, item.SatSekunder, item.SatTritier];

                        $("#Item").val(item.NoIndeks);
                        $("#Kode").val(item.Kode_barang);
                        $("#nama_type").val(item.NamaType);
                        $("#Sekunder").val((item.Qty_Sekunder && item.SatSekunder) ? item.Qty_Sekunder + " " + item.SatSekunder : "");
                        $("#Tritier").val((item.Qty && item.SatTritier) ? item.Qty + " " + item.SatTritier : "");
                    });
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });

    var ScanBarcode = document.getElementById('ScanBarcode');
    ScanBarcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var ScanBarcode = document.getElementById('ScanBarcode');
            var str = ScanBarcode.value;
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/PrintUlang/" + parts[0] + "." + parts[1] + ".getBarcode")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Check if there is any data with "Id_barang"
                    if (data.some(item => item.Id_barang)) {
                        // Data with "Id_barang" found
                        alert("Ok"); // Pesan jika data ditemukan
                        data.forEach((item) => {
                            var row = [item.Id_barang];
                            // Perform actions with the data here
                        });
                    } else {
                        // No data with "Id_barang" found
                        alert("Print Ulang Lagi, Barcode Tidak Dikenali"); // Pesan jika data tidak ditemukan
                        console.log("No data with 'Id_barang' found.");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });

    $(document).ready(function () {
        // Select semua tombol
        var timbangButton = document.getElementById('timbangButton');
        var printUlangButton = document.getElementById('printUlangBtn');
        var scanBarcodeButton = document.getElementById('scanBarcodeBtn');

        // Fungsi yang dijalankan saat tombol Enter ditekan di dalam input barcode
        var Barcode = document.getElementById('Barcode');
        Barcode.addEventListener("keypress", function (event) {
            if (event.key == "Enter") {
                var getBarcodePrintUlang = document.getElementById('Barcode');
                var str = getBarcodePrintUlang.value
                var parts = str.split("-");
                // parts.length !== 2
                if (str.length !== 19) {
                    // Tampilkan alert jika format barcode salah
                    alert('Barcode Tidak Bisa Di Print Ulang.');
                    return;
                }

                // Aktifkan semua tombol setelah barcode diisi dengan benar
                timbangButton.removeAttribute('disabled');
                printUlangButton.removeAttribute('disabled');
                // scanBarcodeButton.removeAttribute('disabled'); // Remove this line
            }
        });

        // Tombol "Print Ulang" event handler
        var printUlangButton = document.getElementById('printUlangBtn');
        printUlangButton.addEventListener("click", function () {
            // Lakukan tindakan yang diperlukan saat tombol "Print Ulang" ditekan

            // Aktifkan tombol "Scan Barcode" setelah tombol "Print Ulang" ditekan
            scanBarcodeButton.removeAttribute('disabled');
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

// function PrintUlangData() {
//     var selectedRows1 = document.getElementById('Kode');
//     var selectedRows2 = document.getElementById('Item');
//     var kodebarang = selectedRows1.value;
//     var noindeks = selectedRows2.value;
//     var opsi = "tuju";

//     // Create a data object to hold the values
//     const data = {
//         kodebarang: kodebarang,
//         noindeks: noindeks,
//         opsi: opsi
//     };

//     console.log(data);

//     const formContainer = document.getElementById("form-container");
//     const form = document.createElement("form");
//     form.setAttribute("action", "PrintUlang/tuju"); // Replace with the correct action URL
//     form.setAttribute("method", "POST");

//     // Loop through the data object and add hidden input fields to the form
//     for (const key in data) {
//         const input = document.createElement("input");
//         input.setAttribute("type", "hidden");
//         input.setAttribute("name", key);
//         input.value = data[key]; // Set the value of the input field to the corresponding data
//         form.appendChild(input);
//     }

//     // Create input with "_method" field set to "PUT" (if you need to override the HTTP method)
//     const method = document.createElement("input");
//     method.setAttribute("type", "hidden");
//     method.setAttribute("name", "_method");
//     method.value = "PUT"; // Set the value of the input field to the corresponding data
//     form.appendChild(method);

//     // Create input with "_ifUpdate" field set to "Update Barcode"
//     const ifUpdate = document.createElement("input");
//     ifUpdate.setAttribute("type", "hidden");
//     ifUpdate.setAttribute("name", "_ifUpdate");
//     ifUpdate.value = "Update Barcode"; // Set the value of the input field to the corresponding data
//     form.appendChild(ifUpdate);

//     formContainer.appendChild(form);

//     // Add CSRF token input field (assuming the csrfToken is properly fetched)
//     let csrfToken = document
//         .querySelector('meta[name="csrf-token"]')
//         .getAttribute("content");
//     let csrfInput = document.createElement("input");
//     csrfInput.type = "hidden";
//     csrfInput.name = "_token";
//     csrfInput.value = csrfToken;
//     form.appendChild(csrfInput);

//     // Wrap form submission in a Promise
//     function submitForm() {
//         return new Promise((resolve, reject) => {
//             form.onsubmit = resolve; // Resolve the Promise when the form is submitted
//             form.submit();
//         });
//     }

//     // Call the submitForm function to initiate the form submission
//     submitForm()
//         .then(() => console.log("Form submitted successfully!"))
//         .catch((error) => console.error("Form submission error:", error));
// }

function PrintUlangData() {
    var selectedRows1 = document.getElementById('Kode');
    var selectedRows2 = document.getElementById('Item');
    var kodebarang = selectedRows1.value;
    var noindeks = selectedRows2.value;
    var opsi = "tuju";

    // Create a data object to hold the values
    const data = {
        kodebarang: kodebarang,
        noindeks: noindeks,
        opsi: opsi
    };

    // Add CSRF token input field (assuming the csrfToken is properly fetched)
    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    // Send the data to the server using AJAX
    $.ajax({
        url: "PrintUlang/tuju", // Replace with the correct action URL
        method: "POST",
        data: {
            ...data,
            _token: csrfToken,
            _method: "PUT",
            _ifUpdate: "Update Barcode"
        },
        success: function(response) {
            console.log("Form submitted successfully!");
            // Handle the server's response if needed
        },
        error: function(error) {
            console.error("Form submission error:", error);
            // Handle the error if needed
        }
    });
}
