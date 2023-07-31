//tanggal
let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");

//select
let Divisi = document.getElementById("kddivisi");
let bodytable = document.getElementById("datatable");

//array
let dataarray = [];

//form
let formMaintenanceOrderGambar = document.getElementById(
    "formMaintenanceOrderGambar"
);
let no_order = document.getElementById("no_order");
let no_gambar_rev = document.getElementById("no_gambar_rev");
let jmlh1 = document.getElementById("jmlh1");
let jmlh2 = document.getElementById("jmlh2");
let keterangan_order = document.getElementById("keterangan_order");
let pengorder = document.getElementById("pengorder");
let acc_manager = document.getElementById("acc_manager");
let manager = document.getElementById("manager");
let acc_direktur = document.getElementById("acc_direktur");
let tgl_manager = document.getElementById("tgl_manager");
let ket_manager = document.getElementById("ket_manager");
let tgl_direktur = document.getElementById("tgl_direktur");
let ket_direktur = document.getElementById("ket_direktur");
let tgl_teknik = document.getElementById("tgl_teknik");
let ket_teknik = document.getElementById("ket_teknik");
let judulstatus = document.getElementById("status");

//buat data table
let table_data = $("#tableklik").DataTable();

let tglACCmanager = null;
let tglACCdirektur = null;
let tglTSmanager = null;
let tglTSdirektur = null;
let tglteknikT = null;

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

// const formatDate = (dateString) => {
//     const date = new Date(dateString);
//     const year = date.getFullYear();
//     const month = String(date.getMonth() + 1).padStart(2, "0");
//     const day = String(date.getDate()).padStart(2, "0");
//     return `${year}-${month}-${day}`;
// };

Divisi.addEventListener("change", function () {
    // const selectedValue = this.value;
    // const selectedText = this.options[this.selectedIndex].text;

    // Show a confirmation alert

    const isConfirmed = confirm(`Tampilkan Semua Order??`);

    // If confirmed, proceed with the fetch operation
    if (isConfirmed) {
        fetch(
            "/getalldata/" +
                tgl_awal.value +
                "/" +
                tgl_akhir.value +
                "/" +
                Divisi.value
        )
            .then((response) => response.json())
            .then((datas) => {
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
                console.log(datas); // Optional: Check the data in the console
                $("#tableklik").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tgl. Order", data: "Tgl_Order" }, // Sesuaikan 'age' dengan properti kolom di data
                        { title: "Nama Barang", data: "Nama_Brg" }, // Sesuaikan 'country' dengan properti kolom di data
                        { title: "Status Order", data: "Status" },
                        { title: "No_Gbr_Revisi", data: "No_Gbr_Rev" },
                        { title: "Mesin", data: "Mesin" },
                        { title: "Kd. Brg", data: "Kd_Brg" },
                    ],
                });
                // initializeDataTable(datas);
                datas.forEach((data) => {
                    //console.log(data);
                    dataarray.push(data.Id_Order, data.Tgl_Order);
                    //console.log(dataarray);
                });
                //console.log(dataarray);
            });
    } else {
    }
});

$("#tableklik tbody").off("click", "tr");
$("#tableklik tbody").on("click", "tr", function () {
    let checkSelectedRows = $("#tableklik tbody tr.selected");

    if (checkSelectedRows.length > 0) {
        // Remove "selected" class from previously selected rows
        checkSelectedRows.removeClass("selected");
    }
    $(this).toggleClass("selected");
    const table = $("#tableklik").DataTable();
    let selectedRows = table.rows(".selected").data().toArray();
    console.log(selectedRows[0]);
    if (selectedRows[0].Tgl_Tolak_Mng) {
        tglteknikT = selectedRows[0].Tgl_Tolak_Mng.split(" ");
    }
    // let tglteknikT = selectedRows[0].Tgl_Tolak_Mng.split(" ");
    judulstatus.textContent = selectedRows[0].Status;
    no_order.value = selectedRows[0].Id_Order;
    no_gambar_rev.value = selectedRows[0].No_Gbr_Rev;
    // jmlh1.value = selectedRows[0].
    jmlh2.value = selectedRows[0].Nama_satuan;
    keterangan_order.value = selectedRows[0].Ket_Order;
    pengorder.value = selectedRows[0].NmUserOd;
    acc_manager.value = selectedRows[0].Tgl_Apv_1?.split(" ")[0] ?? ""; //tglACCmanager[0];
    manager.value = selectedRows[0].Manager;
    acc_direktur.value = selectedRows[0].Tgl_Apv_2?.split(" ")[0] ?? "";
    tgl_manager.value = selectedRows[0].Tgl_TdStjMg?.split(" ")[0] ?? "";
    ket_manager.value = selectedRows[0].Ref_TdStjMg;
    tgl_direktur.value = selectedRows[0].Tgl_TdStjDir?.split(" ")[0] ?? "";
    ket_direktur.value = selectedRows[0].Ref_TdStjDir;
    tgl_teknik.value = selectedRows[0].Tgl_Tolak_Mng?.split(" ")[0] ?? "";
    ket_teknik.value = selectedRows[0].Ref_Tolak_Mng;
});
