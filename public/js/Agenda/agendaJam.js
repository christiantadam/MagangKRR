$(document).ready(function () {
    var divisiSelect = document.getElementById("DivisiSelect");

    // Ambil elemen select pegawai
    var pegawaiSelect = document.getElementById("PegawaiSelect");
    const generateButton = document.getElementById("generateButton");
    const generateDivisi = document.getElementById("generateDivisi");
    const pilihSemua = document.getElementById("pilihSemua");
    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    // Tambahkan event listener untuk perubahan pada select divisi
    var tabel = $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "multi",
        },
    });
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
    generateDivisi.addEventListener("click", function () {
        var dataDipilih = tabel.rows(".selected").data();
        const DateTimePicker1 = document.getElementById("TglAwal");
        const DateTimePicker2 = document.getElementById("TglAkhir");
        const kd_pegawai = document.getElementById("PegawaiSelect").value;
        const startDate = new Date(DateTimePicker1.value);
        const endDate = new Date(DateTimePicker2.value);
        const startJam = document.getElementById("masuk").value;
        const endJam = document.getElementById("pulang").value;
        const awalIstirahat = document.getElementById("masuk_istirahat").value;
        const akhirIstirahat =
            document.getElementById("pulang_istirahat").value;
        // Mencetak data yang dipilih ke console
        var gabungData = "";
        for (var i = 0; i < dataDipilih.length; i++) {
            gabungData += dataDipilih[i][0]; // Mengakses indeks pertama dari setiap elemen
            if (i < dataDipilih.length - 1) {
                gabungData += "."; // Tambahkan separator kecuali untuk elemen terakhir
            }
        }
        console.log(gabungData);
        // return;
        if (
            !DateTimePicker1.value ||
            !DateTimePicker2.value ||
            !startJam ||
            !endJam ||
            !awalIstirahat ||
            !akhirIstirahat
        ) {
            alert("Masih ada form yang kosong !");
            return; // Stop executing the function
        }
        if (!dataDipilih[0]) {
            alert("Pilih dulu divisinya !");
            return; // Stop executing the function
        }
        if (startDate > endDate) {
            alert("Dicek dulu tanggalnya !");
            return;
        }

        console.log(dataDipilih[i]);
        const tanggal = new Date(startDate);
        tanggal.setDate(startDate.getDate() + i);
        const hari = tanggal.getDay();
        tanggalString = tanggal.toISOString().slice(0, 10);
        const jamMasuk = new Date(`${tanggalString}T${startJam}:00`);
        const jamPulang = new Date(`${tanggalString}T${endJam}:00`);
        // var Jam_Masuk = tanggalString + " " + startJam;
        // var Jam_Keluar = tanggalString + " " + endJam;
        // var awal_Jam_istirahat = tanggalString + " " + awalIstirahat;
        // var akhir_Jam_istirahat = tanggalString + " " + akhirIstirahat;
        // Hitung selisih jam antara "Masuk" dan "Pulang" untuk tanggal ini
        const Jml_Jam = Math.round((jamPulang - jamMasuk) / (1000 * 60 * 60));
        const data = {
            id_divisi: gabungData,
            Tanggal1: DateTimePicker1.value,
            Tanggal2: DateTimePicker2.value,
            Jam_Masuk: startJam,
            Jam_Keluar: endJam,
            Jml_Jam: Jml_Jam,
            awal_Jam_istirahat: awalIstirahat,
            akhir_Jam_istirahat: akhirIstirahat,
            hari: hari,
            User_Input: "U001",
            opsi: "insertDivisi",
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "Jam");
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
    divisiSelect.addEventListener("change", function () {
        // Ambil nilai yang dipilih
        var selectedDivisi = divisiSelect.value;

        // Jika divisi dipilih, lakukan fetch data pegawai
        if (selectedDivisi !== "") {
            fetch("/AgendaMasuk/Jam/" + selectedDivisi + ".getPegawai") // Ganti dengan URL yang sesuai
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    // Hapus semua opsi yang ada di select pegawai
                    pegawaiSelect.innerHTML = "";

                    // Tambahkan opsi default
                    var defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.text = "Pilih Pegawai";
                    pegawaiSelect.appendChild(defaultOption);

                    // Tambahkan opsi pegawai berdasarkan data yang diterima dari server
                    data.forEach((item) => {
                        var option = document.createElement("option");
                        option.value = item.Kd_Pegawai; // Sesuaikan dengan properti yang sesuai
                        option.text = item.Kd_Pegawai; // Sesuaikan dengan properti yang sesuai
                        pegawaiSelect.appendChild(option);
                    });
                })
                .catch(function (error) {
                    console.error("Error fetching data:", error);
                });
        } else {
            // Jika divisi tidak dipilih, kosongkan select pegawai
            pegawaiSelect.innerHTML = "";
        }
    });
    generateButton.addEventListener("click", function () {
        const DateTimePicker1 = document.getElementById("TglAwal");
        const DateTimePicker2 = document.getElementById("TglAkhir");
        const kd_pegawai = document.getElementById("PegawaiSelect").value;
        const startDate = new Date(DateTimePicker1.value);
        const endDate = new Date(DateTimePicker2.value);
        const startJam = document.getElementById("masuk").value;
        const endJam = document.getElementById("pulang").value;
        const awalIstirahat = document.getElementById("masuk_istirahat").value;
        const akhirIstirahat =
            document.getElementById("pulang_istirahat").value;
        console.log(DateTimePicker1.value);

        for (
            let i = 0;
            i <= (endDate - startDate) / (1000 * 60 * 60 * 24);
            i++
        ) {
            const tanggal = new Date(startDate);
            tanggal.setDate(startDate.getDate() + i);
            const hari = tanggal.getDay();
            tanggalString = tanggal.toISOString().slice(0, 10);
            const jamMasuk = new Date(`${tanggalString}T${startJam}:00`);
            const jamPulang = new Date(`${tanggalString}T${endJam}:00`);
            var Jam_Masuk = tanggalString + " " + startJam;
            var Jam_Keluar = tanggalString + " " + endJam;
            var awal_Jam_istirahat = tanggalString + " " + awalIstirahat;
            var akhir_Jam_istirahat = tanggalString + " " + akhirIstirahat;
            // Hitung selisih jam antara "Masuk" dan "Pulang" untuk tanggal ini
            const Jml_Jam = Math.round(
                (jamPulang - jamMasuk) / (1000 * 60 * 60)
            );
            console.log(tanggal.toISOString().slice(0, 10));
            fetch(
                "/AgendaMasuk/Jam/" +
                    kd_pegawai +
                    "." +
                    tanggal.toISOString().slice(0, 10) +
                    ".cekAgenda"
            ) // Ganti dengan URL yang sesuai
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    console.log(data);
                    // Hapus semua opsi yang ada di select pegawai
                    if (data[0].ada >= 1) {
                        console.log("datanya ada");
                        alert("Agenda Sudah ada sehingga tidak bisa diproses");
                        return;
                    } else if (data[0].ada == 0) {
                        console.log("masuk gan");
                        if (hari === 0) {
                            const data = {
                                kd_pegawai: kd_pegawai,
                                Tanggal: tanggal.toISOString().slice(0, 10),
                                Jml_Jam: 0,
                                Ket_Absensi: "B",
                                User_Input: "U001",
                                opsi: "hariMinggu",
                            };

                            // let csrfToken = document
                            //     .querySelector('meta[name="csrf-token"]')
                            //     .getAttribute("content");

                            // Send the data to the server using AJAX
                            $.ajax({
                                url: "Jam", // Replace with the correct action URL
                                method: "POST",
                                data: {
                                    ...data,
                                    _token: csrfToken,
                                    // _method: "PUT",
                                    // _ifUpdate: "Update Barcode",
                                },
                                success: function (response) {
                                    console.log("Form submitted successfully!");
                                    alert("Berhasil input agenda minggu");
                                    // Handle the server's response if needed
                                },
                                error: function (error) {
                                    console.error(
                                        "Form submission error:",
                                        error
                                    );
                                    // Handle the error if needed
                                },
                            });
                        } else if (hari >= 1 && hari <= 6) {
                            const data = {
                                kd_pegawai: kd_pegawai,
                                Tanggal: DateTimePicker1.value,
                                Jam_Masuk: Jam_Masuk,
                                Jam_Keluar: Jam_Keluar,
                                Jml_Jam: 0,
                                awal_Jam_istirahat: awal_Jam_istirahat,
                                akhir_Jam_istirahat: akhir_Jam_istirahat,
                                Ket_Absensi: "M",
                                User_Input: "U001",
                                opsi: "hariNormal",
                            };

                            let csrfToken = document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content");

                            // Send the data to the server using AJAX
                            $.ajax({
                                url: "Jam", // Replace with the correct action URL
                                method: "POST",
                                data: {
                                    ...data,
                                    _token: csrfToken,
                                    // _method: "PUT",
                                    // _ifUpdate: "Update Barcode",
                                },
                                success: function (response) {
                                    console.log("Form submitted successfully!");
                                    alert("Berhasil input agenda normal");
                                    // Handle the server's response if needed
                                },
                                error: function (error) {
                                    console.error(
                                        "Form submission error:",
                                        error
                                    );
                                    // Handle the error if needed
                                },
                            });
                        }
                    }
                    // Tambahkan opsi pegawai berdasarkan data yang diterima dari server
                })
                .catch(function (error) {
                    console.error("Error fetching data:", error);
                });
        }
    });
});
