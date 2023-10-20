let tgl = document.getElementById("tgl");
let btnok = document.getElementById("btnok");
let table_data = $("#tableEditEstimasiTanggal").DataTable();
let WorkStation = document.getElementById("WorkStation");
let btnbatal = document.getElementById("batal");
let refresh = document.getElementById("refresh");
let keterangan;
let MaterialNotReady = document.getElementById("MaterialNotReady");
let MesinRusak = document.getElementById("MesinRusak");
let SpekMesinTerbatas = document.getElementById("SpekMesinTerbatas");
let Instruksi = document.getElementById("Instruksi");
let Lain = document.getElementById("Lain");
let alasanLain = document.getElementById("alasanLain");
var estJam = [];
var estMenit = [];
//#region set color

table_data.on("draw", function () {
    table_data.rows().every(function () {
        let data = this.data();
        if (data.Status == 1) {
            $(this.node()).removeClass();
            $(this.node()).addClass("red-color");
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
    table_data.clear().draw();
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
                                if (datasTable.length > 0) {
                                    datasTable.forEach((data) => {
                                        const tglOrder = data.EstDate;

                                        const [tanggal, waktu] =
                                            tglOrder.split(" ");

                                        data.EstDate = tanggal;
                                        estJam.push(data.EstTimeHour);
                                        estMenit.push(data.EstTimeMinute);
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
                                                    return `<input type="checkbox" name="EditEstimasiTanggalCheck" value="${data}" /> ${data}`;
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
                                            {
                                                title: "Divisi",
                                                data: "NamaDivisi",
                                            }, // Sesuaikan 'country' dengan properti kolom di data
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
                                            {
                                                title: "Hari ke-",
                                                data: "HariKe",
                                            },
                                            {
                                                title: "IdBagian",
                                                data: "IdBagian",
                                            },
                                        ],
                                    });
                                    table_data.draw();
                                }
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

//#region refresh

refresh.addEventListener("click", function () {
    // cleartext();
    LoadData();
});

//#endregion

//#region Proses Onclick

function prosesklik() {
    var indeks = [];
    let pilihAlasan = 1;
    let jml = 0;
    var move_idBagian = [];
    var move_noAntri = [];
    var move_estJam = [];
    var move_estMenit = [];
    let idk = 0;

    $("input[name='EditEstimasiTanggalCheck']:checked").each(function () {
        // Ambil nilai 'value' dan status 'checked' dari checkbox
        let value = $(this).val();
        // let isChecked = $(this).prop("checked");
        // let closestTd = $(this).closest("tr");
        let rowindex = $(this).closest("tr").index();
        jml += 1;
        indeks.push(rowindex);
    });

    if (jml == 0) {
        alert("Pilih data yg akan di edit estimasi tanggalnya.");
        return;
    } else {
        $("#modalalasan").modal("show");
        $("input[name='EditEstimasiTanggalCheck']:checked").each(function () {
            let rowindex = $(this).closest("tr").index();
            move_noAntri.push(table_data.cell(indexarray[i], 0).data());
            move_idBagian.push(table_data.cell(indexarray[i], 8).data());
            move_estJam.push(estJam[idk]);
            move_estMenit.push(estMenit[idk]);
            idk = idk + 1;
        });
        var newTgl = prompt("Inputkan estimasi tanggal yg baru", "PESAN");
    }
}

//#endregion

//#region oke modal on click

function okemodal() {
    if (pilihAlasan == 0) {
    }
    if (MaterialNotReady.checked) {
        keterangan = MaterialNotReady.value;
    } else if (MesinRusak.checked) {
        keterangan = MesinRusak.value;
    } else if (SpekMesinTerbatas.checked) {
        keterangan = SpekMesinTerbatas.value;
    } else if (Instruksi.checked) {
        keterangan = Instruksi.value;
    } else if (Lain.checked) {
        alert("Masukkan alasannya...");
        alasanLain.focus();
    }
}

//#endregion
