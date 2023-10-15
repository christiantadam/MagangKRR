//--------------------------------------------------------------------------------------//

document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("addButton");
    var saveButton = document.getElementById("saveButton");
    var cancelButton = document.getElementById("cancelButton");
    var updateButton = document.getElementById("updateButton");
    var deleteButton = document.getElementById("deleteButton");
    var inputElements = document.querySelectorAll("input[readonly]");
    var buttonElements = document.querySelectorAll("button[disabled]");
    var buttonprimary = document.getElementsByClassName("btn-primary");
    // var ld_transaksi = document.getElementById("ld-transaksi");
    var btn_inputNoOrder = document.getElementById("btn_inputNoOrder");


    function toggleInputEditing(enable) {
        inputElements.forEach(function (input) {
            input.readOnly = !enable;
        });
        buttonElements.forEach(function (button) {
            button.disabled = !enable;
        });
        // button_noordkrj.disabled = !enable;
        // ld_transaksi.disabled = !enable;
        // btn_inputNoOrder.disabled = !disabled;
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
            btn_inputNoOrder.disabled = true;
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

        // toggleInputEditing(false);
        // var Tanggal = document.getElementById('tanggal').value;
        // var kode = 1;
        // var IDLOG = document.getElementById('no-transaksi').value;
        // var No_Order = document.getElementById('noorder').value;
        // var IDMESIN = document.getElementById('kdmesin').value;
        // var selectElement = document.getElementById("grup-pelaksana-dropdown");
        // var selectedOption = selectElement.options[selectElement.selectedIndex];
        // var Group = selectedOption.textContent;
        // var AWALSHIFT = document.getElementById('jammulai').value;
        // var AKHIRSHIFT = document.getElementById('jamakhir').value;
        // var JMLPRIMER = document.getElementById('jml-ball').value;
        // var JMLSEKUNDER = document.getElementById('no-transaksi').value;
        // var JMLTRITIER = document.getElementById('jml-lembar').value;


        // if (kodeSave == 1) {
        //     let data = {
        //         Tanggal: Tanggal,
        //         kode: kodeSave,
        //         No_Order: No_Order,
        //         IDMESIN: IDMESIN,
        //         Group: Group,
        //         AWALSHIFT: AWALSHIFT,
        //         AKHIRSHIFT: AKHIRSHIFT,
        //         JMLPRIMER: JMLPRIMER,
        //         JMLSEKUNDER: JMLSEKUNDER,
        //         JMLTRITIER: JMLTRITIER,
        //     };


        //     console.log(data);

        //     const formContainer = document.getElementById("form-container");
        //     const form = document.createElement("form");
        //     form.setAttribute("action", "HslPrdPrs");
        //     form.setAttribute("method", "POST");

        //     // Loop through the data object and add hidden input fields to the form
        //     for (const key in data) {
        //         const input = document.createElement("input");
        //         input.setAttribute("type", "hidden");
        //         input.setAttribute("name", key);
        //         input.value = data[key]; // Set the value of the input field to the corresponding data
        //         form.appendChild(input);
        //     }

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


        // } else if (kodeSave == 2) {

        //     let data = {
        //         Tanggal: Tanggal,
        //         kode: kodeSave,
        //         IDLOG: IDLOG,
        //         No_Order: No_Order,
        //         IDMESIN: IDMESIN,
        //         Group: Group,
        //         AWALSHIFT: AWALSHIFT,
        //         AKHIRSHIFT: AKHIRSHIFT,
        //         JMLPRIMER: JMLPRIMER,
        //         JMLSEKUNDER: JMLSEKUNDER,
        //         JMLTRITIER: JMLTRITIER,
        //     };
        //     console.log(data);

        //     const formContainer = document.getElementById("form-container");
        //     const form = document.createElement("form");
        //     form.setAttribute("action", "HslPrdPrs/{IDLOG}");
        //     form.setAttribute("method", "POST");

        //     // Loop through the data object and add hidden input fields to the form
        //     for (const key in data) {
        //         const input = document.createElement("input");
        //         input.setAttribute("type", "hidden");
        //         input.setAttribute("name", key);
        //         input.value = data[key]; // Set the value of the input field to the corresponding data
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
        //     ifUpdate.value = "Update Hasil Produksi"; // Set the value of the input field to the corresponding data
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
        // } else if (kodeSave == 3) {
        //     let data = {
        //         Tanggal: Tanggal,
        //         kode: kodeSave,
        //         IDLOG: IDLOG,
        //         No_Order: No_Order,
        //         IDMESIN: IDMESIN,
        //         Group: Group,
        //         AWALSHIFT: AWALSHIFT,
        //         AKHIRSHIFT: AKHIRSHIFT,
        //         JMLPRIMER: JMLPRIMER,
        //         JMLSEKUNDER: JMLSEKUNDER,
        //         JMLTRITIER: JMLTRITIER,
        //     };
        //     const formContainer = document.getElementById("form-container");
        //     const form = document.createElement("form");
        //     form.setAttribute("action", "HslPrdPrs/{IDLOG}");
        //     form.setAttribute("method", "POST");

        //     // Loop through the data object and add hidden input fields to the form
        //     for (const key in data) {
        //         const input = document.createElement("input");
        //         input.setAttribute("type", "hidden");
        //         input.setAttribute("name", key);
        //         input.value = data[key]; // Set the value of the input field to the corresponding data
        //         form.appendChild(input);
        //     }

        //     // Create method input with "PUT" Value
        //     const method = document.createElement("input");
        //     method.setAttribute("type", "hidden");
        //     method.setAttribute("name", "_method");
        //     method.value = "DELETE"; // Set the value of the input field to the corresponding data
        //     form.appendChild(method);

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
