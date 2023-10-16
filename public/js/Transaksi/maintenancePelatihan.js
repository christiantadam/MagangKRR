$(document).ready(function () {
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const isiButton = document.getElementById("isiButton");
    const simpanButton = document.getElementById("simpanButton");
    const batalButton = document.getElementById("batalButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const okButton = document.getElementById("okButton");
    var table = $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pelatihan").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    divisiButton.addEventListener("click", function () {
        fetch("/ProgramPayroll/MaintenancePelatihan/" + ".getDivisi")
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
    pegawaiButton.addEventListener("click", function () {
        const Id_Div = document.getElementById("Id_Divisi").value;
        fetch("/ProgramPayroll/MaintenancePelatihan/" + Id_Div + ".getPegawai")
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
        const Kd_Peg = document.getElementById("Id_Pegawai").value;
        fetch("/ProgramPayroll/MaintenancePelatihan/" + Kd_Peg + ".getPelatihan")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pelatihan").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Tanggal,
                        item.Jenis,
                        item.NamaLembaga,
                        item.Tempat,
                        item.Topik,
                        item.Lama,
                        item.Waktu,
                        item.Nilai,
                        item.Id,
                        item.UserInput,
                    ];
                    $("#tabel_Pelatihan").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pelatihan").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalPegawai();
    });
    $("#tabel_Pelatihan tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pelatihan").DataTable().row(this).data();
        var TglPelatihan = rowData[0].split(" ");
        // Populate the input fields with the data
        $("#TglPelatihan").val(TglPelatihan[0]);
        $("#Id_Pelatihan").val(rowData[8]);
        var selectElement = document.getElementById("JenisPelatihan");

        // Loop melalui semua opsi dalam elemen select
        for (var i = 0; i < selectElement.options.length; i++) {
            var option = selectElement.options[i];

            // Memeriksa apakah nilai option sama dengan nilai yang Anda miliki
            if (option.value === rowData[1]) {
                // Mengatur atribut 'selected' jika nilainya sama
                option.selected = true;
            } else {
                // Menghilangkan atribut 'selected' jika tidak sama
                option.selected = false;
            }
        }
        $("#Lembaga_Pelatihan").val(rowData[2]);
        $("#tempat_Pelatihan").val(rowData[3]);
        $("#topik_Pelatihan").val(rowData[4]);
        $("#Lama_Pelatihan").val(rowData[5]);
        var selectWaktu = document.getElementById("waktu");

        // Loop melalui semua opsi dalam elemen select
        for (var i = 0; i < selectWaktu.options.length; i++) {
            var option = selectWaktu.options[i];

            // Memeriksa apakah nilai option sama dengan nilai yang Anda miliki
            if (option.value === rowData[6]) {
                // Mengatur atribut 'selected' jika nilainya sama
                option.selected = true;
            } else {
                // Menghilangkan atribut 'selected' jika tidak sama
                option.selected = false;
            }
        }
        $("#Nilai").val(rowData[7]);
        hideModalDivisi();
    });
    var proses = 0;
    isiButton.addEventListener("click", function () {
        proses = 1;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
    });
    koreksiButton.addEventListener("click", function () {
        proses = 2;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
    });
    hapusButton.addEventListener("click", function () {
        proses = 3;
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
    simpanButton.addEventListener("click", function (event) {
        // console.log(proses);
        // return;
        event.preventDefault();
        const Kd_Peg = document.getElementById("Id_Pegawai").value;
        const TglPelatihan = document.getElementById("TglPelatihan").value;
        const Id_Pelatihan = document.getElementById("Id_Pelatihan").value;
        const JenisPelatihan = document.getElementById("JenisPelatihan").value;
        const Lembaga_Pelatihan =
            document.getElementById("Lembaga_Pelatihan").value;
        const tempat_Pelatihan =
            document.getElementById("tempat_Pelatihan").value;
        const topik_Pelatihan =
            document.getElementById("topik_Pelatihan").value;
        const Lama_Pelatihan = document.getElementById("Lama_Pelatihan").value;
        const waktu = document.getElementById("waktu").value;
        const Nilai = document.getElementById("Nilai").value;
        if (Kd_Peg === "") {
            // Salah satu atau lebih elemen input memiliki nilai kosong
            alert("ISI KODE PEGAWAI DULU .... ");
            return; // Menghentikan eksekusi lebih lanjut
        }
        if (proses == 1) {
            if (
                TglPelatihan === "" ||
                Id_Pelatihan === "" ||
                JenisPelatihan === "" ||
                Lembaga_Pelatihan === "" ||
                tempat_Pelatihan === "" ||
                topik_Pelatihan === "" ||
                Lama_Pelatihan === "" ||
                waktu === "" ||
                Nilai === ""
            ) {
                // Salah satu atau lebih elemen input memiliki nilai kosong
                alert("DATA BLM LENGKAP ....");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Kd_Peg: Kd_Peg,
                TglPelatihan: TglPelatihan,
                Id_Pelatihan: Id_Pelatihan,
                JenisPelatihan: JenisPelatihan,
                Lembaga_Pelatihan: Lembaga_Pelatihan,
                tempat_Pelatihan: tempat_Pelatihan,
                topik_Pelatihan: topik_Pelatihan,
                Lama_Pelatihan: Lama_Pelatihan,
                waktu: waktu,
                Nilai: Nilai,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MaintenancePelatihan");
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
        if (proses == 2) {
            if (
                TglPelatihan === "" ||
                Id_Pelatihan === "" ||
                JenisPelatihan === "" ||
                Lembaga_Pelatihan === "" ||
                tempat_Pelatihan === "" ||
                topik_Pelatihan === "" ||
                Lama_Pelatihan === "" ||
                waktu === "" ||
                Nilai === ""
            ) {
                // Salah satu atau lebih elemen input memiliki nilai kosong
                alert("DATA BLM LENGKAP ....");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Kd_Peg: Kd_Peg,
                TglPelatihan: TglPelatihan,
                Id_Pelatihan: Id_Pelatihan,
                JenisPelatihan: JenisPelatihan,
                Lembaga_Pelatihan: Lembaga_Pelatihan,
                tempat_Pelatihan: tempat_Pelatihan,
                topik_Pelatihan: topik_Pelatihan,
                Lama_Pelatihan: Lama_Pelatihan,
                waktu: waktu,
                Nilai: Nilai,
            };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MaintenancePelatihan/{Kd_Peg}");
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
        if (proses == 3) {
            if (
                TglPelatihan === "" ||
                Id_Pelatihan === "" ||
                JenisPelatihan === "" ||
                Lembaga_Pelatihan === "" ||
                tempat_Pelatihan === "" ||
                topik_Pelatihan === "" ||
                Lama_Pelatihan === "" ||
                waktu === "" ||
                Nilai === ""
            ) {
                // Salah satu atau lebih elemen input memiliki nilai kosong
                alert("DATA BLM LENGKAP ....");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Kd_Peg: Kd_Peg,
                TglPelatihan: TglPelatihan,
                Id_Pelatihan: Id_Pelatihan,
                JenisPelatihan: JenisPelatihan,
                Lembaga_Pelatihan: Lembaga_Pelatihan,
                tempat_Pelatihan: tempat_Pelatihan,
                topik_Pelatihan: topik_Pelatihan,
                Lama_Pelatihan: Lama_Pelatihan,
                waktu: waktu,
                Nilai: Nilai,
            };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MaintenancePelatihan/{Kd_Peg}");
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
