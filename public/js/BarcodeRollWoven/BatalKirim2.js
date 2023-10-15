$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableObjek').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType').DataTable({
        scrollX: true,
        order: [
            [0, 'desc']
        ],
        select: {
            style: "multiple",
        },
    });

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#Objek').val(rowData[1]);

        var getType = document.getElementById('IdObjek');
        fetch("/ABM/BarcodeRollWoven/BatalKirim2/" + getType.value + ".getType")
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
                    var kodebarcode = item.Kode_barang.padStart(9, '0') + '-' + item.NoIndeks.padStart(9, '0');
                    console.log(kodebarcode);
                    var row = [item.IdType, kodebarcode, item.NamaSubKelompok, item.NamaKelompok, item.Kode_barang, item.NoIndeks, item.Qty_Primer, item.Qty_sekunder, item.Qty, item.Tgl_mutasi, item.Divisi, item.Shift];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // Hide the modal immediately after populating the datas
        closeModal();
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

function prosesData() {
    var selectedRows = $("#TableType").DataTable().rows(".selected").data().toArray();
    const data = {
        kodebarang: selectedRows[0][4],
        noindeks: selectedRows[0][5],
        userid: 'U001',

    };
    console.log(data);
    const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "/ABM/BarcodeRollWoven/BatalKirim2/" + data.kodebarang);
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
