$(document).ready(function () {
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const divisiButtonBaru = document.getElementById("divisiButtonBaru");
    const pegawaiButtonBaru = document.getElementById("pegawaiButtonBaru");
    const prosesButton = document.getElementById("prosesButton");
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_DivisiBaru").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_PegawaiBaru").DataTable({
        order: [[0, "asc"]],
    });
    divisiButton.addEventListener("click", function () {
        fetch("/Koperasi/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Divisi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Id_Div,
                        item.Nama_Div,
                    ];
                    $("#tabel_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalDivisi();
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);

        hideModalDivisi();
    });
    function getNomorKoperasi(idpeg) {

        fetch("/Koperasi/" + idpeg +".getNoKoperasi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#NomorKoperasiLama").val(data[0].no_koperasi);
                $("#NomorKoperasiBaru").val(data[0].no_koperasi);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    function getNomorKoperasiBaru(idpeg) {

        fetch("/Koperasi/" + idpeg +".getNoKoperasi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#NomorKoperasiBaru").val(data[0].no_koperasi);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    pegawaiButton.addEventListener("click", function () {
        const Id_Div = document.getElementById("Id_Divisi").value;
        console.log("Masuk fungsi pegawai");
        fetch("/Koperasi/" + Id_Div + ".getPegawai")
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
                        item.kd_pegawai,
                        item.nama_peg,
                    ];


                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalPegawai();
    });
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);
        $("#Nama_PegawaiLama").val(rowData[1]);
        getNomorKoperasi(rowData[0]);
        hideModalPegawai();
    });
    divisiButtonBaru.addEventListener("click", function () {
        fetch("/Koperasi/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_DivisiBaru").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Id_Div,
                        item.Nama_Div,
                    ];
                    $("#tabel_DivisiBaru").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_DivisiBaru").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalDivisiBaru();
    });
    $("#tabel_DivisiBaru tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_DivisiBaru").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_DivisiBaru").val(rowData[0]);
        $("#Nama_DivisiBaru").val(rowData[1]);

        hideModalDivisiBaru();
    });

    pegawaiButtonBaru.addEventListener("click", function () {
        const Id_Div = document.getElementById("Id_DivisiBaru").value;
        // console.log("Masuk fungsi pegawai");
        fetch("/Koperasi/" + Id_Div + ".getPegawaiBaru")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_PegawaiBaru").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.kd_pegawai,
                        item.nama_peg,
                    ];
                    console.log(row);

                    $("#tabel_PegawaiBaru").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_PegawaiBaru").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalPegawaiBaru();
    });

    $("#tabel_PegawaiBaru tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_PegawaiBaru").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_PegawaiBaru").val(rowData[0]);
        $("#Nama_PegawaiBaru").val(rowData[1]);
        $("#Nama_PegawaiBaru2").val(rowData[1]);
        getNomorKoperasiBaru(rowData[0]);
        hideModalPegawaiBaru();
    });
    prosesButton.addEventListener("click", function (event) {
        event.preventDefault();
        const old_kd_pegawai = document.getElementById("Id_Pegawai").value;
        const new_kd_pegawai = document.getElementById("Id_PegawaiBaru").value;

        if (old_kd_pegawai === "" || new_kd_pegawai === "" ) {
            // Salah satu atau lebih elemen input memiliki nilai kosong
            alert("Kd Pegawai masih kosong !");
            return; // Menghentikan eksekusi lebih lanjut
        }
        const data = {
            old_kd_pegawai: old_kd_pegawai,
            new_kd_pegawai: new_kd_pegawai,

        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Koperasi/{old_kd_pegawai}");
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
        ifUpdate.value = "Transfer NoKop"; // Set the value of the input field to the corresponding data
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
    var inputNomorKoperasiLama = document.getElementById("NomorKoperasiLama");

    // Membuat event listener untuk input
    inputNomorKoperasiLama.addEventListener("input", function() {
        $("#NomorKoperasiBaru").val(document.getElementById("NomorKoperasiLama").value);
    });
});
function showModalDivisi() {
    $("#modalDivisi").modal("show");
}
function hideModalDivisi() {
    $("#modalDivisi").modal("hide");
}
function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
function showModalDivisiBaru() {
    $("#modalDivisiBaru").modal("show");
}
function hideModalDivisiBaru() {
    $("#modalDivisiBaru").modal("hide");
}
function showModalPegawaiBaru() {
    $("#modalPegawaiBaru").modal("show");
}
function hideModalPegawaiBaru() {
    $("#modalPegawaiBaru").modal("hide");
}
