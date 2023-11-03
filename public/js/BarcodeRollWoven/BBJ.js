$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableKelompokUtama').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    // Get the input elements
    const tanggalInput = document.getElementById("tanggalInput");
    const tanggalOutput = document.getElementById("tanggalOutput");

    // Add an event listener to the first input field to update the second input field
    tanggalInput.addEventListener("input", function () {
        // Get the selected date value from the first input field
        const selectedDate = tanggalInput.value;

        // Update the value of the second input field with the selected date
        tanggalOutput.value = selectedDate;
    });

    $('#TableKelompokUtama tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableKelompokUtama').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='namaKelut']").val(rowData[0]);
        $("input[name='IdKelut']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getKelompok")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableKelompok").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.namakelompok, item.idkelompok];
                    $("#TableKelompok").DataTable().row.add(row);
                });
                $("#TableKelompok").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TableKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='IdKelompok']").val(rowData[0]);
        $("input[name='Kelompok']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getSubKelompok")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableSubKelompok").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.NamaSubKelompok, item.IdSubkelompok];
                    $("#TableSubKelompok").DataTable().row.add(row);
                });
                $("#TableSubKelompok").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    $('#TableSubKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableSubKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='sub_kelompok']").val(rowData[0]);
        $("input[name='idsub_kelompok']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getType")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableType").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.NamaType, item.IdType];
                    $("#TableType").DataTable().row.add(row);
                });
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal3();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableType').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='Type']").val(rowData[0]);
        $("input[name='IdType']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getTampil")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                data.forEach((item) => {
                    $("#Barang").val(item.KodeBarang)
                    $("#primer").val((item.SaldoPrimer && item.SatPrimer) ? item.SaldoPrimer : "");
                    $("#sekunder").val((item.SaldoSekunder  && item.SatSekunder) ? item.SaldoSekunder : "");
                    $("#tritier").val((item.SaldoTritier  && item.SatTritier) ? item.SaldoTritier : "");
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal4();
    });

    var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');
    ButtonPrintBarcode.addEventListener("click", function (event) {
        // Mengatur tombol menjadi tidak dapat diakses (disabled)
        ButtonPrintBarcode.disabled = true;

        // var getBarcodePrintUlang = document.getElementById('BarcodeInput');
        // var str = getBarcodePrintUlang.value
        // var parts = str.split("-");
        // console.log(parts);

        // Lakukan operasi pencetakan barcode
        var idtype = document.getElementById('Type').value;
        var tanggal = document.getElementById('tanggalOutput').value;
        var primer = document.getElementById('stok_Primer').value;
        var sekunder = document.getElementById('stok_Sekunder').value;
        var tritier = document.getElementById('stok_Tritier').value;
        var UserID = '4384';
        var asalidsubkelompok = document.getElementById('ID_Subkelompok').value;;
        var Kode_Barang = document.getElementById('Barang').value;
        var uraian = document.getElementById('shiftInput').value;
        var idsubkontraktor = document.getElementById('Barang').value;

        // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
        fetch("/ABM/BarcodeRollWoven/BBJ/" + idtype + "." + UserID + "." + tanggal + "." +
            primer + "." + sekunder + "." + tritier + "." + asalidsubkelompok + "." +
            idsubkontraktor + "." + Kode_Barang + "." + uraian + "." + ".buatBarcode")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                if (data === true) {
                    // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
                    console.log("Barcode berhasil dibuat.");
                    alert('Barcode berhasil dibuat.');

                    // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
                    fetch("/ABM/BarcodeRollWoven/BBJ/" + Kode_Barang + ".getIndex")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then((data) => {
                            // Handle data yang diterima dari fetch kedua di sini
                            console.log("Data dari fetch kedua:", data);
                            var kodebarcode = Kode_Barang.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
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
    // Mendapatkan nilai shift yang dipilih dari dropdown
    var selectedShift = document.getElementById('Shift').value;

    // Menetapkan nilai shift ke dalam input field
    document.getElementById('shiftInput').value = selectedShift;

    // Menutup modal setelah memilih shift
    closeModal();
}

function prosesACCBarcode(data) {
    var str = BarcodeACC.value;
    var parts = str.split("-");
    var noindeks = parts[1];
    var kodebarang = parts[0];
    var userid = '4384';
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
    form.setAttribute("action", "BBJ/satu");
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
    form.setAttribute("action", "BBJ/dua"); // Replace with the correct action URL
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
