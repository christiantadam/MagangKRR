$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#RekapKirim').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#DaftarKirim').DataTable({
        scrollX: true,
        order: [
            [0, 'desc']
        ],
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableBelumKirim').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableObjek').DataTable({
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

    var ScanBarcode = document.getElementById('No_barcode');
    ScanBarcode.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var ScanBarcodeValue = document.getElementById('No_barcode').value;
            console.log(ScanBarcodeValue);

            var parts = ScanBarcodeValue.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch(`/ABM/BarcodeRollWoven/KirimGudang2/${parts[0]}.${parts[1]}.getDataStatus`)
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
                        fetch(`/ABM/BarcodeRollWoven/KirimGudang2/${parts[0]}.${parts[1]}.getTampilData`)
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

    $("#TableObjek tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableObjek").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdObjek").val(rowData[0]);
        $("#Objek").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/KirimCircular/" + rowData[0] + ".getTampilDataBatalKirim")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#TableBelumKirim").DataTable().clear().draw();

                // Get the value of "No. SP" from the input field

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var kodebarcode = item.NoIndeks + item.Kode_barang;
                    var row = [
                        item.NamaType,
                        kodebarcode,
                        item.NamaSubKelompok,
                        item.NamaKelompok,
                        item.Kode_barang,
                        item.NoIndeks,
                        item.SaldoPrimer,
                        item.SaldoSekunder,
                        item.SaldoTritier,
                        item.Tgl_mutasi,

                    ];
                    $("#TableBelumKirim").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableBelumKirim").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
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
    var modal = document.getElementById('myModal');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById('myModal');
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

function ProcessData(data) {
    var str = No_barcode.value;
    var parts = str.split("-");

    var UserId = "4384";
    var kodebarang = parts[0];
    var noindeks = parts[1];

    // Extract values from form elements
    var divisi = document.getElementById('IdDivisi').value;

    const formData = {
        kodebarang: kodebarang,
        noindeks: noindeks,
        UserId: UserId,
        divisi: divisi,
    };
    console.log(formData);
    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", "KirimGudang2/divisi");
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
