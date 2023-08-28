$(document).ready(function () {
    const checkbox = document.getElementById("pegawaiSelectAll");
    var checkedRowsData = [];
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "desc"]],
    });
    $("#table_ShiftNew").DataTable({
        order: [[0, "asc"]],
    });
    var table = $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
    });
    var tables = $("#table_Shift").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
    });
    $("#table_ShiftNew tbody").on("click", "tr", function () {
        var rowData = $("#table_ShiftNew").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Shift_Baru").val(rowData[0]);
        // $("#Nama_Div").val(rowData[1]);
        hideModalShift();
    });

    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        $(this).toggleClass("selected");
    });

    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        const tanggal = document.getElementById("TglAgenda");
        fetch("/KoreksiShift/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Pegawai").DataTable().clear().draw();
                var rowAll = ["ALL", "ALL"];
                $("#table_Pegawai").DataTable().row.add(rowAll);
                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Kd_Pegawai, item.Nama_Peg];
                    $("#table_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_Pegawai").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);
        console.log(jQuery().jquery);
        hideModalPegawai();
    });
    $("#lihatData").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        // console.log(selectedRows);
        const tanggal1 = document.getElementById("tanggal1").value;
        const tanggal2 = document.getElementById("tanggal2").value;
        var Kd_Peg = document.getElementById("Kd_Pegawai").value;
        const Kd_Div = document.getElementById("Id_Div").value;

        if ((Kd_Peg = "ALL")) {
            const gabung = Kd_Div + "." + tanggal1 + "." + tanggal2;
            fetch("/KoreksiShift/" + gabung + ".getShiftAll")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    $("#table_Shift").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var row = [
                            `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                                " " +
                                item.Kd_Pegawai,
                            item.Tanggal,
                            item.Jam_Masuk,
                            item.Jam_Keluar,
                            item.Jml_Jam,
                            item.awal_jam_istirahat,
                            item.akhir_jam_istirahat,
                            item.Ket_Absensi,
                        ];
                        $("#table_Shift").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#table_Shift").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
    $("#selectAll").on("click", function () {
        // Get all checkboxes in the DataTable
        var checkboxes = $("#table_Shift tbody").find("input[type='checkbox']");

        // Set the checked state of all checkboxes based on the "Select All" checkbox
        checkboxes.prop("checked", this.checked);
    });

    // When any individual checkbox in the table is clicked
    $("#table_Shift").on("click", "input[name='selectRow']", function () {
        var allCheckboxes = $("#table_Shift tbody").find(
            "input[type='checkbox']"
        );

        // If any checkbox is unchecked, uncheck the "Select All" checkbox
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
        // If all checkboxes are checked, check the "Select All" checkbox
        else if (
            allCheckboxes.length === allCheckboxes.filter(":checked").length
        ) {
            $("#selectAll").prop("checked", true);
        }
    });
    $("#table_Shift").on("change", "input[name='selectRow']", function () {
        var checkboxValue = $(this).val(); // Get the value from the checkbox
        var rowData = $(this)
            .closest("tr")
            .find("td:not(:first)")
            .map(function () {
                return $(this).text();
            })
            .get();

        var existingIndex = checkedRowsData.findIndex(function (item) {
            return item[0] === checkboxValue;
        });

        if (this.checked) {
            if (existingIndex === -1) {
                checkedRowsData.push([checkboxValue, ...rowData]);
            }
        } else {
            if (existingIndex !== -1) {
                checkedRowsData.splice(existingIndex, 1);
            }
        }
    });
    $("#saveButton").on("click", function () {
        const data = [];
        // Now 'selectedRowsData' array contains the data from the checked rows
        const checkedCheckboxes = $(
            "#table_Shift tbody input[type=checkbox]:checked"
        );
        // console.log(checkedRowsData);
        checkedCheckboxes.each(function () {
            const row = $(this).closest("tr");
            const rowData = tables.row(row).data();
            const rowDataValue = rowData[0];

            // Membuat elemen HTML sementara untuk memproses string
            const tempElement = document.createElement("div");
            tempElement.innerHTML = rowDataValue;

            // Mendapatkan nilai dari atribut value elemen checkbox
            const checkboxValue = tempElement
                .querySelector("input[type='checkbox']")
                .getAttribute("value");

            // Menghapus elemen HTML sementara
            tempElement.remove();

            console.log(
                checkboxValue+
                    "." +
                    rowData[1] +
                    "." +
                    rowData[2] +
                    "." +
                    rowData[3] +
                    "." +
                    rowData[4] +
                    "." +
                    rowData[5] +
                    "." +
                    rowData[6] +
                    "." +
                    rowData[7]
            );
            // console.log(data[0]+"."+data[1]+"."+data[2]+"."+data[3]+"."+data[4]+"."+data[5]+"."+data[6]+"."+data[7]);
            // const dataGabung = data[0]+"."+data[1]+"."+data[2]+"."+data[3]+"."+data[4]+"."+data[5]+"."+data[6]+"."+data[7];
            // data.push(dataGabung);
            // const formContainer = document.getElementById("form-container");
            // const form = document.createElement("form");
            // form.setAttribute("action", "KoreksiShift/{data[0]}");
            // form.setAttribute("method", "POST");

            // // Loop through the data object and add hidden input fields to the form
            // for (const key in data) {
            //     const input = document.createElement("input");
            //     input.setAttribute("type", "hidden");
            //     input.setAttribute("name", key);
            //     input.value = data[key]; // Set the value of the input field to the corresponding data
            //     form.appendChild(input);
            // }
            // // Create method input with "PUT" Value
            // const method = document.createElement("input");
            // method.setAttribute("type", "hidden");
            // method.setAttribute("name", "_method");
            // method.value = "PUT"; // Set the value of the input field to the corresponding data
            // form.appendChild(method);

            // // Create input with "Update Keluarga" Value
            // const ifUpdate = document.createElement("input");
            // ifUpdate.setAttribute("type", "hidden");
            // ifUpdate.setAttribute("name", "_ifUpdate");
            // ifUpdate.value = "Update Shift"; // Set the value of the input field to the corresponding data
            // form.appendChild(ifUpdate);

            // formContainer.appendChild(form);

            // // Add CSRF token input field (assuming the csrfToken is properly fetched)
            // let csrfToken = document
            //     .querySelector('meta[name="csrf-token"]')
            //     .getAttribute("content");
            // let csrfInput = document.createElement("input");
            // csrfInput.type = "hidden";
            // csrfInput.name = "_token";
            // csrfInput.value = csrfToken;
            // form.appendChild(csrfInput);

            // // Wrap form submission in a Promise
            // function submitForm() {
            //     return new Promise((resolve, reject) => {
            //         form.onsubmit = resolve; // Resolve the Promise when the form is submitted
            //         form.submit();
            //     });
            // }

            // // Call the submitForm function to initiate the form submission
            // submitForm()
            //     .then(() => console.log("Form submitted successfully!"))
            //     .catch((error) =>
            //         console.error("Form submission error:", error)
            //     );
            // Lakukan operasi lain pada data, jika diperlukan
        });
        // You can send this data to the server or perform any other actions
    });

    $("#buttonUpdate").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        // console.log(selectedRows);
        selectedRows.forEach((data) => {
            console.log(data[0]);
            // Lakukan operasi lain pada data, jika diperlukan
        });
    });
});
function showModalDivisi() {
    $("#modalDivisi").modal("show");
}
function hideModalDivisi() {
    $("#modalDivisi").modal("hide");
}
function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
function showModalShift() {
    $("#modalShift").modal("show");
}
function hideModalShift() {
    $("#modalShift").modal("hide");
}
