$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TypeTable').DataTable({
        order: [
            [0, 'desc']
        ],
        select: {
            style: "single",
        },
    });
});

function prosesData() {
    // Get all selected rows in the DataTable
    var selectedRows = $("#TypeTable").DataTable().rows(".selected").data().toArray();

    if (selectedRows.length === 0) {
        // If no rows are selected, show a warning and return
        alert("Pilih setidaknya satu baris sebelum melanjutkan.");
        return;
    }

    var confirmDelete = confirm("Anda yakin ingin menghapus data terpilih?");

    if (confirmDelete) {
        // If the user confirms deletion, loop through selected rows
        selectedRows.forEach(function (rowData) {
            const data = {
                kodebarang: rowData[4],
                noindeks: rowData[5],
                userid: '4384',
            };

            // Create a form for each selected row
            const form = document.createElement("form");
            form.setAttribute("action", "BatalKirim/" + data.kodebarang);
            form.setAttribute("method", "POST");

            // Loop through the data object and add hidden input fields to the form
            for (const key in data) {
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", key);
                input.value = data[key];
                form.appendChild(input);
            }

            // Add CSRF token input field
            let csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);

            // Add method input field
            const method = document.createElement("input");
            method.setAttribute("type", "hidden");
            method.setAttribute("name", "_method");
            method.value = "PUT";
            form.appendChild(method);

            // Append the form to the document and submit it
            document.body.appendChild(form);
            form.submit();
        });

        // After all forms are submitted, you can perform any additional actions if needed
        console.log("All selected rows deleted.");
    }
}
