// // Click event handler for table rows
$('#tabel_notransaksi tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var IDLOG = $(this).data('IDLOG');
    // var idbrng = $(this).data('idbrng');
console.log(GrupMesinOrder);
    // Populate the form fields with the data
    $('#no-transaksi').val(IDLOG);
});



const ldtransaksi = document.getElementById('ld-transaksi')


ldtransaksi.addEventListener("click", function () {
    var tanggal = document.getElementById('tanggal');
    fetch("/HslPrdPrs/" + tanggal.value + ".dataTransaksi")
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
            $("#tabel_notransaksi").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.GrupMesinOrder, item.IDLOG];
                $("#tabel_notransaksi").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#tabel_notransaksi").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

document.addEventListener("DOMContentLoaded", function() {
var addButton = document.getElementById("addButton");
var saveButton = document.getElementById("saveButton");
var cancelButton = document.getElementById("cancelButton");
var updateButton = document.getElementById("updateButton");
var deleteButton = document.getElementById("deleteButton");
var inputElements = document.querySelectorAll("input[readonly]");
var selectElement = document.getElementById("grup-pelaksana-dropdown");
var buttonprimary = document.getElementsByClassName("btn-primary");
var button_noordkrj = document.getElementById("button_noordkrj");
var ld_transaksi = document.getElementById("ld-transaksi");
var button_msnprdk = document.getElementById("button_msnprdk");


function toggleInputEditing(enable) {
    inputElements.forEach(function(input) {
        input.readOnly = !enable;
    });
    selectElement.disabled = !enable;
    button_noordkrj.disabled = !enable;
    ld_transaksi.disabled = !enable;
    button_msnprdk.disabled = !enable;

}

// Initialize the form with inputs and buttons disabled
toggleInputEditing(false);

addButton.addEventListener("click", function() {
    var isEditing = (addButton.textContent === "Add");
    toggleInputEditing(isEditing);

    if (isEditing) {
        addButton.style.display = "none";
        saveButton.style.display = "block"; // Display the Save button
        updateButton.style.display = "none";
        cancelButton.style.display = "block";// Disable the Update button
        deleteButton.disabled = true; // Disable the Delete button
    } else {
        addButton.style.display = "block";
        saveButton.style.display = "none"; // Hide the Save button
        updateButton.style.display = "block";
        cancelButton.style.display = "none";
        deleteButton.disabled = false; // Enable the Delete button
        // Reset form values if needed
    }
});

updateButton.addEventListener("click", function() {
    var isEditing = (addButton.textContent === "Add");
    toggleInputEditing(isEditing);

    if (isEditing) {
        addButton.style.display = "none";
        saveButton.style.display = "block"; // Display the Save button
        updateButton.style.display = "none";
        cancelButton.style.display = "block";// Disable the Update button
        deleteButton.disabled = true; // Disable the Delete button
    } else {
        addButton.style.display = "block";
        saveButton.style.display = "none"; // Hide the Save button
        updateButton.style.display = "block";
        cancelButton.style.display = "none";
        deleteButton.disabled = false; // Enable the Delete button
        // Reset form values if needed
    }
});

deleteButton.addEventListener("click", function() {
    var isEditing = (addButton.textContent === "Add");
    toggleInputEditing(isEditing);

    if (isEditing) {
        addButton.style.display = "none";
        saveButton.style.display = "block"; // Display the Save button
        updateButton.style.display = "none";
        cancelButton.style.display = "block";// Disable the Update button
        deleteButton.disabled = true; // Disable the Delete button
    } else {
        addButton.style.display = "block";
        saveButton.style.display = "none"; // Hide the Save button
        updateButton.style.display = "block";
        cancelButton.style.display = "none";
        deleteButton.disabled = false; // Enable the Delete button
        // Reset form values if needed
    }
});

// Button.addEventListener("click", function() {
//     var isEditing = (addButton.textContent === "Add");
//     toggleInputEditing(isEditing);

//     if (isEditing) {
//         addButton.style.display = "none";
//         saveButton.style.display = "block"; // Display the Save button
//         updateButton.disabled = true; // Disable the Update button
//         deleteButton.disabled = true; // Disable the Delete button
//     } else {
//         addButton.style.display = "block";
//         saveButton.style.display = "none"; // Hide the Save button
//         updateButton.disabled = false; // Enable the Update button
//         deleteButton.disabled = false; // Enable the Delete button
//         // Reset form values if needed
//     }
// });

// Add click event listener to the "Save" button
saveButton.addEventListener("click", function() {
    toggleInputEditing(false);
    addButton.style.display = "block";
    saveButton.style.display = "none"; // Hide the Save button
    updateButton.style.display = "block";
    cancelButton.style.display = "none";// Disable the Update button
    deleteButton.disabled = false; // Disable the Delete button
});

cancelButton.addEventListener("click", function() {
    toggleInputEditing(false);
    addButton.style.display = "block";
    saveButton.style.display = "none"; // Hide the Save button
    updateButton.style.display = "block";
    cancelButton.style.display = "none";// Disable the Update button
    deleteButton.disabled = false; // Disable the Delete button
});

});

// // Click event handler for table rows
$('#tabel_notransaksi tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var IDLOG = $(this).data('IDLOG');
    // var idbrng = $(this).data('idbrng');
console.log(GrupMesinOrder);
    // Populate the form fields with the data
    $('#no-transaksi').val(IDLOG);
});
$('#tbl_noordkrj tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var NAMA_BRG = $(this).data('NAMA_BRG');
    var No_Order = $(this).data('No_Order');
    // var idbrng = $(this).data('idbrng');

    // Populate the form fields with the data
    $('#NAMA_BRG').val(NAMA_BRG);
    $('#No_Order').val(No_Order);
});
