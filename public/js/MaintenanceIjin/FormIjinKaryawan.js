$(document).ready(function () {
    var Nama_Pegawai = document.getElementById("Nama_Pegawai");
    var buttonTampilKartu = document.getElementById("buttonTampilKartu");
    var prosesButton = document.getElementById("prosesButton");
    var IjinKeluar = document.getElementById("IjinKeluar");
    var IjinKembali = document.getElementById("IjinKembali");
    $("#IjinKeluar").val(getJam());
    $("#IjinKembali").val(getJam());
    $("#TanggalIjin").val(getTanggal());
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
        $("#Nama_Pegawai").val("");
        $("#table_Pegawai").DataTable().clear().draw();
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
        const TanggalIjin = document.getElementById("TanggalIjin").value;
        const Kode_pegawai = document.getElementById("Kode_pegawai").value;
        const Dinas = document.getElementById("Dinas");
        const kembali = document.getElementById("kembali");
        const IjinKeluar = document.getElementById("IjinKeluar").value;
        const IjinKembali = document.getElementById("IjinKembali").value;
        const kategoriPermohonan = document.getElementById("kategoriPermohonan").value;
        const Uraian = document.getElementById("Uraian").value;
        const Menyetujui = document.getElementById("Menyetujui").value;
        var jamUntukUpdate = TanggalIjin + " " + IjinKeluar;
        var jamUntukUpdate2 = TanggalIjin + " " + IjinKembali;
        // if (Nama_Klinik === "" || AlamatKlinik === "" || KotaKlinik === "" || NomorTelepon === "") {
        //     // Salah satu atau lebih elemen input memiliki nilai kosong
        //     alert("Mohon isi semua field yang diperlukan.");
        //     return; // Menghentikan eksekusi lebih lanjut
        // }
        // if (confirm("Yakin Data ini DiProses ..... ?")) {
        // } else {
        //     return;
        // }
        if (Kode_pegawai == '') {
            alert("Kode Pegawai Belum Diinput");
            return;
        }
        var Jns_Keluar, Kembali,Jam_Akhir, Jenis_Alasan;
        if (Dinas.checked == true) {
            Jns_Keluar = 'D';
        }else{
            Jns_Keluar = 'N';
        }
        if (kembali.checked == true) {
            Jam_Akhir = jamUntukUpdate2;
            Kembali = 'Y';
        }else{
            Jam_Akhir = '';
            Kembali = 'N';
        }
        if (kategoriPermohonan == 1) {
            Jenis_Alasan = 'Dinas';
        }else if (kategoriPermohonan == 2) {
            Jenis_Alasan = 'Pribadi';
        }else if (kategoriPermohonan == 3) {
            Jenis_Alasan = 'Kep Keluarga';
        }else if (kategoriPermohonan == 4) {
            Jenis_Alasan = 'Sakit';
        }
        const data = {
            Tanggal: TanggalIjin,
            Kd_Pegawai: Kode_pegawai,
            Jns_Keluar: Jns_Keluar,
            Kembali: Kembali,
            Jam_AWal: jamUntukUpdate,
            Jam_Akhir: Jam_Akhir,
            Jenis_Alasan: Jenis_Alasan,
            Keterangan: Uraian,
            Menyetujui: Menyetujui,
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Fik/" + Kode_pegawai);
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
            form.appendChild(input);
        }
        // Create method input with "PUT" Value
        const method = document.createElement("input");
        method.setAttribute("type", "hidden");
        method.setAttribute("name", "_method");
        method.value = "PUT"; // Set the value of the input field to the corresponding data
        form.appendChild(method);

        // Create input with "Update Keluarga" Value
        const ifUpdate = document.createElement("input");
        ifUpdate.setAttribute("type", "hidden");
        ifUpdate.setAttribute("name", "_ifUpdate");
        ifUpdate.value = "Update Upah"; // Set the value of the input field to the corresponding data
        form.appendChild(ifUpdate);

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
    Nama_Pegawai.addEventListener("input", function () {
        // Dapatkan nilai input
        var nilaiInput = Nama_Pegawai.value;
        $("#Nomor_kartu").val("");
        $("#Nama_divisi").val("");
        $("#Id_Divisi").val("");
        $("#Nama_pegawai_kartu").val("");
        $("#Kode_pegawai_kartu").val("");
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
function getJam() {
    // Mendapatkan waktu saat ini pada sisi klien (perangkat pengguna)
    var waktuSaatIni = new Date();
    var jam = waktuSaatIni.getHours();
    var menit = waktuSaatIni.getMinutes();

    // Format waktu sesuai dengan format input waktu
    var waktuFormat =
        (jam < 10 ? "0" : "") + jam + ":" + (menit < 10 ? "0" : "") + menit;

    // Set nilai input waktu
    return waktuFormat;
}

function getTanggal() {
    var tanggalSaatIni = new Date();
    var tahun = tanggalSaatIni.getFullYear();
    var bulan = ('0' + (tanggalSaatIni.getMonth() + 1)).slice(-2);
    var hari = ('0' + tanggalSaatIni.getDate()).slice(-2);
    return tahun + '-' + bulan + '-' + hari;
}
