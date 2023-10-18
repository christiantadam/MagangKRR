$(document).ready(function () {
    const listDataButton = document.getElementById("listDataButton");
    const divisiButton = document.getElementById("divisiButton");
    const pegawaiButton = document.getElementById("pegawaiButton");
    const isiButton = document.getElementById("isiButton");
    const batalButton = document.getElementById("batalButton");
    const TglMulai = document.getElementById("TglMulai");
    const TglSelesai = document.getElementById("TglSelesai");
    // const Id_Pegawai = document.getElementById("Id_Pegawai");
    const kode_Skors = document.getElementById("kode_Skors");
    const keterangan = document.getElementById("keterangan");
    const simpanButton = document.getElementById("simpanButton");
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    isiButton.addEventListener("click", function () {
        isiButton.hidden = true;
        simpanButton.hidden = false;
        batalButton.disabled = false;
        TglMulai.disabled = false;
        TglSelesai.disabled = false;
        kode_Skors.disabled = false;
        keterangan.disabled = false;
        divisiButton.disabled = false;
        pegawaiButton.disabled = false;
    });
    batalButton.addEventListener("click", function () {
        isiButton.hidden = false;
        simpanButton.hidden = true;
        batalButton.disabled = true;
        TglMulai.disabled = true;
        TglSelesai.disabled = true;
        kode_Skors.disabled = true;
        keterangan.disabled = true;
        divisiButton.disabled = true;
        pegawaiButton.disabled = true;
    });
    simpanButton.addEventListener("click", function () {
        event.preventDefault();

        const MinDate = document.getElementById("TglMulai").value;
        const MaxDate = document.getElementById("TglSelesai").value;
        const kd_pegawai = document.getElementById("Id_Pegawai").value;
        const kode_skors = document.getElementById("kode_Skors").value;
        const keterangan = document.getElementById("keterangan").value;
        const tglAwal = new Date(MinDate);
        const tglAkhir = new Date(MaxDate);
        if (!(kode_skors === "P" || kode_skors === "K")) {
            alert("Kode Skors Hanya P atau K");
            return;
        }
        if(tglAwal > tglAkhir){
            alert("Tanggal Salah");
            return;
        }
        if (
            kd_pegawai === "" ||
            keterangan === "" ||
            MinDate === "" ||
            MaxDate === ""
        ) {
            // Salah satu atau lebih elemen input memiliki nilai kosong
            alert("Mohon isi semua field yang diperlukan.");
            return; // Menghentikan eksekusi lebih lanjut
        }
        const data = {
            MinDate: MinDate,
            MaxDate: MaxDate,
            kd_pegawai: kd_pegawai,
            kode_skors: kode_skors,
            keterangan: keterangan,
            id_user: "U001",
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Permohonan");
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

    divisiButton.addEventListener("click", function () {
        fetch("/ProgramPayroll/Skorsing/Permohonan/" + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Divisi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Id_Div,
                        item.Nama_Div,
                    ];
                    $("#tabel_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalDivisi();
    });
    pegawaiButton.addEventListener("click", function () {
        const Id_Div = document.getElementById("Id_Divisi").value;
        console.log("Masuk fungsi pegawai");
        fetch("/ProgramPayroll/Skorsing/Permohonan/" + Id_Div + ".getPegawai")
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
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.kd_pegawai,
                        item.nama_peg,
                    ];

                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        showModalPegawai();
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);

        hideModalDivisi();
    });
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);

        hideModalPegawai();
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
