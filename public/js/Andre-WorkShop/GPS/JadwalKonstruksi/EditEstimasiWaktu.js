let tgl = document.getElementById("tgl");
let btnok = document.getElementById("btnok");
let WorkStation = document.getElementById("WorkStation");
let table_data = $("#TableEditEstimasiWaktu").DataTable();
let jam = document.getElementById("jam");
let menit = document.getElementById("menit");
let refresh = document.getElementById("refresh");
let btnEdit = document.getElementById("btnEdit");
//#region  set tanggal

const currentDate = new Date();
const formattedCurrentDate = currentDate.toISOString().slice(0, 10);
tgl.value = formattedCurrentDate;

//#endregion

//#region tgl on enter

tgl.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        let tglSrv, tglEst;
        tglSrv = formattedCurrentDate;
        tglEst = tgl.value;
        if (tglEst < tglSrv) {
            alert(
                "Tanggal Estimasi harus lebih besar dari/sama dengan tanggal sekarang"
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

//#region  load data

function LoadData() {
    fetch("/LoaddataEditEstimasiWaktu/" + WorkStation.value + "/" + tgl.value)
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                table_data = $("#TableEditEstimasiWaktu").DataTable({
                    destroy: true, // Destroy any existing DataTable before reinitializing
                    data: datas,
                    columns: [
                        {
                            title: "Nomor",
                            data: "NoAntrian",
                            render: function (data) {
                                return `<input type="checkbox" name="EditEstimasiWaktuCheck" value="${data}" /> ${data}`;
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
                            title: "Id Bagian",
                            data: "IdBagian",
                        },
                    ],
                });
            } else {
                alert("Tidak ada jadwal pada tgl: " + tgl.value);
                return;
            }
        });
}

//#endregion

//#region btnok on click
btnok.addEventListener("click", function (event) {
    event.preventDefault();
    LoadData();
});

//#endregion

//#region TEstTime on enter

jam.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        menit.focus();
    }
});

menit.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (jam.value !== 0 && menit.value == 0) {
            //btn proses enable , focus
        } else if (jam.value == 0 && menit.value !== 0) {
            //btn proses enable , focus
        } else if (jam.value !== 0 && menit.value !== 0) {
            //btn proses enable , focus
        } else if (jam.value == 0 && menit.value == 0) {
            alert("Estimasi waktu harus lebih besar dari NOL.");
            //btn proses disabled , jam focus
        }
    }
});

//#endregion

//#region refresh

refresh.addEventListener("click", function () {
    if (WorkStation.value !== "Pilih Work Station") {
        LoadData();
    }
});

//#endregion

//#region btn Edit

btnEdit.addEventListener("click", function (event) {
    var jml = 0;
    var
    $("input[name='EditEstimasiWaktuCheck']:checked").each(function () {
        jml += 1;
    });
    if (jml == 1) {
        $("input[name='EditEstimasiTanggalCheck']:checked").each(function () {
            // Ambil nilai 'value' dan status 'checked' dari checkbox
            // let value = $(this).val();
            // let isChecked = $(this).prop("checked");
            // let closestTd = $(this).closest("tr");
            let rowindex = $(this).closest("tr").index();
            jml += 1;
        //     If ListOpr.Items(i).Checked Then
        //     noAntri = Trim(ListOpr.Items(i).Text)
        //     idBagian = CInt(ListOpr.Items(i).SubItems(8).Text)
        //     estHour = estJam(i)
        //     estMinute = estMenit(i)
        //     TEstTime.Text = estHour
        //     TEstTime1.Text = estMinute
        //     TEstTime.Enabled = True
        //     TEstTime1.Enabled = True
        //     TEstTime.Focus()
        // End If
            // indeks.push(rowindex);
        });
    }
});

//#endregion
