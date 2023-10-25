$(document).ready(function () {
    const buttonListHutang = document.getElementById("buttonListHutang");
    const buttonDivisi = document.getElementById("buttonDivisi");
    const button_Pegawai = document.getElementById("button_Pegawai");
    const isiButton = document.getElementById("isiButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const keluarButton = document.getElementById("keluarButton");
    const simpanButton = document.getElementById("simpanButton");
    const batalButton = document.getElementById("batalButton");
    const tanggal_Hutang = document.getElementById("tanggal_Hutang");
    const Bukti = document.getElementById("Bukti");
    const Jumlah = document.getElementById("Jumlah");
    const Keterangan = document.getElementById("Keterangan");
    let a;
    $("#tabel_Hutang").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    function clearForm() {
        $("#Kd_Divisi").val("");
        $("#Nama_Divisi").val("");
        $("#Kd_Pegawai").val("");
        $("#Nama_Pegawai").val("");
        $("#Bukti").val("");
        $("#Jumlah").val("");
        $("#Sisa").val("");
        $("#Keterangan").val("");
        $("#Keterangan").val("");
    }
    isiButton.addEventListener("click", function (event) {
        clearForm();
        a = 1;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        hapusButton.disabled = true;
        keluarButton.disabled = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        buttonListHutang.disabled = true;
        buttonDivisi.disabled = false;
        button_Pegawai.disabled = false;
        tanggal_Hutang.disabled = false;
        Bukti.disabled = false;
        Jumlah.disabled = false;
        Keterangan.disabled = false;
    });
    koreksiButton.addEventListener("click", function (event) {
        clearForm();
        a = 2;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        hapusButton.disabled = true;
        keluarButton.disabled = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        buttonListHutang.disabled = false;
        buttonDivisi.disabled = false;
        button_Pegawai.disabled = false;
        tanggal_Hutang.disabled = false;
        Bukti.disabled = false;
        Jumlah.disabled = false;
        Keterangan.disabled = false;
    });
    hapusButton.addEventListener("click", function (event) {
        clearForm();
        a = 3;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        hapusButton.disabled = true;
        keluarButton.disabled = true;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        buttonListHutang.disabled = false;
        buttonDivisi.disabled = false;
        button_Pegawai.disabled = false;
        tanggal_Hutang.disabled = false;
        Bukti.disabled = false;
        Jumlah.disabled = false;
        Keterangan.disabled = false;
    });
    batalButton.addEventListener("click", function (event) {
        a = 3;
        isiButton.hidden = false;
        koreksiButton.hidden = false;
        hapusButton.disabled = false;
        keluarButton.disabled = false;
        simpanButton.hidden = true;
        batalButton.hidden = true;
        buttonListHutang.disabled = true;
        buttonDivisi.disabled = true;
        button_Pegawai.disabled = true;
        tanggal_Hutang.disabled = true;
        Bukti.disabled = true;
        Jumlah.disabled = true;
        Keterangan.disabled = true;
    });
    simpanButton.addEventListener("click", function (event) {
        if (a == 1) {
            const Kd_Pegawai = document.getElementById("Kd_Pegawai").value;
            const tanggal_Hutang =
                document.getElementById("tanggal_Hutang").value;
            const Bukti = document.getElementById("Bukti").value;
            const Jumlah = document.getElementById("Jumlah").value;
            const Keterangan = document.getElementById("Keterangan").value;

            // if (Nama_Klinik === "" || AlamatKlinik === "" || KotaKlinik === "" || NomorTelepon === "") {
            //     // Salah satu atau lebih elemen input memiliki nilai kosong
            //     alert("Mohon isi semua field yang diperlukan.");
            //     return; // Menghentikan eksekusi lebih lanjut
            // }
            if (Kd_Pegawai == "") {
                alert("Data Belum Lengkap");
                return; // Menghentikan eksekusi lebih lanjut
            } else if (Jumlah == "" || Jumlah == 0) {
                alert("Data Belum Lengkap");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Kd_Pegawai: Kd_Pegawai,
                tanggal_Hutang: tanggal_Hutang,
                Bukti: Bukti,
                Jumlah: Jumlah,
                Keterangan: Keterangan,

            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Hutang");
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
        }else if (a == 2) {
            const Sisa = document.getElementById("Sisa").value;
            const Bukti = document.getElementById("Bukti").value;
            const Jumlah = document.getElementById("Jumlah").value;
            const Keterangan = document.getElementById("Keterangan").value;
            if (Kd_Pegawai == "") {
                alert("Data Belum Lengkap");
                return; // Menghentikan eksekusi lebih lanjut
            } else if (Jumlah == "" || Jumlah == 0) {
                alert("Data Belum Lengkap");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Sisa: Sisa,
                Bukti: Bukti,
                Jumlah: Jumlah,
                Keterangan: Keterangan,

            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Hutang/koreksiHutang");
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
            ifUpdate.value = "Update Hutang"; // Set the value of the input field to the corresponding data
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
        }else if (a == 3) {
            event.preventDefault();
            const Bukti = document.getElementById("Bukti").value;
            if (Bukti === "") {
                alert("Nomor Bukti Masih Kosong !");
                return; // Menghentikan eksekusi lebih lanjut
            }
            const data = {
                Bukti: Bukti,
            };

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "Hutang/hapusHutang");
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
                .catch((error) => console.error("Form submission error:", error));
        }
    });
    buttonListHutang.addEventListener("click", function (event) {
        fetch("/ProgramPayroll/Angsuran/Hutang/" + ".getListHutang")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Hutang").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.No_Bukti];
                    $("#tabel_Hutang").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Hutang").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    buttonDivisi.addEventListener("click", function (event) {
        fetch("/ProgramPayroll/Angsuran/Hutang/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Divisi").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Div, item.Id_Div];
                    $("#tabel_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    button_Pegawai.addEventListener("click", function (event) {
        const Kd_Divisi = document.getElementById("Kd_Divisi").value;
        fetch("/ProgramPayroll/Angsuran/Hutang/" + Kd_Divisi + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.nama_peg, item.kd_pegawai];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Hutang tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Hutang").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Bukti").val(rowData[1]);
        let safeRowData = rowData[1].replace(/\//g, "_");
        fetch("/ProgramPayroll/Angsuran/Hutang/" + safeRowData + ".getHutang")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#Kd_Divisi").val(data[0].Id_Div);
                $("#Nama_Divisi").val(data[0].Nama_Div);
                $("#Kd_Pegawai").val(data[0].Kd_Pegawai);
                $("#Jumlah").val(data[0].Nilai_Hutang);
                $("#Keterangan").val(data[0].Keterangan);
                $("#Sisa").val(data[0].Sisa_Hutang);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalHutang();
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        $("#Kd_Divisi").val(rowData[1]);
        $("#Nama_Divisi").val(rowData[0]);
        fetch("/ProgramPayroll/Angsuran/Hutang/" + rowData[1] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.nama_peg, item.kd_pegawai];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalDivisi();
    });
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Kd_Pegawai").val(rowData[1]);
        if (a == 1) {
            fetch("/ProgramPayroll/Angsuran/Hutang/" + ".getNomorBukti")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data.length > 0) {
                    let Bukti = data[0].nomor;
                    let tgl = new Date(data[0].tgl_server);

                    Bukti = (parseInt(Bukti) + 1).toString().padStart(4, '0');
                    let bulan = String(tgl.getUTCMonth() + 1).padStart(2, '0');
                    let tahun = String(tgl.getUTCFullYear()).slice(-2);
                    let TBukti = Bukti + '/' + bulan + '/' + tahun;
                    $("#Bukti").val(TBukti);
                }

            })
            .catch((error) => {
                console.error("Error:", error);
            });
        }
        hideModalPegawai();
    });
});
function showModalHutang() {
    $("#modalHutang").modal("show");
}
function hideModalHutang() {
    $("#modalHutang").modal("hide");
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
