
$(document).ready(function () {
    const listDataButton = document.getElementById("listDataButton");
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const isiButton = document.getElementById("isiButton");
    const batalButton = document.getElementById("batalButton");
    const simpanButton = document.getElementById("simpanButton");
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    isiButton.addEventListener("click", function () {
        isiButton.hidden = true;
        listDataButton.disabled = true;
        simpanButton.hidden = false;
        batalButton.disabled = false;
    });
    batalButton.addEventListener("click", function () {
        isiButton.hidden = false;
        listDataButton.disabled = false;
        simpanButton.hidden = true;
        batalButton.disabled = true;
    });
    divisiButton.addEventListener("click", function () {
        fetch("/KenaikanUpah/" + ".getDivisi")
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
    pegawaiButton.addEventListener("click", function () {
        const Id_Div = document.getElementById("Id_Divisi").value;
        console.log("Masuk fungsi pegawai");
        fetch("/KenaikanUpah/" + Id_Div + ".getPegawai")
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
    function DisplayGaji() {
        const idpeg = document.getElementById("Id_Pegawai").value;

        fetch("/KenaikanUpah/" + idpeg + ".getDataGaji")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data.length > 0) {
                    $("#UJabatanLama").val(data[0].T_Jabatan);
                    $("#UGolonganLama").val(data[0].U_Golongan);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);

        hideModalDivisi();
    });
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);
        DisplayGaji();
        hideModalPegawai();
    });
    simpanButton.addEventListener("click", function (event) {
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
