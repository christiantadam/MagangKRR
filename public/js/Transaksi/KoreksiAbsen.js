$(document).ready(function () {
    const tambahButton = document.getElementById("tambahButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const prosesButton = document.getElementById("prosesButton");
    const batalButton = document.getElementById("batalButton");
    const tambahSection = document.getElementById("tambahSection");
    const koreksiSection = document.getElementById("koreksiSection");
    tambahButton.addEventListener("click", function (event) {
        event.preventDefault();

        tambahSection.hidden = false;
        koreksiSection.hidden = true;
    });
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Koreksi").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        fetch("/KoreksiAbsen/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Pegawai").DataTable().clear().draw();
                var rows = ["ALL", "ALL"];
                $("#table_Pegawai").DataTable().row.add(rows);
                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Kd_Pegawai, item.Nama_Peg];
                    $("#table_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);

        hideModalPegawai();
    });
    $("#table_Koreksi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);
    });
    $("#buttonTampil").click(function () {
        const Kd_Peg = document.getElementById("Id_Peg").value;
        const tglAwal = document.getElementById("TglMulai").value;
        const tglAkhir = document.getElementById("TglSelesai").value;
        const divisi = document.getElementById("Id_Div").value;
        fetch(
            "/KoreksiAbsen/" +
                Kd_Peg +
                "." +
                tglAwal +
                "." +
                tglAkhir +
                "." +
                divisi +
                ".getDataAbsen"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Koreksi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.Kd_pegawai,
                        item.Tanggal,
                        item.Jam_Masuk,
                        item.Jam_Keluar,
                        item.Datang,
                        item.Pulang,
                        item.Ket_Absensi,
                        item.Ket_Lembur,
                        item.Terlambat,
                        item.Tinggal,
                        item.Kelebihan_Jam,
                        item.Lembur_15X,
                        item.Lembur_2X,
                        item.Lembur_3X,
                        item.Lembur_4x,
                        item.Jml_Jam,
                        item.id_agenda,
                        item.jml_jam_rehat,
                    ];
                    $("#table_Koreksi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Koreksi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
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
function showModalKlinik() {
    $("#modalKlinik").modal("show");
}
function hideModalKlinik() {
    $("#modalKlinik").modal("hide");
}
function showModalShift() {
    $("#modalShift").modal("show");
}
function hideModalShift() {
    $("#modalShift").modal("hide");
}
