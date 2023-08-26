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

    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableType').DataTable({
        "scrollX": true,
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $('#TableDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi').val(rowData[0]);
        $('#Divisi').val(rowData[1]);

        var txtIdDivisi = document.getElementById('IdDivisi');
        fetch("/HanguskanBarcode/" + txtIdDivisi.value + ".txtIdDivisi")
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
                    var kodebarcode = item.NoIndeks.padStart(9, '0') + '-' + item.Kode_barang.padStart(9, '0');
                    console.log(kodebarcode);
                    var row = [item.NamaType, kodebarcode, item.NamaSubKelompok, item.NamaKelompok, item.Kode_barang, item.NoIndeks, item.Qty_Primer, item.Qty_sekunder, item.Qty, item.Tgl_mutasi,  item.IdType];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the datas
        closeModal();
    });

    var ButtonJumlahBarang = document.getElementById('ButtonJumlahBarang')

    ButtonJumlahBarang.addEventListener("click", function (event) {
        event.preventDefault();
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
    var modal = document.getElementById('myModal1');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

$(document).ready(function () {
    // ... Your existing code ...

    // Add a click event handler to rows in TableType
    $('#TableType tbody').on('click', 'tr', function () {
        // Clear existing rows in TableType1
        $("#TableType1").DataTable().clear().draw();

        // Get the clicked row's data
        var rowData = $("#TableType").DataTable().row(this).data();

        // Extract the relevant data
        var transferredRowData = [
            rowData[0], // NamaType
            rowData[6], // SaldoPrimer
            rowData[7], // SaldoSekunder
            rowData[8], // SaldoTritier
            rowData[10], // IdType
            rowData[9] // Tgl_mutasi
        ];

        // Add the extracted row data to TableType1
        $("#TableType1").DataTable().row.add(transferredRowData).draw();
    });

    // ... Other existing code ...
});

// document.getElementById("btnProses").addEventListener("click", function() {
//     if (confirm("Apakah anda yakin mau menghanguskan barcode ini?")) {
//         try {
//             const checkedItems = document.querySelectorAll(".listBarcode input[type='checkbox']:checked");
//             checkedItems.forEach(function(item) {
//                 const kodebarang = item.dataset.kodebarang;
//                 const noindeks = item.dataset.noindeks;
//                 const userid = item.dataset.userid;

//                 // Lakukan sesuatu dengan kodebarang, noindeks, dan userid
//             });

//             const hangusItems = document.querySelectorAll(".listhangus tr");
//             hangusItems.forEach(function(item) {
//                 const idtype = item.dataset.idtype;
//                 const jumlahkeluarprimer = item.dataset.jumlahkeluarprimer;
//                 const jumlahkeluarsekunder = item.dataset.jumlahkeluarsekunder;
//                 const jumlahkeluartertier = item.dataset.jumlahkeluartertier;
//                 const tanggalproduksi = item.dataset.tanggalproduksi;

//                 // Lakukan sesuatu dengan idtype, jumlahkeluarprimer, dll.
//             });

//             // Lakukan sesuatu setelah proses selesai
//             tampil();
//             alert("Barcode sudah dihanguskan");
//             document.querySelector(".listhangus").innerHTML = ""; // Menghapus konten listhangus
//         } catch (error) {
//             alert(error.message);
//         }
//     }
// });
