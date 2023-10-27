$(document).ready(function () {
    const buttonListData = document.getElementById("buttonListData");
    const buttonDivisi = document.getElementById("buttonDivisi");
    const button_Pegawai = document.getElementById("button_Pegawai");
    const Tanggal_Angsuran = document.getElementById("Tanggal_Angsuran");
    const isiButton = document.getElementById("isiButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const keluarButton = document.getElementById("keluarButton");
    const simpanButton = document.getElementById("simpanButton");
    const batalButton = document.getElementById("batalButton");
    const Bukti = document.getElementById("Bukti");
    const buttonBukti = document.getElementById("buttonBukti");
    const Keterangan = document.getElementById("Keterangan");
    const Jml_angsuran = document.getElementById("Jml_angsuran");
    const potongGaji = document.getElementById("potongGaji");
    $("#tabel_Data").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Bukti").DataTable({
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
        buttonListData.disabled = true;
        buttonDivisi.disabled = false;
        button_Pegawai.disabled = false;
        Tanggal_Angsuran.disabled = false;
        Bukti.disabled = false;
        buttonBukti.disabled = false;
        potongGaji.disabled = false;
        Keterangan.disabled = false;
        Jml_angsuran.disabled = false;
        $("#potongGaji").val("Y");
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
        buttonListData.disabled = false;
        buttonDivisi.disabled = false;
        button_Pegawai.disabled = false;
        Tanggal_Angsuran.disabled = false;
        Bukti.disabled = false;
        buttonBukti.disabled = false;
        potongGaji.disabled = false;
        Keterangan.disabled = false;
        Jml_angsuran.disabled = false;
        $("#potongGaji").val("Y");
    });
    hapusButton.addEventListener("click", function (event) {
        alert("Harap Hubungi team EDP Kalau ada data yang ingin dihapus");
    });
    batalButton.addEventListener("click", function (event) {
        a = 3;
        isiButton.hidden = false;
        koreksiButton.hidden = false;
        hapusButton.disabled = false;
        keluarButton.disabled = false;
        simpanButton.hidden = true;
        batalButton.hidden = true;
        buttonListData.disabled = true;
        buttonDivisi.disabled = true;
        button_Pegawai.disabled = true;
        Tanggal_Angsuran.disabled = true;
        Bukti.disabled = true;
        buttonBukti.disabled = true;
        potongGaji.disabled = true;
        Keterangan.disabled = true;
        Jml_angsuran.disabled = true;
    });
    buttonListData.addEventListener("click", function (event) {
        fetch("/ProgramPayroll/Angsuran/AngsuranStaff/" + ".getListData")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Data").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.kd_pegawai];
                    $("#tabel_Data").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Data").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    buttonDivisi.addEventListener("click", function (event) {
        fetch("/ProgramPayroll/Angsuran/AngsuranStaff/" + ".getDivisi")
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
        fetch(
            "/ProgramPayroll/Angsuran/AngsuranStaff/" +
                Kd_Divisi +
                ".getPegawai"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.Kd_Pegawai];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    buttonBukti.addEventListener("click", function (event) {
        const Kd_Pegawai = document.getElementById("Kd_Pegawai").value;
        if (a == 1) {
            fetch(
                "/ProgramPayroll/Angsuran/AngsuranStaff/" +
                    Kd_Pegawai +
                    ".getBuktiIsi"
            )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    $("#tabel_Bukti").DataTable().clear().draw();
                    data.forEach((item) => {
                        var row = [item.No_Bukti, item.Keterangan];
                        $("#tabel_Bukti").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#tabel_Bukti").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        } else if (a == 2) {
            fetch(
                "/ProgramPayroll/Angsuran/AngsuranStaff/" +
                    Kd_Pegawai +
                    ".getBuktiKoreksi"
            )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    $("#tabel_Bukti").DataTable().clear().draw();
                    data.forEach((item) => {
                        var row = [item.No_Hutang, item.No_Bukti];
                        $("#tabel_Bukti").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#tabel_Bukti").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
    $("#tabel_Data tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Data").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Kd_Pegawai").val(rowData[1]);

        hideModalData();
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        $("#Kd_Divisi").val(rowData[1]);
        $("#Nama_Divisi").val(rowData[0]);
        fetch(
            "/ProgramPayroll/Angsuran/AngsuranStaff/" +
                rowData[1] +
                ".getPegawai"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.Kd_Pegawai];
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

        hideModalPegawai();
    });
    $("#tabel_Bukti tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Bukti").DataTable().row(this).data();
        $("#Bukti").val(rowData[0]);
        $("#Angsuran").val(rowData[1]);
        let safeRowData = rowData[1].replace(/\//g, "_");
        if (a != 1) {
            fetch(
                "/ProgramPayroll/Angsuran/AngsuranStaff/" +
                    safeRowData +
                    ".getAngsuran"
            )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    if (data.length > 0) {
                        $("#Kd_Divisi").val(data[0].Id_Div);
                        $("#Nama_Divisi").val(data[0].Nama_Div);
                        $("#Keterangan").val(data[0].Keterangan);
                        $("#Sisa").val(data[0].Sisa_Hutang);
                        $("#Jml_angsuran").val(data[0].Nilai_Angsuran);
                        $("#potongGaji").val(data[0].Pot_gaji);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
        hideModalBukti();
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
function showModalBukti() {
    $("#modalBukti").modal("show");
}
function hideModalBukti() {
    $("#modalBukti").modal("hide");
}
