
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
        table_Koreksi.select.style("single");
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
        table_Koreksi.select.style("multi");
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
        if ((action == 1)) {
            console.log(document.getElementById("KeteranganIsi").value + " " +document.getElementById("AlasanLembur").value );
            if ((document.getElementById("KeteranganIsi").value === 'L' || document.getElementById("KeteranganIsi").value === 'I') && document.getElementById("AlasanLembur").value === "") {
                alert("Alasan harus diisi");
                return;
            }
            const ChkDatang = document.getElementById("ChkDatang")
            const ChkPulang = document.getElementById("ChkPulang")


            const Tanggal = document.getElementById("TglMasuk").value;
            const kdpegawai = document.getElementById("Id_Peg").value;
            const ketAbsen = document.getElementById("KeteranganIsi").value;
            const jam_Masuk = document.getElementById("Masuk").value;
            const jam_Keluar = document.getElementById("Keluar").value;
            const jam_Istirahat_Awal = document.getElementById("IstirahatAwal").value;
            const jam_Istirahat_Akhir = document.getElementById("IstirahatAkhir").value;
            const jam_Datang = document.getElementById("Datang").value;
            const jam_Pulang = document.getElementById("Pulang").value;
            const ketLembur = document.getElementById("AlasanLembur").value;
            var checkDatang,checkPulang;
            if (ChkDatang.checked) {
                checkDatang = 'True';
            }else{
                checkDatang = 'False';
            }
            if (ChkPulang.checked) {
                checkPulang = 'True';
            }else{
                checkPulang = 'False';
            }
            const data = {
                Tanggal: Tanggal,
                kdpegawai: kdpegawai,
                userid: "4384",
                ketAbsen : ketAbsen,
                ketLembur : ketLembur,
                ChkDatang : checkDatang,
                ChkPulang : checkPulang,
                jam_Masuk : jam_Masuk,
                jam_Keluar : jam_Keluar,
                jam_Istirahat_Awal : jam_Istirahat_Awal,
                jam_Istirahat_Akhir : jam_Istirahat_Akhir,
                jam_Datang : jam_Datang,
                jam_Pulang : jam_Pulang,
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
        } else if ((action == 2)) {
            const Id_Peg = document.getElementById("Id_Peg").value;
            const KeteranganKoreksi = document.getElementById("KeteranganKoreksi").value;
            const jmlJamKoreksi = document.getElementById("jmlJamKoreksi").value;
            const jamTerlambatKoreksi = document.getElementById("jamTerlambatKoreksi").value;
            const jamTinggalKoreksi = document.getElementById("jamTinggalKoreksi").value;
            const jamLemburKoreksi = document.getElementById("jamLemburKoreksi").value;
            const jamLemburKoreksi2 = document.getElementById("jamLemburKoreksi2").value;
            const jamLemburKoreksi3 = document.getElementById("jamLemburKoreksi3").value;
            const jamLemburKoreksi4 = document.getElementById("jamLemburKoreksi4").value;
            const AlasanLemburKoreksi = document.getElementById("AlasanLemburKoreksi").value;
            const Id_Klinik = document.getElementById("Id_Klinik").value;

            var id_agenda = '';
            var selectedData = getSelectedRowData();
            // console.log(selectedData[0][16]);
            selectedData.forEach((item) => {
                id_agenda += item[16]+'.';
            });
            id_agenda = id_agenda.slice(0, -1);
            // console.log(id_agenda);
            // return;
            if (KeteranganKoreksi == 'M' && selectedData[0][16] =="A") {
                fetch(
                    "/ProgramPayroll/KoreksiAbsen/" +
                        rowData[1] +
                        ".cekManager"
                )
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.json(); // Assuming the response is in JSON format
                    })
                    .then((data) => {
                        if (data.length > 0) {
                            alert("Anda tidak mempunyai hak untuk koreksi absen Masuk milik Manager.");
                            return;
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });
            }
            if (KeteranganKoreksi == 'S' && Id_Klinik == '') {
                alert("Klinik harus diisi");
                return;
            }
            if (KeteranganKoreksi == 'L' && AlasanLemburKoreksi == '') {
                alert("alasan lembur harus diisi");
                return;
            }
            if (KeteranganKoreksi == 'L' && parseFloat(jamLemburKoreksi) + parseFloat(jamLemburKoreksi2) + parseFloat(jamLemburKoreksi3) + parseFloat(jamLemburKoreksi4) != parseFloat(jmlJamKoreksi)) {
                console.log(jamLemburKoreksi + jamLemburKoreksi2 + jamLemburKoreksi3 + jamLemburKoreksi4);
                alert("jumlah jam lembur harus sama dengan jumlah lembur 1-4");
                return;
            }
            if (confirm("apakah data akan dikoreksi")) {

            } else {
                return;
            }
            const data = {
                UserID : '4384',
                Id_Peg: Id_Peg,
                KeteranganKoreksi: KeteranganKoreksi,
                jmlJamKoreksi: jmlJamKoreksi,
                jamTerlambatKoreksi: jamTerlambatKoreksi,
                jamTinggalKoreksi: jamTinggalKoreksi,
                jamLemburKoreksi: jamLemburKoreksi,
                jamLemburKoreksi2: jamLemburKoreksi2,
                jamLemburKoreksi3: jamLemburKoreksi3,
                jamLemburKoreksi4: jamLemburKoreksi4,
                AlasanLemburKoreksi: AlasanLemburKoreksi,
                Id_Klinik: Id_Klinik,
                Id_Agenda : id_agenda
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "KoreksiAbsen/koreksi");
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
            ifUpdate.value = "Update Absen"; // Set the value of the input field to the corresponding data
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
        } else if ((action == 3)) {
            const TglMasukKoreksi = document.getElementById("TglMasukKoreksi").value;
            const Id_Peg = document.getElementById("Id_Peg").value;
            const KeteranganKoreksi = document.getElementById("KeteranganKoreksi").value;
            var selectedData = getSelectedRowData();
            // console.log(selectedData[0][16]);
            const Id_Agenda = selectedData[0][16];

            const data = {
                TglMasukKoreksi: TglMasukKoreksi,
                Id_Peg: Id_Peg,
                Id_Agenda: Id_Agenda,
                KeteranganKoreksi: KeteranganKoreksi,
            };
            if (confirm("apakah data tanggal "+ TglMasukKoreksi + " akan dihapus ?")) {

            } else {
                return;
            }
            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "KoreksiAbsen/hapusAbsen}");
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
        order: [[0, "desc"]],
    });
    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Klinik").DataTable({
        order: [[0, "asc"]],
    });
    var table_Koreksi = $("#table_Koreksi").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "api",
        },
    });
    function getSelectedRowData() {
        // Dapatkan semua baris yang dipilih
        var selectedRows = table_Koreksi.rows({ selected: true });

        // Array untuk menyimpan data dari baris yang dipilih
        var selectedData = [];

        // Loop melalui baris yang dipilih dan tambahkan datanya ke dalam array
        selectedRows.every(function () {
            var rowData = this.data();
            selectedData.push(rowData);
        });

        return selectedData;
    }
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        fetch("/ProgramPayroll/KoreksiAbsen/" + rowData[0] + ".getPegawai")
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
    $("#table_Klinik tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Klinik").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Klinik").val(rowData[0]);
        $("#Nama_Klinik").val(rowData[1]);

        hideModalKlinik();
    });
    $("#table_Shift tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Shift").DataTable().row(this).data();
        // console.log(rowData);
        // Populate the input fields with the data
        $("#Id_Shift").val(rowData[0]);
        if (rowData[0] != "") {
            fetch("/ProgramPayroll/KoreksiAbsen/" + rowData[0] + ".getShift")
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
                        "/ProgramPayroll/KoreksiAbsen/" +
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
                            if (
                                data[0].minjam != null &&
                                data[0].maxjam != null
                            ) {
                                $("#Datang").val(data[0].minjam.split(" ")[1]);
                                $("#Pulang").val(data[0].maxjam.split(" ")[1]);
                            } else if (data[0].maxjam != null) {
                                $("#Datang").val(data[0].maxjam.split(" ")[1]);
                                $("#Pulang").val(data[0].maxjam.split(" ")[1]);
                            } else if (data[0].minjam != null) {
                                $("#Datang").val(data[0].minjam.split(" ")[1]);
                                $("#Pulang").val(data[0].minjam.split(" ")[1]);
                            } else {
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
    var selectedRows = [];
    $("#table_Koreksi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        if (table_Koreksi.select.style() === 'api') {
            // Hentikan eksekusi fungsi jika fitur select tidak aktif
            return;
        }
        var rowData = $("#table_Koreksi").DataTable().row(this).data();

        var TglKoreksi = rowData[1].split(" ");
        var selectedData = $("#table_Koreksi").DataTable().rows({selected: true}).data();
        selectedRows = selectedData.toArray();
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
            klinikButton.disabled = true;
            txtLembur.disabled = true;
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
        console.log(selectedRows);
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
                klinikButton.disabled = true;
                txtLembur.disabled = true;
            }
        });
    document
        .getElementById("KeteranganIsi")
        .addEventListener("change", function (e) {
            // kode yang akan dijalankan ketika nilai select berubah
            var ketKoreksi = document.getElementById("KeteranganIsi");
            const AlasanLembur = document.getElementById("AlasanLembur");

            if (ketKoreksi.value == "L" || ketKoreksi.value == "C" || ketKoreksi.value == "D" || ketKoreksi.value == "I") {
                AlasanLembur.disabled = false;

            } else {
                AlasanLembur.disabled = true;
            }
        });
    $("#buttonTampil").click(function () {
        const Kd_Peg = document.getElementById("Id_Peg").value;
        const tglAwal = document.getElementById("TglMulai").value;
        const tglAkhir = document.getElementById("TglSelesai").value;
        const divisi = document.getElementById("Id_Div").value;
        fetch(
            "/ProgramPayroll/KoreksiAbsen/" +
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

