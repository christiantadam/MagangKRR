$(document).ready(function () {
    const pegawaiButton = document.getElementById("pegawaiButton");
    $("#tabel_Karyawan").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    const selectElement = document.getElementById("DivisiSelect");

    selectElement.addEventListener("change", function() {
        const selectedValue = selectElement.value;
        fetch("/TambahAgenda/" + selectedValue + ".getPegawai")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#tabel_Pegawai").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.Kd_Pegawai, item.Nama_Peg];
                $("#tabel_Pegawai").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tabel_Pegawai").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });

        console.log("Selected value:", selectedValue);
        // Lakukan apa pun yang perlu Anda lakukan dengan nilai yang terpilih
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('opsi1').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('containerPerorangan').hidden = false;
            document.getElementById('containerDivisi').hidden = true;
        } else {
            document.getElementById('containerPerorangan').hidden = true;
        }
    });
    document.getElementById('opsi2').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('containerDivisi').hidden = false;
            document.getElementById('containerPerorangan').hidden = true;
        } else {
            document.getElementById('containerDivisi').hidden = true;
        }
    });
});

function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
