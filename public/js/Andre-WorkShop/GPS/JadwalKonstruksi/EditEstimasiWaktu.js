let tgl = document.getElementById("tgl");
let btnok = document.getElementById("btnok");
let WorkStation = document.getElementById("WorkStation");
let table_data = $("#TableEditEstimasiWaktu").DataTable();
let jam = document.getElementById("jam");
let menit = document.getElementById("menit");
let refresh = document.getElementById("refresh");
let btnEdit = document.getElementById("btnEdit");
var noAntri, idBagian, estHour, estMinute;
var estJam = [];
var estMenit = [];
var boleh;
let TanggalModal = document.getElementById("TanggalModal");
let WorkStationModal = document.getElementById("WorkStationModal");
let btnprosesmodal = document.getElementById("btnprosesmodal");
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
    // var
    $("input[name='EditEstimasiWaktuCheck']:checked").each(function () {
        jml += 1;
    });
    if (jml == 1) {
        $("input[name='EditEstimasiWaktuCheck']:checked").each(function () {
            let rowindex = $(this).closest("tr").index();
            // jml += 1;
            noAntri = table_data.cell(rowindex, 0).data();
            idBagian = table_data.cell(rowindex, 8).data();
            // estHour = ;
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

//#region btn proses

function btnproses_click() {
    var TotalMenitKrj,
        TotalMenitPk,
        TotalSisaMenitKrj,
        sisa_jam,
        sisa_menit,
        ada_lebih1;
    var menitTbh, total_menit_input, simpan;
    $("input[name='EditEstimasiWaktuCheck']").each(function () {
        let rowindex = $(this).closest("tr").index();
        if (noAntri == table_data.cell(rowindex, 0).data()) {
            estJam.push(jam.value);
            estMenit.push(menit.value);
        }
    });
    fetch(
        "/hitungjamEditEstimasiWaktu/" +
            tgl.value +
            "/" +
            WorkStation.value +
            "/" +
            noAntri
    )
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                TotalMenitKrj = datas[0].TotalMenitKrj;
                TotalMenitPk = datas[0].TotalMenitPk;
                TotalSisaMenitKrj = datas[0].SisaMenitKrj_bantu;
                sisa_jam = datas[0].SisaJamKrj;
                sisa_menit = datas[0].SisaMenitKrj;
                ada_lebih1 = datas[0].ada;
                if (ada_lebih1 > 0) {
                    menitTbh = jam.value * 60 + menit.value;
                    total_menit_input = menitTbh + TotalMenitPk;
                } else {
                    menitTbh = jam.value * 60 + menit.value;
                    total_menit_input = menitTbh;
                }
                if (total_menit_input <= TotalMenitKrj) {
                    simpan = 1;
                } else {
                    alert("Jam kerja optimal tidak cukup....");
                    var hasil_msg = confirm(
                        "Edit jam kerja optimal (OK), atau geser jadwal yang tidak tertampung ke hari berikutnya (Batal) ??"
                    );
                    if (hasil_msg) {
                        boleh = False;
                        while (boleh == false) {
                            TanggalModal.value = tgl.value;
                            // WorkStationModal.value =
                            for (
                                var i = 0;
                                i < WorkStationModal.options.length;
                                i++
                            ) {
                                if (
                                    WorkStationModal.options[i].value ==
                                    WorkStation.value
                                ) {
                                    WorkStationModal.selectedIndex = i;
                                    break;
                                }
                            }

                            btnprosesmodal.addEventListener(
                                "click",
                                function () {
                                    hitung_jam();
                                    if (boleh == true) {
                                        simpan = 1;
                                    }
                                }
                            );
                        }
                        //     While boleh = False
                        //     form_edit.Tanggal.Text = CDate(Date1.Text)
                        //     form_edit.TWorkSts.Text = TWorkSts.Text
                        //     form_edit.TNoWorkSts.Text = TNoWorkSts.Text
                        //     If form_edit.ShowDialog(Me) = DialogResult.OK Then
                        //         Call hitung_jam()
                        //         If boleh = True Then
                        //             simpan = 1
                        //         End If
                        //     End If
                        // End While
                    }
                }
            }
        });
}

//#endregion

//#region btn proses modal

btnprosesmodal.addEventListener("click", function () {
    fetch(
        "/hitungjamEditEstimasiWaktu/" +
            tgl.value +
            "/" +
            WorkStation.value +
            "/" +
            noAntri
    )
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
        });
});

//#endregion

//#region hitung_jam

function hitung_jam() {
    $("input[name='EditEstimasiWaktuCheck']").each(function () {
        let rowindex = $(this).closest("tr").index();
        if (noAntri == table_data.cell(rowindex, 0).data()) {
            estJam.push(jam.value);
            estMenit.push(menit.value);
        }
    });

    fetch(
        "/hitungjamEditEstimasiWaktu/" +
            tgl.value +
            "/" +
            WorkStation.value +
            "/" +
            noAntri
    )
        .then((response) => response.json())
        .then((datas) => {
            console.log(datas);
            if (datas.length > 0) {
                TotalMenitKrj = datas[0].TotalMenitKrj;
                TotalMenitPk = datas[0].TotalMenitPk;
                TotalSisaMenitKrj = datas[0].SisaMenitKrj_bantu;
                sisa_jam = datas[0].SisaJamKrj;
                sisa_menit = datas[0].SisaMenitKrj;
                ada_lebih1 = datas[0].ada;

                if (ada_lebih1 > 0) {
                    menitTbh = jam.value * 60 + menit.value;
                    total_menit_input = menitTbh + TotalMenitPk;
                } else {
                    menitTbh = jam.value * 60 + menit.value;
                    total_menit_input = menitTbh;
                }
                if (total_menit_input <= TotalMenitKrj) {
                    boleh = true;
                } else {
                    boleh = true;
                }
            }
        });
}
//#endregion
