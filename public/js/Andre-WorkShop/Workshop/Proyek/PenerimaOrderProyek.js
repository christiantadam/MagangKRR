let tgl_awal = document.getElementById('tgl_awal');
let tgl_akhir = document.getElementById('tgl_akhir');
let table_data = $("#TablePenerimaOrderProyek").DataTable();
let refresh = document.getElementById('refresh');
let cek = false;
//#region set tanggal

// Get the current date
const currentDate = new Date();

// Get the first day of the current month
const firstDayOfMonth = new Date();
firstDayOfMonth.setDate(1);
console.log(Date(currentDate.getFullYear(), currentDate.getMonth(), 1));

// Format the date to be in 'YYYY-MM-DD' format for setting the input value
const formattedFirstDay = firstDayOfMonth.toISOString().slice(0, 10);

// Format the current date to be in 'YYYY-MM-DD' format for setting the input value
const formattedCurrentDate = currentDate.toISOString().slice(0, 10);

// Set the values of the input fields to the calculated dates
tgl_awal.value = formattedFirstDay;
tgl_akhir.value = formattedCurrentDate;

//#endregion

//#region set warna

table_data.on("draw", function () {
    table_data.rows().every(function () {
        let data = this.data();
        if (
            data.Acc_Mng !== null &&
            data.User_Rcv == null
        ) {
            $(this.node()).removeClass();
            $(this.node()).addClass("red-color");
        }
        if (
            data.Acc_Mng !== null &&
            data.User_Rcv !== null &&
            data.Tgl_Finish == null
        ) {
            $(this.node()).removeClass();
            $(this.node()).addClass("blue-color");
        }
        if (data.Tgl_Pending !== null) {
            if (data.Acc_Mng !== null && data.User_Rcv == null) {
                $(this.node()).removeClass();
                $(this.node()).addClass("red-color");
            }
            else if (data.Acc_Mng !== null && data.User_Rcv !== null && data.Tgl_Finish == null) {
                $(this.node()).removeClass();
                $(this.node()).addClass("blue-color");
            }
            else {
                $(this.node()).removeClass();
                $(this.node()).addClass("Magenta-color");
            }
        }
        if (data.Tgl_Tolak_Mng !== null) {
            $(this.node()).removeClass();
            $(this.node()).addClass("green-color");
        }
        if (
            data.Acc_Mng == null &&
            data.User_Rcv == null &&
            data.Tgl_Finish == null &&
            data.Tgl_Tolak_Mng == null &&
            data.Tgl_Pending == null
        ) {
            $(this.node()).removeClass();
            $(this.node()).addClass("black-color");
        }
    });
});

//#endregion

//#region tgl akhir on enter

tgl_akhir.addEventListener("keypress", function (event) {
    // Mengecek apakah tombol yang ditekan adalah tombol 'Enter'
    if (event.key === "Enter") {
        // Tambahkan kode yang ingin Anda jalankan saat tombol 'Enter' ditekan di sini
        AllData(tgl_awal.value, tgl_akhir.value);
        //console.log('Tombol Enter ditekan!');
    }
});

//#endregion

//#region all data

function AllData(tglAwal, tglAkhir) {
    fetch("/GetDataAllPenerimaOrderProyek/" + tglAwal + "/" + tglAkhir)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            datas.forEach((data) => {
                // Ambil nilai Tgl_Order dari setiap objek data
                const tglOrder = data.Tgl_Order;
                // const tglTSmanager = data.Tgl_TdStjMg;

                // Split tanggal dan waktu dengan separator spasi
                const [tanggal, waktu] = tglOrder.split(" ");
                // const [tanggalTsM, waktuTsM] = tglTSmanager.split(" ");

                // Update properti Tgl_Order pada setiap objek data dengan format tanggal saja
                data.Tgl_Order = tanggal;
                // data.Tgl_TdStjMg = tanggalTsM;
            });
            if (datas.length == 0) {
                console.log("masuk ke == 0");

                alert("Belum Ada Order Gambar yang masuk.");
                table_data.clear().draw()
            } else {
                console.log(datas); // Optional: Check the data in the console
                table_data = $("#TablePenerimaOrderProyek").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        {
                            title: "No.Order",
                            data: "Id_Order",
                            render: function (data) {
                                return `<input type="checkbox" name="penerimaCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        // { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tgl.Order", data: "Tgl_Order" },
                        { title: "Tgl.ACC Direktur", data: "Tgl_Apv_2" },
                        { title: "Nama Proyek", data: "Nama_Proyek" },
                        {
                            title: "Jumlah",
                            data: null,
                            render: function (data, type, row) {
                                return `${row.Jml_Brg} ${row.Nama_satuan}`;
                            },
                        },
                        { title: "Status Order", data: "Status" },
                        { title: "Divisi", data: "NamaDivisi" },
                        { title: "Mesin", data: "Mesin" },
                        { title: "Keterangan Order", data: "Ket_Order" },
                        { title: "Peng-Order", data: "NmUserOd" },
                        { title: "UserOd", data: "User_Order" },
                    ],
                });
                table_data.draw();
            }
        });
}

//#endregion

//#region refresh

refresh.addEventListener("click", function (event) {
    event.preventDefault();
    AllData(tgl_awal.value, tgl_akhir.value);
});


//#endregion

//#region pilih semua

$("#pilihsemua").on("click", function () {
    // Get all the checkboxes within the DataTable
    const checkboxes = $(
        "input[name='penerimaCheckbox']",
        table_data.rows().nodes()
    );
    if (cek == false) {
        checkboxes.prop("checked", true);
        cek = true;
    } else if (cek == true) {
        checkboxes.prop("checked", false);
        cek = false;
    }
    // Check all the checkboxes
});

//#endregion
