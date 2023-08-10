//#region variabel
let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");

let table_data = $("#tableProsesPembeli").DataTable();
let refresh = document.getElementById("refresh");
let user_id = 4384;

let nogam = document.getElementById("nogam");
let idorder = document.getElementById("idorder");
let formproses = document.getElementById("formproses");
let methodForm = document.getElementById("methodForm");
var arraycheckbox = [];
var rowIndexArray = [];

//#endregion

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

//#region tambil all order
function AllData(tglAwal, tglAkhir) {
    fetch("/getalldataPembeliGambar/" + tglAwal + "/" + tglAkhir)
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

                alert(
                    "Belum Ada Order Yg Sudah DiTerima U/ tgl " +
                        tglAwal.Value +
                        " s/d tgl " +
                        tglAkhir.Value
                );
            } else {
                console.log(datas); // Optional: Check the data in the console
                table_data = $("#tableProsesPembeli").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        {
                            title: "No. Order",
                            data: "Id_Order",
                            render: function (data) {
                                return `<input type="checkbox" name="PembeliCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        // { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tgl. Order", data: "Tgl_Order" },
                        { title: "Nama Barang", data: "Nama_Brg" },
                        {
                            title: "Jumlah",
                            data: "Nama_satuan",
                            render: function (data) {
                                return `1 ${data}`;
                            },
                        },
                        { title: "Divisi", data: "NamaDivisi" },
                        { title: "Status Order", data: "Status" },
                        { title: "Keterangan Order", data: "Ket_Order" },
                        { title: "Peng-Order", data: "NmUserOd" },
                        { title: "No.Gambar", data: "No_Gbr_Rev" },
                        { title: "Nm.Brg", data: "Nm_Brg" },
                    ],
                });
                table_data.draw();
            }
        });
}
//#endregion

//#region tgl2 on click
tgl_akhir.addEventListener("keypress", function (event) {
    // Mengecek apakah tombol yang ditekan adalah tombol 'Enter'
    if (event.key === "Enter") {
        // Tambahkan kode yang ingin Anda jalankan saat tombol 'Enter' ditekan di sini
        AllData(tgl_awal.value, tgl_akhir.value);
        //console.log('Tombol Enter ditekan!');
    }
});
//#endregion

//#region refresh
refresh.addEventListener("click", function (event) {
    event.preventDefault();
    AllData(tgl_awal.value, tgl_akhir.value);
});
//#endregion

//#region proses klik
$("#tableProsesPembeli tbody").on("click", "tr", function () {
    var data = table_data.row(this).data(); // Mendapatkan data dari baris yang diklik
    console.log(data);
    console.log(table_data.data());
    Nogambar = data.No_Gambar; // Mengambil data dari kolom "Divisi"

    // Lakukan apa pun yang Anda ingin lakukan dengan data divisi
    // console.log("Divisi:", divisicek);
});
function klikproses() {
    rowIndexArray = [];
    //console.log(table_data.rows().count());
    if (table_data.rows().count() != 0) {
        $("input[name='PembeliCheckbox']:checked").each(function () {
            let rowIndex = $(this).closest("tr").index();
            // console.log(rowIndex);
            rowIndexArray.push(rowIndex);
            // console.log(rowIndexArray);

            // Do something with the row index, such as logging it
            if (user_id != 2697) {
                alert("Login " + user_id + " Tidak BerHak MemProses");
                return;
            } else {
                arraycheckbox.push(value);
            }
        });
        if (arraycheckbox.length > 0) {
            var arrayString = arraycheckbox.join(",");
            idorder.value = arrayString;
            methodForm.value = "PUT";
            formproses.action = "/ProsesPembeliGambar/" + idorder.value;
            formproses.submit();
        }
        //console.log(acc_order.value , batal_acc.value , order_tolak.value);
    }
}
//#endregion
