$(document).ready(function () {
    const tampilButton = document.getElementById("tampilButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const prosesButton = document.getElementById("prosesButton");
    const batalButton = document.getElementById("batalButton");
    const divisiButton = document.getElementById("divisiButton");
    const TglLembur = document.getElementById("TglLembur");
    // const batalButton = document.getElementById("batalButton");
    var proses = 0;
    koreksiButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 2;
        koreksiButton.disabled = true;
        hapusButton.disabled = true;
        batalButton.disabled = false;
        prosesButton.disabled = false;
        divisiButton.disabled = false;
        TglLembur.disabled = false;
        tampilButton.disabled = false;
    });
    hapusButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 3;
        koreksiButton.disabled = true;
        hapusButton.disabled = true;
        batalButton.disabled = false;
        prosesButton.disabled = false;
        divisiButton.disabled = false;
        TglLembur.disabled = false;
        tampilButton.disabled = false;
    });
    batalButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 0;
        koreksiButton.disabled = false;
        hapusButton.disabled = false;
        batalButton.disabled = true;
        prosesButton.disabled = true;
        divisiButton.disabled = true;
        TglLembur.disabled = true;
        tampilButton.disabled = true;
    });
    var table = $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);
        hideModalDivisi();
    });
    var jumlahJamLama, idactual;

    table.on("select", function (e, dt, type, indexes) {
        if (type === "row") {
            var data = table.rows(indexes).data();
            jumlahJamLama = data[0][data[0].length - 2];
            idactual = data[0][data[0].length - 1]; // Mengambil data dari kolom terakhir
            console.log(jumlahJamLama + "." + idactual);
        }
    });

    table.on("deselect", function (e, dt, type, indexes) {
        if (type === "row") {
            jumlahJamLama = null;
            idactual = null;
            console.log(jumlahJamLama + "." + idactual);
        }
    });
    tampilButton.addEventListener("click", function (event) {
        var radio1 = document.getElementById("radio1");
        var radio2 = document.getElementById("radio2");
        const tanggalLembur = document.getElementById("TglLembur").value;
        const Id_Div = document.getElementById("Id_Divisi").value;
        if (radio1.checked) {
            fetch("/Lembur/" + Id_Div + "." + tanggalLembur + ".getSemuaLembur")
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
                        var row = [
                            // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                            //     " " +
                            item.Kd_Pegawai,
                            item.nama_peg,
                            item.Lembur_15X,
                            item.Lembur_2X,
                            item.Lembur_3X,
                            item.Lembur_4x,
                            item.Ket_Lembur,
                            item.Jml_Jam,
                            item.Id_Actual,
                        ];
                        $("#table_Pegawai").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#table_Pegawai").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        } else if (radio2.checked) {
            fetch(
                "/Lembur/" + Id_Div + "." + tanggalLembur + ".getLemburDouble"
            )
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
                        var row = [
                            // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                            //     " " +
                            item.Kd_Pegawai,
                            item.Nama_Peg,
                            item.Lembur_15X,
                            item.Lembur_2X,
                            item.Lembur_3X,
                            item.Lembur_4x,
                            item.Ket_Lembur,
                            item.Jml_Jam,
                            item.Id_Actual,
                        ];
                        $("#table_Pegawai").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#table_Pegawai").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);
        $("#Lembur_15x").val(rowData[2]);
        $("#Lembur_2x").val(rowData[3]);
        $("#Lembur_3x").val(rowData[4]);
        $("#Lembur_4x").val(rowData[5]);
        $("#Alasan_Lembur").val(rowData[6]);
        $("#Jml_Jam").val(rowData[7]);
    });
    var lembur15xInput = document.getElementById("Lembur_15x");
    var lembur2xInput = document.getElementById("Lembur_2x");
    var lembur3xInput = document.getElementById("Lembur_3x");
    var lembur4xInput = document.getElementById("Lembur_4x");
    var jumlahJamInput = document.getElementById("Jml_Jam");

    // Tambahkan event listener ke setiap input Lembur
    lembur15xInput.addEventListener("input", updateJumlahJam);
    lembur2xInput.addEventListener("input", updateJumlahJam);
    lembur3xInput.addEventListener("input", updateJumlahJam);
    lembur4xInput.addEventListener("input", updateJumlahJam);

    function updateJumlahJam() {
        // Lakukan perhitungan untuk mendapatkan nilai Jumlah Jam
        var lembur15xValue = parseFloat(lembur15xInput.value) || 0;
        var lembur2xValue = parseFloat(lembur2xInput.value) || 0;
        var lembur3xValue = parseFloat(lembur3xInput.value) || 0;
        var lembur4xValue = parseFloat(lembur4xInput.value) || 0;

        var totalLembur =
            lembur15xValue + lembur2xValue + lembur3xValue + lembur4xValue;

        // Memasukkan nilai Jumlah Jam ke input Jml_Jam
        jumlahJamInput.value = totalLembur;
    }
    prosesButton.addEventListener("click", function (event) {
        //Koreksi
        if (proses == 2) {
            event.preventDefault();
            const Jml_Jam = parseFloat(
                document.getElementById("Jml_Jam").value
            );
            if (jumlahJamLama != Jml_Jam) {
                alert(
                    "jml jam tidak boleh berubah karena data sudah di acc supervisor"
                );
                return;
            }
            const Kd_Peg = document.getElementById("Kd_Peg").value;
            const Nama_Peg = document.getElementById("Nama_Peg").value;
            const Alasan = document.getElementById("Alasan_Lembur").value;
            const Lembur15x = document.getElementById("Lembur_15x").value;
            const Lembur2x = document.getElementById("Lembur_2x").value;
            const Lembur3x = document.getElementById("Lembur_3x").value;
            const Lembur4x = document.getElementById("Lembur_4x").value;
            if (
                Kd_Peg === "" ||
                Nama_Peg === "" ||
                Alasan === "" ||
                Lembur15x === "" ||
                Lembur2x === "" ||
                Lembur3x === "" ||
                Lembur4x === "" ||
                Jml_Jam === ""
            ) {
                // Salah satu atau lebih elemen input memiliki nilai kosong
                alert("Masih ada field yang kosong !");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Kd_Peg: Kd_Peg,
                Nama_Peg: Nama_Peg,
                Alasan: Alasan,
                Lembur15x: Lembur15x,
                Lembur2x: Lembur2x,
                Lembur3x: Lembur3x,
                Lembur4x: Lembur4x,
                Jml_Jam: Jml_Jam,
                idactual: idactual,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Lembur/{Kd_Peg}");
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
            ifUpdate.value = "Update Lembur"; // Set the value of the input field to the corresponding data
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
        } else if (proses == 3) {
            event.preventDefault();
            fetch("/Lembur/" + idactual + ".cekAccSupervisor")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    if (data.length === 0) {
                        const Jml_Jam = parseFloat(
                            document.getElementById("Jml_Jam").value
                        );
                        const Kd_Peg = document.getElementById("Kd_Peg").value;
                        const Nama_Peg =
                            document.getElementById("Nama_Peg").value;
                        const Alasan =
                            document.getElementById("Alasan_Lembur").value;
                        const Lembur15x =
                            document.getElementById("Lembur_15x").value;
                        const Lembur2x =
                            document.getElementById("Lembur_2x").value;
                        const Lembur3x =
                            document.getElementById("Lembur_3x").value;
                        const Lembur4x =
                            document.getElementById("Lembur_4x").value;
                        if (
                            Kd_Peg === "" ||
                            Nama_Peg === "" ||
                            Alasan === "" ||
                            Lembur15x === "" ||
                            Lembur2x === "" ||
                            Lembur3x === "" ||
                            Lembur4x === "" ||
                            Jml_Jam === ""
                        ) {
                            // Salah satu atau lebih elemen input memiliki nilai kosong
                            alert("Masih ada field yang kosong !");
                            return; // Menghentikan eksekusi lebih lanjut
                        }
                        const data = {
                            Kd_Peg: Kd_Peg,
                            Nama_Peg: Nama_Peg,
                            Alasan: Alasan,
                            Lembur15x: Lembur15x,
                            Lembur2x: Lembur2x,
                            Lembur3x: Lembur3x,
                            Lembur4x: Lembur4x,
                            Jml_Jam: Jml_Jam,
                            idactual: idactual,
                        };

                        const formContainer =
                            document.getElementById("form-container");
                        const form = document.createElement("form");
                        form.setAttribute("action", "Lembur/{Kd_Peg}");
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
                            .then(() =>
                                console.log("Form submitted successfully!")
                            )
                            .catch((error) =>
                                console.error("Form submission error:", error)
                            );
                    } else {
                        alert(
                            "data tidak dapat dikoreksi karena sudah diACC oleh Supervisor !"
                        );
                        return;
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
});
function showModalDivisi() {
    $("#modalDivisi").modal("show");
}
function hideModalDivisi() {
    $("#modalDivisi").modal("hide");
}
