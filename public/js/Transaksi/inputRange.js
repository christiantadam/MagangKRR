$(document).ready(function () {
    const tambahButton = document.getElementById("tambahButton");
    const koreksiButton = document.getElementById("koreksiButton");
    const hapusButton = document.getElementById("hapusButton");
    const prosesButton = document.getElementById("prosesButton");
    const batalButton = document.getElementById("batalButton");
    const tambahSection = document.getElementById("tambahSection");
    const koreksiSection = document.getElementById("koreksiSection");

    var proses = 0;
    function ambilDataAgenda(tanggal, kd_pegawai) {
        let dataAgenda = [];
        fetch("/ProgramPayroll/InputRange/" + kd_pegawai + "." + tanggal + ".getAgenda")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                data.forEach((item) => {
                    dataAgenda.push(item.id_agenda);
                });
                console.log(dataAgenda.length);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        console.log(dataAgenda);
        return dataAgenda;
    }
    tambahButton.addEventListener("click", function (event) {
        proses = 1;
        event.preventDefault();
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        batalButton.disabled = false;
        prosesButton.disabled = false;
    });
    hapusButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 2;
        tambahButton.disabled = true;
        hapusButton.disabled = true;
        batalButton.disabled = false;
        prosesButton.disabled = false;
    });
    batalButton.addEventListener("click", function (event) {
        event.preventDefault();
        proses = 0;

        tambahButton.disabled = false;
        hapusButton.disabled = false;
        batalButton.disabled = true;
        prosesButton.disabled = true;
    });
    prosesButton.addEventListener("click", function (event) {
        if (proses == 1) {
            const TglMulai = document.getElementById("TglMulai").value;
            const Kd_Pegawai = document.getElementById("Id_Pegawai").value;
            const Nama_Peg = document.getElementById("Nama_Pegawai").value;
            const TglSelesai = document.getElementById("TglSelesai").value;
            const ket_absen = document.getElementById("Keterangan").value;
            const alasan = document.getElementById("Alasan").value;
            const kdklinik = document.getElementById("Id_Klinik").value;
            console.log(TglMulai);
            let startDate = new Date(TglMulai);
            let endDate = new Date(TglSelesai);
            let selisih = endDate - startDate;

            let jmlhari = (selisih / (1000 * 60 * 60 * 24)) + 1;
            if (startDate > endDate) {
                alert("Dicek dulu tanggalnya !");
                return;
            }
            if (ket_absen === "S" && kdklinik === "") {
                alert("Klinik harus diisi");
                return;
            }
            if (
                !TglMulai ||
                !TglSelesai ||
                !Kd_Pegawai ||
                !ket_absen ||
                !alasan
            ) {
                alert("Masih ada form yang kosong !");
                return; // Stop executing the function
            }



            var konfirmasi = confirm(
                "Apakah Anda yakin memproses data " +
                    Nama_Peg +
                    "\nsebanyak " +
                    jmlhari +
                    " hari?"
            );

            if (konfirmasi) {
                // Jika pengguna mengklik OK
                // Lakukan tindakan sesuai dengan persetujuan pengguna di sini
                console.log("Data diproses.");
            } else {
                // Jika pengguna mengklik Batal
                // Lakukan tindakan sesuai dengan pembatalan pengguna di sini
                console.log("Pemrosesan data dibatalkan.");
                return;
            }
            const data = {
                kdpegawai: Kd_Pegawai,
                Tanggal1: TglMulai,
                Tanggal2: TglSelesai,
                ketabsensi: ket_absen,
                userid: "U001",
                kdklinik: kdklinik,
                alasan: alasan,
            };
            console.log(data);

            const formContainer = document.getElementById("form-container");
            const form = document.createElement("form");
            form.setAttribute("action", "InputRange");
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
    });
    // while (startDate <= endDate) {
    //     let formattedDate = `${startDate.getFullYear()}-${(
    //         startDate.getMonth() + 1
    //     )
    //         .toString()
    //         .padStart(2, "0")}-${startDate
    //         .getDate()
    //         .toString()
    //         .padStart(2, "0")}`;
    //     console.log(formattedDate);
    //     fetch(
    //         "/InputRange/" +
    //             Kd_Pegawai +
    //             "." +
    //             formattedDate +
    //             ".cekLembur"
    //     )
    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error("Network response was not ok");
    //             }
    //             return response.json(); // Assuming the response is in JSON format
    //         })
    //         .then((data) => {
    //             console.log("Apakah ada ?? =" + data[0].ada);
    //             let dataAgenda = [];
    //             fetch(
    //                 "/InputRange/" +
    //                     Kd_Pegawai +
    //                     "." +
    //                     TglMulai +
    //                     ".getAgenda"
    //             )
    //                 .then((response) => {
    //                     if (!response.ok) {
    //                         throw new Error(
    //                             "Network response was not ok"
    //                         );
    //                     }
    //                     return response.json(); // Assuming the response is in JSON format
    //                 })
    //                 .then((data) => {
    //                     data.forEach((item) => {
    //                         dataAgenda.push(item.id_agenda);
    //                     });
    //                     console.log(dataAgenda.length);
    //                     if (dataAgenda.length > 0) {
    //                         for (
    //                             let k = 0;
    //                             k < dataAgenda.length;
    //                             k++
    //                         ) {
    //                             const idAgenda = dataAgenda[k];
    //                             if (ket_absen == "S") {
    //                                 const gabungData =
    //                                     idAgenda +
    //                                     "." +
    //                                     ket_absen +
    //                                     "." +
    //                                     alasan +
    //                                     "." +
    //                                     kdklinik;
    //                                 console.log(gabungData);
    //                             } else {
    //                                 const gabungData =
    //                                     idAgenda +
    //                                     "." +
    //                                     ket_absen +
    //                                     "." +
    //                                     alasan;
    //                                 console.log(gabungData);
    //                             }
    //                             const formContainer =
    //                                 document.getElementById(
    //                                     "form-container"
    //                                 );
    //                             const form =
    //                                 document.createElement("form");
    //                             form.setAttribute(
    //                                 "action",
    //                                 "InputRange/{idAgenda}"
    //                             );
    //                             form.setAttribute("method", "POST");

    //                             // Loop through the data object and add hidden input fields to the form
    //                             for (const key in data) {
    //                                 const input =
    //                                     document.createElement("input");
    //                                 input.setAttribute(
    //                                     "type",
    //                                     "hidden"
    //                                 );
    //                                 input.setAttribute("name", key);
    //                                 input.value = data[key]; // Set the value of the input field to the corresponding data
    //                                 form.appendChild(input);
    //                             }
    //                             // Create method input with "PUT" Value
    //                             const method =
    //                                 document.createElement("input");
    //                             method.setAttribute("type", "hidden");
    //                             method.setAttribute("name", "_method");
    //                             method.value = "PUT"; // Set the value of the input field to the corresponding data
    //                             form.appendChild(method);

    //                             // Create input with "Update Keluarga" Value
    //                             const ifUpdate =
    //                                 document.createElement("input");
    //                             ifUpdate.setAttribute("type", "hidden");
    //                             ifUpdate.setAttribute(
    //                                 "name",
    //                                 "_ifUpdate"
    //                             );
    //                             ifUpdate.value = "Update Keluarga"; // Set the value of the input field to the corresponding data
    //                             form.appendChild(ifUpdate);

    //                             formContainer.appendChild(form);

    //                             // Add CSRF token input field (assuming the csrfToken is properly fetched)
    //                             let csrfToken = document
    //                                 .querySelector(
    //                                     'meta[name="csrf-token"]'
    //                                 )
    //                                 .getAttribute("content");
    //                             let csrfInput =
    //                                 document.createElement("input");
    //                             csrfInput.type = "hidden";
    //                             csrfInput.name = "_token";
    //                             csrfInput.value = csrfToken;
    //                             form.appendChild(csrfInput);

    //                             // Wrap form submission in a Promise
    //                             function submitForm() {
    //                                 return new Promise(
    //                                     (resolve, reject) => {
    //                                         form.onsubmit = resolve; // Resolve the Promise when the form is submitted
    //                                         form.submit();
    //                                     }
    //                                 );
    //                             }

    //                             // Call the submitForm function to initiate the form submission
    //                             submitForm()
    //                                 .then(() =>
    //                                     console.log(
    //                                         "Form submitted successfully!"
    //                                     )
    //                                 )
    //                                 .catch((error) =>
    //                                     console.error(
    //                                         "Form submission error:",
    //                                         error
    //                                     )
    //                                 );
    //                         }
    //                     }
    //                 })
    //                 .catch((error) => {
    //                     console.error("Error:", error);
    //                 });

    //             // if (data[0].ada == 0) {
    //             // var dtAgenda = [];
    //             // dtAgenda = ambilDataAgenda(TglMulai, Kd_Pegawai);
    //         })
    //         .catch((error) => {
    //             console.error("Error:", error);
    //         });
    //     startDate.setDate(startDate.getDate() + 1);
    // }
    // } else if (proses == 2) {
    //     //Hapus
    //     const idklinik = document.getElementById("Id_Klinik").value;
    //     if (idklinik === "") {
    //         alert("Pilih Dulu Kliniknya !");
    //         return; // Menghentikan eksekusi lebih lanjut
    //     }
    //     const data = {
    //         idklinik: idklinik,
    //     };

    //     const formContainer = document.getElementById("form-container");
    //     const form = document.createElement("form");
    //     form.setAttribute("action", "InputRange/{idklinik}");
    //     form.setAttribute("method", "POST");

    //     // Loop through the data object and add hidden input fields to the form
    //     for (const key in data) {
    //         const input = document.createElement("input");
    //         input.setAttribute("type", "hidden");
    //         input.setAttribute("name", key);
    //         input.value = data[key]; // Set the value of the input field to the corresponding data
    //         form.appendChild(input);
    //     }

    //     // Create method input with "PUT" Value
    //     const method = document.createElement("input");
    //     method.setAttribute("type", "hidden");
    //     method.setAttribute("name", "_method");
    //     method.value = "DELETE"; // Set the value of the input field to the corresponding data
    //     form.appendChild(method);

    //     formContainer.appendChild(form);

    //     // Add CSRF token input field (assuming the csrfToken is properly fetched)
    //     let csrfToken = document
    //         .querySelector('meta[name="csrf-token"]')
    //         .getAttribute("content");
    //     let csrfInput = document.createElement("input");
    //     csrfInput.type = "hidden";
    //     csrfInput.name = "_token";
    //     csrfInput.value = csrfToken;
    //     form.appendChild(csrfInput);

    //     // Wrap form submission in a Promise
    //     function submitForm() {
    //         return new Promise((resolve, reject) => {
    //             form.onsubmit = resolve; // Resolve the Promise when the form is submitted
    //             form.submit();
    //         });
    //     }

    //     // Call the submitForm function to initiate the form submission
    //     submitForm()
    //         .then(() => console.log("Form submitted successfully!"))
    //         .catch((error) =>
    //             console.error("Form submission error:", error)
    //         );
    // }

    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Pegawai").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Klinik").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Divisi").val(rowData[0]);
        $("#Nama_Divisi").val(rowData[1]);

        var kode = document.getElementById("Id_Divisi").value;
        fetch("/ProgramPayroll/InputRange/" + kode + ".getPegawai")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
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
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Pegawai tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Pegawai").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Pegawai").val(rowData[0]);
        $("#Nama_Pegawai").val(rowData[1]);

        hideModalPegawai();
    });
    $("#table_Klinik tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Klinik").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Klinik").val(rowData[0]);
        $("#Nama_Klinik").val(rowData[1]);

        hideModalKlinik();
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
function showModalKlinik() {
    $("#modalKlinik").modal("show");
}
function hideModalKlinik() {
    $("#modalKlinik").modal("hide");
}
function toggleButton() {
    var selectElement = document.getElementById("Keterangan");
    var buttonElement = document.getElementById("klinikButton");

    if (selectElement.value === "S") {
        // Ubah "S" ke opsi yang Anda inginkan untuk mengaktifkan tombol
        buttonElement.disabled = false;
    } else {
        buttonElement.disabled = true;
    }
}
