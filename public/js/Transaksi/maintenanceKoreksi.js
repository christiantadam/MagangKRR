$(document).ready(function () {
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const isiButton = document.getElementById("isiButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const simpanButton = document.getElementById("simpanButton");
    const batalButton = document.getElementById("batalButton");
    var radio1 = document.getElementById("radio1");
    var radio2 = document.getElementById("radio2");
    var CekDataAda;
    var a;
    // Tambahkan event listener untuk perubahan
    radio1.addEventListener("change", function () {
        if (this.checked) {
            // Fungsi yang akan dijalankan ketika radio1 dipilih
            $("#Id_Divisi").val("");
            $("#Nama_Divisi").val("");
            $("#Id_Pegawai").val("");
            $("#Nama_Pegawai").val("");
            $("#Nilai").val("");
            $("#keterangan").val("");
        }
    });

    radio2.addEventListener("change", function () {
        if (this.checked) {
            // Fungsi yang akan dijalankan ketika radio1 dipilih
            $("#Id_Divisi").val("");
            $("#Nama_Divisi").val("");
            $("#Id_Pegawai").val("");
            $("#Nama_Pegawai").val("");
            $("#Nilai").val("");
            $("#keterangan").val("");
        }
    });
    isiButton.addEventListener("click", function () {
        a = 1;

        $("#TglKoreksi").prop("disabled", false);
        $("#divisiButton").prop("disabled", false);
        $("#pegawaiButton").prop("disabled", false);
        $("#Nilai").prop("disabled", false);
        $("#keterangan").prop("disabled", false);
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
    });
    koreksiButton.addEventListener("click", function () {
        a = 2;

        $("#TglKoreksi").prop("disabled", false);
        $("#divisiButton").prop("disabled", false);
        $("#pegawaiButton").prop("disabled", false);
        $("#Nilai").prop("disabled", false);
        $("#keterangan").prop("disabled", false);
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
    });
    batalButton.addEventListener("click", function () {
        a = 0;
        $("#TglKoreksi").val("");
        $("#Id_Divisi").val("");
        $("#Nama_Divisi").val("");
        $("#Id_Pegawai").val("");
        $("#Nama_Pegawai").val("");
        $("#Nilai").val("");
        $("#keterangan").val("");
        $("#TglKoreksi").prop("disabled", true);
        $("#divisiButton").prop("disabled", true);
        $("#pegawaiButton").prop("disabled", true);
        $("#Nilai").prop("disabled", true);
        $("#keterangan").prop("disabled", true);
        isiButton.hidden = false;
        koreksiButton.hidden = false;
        simpanButton.hidden = true;
        batalButton.hidden = true;
    });
    function Get_Pegawai_koreksi() {
        const kd_peg = document.getElementById("Id_Pegawai").value;
        const tanggal = document.getElementById("TglKoreksi").value;
        fetch(
            "/MaintenanceKoreksi/" +
                kd_peg +
                "." +
                tanggal +
                ".getPegawaiKoreksi"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Loop through the data and create table rows
                if (data.length > 0) {
                    data.forEach((item) => {
                        $("#Nilai").val(item.Nilai);
                        $("#keterangan").val(item.Keterangan);
                    });
                } else {
                    alert("Tidak ada Data .... Cek Tanggal dan Pegawai");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    function cekAdaKoreksi() {
        const kd_peg = document.getElementById("Id_Pegawai").value;
        const tanggal = document.getElementById("TglKoreksi").value;
        fetch("/MaintenanceKoreksi/" + kd_peg + "." + tanggal + ".cekKoreksi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Loop through the data and create table rows
                if (data.length > 0) {
                    console.log("datanya ada bang");
                    CekDataAda = true;
                } else {
                    console.log("datanya tidak ada bang");
                    CekDataAda = false;
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    var table = $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    divisiButton.addEventListener("click", function () {
        const Harian = document.getElementById("radio1");
        const Staff = document.getElementById("radio2");
        if (Harian.checked) {
            fetch("/MaintenanceKoreksi/" + ".getDivisiHarian")
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
        } else if (Staff.checked) {
            fetch("/MaintenanceKoreksi/" + ".getDivisiStaff")
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
        }

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
    pegawaiButton.addEventListener("click", function () {
        const Id_Div = document.getElementById("Id_Divisi").value;
        console.log("Masuk fungsi pegawai");
        fetch("/MaintenanceKoreksi/" + Id_Div + ".getPegawai")
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
        if (a != 1) {
            Get_Pegawai_koreksi();
        } else {
            const kd_peg = document.getElementById("Id_Pegawai").value;
            const tanggal = document.getElementById("TglKoreksi").value;
            fetch(
                "/MaintenanceKoreksi/" + kd_peg + "." + tanggal + ".cekKoreksi"
            )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Loop through the data and create table rows
                    if (data.length > 0) {
                        if (
                            confirm(
                                "Sudah ada data koreksi yang diinputkan untuk tanggal & kode pegawai yang sama. Ingin menambahkan jumlah koreksi gaji?"
                            )
                        ) {
                            // User clicked 'OK'
                            Get_Pegawai_koreksi();
                        }
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
        hideModalPegawai();
    });
    simpanButton.addEventListener("click", function () {
        const Harian = document.getElementById("radio1");
        const Staff = document.getElementById("radio2");
        const Nilai = document.getElementById("Nilai").value;
        const kd_peg = document.getElementById("Id_Pegawai").value;
        const TglKoreksi = document.getElementById("TglKoreksi").value;
        const Keterangan = document.getElementById("keterangan").value;

        if (Nilai == 0 && a == 1) {
            alert("Nilai salah ....");
            return;
        }
        if (Harian.checked) {
            var date = new Date(document.getElementById("TglKoreksi").value);
            var day = date.getDay();
            // JavaScript counts Sunday as 0, Monday as 1, and so on.
            // If you count Thursday as 4 (as in VB), you should check for day 3 here.
            if (day !== 3) {
                alert("Bukan Akhir Periode Gajian");
                var SaveData = false;
                return;
            }
        }
        if (a == 1) {
            if (Harian.checked) {
                fetch("/MaintenanceKoreksi/" + TglKoreksi + ".cekGajiHarian")
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.json(); // Assuming the response is in JSON format
                    })
                    .then((data) => {
                        // Loop through the data and create table rows
                        console.log(data);
                        if (data[0].jumlah > 0) {
                            alert("Sudah Masuk Periode Gajian");
                            // console.log("kelar fetch gaji harian");
                            // return
                        } else {
                            fetch(
                                "/MaintenanceKoreksi/" +
                                    kd_peg +
                                    "." +
                                    TglKoreksi +
                                    ".cekKoreksi"
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
                                    // Loop through the data and create table rows
                                    if (data.length > 0) {
                                        alert("Sudah ada data koreksi yang diinputkan untuk tanggal & kode pegawai yang sama.Silakan menggunakan modul KOREKSI"
                                        );


                                        return;
                                    } else {
                                        if (
                                            kd_peg === "" ||
                                            Nilai === "" ||
                                            TglKoreksi === "" ||
                                            Keterangan === ""
                                        ) {
                                            // Salah satu atau lebih elemen input memiliki nilai kosong
                                            alert("DATA BLM LENGKAP ....");
                                            return; // Menghentikan eksekusi lebih lanjut
                                        }

                                        const data = {
                                            kode: 1,
                                            tanggal: TglKoreksi,
                                            kd_pegawai: kd_peg,
                                            nilai: Nilai,
                                            keterangan: Keterangan,
                                            user_input: "U001",
                                            opsi: "harian",
                                        };

                                        console.log(data);

                                        const formContainer =
                                            document.getElementById(
                                                "form-container"
                                            );
                                        const form =
                                            document.createElement("form");
                                        form.setAttribute(
                                            "action",
                                            "MaintenanceKoreksi"
                                        );
                                        form.setAttribute("method", "POST");

                                        // Loop through the data object and add hidden input fields to the form
                                        for (const key in data) {
                                            const input =
                                                document.createElement("input");
                                            input.setAttribute(
                                                "type",
                                                "hidden"
                                            );
                                            input.setAttribute("name", key);
                                            input.value = data[key]; // Set the value of the input field to the corresponding data
                                            form.appendChild(input);
                                        }

                                        formContainer.appendChild(form);

                                        // Add CSRF token input field (assuming the csrfToken is properly fetched)
                                        let csrfToken = document
                                            .querySelector(
                                                'meta[name="csrf-token"]'
                                            )
                                            .getAttribute("content");
                                        let csrfInput =
                                            document.createElement("input");
                                        csrfInput.type = "hidden";
                                        csrfInput.name = "_token";
                                        csrfInput.value = csrfToken;
                                        form.appendChild(csrfInput);

                                        // Wrap form submission in a Promise
                                        function submitForm() {
                                            return new Promise(
                                                (resolve, reject) => {
                                                    form.onsubmit = resolve; // Resolve the Promise when the form is submitted
                                                    form.submit();
                                                }
                                            );
                                        }

                                        // Call the submitForm function to initiate the form submission
                                        submitForm()
                                            .then(() =>
                                                console.log(
                                                    "Form submitted successfully!"
                                                )
                                            )
                                            .catch((error) =>
                                                console.error(
                                                    "Form submission error:",
                                                    error
                                                )
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
            } else if (Staff.checked) {
                if (
                    kd_peg === "" ||
                    Nilai === "" ||
                    TglKoreksi === "" ||
                    Keterangan === ""
                ) {
                    // Salah satu atau lebih elemen input memiliki nilai kosong
                    alert("DATA BLM LENGKAP ....");
                    return; // Menghentikan eksekusi lebih lanjut
                }

                const data = {
                    kode: 1,
                    tanggal: TglKoreksi,
                    kd_pegawai: kd_peg,
                    nilai: Nilai,
                    keterangan: Keterangan,
                    user_input: "U001",
                    opsi: "staff",
                };

                console.log(data);

                const formContainer = document.getElementById("form-container");
                const form = document.createElement("form");
                form.setAttribute("action", "MaintenanceKoreksi");
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
        } else if (a == 2) {
            console.log("Masuk simpan koreksi");

            if (
                kd_peg === "" ||
                Nilai === "" ||
                TglKoreksi === "" ||
                Keterangan === ""
            ) {
                // Salah satu atau lebih elemen input memiliki nilai kosong
                alert("DATA BLM LENGKAP ....");
                return; // Menghentikan eksekusi lebih lanjut
            }
            var data;
            if (Harian.checked) {
                data = {
                    kode: 2,
                    tanggal: TglKoreksi,
                    kd_pegawai: kd_peg,
                    nilai: Nilai,
                    keterangan: Keterangan,
                    user_input: "U001",
                    opsi: "harian",
                };
            } else if (Staff.checked) {
                data = {
                    kode: 2,
                    tanggal: TglKoreksi,
                    kd_pegawai: kd_peg,
                    nilai: Nilai,
                    keterangan: Keterangan,
                    user_input: "U001",
                    opsi: "staff",
                };
            }

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MaintenanceKoreksi/{kode}");
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
            ifUpdate.value = "Update Pelatihan"; // Set the value of the input field to the corresponding data
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
        console.log("Masuk simpan isi");
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
