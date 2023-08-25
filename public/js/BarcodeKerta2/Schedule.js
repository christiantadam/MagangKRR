$(document).ready(function () {
    $("#TableType").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableSubKelompok").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableKelompok").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableKelut").DataTable({
        order: [[0, "desc"]],
    });

    $("#TableDivisi").DataTable({
        order: [[0, "desc"]],
    });

    var table = $("#TypeTable").DataTable({
        order: [[0, "desc"]],
    });
    $(".dropdown-submenu a.test").on("click", function (e) {
        $(this).next("ul").toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    // Add an event listener to the "Hapus" button
    // $("#DeleteButton").on("click", function () {
    //     var table = $("#TypeTable").DataTable();
    //     var selectedRows = table.rows(".selected");

    //     // Remove selected rows from the DataTable
    //     selectedRows.remove().draw();
    //     event.preventDefault();
    // });
    // Add an event listener to the "Pilih Semua" button
    $("#SelectAllButton").on("click", function () {
        var table = $("#TypeTable").DataTable();
        table.rows().select();
        event.preventDefault();
    });
    $("#TypeTable tbody").on("click", "tr", function () {
        // Check if the clicked row is already selected
        if ($(this).hasClass("selected")) {
            // If it's already selected, remove the 'selected' class
            $(this).removeClass("selected");

            // Hide the modal (if needed)
            closeModal4();
        } else {
            // Remove 'selected' class from all rows
            $("#TypeTable tbody tr").removeClass("selected");

            // Add 'selected' class to the clicked row
            $(this).addClass("selected");

            var rowData = $("#TypeTable").DataTable().row(this).data();
            // console.log(rowData);
            // Populate the input fields with the data
            $("#id_Type").val(rowData[0]);
            $("#Type").val(rowData[1]);

            // Hide the modal (if needed)
            closeModal4();
        }
    });

    $("#TableDivisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisi").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdDivisi").val(rowData[0]);
        $("#Divisi").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal();
    });

    $("#TableKelut tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        const IdDiv = document.getElementById("IdDivisi").value;
        var rowData = $("#TableKelut").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_Kelut").val(rowData[0]);
        $("#Kelut").val(rowData[1]);
        if ($("#id_Kelut").value != "") {
            fetch("/Schedule/" + IdDiv + ".getScheduleJBB")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Handle the data retrieved from the server (data should be an object or an array)

                    // Clear the existing table rows
                    $("#TypeTable").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        // var checkbox =
                        //     '<input type="checkbox" class="row-checkbox">';
                        var combinedValue =

                            item.namatype +
                            " / " +
                            item.idtype; // Gabungkan nilai-nila item.nametype dan item.idtype
                        var row = [
                            combinedValue, // Gunakan variabel yang telah digabungkan
                        ];
                        $("#TypeTable").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#TypeTable").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }

        // Hide the modal immediately after populating the data
        closeModal1();
    });

    $("#TableKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_Kelompok").val(rowData[0]);
        $("#Kelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal2();
    });

    $("#TableSubKelompok tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableSubKelompok").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_SubKelompok").val(rowData[0]);
        $("#Sub_kelompok").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal3();
    });

    $("#TableType tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableType").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#id_Type").val(rowData[0]);
        $("#Type").val(rowData[1]);

        // Hide the modal immediately after populating the data
        closeModal4();
    });

    var ButtonDivisi = document.getElementById("ButtonDivisi");

    ButtonDivisi.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelut = document.getElementById("ButtonKelut");

    ButtonKelut.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonKelompok = document.getElementById("ButtonKelompok");

    ButtonKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonSubKelompok = document.getElementById("ButtonSubKelompok");

    ButtonSubKelompok.addEventListener("click", function (event) {
        event.preventDefault();
    });

    var ButtonType = document.getElementById("ButtonType");

    ButtonType.addEventListener("click", function (event) {
        event.preventDefault();
    });

    function addDataToTable() {
        // Extract data from input fields
        var divisi = document.getElementById("Divisi").value;
        var kelut = document.getElementById("Kelut").value;
        var kelompok = document.getElementById("Kelompok").value;
        var subKelompok = document.getElementById("Sub_kelompok").value;
        var type = document.getElementById("Type").value;

        // Get the DataTable instance
        var table = $("#TypeTable").DataTable();

        // Add the new row to the DataTable
        table.row.add([divisi, kelut, kelompok, subKelompok, type]).draw();
    }

    // Add an event listener to the "Tambah" button
    var tambahButton = document.getElementById("tambahButton");
    tambahButton.addEventListener("click", function (event) {
        event.preventDefault();
        const idtype = document.getElementById("id_Type").value;
        const divisi = document.getElementById("IdDivisi").value;

        const data = {
            idtype: idtype,
            divisi: divisi,
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Schedule");
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
            form.appendChild(input);
        }

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
    });

    // tambahButton.addEventListener("click", function (event) {
    //     event.preventDefault();
    //     addDataToTable();
    // });

    $("#DeleteButton").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        const divisi = document.getElementById("IdDivisi").value;
        // console.log(selectedRows);
        var idsToDelete = [];
        selectedRows.forEach((data) => {
            var idType = data[0].split(" / ")[1]; // Mengambil bagian di sebelah kanan dari "/"
            console.log(idType);

            idsToDelete.push(idType+"."+divisi); // Assuming ID is in the first column


            if (idsToDelete.length === 0) {
                alert("No rows selected for deletion.");
                return;
            }


                // $.ajax({
                //     url: "Schedule/destroySelected", // Menggunakan named route
                //     method: "POST",
                //     data: { ids: idsToDelete },
                //     success: function (response) {
                //         // Tangani respons sukses jika diperlukan
                //         console.log("Data berhasil dihapus:", response);

                //         // Refresh DataTable untuk memperbarui tampilan
                //         $("#TypeTable").DataTable().ajax.reload();

                //         alert("Baris yang dipilih berhasil dihapus.");
                //     },
                //     error: function (error) {
                //         console.error("Error:", error);
                //         alert("Terjadi kesalahan saat menghapus baris yang dipilih.");
                //     }
                // });
                const formContainer = document.getElementById("form-container");
                const form = document.createElement("form");
                form.setAttribute("action", "Schedule/{idType}");
                form.setAttribute("method", "POST");

                // Loop through the data object and add hidden input fields to the form
                for (const key in idsToDelete) {
                    const input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", key);
                    input.value = idsToDelete[key]; // Set the value of the input field to the corresponding data
                    form.appendChild(input);
                }

                const method = document.createElement("input");
                method.setAttribute("type", "hidden");
                method.setAttribute("name", '_method');
                method.value = 'DELETE'; // Set the value of the input field to the corresponding data
                form.appendChild(method);


                // Add CSRF token input field (assuming the csrfToken is properly fetched)
                let csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                let csrfInput = document.createElement("input");
                csrfInput.type = "hidden";
                csrfInput.name = "_token";
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
                formContainer.appendChild(form);
                form.submit();

        });
    });

});
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    const IdDiv = document.getElementById("IdDivisi").value;
    var modal = document.getElementById("myModal1");
    fetch("/Schedule/" + IdDiv + ".getKelut")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableKelut").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdKelompokUtama, item.NamaKelompokUtama];
                $("#TableKelut").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableKelut").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    const IdKelut = document.getElementById("id_Kelut").value;
    var modal = document.getElementById("myModal2");
    fetch("/Schedule/" + IdKelut + ".getKelompok")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.idkelompok, item.namakelompok];
                $("#TableKelompok").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById("myModal2");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal3() {
    const IdKelompok = document.getElementById("id_Kelompok").value;
    var modal = document.getElementById("myModal3");
    fetch("/Schedule/" + IdKelompok + ".getSubKelompok")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableSubKelompok").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdSubkelompok, item.NamaSubKelompok];
                $("#TableSubKelompok").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableSubKelompok").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal3() {
    var modal = document.getElementById("myModal3");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal4() {
    const IdSubKelompok = document.getElementById("id_SubKelompok").value;
    var modal = document.getElementById("myModal4");
    fetch("/Schedule/" + IdSubKelompok + ".getType")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)

            // Clear the existing table rows
            $("#TableType").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdType, item.NamaType];
                $("#TableType").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableType").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal4() {
    var modal = document.getElementById("myModal4");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function checkInputsFilled() {
    var allInputsFilled = true;

    // Ganti bagian berikut dengan selektor input yang sesuai
    var inputElements = document.querySelectorAll('input[type="text"]');

    inputElements.forEach(function (input) {
        if (input.value.trim() === '') {
            allInputsFilled = false;
            return;
        }
    });

    return allInputsFilled;
}

