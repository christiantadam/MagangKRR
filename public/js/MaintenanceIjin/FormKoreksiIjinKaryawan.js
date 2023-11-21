$(document).ready(function () {
    const buttonTampilData = document.getElementById("buttonTampilData");
    const buttonPegawai = document.getElementById("pegawaiButton");
    const buttonDivisi = document.getElementById("divisiButton");
    $("#table_Ijin").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    buttonTampilData.addEventListener("click", function (event) {
        const tanggal_Ijin = document.getElementById("tanggal_Ijin").value;
        fetch(
            "/ProgramPayroll/Maintenance/Fkik/" + tanggal_Ijin + ".getDataIjin"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Ijin").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [
                        item.Tanggal,
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                        item.Jns_Keluar,
                        item.Kembali,
                        item.Keluar,
                        item.Pulang,
                        item.Jenis_Alasan,
                        item.Keterangan,
                        item.Menyetujui,
                        item.Timeinput,
                        item.Timeupdate,
                        item.User_id,
                        item.Id_Div,
                    ];
                    $("#table_Ijin").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Ijin").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    buttonPegawai.addEventListener("click", function (event) {
        const Id_Div = document.getElementById("Id_Div").value;
        fetch("/ProgramPayroll/Maintenance/Fkik/" + Id_Div + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [
                        item.Kd_Pegawai,
                        item.Nama_Peg

                    ];
                    $("#table_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    buttonDivisi.addEventListener("click", function (event) {
        fetch("/ProgramPayroll/Maintenance/Fkik/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Divisi").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Id_Div, item.Nama_Div];
                    $("#table_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        hideModalDivisi();
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        $("#Id_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);
        hideModalPegawai();
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
