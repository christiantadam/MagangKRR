$(document).ready(function () {
    var Nama_Pegawai = document.getElementById("Nama_Pegawai");

    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
    });

    // Tambahkan event listener untuk peristiwa input
    Nama_Pegawai.addEventListener("input", function () {
        // Dapatkan nilai input
        var nilaiInput = Nama_Pegawai.value;

        fetch("/ProgramPayroll/Maintenance/Fik/" +nilaiInput+ ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Div, item.Kd_Pegawai, item.Nama_Peg, item.Jenis_Peg];
                    $("#table_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
