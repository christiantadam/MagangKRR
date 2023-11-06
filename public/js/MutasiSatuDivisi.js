$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var counter1 = 1;
    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableObjekPemberi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableKelompokUtamaPemberi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableKelompokPemberi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableSubKelompokPemberi').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableObjekPenerima').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableKelompokUtamaPenerima').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableKelompokPenerima').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableSubKelompokPenerima').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')
    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $("#TableDivisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisi").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdDivisi").val(rowData[0]);
        $("#Divisi").val(rowData[1]);

        // var txtIdDivisi = document.getElementById('IdDivisi');
        // fetch("/MutasiSatuDivisi/" + rowData[0] + ".txtIdDivisi")
        //     .then((response) => {
        //         if (!response.ok) {
        //             throw new Error("Network response was not ok");
        //         }
        //         return response.json(); // Assuming the response is in JSON format
        //     })
        //     .then((data) => {
        //         // Handle the data retrieved from the server (data should be an object or an array)
        //         console.log(data);

        //         // Clear the existing table rows in TableType1 and TableType2
        //         $("#TableType").DataTable().clear().draw();


        //         // Loop through the data and create table rows in both TableType1 and TableType2
        //         data.forEach((item) => {
        //             var row = [
        //                 counter1++,
        //                 item.IdType,
        //                 item.NoIndeks,
        //                 item.Kode_Barang,
        //                 item.Qty_Primer,
        //                 item.Qty_Sekunder,
        //                 item.Qty,
        //                 item.Tanggal_Mutasi,
        //             ];

        //             // Add the row to both TableType1 and TableType2
        //             $("#TableType").DataTable().row.add(row);

        //         });

        //         // Redraw both tables to show the changes
        //         $("#TableType").DataTable().draw();

        //     })
        //     .catch((error) => {
        //         console.error("Error:", error);
        //     });

        fetch("/MutasiSatuDivisi/" + rowData[0] + ".txtIdDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                // Clear the existing table rows
                $("#TableType").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [counter1++, item.IdType, item.NoIndeks, item.Kode_Barang, item.Qty_Primer, item.Qty_sekunder, item.Qty, item.Tgl_Mutasi];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal();
    });
});

function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById("myModal2");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById("myModal2");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal4() {
    var modal = document.getElementById('myModal4');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal5() {
    var modal = document.getElementById('myModal5');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal5() {
    var modal = document.getElementById('myModal5');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal6() {
    var modal = document.getElementById('myModal6');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal6() {
    var modal = document.getElementById('myModal6');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal7() {
    var modal = document.getElementById('myModal7');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal7() {
    var modal = document.getElementById('myModal7');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal8() {
    var modal = document.getElementById('myModal8');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal8() {
    var modal = document.getElementById('myModal8');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal9() {
    var modal = document.getElementById('myModal9');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal9() {
    var modal = document.getElementById('myModal9');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
