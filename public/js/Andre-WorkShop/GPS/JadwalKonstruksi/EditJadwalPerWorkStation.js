let tgl = document.getElementById("tgl");
let table_data = $("#TableEditPerWorkstation").DataTable();
let btnok = document.getElementById("btnok");
let WorkStation = document.getElementById("WorkStation");
let btnbatal = document.getElementById("batal");
let refresh = document.getElementById("refresh");
// var no_Antri = [];

//#region set warna

table_data.on("draw", function () {
    table_data.rows().every(function () {
        let data = this.data();
        if (data.Status == 1) {
            $(this.node()).removeClass();
            $(this.node()).addClass("red-color");
        }
        if (data.Cancel == 1) {
            $(this.node()).removeClass();
            $(this.node()).addClass("hotpink-color");
        }
    });
});

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

tgl.value = formattedCurrentDate;

//#endregion

//#region tanggal on enter

tgl.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        btnok.disabled = true;
        table_data.clear().draw();
        let tglSrv, tglEst;
        tglSrv = formattedCurrentDate;
        tglEst = tgl.value;
        if (tglEst < tglSrv) {
            alert(
                "Tanggal estimasi harus lebih besar dari/sama dengan tanggal sekarang"
            );
            btnok.disabled = true;
            tgl.focus();
            return;
        } else {
            btnok.disabled = false;
            btnok.focus();
        }
    }
});

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

//#region load data

function LoadData() {
    // let idk = 0;
    fetch("/NoAntriEditPerWorkstation/" + WorkStation.value + "/" + tgl.value)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                if (datas[0].Cancel == 0) {
                    datas.forEach((data) => {
                        let noantrian = data.NoAntrian;
                        fetch(
                            "/getdatatableEditPerWorkstation/" +
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

                                    const [tanggal, waktu] = tglOrder.split(" ");

                                    data.EstDate = tanggal;
                                });
                                table_data = $(
                                    "#TableEditPerWorkstation"
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
            }
            else{
                alert("Tidak ada jadwal pada tgl: " + tgl.value);
            }
        });
}

//#endregion

//#region refresh

refresh.addEventListener('click', function(){
    if (WorkStation.value !== "Pilih Work Station") {
        table_data.clear().draw();
        LoadData();
    }
});

//#endregion

//#region  batal on click

btnbatal.addEventListener('click', function(){
    table_data.clear().draw();
    btnok.disabled = true;
    btnbatal.style.display = "none";
    WorkStation.value = "Pilih Work Station";
});

//#endregion

//#region proses

function prosesklik() {
    let jml = 0 ;
    let j = 0;
    $("input[name='EditJadwalPerWorkstationCheck']").each(function () {
        // Ambil nilai 'value' dan status 'checked' dari checkbox
        let value = $(this).val();
        let isChecked = $(this).prop("checked");
        let closestTd = $(this).closest("tr");


    });
}

//#endregion
