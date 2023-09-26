$(document).ready(function () {
    var divisiSelect = document.getElementById("DivisiSelect");

    // Ambil elemen select pegawai
    var pegawaiSelect = document.getElementById("PegawaiSelect");
    const generateButton = document.getElementById("generateButton");
    // Tambahkan event listener untuk perubahan pada select divisi
    $("#tabel_Divisi").DataTable({
        order: [[0, "asc"]],
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
                    } else {
                        if (hari === 0) {
                            const data = {
                                kd_pegawai: kd_pegawai,
                                Tanggal: tanggal.toISOString().slice(0, 10),
                                Jml_Jam: 0,
                                Ket_Absensi: "B",
                                User_Input: "U001",
                                opsi: "hariMinggu",
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

        // $.ajax({
        //     url: "/AgendaMasuk/Jam/" + kd_pegawai + "." + DateTimePicker1.value + ".cekAgenda",

        //     method: "GET", // Anda ingin menampilkan data, jadi metode HTTP harus GET
        //     success: function(response) {
        //         console.log("Data berhasil diambil!");
        //         getAjaxResponse = response;
        //         console.log(getAjaxResponse);
        //          // Data yang ditemukan akan tersedia di sini
        //     },
        //     error: function(error) {
        //         console.error("Error saat mengambil data:", error);
        //         // Handle the error if needed
        //     }
        // });
    });
});
