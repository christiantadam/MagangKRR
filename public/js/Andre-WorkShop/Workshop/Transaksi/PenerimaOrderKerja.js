let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");
let table_data = $("#tablePenerimaOrderKerja").DataTable();
let refresh = document.getElementById("refresh");
let cek = false;
let iduser = document.getElementById("iduser");
let user = 4384;
iduser.value = user;
var panjangdata;
let arraycheckbox = [];

let acc_order = document.getElementById("acc_order");
let batal_acc = document.getElementById("batal_acc");
let tunda = document.getElementById("tunda");
let order_tolak = document.getElementById("order_tolak");

let ket = [];
let radiobox = document.getElementById("radiobox");
let semuacentang = document.getElementById("semuacentang");
let formPemerimaOrderKerja = document.getElementById("formPemerimaOrderKerja");
let methodForm = document.getElementById("methodForm");
let KetTdkS = document.getElementById("KetTdkS");
let openmodaltunda = false;
let btnproses = document.getElementById("btnproses");
let prosesmodaltunda = document.getElementById('prosesmodaltunda');
let FormTundaModal = document.getElementById('FormTundaModal');
let methodFormModalTunda = document.getElementById('methodFormModalTunda');
let btnkoreksi = document.getElementById('btnkoreksi');
let order_kerja = document.getElementById('order_kerja');
let order_selesai = document.getElementById('order_selesai');
let order_batal = document.getElementById('order_batal');
var trselect;

let ModalKoreksi = document.getElementById('ModalKoreksi');
let FormKoreksiModal = document.getElementById('FormKoreksiModal');
let tglOrder = document.getElementById('tglOrder');
let NoOrder = document.getElementById('NoOrder');
let NoGambar = document.getElementById('NoGambar');
let KdBarang = document.getElementById('KdBarang');
let Divisi = document.getElementById('Divisi');
let NamaBarang = document.getElementById('NamaBarang');
let KeteranganOrder = document.getElementById('KeteranganOrder');
let JumlahOrder = document.getElementById('JumlahOrder');
let JumlahOrderSelesai = document.getElementById('JumlahOrderSelesai');
let TanggalStart = document.getElementById('TanggalStart');
let TanggalFinish = document.getElementById('TanggalFinish');
let Usermodalkoreksi = document.getElementById('Usermodalkoreksi');
let LblNamaUser = document.getElementById('LblNamaUser');

//#region set tanggal
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

//#region tgl2 di klik

tgl_akhir.addEventListener("keypress", function (event) {
    // Mengecek apakah tombol yang ditekan adalah tombol 'Enter'
    if (event.key === "Enter") {
        // Tambahkan kode yang ingin Anda jalankan saat tombol 'Enter' ditekan di sini
        AllData(tgl_awal.value, tgl_akhir.value);
        //console.log('Tombol Enter ditekan!');
    }
});

//#endregion

//#region alldata

