$(document).ready(function () {
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    var table = $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    divisiButton.addEventListener("click", function () {
        const Harian = document.getElementById("radio1");
        const Staff = document.getElementById("radio2");
        if (Harian.checked) {
            fetch("/MaintenanceKoreksi/" + ".getDivisiHarian")
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
        } else if (Staff.checked) {
            fetch("/MaintenanceKoreksi/" + ".getDivisiStaff")
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
        }

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
        fetch("/MaintenanceKoreksi/" + Id_Div + ".getPegawai")
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
