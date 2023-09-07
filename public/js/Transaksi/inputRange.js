$(document).ready(function () {
    const tambahButton = document.getElementById("tambahButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const prosesButton = document.getElementById("prosesButton");
    const batalButton = document.getElementById("batalButton");
    const tambahSection = document.getElementById("tambahSection");
    const koreksiSection = document.getElementById("koreksiSection");
    var proses = 0;
    tambahButton.addEventListener("click", function (event) {
        proses = 1;
        event.preventDefault();
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        batalButton.disabled = false;
        prosesButton.disabled = false;
    });
    hapusButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 2;
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        batalButton.disabled = false;
        prosesButton.disabled = false;
    });
    batalButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 0;

        tambahButton.disabled = false;
        hapusButton.disabled = false;
        batalButton.disabled = true;
        prosesButton.disabled = true;
    });
    prosesButton.addEventListener("click", function (event) {
        if (proses == 1) {
            const Nama_Klinik = document.getElementById("Nama_Klinik").value;
            const AlamatKlinik = document.getElementById("AlamatKlinik").value;
            const KotaKlinik = document.getElementById("KotaKlinik").value;
            const NomorTelepon = document.getElementById("NomorTelepon").value;
            if (
                Nama_Klinik === "" ||
                AlamatKlinik === "" ||
                KotaKlinik === "" ||
                NomorTelepon === ""
            ) {
                // Salah satu atau lebih elemen input memiliki nilai kosong
                alert("Mohon isi semua field yang diperlukan.");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                nm: Nama_Klinik,
                alamat: AlamatKlinik,
                kota: KotaKlinik,
                telp: NomorTelepon,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "InputRange");
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
        } else if (proses == 2) {
            //Hapus
            const idklinik = document.getElementById("Id_Klinik").value;
            if (idklinik === "") {
                alert("Pilih Dulu Kliniknya !");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                idklinik: idklinik,
            };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "InputRange/{idklinik}");
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
        }
    });
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Klinik").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);

        var kode = document.getElementById("Id_Divisi").value;
        fetch("/InputRange/" + kode + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Pegawai").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Kd_Pegawai, item.Nama_Peg];
                    $("#table_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);

        hideModalPegawai();
    });
    $("#table_KLinik tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_KLinik").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Klinik").val(rowData[0]);
        $("#Nama_Klinik").val(rowData[1]);

        hideModalKlinik();
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
function showModalKlinik() {
    $("#modalKlinik").modal("show");
}
function hideModalKlinik() {
    $("#modalKlinik").modal("hide");
}
function toggleButton() {
    var selectElement = document.getElementById("Keterangan");
    var buttonElement = document.getElementById("klinikButton");

    if (selectElement.value === "S") {
        // Ubah "S" ke opsi yang Anda inginkan untuk mengaktifkan tombol
        buttonElement.disabled = false;
    } else {
        buttonElement.disabled = true;
    }
}
