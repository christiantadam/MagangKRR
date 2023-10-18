let tgl = document.getElementById("tgl");
let btnok = document.getElementById("btnok");
let table_data = $("#tableEditEstimasiTanggal").DataTable();
let WorkStation = document.getElementById("WorkStation");
let btnbatal = document.getElementById("batal");
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

tgl.value = formattedCurrentDate;

//#endregion

//#region tgl on enter

tgl.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        btnok.disabled = false;
        btnok.focus();
    }
});

//#endregion

//#region clear text

function cleartext() {
    table_data.clear().draw();
    WorkStation.value = "Pilih Work Station";
}

//#endregion

//#region load data

function LoadData() {
    // let idk = 0;
    fetch("/NOFINISHEditEstimasiJadwal/" + WorkStation.value + "/" + tgl.value)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                if (datas[0].Cancel == 0) {
                    datas.forEach((data) => {
                        let noantrian = data.NoAntrian;
                        fetch(
                            "/getdatatableEditEstimasiJadwal/" +
                                noantrian +
                                "/" +
                                tgl.value +
                                "/" +
                                WorkStation.value
                        )
                            .then((response) => response.json())
                            .then((datasTable) => {
                                console.log(datasTable);
                                datasTable.forEach((data) => {
                                    const tglOrder = data.EstDate;

                                    const [tanggal, waktu] =
                                        tglOrder.split(" ");

                                    data.EstDate = tanggal;
                                });
                                table_data = $(
                                    "#tableEditEstimasiTanggal"
                                ).DataTable({
                                    destroy: true, // Destroy any existing DataTable before reinitializing
                                    data: datasTable,
                                    columns: [
                                        {
                                            title: "Nomor",
                                            data: "NoAntrian",
                                            render: function (data) {
                                                return `<input type="checkbox" name="EditJadwalPerWorkstationCheck" value="${data}" /> ${data}`;
                                            },
                                        },
                                        {
                                            title: "No Order",
                                            data: "NoOrder",
                                        },
                                        // { title: "No. Order", data: "Id_Order" }, // Sesuaikan 'name' dengan properti kolom di data
                                        {
                                            title: "Tanggal Start",
                                            data: "EstDate",
                                        }, // Sesuaikan 'age' dengan properti kolom di data
                                        { title: "Divisi", data: "NamaDivisi" }, // Sesuaikan 'country' dengan properti kolom di data
                                        {
                                            title: "Nama Barang",
                                            data: "Nama_Brg",
                                        },
                                        {
                                            title: "Nama Bagian",
                                            data: "NamaBagian",
                                        },
                                        {
                                            title: "Est. Time",
                                            data: function (row) {
                                                return `${row.EstTimeHour} jam ${row.EstTimeMinute} menit`;
                                            },
                                        },
                                        { title: "Hari ke-", data: "HariKe" },
                                        { title: "IdBagian", data: "IdBagian" },
                                    ],
                                });
                                table_data.draw();
                            });
                    });
                    // no_Antri[idk] = datas[0].NoAntrian;
                    // idk = idk + 1;
                }
            } else {
                alert("Tidak ada jadwal pada tgl: " + tgl.value);
            }
        });
}

//#endregion

//#region btn ok on click

btnok.addEventListener("click", function () {
    if (
        WorkStation.value != "Pilih Work Station" ||
        WorkStation.value != null
    ) {
        LoadData();
        btnbatal.style.display = "";
    }
});

//#endregion

//#region hitung jam




//#endregion
