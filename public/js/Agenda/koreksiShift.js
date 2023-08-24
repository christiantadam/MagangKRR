$(document).ready(function () {
    const checkbox = document.getElementById("pegawaiSelectAll");
    var checkedRowsData = [];
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "desc"]],
    });
    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    var table = $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
    });


    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        $(this).toggleClass("selected");
    });

    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        const tanggal = document.getElementById("TglAgenda");
        fetch("/KoreksiShift/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Pegawai").DataTable().clear().draw();
                var rowAll = [
                    "ALL",
                    "ALL",
                ]
                $("#table_Pegawai").DataTable().row.add(rowAll);
                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.Kd_Pegawai,
                        item.Nama_Peg,

                    ];
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
        $("#Kd_Pegawai").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);

        hideModalPegawai();
    });
    $("#lihatData").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        // console.log(selectedRows);
        const tanggal1 = document.getElementById("tanggal1").value;
        const tanggal2 = document.getElementById("tanggal2").value;
        var Kd_Peg = document.getElementById("Kd_Pegawai").value;
        const Kd_Div = document.getElementById("Id_Div").value;

        if (Kd_Peg = 'ALL') {
            const gabung = Kd_Div + "." + tanggal1 +"."+ tanggal2
            fetch("/KoreksiShift/" + gabung + ".getShiftAll")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Shift").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">`+' ' +item.Kd_Pegawai,
                        item.Tanggal,
                        item.Jam_Masuk,
                        item.Jam_Keluar,
                        item.Jml_Jam,
                        item.awal_jam_istirahat,
                        item.akhir_jam_istirahat,
                        item.Ket_Absensi,

                    ];
                    $("#table_Shift").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Shift").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        }

    });
    $("#selectAll").on("click", function () {
        // Get all checkboxes in the DataTable
        var checkboxes = $("#table_Shift tbody").find("input[type='checkbox']");

        // Set the checked state of all checkboxes based on the "Select All" checkbox
        checkboxes.prop("checked", this.checked);
    });

    // When any individual checkbox in the table is clicked
    $("#table_Shift").on("click", "input[name='selectRow']", function () {
        var allCheckboxes = $("#table_Shift tbody").find("input[type='checkbox']");

        // If any checkbox is unchecked, uncheck the "Select All" checkbox
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
        // If all checkboxes are checked, check the "Select All" checkbox
        else if (allCheckboxes.length === allCheckboxes.filter(":checked").length) {
            $("#selectAll").prop("checked", true);
        }
    });
    $("#table_Shift").on("change", "input[name='selectRow']", function () {
        var checkboxValue = $(this).val(); // Get the value from the checkbox
        var rowData = $(this).closest("tr").find("td:not(:first)").map(function () {
            return $(this).text();
        }).get();

        var existingIndex = checkedRowsData.findIndex(function (item) {
            return item[0] === checkboxValue;
        });

        if (this.checked) {
            if (existingIndex === -1) {
                checkedRowsData.push([checkboxValue, ...rowData]);
            }
        } else {
            if (existingIndex !== -1) {
                checkedRowsData.splice(existingIndex, 1);
            }
        }
    });
    $("#saveButton").on("click", function () {


        // Now 'selectedRowsData' array contains the data from the checked rows
        console.log(checkedRowsData);
        // You can send this data to the server or perform any other actions
    });

    $("#buttonUpdate").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        // console.log(selectedRows);
        selectedRows.forEach((data) => {
            console.log(data[0]);
            // Lakukan operasi lain pada data, jika diperlukan
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
