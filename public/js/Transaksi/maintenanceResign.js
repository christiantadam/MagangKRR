$(document).ready(function () {
    const listDataButton = document.getElementById("listDataButton");
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const isiButton = document.getElementById("isiButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const simpanButton = document.getElementById("simpanButton");
    const batalButton = document.getElementById("batalButton");
    const keluarButton = document.getElementById("batalButton");
    const txtMasaKerja = document.getElementById("Masa_Kerja");
    const txtKeterangan = document.getElementById("Keterangan");
    var a = 0;
    $("#tabel_ListData").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    isiButton.addEventListener("click", function () {
        listDataButton.disabled = false;
        divisiButton.disabled = false;
        pegawaiButton.disabled = false;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
        txtMasaKerja.disabled = false;
        txtKeterangan.disabled = false;
    });
    koreksiButton.addEventListener("click", function () {
        listDataButton.disabled = false;
        divisiButton.disabled = false;
        pegawaiButton.disabled = false;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
        txtMasaKerja.disabled = false;
        txtKeterangan.disabled = false;
    });
    hapusButton.addEventListener("click", function () {
        listDataButton.disabled = false;
        divisiButton.disabled = false;
        pegawaiButton.disabled = false;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        hapusButton.disabled = true;
        txtMasaKerja.disabled = false;
        txtKeterangan.disabled = false;
    });
    batalButton.addEventListener("click", function () {
        listDataButton.disabled = true;
        divisiButton.disabled = true;
        pegawaiButton.disabled = true;
        isiButton.hidden = false;
        koreksiButton.hidden = false;
        simpanButton.hidden = true;
        batalButton.hidden = true;
        hapusButton.disabled = false;
        txtMasaKerja.disabled = true;
        txtKeterangan.disabled = true;
    });
    simpanButton.addEventListener("click", function (event) {
        const kd_peg = document.getElementById("Id_Pegawai").value;
        const tgl_keluar = document.getElementById("TglResign").value;
        const Alasan = document.getElementById("Keterangan");
        const txtKeterangan = document.getElementById("Keterangan");
        if ((a = 1)) {
            fetch("/MaintenanceResign/" + idpeg + ".cekProses")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    if (data.length > 0) {
                        $("#Id_Divisi").val(data[0].Id_Div);
                        $("#Nama_Divisi").val(data[0].Nama_Div);
                        $("#Keterangan").val(data[0].Alasan_Keluar);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
            event.preventDefault();

            const kd_pegawai = document.getElementById("Nama_Klinik").value;
            const tgl_keluar = document.getElementById("TglResign").value;
            const Alasan = document.getElementById("Keterangan").value;
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
            form.setAttribute("action", "MasterKlinik");
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
        } else if ((a = 3)) {
            event.preventDefault();
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
    function DisplayData(idpeg) {
        fetch("/MaintenanceResign/" + idpeg + ".getDataResign")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data.length > 0) {
                    $("#Id_Divisi").val(data[0].Id_Div);
                    $("#Nama_Divisi").val(data[0].Nama_Div);
                    $("#Keterangan").val(data[0].Alasan_Keluar);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    //Function masakerja hanya work ketika pegawai belum keluar
    //Jika sudah keluar tidak muncul ketika menggunakan SP_1486_PAY_FIND_KELUAR karena tgl_keluar tidak null
    function MasaKerja() {
        const kd_peg = document.getElementById("Id_Pegawai").value;
        const TglResign = document.getElementById("TglResign").value;
        fetch("/MaintenanceResign/" + kd_peg + ".getMasaKerja")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // console.log(data);
                if (data.length > 0) {
                    var Tgl_Masuk = new Date(data[0].tgl_masuk.split(" ")[0]);
                    var Tgl_Keluar = new Date(TglResign);
                    var Difference_In_Time =
                        Tgl_Keluar.getTime() - Tgl_Masuk.getTime();

                    var Difference_In_Days =
                        Difference_In_Time / (1000 * 3600 * 24);
                    console.log(Difference_In_Days);
                    $("#Masa_Kerja").val(Difference_In_Days);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    listDataButton.addEventListener("click", function () {
        const TglResign = document.getElementById("TglResign").value;
        console.log("Masuk listdatafunc");
        fetch("/MaintenanceResign/" + TglResign + ".getListData")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_ListData").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                    ];
                    $("#tabel_ListData").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_ListData").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalListData();
    });
    $("#tabel_ListData tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_ListData").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);
        DisplayData(rowData[0]);
        hideModalListData();
    });
    divisiButton.addEventListener("click", function () {
        fetch("/MaintenanceResign/" + ".getDivisi")
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
        console.log("Masuk fungsi pegawai");
        fetch("/MaintenanceResign/" + Id_Div + ".getPegawai")
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
        MasaKerja();
        hideModalPegawai();
    });
    function SaveData() {
        fetch("/MaintenanceResign/" + idpeg + ".getDataResign")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data.length > 0) {
                    $("#Id_Divisi").val(data[0].Id_Div);
                    $("#Nama_Divisi").val(data[0].Nama_Div);
                    $("#Keterangan").val(data[0].Alasan_Keluar);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
});
function showModalListData() {
    $("#modalListData").modal("show");
}
function hideModalListData() {
    $("#modalListData").modal("hide");
}
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