// document.addEventListener('DOMContentLoaded', function() {
//     var buttonDivisi = document.getElementById('ButtonDivisi');
//     // Ganti dengan tombol-tombol lain yang ingin Anda atur

//     var inputElements = document.querySelectorAll('input[type="text"]');
//     inputElements.forEach(function(input) {
//         input.addEventListener('input', function() {
//             if (checkInputsFilled()) {
//                 buttonDivisi.removeAttribute('disabled');
//                 // Aktifkan tombol-tombol lain yang sesuai
//             } else {
//                 buttonDivisi.setAttribute('disabled', 'disabled');
//                 // Nonaktifkan tombol-tombol lain yang sesuai
//             }
//         });
//     });
// });

// document.addEventListener('DOMContentLoaded', function() {
//     var inputElements = document.querySelectorAll('input[type="text"]');
//     var buttons = [
//         document.getElementById('ButtonDivisi'), // Tanpa tanda petik di sekitar ini
//         document.getElementById('ButtonKelut'),
//         document.getElementById('ButtonKelompok'),
//         document.getElementById('ButtonSubKelompok'),
//         document.getElementById('ButtonType')
//     ];

//     inputElements.forEach(function(input) {
//         input.addEventListener('input', function() {
//             var allInputsFilled = true;

//             inputElements.forEach(function(input) {
//                 if (input.value.trim() === '') {
//                     allInputsFilled = false;
//                     return;
//                 }
//             });

