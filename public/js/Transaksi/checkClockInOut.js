$(document).ready(function () {
    const okButton = document.getElementById("okButton");
    var table = $("#tabel_Manager").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });

    $("#tabel_Manager tbody").on("click", "tr", function () {
        var kode;
        var harianRadio = document.getElementById("radio1");
        var staffRadio = document.getElementById("radio2");
        if (harianRadio.checked) {
            kode = 1;
        } else if (staffRadio.checked) {
            kode = 2;
        }
        // Get the data from the clicked row
        var rowData = $("#tabel_Manager").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Manager").val(rowData[0]);
        $("#Nama_Manager").val(rowData[1]);
        fetch("/CheckClockInOut/" + kode + "." + rowData[0] + ".getDivisi")
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
        hideModalManager();
    });

    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        var harianRadio = document.getElementById("radio1");
        var staffRadio = document.getElementById("radio2");
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);
        if (staffRadio.checked) {
            fetch("/CheckClockInOut/" + rowData[0] + ".5" + ".getPegawai")
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
                            item.Nama_Peg,
                            item.Kd_Pegawai,
                        ];
                        $("#tabel_Pegawai").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#tabel_Pegawai").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        } else if (harianRadio.checked)  {
            fetch("/CheckClockInOut/" + rowData[0] + ".5" + ".getPegawai")
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
                            item.Nama_Peg,
                            item.Kd_Pegawai,
                        ];
                        $("#tabel_Pegawai").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#tabel_Pegawai").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }

        hideModalDivisi();
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
function showModalManager() {
    $("#modalManager").modal("show");
}
function hideModalManager() {
    $("#modalManager").modal("hide");
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
