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
        select: 'single'
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
        select: 'single'
    });

    $('#TableDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row
        var rowData = $('#TableDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        fetch("/BuatBarcode/" + rowData[0] + ".txtIdDivisi")
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
                    var row = [item.NamaType];
                    $("#TableType").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#TableType").DataTable().draw();

                // Clear the textarea "Type" before populating it
                document.getElementById("Type").value = "";

                // Hide the modal immediately after populating the data
                closeModal1();

            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    $('#TableType tbody').on('click', 'tr', function () {
        // Get the data from the clicked row
        var rowData = $('#TableType').DataTable().row(this).data();

        // Populate the input field with the selected type
        if (rowData) {
            const selectedType = rowData[0]; // Assuming the type is in the first column
            document.getElementById("Type").value = selectedType;
            closeModal2(); // Close the modal
        }
    });

    document.getElementById("ButtonTimbang").addEventListener("click", function () {
        var tritierInput = document.getElementById("tritier").value;

        if (tritierInput.trim() === "") {
            alert("Berat harus diisi!");
        } else {
            // Lanjutkan dengan operasi timbang
        }
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

    // var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode')
    // ButtonPrintBarcode.addEventListener("click", function (event) {
    //     var idtype = document.getElementById('0016');
    //     var tanggal = document.getElementById('tanggalOutput');
    //     var primer = document.getElementById('Primer');
    //     var sekunder = document.getElementById('SekunderOutput');
    //     var tritier = document.getElementById('tritier');
    //     var UserID = document.getElementById('U001');
    //     var asalidsubkelompok = document.getElementById('SKL01');
    //     var kodebarang = document.getElementById('00000KB02');
    //     var uraian = document.getElementById('shift');
    //     var idsubkontraktor = document.getElementById('00000KB02');

    //     fetch("/BuatBarcode/" + idtype.value + UserID.value + tanggal.value +
    //     primer.value + sekunder.value + tritier.value + asalidsubkelompok.value +
    //     idsubkontraktor.value + kodebarang.value + uraian.value + ".buatBarcode")

    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json(); // Assuming the response is in JSON format
    //         })
    //         .then((data) => {
    //             // // Handle the data retrieved from the server (data should be an object or an array)
    //             // console.log(data);
    //             // // Clear the existing table rows
    //             // $("#TableObjek").DataTable().clear().draw();

    //             // Loop through the data and create table rows
    //             // data.forEach((item) => {
    //             //     var kodebarcode = item.Kode_barang.padStart(9, '0') + '-' + item.NoIndeks.padStart(9, '0');
    //             //     console.log(kodebarcode);
    //             //     var row = [kodebarang];
    //             //     $("#TableObjek").DataTable().row.add(row);
    //             // });
    //             data.forEach((item) => {
    //                 var kodebarcode = item.Kode_barang.padStart(9, '0') + '-' + item.NoIndeks.padStart(9, '0');
    //                 console.log(kodebarcode);

    //                 // Show an alert for each 'kodebarang'
    //                 alert('Kode Barang: ' + kodebarcode);
    //             });

    //             // // Redraw the table to show the changes
    //             // $("#TableObjek").DataTable().draw();
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });
    // });

    var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');

    ButtonPrintBarcode.addEventListener("click", function (event) {
        // Mengambil nilai dari elemen-elemen dengan ID yang sesuai
        var idtype = document.getElementById('0016').value;
        var tanggal = document.getElementById('tanggalOutput').value;
        var primer = document.getElementById('Primer').value;
        var sekunder = document.getElementById('SekunderOutput').value;
        var tritier = document.getElementById('tritier').value;
        var UserID = document.getElementById('U001').value;
        var asalidsubkelompok = document.getElementById('SKL01').value;
        var kodebarang = document.getElementById('00000KB02').value;
        var uraian = document.getElementById('shift').value;
        var idsubkontraktor = document.getElementById('00000KB02').value;

        // Menggabungkan nilai-nilai tersebut untuk membentuk URL
        var url = `/BuatBarcode/${idtype}${UserID}${tanggal}${primer}${sekunder}${tritier}${asalidsubkelompok}${idsubkontraktor}${kodebarang}${uraian}.buatBarcode`;

        fetch(url)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Asumsi respons dalam format JSON
            })
            .then((data) => {
                data.forEach((item) => {
                    var kodebarcode = item.kodebarang.padStart(9, '0') + '-' + item.NoIndeks.padStart(9, '0');
                    console.log(kodebarcode);

                    // Menampilkan kodebarang dalam sebuah pop-up alert
                    alert('Kode Barang: ' + kodebarcode);
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });
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

    // Get the input element for "Type"
    const typeInput = document.getElementById("Type");

    // Get the "Isi Jumlah Barang" button element
    const isiJumlahBarangButton = document.getElementById("ButtonJumlahBarang");

    // Function to enable the "Isi Jumlah Barang" button
    function enableIsiJumlahBarangButton() {
        isiJumlahBarangButton.removeAttribute("disabled");
    }

    // Function to disable the "Isi Jumlah Barang" button
    function disableIsiJumlahBarangButton() {
        isiJumlahBarangButton.setAttribute("disabled", "disabled");
    }

    // Add an event listener to monitor changes in the "Type" input
    typeInput.addEventListener("input", function () {
        const typeValue = typeInput.value;

        // Check if the "Type" input is not empty
        if (typeValue.trim() !== "") {
            // Enable the "Isi Jumlah Barang" button
            enableIsiJumlahBarangButton();
        } else {
            // If the "Type" input is empty, disable the button
            disableIsiJumlahBarangButton();
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
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block';

    // Clear the value of the "Type" input field
    document.getElementById("Type").value = "";
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

// Function to enable the "Type" button and disable the "Process" button
// function enableButtonType() {
//     // Get the selected value from the "TableType" table
//     const selectedType = document.querySelector("#TableType tbody tr td").textContent;

//     // Set the selected value to the "Type" input field
//     document.getElementById("Type").value = selectedType;

//     // Close the "Table Type" modal
//     closeModal2();
// }

function setSekunderValue() {
    const sekunderValue = document.getElementById("Sekunder").value;
    document.getElementById("SekunderOutput").value = sekunderValue;
    document.getElementById("LembarOutput").value = sekunderValue;
    closeModal3();

    // Aktifkan tombol "Isi Jumlah Barang" di dalam modal
    document.getElementById("ButtonJumlahBarangModal").disabled = false;
}

// Add event listener to the "Ok" button to set the sekunder value and close the modal
// document.getElementById("myModal3").querySelector("button[type='button']").addEventListener("click",
//     setSekunderValue);

// Rest of your JavaScript code for handling modals and other functionality can be placed here
// Make sure you have already defined the functions: openModal3, closeModal3, etc.


// Function to enable the "Divisi" button after selecting the shift
function enableDivisiButton() {
    document.getElementById("ButtonDivisi").removeAttribute("disabled");
}

function enableNamaTypeButton() {
    document.getElementById("ButtonType").removeAttribute("disabled");
}

function enableIsiJumlahBarangButton() {
    document.getElementById("ButtonJumlahBarangModal").removeAttribute("disabled");
}

function enableTimbangButton() {
    document.getElementById("ButtonTimbang").removeAttribute("disabled");
}

function enablePrintBarcodeButton() {
    document.getElementById("ButtonPrintBarcode").removeAttribute("disabled");
}

// Rest of your JavaScript code for handling modals and other functionality can be placed here
// Make sure you have already defined the functions: openModal1, closeModal1, openModal2, closeModal2, etc.

// Function to set the selected shift value and close the modal
// function setShiftValue() {
//     // Get the selected shift value from the modal input
//     const selectedShift = document.getElementById("Shift").value;

//     // Set the selected shift value to the read-only input with the ID "shift"
//     document.getElementById("shift").value = selectedShift;

//     // Enable the "Divisi" button
//     enableButtonDivisi();

//     // Close the modal
//     closeModal();
// }

function setShiftValue() {
    // Get the selected shift value from the modal input
    const selectedShift = document.getElementById("Shift").value;

    // Set the selected shift value to the read-only input with the ID "shift"
    document.getElementById("shift").value = selectedShift;

    // Set default values for "Jenis" and "Satuan" input fields
    document.getElementById("Jenis").value = "Barang Baru";
    document.getElementById("Satuan").value = "BALL";
    document.getElementById("Primer").value = "1";
    document.getElementById("JumlahBarcode").value = "0";

    // Enable the "Divisi" button
    enableDivisiButton();

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
