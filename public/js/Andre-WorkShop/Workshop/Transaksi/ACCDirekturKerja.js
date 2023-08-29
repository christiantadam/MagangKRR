let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");

let table_data = $("#tableACCDirekturKerja").DataTable();
let OkACCDirekturKerja = document.getElementById("OkACCDirekturKerja");
let refresh = document.getElementById("refresh");
let cek = false;
let idorder;
let primer = document.getElementById('primer');
let sekunder = document.getElementById('sekunder');
let tertier = document.getElementById('tertier');
//#region warna

table_data.on("draw", function () {
    table_data.rows().every(function () {
        let data = this.data();
        if (data.Tgl_TdStjDir !== null) {
            $(this.node()).removeClass();
            $(this.node()).addClass("gray-color");
        }
        if (data.User_Apv_2 == "Y" && data.Tgl_Tolak_Mng === null) {
            $(this.node()).removeClass();
            $(this.node()).addClass("red-color");
        }
        if (data.User_Apv_2 == "Y" && data.Tgl_Pending !== null) {
            $(this.node()).removeClass();
            $(this.node()).addClass("Fuchsia-color");
        }
        if (data.User_Apv_2 == "Y" && data.Tgl_Tolak_Mng !== null) {
            $(this.node()).removeClass();
            $(this.node()).addClass("green-color");
        }
        if (
            data.Tgl_TdStjDir == null &&
            data.User_Apv_2 == "N" &&
            data.Tgl_Tolak_Mng == null &&
            data.Tgl_Pending == null
        ) {
            $(this.node()).removeClass();
            $(this.node()).addClass("black-color");
        }
    });
});

//#endregion

//#region set tgl
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

//#region get data
function AllData(tglAwal, tglAkhir) {
    fetch("/getalldataACCDirekturKerja/" + tglAwal + "/" + tglAkhir)
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
                    "Tidak ada Order, tgl " + tglAwal + " s/d tgl " + tglAkhir
                );
            } else {
                //console.log(datas); // Optional: Check the data in the console
                table_data = $("#tableACCDirekturKerja").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        {
                            title: "No. Order",
                            data: "Id_Order",
                            render: function (data) {
                                return `<input type="checkbox" name="DirekturCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        // { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tgl. Order", data: "Tgl_Order" }, // Sesuaikan 'age' dengan properti kolom di data
                        { title: "Nama Barang", data: "Nama_Brg" }, // Sesuaikan 'country' dengan properti kolom di data
                        { title: "Kd. Brg", data: "Kd_Brg" },
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
                        { title: "Ket. Ditolak", data: "Ref_Tolak_Mng" },
                        { title: "Ket. Ditunda", data: "Ref_Pending" },
                        { title: "Ket. tdk disetujui", data: "Ref_TdStjDir" },
                    ],
                });
                table_data.draw();
            }
        });
}

//#endregion

//#region butn ok onclick
OkACCDirekturKerja.addEventListener("click", function () {
    AllData(tgl_awal.value, tgl_akhir.value);
});
//#endregion

//#region refresh

refresh.addEventListener("click", function (event) {
    event.preventDefault();
    AllData(tgl_awal.value, tgl_akhir.value);
});

//#endregion

//#region semua on click

$("#pilihsemua").on("click", function () {
    // Get all the checkboxes within the DataTable
    const checkboxes = $(
        "input[name='DirekturCheckbox']",
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

//#region table on click

$("#tableACCDirekturKerja tbody").off("click", "tr");
$("#tableACCDirekturKerja tbody").on("click", "tr", function () {
    let checkSelectedRows = $("#tableACCDirekturKerja tbody tr.selected");

    if (checkSelectedRows.length > 0) {
        // Remove "selected" class from previously selected rows
        checkSelectedRows.removeClass("selected");
    }
    $(this).toggleClass("selected");
    const table = $("#tableACCDirekturKerja").DataTable();
    let selectedRows = table.rows(".selected").data().toArray();
    console.log(selectedRows[0]);
    kode = selectedRows[0].Kd_Brg;
    console.log(kode);
    primer.value = "";
    sekunder.value = "";
    tertier.value = "";
    loaddata(kode);
});

//#endregion

//#region loaddata

function loaddata(kode1) {
    // console.log(kode1);
    fetch("/getsaldoACCDirekturKerja/" + kode1)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                primer.value = datas[0].SaldoPrimer + " " + datas[0].SPrimer;
                sekunder.value =
                    datas[0].SaldoSekunder + " " + datas[0].SSekunder;
                tertier.value =
                    datas[0].SaldoTritier + " " + datas[0].STritier;
            }
        });
}

//#endregion
