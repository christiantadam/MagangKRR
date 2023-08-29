$(document).ready(function () {
    var table = $("#tabelSimpang").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });
    $("#tampilButton").on("click", function () {
        const TglSimpang = document.getElementById("TglSimpang").value;
        fetch("/AbsenSimpang/" + TglSimpang + ".getDataSimpang")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            $("#tabelSimpang").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [
                    // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                    //     " " +
                    item.Kd_Pegawai,
                    item.Nama_Peg,
                    item.Ket_Absensi,
                    item.Jam_Masuk,
                    item.Jam_Keluar,
                    item.Jml_Jam,
                    item.Datang,
                    item.Pulang,
                    item.TotalJam,
                    item.Ket_Masuk,
                    item.id_agenda,
                ];
                $("#tabelSimpang").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tabelSimpang").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
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
});
