$(document).ready(function () {
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const tampilButton = document.getElementById("tampilButton");
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Data").DataTable({
        order: [[0, "asc"]],
    });
    divisiButton.addEventListener("click", function (event) {
        showModalDivisi();
        fetch("/ProgramPayroll/Transaksi/Mutasi/Histori/" + ".getDivisi")
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
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        $("#Nama_Divisi").val(rowData[0]);
        $("#Id_Divisi").val(rowData[1]);

        hideModalDivisi();
    });
    pegawaiButton.addEventListener("click", function (event) {
        showModalPegawai();
        const Id_Divisi = document.getElementById("Id_Divisi").value;
        fetch("/ProgramPayroll/Transaksi/Mutasi/Histori/" +Id_Divisi+ ".getPegawai")
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
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Id_Pegawai").val(rowData[1]);

        hideModalPegawai();
    });
    tampilButton.addEventListener("click", function (event) {
        const Id_Pegawai = document.getElementById("Id_Pegawai").value;
        fetch("/ProgramPayroll/Transaksi/Mutasi/Histori/" + Id_Pegawai+ ".getHistori")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Data").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.old_kd_pegawai, item.old_nm_divisi, item.new_kd_pegawai, item.new_nm_divisi, item.tgl_mutasi, item.no_surat];
                    $("#tabel_Data").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Data").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
function showModalDivisi() {
    $("#modalDivisi").modal("show");
}
function hideModalDivisi() {
    $("#modalDivisi").modal("hide");
}