//             buttons.forEach(function(button) {
//                 if (allInputsFilled) {
//                     button.removeAttribute('disabled');
//                 } else {
//                     button.setAttribute('disabled', 'disabled');
//                 }
//             });
//         });
//     });
// });

$("#tambahButton").on("click", function (event) {
    event.preventDefault();

    // Extract data from input fields
    var type = document.getElementById("Type").value;

    // Check if the same type already exists in the table
    var table = $("#TypeTable").DataTable();
    var existingType = table.rows().data().toArray().some(row => row[4] === type);

    if (existingType) {
        alert("Data dengan jenis yang sama sudah ada dalam tabel!");
        return;
    }

    // Continue with the rest of your code to add the data
    // ...
});

// $(document).ready(function () {
//     $("#DeleteButton").on("click", function () {
//         var selectedRows = $("#TypeTable").DataTable().rows(".selected").data();
//         var idsToDelete = [];

//         selectedRows.each(function (rowData) {
//             idsToDelete.push(rowData[0]); // Assuming ID is in the first column
//         });

//         if (idsToDelete.length === 0) {
//             alert("No rows selected for deletion.");
//             return;
//         }

//         if (confirm("Anda yakin ingin menghapus baris yang dipilih?")) {
//             $.ajax({
//                 url: "{{ route('Schedule.destroySelected') }}", // Menggunakan named route
//                 method: "POST",
//                 data: { ids: idsToDelete },
//                 success: function (response) {
//                     // Tangani respons sukses jika diperlukan
//                     console.log("Data berhasil dihapus:", response);

//                     // Refresh DataTable untuk memperbarui tampilan
//                     $("#TypeTable").DataTable().ajax.reload();

//                     alert("Baris yang dipilih berhasil dihapus.");
//                 },
//                 error: function (error) {
//                     console.error("Error:", error);
//                     alert("Terjadi kesalahan saat menghapus baris yang dipilih.");
//                 }
//             });
//         }
//     });
// });

// hapusButton.addEventListener("click", function (event) {
//         event.preventDefault();
//         const idklinik = document.getElementById("Id_Klinik").value;

//         const data = {
//             idklinik: idklinik,
//         };

//         const formContainer = document.getElementById("form-container");
//         const form = document.createElement("form");
//         form.setAttribute("action", "MasterKlinik/{idklinik}" );
//         form.setAttribute("method", "POST");

//         // Loop through the data object and add hidden input fields to the form
//         for (const key in data) {
//             const input = document.createElement("input");
//             input.setAttribute("type", "hidden");
//             input.setAttribute("name", key);
//             input.value = data[key]; // Set the value of the input field to the corresponding data
//             form.appendChild(input);
//         }

//         // Create method input with "PUT" Value
//         const method = document.createElement("input");
//         method.setAttribute("type", "hidden");
//         method.setAttribute("name", "_method");
//         method.value = "DELETE"; // Set the value of the input field to the corresponding data
//         form.appendChild(method);

//         formContainer.appendChild(form);

//         // Add CSRF token input field (assuming the csrfToken is properly fetched)
//         let csrfToken = document
//             .querySelector('meta[name="csrf-token"]')
//             .getAttribute("content");
//         let csrfInput = document.createElement("input");
//         csrfInput.type = "hidden";
//         csrfInput.name = "_token";
//         csrfInput.value = csrfToken;
//         form.appendChild(csrfInput);

//         // Wrap form submission in a Promise
//         function submitForm() {
//             return new Promise((resolve, reject) => {
//                 form.onsubmit = resolve; // Resolve the Promise when the form is submitted
//                 form.submit();
//             });
//         }

//         // Call the submitForm function to initiate the form submission
//         submitForm()
//             .then(() => console.log("Form submitted successfully!"))
//             .catch((error) => console.error("Form submission error:", error));
//     });
