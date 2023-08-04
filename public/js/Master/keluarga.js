$(document).ready(function () {
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Karyawan").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_PISAT").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Kawin").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Keluarga").DataTable({
        order: [[0, "asc"]],
    });
    function hideModalDivisi() {
        $("#modalDivPeg").removeClass("show");
        $("#modalDivPeg").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    function hideModalKaryawan() {
        $("#modalKaryawan").removeClass("show");
        $("#modalKaryawan").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    function hideModalPISAT() {
        $("#modalPisat").removeClass("show");
        $("#modalPisat").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    function hideModalKawin() {
        $("#modalKawin").removeClass("show");
        $("#modalKawin").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    function removeBackdrop() {
        $(".modal-backdrop").remove();
    }

    const divisiButton = document.getElementById("divisiButton");
    const karyawanButton = document.getElementById("karyawanButton");
    const clearButtonPekerja = document.getElementById("ClearPekerja");
    const simpanButtonPekerja = document.getElementById("SimpanPekerja");
    clearButtonPekerja.addEventListener("click", function () {
        const checkbox = document.getElementById("checkBPJS");
        checkbox.checked = false;
        $("#Id_Div").val("");
        $("#Nama_Div").val("");
        $("#Id_Peg").val("");
        $("#Nama_Peg").val("");
        $("#NomorKK").val("");
        $("#Kd_PISAT").val("");
        $("#PISAT").val("");
        $("#Kd_Kawin").val("");
        $("#Kawin").val("");
        $("#tabel_Keluarga").DataTable().clear().draw();

    });

    simpanButtonPekerja.addEventListener("click", function (event) {
        event.preventDefault();
        const idPeg = document.getElementById("Id_Peg").value;
        const NoKK = document.getElementById("NomorKK").value;
        const Kd_PISAT = document.getElementById("Kd_PISAT").value;
        const Kd_Kawin = document.getElementById("Kd_Kawin").value;
        var tgg = 0;
        const checkbox = document.getElementById("checkBPJS");
        if (checkbox.checked) {
            tgg = 1;
        } else  {
            tgg = 0;
        }
        const data = {
            kd_peg: idPeg,
            nokk: NoKK,
            PISAT: Kd_PISAT,
            status: Kd_Kawin,
            tgg: tgg,

        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "updatePekerja");
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
            .catch((error) => console.error("Form submission error:", error));
    });

    divisiButton.addEventListener("click", function () {
        //Buat if yang mana yang checked di radio button maka lakukan ini
        var selectedValue = $("input[name='opsiKerja']:checked").val();
        var kode = "";
        if (selectedValue === "Harian") {
            kode = 1;
        } else if (selectedValue === "Staff") {
            kode = 2;
        }
        fetch("/getDivisi/" + kode)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Divisi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Id_Div, item.Nama_Div];
                    $("#tabel_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    karyawanButton.addEventListener("click", function () {
        var kode = document.getElementById("Id_Div").value;
        console.log(kode);
        fetch("/getPegawaiKeluarga/" + kode)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Karyawan").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Kd_Pegawai, item.Nama_Peg];
                    $("#tabel_Karyawan").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Karyawan").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        hideModalDivisi();
    });
    $("#tabel_Karyawan tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Karyawan").DataTable().row(this).data();
        const checkbox = document.getElementById("checkBPJS");

        // Populate the input fields with the data
        $("#Id_Peg").val(rowData[0]);
        fetch("/getDataPegawai/" + rowData[0])
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Loop through the data and create table rows
                data.forEach((item) => {
                    $("#Nama_Peg").val(item.Nama_Peg);
                    $("#NomorKK").val(item.NoKK);
                    $("#Kd_PISAT").val(item.KdPisat);
                    $("#PISAT").val(item.Pisat);
                    $("#Kd_Kawin").val(item.StatusKK);
                    $("#Kawin").val(item.Status);
                    const penanggungValue = Number(item.Penanggung);

                    // Gunakan operator === untuk perbandingan dengan angka
                    if (penanggungValue === 0) {
                        checkbox.checked = false; // Set unchecked jika item.Penanggung bernilai 0
                    } else if (penanggungValue === 1) {
                        checkbox.checked = true; // Set checked jika item.Penanggung bernilai 1
                    }
                });

                // Redraw the table to show the changes
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        fetch("/getDataKeluarga/" + rowData[0])
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Keluarga").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.IdKeluarga,
                        item.Nama,
                        item.Hubungan,
                        item.Kelamin,
                        item.KotaLahir,
                        item.TglLahir,
                        item.Pisat,
                        item.Status,
                        item.NIK,
                        item.IdBPJS,
                        item.Klinik,
                    ];
                    $("#tabel_Keluarga").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Keluarga").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalKaryawan();
    });
    $("#tabel_PISAT tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_PISAT").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_PISAT").val(rowData[0]);
        $("#PISAT").val(rowData[1]);
        hideModalPISAT();
    });
    $("#tabel_Kawin tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Kawin").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_Kawin").val(rowData[0]);
        $("#Kawin").val(rowData[1]);
        hideModalKawin();
    });
});