function AllData(tglAwal, tglAkhir) {
    fetch("/getalldataPenerimaOrderKerja/" + tglAwal + "/" + tglAkhir)
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
                table_data = $("#tablePenerimaOrderKerja").DataTable({
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
                        { title: "Kd.Barang", data: "Kd_Brg" },
                        { title: "No.Gambar", data: "No_Gbr" },
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

//#region set warna

table_data.on("draw", function () {
    table_data.rows().every(function () {
        let data = this.data();
        if (data.Acc_Mng !== null && data.User_Rcv == null) {
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
        if (data.Tgl_Pending !== null) {
            if (data.Acc_Mng !== null && data.User_Rcv === null) {
                $(this.node()).removeClass();
                $(this.node()).addClass("red-color");
            } else if (
                data.Acc_Mng !== null &&
                data.User_Rcv !== null &&
                data.Tgl_Finish == null
            ) {
                $(this.node()).removeClass();
                $(this.node()).addClass("blue-color");
            } else {
                $(this.node()).removeClass();
                $(this.node()).addClass("Magenta-color");
            }
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

//#region klik proses

function klikproses() {
    //console.log(table_data.rows().count());
    if (table_data.rows().count() != 0) {
        fetch("/cekuserPenerimaOrderKerja/" + iduser.value)
            .then((response) => response.json())
            .then((datas) => {
                // console.log(datas);
                panjangdata = datas[0].ada;
            });
        if (panjangdata == 0) {
            alert("Login " + user + " Tidak berHak utk memproses.");
            return;
        } else {
            $("input[name='penerimaCheckbox']").each(function () {
                // Ambil nilai 'value' dan status 'checked' dari checkbox
                let value = $(this).val();
                let isChecked = $(this).prop("checked");
                let closestTd = $(this).closest("tr");
                console.log(closestTd);
                // Lakukan sesuatu berdasarkan status 'checked'
                if (acc_order.checked == true) {
                    if (
                        isChecked &&
                        (closestTd.hasClass("black-color") ||
                            closestTd.hasClass("Magenta-color"))
                    ) {
                        arraycheckbox.push(value);
                    }
                } else if (batal_acc.checked == true) {
                    if (isChecked && closestTd.hasClass("red-color")) {
                        arraycheckbox.push(value);
                    }
                } else if (order_tolak.checked == true) {
                    if (
                        isChecked &&
                        (closestTd.hasClass("black-color") ||
                            closestTd.hasClass("Magenta-color"))
                    ) {
                        Ket_tolak = prompt(
                            "Alasan Ditolak Order" + value + " :"
                        );
                        ket.push(Ket_tolak);
                        arraycheckbox.push(value);
                    }
                } else if (tunda.checked == true) {
                    // console.log("tunda " + tunda.checked);
                    if (isChecked && closestTd.hasClass("black-color")) {
                        // console.log("masuk");
                        openmodaltunda = true;
                        console.log(openmodaltunda);
                    }
                }
            });
            //console.log(acc_order.value , batal_acc.value , order_tolak.value);
            if (
                acc_order.checked == false &&
                batal_acc.checked == false &&
                order_tolak.checked == false &&
                tunda.checked == false
            ) {
                //console.log("masuk");
                alert(
                    "Pilih 'Order Diterima', 'Order Dibatalkan', 'Order Ditolak', atau 'Pending'"
                );
            } else {
                // console.log("panjang" + arraycheckbox.length);
                // console.log("openmodal" + openmodaltunda);
                if (arraycheckbox.length > 0 || openmodaltunda == true) {
                    if (acc_order.checked == true) {
                        var arrayString = arraycheckbox.join(",");
                        radiobox.value = "acc";
                        semuacentang.value = arrayString;
                        methodForm.value = "PUT";
                        formPemerimaOrderKerja.action =
                            "/PenerimaOrderKerja/" + semuacentang.value;
                        formPemerimaOrderKerja.submit();
                    } else if (batal_acc.checked == true) {
                        var arrayString = arraycheckbox.join(",");
                        radiobox.value = "batal_acc";
                        semuacentang.value = arrayString;
                        methodForm.value = "PUT";
                        formPemerimaOrderKerja.action =
                            "/PenerimaOrderKerja/" + semuacentang.value;
                        formPemerimaOrderKerja.submit();
                    } else if (order_tolak.checked == true) {
                        var arrayString = arraycheckbox.join(",");
                        var arrayString1 = ket.join(",");
                        radiobox.value = "tolak_setuju";
                        KetTdkS.value = arrayString1;
                        semuacentang.value = arrayString;
                        methodForm.value = "PUT";
                        formPemerimaOrderKerja.action =
                            "/PenerimaOrderKerja/" + semuacentang.value;
                        formPemerimaOrderKerja.submit();
                    } else if (tunda.checked == true) {
                        //open modal
                        btnproses.setAttribute("data-toggle", "modal");
                        btnproses.setAttribute("data-target", "#modaltunda");

                    }
                }
                if (openmodaltunda == false) {
                    if (arraycheckbox.length == 0) {
                        alert("Pilih Nomer Order Yang Akan DiPROSES.");
                    }
                }
            }
        }
    }
}

//#endregion

//#region proses modal tunda

prosesmodaltunda.addEventListener('click', function(event){
    event.preventDefault();
    var arrayString = arraycheckbox.join(",");

})

//#endregion

//#region koreksi di klik

function koreksiklik() {
    if (
        order_kerja.checked == false &&
        order_selesai.checked == false &&
        order_batal.checked == false
    ) {
        alert(
            "Pilih 'Order DiKerjakan' atau 'Order Selesai' atau 'Order Dibatalkan"
        );
    } else {
        let no_order;
        var arrayindex = [];
        $("input[name='penerimaCheckbox']:checked").each(function () {
            let rowIndex = $(this).closest("tr").index();
            let closestTr = $(this).closest("tr");
            // console.log(rowIndex);
            no_order = this.value;
            trselect = closestTr;
            index = rowIndex;
            arrayindex.push(index);
            console.log(trselect);
            // let value = this.value;
            // console.log(rowIndexArray);
        });
        console.log(index);
        if (arrayindex.length === 0 || arrayindex.length > 1) {
            alert("Pilih 1 Data Untuk DiPROSES");
        } else {
            if (trselect.hasClass("red-color") && order_batal.checked == true) {
                alert("Proses Order Untuk Dikerjakan Dulu Atau Batal ACC");
                return;
            }
            if (trselect.hasClass("black-color")) {
                alert("Proses Order Untuk Diterima Dulu, baru Koreksi");
                return;
            }
            if (trselect.hasClass("red-color") && order_selesai.checked == true) {
                alert("Proses Order Untuk Dikerjakan Dulu");

                return;
            }
            else if (order_kerja.checked == true || order_selesai.checked == true) {
                btnkoreksi.setAttribute("data-toggle", "modal");
                btnkoreksi.setAttribute("data-target", "#ModalKoreksi");
            } else {
                btnkoreksi.setAttribute("data-toggle", "");
                btnkoreksi.setAttribute("data-target", "");
            }
            if (
                trselect.hasClass("red-color") ||
                (trselect.hasClass("blue-color") && order_kerja.checked == true)
            ) {
                // console.log(table_data.cell(index, 0).data());
                // tglOrder.value = table_data.cell(index, 1).data();
                // noOrder.value = table_data.cell(index, 0).data();
                // Divisimodal.value = table_data.cell(index, 7).data();
                // NamaBarangModal.value = table_data.cell(index, 3).data();
                // noGambar.value = table_data.cell(index, 4).data();
                // KeteranganModal.value = table_data.cell(index, 9).data();
                // JumlahModal.value = table_data.cell(index, 5).data();
                // lblstatus.textContent = table_data.cell(index, 6).data();
                // TuserOd.value = table_data.cell(index, 11).data();
                // Tsts.value = 1;
            }
            if (
                trselect.hasClass("blue-color") &&
                order_selesai.checked == true
            ) {
                // tglOrder.value = table_data.cell(index, 1).data();
                // noOrder.value = table_data.cell(index, 0).data();
                // Divisimodal.value = table_data.cell(index, 7).data();
                // NamaBarangModal.value = table_data.cell(index, 3).data();
                // noGambar.value = table_data.cell(index, 4).data();
                // KeteranganModal.value = table_data.cell(index, 9).data();
                // JumlahModal.value = table_data.cell(index, 5).data();
                // lblstatus.textContent = table_data.cell(index, 6).data();
                // TuserOd.value = table_data.cell(index, 11).data();
                // Tsts.value = 2;
            }
            if (
                trselect.hasClass("blue-color") &&
                order_batal.checked == true
            ) {
                // let ada;
                // fetch("/cekuserkoreksi/" + user)
                //     .then((response) => response.json())
                //     .then((datas) => {
                //         console.log(datas[0].ada);
                //         ada = datas[0].ada;
                //     });
                // if (ada == 0) {
                //     alert("Login " + user + " Tidak berHak utk memproses.");
                // } else {
                //     Ket_batal = prompt("Alasan Dibatalkan : ");
                //     if (Ket_batal !== null) {
                //         ketbatal.value = Ket_batal;
                //         no_orderkoreksi.value = no_order;
                //         methodForm.value = "PUT";
                //         radiobox.value = "order_batal";
                //         formPemerimaGambar.action =
                //             "/PenerimaOrderGambar/" + no_orderkoreksi.value;
                //         formPemerimaGambar.submit();
                //     }

                // }
            }


        }
    }
}

//#endregion
