let table_data = $("#tableCetakOrderKerja").DataTable();
let tgl_awal = document.getElementById("tgl_awal");
let tgl_akhir = document.getElementById("tgl_akhir");
let refresh = document.getElementById("refresh");
let formCetakOrderKerja = document.getElementById("formCetakOrderKerja");
let methodForm = document.getElementById("methodForm");
let noOd = document.getElementById("noOd");
var arraycheckbox = [];
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

//#region tgl_akhir on enter

tgl_akhir.addEventListener("keypress", function (event) {
    event.preventDefault();
    // Mengecek apakah tombol yang ditekan adalah tombol 'Enter'
    if (event.key === "Enter") {
        // Tambahkan kode yang ingin Anda jalankan saat tombol 'Enter' ditekan di sini
        AllData(tgl_awal.value, tgl_akhir.value);
        //console.log('Tombol Enter ditekan!');
    }
});

//#endregion

//#region AllData

function AllData(tglAwal, tglAkhir) {
    fetch("/getalldataCetakSuratOrderKerja/" + tglAwal + "/" + tglAkhir)
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
                    "Belum Ada Order Yg Sdh DiACC U/ tgl " +
                        tglAwal +
                        " s/d tgl " +
                        tglAkhir
                );
            } else {
                console.log(datas); // Optional: Check the data in the console
                table_data = $("#tableCetakOrderKerja").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        {
                            title: "No. Order",
                            data: "Id_Order",
                            render: function (data) {
                                return `<input type="checkbox" name="CetakOrderKerjaCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        // { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                        { title: "Tgl. Order", data: "Tgl_Order" },
                        { title: "Nama Barang", data: "Nama_Brg" },
                        { title: "Kd.Brg", data: "Kd_Brg" },
                        {
                            title: "Jumlah",
                            data: null,
                            render: function (data, type, row) {
                                return `${row.Jml_Brg} ${row.Nama_satuan}`;
                            },
                        },
                        { title: "Status Order", data: "Status" },
                        { title: "Divisi", data: "NamaDivisi" },
                        { title: "Keterangan Order", data: "Ket_Order" },
                    ],
                });
                table_data.draw();
            }
        });
}

//#endregion

//#region button refresh

refresh.addEventListener("click", function (event) {
    event.preventDefault();
    AllData(tgl_awal.value, tgl_akhir.value);
});

//#endregion

//#region button cetak

function cetak() {

    if (table_data.rows().count() != 0) {
        $("input[name='CetakOrderKerjaCheckbox']").each(function () {
            // Ambil nilai 'value' dan status 'checked' dari checkbox
            let value = $(this).val();
            let isChecked = $(this).prop("checked");
            let closestTd = $(this).closest("tr");
            if (isChecked) {
                console.log(value);
                arraycheckbox.push(value);
                // console.log(arraycheckbox);
            }
            console.log(closestTd);
            // Lakukan sesuatu berdasarkan status 'checked'
        });
        if ((arraycheckbox.length == 0 || arraycheckbox.length > 1)) {
            alert("Pilih 1 No. Order Yg Akan DiCETAK");
            return;
        } else {
            console.log(arraycheckbox);
            noOd.value = arraycheckbox[0];
            methodForm.value = "PUT";
            formCetakOrderKerja.action = "/CetakSuratOrderKerja/" + noOd.value;
            // formCetakOrderKerja.submit();
        }
    }
}

//#endregion
