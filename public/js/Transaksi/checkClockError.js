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

    $("#tabel_Manager tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Manager").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Manager").val(rowData[0]);
        $("#Nama_Manager").val(rowData[1]);
        hideModalManager();
    });
    okButton.addEventListener("click", function (event) {
        event.preventDefault();

        var radio1 = document.getElementById("radio1");
        var radio2 = document.getElementById("radio2");
        var jnsPeg;
        const idManager = document.getElementById("Id_Manager").value;
        const tanggal = document.getElementById("TglCheck").value;
        if (radio1.checked) {
            jnsPeg = 1;
            console.log("Harian Checked");
            fetch(
                "/CheckClockError/" +
                    jnsPeg +
                    "." +
                    idManager +
                    "." +
                    tanggal +
                    ".checkError"
            )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    if (data.length === 0) {
                        alert("tidak ada absen error");
                    } else {
                        $("#tabel_Pegawai").DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            var row = [
                                // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                                //     " " +
                                item.Nama_Div,
                                item.Kd_Pegawai,
                                item.Nama_Peg,
                                item.Jam,
                                item.No_Clock,
                                item.No_Error,
                            ];
                            $("#tabel_Pegawai").DataTable().row.add(row);
                        });

                        // Redraw the table to show the changes
                        $("#tabel_Pegawai").DataTable().draw();
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        } else if (radio2.checked) {
            jnsPeg = 0;
            console.log("Staff Checked");
            fetch(
                "/CheckClockError/" +
                    jnsPeg +
                    "." +
                    idManager +
                    "." +
                    tanggal +
                    ".checkError"
            )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    if (data.length === 0) {
                        alert("tidak ada absen error");
                    } else {
                        $("#tabel_Pegawai").DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            var row = [
                                // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                                //     " " +
                                item.nama_Div,
                                item.Kd_pegawai,
                                item.nama_peg,
                                item.Jam,
                                item.No_Clock,
                                item.No_Error,
                            ];
                            $("#tabel_Pegawai").DataTable().row.add(row);
                        });

                        // Redraw the table to show the changes
                        $("#tabel_Pegawai").DataTable().draw();
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
});
function showModalManager() {
    $("#modalManager").modal("show");
}
function hideModalManager() {
    $("#modalManager").modal("hide");
}
