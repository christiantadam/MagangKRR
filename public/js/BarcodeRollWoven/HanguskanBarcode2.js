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
                $("#TableType1").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var kodebarcode = item.NoIndeks.padStart(9, '0') + '-' + item.Kode_barang.padStart(9, '0');
                    console.log(kodebarcode);
                    var row = [item.NamaType, kodebarcode, item.NamaSubKelompok, item.NamaKelompok, item.Kode_barang, item.NoIndeks, item.Qty_Primer, item.Qty_sekunder, item.Qty, item.Tgl_mutasi];
                    $("#TableType").DataTable().row.add(row);
                    var row = [item.NamaType, item.SaldoPrimer, item.SaldoSekunder, item.SaldoTritier, item.IdType, item.Tgl_mutasi];
                    $("#TableType1").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();
                $("#TableType1").DataTable().draw();
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
