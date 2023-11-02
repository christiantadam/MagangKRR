$(document).ready(function () {
    const buttonListData = document.getElementById("buttonListData");
    const divisiBaruButton = document.getElementById("divisiBaruButton");
    const managerButton = document.getElementById("managerButton");
    const simpanButton = document.getElementById("simpanButton");
    const batalButton = document.getElementById("batalButton");
    const isiButton = document.getElementById("isiButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const keluarButton = document.getElementById("keluarButton");
    const Id_Pegawai = document.getElementById("Id_Pegawai");
    const TglMutasi = document.getElementById("TglMutasi");
    $("#tabel_Data").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_DivisiBaru").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Manager").DataTable({
        order: [[0, "asc"]],
    });
    isiButton.addEventListener("click", function (event) {
        simpanButton.hidden = false;
        batalButton.hidden = false;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        Id_Pegawai.disabled = false;
        TglMutasi.disabled = false;
    });
    koreksiButton.addEventListener("click", function (event) {
        buttonListData.disabled = false;
        simpanButton.hidden = false;
        batalButton.hidden = false;
        isiButton.hidden = true;
        koreksiButton.hidden = true;
        Id_Pegawai.disabled = false;
        TglMutasi.disabled = false;
    });
    hapusButton.addEventListener("click", function (event) {
        alert("Tidak bisa dihapus ......");
    });
    batalButton.addEventListener("click", function (event) {
        buttonListData.disabled = true;
        simpanButton.hidden = true;
        batalButton.hidden = true;
        isiButton.hidden = false;
        koreksiButton.hidden = false;
        Id_Pegawai.disabled = true;
        TglMutasi.disabled = true;
    });
    simpanButton.addEventListener("click", function (event) {
        if (a == 1) {
            const old_kd_pegawai = document.getElementById("Id_Pegawai").value;
            const new_kd_pegawai =
                document.getElementById("Kd_Pegawai_Baru").value;
            const old_jabatan = document.getElementById("jabatan_Lama").value;
            const new_jabatan = document.getElementById("jabatan_Baru").value;
            const old_nm_divisi = document.getElementById("Nama_Divisi").value;
            const new_nm_divisi =
                document.getElementById("Nama_Divisi_Baru").value;
            const tgl_mutasi = document.getElementById("TglMutasi").value;
            const no_surat = document.getElementById("nomor_surat").value;
            const Alasan = document.getElementById("alasan_mutasi").value;
            // if (Nama_Klinik === "" || AlamatKlinik === "" || KotaKlinik === "" || NomorTelepon === "") {
            //     // Salah satu atau lebih elemen input memiliki nilai kosong
            //     alert("Mohon isi semua field yang diperlukan.");
            //     return; // Menghentikan eksekusi lebih lanjut
            // }
            if (confirm("Yakin Data ini DiProses ..... ?")) {
            } else {
                return;
            }
            const data = {
                old_kd_pegawai: old_kd_pegawai,
                new_kd_pegawai: new_kd_pegawai,
                old_jabatan: old_jabatan,
                new_jabatan: new_jabatan,
                old_nm_divisi: old_nm_divisi,
                new_nm_divisi: new_nm_divisi,
                tgl_mutasi: tgl_mutasi,
                no_surat: no_surat,
                Alasan: Alasan,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MutasiHarian");
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
        } else if (a == 2) {
            const new_kd_pegawai =
                document.getElementById("Kd_Pegawai_Baru").value;
            const new_jabatan = document.getElementById("jabatan_Baru").value;
            const tgl_mutasi = document.getElementById("TglMutasi").value;
            const no_surat = document.getElementById("nomor_surat").value;
            const Alasan = document.getElementById("alasan_mutasi").value;
            const Prioritas = document.getElementById("Prioritas").value;
            const data = {
                kd_pegawai: new_kd_pegawai,
                tgl_mutasi: tgl_mutasi,
                new_jabatan: new_jabatan,
                no_surat: no_surat,
                alasan: Alasan,
                prioritas: Keterangan,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "MutasiHarian/koreksiMutasi");
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
                .catch((error) =>
                    console.error("Form submission error:", error)
                );
        }
    });
    divisiBaruButton.addEventListener("click", function (event) {
        showModalDivisiBaru();
        fetch("/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_DivisiBaru").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Div, item.Id_Div];
                    $("#tabel_DivisiBaru").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_DivisiBaru").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_DivisiBaru tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_DivisiBaru").DataTable().row(this).data();
        $("#Nama_Divisi_Baru").val(rowData[0]);
        $("#Id_Divisi_Baru").val(rowData[1]);
        fetch(
            "/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" +
                rowData[1] +
                ".getKodePegawai"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data[0].kode != null) {
                    let kd_peg = data[0].kode;
                    let id_div = rowData[1];

                    $("#Kd_Pegawai_Baru").val(kd_peg);
                    kd_peg = parseInt(kd_peg.toString().slice(-4)) + 1;
                    kd_peg =
                        id_div.trim() + ("0000" + kd_peg.toString()).slice(-4);
                    $("#Kd_Pegawai_Baru").val(kd_peg);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalDivisiBaru();
    });

    managerButton.addEventListener("click", function (event) {
        showModalManager();
        fetch("/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" + ".getManager")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Manager").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.nama_peg, item.kd_Pegawai];
                    $("#tabel_Manager").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Manager").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Manager tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Manager").DataTable().row(this).data();
        $("#Nama_Manager").val(rowData[0]);
        $("#Id_Manager").val(rowData[1]);

        hideModalManager();
    });
    buttonListData.addEventListener("click", function (event) {
        const TglMutasi = document.getElementById("TglMutasi").value;
        console.log("lolllll");
        fetch(
            "/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" +
                TglMutasi +
                ".getDataMutasi"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Data").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.new_kd_pegawai];
                    $("#tabel_Data").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Data").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Data tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#tabel_Data").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Kd_Pegawai_Baru").val(rowData[1]);
        const Kd_Pegawai_Baru =
            document.getElementById("Kd_Pegawai_Baru").value;
        fetch(
            "/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" +
                Kd_Pegawai_Baru +
                ".getMutasiFull"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#Id_Pegawai").val(data[0].old_kd_pegawai);
                $("#Id_Divisi").val(data[0].Id_Div);
                $("#Nama_Divisi").val(data[0].old_nm_divisi);
                $("#jabatan_Lama").val(data[0].old_jabatan);
                $("#Kd_Pegawai_Baru").val(data[0].new_kd_pegawai);
                $("#jabatan_Baru").val(data[0].new_jabatan);
                $("#Id_Divisi_Baru").val(data[0].Id_Div_Baru);
                $("#Nama_Divisi_Baru").val(data[0].new_nm_divisi);
                $("#nomor_surat").val(data[0].no_surat);
                $("#alasan_mutasi").val(data[0].Alasan);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalData();
    });
});

function showModalData() {
    $("#modalData").modal("show");
}
function hideModalData() {
    $("#modalData").modal("hide");
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
function showModalDivisiBaru() {
    $("#modalDivisiBaru").modal("show");
}
function hideModalDivisiBaru() {
    $("#modalDivisiBaru").modal("hide");
}
function showModalManager() {
    $("#modalManager").modal("show");
}
function hideModalManager() {
    $("#modalManager").modal("hide");
}
