$(document).ready(function () {
    const buttonListHutang = document.getElementById("buttonListHutang");
    const buttonDivisi = document.getElementById("buttonDivisi");
    const button_Pegawai = document.getElementById("button_Pegawai");
    $("#tabel_Hutang").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
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
                $("#Sisa").val(data[0].Keterangan);
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
