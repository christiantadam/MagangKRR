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
            const jumlahCicilan = document.getElementById("jumlahCicilan").value;
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
    });
    processButton.addEventListener("click", function (event) {
        table.rows().every(function(index, element) {
            // Mendapatkan data baris saat ini sebagai array
            var rowData = this.data();

            // Loop melalui setiap kolom dalam data baris saat ini
            rowData.forEach(function(value, columnIndex) {
                // Lakukan sesuatu dengan nilai dalam kolom ini (misalnya, tampilkan dalam konsol)
                console.log("Baris ke-" + index + ", Kolom ke-" + columnIndex + ": " + value);
            });

            // Atau, jika Anda ingin mengakses nilai kolom tertentu dalam baris ini, gunakan indeks kolomnya
            // var specificColumnValue = rowData[specificColumnIndex];

            // Lanjutkan ke baris berikutnya
            return true;
        });
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
