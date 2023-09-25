$(document).ready(function () {
    var divisiSelect = document.getElementById("DivisiSelect");

    // Ambil elemen select pegawai
    var pegawaiSelect = document.getElementById("PegawaiSelect");
    const generateButton = document.getElementById("generateButton");
    // Tambahkan event listener untuk perubahan pada select divisi
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
        fetch(
            "/AgendaMasuk/Jam/" +
                kd_pegawai +
                "." +
                DateTimePicker1.value +
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
                } else {
                    if (
                        DateTimePicker1.value === "" ||
                        DateTimePicker2.value === "" ||
                        kd_pegawai === ""
                    ) {
                        // Salah satu atau lebih elemen input memiliki nilai kosong
                        alert("Mohon isi semua field yang diperlukan.");
                        return; // Menghentikan eksekusi lebih lanjut
                    }
                    const data = {
                        kd_pegawai: kd_pegawai,
                        Tanggal: DateTimePicker1.value,
                        Jml_Jam: 0,
                        Ket_Absensi: 'B',
                        User_Input: 'U001',
                    };
                    console.log(data);

                    const formContainer =
                        document.getElementById("form-container");
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
                        .catch((error) =>
                            console.error("Form submission error:", error)
                        );
                }
                // Tambahkan opsi pegawai berdasarkan data yang diterima dari server
            })
            .catch(function (error) {
                console.error("Error fetching data:", error);
            });
    });
});
