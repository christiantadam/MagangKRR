$(document).ready(function () {
    const pegawaiButton = document.getElementById("pegawaiButton");
    const prosesButton = document.getElementById("prosesButton");
    const prosesDivisi = document.getElementById("prosesDivisi");
    const pilihSemua = document.getElementById("pilihSemua");
    let semuaDipilih = false;

    pilihSemua.addEventListener("click", function () {
        if (semuaDipilih) {
            tabel.rows().deselect();
            semuaDipilih = false;
        } else {
            tabel.rows().select();
            semuaDipilih = true;
        }
    });
    var tabel = $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multi",
        },
    });
    document.getElementById("opsi1").addEventListener("change", function () {
        if (this.checked) {
            document.getElementById("peroranganSection").hidden = false;
            document.getElementById("divisiSection").hidden = true;
        } else {
            document.getElementById("peroranganSection").hidden = true;
        }
    });
    document.getElementById("opsi2").addEventListener("change", function () {
        if (this.checked) {
            document.getElementById("divisiSection").hidden = false;
            document.getElementById("peroranganSection").hidden = true;
        } else {
            document.getElementById("divisiSection").hidden = true;
        }
    });
    pegawaiButton.addEventListener("click", function (event) {
        showModalPegawai();
        const DivisiSelect = document.getElementById("DivisiSelect").value;
        fetch(
            "/ProgramPayroll/Transaksi/InputLibur/" +
                DivisiSelect +
                ".getPegawai"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Pegawai").DataTable().clear().draw();
                data.forEach((item) => {
                    var row = [item.Nama_Peg, item.Kd_Pegawai];
                    $("#tabel_Pegawai").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Pegawai").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        $("#Nama_Pegawai").val(rowData[0]);
        $("#Id_Pegawai").val(rowData[1]);

        hideModalPegawai();
    });
    prosesButton.addEventListener("click", function (event) {
        const old_kd_pegawai = document.getElementById("Id_Pegawai").value;
        const new_kd_pegawai = document.getElementById("Kd_Pegawai_Baru").value;
        const old_jabatan = document.getElementById("jabatan_Lama").value;
        const new_jabatan = document.getElementById("jabatan_Baru").value;
        const old_nm_divisi = document.getElementById("Nama_Divisi").value;
        const new_nm_divisi = document.getElementById("Nama_Divisi_Baru").value;
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
        form.setAttribute("action", "MutasiHarian");
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
    prosesDivisi.addEventListener("click", function (event) {
        const old_kd_pegawai = document.getElementById("Id_Pegawai").value;
        const new_kd_pegawai = document.getElementById("Kd_Pegawai_Baru").value;
        const old_jabatan = document.getElementById("jabatan_Lama").value;
        const new_jabatan = document.getElementById("jabatan_Baru").value;
        const old_nm_divisi = document.getElementById("Nama_Divisi").value;
        const new_nm_divisi = document.getElementById("Nama_Divisi_Baru").value;
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
        form.setAttribute("action", "MutasiHarian");
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
});
function showModalPegawai() {
    $("#modalPegawai").modal("show");
}
function hideModalPegawai() {
    $("#modalPegawai").modal("hide");
}
