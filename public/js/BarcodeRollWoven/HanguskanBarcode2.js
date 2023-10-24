$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableObjek').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    var table = $('#TableType').DataTable({
        "scrollX": true,
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });

    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonObjek = document.getElementById('ButtonObjek')

    ButtonObjek.addEventListener("click", function (event) {
        event.preventDefault();
    });

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#Objek').val(rowData[1]);

        var txtIdObjek = document.getElementById('IdObjek');
        fetch("/ABM/BarcodeRollWoven/HanguskanBarcode/" + txtIdObjek.value + ".txtIdObjek")
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
                    var row = [item.NamaType, kodebarcode, item.NamaSubKelompok, item.NamaKelompok, item.Kode_barang, item.NoIndeks, item.Qty_Primer, item.Qty_sekunder, item.Qty, item.Tgl_mutasi, item.IdType];
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

function prosesData() {
    var selectedRows = $("#TableType").DataTable().rows(".selected").data().toArray();
    const data = {
        kodebarang: selectedRows[0][4],
        noindeks: selectedRows[0][5],
        userid: 'U001',

    };
    console.log(data);
    const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "HanguskanBarcode/{selectedRows[0][4]}");
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
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

// function prosesData() {
//     const hangusItems = document.querySelectorAll("#TableType1 tbody tr");
//     const requestData = [];

//     hangusItems.forEach(function(item) {
//         const idtype = item.dataset.idtype;
//         const tanggalproduksi = item.dataset.tanggalproduksi;

//         requestData.push({
//             idtype: idtype,
//             tanggal: tanggalproduksi,
//         });
//     });

//     if (requestData.length > 0) {
//         const form = document.createElement("form");
//         form.setAttribute("action", "/HanguskanBarcode"); // Ganti dengan URL yang sesuai
//         form.setAttribute("method", "POST");
//         form.style.display = "none"; // Sembunyikan form dari tampilan

//         const dataInput = document.createElement("input");
//         dataInput.setAttribute("type", "hidden");
//         dataInput.setAttribute("name", "hangusItems");
//         dataInput.value = JSON.stringify(requestData);
//         form.appendChild(dataInput);

//         const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
//         const csrfInput = document.createElement("input");
//         csrfInput.type = "hidden";
//         csrfInput.name = "_token";
//         csrfInput.value = csrfToken;
//         form.appendChild(csrfInput);

//         document.body.appendChild(form);

//         form.submit(); // Kirim form secara otomatis
//     } else {
//         alert("Tidak ada data untuk diproses");
//     }
// }




