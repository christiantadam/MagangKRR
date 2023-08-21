//#region variabel
let tgl_awal = document.getElementById('tgl_awal');
let tgl_akhir = document.getElementById('tgl_akhir');

let table_data = $("#tableOrderKerja").DataTable();

let judulstatus = document.getElementById('status');
let no_order = document.getElementById('no_order');
let kodebarang = document.getElementById('Kode_Barang');
let Nomor_Gambar = document.getElementById('Nomor_Gambar');
let jmlh2 = document.getElementById('jmlh2');
let keterangan_order = document.getElementById('keterangan_order');
let pengorder = document.getElementById('pengorder');
let acc_manager = document.getElementById('acc_manager');
let manager = document.getElementById('manager');
let acc_direktur = document.getElementById('acc_direktur');
let tgl_manager = document.getElementById('tgl_manager');
let ket_manager = document.getElementById('ket_manager');
let tgl_direktur = document.getElementById('tgl_direktur');
let ket_direktur = document.getElementById('ket_direktur');
let tgl_teknik = document.getElementById('tgl_teknik');
let ket_teknik = document.getElementById('ket_teknik');
let tunda_teknik = document.getElementById('tunda_teknik');
let pilih;
let Divisi = document.getElementById('kddivisi');
let user = 4384;


let btnisi = document.getElementById('isi');
let modetrans;


let tanggalmodal = document.getElementById('tanggalmodal');
let isiOrderKerjatitle = document.getElementById('isiOrderKerjatitle');
let iddivisimodalOrder = document.getElementById('iddivisimodalOrder');
let UserModal = document.getElementById('UserModal');
let SatuanModal = document.getElementById('SatuanModal');
let NomorSatuanModal = document.getElementById('NomorSatuanModal');
//#endregion

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

//#region tampil alldata
function AllData(tglAwal, tglAkhir, idDivisi) {
    fetch("/getalldatakerja/" + tglAwal + "/" + tglAkhir + "/" + idDivisi)
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
                console.log(datas); // Optional: Check the data in the console
                table_data = $("#tabletableOrderKerjaklik").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        { title: "Nomor Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tanggal Order", data: "Tgl_Order" }, // Sesuaikan 'age' dengan properti kolom di data
                        { title: "Nama Barang", data: "Nama_Brg" }, // Sesuaikan 'country' dengan properti kolom di data
                        { title: "Status Order", data: "Status" },
                        { title: "Nomor Gambar", data: "No_Gbr" },
                        { title: "Mesin", data: "Mesin" },
                    ],
                });
                table_data.draw();
            }
        });
}
//#endregion

//#region data berdasarkan user

function AllDataUser(tglAwal, tglAkhir, idUser, idDivisi) {
    fetch(
        "/GatDataForUserOrderkerja/" +
            tglAwal +
            "/" +
            tglAkhir +
            "/" +
            idUser +
            "/" +
            idDivisi
    )
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
            console.log(datas.length); // Optional: Check the data in the console
            if (datas.length == 0) {
                //console.log("masuk ke == 0");
                alert(
                    "Tidak ada Order, tgl " +
                        tglAwal +
                        " s/d tgl " +
                        tglAkhir +
                        " u/ User " +
                        idUser
                );
            } else {
                table_data= $("#tabletableOrderKerjaklik").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        { title: "Nomor Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tanggal Order", data: "Tgl_Order" }, // Sesuaikan 'age' dengan properti kolom di data
                        { title: "Nama Barang", data: "Nama_Brg" }, // Sesuaikan 'country' dengan properti kolom di data
                        { title: "Status Order", data: "Status" },
                        { title: "Nomor Gambar", data: "No_Gbr" },
                        { title: "Mesin", data: "Mesin" },
                    ],
                });
            }
        });
}

//#endregion

//#region clear data
function cleardata() {
    judulstatus.textContent = "";
    no_order.value = "";
    kodebarang.value = "";
    // jmlh1.value = selectedRows[0].
    Nomor_Gambar.value = "";
    jmlh2.value = "";
    keterangan_order.value = "";
    pengorder.value = "";
    acc_manager.value = ""; //tglACCmanager[0];
    manager.value = "";
    acc_direktur.value = "";
    tgl_manager.value = "";
    ket_manager.value = "";
    tgl_direktur.value = "";
    ket_direktur.value = "";
    tgl_teknik.value = "";
    ket_teknik.value = "";
    tunda_teknik.value = "";
}
//#endregion

//#region divisi di ubah

Divisi.addEventListener("change", function () {
    const isConfirmed = confirm(`Tampilkan Semua Order??`);
    //Mesin(Divisi.value);
    if (isConfirmed) {
        pilih = 1;
        cleardata();
        table_data.clear().draw();
        AllData(tgl_awal.value, tgl_akhir.value, Divisi.value);
    } else {
        console.log("masuk");
        pilih = 2;
        cleardata();
        // dataTable.fnClearTable();
        AllDataUser(tgl_awal.value, tgl_akhir.value, user, Divisi.value);
    }
});

//#endregion

//#region btn isi klik
function klikisi() {
    if (Divisi.value == "Pilih Divisi") {
        alert("Pilih Divisi Anda");
    }
    else{
        modetrans = 1;

        btnisi.setAttribute("data-toggle", "modal");
        btnisi.setAttribute("data-target", "#OrderKerja");
        Divisi.options[Divisi.selectedIndex].text.split("--")[1];
        isiOrderKerjatitle.textContent =  Divisi.options[Divisi.selectedIndex].text.split("--")[1];
        iddivisimodalOrder.value = Divisi.value;
        tanggalmodal.value = formattedFirstDay;
        UserModal.value = user;
    }
}

//#endregion

//#region ubah satuan
SatuanModal.addEventListener('change', function(){
    NomorSatuanModal.value = SatuanModal.value;
});
//#endregion

//#region Nomor Gambar Enter
