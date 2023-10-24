$(document).ready(function () {

    $("#tabel_Hadir").DataTable({
        order: [[0, "asc"]],
        dom: "",
    });
    $("#tabel_Hadir2").DataTable({
        order: [[0, "asc"]],
        dom: "",
    });
    fetch("/ProgramPayroll/FormDaftarHadir/" +  ".getViewHadir")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            $("#tabel_Hadir").DataTable().clear().draw();
            $("#tabel_Hadir2").DataTable().clear().draw();
            var i = 1;
            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [
                    // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                    //     " " +
                    i,
                    item.Kd_Pegawai,
                    item.Nama_Peg,
                    item.Jabatan,
                    "",
                    "",
                    ""
                ];
                $("#tabel_Hadir").DataTable().row.add(row);
                $("#tabel_Hadir2").DataTable().row.add(row);
                i++;
            });

            // Redraw the table to show the changes
            $("#tabel_Hadir").DataTable().draw();
            $("#tabel_Hadir2").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });

});
F;
