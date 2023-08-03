$(document).ready(function () {
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Karyawan").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_PISAT").DataTable({
        order: [[0, "asc"]],
    });
    function hideModalDivisi() {
        $("#modalDivPeg").removeClass("show");
        $("#modalDivPeg").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    function removeBackdrop() {
        $(".modal-backdrop").remove();
    }


    const divisiButton = document.getElementById("divisiButton");
    const karyawanButton = document.getElementById("karyawanButton");

    divisiButton.addEventListener("click", function () {
        //Buat if yang mana yang checked di radio button maka lakukan ini
        var selectedValue = $("input[name='opsiKerja']:checked").val();
        var kode = '';
        if (selectedValue === "Harian") {
            kode = 1;
        } else if (selectedValue === "Staff") {
            kode = 2;
        }
        fetch("/getDivisi/" + kode)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Divisi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Id_Div, item.Nama_Div];
                    $("#tabel_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    karyawanButton.addEventListener("click", function () {
        var kode = document.getElementById("Id_Div").value;
        console.log(kode);
        fetch("/getPegawaiKeluarga/" + kode)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Karyawan").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Kd_Pegawai, item.Nama_Peg];
                    $("#tabel_Karyawan").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Karyawan").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        hideModalDivisi();
    });
});
