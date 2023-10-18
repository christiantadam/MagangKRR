$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    var counter1 = 1; // Initialize the counter for TableType1
    $('#TypeTable').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableOpenSJ').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    $('#TableSJPrint').DataTable({
        order: [
            [0, 'desc']
        ],
        searching: false,
        info: false,
        paging: false,
    });

    $(document).ready(function () {
        // ... (other code)

        // Add an input event listener to the "Truk No. Pol" input field
        $('#Truk_pol').on('input', function () {
            // Get the input value
            var trukNoPolValue = $(this).val();

            // Update the text of the <span> element with ID "noPolLabel"
            $('#noPolLabel').text(trukNoPolValue);
        });

        // ... (other code)
    });

    var SJ = document.getElementById('SJ');
    SJ.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var Truk_pol = document.getElementById('Truk_pol');
    Truk_pol.addEventListener("keypress", function (event) {
        if (event.key == "Enter") {
            var txtNoUrut = document.getElementById('Surat_jalan');
            var txtTgl = document.getElementById('tgl');

            // Cek apakah nilai txtNoUrut dimulai dengan "J" atau "j"
            if (txtNoUrut.value.startsWith("J") || txtNoUrut.value.startsWith("j")) {
                fetch("/ABM/BarcodeKerta2/CSJ/" + txtNoUrut.value + "." + txtTgl.value + ".getListSJ")
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
                        $("#TypeTable").DataTable().clear().draw();
                        $("#TableSJPrint").DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            var row = [counter1++, item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            var row2 = [item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            $("#TypeTable").DataTable().row.add(row);
                            $("#TableSJPrint").DataTable().row.add(row2);
                        });

                        // Redraw the table to show the changes
                        $("#TypeTable").DataTable().draw();
                        $("#TableSJPrint").DataTable().draw();
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });

            } else if (txtNoUrut.value.startsWith("A") || txtNoUrut.value.startsWith("a")) {
                fetch("/ABM/BarcodeKerta2/CSJ/" + txtNoUrut.value + "." + txtTgl.value + ".getListSJ2")
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
                        $("#TypeTable").DataTable().clear().draw();
                        $("#TableSJPrint").DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            var row = [counter1++, item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            var row2 = [item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            $("#TypeTable").DataTable().row.add(row);
                            $("#TableSJPrint").DataTable().row.add(row2);
                        });

                        // Redraw the table to show the changes
                        $("#TypeTable").DataTable().draw();
                        $("#TableSJPrint").DataTable().draw();
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });

            } else  if (txtNoUrut.value.startsWith("W") || txtNoUrut.value.startsWith("w")) {
                fetch("/ABM/BarcodeKerta2/CSJ/" + txtNoUrut.value + "." + txtTgl.value + ".getListSJ3")
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
                        $("#TypeTable").DataTable().clear().draw();
                        $("#TableSJPrint").DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            var row = [counter1++, item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            var row2 = [item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            $("#TypeTable").DataTable().row.add(row);
                            $("#TableSJPrint").DataTable().row.add(row2);
                        });

                        // Redraw the table to show the changes
                        $("#TypeTable").DataTable().draw();
                        $("#TableSJPrint").DataTable().draw();
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });

            } else {
                fetch("/ABM/BarcodeKerta2/CSJ/" + txtNoUrut.value + "." + txtTgl.value + ".getListSJ3")
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
                        $("#TypeTable").DataTable().clear().draw();
                        $("#TableSJPrint").DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            var row = [counter1++, item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            var row2 = [item.NamaType, item.Kode_barang, item.Primer, item.Sekunder, item.Tritier];
                            $("#TypeTable").DataTable().row.add(row);
                            $("#TableSJPrint").DataTable().row.add(row2);
                        });

                        // Redraw the table to show the changes
                        $("#TypeTable").DataTable().draw();
                        $("#TableSJPrint").DataTable().draw();
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });
            }
        }
    });

    // var Cetak = document.getElementById('Cetak');
    // Cetak.addEventListener("click", function (event) {
    //     fetch("/ABM/BarcodeKerta2/CSJ/" + ".getCetak")
    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json(); // Assuming the response is in JSON format
    //         })
    //         .then((data) => {
    //             // Handle the data retrieved from the server (data should be an object or an array)
    //             console.log(data);
    //             // Clear the existing table rows
    //             $("#TableSJPrint").DataTable().clear().draw();

    //             // Loop through the data and create table rows
    //             data.forEach((item) => {
    //                 var row = [item.Kode_barang, item.NamaType, item.Primer, item.Sekunder, item.Tritier];
    //                 $("#TableSJPrint").DataTable().row.add(row);
    //             });

    //             // Redraw the table to show the changes
    //             $("#TableSJPrint").DataTable().draw();
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });
    // });

    // $(document).ready(function () {
    //     // ... kode lainnya ...

    //     // Mendapatkan elemen input tanggal
    //     var tanggalInput = document.getElementById('tgl');

    //     // Mendapatkan tanggal saat ini
    //     var today = new Date();

    //     // Format tanggal menjadi YYYY-MM-DD (sesuai dengan format input tanggal)
    //     var formattedDate = today.toISOString().slice(0, 10);

    //     // Set nilai input tanggal ke tanggal saat ini
    //     tanggalInput.value = formattedDate;

    //     // ... kode lainnya ...
    // });

    $(document).ready(function () {
        // Add a click event listener to rows in the TableOpenSJ table
        $('#TableOpenSJ tbody').on('click', 'tr', function () {
            // Get the data from the clicked row
            var rowData = $("#TableOpenSJ").DataTable().row(this).data();

            // Extract the No SJ value (assuming it's in the first column)
            var noSJ = rowData[0]; // Adjust the index as needed

            // Set the No SJ value in the Surat_jalan input field
            $('#Surat_jalan').val(noSJ);
        });
    });
});

