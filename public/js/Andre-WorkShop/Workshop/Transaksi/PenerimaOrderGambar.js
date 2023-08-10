//#region variabel
let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");
let table_data = $("#tablepenerimagambar").DataTable();
let cek = false;
let refresh = document.getElementById("refresh");

let Ket_tolak;
let ket = [];
let KetTdkS = document.getElementById("KetTdkS");
let arraycheckbox = [];
let red = false;
let semuacentang = document.getElementById("semuacentang");
var panjangdata;
let acc_order = document.getElementById("acc_order");
let batal_acc = document.getElementById("batal_acc");
let order_tolak = document.getElementById("order_tolak");
let order_kerja = document.getElementById("order_kerja");
let order_selesai = document.getElementById("order_selesai");
let order_batal = document.getElementById("order_batal");

let methodForm = document.getElementById("methodForm");
let formPemerimaGambar = document.getElementById("formPemerimaGambar");

let user = 4384;
let iduser = document.getElementById("iduser");
iduser.value = user;

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

//#region set warna
//Css ACCDirekturGambar
table_data.on("draw", function () {
    table_data.rows().every(function () {
        let data = this.data();
        // console.log(
        //     data.Tgl_TdStjMg == null,
        //     data.User_Apv_1 == null,
        //     data.User_Apv_2 == null,
        //     data.Tgl_Tolak_Mng == null
        // );
        if (
            data.Acc_Mng !== null &&
            data.User_Rcv == null &&
            data.Tgl_Finish == null
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
        if (data.Tgl_Tolak_Mng !== null) {
            $(this.node()).removeClass();
            $(this.node()).addClass("green-color");
        }
        if (
            data.Acc_Mng == null &&
            data.User_Rcv == null &&
            data.Tgl_Finish == null &&
            data.Tgl_Tolak_Mng == null
        ) {
            $(this.node()).removeClass();
            $(this.node()).addClass("black-color");
        }
    });
});

//#endregion

//#region all data

function AllData(tglAwal, tglAkhir) {
    fetch("/getalldataPenerimaGambar/" + tglAwal + "/" + tglAkhir)
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
            } else {
                console.log(datas); // Optional: Check the data in the console
                table_data = $("#tablepenerimagambar").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        {
                            title: "No. Order",
                            data: "Id_Order",
                            render: function (data) {
                                return `<input type="checkbox" name="penerimaCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        // { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tgl. Order", data: "Tgl_Order" },
                        { title: "Tgl. ACC Direktur", data: "Tgl_Apv_2" },
                        { title: "Nama Barang", data: "Nama_Brg" },
                        { title: "NoGbrRev", data: "No_Gbr_Rev" },
                        {
                            title: "Jumlah",
                            data: "Nama_satuan",
                            render: function (data) {
                                return `1 ${data}`;
                            },
                        },
                        { title: "Status Order", data: "Status" },
                        { title: "Divisi", data: "NamaDivisi" },
                        { title: "Mesin", data: "Mesin" },
                        { title: "Keterangan Order", data: "Ket_Order" },
                        { title: "Peng-Order", data: "NmUserOd" },
                    ],
                });
                table_data.draw();
            }
        });
}

//#endregion

//#region tgl2 press enter
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

//#region button proses

function klikproses() {
    //console.log(table_data.rows().count());
    if (table_data.rows().count() != 0) {
        fetch("/cekuser/" + iduser.value)
            .then((response) => response.json())
            .then((datas) => {
                panjangdata = datas[0].ada;
            });
            if (panjangdata == 0) {
            alert("Login " + user + " Tidak berHak utk memproses.");
            return;
        }
        else{
            $("input[name='penerimaCheckbox']").each(function () {
                // Ambil nilai 'value' dan status 'checked' dari checkbox
                let value = $(this).val();
                let isChecked = $(this).prop("checked");
                let closestTd = $(this).closest("tr");
                console.log(closestTd);
                // Lakukan sesuatu berdasarkan status 'checked'
                if (acc_order.checked == true) {
                    if (isChecked && closestTd.hasClass("black-color")) {
                        arraycheckbox.push(value);
                    }
                } else if (batal_acc.checked == true) {
                    if (isChecked && closestTd.hasClass("red-color")) {
                        arraycheckbox.push(value);
                    }
                } else if (order_tolak.checked == true) {
                    if (isChecked && closestTd.hasClass("black-color")) {
                        Ket_tolak = prompt("Alasan Ditolak Order" + value + " :");
                        ket.push(Ket_tolak);
                        arraycheckbox.push(value);
                    }
                }
            });
            //console.log(acc_order.value , batal_acc.value , order_tolak.value);
            if (
                acc_order.checked == false &&
                batal_acc.checked == false &&
                order_tolak.checked == false
            ) {
                //console.log("masuk");
                alert("Pilih 'Order Diterima' atau 'Order Dibatalkan'");
            } else {
                if (arraycheckbox.length > 0) {
                    if (acc_order.checked == true) {
                        var arrayString = arraycheckbox.join(",");
                        radiobox.value = "acc";
                        semuacentang.value = arrayString;
                        methodForm.value = "PUT";
                        formPemerimaGambar.action =
                            "/PenerimaOrderGambar/" + semuacentang.value;
                        formPemerimaGambar.submit();
                    } else if (batal_acc.checked == true) {
                        var arrayString = arraycheckbox.join(",");
                        radiobox.value = "batal_acc";
                        semuacentang.value = arrayString;
                        methodForm.value = "PUT";
                        formPemerimaGambar.action =
                            "/PenerimaOrderGambar/" + semuacentang.value;
                        formPemerimaGambar.submit();
                    } else if (order_tolak.checked == true) {
                        var arrayString = arraycheckbox.join(",");
                        var arrayString1 = ket.join(",");
                        radiobox.value = "tolak_setuju";
                        KetTdkS.value = arrayString1;
                        semuacentang.value = arrayString;
                        methodForm.value = "PUT";
                        formPemerimaGambar.action =
                            "/PenerimaOrderGambar/" + semuacentang.value;
                        formPemerimaGambar.submit();
                    }
                }
                if (arraycheckbox.length == 0) {
                    alert("Pilih Nomer Order Yang Akan DiPROSES.");
                }
            }
        }


    }
}

//#endregion

//#region modal koreksi


//#endregion


//#region butn koreksi


//#endregion
