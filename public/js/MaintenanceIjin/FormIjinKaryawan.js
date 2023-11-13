$(document).ready(function () {
    var Nama_Pegawai = document.getElementById("Nama_Pegawai");
    var buttonTampilKartu = document.getElementById("buttonTampilKartu");
    var prosesButton = document.getElementById("prosesButton");
    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        $("#Divisi").val(rowData[0]);
        $("#Kode_pegawai").val(rowData[1]);
        $("#Nama_pegawai").val(rowData[2]);
    });
    // Tambahkan event listener untuk peristiwa input
    buttonTampilKartu.addEventListener("click", function (event) {
        const Nomor_kartu = document.getElementById("Nomor_kartu").value;
        fetch(
            "/ProgramPayroll/Maintenance/Fik/" +
                Nomor_kartu +
                ".getPegawaiKartu"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                data.forEach((item) => {
                    $("#Divisi").val(item.Nama_Div);
                    $("#Kode_pegawai").val(item.Kd_Pegawai);
                    $("#Nama_pegawai").val(item.Nama_Peg);
                    $("#Nama_divisi").val(item.Nama_Div);
                    $("#Id_Divisi").val(item.Id_Div);
                    $("#Nama_pegawai_kartu").val(item.Nama_Peg);
                    $("#Kode_pegawai_kartu").val(item.Kd_Pegawai);
                });

                // Redraw the table to show the changes
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    prosesButton.addEventListener("click", function (event) {
        const Nomor_kartu = document.getElementById("Nomor_kartu").value;
        const old_kd_pegawai = document.getElementById("Id_Pegawai").value;
        const new_kd_pegawai =
            document.getElementById("Kd_Pegawai_Baru").value;
        const old_jabatan = document.getElementById("jabatan_Lama").value;
        const new_jabatan = document.getElementById("jabatan_Baru").value;
        const old_nm_divisi = document.getElementById("Nama_Divisi").value;
        const new_nm_divisi =
            document.getElementById("Nama_Divisi_Baru").value;
        const tgl_mutasi = document.getElementById("TglMutasi").value;
        const no_surat = document.getElementById("nomor_surat").value;
        const Alasan = document.getElementById("alasan_mutasi").value;
        // if (Nama_Klinik === "" || AlamatKlinik === "" || KotaKlinik === "" || NomorTelepon === "") {
        //     // Salah satu atau lebih elemen input memiliki nilai kosong
        //     alert("Mohon isi semua field yang diperlukan.");
        //     return; // Menghentikan eksekusi lebih lanjut
        // }
        if (confirm("Yakin Data ini DiProses ..... ?")) {
        } else {
            return;
        }
        const data = {
            old_kd_pegawai: old_kd_pegawai,
            new_kd_pegawai: new_kd_pegawai,
            old_jabatan: old_jabatan,
            new_jabatan: new_jabatan,
            old_nm_divisi: old_nm_divisi,
            new_nm_divisi: new_nm_divisi,
            tgl_mutasi: tgl_mutasi,
            no_surat: no_surat,
            Alasan: Alasan,
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Fik");
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
            .catch((error) =>
                console.error("Form submission error:", error)
            );
    });
    Nama_Pegawai.addEventListener("input", function () {
        // Dapatkan nilai input
        var nilaiInput = Nama_Pegawai.value;

        fetch("/ProgramPayroll/Maintenance/Fik/" + nilaiInput + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#table_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [
                        item.Nama_Div,
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                        item.Jenis_Peg,
                    ];
                    $("#table_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#table_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
