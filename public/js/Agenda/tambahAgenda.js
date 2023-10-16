$(document).ready(function () {
    const pegawaiButton = document.getElementById("pegawaiButton");
    $("#tabel_Agenda").DataTable({
        order: [[0, "asc"]],
        scrollX: true,
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    const selectElement = document.getElementById("DivisiSelect");

    selectElement.addEventListener("change", function () {
        const selectedValue = selectElement.value;
        fetch("/ProgramPayroll/TambahAgenda/" + selectedValue + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Pegawai").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Kd_Pegawai, item.Nama_Peg];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        console.log("Selected value:", selectedValue);
        // Lakukan apa pun yang perlu Anda lakukan dengan nilai yang terpilih
    });
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_Peg").val(rowData[0]);
        const tanggal = document.getElementById("TglAgenda");
        fetch(
            "/ProgramPayroll/TambahAgenda/" +
                rowData[0] +
                "." +
                tanggal.value +
                ".getAgendaPegawai"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Agenda").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        item.Jam_Masuk,
                        item.Jam_Keluar,
                        item.awal_jam_istirahat,
                        item.akhir_jam_istirahat,
                        item.Ket_Absensi,
                        item.id_agenda,
                    ];
                    $("#tabel_Agenda").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Agenda").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalPegawai();
    });
});
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("opsi1").addEventListener("change", function () {
        if (this.checked) {
            document.getElementById("containerPerorangan").hidden = false;
            document.getElementById("containerDivisi").hidden = true;
        } else {
            document.getElementById("containerPerorangan").hidden = true;
        }
    });
    document.getElementById("opsi2").addEventListener("change", function () {
        if (this.checked) {
            document.getElementById("containerDivisi").hidden = false;
            document.getElementById("containerPerorangan").hidden = true;
        } else {
            document.getElementById("containerDivisi").hidden = true;
        }
    });
});
$(document).ready(function () {
    var table = $("#tabel_Divisi").DataTable({
        select: {
            style: "multi",
        },
    });

    $("#tabel_Divisi tbody").on("click", "tr", function () {
        $(this).toggleClass("selected");
    });
    $("#buttonDivisiSelectAll").click(function () {
        table.rows().select();
    });
    $("#buttonInsert").click(function (event) {
        event.preventDefault();
        var selectedRows = table.rows(".selected").data();
        const data = [];
        const tanggal = document.getElementById("TglAgenda").value;
        const mLembur = document.getElementById("masukLembur").value;
        const pLembur = document.getElementById("pulangLembur").value;
        const awIstirahat = document.getElementById("AwalIstirahat").value;
        const akIstirahat = document.getElementById("AkhirIstirahat").value;
        if (!tanggal || !mLembur || !pLembur || !awIstirahat || !akIstirahat) {
            alert("Masih ada form yang kosong !");
            return; // Stop executing the function
        }
        const masukLembur =
            tanggal + " " + document.getElementById("masukLembur").value;
        const pulangLembur =
            tanggal + " " + document.getElementById("pulangLembur").value;
        const AwalIstirahat =
            tanggal + " " + document.getElementById("AwalIstirahat").value;
        const AkhirIstirahat =
            tanggal + " " + document.getElementById("AkhirIstirahat").value;
        const ketLembur = document.getElementById("ketLembur").value;
        console.log(tanggal);
        console.log(masukLembur);
        console.log(pulangLembur);
        console.log(AwalIstirahat);
        console.log(AkhirIstirahat);
        selectedRows.each(function (rowData) {
            // var dataGabung = rowData[0] + "." + rowData[1];
            // data.push(dataGabung);
            fetch("/ProgramPayroll/TambahAgenda/" + rowData[0] + ".getPegawaiDivisiShift")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((dataFetch) => {
                    // Handle the data retrieved from the server (data should be an object or an array)

                    // Clear the existing table rows
                    // $("#table_Pegawai").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    dataFetch.forEach((item) => {
                        var row = [item.Kd_Pegawai];
                        // $("#table_Pegawai").DataTable().row.add(row);
                        console.log(row);
                        fetch(
                            "/TambahAgenda/" +
                                item.Kd_Pegawai +
                                "." +
                                tanggal +
                                ".getShiftPegawai"
                        )
                            .then((response) => {
                                if (!response.ok) {
                                    throw new Error(
                                        "Network response was not ok"
                                    );
                                }
                                return response.json(); // Assuming the response is in JSON format
                            })
                            .then((dataFetch) => {
                                // Handle the data retrieved from the server (data should be an object or an array)

                                // Clear the existing table rows
                                // $("#table_Pegawai").DataTable().clear().draw();

                                // Loop through the data and create table rows
                                dataFetch.forEach((item) => {
                                    const dataGabung =
                                        item.Kd_Pegawai +
                                        "." +
                                        tanggal +
                                        "." +
                                        masukLembur +
                                        "." +
                                        pulangLembur +
                                        "." +
                                        AwalIstirahat +
                                        "." +
                                        AkhirIstirahat +
                                        "." +
                                        ketLembur;
                                    data.push(dataGabung);
                                    const formContainer =
                                        document.getElementById(
                                            "form-container"
                                        );
                                    const form = document.createElement("form");
                                    form.setAttribute("action", "TambahAgenda");
                                    form.setAttribute("method", "POST");

                                    // Loop through the data object and add hidden input fields to the form
                                    for (const key in data) {
                                        const input =
                                            document.createElement("input");
                                        input.setAttribute("type", "hidden");
                                        input.setAttribute("name", key);
                                        input.value = data[key]; // Set the value of the input field to the corresponding data
                                        form.appendChild(input);
                                    }

                                    formContainer.appendChild(form);

                                    // Add CSRF token input field (assuming the csrfToken is properly fetched)
                                    let csrfToken = document
                                        .querySelector(
                                            'meta[name="csrf-token"]'
                                        )
                                        .getAttribute("content");
                                    let csrfInput =
                                        document.createElement("input");
                                    csrfInput.type = "hidden";
                                    csrfInput.name = "_token";
                                    csrfInput.value = csrfToken;
                                    form.appendChild(csrfInput);

                                    // Wrap form submission in a Promise
                                    function submitForm() {
                                        return new Promise(
                                            (resolve, reject) => {
                                                form.onsubmit = resolve; // Resolve the Promise when the form is submitted
                                                form.submit();
                                            }
                                        );
                                    }

                                    // Call the submitForm function to initiate the form submission
                                    submitForm()
                                        .then(() =>
                                            console.log(
                                                "Form submitted successfully!"
                                            )
                                        )
                                        .catch((error) =>
                                            console.error(
                                                "Form submission error:",
                                                error
                                            )
                                        );
                                });

                                // Redraw the table to show the changes
                                // $("#table_Pegawai").DataTable().draw();
                            })
                            .catch((error) => {
                                console.error("Error:", error);
                            });
                    });

                    // Redraw the table to show the changes
                    // $("#table_Pegawai").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });

        console.log(data);
    });
});

function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
