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

    $('#TableType').DataTable({
        "scrollX": true,
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    counter1 = 1;
    $('#TableBarcode').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row
        var rowData = $('#TableType').DataTable().row(this).data();

        // Ambil tanggal dari data yang sesuai dalam tabel Type (misalnya, kolom ke-5)
        var originalDateString = rowData[11];

        // Parse tanggal awal menjadi objek Date
        var originalDate = new Date(originalDateString);

        // Ambil tahun, bulan, dan tanggal
        var year = originalDate.getFullYear();
        var month = String(originalDate.getMonth() + 1).padStart(2, '0');
        var day = String(originalDate.getDate()).padStart(2, '0');

        // Format ulang menjadi "yyyy-mm-dd" untuk elemen input tanggal
        var formattedDate = `${year}-${month}-${day}`;

        // Set nilai elemen input dengan ID "Tanggal" sesuai dengan formattedDate
        $('#Tanggal').val(formattedDate);
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

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#NamaObjek').val(rowData[1]);

        var txtIdObjek = document.getElementById('IdObjek');
        fetch("/ABM/PilihJenisRepress/" + txtIdObjek.value + ".txtIdObjek")
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
                    var row = [item.IdTransaksi, item.namakelompokutama, item.namakelompok, item.namasubkelompok, item.NamaType, item.UraianDetailTransaksi, item.NamaUser, item.JumlahPengeluaranPrimer, item.JumlahPengeluaranSekunder, item.JumlahPengeluaranTritier, "", item.SaatAwalTransaksi];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonObjek = document.getElementById('ButtonObjek')

    ButtonObjek.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableType').DataTable().row(this).data();

        fetch("/ABM/PilihJenisRepress/" + rowData[0] + ".getPrintInput")
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
                    var row = [item.IdTransaksi, item.UraianDetailTransaksi, item.SaatAwalTransaksi, item.JumlahPengeluaranPrimer, item.JumlahPengeluaranSekunder, item.JumlahPengeluaranTritier, item.NamaDivisi, item.NamaObjek, item.NamaKelompokUtama, item.NamaKelompok, item.NamaSubKelompok, item.IdSubKelompok, item.NamaType, item.NamaUser];
                    $("#DivisiPemberi").val(item.NamaDivisi)
                    $("#Objek").val(item.NamaObjek)
                    $("#kelut").val(item.NamaKelompokUtama)
                    $("#Kelompok").val(item.NamaKelompok)
                    $("#sub_kelompok").val(item.NamaSubKelompok)

                });

            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableType').DataTable().row(this).data();

        fetch("/ABM/PilihJenisRepress/" + rowData[0] + ".getPrintPenerima")
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
                    var row = [item.UraianDetailTransaksi, item.SaatAwalTransaksiTransaksi, item.JumlahPengeluaranPrimer, item.JumlahPengeluaranSekunder, item.JumlahPengeluaranTritier, item.namakelompokutama, item.namasubkelompok, item.namakelompok, item.NamaType, item.kode_barang, item.Primer, item.Sekunder, item.Tritier, item.NamaType, item.NamaUser];

                    $("#kelut2").val(item.namakelompokutama)
                    $("#Kelompok2").val(item.namakelompok)
                    $("#sub_kelompok2").val(item.namasubkelompok)

                    $("#Transaksi").val(rowData[0])
                    $("#kode_barang").val(item.kode_barang)
                    $("#nama_barang").val(item.NamaType)

                    $("#PrimerPenerima").val(item.JumlahPengeluaranPrimer + " " + item.Primer)
                    $("#Sekunder").val(item.JumlahPengeluaranSekunder + " " + item.Sekunder)
                    $("#Tritier").val(item.JumlahPengeluaranTritier + " " + item.Tritier)

                    $("#Alasan").val(item.UraianDetailTransaksi)
                });

            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableType').DataTable().row(this).data();

        fetch("/ABM/PilihJenisRepress/" + rowData[0] + ".getTableBarcode")
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
                $("#TableBarcode").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [counter1, item.IdTransaksi, item.Kode_barang ,  item.NoIndeks, item.IdType, item.NamaType, item.NamaType, item.Qty_Primer, item.Qty_sekunder, item.Qty];
                    $("#TableBarcode").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableBarcode").DataTable().draw();
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
    var modal = document.getElementById('myModal1');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdDivisi = document.getElementById('IdDivisi');
    fetch("/ABM/PilihJenisRepress/" + txtIdDivisi.value + ".getXIdDivisi")
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

function KonversiData() {
    var selectedRows = $("#TableBarcode").DataTable().rows(0).data().toArray();
    const data = {
        kodebarang: selectedRows[0][2],
        noindeks: selectedRows[0][3],
        opsi : "satu",

    };
    console.log(data);
    const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "PilihJenisRepress/{selectedRows[4]}");
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
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

function KonversiData() {
    var selectedRows = $("#TableBarcode").DataTable().rows(0).data().toArray();
    const data = {
        kodebarang: selectedRows[0][2],
        noindeks: selectedRows[0][3],
        opsi : "dua",

    };
    console.log(data);
    const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "PilihJenisRepress/{selectedRows[4]}");
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
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

function PrintUlangData() {
    var selectedRows = $("#TableBarcode").DataTable().rows(0).data().toArray();
    const data = {
        kodebarang: selectedRows[0][2],
        noindeks: selectedRows[0][3],
        opsi : "tiga",

    };
    console.log(data);
    const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "PilihJenisRepress/{selectedRows[4]}");
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
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