function showCard() {
    var cardSection = document.getElementById('cardSection');
    cardSection.style.display = 'block';
}

function hideCard() {
    var cardSection = document.getElementById('cardSection');
    cardSection.style.display = 'none';
}

function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block';

    // Mendapatkan tombol "Ok" dalam modal
    var okButton = document.querySelector('#myModal button[type="button"]');

    // Menambahkan event listener untuk mendengarkan klik tombol "Ok"
    okButton.addEventListener('click', function () {
        // Mendapatkan nilai yang dipilih dalam dropdown "Surat Jalan Untuk"
        var selectedOption = document.getElementById('shift').value;

        // Mengisi nilai "Surat_jalan" berdasarkan pilihan yang dipilih
        var suratJalanInput = document.getElementById('Surat_jalan');
        var suratJalanValue = '';

        if (selectedOption === '1') {
            // Jika dipilih "Woven Bag"
            suratJalanValue = '0000000';
        } else if (selectedOption === '2') {
            // Jika dipilih "Jumbo Bag"
            suratJalanValue = 'J000001';
        } else if (selectedOption === '3') {
            // Jika dipilih "AD Star"
            suratJalanValue = 'A000001';
        }

        // Mengisi nilai input "Surat_jalan" sesuai dengan pilihan
        suratJalanInput.value = suratJalanValue;

        // Sembunyikan modal setelah mengisi input
        closeModal();
    });
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"

    // Fetch data from the server
    fetch("/ABM/BarcodeKerta2/CSJ/" + ".getSJ")
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
            $("#TableOpenSJ").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.No_SJ, item.Tgl_Terima];
                $("#TableOpenSJ").DataTable().row.add(row);

                document.getElementById('tanggalTerima').textContent = item.Tgl_Terima;
                document.getElementById('noSJ').textContent = item.No_SJ;
            });

            // Redraw the table to show the changes
            $("#TableOpenSJ").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

// Fungsi ini akan menangani perubahan tanggal setelah memilih data dari tabel SJ
function updateTanggal() {
    // Mengambil tanggal dari data yang dipilih dalam tabel SJ
    var selectedRowData = $("#TableOpenSJ").DataTable().row('.selected').data();
    if (selectedRowData) {
        var tanggalTerima = selectedRowData[1]; // Mengambil tanggal dari data yang dipilih

        // Mengonversi format tanggal ke "yyyy-mm-dd" tanpa jam
        var dateObject = new Date(tanggalTerima);
        dateObject.setHours(0, 0, 0, 0); // Set time components to 00:00:00
        var year = dateObject.getFullYear();
        var month = ("0" + (dateObject.getMonth() + 1)).slice(-2); // Tambah 1 karena bulan dimulai dari 0
        var day = ("0" + dateObject.getDate()).slice(-2);
        var formattedDate = year + "-" + month + "-" + day;

        // Set tanggal ke bidang "tgl"
        $('#tgl').val(formattedDate);

        // Tampilkan tanggal di elemen span
        $('#tanggalTerima').text(formattedDate);

        closeModal1();
    }
}
function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

