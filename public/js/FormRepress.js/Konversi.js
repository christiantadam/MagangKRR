$(document).ready(function () {
    // Dropdown submenu click handler
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    // DataTable initialization for TableType
    $('#TableType').DataTable({
        order: [[0, 'desc']],
    });

    // Event listeners for buttons
    document.getElementById('ButtonShift').addEventListener("click", function (event) {
        event.preventDefault();
    });

    document.getElementById('ButtonType').addEventListener("click", function (event) {
        event.preventDefault();
    });

    document.getElementById('ButtonJumlahBarang').addEventListener("click", function (event) {
        event.preventDefault();
    });

    document.getElementById('tanggalInput').addEventListener('change', function () {
        // Get the selected date
        const selectedDate = this.value;

        // Update the output/input field with the selected date
        document.getElementById('tanggalOutput').value = selectedDate;

        // Aktifkan tombol ButtonShift setelah mengisi tanggal
        document.getElementById('ButtonShift').disabled = false;
    });

    $('#ButtonScanBarcode').prop('disabled', true);

    // Event listener for "Pilih Shift" button
    document.getElementById('ButtonShift').addEventListener("click", function (event) {
        event.preventDefault();

        // Enable "Scan Barcode" button
        $('#ButtonScanBarcode').prop('disabled', false);
    });

    // ... (existing code)

    // Event listener for "Scan Barcode" button
    document.getElementById('ButtonScanBarcode').addEventListener("click", function (event) {
        event.preventDefault();
        // Your code for handling the "Scan Barcode" button click goes here
    });

    $('#ButtonType').prop('disabled', true);

    // Event listener for "Scan Barcode" button
    document.getElementById('ButtonScanBarcode').addEventListener("click", function (event) {
        event.preventDefault();

        // Enable "Pilih Type" button
        $('#ButtonType').prop('disabled', false);

        // Your code for handling the "Scan Barcode" button click goes here
    });

    // ... (existing code)

    // Event listener for "Pilih Type" button
    document.getElementById('ButtonType').addEventListener("click", function (event) {
        event.preventDefault();
        // Your code for handling the "Pilih Type" button click goes here
    });

    // Disable "Timbang" button initially
    $('#ButtonTimbang').prop('disabled', true);

    // Event listener for "Pilih Type" button
    document.getElementById('ButtonType').addEventListener("click", function (event) {
        event.preventDefault();

        // Enable "Timbang" button
        $('#ButtonTimbang').prop('disabled', false);

        // Your code for handling the "Pilih Type" button click goes here
    });

    // ... (existing code)

    // Event listener for "Timbang" button
    document.getElementById('ButtonTimbang').addEventListener("click", function (event) {
        event.preventDefault();
        // Your code for handling the "Timbang" button click goes here
    });

    $('#ButtonTimbang, #ButtonPrintBarcodeKonversi').prop('disabled', true);

    // Event listener for "Timbang" button
    document.getElementById('ButtonTimbang').addEventListener("click", function (event) {
        event.preventDefault();

        // Check if Tritier is empty
        if ($('#Tritier').val() === '') {
            alert('Tritier harus diisi sebelum menimbang.');
            return;
        }

        // Enable "Print Barcode Konversi" button
        $('#ButtonPrintBarcodeKonversi').prop('disabled', false);

        // Your code for handling the "Timbang" button click goes here
    });

    var BarcodeInput = document.getElementById('BarcodeInput');
    BarcodeInput.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var BarcodeInput = document.getElementById('BarcodeInput');
            var str = BarcodeInput.value;
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/Konversi/" + parts[0] + "." + parts[1] + ".getBarcode")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Handle the data retrieved from the server (data should be an object or an array)
                    console.log(data);

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var kodebarcode = parts[0] + "-" + parts[1]
                        var row = [kodebarcode, item.Qty_Primer, item.Qty_Sekunder, item.Qty, item.NamaType, item.IdDivisi_Objek];
                        $("#Primer").val(item.Qty_Primer)
                        $("#Sekunder").val(item.Qty_Sekunder)
                        $("#Tritier").val(item.Qty)

                        $("#BarcodeKonversi").val(kodebarcode)
                        $("#Divisi").val(item.IdDivisi_Objek)
                        $("#TypeAsal").val(item.NamaType)
                    });

                    // Redraw the table to show the changes
                    $("#TableType").DataTable().draw();

                    var Divisi = document.getElementById('Divisi');
                    fetch("/ABM/Konversi/" + Divisi.value + ".getType")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json(); // Assuming the response is in JSON format
                        })
                        .then((data) => {
                            // Handle the data retrieved from the server (data should be an object or an array)
                            console.log(data);

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
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
            closeModal1();
        }
    });

    $("#TableType tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableType").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#tujuan").val(rowData[0]);

        // var txtIdDivisi = document.getElementById(rowData[0]);
        // Hide the modal immediately after populating the data
        closeModal2();
    });

    var ButtonPrintBarcodeKonversi = document.getElementById('ButtonPrintBarcodeKonversi');
    ButtonPrintBarcodeKonversi.addEventListener("click", function (event) {
        // Mengatur tombol menjadi tidak dapat diakses (disabled)
        // ButtonPrintBarcode.disabled = true;

        // // Mendapatkan tanggal paling baru setiap hari
        // var currentDate = new Date();
        // var year = currentDate.getFullYear();
        // var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
        // var day = currentDate.getDate().toString().padStart(2, '0');
        // var tanggalSekarang = year + '-' + month + '-' + day;

        var getBarcodePrintUlang = document.getElementById('BarcodeKonversi');
        var str = getBarcodePrintUlang.value
        var parts = str.split("-");
        console.log(parts);

        // Lakukan operasi pencetakan barcode
        var idtypeasal = '0011';
        var idtypetujuan = '0017';
        var userid = 'U001';
        var tanggal = document.getElementById('tanggalOutput').value;
        var jumlahmasukprimer = document.getElementById('Primer').value;
        var jumlahmasuksekunder = document.getElementById('Sekunder').value;
        var jumlahmasuktertier = document.getElementById('Tritier').value;
        var asalidsubkelompok = 'SKL16';
        var tujuanidsubkelompok = 'SKL16';
        var kodebarangasal = parts[0];
        var kodebarangtujuan = parts[0];
        var noindeksasal = parts[1];
        var uraian = 'Pagi';

        // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
        fetch("/ABM/Konversi/" + idtypeasal + "~" + idtypetujuan + "~" + userid + "~" +
            tanggal + "~" + jumlahmasukprimer + "~" + jumlahmasuksekunder + "~" + jumlahmasuktertier + "~" +
            asalidsubkelompok + "~" + tujuanidsubkelompok + "~" + kodebarangasal + "~" + kodebarangtujuan + "~"
            + noindeksasal + "~" + uraian + "~.buatBarcode")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                console.log(data);
                if (data === true) {
                    // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
                    console.log("Barcode berhasil dibuat.");
                    alert('Barcode berhasil dibuat.');

                    // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
                    fetch("/ABM/Konversi/" + kodebarangtujuan + ".getIndex")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then((data) => {
                            // Handle data yang diterima dari fetch kedua di sini
                            console.log("Data dari fetch kedua:", data);
                            var kodebarcode = kodebarangtujuan.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
                            console.log(kodebarcode);
                            // Show an alert for each 'kodebarang'
                            alert('Kode Barang: ' + kodebarcode);
                        })
                        .catch((error) => {
                            console.error("Error dalam fetch kedua:", error);
                        });
                } else {
                    console.error("Unexpected response data:", data);
                    // Handle other unexpected responses here
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});

// Functions for opening and closing modals
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

function openModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function setShiftValue() {
    const selectedShift = document.getElementById("Shift").value;
    document.getElementById("shift").value = selectedShift;

    closeModal();
}

function prosesACCBarcode(data) {
    var str = BarcodeACC.value;
    var parts = str.split("-");
    var noindeks = parts[1];
    var kodebarang = parts[0];
    var userid = 'U001';
    var opsi = 'satu';

    const formData = {
        kodebarang: kodebarang,
        noindeks: noindeks,
        userid: userid,
        opsi: opsi
    };
    console.log(formData);
    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", "Konversi/dua");
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

function PrintUlangData(data) {
    var str = BarcodeACC.value;
    var parts = str.split("-");
    var noindeks = parts[1];
    var kodebarang = parts[0];
    var opsi = 'dua';

    // Create a data object to hold the values
    const formData = {
        kodebarang: kodebarang,
        noindeks: noindeks,
        opsi: opsi
    };

    console.log(formData);

    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", "Konversi/{noindeks}"); // Replace with the correct action URL
    form.setAttribute("method", "POST");

    // Loop through the formData object and add hidden input fields to the form
    for (const key in formData) {
        const input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", key);
        input.value = formData[key]; // Set the value of the input field to the corresponding formData
        form.appendChild(input);
    }

    // Create input with "_method" field set to "PUT" (if you need to override the HTTP method)
    const method = document.createElement("input");
    method.setAttribute("type", "hidden");
    method.setAttribute("name", "_method");
    method.value = "PUT"; // Set the value of the input field to the corresponding formData
    form.appendChild(method);

    // Create input with "_ifUpdate" field set to "Update Barcode"
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
