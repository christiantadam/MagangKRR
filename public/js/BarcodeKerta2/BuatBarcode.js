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


    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });


    $('#TableDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi').val(rowData[0]);
        $('#Divisi').val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    var ButtonShift = document.getElementById('ButtonShift')
    ButtonShift.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonDivisi = document.getElementById('ButtonDivisi')
    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonType = document.getElementById('ButtonType')
    ButtonType.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonJumlahBarang = document.getElementById('ButtonJumlahBarang')
    ButtonJumlahBarang.addEventListener("click", function (event) {
        event.preventDefault();
    });

    // Get the input elements
    const tanggalInput = document.getElementById("tanggalInput");
    const tanggalOutput = document.getElementById("tanggalOutput");

    // Add an event listener to the first input field to update the second input field
    tanggalInput.addEventListener("input", function () {
        // Get the selected date value from the first input field
        const selectedDate = tanggalInput.value;

        // Update the value of the second input field with the selected date
        tanggalOutput.value = selectedDate;
    });

    document.getElementById("printBarcodeButton").addEventListener("click", function () {
        // Hide the button and other unnecessary elements before printing
        document.getElementById("printBarcodeButton").style.display = "none";
        document.getElementById("ButtonTimbang").style.display = "none"; // Hide the "Timbang" button if needed
        window.print();

        // After printing is done or if the user cancels the print dialog, show the button again
        document.getElementById("printBarcodeButton").style.display = "block";
        document.getElementById("ButtonTimbang").style.display = "block"; // Show the "Timbang" button again if needed
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

function enableButtonJumlahBarang() {
    document.getElementById("ButtonJumlahBarang").disabled = false;
    closeModal2()
}


// Function to enable the "Type" button and disable the "Process" button
function enableButtonType() {
    const buttonType = document.getElementById("ButtonType");
    buttonType.removeAttribute("disabled");

    // Get the selected value from the "TableType" table
    const selectedType = document.querySelector("#TableType tbody tr td").textContent;

    // Set the selected value to the input field
    document.getElementById("Type").value = selectedType;

    // Close the modal after the "Process" button is clicked
    closeModal1();

    closeModal2();
}

function setSekunderValue() {
    const sekunderValue = document.getElementById("Sekunder").value;
    document.getElementById("SekunderOutput").value = sekunderValue;
    document.getElementById("LembarOutput").value = sekunderValue;
    closeModal3();
}

// Add event listener to the "Ok" button to set the sekunder value and close the modal
document.getElementById("myModal3").querySelector("button[type='button']").addEventListener("click",
    setSekunderValue);

// Rest of your JavaScript code for handling modals and other functionality can be placed here
// Make sure you have already defined the functions: openModal3, closeModal3, etc.



// Function to enable the "Divisi" button after selecting the shift
function enableButtonDivisi() {
    const buttonDivisi = document.getElementById("ButtonDivisi");
    buttonDivisi.removeAttribute("disabled");
}

// Rest of your JavaScript code for handling modals and other functionality can be placed here
// Make sure you have already defined the functions: openModal1, closeModal1, openModal2, closeModal2, etc.


// Function to set the selected shift value and close the modal
function setShiftValue() {
    // Get the selected shift value from the modal input
    const selectedShift = document.getElementById("Shift").value;

    // Set the selected shift value to the read-only input with the ID "shift"
    document.getElementById("shift").value = selectedShift;

    // Enable the "Divisi" button
    enableButtonDivisi();

    // Close the modal
    closeModal();
}

// Rest of your JavaScript code for handling modals and other functionality can be placed here
// Make sure you have already defined the functions: openModal, closeModal, etc.

function checkDateAndEnableButton() {
    var tanggalInput = document.getElementById('tanggalInput');
    var buttonShift = document.getElementById('ButtonShift');

    if (tanggalInput.value !== '') {
        buttonShift.removeAttribute('disabled');
    } else {
        buttonShift.setAttribute('disabled', 'disabled');
    }
}

function enableButtonJumlahBarang() {
    document.getElementById("ButtonJumlahBarang").disabled = false;
    document.getElementById("ButtonTimbang").disabled = false; // Enable the Timbang button
    closeModal2();
}
