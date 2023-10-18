$(document).ready(function () {
    var table = $("#tabelSimpang").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
    });
    $("#tabelCetak").DataTable({
        order: [[0, "asc"]],
        dom: "",
    });
    $("#selectAll").on("click", function () {
        if (this.checked) {
            $("#tabelSimpang").DataTable().rows().select();
        } else {
            $("#tabelSimpang").DataTable().rows().deselect();
        }
    });
    $("#tampilButton").on("click", function () {
        const TglSimpang = document.getElementById("TglSimpang").value;

        fetch("/ProgramPayroll/AbsenSimpang/" + TglSimpang + ".getDataSimpang")
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
        fetch("/ProgramPayroll/AbsenSimpang/" + TglSimpang + ".getViewSimpang")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabelCetak").DataTable().clear().draw();
                var dateValue = document.getElementById("TglSimpang").value;

                // Format the date value as desired
                var formattedDate = formatDate(dateValue);

                // Update the contents of the TglCetak div element to display the date
                document.getElementById("TglCetak").textContent =
                    "Tanggal: " + formattedDate;
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
                        item.Ket_Masuk,
                    ];
                    $("#tabelCetak").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabelCetak").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#buttonHapus").on("click", function () {
        var selectedRows = table.rows(".selected").nodes();

        var data = [];
        var confirmation = confirm(
            "Apakah anda yakin mau menghapus absen ini?"
        );
        if (confirmation === false) return;
        $(selectedRows).each(function () {
            var rowData = table.row(this).data();

            data.push(rowData[10]);
        });
        $(selectedRows).each(function () {
            var rowData = table.row(this).data();

            // selectedData.push({
            //     Kd_Peg: rowData[0],
            //     Tanggal: rowData[1],
            // });
            // const data = {
            //     idagenda: rowData[10],
            // };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "AbsenSimpang/{rowData[0]}");
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
                .catch((error) =>
                    console.error("Form submission error:", error)
                );
        });

        console.log(selectedData);
    });


    function formatDate(dateValue) {
        // Create a new Date object from the date value
        var date = new Date(dateValue);

        // Format the date as desired
        var formattedDate = date.toLocaleDateString("id-ID", {
            day: "numeric",
            month: "long",
            year: "numeric",
        });

        return formattedDate;
    }
});
function printDiv() {
    var divContents = document.getElementById("printSection").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = divContents;
    window.print();
    document.body.innerHTML = originalContents;
}
