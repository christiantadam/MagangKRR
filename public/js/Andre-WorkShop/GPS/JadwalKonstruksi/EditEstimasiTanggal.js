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
                                                title: "Nomor Antrian",
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
    let sts_jadwal;
    let total_menit;
    let jam_kerja;
    let menit_jam_kerja;
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
        let i = 0;
        $("input[name='EditEstimasiTanggalCheck']").each(function () {
            // Ambil nilai 'value' dan status 'checked' dari checkbox
            let rowindex = $(this).closest("tr").index();
            let status = Proses_cek_estimasi(
                table_data.cell(rowindex, 1).data(),
                newTgl
            );
            i += 1;
            if (status == false) {
                alert(
                    "Untuk nomer order: " +
                        table_data.cell(rowindex, 1).data() +
                        ", tdk bisa diproses."
                );
                alert("Tidak terProses...");
                return;
            }
        });
        fetch("/cekestimasiEditEstimasiTanggal/" + noOrder)
            .then((response) => response.json())
            .then((datas) => {
                if (datas[0].ada > 0) {
                    sts_jadwal = true;
                } else {
                    sts_jadwal = false;
                }
            });
        total_menit = 0;
        for (let i = 0; i < idk - 1; i++) {
            total_menit =
                estJam[indeks[i]] * 60 + estMenit[indeks[i]] + total_menit;
        }
        if ((sts_jadwal = false)) {
            jam_kerja = prompt(
                "Tentukan jam kerja optimal u/ tgl: " + newTgl,
                "PESAN"
            );
            menit_jam_kerja = jam_kerja * 60;
            while (total_menit > menit_jam_kerja) {
                alert(
                    "Jam kerja optimal tdk boleh lebih kecil dari estimasi waktu."
                );
                jam_kerja = prompt(
                    "Tentukan jam kerja optimal u/ tgl: " + newTgl,
                    "PESAN"
                );
                menit_jam_kerja = jam_kerja * 60;
            }
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': csrfToken
            //     }
            // });
            $.ajax({
                url: "EditPerWorkStation/" + noAntri[0],
                type: "POST",
                dataType: "json",
                data: {
                    _token: csrfToken,
                    _method: "PUT",
                    noAntri: noAntri[0],
                    noBantu: posisiBaru,
                    worksts: WorkStation.value,
                    tgl: tgl.value,
                },
                success: function (response) {
                    console.log(response.message);
                    // console.log(response.data);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                },
            });
        }
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

//#region Proses_cek_estimasi

function Proses_cek_estimasi(noOrder, tanggal) {
    let tglS, tglF;
    fetch("/cekestimasiEditEstimasiTanggal/" + noOrder)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                tglS = datas[0].TglS;
                tglF = datas[0].TglF;
            }
        });

    if (tanggal < tglS || tanggal > tglF) {
        if (tanggal < tglS) {
            alert(
                "Tidak boleh. Karena tgl yg diinput < estimasi tgl start(" +
                    tglS +
                    ") yg dijadwalkan oleh PPIC."
            );
            return false;
        } else if (tanggal > tglF) {
            alert(
                "Tidak boleh. Karena tgl yg diinput > estimasi tgl finish(" +
                    tglF +
                    ") yg dijadwalkan oleh PPIC."
            );
            return false;
        }
        // Proses_cek_estimasi = false;
    } else {
        return true;
    }
}

//#endregion
