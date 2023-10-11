$(document).ready(function () {
    const tambahButton = document.getElementById("tambahButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const prosesButton = document.getElementById("prosesButton");
    const batalButton = document.getElementById("batalButton");
    const tambahSection = document.getElementById("tambahSection");
    const koreksiSection = document.getElementById("koreksiSection");
    const klinikButton = document.getElementById("klinikButton");
    const txtLembur = document.getElementById("AlasanLemburKoreksi");
    var action = 0;
    tambahButton.addEventListener("click", function (event) {
        action = 1;
        event.preventDefault();
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        koreksiButton.disabled = true;
        tambahSection.hidden = false;
        koreksiSection.hidden = true;
    });
    hapusButton.addEventListener("click", function (event) {
        action = 3;
        table_Koreksi.select.style("multiple");
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        koreksiButton.disabled = true;
    });
    batalButton.addEventListener("click", function (event) {
        event.preventDefault();
        action = 0;
        table_Koreksi.select.style("api");
        tambahButton.disabled = false;
        hapusButton.disabled = false;
        koreksiButton.disabled = false;
        tambahSection.hidden = true;
        koreksiSection.hidden = false;
        document.getElementById("TglMasukKoreksi").disabled = true;
        document.getElementById("KeteranganKoreksi").disabled = true;
        document.getElementById("jmlJamKoreksi").disabled = true;
        document.getElementById("jamTerlambatKoreksi").disabled = true;
        document.getElementById("jamTinggalKoreksi").disabled = true;
        document.getElementById("jamLemburKoreksi").disabled = true;
        document.getElementById("jamLemburKoreksi2").disabled = true;
        document.getElementById("jamLemburKoreksi3").disabled = true;
        document.getElementById("jamLemburKoreksi4").disabled = true;
    });
    koreksiButton.addEventListener("click", function (event) {
        event.preventDefault();
        action = 2;
        table_Koreksi.select.style("single");
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        koreksiButton.disabled = true;
        tambahSection.hidden = true;
        koreksiSection.hidden = false;
        document.getElementById("TglMasukKoreksi").disabled = false;
        document.getElementById("KeteranganKoreksi").disabled = false;
        document.getElementById("jmlJamKoreksi").disabled = false;
        document.getElementById("jamTerlambatKoreksi").disabled = false;
        document.getElementById("jamTinggalKoreksi").disabled = false;
        document.getElementById("jamLemburKoreksi").disabled = false;
        document.getElementById("jamLemburKoreksi2").disabled = false;
        document.getElementById("jamLemburKoreksi3").disabled = false;
        document.getElementById("jamLemburKoreksi4").disabled = false;
    });
    prosesButton.addEventListener("click", function (event) {
        if ((action = 1)) {
            const Nama_Klinik = document.getElementById("Nama_Klinik");
            const AlamatKlinik = document.getElementById("AlamatKlinik");
            const KotaKlinik = document.getElementById("KotaKlinik");
            const NomorTelepon = document.getElementById("NomorTelepon");
            const data = {
                nm: Nama_Klinik.value,
                alamat: AlamatKlinik.value,
                kota: KotaKlinik.value,
                telp: NomorTelepon.value,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "KoreksiAbsen");
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
        } else if ((action = 2)) {
            const idklinik = document.getElementById("Id_Klinik");
            const Nama_Klinik = document.getElementById("Nama_Klinik");
            const AlamatKlinik = document.getElementById("AlamatKlinik");
            const KotaKlinik = document.getElementById("KotaKlinik");
            const NomorTelepon = document.getElementById("NomorTelepon");
            const data = {
                idklinik: idklinik.value,
                nm: Nama_Klinik.value,
                alamat: AlamatKlinik.value,
                kota: KotaKlinik.value,
                telp: NomorTelepon.value,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MasterKlinik/{idklinik}");
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
        } else if ((action = 3)) {
            const idklinik = document.getElementById("Id_Klinik").value;

            const data = {
                idklinik: idklinik,
            };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "KoreksiAbsen/{idklinik}");
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
    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    var table_Koreksi = $("#table_Koreksi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        fetch("/KoreksiAbsen/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Pegawai").DataTable().clear().draw();
                var rows = ["ALL", "ALL"];
                $("#table_Pegawai").DataTable().row.add(rows);
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
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);

        hideModalPegawai();
    });
    $("#table_Shift tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Shift").DataTable().row(this).data();
        // console.log(rowData);
        // Populate the input fields with the data
        $("#Id_Shift").val(rowData[0]);
        if (rowData[0] != "") {
            fetch("/KoreksiAbsen/" + rowData[0] + ".getShift")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Handle the data retrieved from the server (data should be an object or an array)

                    // Clear the existing table rows
                    $("#Masuk").val(data[0].masuk.split(" ")[1]);
                    $("#Keluar").val(data[0].pulang.split(" ")[1]);
                    $("#IstirahatAwal").val(
                        data[0].awal_jam_istirahat.split(" ")[1]
                    );
                    $("#IstirahatAkhir").val(
                        data[0].akhir_jam_istirahat.split(" ")[1]
                    );
                    const TglMasuk = document.getElementById("TglMasuk").value;
                    const Kd_Peg = document.getElementById("Id_Peg").value;
                    // Loop through the data and create table rows
                    fetch(
                        "/KoreksiAbsen/" +
                            TglMasuk +
                            "." +
                            Kd_Peg +
                            ".getDatangPulang"
                    )
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json(); // Assuming the response is in JSON format
                        })
                        .then((data) => {
                            // Handle the data retrieved from the server (data should be an object or an array)
                            console.log(data[0].minjam);
                            // Clear the existing table rows
                            if (data[0].minjam != null && data[0].maxjam != null) {
                                $("#Datang").val(data[0].minjam.split(" ")[1]);
                                $("#Pulang").val(data[0].maxjam.split(" ")[1]);
                            }else if (data[0].maxjam != null) {
                                $("#Datang").val(data[0].maxjam.split(" ")[1]);
                                $("#Pulang").val(data[0].maxjam.split(" ")[1]);
                            }else if (data[0].minjam != null) {
                                $("#Datang").val(data[0].minjam.split(" ")[1]);
                                $("#Pulang").val(data[0].minjam.split(" ")[1]);
                            }else{
                                $("#Datang").val("00:00");
                                $("#Pulang").val("00:00");
                            }

                            // Loop through the data and create table rows
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
        hideModalShift();
    });
    $("#table_Koreksi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Koreksi").DataTable().row(this).data();
        var TglKoreksi = rowData[1].split(" ");

        // Populate the input fields with the data
        $("#TglMasukKoreksi").val(TglKoreksi[0]);
        var ketKoreksi = document.getElementById("KeteranganKoreksi");
        $("#KeteranganKoreksi").val(rowData[6]);
        if (ketKoreksi.value == "L" && action == 2) {
            klinikButton.disabled = true;
            txtLembur.disabled = false;
        } else if (ketKoreksi.value == "S" && action == 2) {
            klinikButton.disabled = false;
            txtLembur.disabled = true;
            klinikButton.focus;
        } else if (ketKoreksi.value == "I" && action == 2) {
            klinikButton.disabled = true;
            txtLembur.disabled = false;
        } else {
            klinikButton.disabled = false;
            txtLembur.disabled = false;
        }
        // Loop melalui semua opsi dalam elemen select
        // for (var i = 0; i < selectElement.options.length; i++) {
        //     var option = selectElement.options[i];

        //     // Memeriksa apakah nilai option sama dengan nilai yang Anda miliki
        //     if (option.value === rowData[6]) {
        //         // Mengatur atribut 'selected' jika nilainya sama
        //         option.selected = true;
        //     } else {
        //         // Menghilangkan atribut 'selected' jika tidak sama
        //         option.selected = false;
        //     }
        // }
        $("#AlasanLemburKoreksi").val(rowData[7]);
        $("#jmlJamKoreksi").val(rowData[15]);
        $("#jamTerlambatKoreksi").val(rowData[8]);
        $("#jamTinggalKoreksi").val(rowData[9]);
        $("#jamLemburKoreksi").val(rowData[11]);
        $("#jamLemburKoreksi2").val(rowData[12]);
        $("#jamLemburKoreksi3").val(rowData[13]);
        $("#jamLemburKoreksi4").val(rowData[14]);

        // $("#Id_Peg").val(rowData[0]);
        // $("#Nama_Peg").val(rowData[1]);
        // $("#Id_Peg").val(rowData[0]);
        // $("#Nama_Peg").val(rowData[1]);
    });
    document
        .getElementById("KeteranganKoreksi")
        .addEventListener("change", function (e) {
            // kode yang akan dijalankan ketika nilai select berubah
            var ketKoreksi = document.getElementById("KeteranganKoreksi");
            if (ketKoreksi.value == "L" && action == 2) {
                klinikButton.disabled = true;
                txtLembur.disabled = false;
            } else if (ketKoreksi.value == "S" && action == 2) {
                klinikButton.disabled = false;
                txtLembur.disabled = true;
                klinikButton.focus;
            } else if (ketKoreksi.value == "I" && action == 2) {
                klinikButton.disabled = true;
                txtLembur.disabled = false;
            } else {
                klinikButton.disabled = false;
                txtLembur.disabled = false;
            }
        });
    $("#buttonTampil").click(function () {
        const Kd_Peg = document.getElementById("Id_Peg").value;
        const tglAwal = document.getElementById("TglMulai").value;
        const tglAkhir = document.getElementById("TglSelesai").value;
        const divisi = document.getElementById("Id_Div").value;
        fetch(
            "/KoreksiAbsen/" +
                Kd_Peg +
                "." +
                tglAwal +
                "." +
                tglAkhir +
                "." +
                divisi +
                ".getDataAbsen"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Koreksi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.Kd_pegawai,
                        item.Tanggal,
                        item.Jam_Masuk,
                        item.Jam_Keluar,
                        item.Datang,
                        item.Pulang,
                        item.Ket_Absensi,
                        item.Ket_Lembur,
                        item.Terlambat,
                        item.Tinggal,
                        item.Kelebihan_Jam,
                        item.Lembur_15X,
                        item.Lembur_2X,
                        item.Lembur_3X,
                        item.Lembur_4x,
                        item.Jml_Jam,
                        item.id_agenda,
                        item.jml_jam_rehat,
                    ];
                    $("#table_Koreksi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Koreksi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
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
function showModalShift() {
    $("#modalShift").modal("show");
}
function hideModalShift() {
    $("#modalShift").modal("hide");
}
