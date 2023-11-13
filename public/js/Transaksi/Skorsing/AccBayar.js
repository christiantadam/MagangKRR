$(document).ready(function () {
    const okButton = document.getElementById("okButton");
    const prosesButton = document.getElementById("prosesButton");
    const button_Pegawai = document.getElementById("button_Pegawai");
    $("#table_Skors").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    button_Pegawai.addEventListener("click", function () {
        fetch("/ProgramPayroll/Skorsing/AccBayar/" + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Nama_Div,
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                        item.Min,
                        item.Max,
                        item.TotalGaji,
                    ];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#table_Skors tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Id_Pegawai").val(rowData[1]);

        hideModalPegawai();
    });
    okButton.addEventListener("click", function () {
        okButton.disabled = true;
        prosesButton.disabled = false;
        fetch("/ProgramPayroll/Skorsing/AccBayar/" + ".getDataSkors")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Skors").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Nama_Div,
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                        item.Min,
                        item.Max,
                        item.TotalGaji,
                    ];
                    $("#table_Skors").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Skors").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    prosesButton.addEventListener("click", function (event) {
        okButton.disabled = false;
        prosesButton.disabled = true;
        event.preventDefault();
        const kd_pegawai = document.getElementById("Id_Pegawai").value;
        const U_gol = document.getElementById("UGolonganBaru").value;
        const T_Jab = document.getElementById("UJabatanBaru").value;
        const tanggal = document.getElementById("TglUpdGaji").value;
        const U_gol_lama = document.getElementById("UGolonganLama").value;
        const T_jab_lama = document.getElementById("UJabatanLama").value;
        if (
            kd_pegawai === "" ||
            U_gol === "" ||
            T_Jab === "" ||
            tanggal === ""
        ) {
            // Salah satu atau lebih elemen input memiliki nilai kosong
            alert("Masih ada field yang kosong !");
            return; // Menghentikan eksekusi lebih lanjut
        }
        const data = {
            kd_pegawai: kd_pegawai,
            U_gol: U_gol,
            T_Jab: T_Jab,
            tanggal: tanggal,
            U_gol_lama: U_gol_lama,
            T_jab_lama: T_jab_lama,
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "KenaikanUpah/{kd_pegawai}");
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
        ifUpdate.value = "Update Upah"; // Set the value of the input field to the corresponding data
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
    });
});
function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
