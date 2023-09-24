//--------------------------------------------------------------------------------------//

document.addEventListener("DOMContentLoaded", function () {
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
        inputElements.forEach(function (input) {
            input.readOnly = !enable;
        });
        selectElement.disabled = !enable;
        button_noordkrj.disabled = !enable;
        ld_transaksi.disabled = !enable;
        button_msnprdk.disabled = !enable;

    }

    // Initialize the form with inputs and buttons disabled
    toggleInputEditing(false);

    addButton.addEventListener("click", function () {
        var isEditing = (addButton.textContent === "Add");
        kodeSave = 1;

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

    updateButton.addEventListener("click", function () {
        var isEditing = (addButton.textContent === "Add");
        kodeSave = 2;

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

    deleteButton.addEventListener("click", function () {
        kodeSave = 3;
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


    // Add click event listener to the "Save" button
    saveButton.addEventListener("click", function () {

        addButton.style.display = "block";
        saveButton.style.display = "none"; // Hide the Save button
        updateButton.style.display = "block";
        cancelButton.style.display = "none";// Disable the Update button
        deleteButton.disabled = false; // Disable the Delete button
    });

    cancelButton.addEventListener("click", function () {
        toggleInputEditing(false);
        addButton.style.display = "block";
        saveButton.style.display = "none"; // Hide the Save button
        updateButton.style.display = "block";
        cancelButton.style.display = "none";// Disable the Update button
        deleteButton.disabled = false; // Disable the Delete button
    });

});
