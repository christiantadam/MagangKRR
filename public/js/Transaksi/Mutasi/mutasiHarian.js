$(document).ready(function () {
    const buttonListData = document.getElementById("buttonListData");
    const divisiBaruButton = document.getElementById("divisiBaruButton");
    const managerButton = document.getElementById("managerButton");
    $("#tabel_Data").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_DivisiBaru").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Manager").DataTable({
        order: [[0, "asc"]],
    });

    divisiBaruButton.addEventListener("click", function (event) {
        showModalDivisiBaru();
        fetch("/ProgramPayroll/Transaksi/Mutasi/Harian/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_DivisiBaru").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Div, item.Id_Div];
                    $("#tabel_DivisiBaru").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_DivisiBaru").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_DivisiBaru tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_DivisiBaru").DataTable().row(this).data();
        $("#Nama_Divisi_Baru").val(rowData[0]);
        $("#Id_Divisi_Baru").val(rowData[1]);
        fetch("/ProgramPayroll/Transaksi/Mutasi/Harian/" + rowData[1] + ".getKodePegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data[0].kode != null) {
                    let kd_peg = data[0].kode;
                    let id_div = rowData[1];

                    $("#Kd_Pegawai_Baru").val(kd_peg);
                    kd_peg = parseInt(kd_peg.toString().slice(-4)) + 1;
                    kd_peg = id_div.trim() + ("0000" + kd_peg.toString()).slice(-4);
                    $("#Kd_Pegawai_Baru").val(kd_peg);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalDivisiBaru();
    });

    managerButton.addEventListener("click", function (event) {
        showModalManager();
        fetch("/ProgramPayroll/Transaksi/Mutasi/Harian/" + ".getManager")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Manager").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.nama_peg, item.kd_Pegawai];
                    $("#tabel_Manager").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Manager").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Manager tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Manager").DataTable().row(this).data();
        $("#Nama_Manager").val(rowData[0]);
        $("#Id_Manager").val(rowData[1]);

        hideModalManager();
    });
    buttonListData.addEventListener("click", function (event) {
        const TglMutasi = document.getElementById("TglMutasi").value;
        console.log("lolllll");
        fetch(
            "/ProgramPayroll/Transaksi/Mutasi/Harian/" +
                TglMutasi +
                ".getDataMutasi"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Data").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.new_kd_pegawai];
                    $("#tabel_Data").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Data").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Data tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#tabel_Data").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Kd_Pegawai_Baru").val(rowData[1]);
        const Kd_Pegawai_Baru =
            document.getElementById("Kd_Pegawai_Baru").value;
        fetch(
            "/ProgramPayroll/Transaksi/Mutasi/Harian/" +
                Kd_Pegawai_Baru +
                ".getMutasiFull"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#Id_Pegawai").val(data[0].old_kd_pegawai);
                $("#Id_Divisi").val(data[0].Id_Div);
                $("#Nama_Divisi").val(data[0].old_nm_divisi);
                $("#jabatan_Lama").val(data[0].old_jabatan);
                $("#Kd_Pegawai_Baru").val(data[0].new_kd_pegawai);
                $("#jabatan_Baru").val(data[0].new_jabatan);
                $("#Id_Divisi_Baru").val(data[0].Id_Div_Baru);
                $("#Nama_Divisi_Baru").val(data[0].new_nm_divisi);
                $("#nomor_surat").val(data[0].no_surat);
                $("#alasan_mutasi").val(data[0].Alasan);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        hideModalData();
    });
});

function showModalData() {
    $("#modalData").modal("show");
}
function hideModalData() {
    $("#modalData").modal("hide");
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
function showModalDivisiBaru() {
    $("#modalDivisiBaru").modal("show");
}
function hideModalDivisiBaru() {
    $("#modalDivisiBaru").modal("hide");
}
function showModalManager() {
    $("#modalManager").modal("show");
}
function hideModalManager() {
    $("#modalManager").modal("hide");
}
