$(document).ready(function () {
    const pegawaiButton = document.getElementById("pegawaiButton");
    $("#tabel_Agenda").DataTable({
        order: [[0, "asc"]],
        scrollX: true,
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    const selectElement = document.getElementById("DivisiSelect");

    selectElement.addEventListener("change", function() {
        const selectedValue = selectElement.value;
        fetch("/UbahAgenda/" + selectedValue + ".getPegawai")
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
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_Peg").val(rowData[0]);
        const tanggal = document.getElementById("TglAgenda");
        fetch("/UbahAgenda/" + rowData[0] +"." +tanggal.value+ ".getAgendaPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Agenda").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Jam_Masuk, item.Jam_Keluar, item.awal_jam_istirahat, item.akhir_jam_istirahat , item.Ket_Absensi, item.id_agenda];
                    $("#tabel_Agenda").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Agenda").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalPegawai();
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
$(document).ready(function() {
    var table = $('#tabel_Divisi').DataTable({
        select: {
            style: 'multi'
        }
    });

    $('#tabel_Divisi tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected');
    });

    $('#buttonShow').click(function() {
        var selectedData = table.rows('.selected').data();
        // Lakukan sesuatu dengan data yang dipilih
        console.log(selectedData);
    });
});

function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
