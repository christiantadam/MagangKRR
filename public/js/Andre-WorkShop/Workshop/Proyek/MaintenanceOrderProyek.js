let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");
let table_data = $("#tableMaintenanceOrderProyek").DataTable();

let kddivisi = document.getElementById("kddivisi");
let pilih;
let user = 4384;

let refresh = document.getElementById("refresh");
let isi = document.getElementById("isi");
let modetrans;
let MesinModal = document.getElementById("MesinModal");
let Tanggalmodal = document.getElementById("Tanggalmodal");
let namadivisimodal = document.getElementById("namadivisimodal");
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
Tanggalmodal.value = formattedCurrentDate;
//#endregion

//#region divisi di ubah

kddivisi.addEventListener("change", function () {
    const isConfirmed = confirm(`Tampilkan Semua Order??`);
    // Mesin(kddivisi.value);

    if (isConfirmed) {
        pilih = 1;
        // cleardata();
        // const table = $("#tableklik").DataTable();
        table_data.clear().draw();
        AllData(tgl_awal.value, tgl_akhir.value, kddivisi.value);
    } else {
        console.log("masuk");
        pilih = 2;
        table_data.clear().draw();
        AllDataUser(tgl_awal.value, tgl_akhir.value, user, kddivisi.value);
    }
});
//#endregion

//#region alldata

function AllData(tglAwal, tglAkhir, idDivisi) {
    fetch(
        "/GetDataAllMaintenanceOrderProyek/" +
            tglAwal +
            "/" +
            tglAkhir +
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
            if (datas.length == 0) {
                console.log("masuk ke == 0");

                alert(
                    "Tidak ada Order, tgl " + tglAwal + " s/d tgl " + tglAkhir
                );
                return;
            } else {
                console.log(datas);
                table_data = $("#tableMaintenanceOrderProyek").DataTable({
                    destroy: true,
                    data: datas,
                    columns: [
                        { title: "No.Order", data: "Id_Order" },
                        { title: "Tgl.Order", data: "Tgl_Order" },
                        { title: "Nama Proyek", data: "Nama_Proyek" },
                        { title: "Status Order", data: "Status" },
                        { title: "Mesin", data: "Mesin" },
                    ],
                });
                table_data.draw();
            }
        });
}

//#endregion

//#region tampil order
function AllDataUser(tglAwal, tglAkhir, idUser, idDivisi) {
    fetch(
        "/GatDataForUserOrderMaintenanceOrderKerja/" +
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
                const tglOrder = data.Tgl_Order;
                const [tanggal, waktu] = tglOrder.split(" ");
                data.Tgl_Order = tanggal;
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
                return;
            } else {
                table_data = $("#tableMaintenanceOrderProyek").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        { title: "No.Order", data: "Id_Order" },
                        { title: "Tgl.Order", data: "Tgl_Order" },
                        { title: "Nama Proyek", data: "Nama_Proyek" },
                        { title: "Status Order", data: "Status" },
                        { title: "Mesin", data: "Mesin" },
                    ],
                });
                table_data.draw();
            }
        });
}
//#endregion

//#region refresh

refresh.addEventListener("click", function () {
    const isConfirmed = confirm(`Tampilkan Semua Order??`);
    // Mesin(kddivisi.value);

    if (isConfirmed) {
        pilih = 1;
        table_data.clear().draw();
        AllData(tgl_awal.value, tgl_akhir.value, kddivisi.value);
    } else {
        // console.log("masuk");
        pilih = 2;
        table_data.clear().draw();
        AllDataUser(tgl_awal.value, tgl_akhir.value, user, kddivisi.value);
    }
});

//#endregion

//#region isi on click

function isiklik() {
    if (kddivisi.value != "Pilih Divisi") {
        modetrans = 1;
        isi.setAttribute("data-toggle", "modal");
        isi.setAttribute("data-target", "#ModalForm");
        Mesin(kddivisi.value);
        // console.log(
        //     kddivisi.options[kddivisi.selectedIndex].text.split("--")[1]
        // );
        namadivisimodal.textContent =
            kddivisi.options[kddivisi.selectedIndex].text.split("--")[1];
    } else {
        alert("Pilih Divisi Anda");
    }
}
//#endregion

//#region mesin

function Mesin(idDivisi) {
    fetch("/GetMesinMaintenanceOrderProyek/" + idDivisi)
        .then((response) => response.json())
        .then((options) => {
            //mesin buat form baru

            MesinModal.innerHTML = "";
            //
            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Pilih Mesin";
            MesinModal.appendChild(defaultOption);
            //
            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Nomer;
                option.innerText = entry.Mesin + "--" + entry.Nomer;
                MesinModal.appendChild(option);
            });
        });
}

//#endregion