// function BatalCetak(data) {
//     var opsi = "satu";

//     const formData = {
//         opsi: opsi,
//     };
//     console.log(formData);
//     const formContainer = document.getElementById("form-container");
//     const form = document.createElement("form");
//     form.setAttribute("action", "CSJ/opsi");
//     form.setAttribute("method", "POST");

//     // Loop through the formData object and add hidden input fields to the form
//     for (const key in formData) {
//         const input = document.createElement("input");
//         input.setAttribute("type", "hidden");
//         input.setAttribute("name", key);
//         input.value = formData[key]; // Set the value of the input field to the corresponding data
//         form.appendChild(input);
//     }
//     // Create method input with "PUT" Value
//     const method = document.createElement("input");
//     method.setAttribute("type", "hidden");
//     method.setAttribute("name", "_method");
//     method.value = "PUT"; // Set the value of the input field to the corresponding data
//     form.appendChild(method);

//     // Create input with "Update Keluarga" Value
//     const ifUpdate = document.createElement("input");
//     ifUpdate.setAttribute("type", "hidden");
//     ifUpdate.setAttribute("name", "_ifUpdate");
//     ifUpdate.value = "Update Barcode"; // Set the value of the input field to the corresponding data
//     form.appendChild(ifUpdate);

//     formContainer.appendChild(form);

//     // Add CSRF token input field (assuming the csrfToken is properly fetched)
//     let csrfToken = document
//         .querySelector('meta[name="csrf-token"]')
//         .getAttribute("content");
//     let csrfInput = document.createElement("input");
//     csrfInput.type = "hidden";
//     csrfInput.name = "_token";
//     csrfInput.value = csrfToken;
//     form.appendChild(csrfInput);

//     // Wrap form submission in a Promise
//     function submitForm() {
//         return new Promise((resolve, reject) => {
//             form.onsubmit = resolve; // Resolve the Promise when the form is submitted
//             form.submit();
//         });
//     }

//     // Call the submitForm function to initiate the form submission
//     submitForm()
//         .then(() => console.log("Form submitted successfully!"))
//         .catch((error) => console.error("Form submission error:", error));
// }

function BatalCetak(data) {
    var txtNoUrutValue = document.getElementById("Surat_jalan").value;
    var opsi;

    if (txtNoUrutValue.match(/^j/i)) {
        opsi = "satu";
    } else {
        opsi = "dua";
    }

    const formData = {
        opsi: opsi,
    };
    console.log(formData);

    const formContainer = document.getElementById("form-container");
    const form = document.createElement("form");
    form.setAttribute("action", opsi === "satu" ? "CSJ/opsi" : "CSJ/opsi");
    form.setAttribute("method", "POST");

    // Loop melalui objek formData dan tambahkan input field tersembunyi ke formulir
    for (const key in formData) {
        const input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", key);
        input.value = formData[key]; // Setel nilai input field ke data yang sesuai
        form.appendChild(input);
    }

    // Buat input method dengan nilai "PUT"
    const method = document.createElement("input");
    method.setAttribute("type", "hidden");
    method.setAttribute("name", "_method");
    method.value = "PUT"; // Setel nilai input field ke data yang sesuai
    form.appendChild(method);

    // Buat input dengan nilai "Update Barcode"
    const ifUpdate = document.createElement("input");
    ifUpdate.setAttribute("type", "hidden");
    ifUpdate.setAttribute("name", "_ifUpdate");
    ifUpdate.value = "Update Barcode"; // Setel nilai input field ke data yang sesuai
    form.appendChild(ifUpdate);

    formContainer.appendChild(form);

    // Tambahkan input field token CSRF (dengan asumsi csrfToken diambil dengan benar)
    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    let csrfInput = document.createElement("input");
    csrfInput.type = "hidden";
    csrfInput.name = "_token";
    csrfInput.value = csrfToken;
    form.appendChild(csrfInput);

    // Bungkus pengiriman formulir dalam sebuah Promise
    function submitForm() {
        return new Promise((resolve, reject) => {
            form.onsubmit = resolve; // Selesaikan Promise ketika formulir dikirim
            form.submit();
        });
    }

    // Panggil fungsi submitForm untuk memulai pengiriman formulir
    submitForm()
        .then(() => console.log("Formulir berhasil dikirim!"))
        .catch((error) => console.error("Kesalahan pengiriman formulir:", error));
}
