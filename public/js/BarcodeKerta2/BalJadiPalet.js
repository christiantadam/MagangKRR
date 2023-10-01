$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });


    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableDivisi').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    $("#TableDivisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisi").DataTable().row(this).data();

        // Populate the input fields with the data
        // $("#IdDivisi").val(rowData[0]);
        // $("#Divisi").val(rowData[1]);

        // var txtIdDivisi = document.getElementById(rowData[0]);
        fetch("/ABM/BalJadiPalet/" + rowData[0] + ".getType")
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
                    var row = [item.NamaType, item.IdType];
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

    $("#TableType tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableType").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdType").val(rowData[1]);
        $("#NamaType").val(rowData[0]);

        // var txtIdDivisi = document.getElementById(rowData[0]);
        // Hide the modal immediately after populating the data
        closeModal();
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')
    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonType = document.getElementById('ButtonType')
    ButtonType.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var BarcodeInput = document.getElementById('BarcodeInput');
    BarcodeInput.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var BarcodeInput = document.getElementById('BarcodeInput');
            var str = BarcodeInput.value;
            var parts = str.split("-");
            console.log(parts); // Output: ["A123", "a234"]

            fetch("/ABM/BalJadiPalet/" + parts[0] + "." + parts[1] + ".getBarcode")
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
                    $("#TableType1").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var kodebarcode = parts[0] + "-" + parts[1]
                        var row = [kodebarcode, item.qty_primer, item.qty_sekunder, item.qty];
                        $("#TableType1").DataTable().row.add(row);
                        $("#primer").val(item.qty_primer)
                        $("#sekunder").val(item.qty_sekunder)
                        $("#tritier").val(item.qty)
                    });

                    // Redraw the table to show the changes
                    $("#TableType1").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
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
    modal.style.display = 'block';

    // Enable the "Pilih Type" button
    document.getElementById('ButtonType').disabled = false;
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block';

    // Enable the "Scan Barcode" button
    document.getElementById('ScanBarcodeButton').disabled = false;
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

function setShiftValue() {
    var selectedShift = document.getElementById('Shift').value;
    document.getElementById('shiftInput').value = selectedShift;

    // Enable the "Divisi" button
    document.getElementById('ButtonDivisi').disabled = false;

    closeModal(); // Close the modal or adjust as needed
}

function scanBarcode() {
    // Dapatkan elemen input "No Barcode" berdasarkan ID
    var barcodeInput = document.getElementById('BarcodeInput');

    // Setel atribut readonly menjadi false
    barcodeInput.readOnly = false;

    // Fokuskan kursor ke dalam input "No Barcode"
    barcodeInput.focus();

    // Enable the "Print Barcode" button
    var printBarcodeButton = document.getElementById('PrintBarcodeButton');
    if (printBarcodeButton) {
        printBarcodeButton.disabled = false;
    } else {
        console.error('PrintBarcodeButton element not found');
    }
}
