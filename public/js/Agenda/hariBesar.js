$(document).ready(function () {
    const tampilLibur = document.getElementById("tampilLibur");
    const buttonIsi = document.getElementById("buttonIsi");
    const buttonKoreksi = document.getElementById("buttonKoreksi");
    const buttonHapus = document.getElementById("buttonHapus");
    const buttonProses = document.getElementById("buttonProses");
    const buttonBatal = document.getElementById("buttonBatal");
    const keteranganHariBesar = document.getElementById("ketLibur");
    const tanggalBesar = document.getElementById("TglBesar");
    var opsi = 0;
    // $("#tabelLibur").DataTable({
    //     order: [[0, "asc"]],
    // });
    var table = $("#tabelLibur").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });

    $("#tabelLibur tbody").on("click", "tr", function () {
        var isSelected = $(this).hasClass("selected");

        // Jika baris sudah dipilih, maka unselect
        if (isSelected) {
            $(this).removeClass("selected");
            $("#TglBesar").val("");
            $("#ketLibur").val("");
        } else {
            // Jika belum dipilih, maka select
            $(this).addClass("selected");
            var selectedRows = table.rows(".selected").data();
            var Tgl = selectedRows[0][0].split(" ");
            $("#TglBesar").val(Tgl[0]);
            $("#ketLibur").val(selectedRows[0][1]);
            console.log(Tgl[0]);
        }
    });
    $("#buttonIsi").click(function (event) {
        buttonIsi.disabled = true;
        buttonKoreksi.disabled = true;
        buttonHapus.disabled = true;
        buttonProses.disabled = false;
        buttonBatal.disabled = false;
        tanggalBesar.disabled = false;
        keteranganHariBesar.readOnly = false;
        opsi = 1;

        event.preventDefault();
    });
    $("#buttonKoreksi").click(function (event) {
        buttonIsi.disabled = true;
        buttonKoreksi.disabled = true;
        buttonHapus.disabled = true;
        buttonProses.disabled = false;
        buttonBatal.disabled = false;
        tanggalBesar.disabled = true;
        keteranganHariBesar.readOnly = false;
        opsi = 2;
        event.preventDefault();
    });
    $("#buttonBatal").click(function (event) {
        buttonIsi.disabled = false;
        buttonKoreksi.disabled = false;
        buttonHapus.disabled = false;
        buttonProses.disabled = true;
        buttonBatal.disabled = true;
        tanggalBesar.disabled = true;
        keteranganHariBesar.readOnly = true;
        opsi = 0;
        event.preventDefault();
    });
    $("#buttonHapus").click(function (event) {
        const TglBesar = document.getElementById("TglBesar");
        if (!TglBesar.value) {
            alert("Input tanggal masih kosong ! ");
            return; // Stop executing the function
        }
        const data = {
            tanggal: TglBesar.value,
        };

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "HariBesar/{TglBesar}");
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
        method.value = "DELETE"; // Set the value of the input field to the corresponding data
        form.appendChild(method);

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
    });
    $("#buttonProses").click(function (event) {
        if (opsi == 1) {
            const TglBesar = document.getElementById("TglBesar");
            const ketLibur = document.getElementById("ketLibur");
            const data = {
                tanggal: TglBesar.value,
                keterangan: ketLibur.value,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "HariBesar");
            form.setAttribute("method", "POST");

            // Loop through the data object and add hidden input fields to the form
            for (const key in data) {
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", key);
                input.value = data[key]; // Set the value of the input field to the corresponding data
                form.appendChild(input);
            }

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
                .catch((error) =>
                    console.error("Form submission error:", error)
                );
        } else if (opsi == 2) {
            const TglBesar = document.getElementById("TglBesar");
            const ketLibur = document.getElementById("ketLibur");
            const data = {
                tanggal: TglBesar.value,
                keterangan: ketLibur.value,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "HariBesar/{TglBesar}");
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
            ifUpdate.value = "Update Keluarga"; // Set the value of the input field to the corresponding data
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
                .catch((error) =>
                    console.error("Form submission error:", error)
                );
        }
    });
    // $("#buttonDivisiSelectAll").click(function () {
    //     table.rows().select();
    // });
    $("#tampilLibur").click(function (event) {
        const Tahun = document.getElementById("Tahun").value;
        console.log(Tahun);
        fetch("/ProgramPayroll/HariBesar/" + Tahun + ".getLibur")
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
                $("#tabelLibur").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.tanggal, item.keterangan];
                    $("#tabelLibur").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabelLibur").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
