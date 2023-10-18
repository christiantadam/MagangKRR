$(document).ready(function () {
    const cekSemua = document.getElementById("cekSemua");
    const cekPilih = document.getElementById("cekPilih");
    const selectDivisi = document.getElementById("divisi");
    const namaDivisi = document.getElementById("namaDivisi");
    const buttonNomor = document.getElementById("buttonNomor");
    $("#table_Nomor").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    buttonNomor.addEventListener("click", function () {
        console.log("Masuk jir");
        fetch("/GantiShift/Aturan1_3/" + ".getDataNomor")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Nomor").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                        item.Id_Div,
                    ];
                    $("#table_Nomor").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Nomor").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        showModalNomor();
    });
    function prosesShift() {
        var mindate = document.getElementById("TglAwal").value;
        var maxdate = document.getElementById("TglAkhir").value;
        var cekPilihChecked = document.getElementById("cekPilih").checked;
        var cekSemuaChecked = document.getElementById("cekSemua").checked;
        let data = [];
        if (cekPilihChecked) {
            var selectElement = document.getElementById("divisi");
            // Mendapatkan indeks opsi terpilih
            var selectedIndex = selectElement.selectedIndex;

            var selectedIdDiv = selectElement.options[selectedIndex].text;
            console.log(selectedIdDiv);
            return;
            data = {
                mindate: mindate,
                maxdate: maxdate,
                id_Div: selectedIdDiv,
                opsi: 0,
            };
        } else if (cekSemuaChecked) {
            data = {
                mindate: mindate,
                maxdate: maxdate,
                opsi: 1,
            };
        }

        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Aturan1_3");
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
    }
    selectDivisi.addEventListener("change", function () {
        // Mengambil nilai yang dipilih dari select
        var selectedValue =
            selectDivisi.options[selectDivisi.selectedIndex].value;

        // Mengisikan nilai ke input
        namaDivisi.value = selectedValue;
    });
    cekSemua.addEventListener("change", () => {
        if (cekSemua.checked) {
            selectDivisi.disabled = true;
            namaDivisi.disabled = true;
        }
    });

    cekPilih.addEventListener("change", () => {
        if (cekPilih.checked) {
            selectDivisi.disabled = false;

        }
    });

    $("#table_Nomor tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Nomor").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#kd_Pegawai").val(rowData[0]);
        $("#namaDivisi2").val(rowData[2]);

        if ($("#kd_Pegawai").val() !== "") {
            var mindate = document.getElementById("TglAwal2").value;
            var maxdate = document.getElementById("TglAkhir2").value;
            fetch(
                "/ProgramPayroll/GantiShift/Aturan1_3/" +
                    $("#kd_Pegawai").val() +
                    "." +
                    mindate +
                    "." +
                    maxdate +
                    ".getShift"
            )
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
                            // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                            //     " " +
                            item.tanggal,
                            item.kd_pegawai,
                            item.shift,
                            item.id_user,
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
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalNomor();
        showModalShift();
    });
    var inputElement = document.getElementById("kd_Pegawai");

    // Menambahkan event listener untuk mendeteksi perubahan nilai pada input
    inputElement.addEventListener("input", function () {
        // Memeriksa apakah nilai input kosong atau tidak
        if (inputElement.value === "") {
            console.log("Nilai input kosong.");
        } else {
            console.log("Nilai input: " + inputElement.value);
        }
    });
    document
        .getElementById("prosesButton")
        .addEventListener("click", function () {
            var tglAwalValue = new Date(
                document.getElementById("TglAwal").value
            );
            var tglAkhirValue = new Date(
                document.getElementById("TglAkhir").value
            );

            if (tglAwalValue < tglAkhirValue) {
                var cekSemuaChecked =
                    document.getElementById("cekSemua").checked;
                var cekPilihChecked =
                    document.getElementById("cekPilih").checked;

                if (cekSemuaChecked) {
                    var confirmation = confirm(
                        "Anda akan melakukan proses pergantian shift untuk karyawan harian pada semua bagian dengan aturan shift 1 dan 3 ?"
                    );
                    if (confirmation === false) return;
                    prosesShift();
                } else if (cekPilihChecked) {
                    var divisiValue = document.getElementById("divisi").value;
                    console.log(divisiValue);

                    if (divisiValue === "") {
                        alert("Anda belum menentukan bagian / divisi.");
                    } else {
                        var namaDivisiValue =
                            document.getElementById("namaDivisi").value;
                        var confirmation = confirm(
                            "Anda akan melakukan proses pergantian shift untuk karyawan pada bagian " +
                                namaDivisiValue +
                                " ?"
                        );
                        if (confirmation === false) return;
                        prosesShift();
                    }
                }
            } else {
                alert(
                    "Tanggal sampai dengan harus lebih besar dari tanggal mulai."
                );
            }
        });
});

function showModalNomor() {
    $("#modalNomor").modal("show");
}
function hideModalNomor() {
    $("#modalNomor").modal("hide");
}
function showModalShift() {
    $("#modalShift").modal("show");
}
function hideModalShift() {
    $("#modalShift").modal("hide");
}
