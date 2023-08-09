$(document).ready(function () {
    const listDataButton = document.getElementById("listDataButton");
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Klinik").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_ListPegawai").DataTable({
        order: [[0, "asc"]],
        scrollX: true,
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);

        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_ListPegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_ListPegawai").DataTable().row(this).data();
        var checkBPJS = document.getElementById("checkBPJS");
        var parts = rowData[13].split("/");
        var tglKoperasi = parts[2] + "-" + parts[0] + "-" + parts[1];
        var TglMasukAwal = rowData[6].split(" ");
        var TglMasuk = rowData[7].split(" ");
        // Populate the input fields with the data
        $("#KdPeg").val(rowData[0]);
        $("#NamaPeg").val(rowData[2]);
        $("#NIK").val(rowData[3]);
        $("#Alamat").val(rowData[4]);
        $("#Kota").val(rowData[5]);
        $("#TglMasukAwal").val(TglMasukAwal[0]);
        $("#TglMasuk").val(TglMasuk[0]);
        $("#Kartu").val(rowData[8]);
        $("#NomorInduk").val(rowData[9]);
        $("#NomorRBH").val(rowData[10]);
        $("#NomorAstek").val(rowData[11]);
        $("#NomorKoperasi").val(rowData[12]);
        $("#TglKoperasi").val(tglKoperasi);
        $("#NPWP").val(rowData[14]);
        $("#NomorRekening").val(rowData[15]);
        $("#NomorBPJS").val(rowData[16]);

        if (rowData[17] == '1') {
            console.log("masuk if");
            checkBPJS.checked = true;
        } else {
            console.log("masuk else");
            checkBPJS.checked = false;
        }
        $("#NamaIbu").val(rowData[18]);
        $("#IdKlinik").val(rowData[19]);
        $("#NamaKlinik").val(rowData[20]);
        $("#Jabatan").val(rowData[21]);
        $("#NomorPensiun").val(rowData[22]);
        $("#email").val(rowData[23]);
        $("#NomorTelepon").val(rowData[24]);
        $("input[name='vaksin'][value='" + rowData[25] + "']").prop("checked", true);
        // $("#Jabatan").val(rowData[21]);
        // $("#NomorRekening").val(rowData[15]);
        // $("#NomorRekening").val(rowData[15]);
        // $("#NomorRekening").val(rowData[15]);
        // $("#NomorRekening").val(rowData[15]);
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    listDataButton.addEventListener("click", function (event) {
        event.preventDefault();
        const Id_Div = document.getElementById("Id_Div").value;
        console.log(Id_Div);
        fetch("/MasterNomer/" + Id_Div + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_ListPegawai").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.Kd_Pegawai,
                        item.Jenis_Peg,
                        item.Nama_Peg,
                        item.NIK,
                        item.Alamat,
                        item.Kota,
                        item.Tgl_Masuk_Awal,
                        item.Tgl_Masuk,
                        item.No_Kartu,
                        item.No_Induk,
                        item.No_RBH,
                        item.No_Astek,
                        item.No_Koperasi,
                        item.Tgl_Agt_Kop,
                        item.NPWP,
                        item.no_rek,
                        item.IdBPJS,
                        item.Penanggung,
                        item.IbuKandung,
                        item.Kd_Klinik,
                        item.Nama_Klinik,
                        item.Jabatan,
                        item.NoPensiun,
                        item.Email,
                        item.Telpon,
                        item.Vaksin,
                        item.Tmp_Lahir,
                        item.Tgl_Lahir,
                        item.NoKartuMakan,
                        item.RekBCA,
                    ];
                    $("#table_ListPegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_ListPegawai").DataTable().draw();
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
