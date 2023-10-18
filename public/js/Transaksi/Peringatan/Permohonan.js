$(document).ready(function () {
    const isiButton = document.getElementById("isiButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const batalButton = document.getElementById("batalButton");
    const simpanButton = document.getElementById("simpanButton");
    var useracc = "";
    var a;
    isiButton.addEventListener("click", function () {
        a = 1;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
    });
    koreksiButton.addEventListener("click", function () {
        a = 2;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
    });
    hapusButton.addEventListener("click", function () {
        a = 3;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
    });
    batalButton.addEventListener("click", function () {
        isiButton.hidden = false;
        koreksiButton.hidden = false;
        simpanButton.hidden = true;
        batalButton.hidden = true;
        hapusButton.disabled = false;
    });
    simpanButton.addEventListener("click", function () {
        console.log(a);
        const kd_pegawai = document.getElementById("Id_Peg").value;
        const peringatan_ke = document.getElementById("Peringatan_ke").value;
        const bulan = document.getElementById("bulanPeringatan").value;
        const tahun = document.getElementById("tahunPeringatan").value;
        const no_surat = document.getElementById("Nomor_Surat").value;
        const PeriLama = document.getElementById("Peringatan_Ke_Lama").value;
        const TglLama = document.getElementById("TglPeringatanLama").value;
        const Mulai = document.getElementById("TglMulai").value;
        const Akhir = document.getElementById("TglSelesai").value;
        const Uraian = document.getElementById("Uraian").value;
        console.log(
            (new Date(Akhir) - new Date(Mulai)) / (1000 * 60 * 60 * 24)
        );
        if (
            !(
                PeriLama.trim() === "1" ||
                PeriLama.trim() === "2" ||
                PeriLama.trim() === "3" ||
                PeriLama.trim() === ""
            ) &&
            useracc === "" &&
            TglLama !== Akhir
        ) {
            alert(
                "Maaf Anda Tidak dapat menyimpan Data ini.\nKarena Data Lama Belum Di Acc"
            );
            return;
            // Menghentikan eksekusi lebih lanjut jika kondisi tidak memenuhi
        }

        if (
            parseInt(
                (new Date(Akhir) - new Date(Mulai)) / (1000 * 60 * 60 * 24)
            ) < 179 &&
            a !== 3
        ) {
            alert("Maaf Tanggal Berakhirnya Tolong di Cek Lagiiiii.");
            document.getElementById("TglSelesai").focus();
            // Menghentikan eksekusi lebih lanjut jika kondisi tidak memenuhi
            return;
        }
        if (Uraian == "") {
            document.getElementById("Uraian").focus();
            return;
        }
        if (a == 1) {
            console.log("isi berjalan");

            const data = {
                kd_pegawai: kd_pegawai,
                peringatan_ke: peringatan_ke,
                bulan: bulan,
                tahun: tahun,
                no_surat: no_surat,
                uraian: Uraian,
                TglBerlaku: Mulai,
                TglAkhir: Akhir,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Permohonan");
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
        }
        if (a == 2) {
            console.log("koreksi berjalan");

            const data = {
                kd_pegawai: kd_pegawai,
                peringatan_ke: peringatan_ke,
                bulan: bulan,
                tahun: tahun,
                no_surat: no_surat,
                uraian: Uraian,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Permohonan/{kd_pegawai}");
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
        if (a == 3) {
            console.log("hapus berjalan");

            const data = {
                kd_pegawai: kd_pegawai,
                peringatan_ke: peringatan_ke,
                bulan: bulan,
                tahun: tahun,
            };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Permohonan/{kd_pegawai}");
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
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);

        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Peg").DataTable({
        order: [[0, "asc"]],
    });

    // Attach click event to table rows
    $("#table_Peg tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        console.log($("#table_Peg").DataTable().row(this));
        var rowData = $("#table_Peg").DataTable().row(this).data();
        console.log(rowData);
        // Populate the input fields with the data
        $("#Id_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);
        MaxPeri(1);
        // Hide the modal immediately after populating the data
        hideModalPegawai();
    });

    // Attach click event to the button to show the modal
    $("#divisiButton").on("click", function () {
        fetch("/ProgramPayroll/Peringatan/Permohonan/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Divisi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Id_Div, item.Nama_Div];
                    $("#table_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        showModalDivisi();
    });
    $("#pegawaiButton").on("click", function () {
        const id_div = document.getElementById("Id_Div").value;
        fetch("/ProgramPayroll/Peringatan/Permohonan/" + id_div + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Peg").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.kd_pegawai, item.nama_peg];
                    $("#table_Peg").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Peg").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        showModalPegawai();
    });
    function MaxPeri(kode) {
        const kd_pegawai = document.getElementById("Id_Peg").value;

        fetch("/ProgramPayroll/Peringatan/Permohonan/" + kd_pegawai + ".getPeringatan")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data[0].Thn !== "") {
                    $("#Tahun_Akhir").val(data[0].Thn);
                    fetch(
                        "/ProgramPayroll/Peringatan/Permohonan/" +
                            kd_pegawai +
                            "." +
                            data[0].Thn +
                            ".getPeringatan2"
                    )
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json(); // Assuming the response is in JSON format
                        })
                        .then((data) => {
                            // console.log(data);
                            if (data[0].Bln !== "") {
                                $("#Bulan_Akhir").val(data[0].Bln);
                                const Tahun_Akhir =
                                    document.getElementById(
                                        "Tahun_Akhir"
                                    ).value;
                                fetch(
                                    "/ProgramPayroll/Peringatan/Permohonan/" +
                                        kd_pegawai +
                                        "." +
                                        Tahun_Akhir +
                                        "." +
                                        data[0].Bln +
                                        ".getPeringatan3"
                                )
                                    .then((response) => {
                                        if (!response.ok) {
                                            throw new Error(
                                                "Network response was not ok"
                                            );
                                        }
                                        return response.json(); // Assuming the response is in JSON format
                                    })
                                    .then((data) => {
                                        // console.log(data);
                                        if (data.length > 0) {
                                            useracc = data[0].UserAcc;
                                            $("#Peringatan_Ke_Lama").val(
                                                data[0].peringatan_ke
                                            );
                                            $("#TglPeringatanLama").val(
                                                data[0].TglAkhir.split(" ")[0]
                                            );
                                        }
                                    })
                                    .catch((error) => {
                                        console.error("Error:", error);
                                    });
                            }
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
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
