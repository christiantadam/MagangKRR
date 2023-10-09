$(document).ready(function () {
    const checkbox = document.getElementById("pegawaiSelectAll");

    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    var table = $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multiple",
        },
    });
    $("#table_Shift tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Shift").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Shift_Baru").val(rowData[0]);
        fetch("/InsertSupervisor/" + rowData[0] + ".getDataShift")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // $("#tabel_Pegawai").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var pulangDateObject = new Date(item.pulang);
                    var pulangHours = pulangDateObject
                        .getHours()
                        .toString()
                        .padStart(2, "0");
                    var pulangMinutes = pulangDateObject
                        .getMinutes()
                        .toString()
                        .padStart(2, "0");
                    var pulangTimeString = pulangHours + ":" + pulangMinutes;

                    $("#pulang").val(pulangTimeString);

                    // Jika Anda ingin melakukan hal yang serupa untuk bidang lain, Anda bisa menambahkan kode di bawah ini:

                    var masukDateObject = new Date(item.masuk);
                    var masukHours = masukDateObject
                        .getHours()
                        .toString()
                        .padStart(2, "0");
                    var masukMinutes = masukDateObject
                        .getMinutes()
                        .toString()
                        .padStart(2, "0");
                    var masukTimeString = masukHours + ":" + masukMinutes;

                    $("#masuk").val(masukTimeString);

                    var awalJamIstirahatDateObject = new Date(
                        item.awal_jam_istirahat
                    );
                    var awalJamIstirahatHours = awalJamIstirahatDateObject
                        .getHours()
                        .toString()
                        .padStart(2, "0");
                    var awalJamIstirahatMinutes = awalJamIstirahatDateObject
                        .getMinutes()
                        .toString()
                        .padStart(2, "0");
                    var awalJamIstirahatTimeString =
                        awalJamIstirahatHours + ":" + awalJamIstirahatMinutes;

                    $("#istirahat_awal").val(awalJamIstirahatTimeString);

                    var akhirJamIstirahatDateObject = new Date(
                        item.akhir_jam_istirahat
                    );
                    var akhirJamIstirahatHours = akhirJamIstirahatDateObject
                        .getHours()
                        .toString()
                        .padStart(2, "0");
                    var akhirJamIstirahatMinutes = akhirJamIstirahatDateObject
                        .getMinutes()
                        .toString()
                        .padStart(2, "0");
                    var akhirJamIstirahatTimeString =
                        akhirJamIstirahatHours + ":" + akhirJamIstirahatMinutes;

                    $("#istirahat_akhir").val(akhirJamIstirahatTimeString);
                });

                // Redraw the table to show the changes
                // $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
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
        fetch("/InsertPegawaiBaru/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
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
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            table.rows().select();
            // Lakukan tindakan lain jika checkbox dicentang
        } else {
            table.rows().deselect();

            // Lakukan tindakan lain jika checkbox tidak dicentang
        }
    });
    $("#buttonUpdate").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        // console.log(selectedRows);
        selectedRows.forEach((data) => {
            console.log(data[0]);
            // Lakukan operasi lain pada data, jika diperlukan
        });
    });
    $("#buttonProses").click(function () {
        var selectedRows = table.rows(".selected").data().toArray();
        var shift = document.getElementById("Id_Shift_Baru").value;
        var shiftbaru, jmljam, keterangan;
        const tanggal1 = document.getElementById("TglAwal").value;
        const tanggal2 = document.getElementById("TglAkhir").value;
        const id_div = document.getElementById("Id_Div").value;
        const date1 = new Date(tanggal1);
        const date2 = new Date(tanggal2);

        if (date2 < date1) {
            alert("Tanggal akhir tidak boleh lebih kecil dari tanggal awal");
            return;
        }
        var gabungData = "";
        for (var i = 0; i < selectedRows.length; i++) {
            gabungData += selectedRows[i][0]; // Mengakses indeks pertama dari setiap elemen
            if (i < selectedRows.length - 1) {
                gabungData += "."; // Tambahkan separator kecuali untuk elemen terakhir
            }
        }
        console.log(gabungData);
        const data = {
            pegawai: gabungData,
            Tanggal1: tanggal1,
            Tanggal2: tanggal2,
            Kd_Shift: shift,
            User_Input: "U001",
            id_div: id_div,
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "InsertPegawaiBaru");
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
        // selectedRows.forEach((data) => {

        // });
    });
    function divAturan(id_div) {
        let divAturanValue = null;

        return divAturanValue;
    }
});
function showModalDivisi() {
    $("#modalDivisi").modal("show");
}
function hideModalDivisi() {
    $("#modalDivisi").modal("hide");
}
function showModalShift() {
    $("#modalShift").modal("show");
}
function hideModalShift() {
    $("#modalShift").modal("hide");
}
