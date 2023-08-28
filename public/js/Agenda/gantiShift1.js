$(document).ready(function () {
    const cekSemua = document.getElementById('cekSemua');
    const cekPilih = document.getElementById('cekPilih');
    const selectDivisi = document.getElementById('divisi');
    const namaDivisi = document.getElementById('namaDivisi');
    function prosesShift() {

        var mindate = document.getElementById('TglAwal').value;
        var maxdate =document.getElementById('TglAkhir').value;
        var cekPilihChecked = document.getElementById('cekPilih').checked;
        var cekSemuaChecked = document.getElementById('cekSemua').checked;
        let data =[];
        if (cekPilihChecked) {
            var selectedIdDiv = $("#divisi").find("option:selected").text();
            data = {
                mindate: mindate,
                maxdate: maxdate,
                id_Div: selectedIdDiv,
                opsi: 0,
            };
        } else if(cekSemuaChecked){
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
    selectDivisi.addEventListener('change', function() {
        // Mengambil nilai yang dipilih dari select
        var selectedValue = selectDivisi.options[selectDivisi.selectedIndex].value;

        // Mengisikan nilai ke input
        namaDivisi.value = selectedValue;
    });
    cekSemua.addEventListener('change', () => {
        if (cekSemua.checked) {
            selectDivisi.disabled = true;
            namaDivisi.disabled = true;
        }
    });

    cekPilih.addEventListener('change', () => {
        if (cekPilih.checked) {
            selectDivisi.disabled = false;
            namaDivisi.disabled = false;
        }
    });
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        fetch("/MasterKartu/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#table_Pegawai").DataTable().clear().draw();

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
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);
        fetch("/MasterKartu/" + rowData[0] + ".getDataPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                console.log(data);
                data.forEach((item) => {
                    document.getElementById(
                        "Kd_Pegawai"
                    ).textContent = `KODE   : ${item.Kd_Pegawai}`;
                    document.getElementById(
                        "No_Kartu"
                    ).textContent = `NOMOR : ${item.No_Kartu}`;
                    document.getElementById(
                        "Nama_Divisi"
                    ).textContent = `DEPT   : ${item.Nama_Div}`;
                    document.getElementById(
                        "Nama_Peg"
                    ).textContent = `NAMA  : ${item.Nama_Peg}`;
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        document.getElementById("printSection").hidden = false;
            // var idDivValue = rowData[0];
            // submitFormWithIdDiv(idDivValue);
            // Hide the modal immediately after populating the data
            hideModalPegawai();
    });
    document.getElementById('prosesButton').addEventListener('click', function() {
        var tglAwalValue = new Date(document.getElementById('TglAwal').value);
        var tglAkhirValue = new Date(document.getElementById('TglAkhir').value);

        if (tglAwalValue < tglAkhirValue) {
            var cekSemuaChecked = document.getElementById('cekSemua').checked;
            var cekPilihChecked = document.getElementById('cekPilih').checked;

            if (cekSemuaChecked) {
                var confirmation = confirm("Anda akan melakukan proses pergantian shift untuk karyawan harian pada semua bagian dengan aturan shift 1 dan 3 ?");
                if (confirmation === false) return;
                prosesShift();
            } else if (cekPilihChecked) {
                var divisiValue = document.getElementById('divisi').value;
                console.log(divisiValue);

                if (divisiValue === "") {
                    alert("Anda belum menentukan bagian / divisi.");
                } else {
                    var namaDivisiValue = document.getElementById('namaDivisi').value;
                    var confirmation = confirm("Anda akan melakukan proses pergantian shift untuk karyawan pada bagian " + namaDivisiValue + " ?");
                    if (confirmation === false) return;
                    prosesShift();
                }
            }
        } else {
            alert("Tanggal sampai dengan harus lebih besar dari tanggal mulai.");
        }
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
