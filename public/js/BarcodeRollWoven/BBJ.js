$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableKelompokUtama').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableKelompokUtama tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableKelompokUtama').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='namaKelut']").val(rowData[0]);
        $("input[name='IdKelut']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getKelompok")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableKelompok").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.namakelompok, item.idkelompok];
                    $("#TableKelompok").DataTable().row.add(row);
                });
                $("#TableKelompok").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $('#TableKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='IdKelompok']").val(rowData[0]);
        $("input[name='Kelompok']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getSubKelompok")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableSubKelompok").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.NamaSubKelompok, item.IdSubkelompok];
                    $("#TableSubKelompok").DataTable().row.add(row);
                });
                $("#TableSubKelompok").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    $('#TableSubKelompok tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableSubKelompok').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='sub_kelompok']").val(rowData[0]);
        $("input[name='idsub_kelompok']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getType")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                $("#TableType").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.NamaType, item.IdType];
                    $("#TableType").DataTable().row.add(row);
                });
                $("#TableType").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal3();
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableType').DataTable().row(this).data();

        // Populate the input fields with the data
        $("input[name='Type']").val(rowData[0]);
        $("input[name='IdType']").val(rowData[1]);

        fetch("/ABM/BarcodeRollWoven/BBJ/" + rowData[1] + ".getTampil")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                data.forEach((item) => {
                    $("#Barang").val(item.KodeBarang)
                    $("#primer").val((item.SaldoPrimer && item.SatPrimer) ? item.SaldoPrimer + " " + item.SatPrimer : "");
                    $("#sekunder").val((item.SaldoSekunder  && item.SatSekunder) ? item.SaldoSekunder + " " + item.SatSekunder : "");
                    $("#tritier").val((item.SaldoTritier  && item.SatTritier) ? item.SaldoTritier + " " + item.SatTritier : "");
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Hide the modal immediately after populating the data
        closeModal4();
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

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
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

function setShiftValue() {
    // Mendapatkan nilai shift yang dipilih dari dropdown
    var selectedShift = document.getElementById('Shift').value;

    // Menetapkan nilai shift ke dalam input field
    document.getElementById('shiftInput').value = selectedShift;

    // Menutup modal setelah memilih shift
    closeModal();
}
