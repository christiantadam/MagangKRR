$(document).ready(function () {
    const buttonListData = document.getElementById("buttonListData");
    const UpdateButton = document.getElementById("UpdateButton");
    const okButton = document.getElementById("okButton");
    const processButton = document.getElementById("processButton");
    var table = $("#tabel_Hutang").DataTable({
        order: [[0, "asc"]],
        select: {
            style: "single",
        },
    });
    UpdateButton.addEventListener("click", function (event) {
        showModalUpdate();
    });
    okButton.addEventListener("click", function (event) {
        var selectedRowData = table.row({ selected: true }).data();
        if (selectedRowData) {
            // Mendapatkan indeks kolom yang ingin Anda update (misalnya indeks kolom ke-1)
            const jumlahCicilan =
                document.getElementById("jumlahCicilan").value;
            var columnIndex = 5;

            // Menetapkan nilai baru ke kolom terpilih
            var newValue = jumlahCicilan;
            selectedRowData[columnIndex] = newValue;

            // Memperbarui tampilan tabel
            table.row({ selected: true }).data(selectedRowData).draw();
        } else {
            // Tidak ada baris terpilih
            console.log("Tidak ada baris terpilih.");
        }
        hideModalUpdate();
    });
    processButton.addEventListener("click", function (event) {
        var listNomorHutang = "";
        var listNilaiAngsuran = "";
        var listSisa = "";
        const tanggal_Hutang = document.getElementById("tanggal_Hutang").value;
        table.rows().every(function (index, element) {
            // Mendapatkan data baris saat ini sebagai array
            var rowData = this.data();

            // Loop melalui setiap kolom dalam data baris saat ini
            // rowData.forEach(function(value, columnIndex) {
            //     // Lakukan sesuatu dengan nilai dalam kolom ini (misalnya, tampilkan dalam konsol)
            //     console.log("Baris ke-" + index + ", Kolom ke-" + columnIndex + ": " + value);
            // });
            console.log(
                "Baris ke-" + index + ", Kolom ke-" + 5 + ": " + rowData[4]
            );
            // rowData[6] = rowData[4]- rowData[5];
            let angsuran;
            if (isNaN(rowData[5])) {
                angsuran = 0;
                listNilaiAngsuran += '0.'; // Jika bukan angka, tambahkan '0' ke dalam list
            } else {
                angsuran = rowData[5];
                listNilaiAngsuran += rowData[5] + '.'; // Jika angka, tambahkan nilai angka ke dalam list
            }
            rowData[5] = angsuran
            table
                .cell(index, 6)
                .data(rowData[4] - rowData[5])
                .draw();
            listNomorHutang += rowData[3] + ".";

            listSisa += rowData[6] + ".";
            // Atau, jika Anda ingin mengakses nilai kolom tertentu dalam baris ini, gunakan indeks kolomnya
            // var specificColumnValue = rowData[specificColumnIndex];

            // Lanjutkan ke baris berikutnya
            return true;
        });
        listNomorHutang = listNomorHutang.slice(0, -1);
        listNilaiAngsuran = listNilaiAngsuran.slice(0, -1);
        listSisa = listSisa.slice(0, -1);
        console.log(listNomorHutang, listNilaiAngsuran, listSisa);
        const data = {
            listNomorHutang: listNomorHutang,
            listNilaiAngsuran: listNilaiAngsuran,
            listSisa: listSisa,
            tanggal_Hutang: tanggal_Hutang,

        };

        // Add CSRF token input field (assuming the csrfToken is properly fetched)
        // let csrfToken = document
        //     .querySelector('meta[name="csrf-token"]')
        //     .getAttribute("content");

        // // Send the data to the server using AJAX
        // $.ajax({
        //     url: "AngsuranHutang/prosesData", // Replace with the correct action URL
        //     method: "POST",
        //     data: {
        //         ...data,
        //         _token: csrfToken,
        //         _method: "PUT",
        //         _ifUpdate: "Update Hutang"
        //     },
        //     success: function(response) {
        //         console.log("Form submitted successfully!");
        //         // Handle the server's response if needed
        //     },
        //     error: function(error) {
        //         console.error("Form submission error:", error);
        //         // Handle the error if needed
        //     }
        // });
        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "AngsuranHutang/prosesData");
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
        ifUpdate.value = "Update Hutang"; // Set the value of the input field to the corresponding data
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
            .catch((error) =>
                console.error("Form submission error:", error)
            );
    });
    buttonListData.addEventListener("click", function (event) {
        const Tanggal = document.getElementById("tanggal_Hutang");
        let tanggal_str = Tanggal.value;
        let tanggal_obj = new Date(tanggal_str);
        let tanggal_sekarang = new Date();
        console.log();
        // Periksa apakah tanggal lebih besar dari tanggal sekarang
        if (tanggal_obj.getTime() < tanggal_sekarang.getTime()) {
            alert("Tanggal Harus Lebih Besar Dari Tanggal System");
            return;
        }

        // Periksa apakah tanggal adalah akhir periode gajian
        if (tanggal_obj.getDay() !== 3) {
            alert("Bukan Akhir Periode Gajian");
            return;
        }

        // Cek double tanggal

        fetch(
            "/ProgramPayroll/Angsuran/AngsuranHutang/" +
                Tanggal.value +
                ".cekTanggal"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data[0].jumlah > 0) {
                    alert("DATA SUDAH PERNAH DIPROSES UNTUK TANGGAL TERSEBUT");
                    return;
                } else {
                    fetch(
                        "/ProgramPayroll/Angsuran/AngsuranHutang/" +
                            Tanggal.value +
                            ".getListData"
                    )
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json(); // Assuming the response is in JSON format
                        })
                        .then((data) => {
                            $("#tabel_Hutang").DataTable().clear().draw();
                            data.forEach((item) => {
                                var row = [
                                    item.Nama_Div,
                                    item.Kd_Pegawai,
                                    item.Nama_Peg,
                                    item.No_Bukti,
                                    item.Sisa_Hutang,
                                    item.Keterangan,
                                    "",
                                ];
                                $("#tabel_Hutang").DataTable().row.add(row);
                            });

                            // Redraw the table to show the changes
                            $("#tabel_Hutang").DataTable().draw();
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
function showModalUpdate() {
    $("#modalUpdate").modal("show");
}
function hideModalUpdate() {
    $("#modalUpdate").modal("hide");
}
