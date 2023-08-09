$(document).ready(function () {
    $("#tabel_Posisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabel_Shift").DataTable({
        order: [[0, "asc"]],
    });

    // function hideModalPosisi() {
    //     $("#modalPosisi").removeClass("show");
    //     $("#modalPosisi").css("display", "none");
    //     $("body").removeClass("modal-open");
    //     removeBackdrop();
    // }
    const Kd_Peg = document.getElementById("Id_Peg");
    const Nama_Peg = document.getElementById("Nama_Peg");
    const isiPegawai = document.getElementById("isiButton");
    const koreksiPegawai = document.getElementById("KoreksiButton");
    const SimpanIsiPegawai = document.getElementById("SimpanIsiButton");
    const SimpanKoreksiPegawai = document.getElementById("SimpanKoreksiButton");
    const BatalIsiPegawai = document.getElementById("BatalIsiButton");
    const BatalKoreksiPegawai = document.getElementById("BatalKoreksiButton");
    $("#tabel_Posisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Posisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Kd_Posisi").val(rowData[0]);
        $("#Nama_Posisi").val(rowData[1]);
        fetch("/KaryawanHarian/" + rowData[0] + ".getDivisi")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $("#tabel_Divisi").DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [item.Id_Div, item.Nama_Div];
                    $("#tabel_Divisi").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Divisi").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalPosisi();
    });
    $("#tabel_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        fetch("/KaryawanHarian/" + rowData[0] + ".getNamaPegawai")
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
                    var row = [item.kd_pegawai, item.nama_peg];
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
    $("#tabel_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Peg").val(rowData[0]);
        $("#Nama_Peg").val(rowData[1]);
        fetch("/KaryawanHarian/" + rowData[0] + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log(data);
                data.forEach((item) => {
                    $("#NomorInduk").val(item.No_Induk);
                    $("#NomorKartu").val(item.No_Kartu);
                    $("#Alamat").val(item.Alamat);
                    $("#namaKota").val(item.Kota);
                    $("#tempatLahir").val(item.Tmp_Lahir);
                    $("#TglLahir").val(item.Tgl_Lahir.split(" ")[0]);
                    $("#JenisKelamin").val(item.Jns_Kelamin);
                    $("#Agama").val(item.Agama);
                    $("#StatusKawin").val(item.Kawin);
                    $("#TglMasuk").val(item.Tgl_Masuk.split(" ")[0]);
                    $("#TglMasukAwal").val(item.Tgl_Masuk_Awal.split(" ")[0]);
                    $("#Jabatan").val(item.Jabatan);
                    $("#Golongan").val(item.Golongan);
                    $("#NomorAstek").val(item.No_Astek);
                    $("#NomorRBH").val(item.No_RBH);
                    $("#NomorKop").val(item.No_Koperasi);
                    $("#TglMasukKop").val(item.Tgl_Agt_Kop.split(" ")[0]);
                    $("#upahPokok").val(item.Gaji_Pokok);
                    $("#upahGolongan").val(item.U_Golongan);
                    $("#TunjanganJabatan").val(item.T_Jabatan);
                    $("#upahJenjang").val(item.U_Jenjang);
                    $("#TinggiBadan").val(item.Tinggi_badan);
                    $("#BeratBadan").val(item.berat_badan);
                    $("#Pendidikan").val(item.Pendidikan);
                    $("#Id_Shift").val(item.shift);
                    // $("#Kd_Posisi").val("");
                    $("#TglAwalKontrak").val(item.TglAwalKontrak.split(" ")[0]);
                    $("#TglAkhirKontrak").val(
                        item.TglAkhirKontrak.split(" ")[0]
                    );
                    $("#JmlTanggungan").val(item.Tanggungan);
                    $("#NPWP").val(item.NPWP);
                    $("#NomorRek").val(item.no_rek);
                    $("#NIK").val(item.NIK);
                });
                // $("#Id_Div").val(data['Id_Div']);
                // $("#Id_Peg").val("");
                // $("#Nama_Peg").val("");
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalPegawai();
    });
    $("#tabel_Shift tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#tabel_Shift").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Shift").val(rowData[0]);
        $("#Jam").val(rowData[1]);

        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalShift();
    });
    function checkInputs() {
        const inputs = [
            "Id_Div",
            "Id_Peg",
            "Nama_Peg",
            "NomorInduk",
            "NomorKartu",
            "Alamat",
            "namaKota",
            "tempatLahir",
            "TglLahir",
            "JenisKelamin",
            "Agama",
            "StatusKawin",
            "TglMasuk",
            "TglMasukAwal",
            "Jabatan",
            "Golongan",
            "NomorAstek",
            "NomorRBH",
            "NomorKop",
            "TglMasukKop",
            "upahPokok",
            "upahGolongan",
            "TunjanganJabatan",
            "upahJenjang",
            "TinggiBadan",
            "BeratBadan",
            "Pendidikan",
            "Id_Shift",
            "Kd_Posisi",
            "TglAwalKontrak",
            "TglAkhirKontrak",
            "JmlTanggungan",
            "NPWP",
            "NomorRek",
            "NIK",
        ];

        let isComplete = true;

        for (const input of inputs) {
            const value = document.getElementById(input).value.trim();
            if (value === "") {
                isComplete = false;
                break;
            }
        }

        if (isComplete) {
            // Semua input terisi, lanjutkan dengan operasi berikutnya
            // Misalnya, simpan data atau tampilkan pesan sukses.
            console.log("Semua input sudah terisi.");
        } else {
            // Ada input yang belum terisi, tampilkan pesan error.
            console.error("Mohon lengkapi semua input terlebih dahulu.");
        }
    }
    SimpanIsiPegawai.addEventListener("click", function (event) {
        event.preventDefault();

        function handleEmptyValue(value) {
            return value.trim() === "" ? null : value;
        }
        let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
        const id_div = document.getElementById("Id_Div").value;
        const kd_peg = document.getElementById("Id_Peg").value;
        const nama_peg = document.getElementById("Nama_Peg").value;
        const no_induk = document.getElementById("NomorInduk").value;
        const no_kartu = document.getElementById("NomorKartu").value;
        const jenis_peg = 1;
        const alamat = document.getElementById("Alamat").value;
        const kota = document.getElementById("namaKota").value;
        const tmp_lahir = document.getElementById("tempatLahir").value;
        const tgl_lahir = document.getElementById("TglLahir").value;
        const jns_kelamin = document.getElementById("JenisKelamin").value;
        const agama = document.getElementById("Agama").value;
        const kawin = document.getElementById("StatusKawin").value;
        const tgl_masuk = document.getElementById("TglMasuk").value;
        const tgl_masuk_awal = document.getElementById("TglMasukAwal").value;
        const jabatan = document.getElementById("Jabatan").value;
        const golongan = document.getElementById("Golongan").value;
        const no_astek = document.getElementById("NomorAstek").value;
        const no_rbh = document.getElementById("NomorRBH").value;
        const no_koperasi = document.getElementById("NomorKop").value;
        const tgl_agt_kop = document.getElementById("TglMasukKop").value;
        const gaji_pokok = document.getElementById("upahPokok").value;
        const u_golongan = document.getElementById("upahGolongan").value;
        const t_jabatan = document.getElementById("TunjanganJabatan").value;
        const u_jenjang = document.getElementById("upahJenjang").value;
        const Tinggi_Badan = document.getElementById("TinggiBadan").value;
        const berat_Badan = document.getElementById("BeratBadan").value;
        const pendidikan = document.getElementById("Pendidikan").value;
        const Shift = document.getElementById("Id_Shift").value;
        const pos = document.getElementById("Kd_Posisi").value;
        const TglAwalKontrak = document.getElementById("TglAwalKontrak").value;
        const TglAkhirKontrak =
            document.getElementById("TglAkhirKontrak").value;
        const Tanggungan = document.getElementById("JmlTanggungan").value;
        const NPWP = document.getElementById("NPWP").value;
        const No_rek = document.getElementById("NomorRek").value;
        const NIK = document.getElementById("NIK").value;
        const data = {
            _token: csrfToken,
            id_div: id_div,
            kd_peg: kd_peg,
            nama_peg: nama_peg,
            no_induk: handleEmptyValue(no_induk),
            no_kartu: handleEmptyValue(no_kartu),
            jenis_peg: jenis_peg,
            alamat: handleEmptyValue(alamat),
            kota: handleEmptyValue(kota),
            tmp_lahir: handleEmptyValue(tmp_lahir),
            tgl_lahir: handleEmptyValue(tgl_lahir),
            jns_kelamin: handleEmptyValue(jns_kelamin),
            agama: handleEmptyValue(agama),
            kawin: handleEmptyValue(kawin),
            tgl_masuk: handleEmptyValue(tgl_masuk),
            tgl_masuk_awal: handleEmptyValue(tgl_masuk_awal),
            jabatan: handleEmptyValue(jabatan),
            golongan: handleEmptyValue(golongan),
            no_astek: handleEmptyValue(no_astek),
            no_rbh: handleEmptyValue(no_rbh),
            no_koperasi: handleEmptyValue(no_koperasi),
            tgl_agt_kop: handleEmptyValue(tgl_agt_kop),
            gaji_pokok: handleEmptyValue(gaji_pokok),
            u_golongan: handleEmptyValue(u_golongan),
            t_jabatan: handleEmptyValue(t_jabatan),
            u_jenjang: handleEmptyValue(u_jenjang),
            Tinggi_Badan: handleEmptyValue(Tinggi_Badan),
            berat_Badan: handleEmptyValue(berat_Badan),
            pendidikan: handleEmptyValue(pendidikan),
            Shift: handleEmptyValue(Shift),
            pos: handleEmptyValue(pos),
            TglAwalKontrak: handleEmptyValue(TglAwalKontrak),
            TglAkhirKontrak: handleEmptyValue(TglAkhirKontrak),
            Tanggungan: handleEmptyValue(Tanggungan),
            NPWP: handleEmptyValue(NPWP),
            No_rek: handleEmptyValue(No_rek),
            NIK: handleEmptyValue(NIK),
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "KaryawanHarian");
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
        // let csrfToken = document
        //     .querySelector('meta[name="csrf-token"]')
        //     .getAttribute("content");
        let csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);
        const inputs = [
            "Id_Div",
            "Id_Peg",
            "Nama_Peg",

            "tempatLahir",
            "TglLahir",

            "upahPokok",
            "upahGolongan",

            "NomorRek",
        ];

        let isComplete = true;

        for (const input of inputs) {
            const value = document.getElementById(input).value.trim();
            if (value === "") {
                isComplete = false;
                break;
            }
        }
        function submitForm() {
            return new Promise((resolve, reject) => {
                form.onsubmit = resolve; // Resolve the Promise when the form is submitted
                // form.submit();
            });
        }
        if (isComplete) {
            // Call the submitForm function to initiate the form submission
            submitForm()
                .then(() => console.log("Form submitted successfully!"))
                .catch((error) =>
                    console.error("Form submission error:", error)
                );
        } else {
            // Ada input yang belum terisi, tampilkan pesan error.
            alert("Mohon lengkapi semua input terlebih dahulu.");
        }
        // let request = {
        //     method: "POST",
        //     headers: '_token'
        //     body: JSON.stringify(data),
        // };
        // fetch("KaryawanHarian", request)
        //     .then((response) => response.json())
        //     .then((result) => {
        //         alert("data sudah disimpan!");
        //         console.log(result);
        //     });
        // $.ajax({
        //     url: 'KaryawanHarian',
        //     type: 'POST',
        //     data: data,
        //     headers: {
        //         'X-CSRF-TOKEN': csrfToken
        //     },
        //     success: function(response) {
        //         console.log(response.message);
        //         // Handle success response
        //     },
        //     error: function(error) {
        //         console.log('Error:', error);
        //         // Handle error response
        //     }
        // });
        // Wrap form submission in a Promise
    });
    SimpanKoreksiPegawai.addEventListener("click", function (event) {
        event.preventDefault();
        function handleEmptyValue(value) {
            return value.trim() === "" ? null : value;
        }
        const id_div = document.getElementById("Id_Div").value;
        const kd_peg = document.getElementById("Id_Peg").value;
        const nama_peg = document.getElementById("Nama_Peg").value;
        const no_induk = document.getElementById("NomorInduk").value;
        const no_kartu = document.getElementById("NomorKartu").value;
        const jenis_peg = 1;
        const alamat = document.getElementById("Alamat").value;
        const kota = document.getElementById("namaKota").value;
        const tmp_lahir = document.getElementById("tempatLahir").value;
        const tgl_lahir = document.getElementById("TglLahir").value;
        const jns_kelamin = document.getElementById("JenisKelamin").value;
        const agama = document.getElementById("Agama").value;
        const kawin = document.getElementById("StatusKawin").value;
        const tgl_masuk = document.getElementById("TglMasuk").value;
        const tgl_masuk_awal = document.getElementById("TglMasukAwal").value;
        const jabatan = document.getElementById("Jabatan").value;
        const golongan = document.getElementById("Golongan").value;
        const no_astek = document.getElementById("NomorAstek").value;
        const no_rbh = document.getElementById("NomorRBH").value;
        const no_koperasi = document.getElementById("NomorKop").value;
        const tgl_agt_kop = document.getElementById("TglMasukKop").value;
        const gaji_pokok = document.getElementById("upahPokok").value;
        const u_golongan = document.getElementById("upahGolongan").value;
        const t_jabatan = document.getElementById("TunjanganJabatan").value;
        const u_jenjang = document.getElementById("upahJenjang").value;
        const Tinggi_Badan = document.getElementById("TinggiBadan").value;
        const berat_Badan = document.getElementById("BeratBadan").value;
        const pendidikan = document.getElementById("Pendidikan").value;
        const Shift = document.getElementById("Id_Shift").value;
        const pos = document.getElementById("Kd_Posisi").value;
        const TglAwalKontrak = document.getElementById("TglAwalKontrak").value;
        const TglAkhirKontrak =
            document.getElementById("TglAkhirKontrak").value;
        const Tanggungan = document.getElementById("JmlTanggungan").value;
        const NPWP = document.getElementById("NPWP").value;
        const No_rek = document.getElementById("NomorRek").value;
        const NIK = document.getElementById("NIK").value;
        const data = {
            id_div: id_div,
            kd_peg: kd_peg,
            nama_peg: nama_peg,
            no_induk: handleEmptyValue(no_induk),
            no_kartu: handleEmptyValue(no_kartu),
            jenis_peg: jenis_peg,
            alamat: handleEmptyValue(alamat),
            kota: handleEmptyValue(kota),
            tmp_lahir: handleEmptyValue(tmp_lahir),
            tgl_lahir: handleEmptyValue(tgl_lahir),
            jns_kelamin: handleEmptyValue(jns_kelamin),
            agama: handleEmptyValue(agama),
            kawin: handleEmptyValue(kawin),
            tgl_masuk: handleEmptyValue(tgl_masuk),
            tgl_masuk_awal: handleEmptyValue(tgl_masuk_awal),
            jabatan: handleEmptyValue(jabatan),
            golongan: handleEmptyValue(golongan),
            no_astek: handleEmptyValue(no_astek),
            no_rbh: handleEmptyValue(no_rbh),
            no_koperasi: handleEmptyValue(no_koperasi),
            tgl_agt_kop: handleEmptyValue(tgl_agt_kop),
            gaji_pokok: handleEmptyValue(gaji_pokok),
            u_golongan: handleEmptyValue(u_golongan),
            t_jabatan: handleEmptyValue(t_jabatan),
            u_jenjang: handleEmptyValue(u_jenjang),
            Tinggi_Badan: handleEmptyValue(Tinggi_Badan),
            berat_Badan: handleEmptyValue(berat_Badan),
            pendidikan: handleEmptyValue(pendidikan),
            Shift: handleEmptyValue(Shift),
            pos: handleEmptyValue(pos),
            TglAwalKontrak: handleEmptyValue(TglAwalKontrak),
            TglAkhirKontrak: handleEmptyValue(TglAkhirKontrak),
            Tanggungan: handleEmptyValue(Tanggungan),
            NPWP: handleEmptyValue(NPWP),
            No_rek: handleEmptyValue(No_rek),
            NIK: handleEmptyValue(NIK),
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "KaryawanHarian/{idPeg}");
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
        ifUpdate.value = "Update Pekerja"; // Set the value of the input field to the corresponding data
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
        const inputs = [
            "Id_Div",
            "Id_Peg",
            "Nama_Peg",

            "tempatLahir",
            "TglLahir",

            "upahPokok",
            "upahGolongan",

            "NomorRek",
        ];

        let isComplete = true;

        for (const input of inputs) {
            const value = document.getElementById(input).value.trim();
            if (value === "") {
                isComplete = false;
                break;
            }
        }

        function submitForm() {
            return new Promise((resolve, reject) => {
                form.onsubmit = resolve; // Resolve the Promise when the form is submitted
                form.submit();
            });
        }
        if (isComplete) {
            // Call the submitForm function to initiate the form submission
            submitForm()
                .then(() => console.log("Form submitted successfully!"))
                .catch((error) =>
                    console.error("Form submission error:", error)
                );
        } else {
            // Ada input yang belum terisi, tampilkan pesan error.
            alert("Mohon lengkapi semua input terlebih dahulu.");
        }
    });

    isiPegawai.addEventListener("click", function (event) {
        isiPegawai.hidden = true;
        koreksiPegawai.hidden = true;
        Kd_Peg.removeAttribute("readonly");
        Nama_Peg.removeAttribute("readonly");
        SimpanIsiPegawai.hidden = false;
        BatalIsiPegawai.hidden = false;
    });
    BatalIsiPegawai.addEventListener("click", function (event) {
        isiPegawai.hidden = false;
        koreksiPegawai.hidden = false;
        Kd_Peg.setAttribute("readonly", "readonly");
        Nama_Peg.setAttribute("readonly", "readonly");
        SimpanIsiPegawai.hidden = true;
        BatalIsiPegawai.hidden = true;
    });
    koreksiPegawai.addEventListener("click", function (event) {
        isiPegawai.hidden = true;
        koreksiPegawai.hidden = true;
        SimpanKoreksiPegawai.hidden = false;
        BatalKoreksiPegawai.hidden = false;
    });
    BatalKoreksiPegawai.addEventListener("click", function (event) {
        isiPegawai.hidden = false;
        koreksiPegawai.hidden = false;
        SimpanKoreksiPegawai.hidden = true;
        BatalKoreksiPegawai.hidden = true;
    });
});
function showModalPosisi() {
    $("#modalPosisi").modal("show");
}
function hideModalPosisi() {
    $("#modalPosisi").modal("hide");
}
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
