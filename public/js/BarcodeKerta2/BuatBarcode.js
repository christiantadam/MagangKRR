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

    var kodebarang = null;
    var listKodeBarang = [];
    var subKelompok = null;
    var listSubKelompok = [];
    var type = null;
    var listIdType = [];
    var listType = [];

    $('#TableDivisi tbody').on('click', 'tr', function () {
        // Get the data from the clicked row
        var rowData = $('#TableDivisi').DataTable().row(this).data();

        // Populate the input fields with the data
        fetch("/ABM/BarcodeKerta2/BuatBarcode/" + rowData[0] + ".txtIdDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                kodebarang = data;
                // console.log(kodebarang);
                for (let i = 0; i < data.length; i++) {
                    listKodeBarang.push(data[i].KodeBarang)
                    listType.push(data[i].NamaType)
                    listSubKelompok.push(data[i].IdSubkelompok_Type)
                    listIdType.push(data[i].IdType)
                }

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
            console.log(rowData[0]);
            document.getElementById("Type").value = selectedType;
            if (listType.includes(selectedType)) {
                let index = listType.indexOf(selectedType)
                console.log(listType.indexOf(selectedType));
                kodebarang = listKodeBarang[index]
            }
            if (listType.includes(selectedType)) {
                let index = listType.indexOf(selectedType)
                console.log(listType.indexOf(selectedType));
                subKelompok = listSubKelompok[index]
            }
            if (listType.includes(selectedType)) {
                let index = listType.indexOf(selectedType)
                console.log(listType.indexOf(selectedType));
                type = listIdType[index]
            }
            console.log(listKodeBarang);
            closeModal2(); // Close the modal
        }
    });

    // Ambil elemen tombol "Timbang" dan "Print Barcode"
    var ButtonTimbang = document.getElementById('ButtonTimbang');
    var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');

    // Nonaktifkan tombol "Print Barcode" secara awal
    ButtonPrintBarcode.disabled = true;

    // Menambahkan event listener pada tombol "Timbang"
    ButtonTimbang.addEventListener("click", function (event) {
        var tritierInput = document.getElementById("tritier").value;

        if (tritierInput.trim() === "") {
            alert("Berat harus diisi!");
        } else {
            // Lanjutkan dengan operasi timbang

            // Aktifkan tombol "Print Barcode" setelah tritier diisi
            enablePrintBarcodeButton();
        }
    });

    // Fungsi untuk mengaktifkan tombol "Print Barcode"
    function enablePrintBarcodeButton() {
        ButtonPrintBarcode.disabled = false;
    }

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
    //     var idtype = '0016';
    //     var tanggal = document.getElementById('tanggalOutput');
    //     var primer = document.getElementById('Primer');
    //     var sekunder = document.getElementById('SekunderOutput');
    //     var tritier = document.getElementById('tritier');
    //     var UserID = 'U001';
    //     var asalidsubkelompok = 'SKL01';
    //     var kodebarang = '00000KB02';
    //     var uraian = document.getElementById('shift');
    //     var idsubkontraktor = '00000KB02';

    // fetch("/BuatBarcode/" + idtype + UserID + tanggal.value +
    //     primer.value + sekunder.value + tritier.value + asalidsubkelompok +
    //     idsubkontraktor + kodebarang + uraian.value + ".buatBarcode")

    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json();
    //         })
    //         .then((data) => {
    //             if (data === true) {
    //                 // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
    //                 console.log("Response is true, handling it...");

    //                 // Lakukan tindakan yang sesuai ketika respons adalah true
    //                 // Contoh: Munculkan pesan sukses atau lakukan tindakan lain

    //                 // Misalnya:
    //                 alert('Barcode berhasil dibuat.');
    //             } else if (Array.isArray(data)) {
    //                 // Respons adalah array JSON yang sesuai
    //                 data.forEach((item) => {
    //                     var kodebarcode = item.Kode_barang.padStart(9, '0') + '-' + item.noindeks.padStart(9, '0');
    //                     console.log(kodebarcode);
    //                     // Show an alert for each 'kodebarang'
    //                     alert('Kode Barang: ' + kodebarcode);
    //                 });
    //             } else {
    //                 console.error("Unexpected response data:", data);
    //                 // Handle other unexpected responses here
    //             }
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });
    // });

    // Ambil elemen tombol "Print Barcode"
    var ButtonPrintBarcode = document.getElementById('ButtonPrintBarcode');
    ButtonPrintBarcode.addEventListener("click", function (event) {
        // Mengatur tombol menjadi tidak dapat diakses (disabled)
        ButtonPrintBarcode.disabled = true;

        // var getBarcodePrintUlang = document.getElementById('BarcodeInput');
        // var str = getBarcodePrintUlang.value
        // var parts = str.split("-");
        // console.log(parts);

        // Lakukan operasi pencetakan barcode
        var idtype = type;
        var tanggal = document.getElementById('tanggalOutput').value;
        var primer = document.getElementById('Primer').value;
        var sekunder = document.getElementById('SekunderOutput').value;
        var tritier = document.getElementById('tritier').value;
        var UserID = 'U001';
        var asalidsubkelompok = subKelompok;
        var Kode_Barang = kodebarang;
        var uraian = document.getElementById('shift').value;
        var idsubkontraktor = kodebarang;

        // Ganti URL endpoint dengan endpoint yang sesuai di server Anda
        fetch("/ABM/BarcodeKerta2/BuatBarcode/" + idtype + "." + UserID + "." + tanggal + "." +
            primer + "." + sekunder + "." + tritier + "." + asalidsubkelompok + "." +
            idsubkontraktor + "." + Kode_Barang + "." + uraian + "." + ".buatBarcode")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                if (data === true) {
                    // Respons adalah boolean 'true', lakukan sesuatu sesuai kebutuhan
                    console.log("Barcode berhasil dibuat.");
                    alert('Barcode berhasil dibuat.');

                    // Sekarang Anda dapat melakukan fetch lainnya jika diperlukan
                    fetch("/ABM/BarcodeKerta2/BuatBarcode/" + kodebarang + ".getIndex")
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then((data) => {
                            // Handle data yang diterima dari fetch kedua di sini
                            console.log("Data dari fetch kedua:", data);
                            var kodebarcode = Kode_Barang.padStart(9, '0') + '-' + data.NoIndeks.padStart(9, '0');
                            console.log(kodebarcode);
                            // Show an alert for each 'kodebarang'
                            alert('Kode Barang: ' + kodebarcode);
                        })
                        .catch((error) => {
                            console.error("Error dalam fetch kedua:", error);
                        });
                } else {
                    console.error("Unexpected response data:", data);
                    // Handle other unexpected responses here
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    // document.getElementById("BarcodeACC").addEventListener("keypress", function (e) {
    //     if (e.key === "Enter") {
    //         var barcode = document.getElementById("BarcodeACC").value;

    //         if (barcode !== "") {
    //             var noindeks = barcode.substring(0, 9);
    //             var kodebarang = barcode.substring(barcode.length - 9);
    //             noindeks = noindeks.replace(/^0+/, ''); // Menghapus leading "0"

    //             // Panggil fungsi untuk memeriksa jenis barcode
    //             var jenisResult = cekJenisbarcode(kodebarang, parseInt(noindeks));
    //             if (jenisResult === 0) {
    //                 return; // Keluar jika jenis barcode tidak valid
    //             }

    //             // Panggil fungsi untuk memeriksa status barcode
    //             var statusResult = cekbarcode(kodebarang, parseInt(noindeks));
    //             if (statusResult === 1) {
    //                 // Panggil fungsi untuk menyetujui barcode
    //                 var sukses = ACCBarcode(kodebarang, noindeks, User_id);
    //                 if (sukses === 1) {
    //                     alert("Data sudah di ACC");
    //                     document.getElementById("btnKeluar").focus();
    //                 } else {
    //                     alert("Data tidak bisa di ACC, ulangi sekali lagi");
    //                 }
    //             } else if (statusResult === 2) {
    //                 alert("Barcode sudah pernah di ACC!");
    //                 document.getElementById("BarcodeACC").focus();
    //             } else {
    //                 alert("Data barcode tidak ditemukan!");
    //                 document.getElementById("BarcodeACC").focus();
    //             }

    //             document.getElementById("BarcodeACC").value = "";
    //         } else {
    //             alert("Scan barcode terlebih dahulu");
    //         }
    //     }
    // });

    // Function to enable the "Isi Jumlah Barang" button and "Timbang" button
    function enableIsiJumlahBarangButton() {
        document.getElementById("ButtonJumlahBarang").disabled = false;
        document.getElementById("ButtonTimbang").disabled = false;
    }

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
    // document.getElementById("JumlahBarcode").value = "0";

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

function prosesACCBarcode(data) {
    var str = BarcodeACC.value;
    var parts = str.split("-");
    var noindeks = parts[1];
    var kodebarang = parts[0];
    var userid = 'U001';
    var opsi = 'satu';

    const formData = {
        kodebarang: kodebarang,
        noindeks: noindeks,
        userid: userid,
        opsi: opsi
    };
    console.log(formData);
    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", "BuatBarcode/dua");
    form.setAttribute("method", "POST");

    // Loop through the formData object and add hidden input fields to the form
    for (const key in formData) {
        const input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", key);
        input.value = formData[key]; // Set the value of the input field to the corresponding data
        form.appendChild(input);
    }
    // Create method input with "PUT" Value
    const method = document.createElement("input");
    method.setAttribute("type", "hidden");
    method.setAttribute("name", "_method");
    method.value = "PUT"; // Set the value of the input field to the corresponding data
    form.appendChild(method);

    // Create input with "Update Keluarga" Value
    const ifUpdate = document.createElement("input");
    ifUpdate.setAttribute("type", "hidden");
    ifUpdate.setAttribute("name", "_ifUpdate");
    ifUpdate.value = "Update Barcode"; // Set the value of the input field to the corresponding data
    form.appendChild(ifUpdate);

    formContainer.appendChild(form);

    // Add CSRF token input field (assuming the csrfToken is properly fetched)
    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    let csrfInput = document.createElement("input");
    csrfInput.type = "hidden";
    csrfInput.name = "_token";
    csrfInput.value = csrfToken;
    form.appendChild(csrfInput);

    // Wrap form submission in a Promise
    function submitForm() {
        return new Promise((resolve, reject) => {
            form.onsubmit = resolve; // Resolve the Promise when the form is submitted
            form.submit();
        });
    }

    // Call the submitForm function to initiate the form submission
    submitForm()
        .then(() => console.log("Form submitted successfully!"))
        .catch((error) => console.error("Form submission error:", error));
}

function PrintUlangData(data) {
    var str = BarcodeACC.value;
    var parts = str.split("-");
    var noindeks = parts[1];
    var kodebarang = parts[0];
    var opsi = 'dua';

    // Create a data object to hold the values
    const formData = {
        kodebarang: kodebarang,
        noindeks: noindeks,
        opsi: opsi
    };

    console.log(formData);

    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", "BuatBarcode/{noindeks}"); // Replace with the correct action URL
    form.setAttribute("method", "POST");

    // Loop through the formData object and add hidden input fields to the form
    for (const key in formData) {
        const input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", key);
        input.value = formData[key]; // Set the value of the input field to the corresponding formData
        form.appendChild(input);
    }

    // Create input with "_method" field set to "PUT" (if you need to override the HTTP method)
    const method = document.createElement("input");
    method.setAttribute("type", "hidden");
    method.setAttribute("name", "_method");
    method.value = "PUT"; // Set the value of the input field to the corresponding formData
    form.appendChild(method);

    // Create input with "_ifUpdate" field set to "Update Barcode"
    const ifUpdate = document.createElement("input");
    ifUpdate.setAttribute("type", "hidden");
    ifUpdate.setAttribute("name", "_ifUpdate");
    ifUpdate.value = "Update Barcode"; // Set the value of the input field to the corresponding data
    form.appendChild(ifUpdate);

    formContainer.appendChild(form);

    // Add CSRF token input field (assuming the csrfToken is properly fetched)
    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    let csrfInput = document.createElement("input");
    csrfInput.type = "hidden";
    csrfInput.name = "_token";
    csrfInput.value = csrfToken;
    form.appendChild(csrfInput);

    // Wrap form submission in a Promise
    function submitForm() {
        return new Promise((resolve, reject) => {
            form.onsubmit = resolve; // Resolve the Promise when the form is submitted
            form.submit();
        });
    }

    // Call the submitForm function to initiate the form submission
    submitForm()
        .then(() => console.log("Form submitted successfully!"))
        .catch((error) => console.error("Form submission error:", error));
}
