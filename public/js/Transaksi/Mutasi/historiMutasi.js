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
        fetch("/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" + ".getDivisi")
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
    pegawaiButton.addEventListener("click", function (event) {
        showModalPegawai();
        fetch("/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Div, item.Id_Div];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    tampilButton.addEventListener("click", function (event) {
        showModalPegawai();
        fetch("/ProgramPayroll/Transaksi/Mutasi/MutasiHarian/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Data").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Div, item.Id_Div];
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
