//#region Variables
const dateInput = document.getElementById("tanggal");

const hidInventory = document.getElementById("hidden_inv");
const hidExtruder = document.getElementById("hidden_ext");

const txtShift = document.getElementById("shift");
const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");
const timeMulai = document.getElementById("waktu_mulai");
const timeSelesai = document.getElementById("waktu_selesai");

const txtIdMesin = document.getElementById("id_mesin");
const txtNamaMesin = document.getElementById("nama_mesin");
const txtUkuran = document.getElementById("ukuran");
const txtDenier = document.getElementById("denier");
const txtWarna = document.getElementById("warna");
const txtLot = document.getElementById("lot");
const txtNoUrut = document.getElementById("no_urut");
const txtIdOrder = document.getElementById("id_order");
const txtNamaOrder = document.getElementById("nama_order");
const txtIdKomposisi = document.getElementById("id_komposisi");
const txtNamaKomposisi = document.getElementById("nama_komposisi");
const txtBahanTerpakai = document.getElementById("total_bahan_terpakai");
const txtHasilTimbang = document.getElementById("hasil_timbang");
const txtAfalan = document.getElementById("afalan");

const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listOfInputTxt = document.querySelectorAll("input[type='text']");

const listKonversi = [];
const listHasil = [];
const listTmpTrans = [];
const listTmpExt = [];
const listHutangExt = [];

const tableKonversiWidth = 2;
const tableHasilWidth = 7;
const tableHasilCol = [
    { width: "300px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
];

var konversiPil = -1;
//#endregion

//#region Events
btnProses.addEventListener("click", function () {
    prosesExtruder();
    prosesInventory();

    console.log("PROSES SEDANG BERJALAN!");
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/ExtruderNet";
});

hidExtruder.addEventListener("change", function () {
    if (this.value.split("!")[0] == "Proses Extruder Berhasil") {
        if (hidInventory.value.split("!")[0] == "Proses Inventory Berhasil") {
            alert("Data berhasil tersimpan!");

            clearForm();
            daftarKonversiBelumACC();

            console.log("PROSES BERHASIL KAWAN!");
        } else {
            console.log("PROSES INVENTORY BELUM SELESAI KAWAN!");
        }
    } else {
        console.log(this.value);
    }
});

hidInventory.addEventListener("change", function () {
    if (this.value.split("!")[0] == "Proses Inventory Berhasil") {
        if (hidExtruder.value.split("!")[0] == "Proses Extruder Berhasil") {
            alert("Data berhasil tersimpan!");

            clearForm();
            daftarKonversiBelumACC();

            console.log("PORSES BERHASIL KAWAN!");
        } else {
            console.log("PROSES EXTRUDER BELUM SELESAI KAWAN!");
        }
    } else {
        console.log(this.value);
    }
});
//#endregion

//#region Functions
function clearForm() {
    listOfInputTxt.forEach((input) => {
        input.value = "";
    });

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listHasil.length = 0;
    clearTable_DataTable("table_hasil", tableHasilWidth);
}

function daftarKonversiBelumACC() {
    listKonversi.length = 0;
    clearTable_DataTable(
        "table_konversi",
        tableKonversiWidth,
        "Memuat data..."
    );

    fetch("/Konversi/getListKonvBlmAcc/EXT")
        .then((response) => response.json())
        .then((data) => {
            for (let i = 0; i < data.length; i++) {
                listKonversi.push({
                    IdKonversi: data[i].IdKonversi,
                    IdDivisi: data[i].IdDivisi, // subitem 1
                    NamaDivisi: data[i].NamaDivisi, // subitem 2
                    Tanggal: data[i].Tanggal, // subitem 3
                    Shift: data[i].Shift, // subitem 4
                    AwalShift: data[i].AwalShift, // subitem 5
                    AkhirShift: data[i].AkhirShift, // subitem 6
                    IdMesin: data[i].IdMesin, // subitem 7
                    TypeMesin: data[i].TypeMesin, // subitem 8
                    Ukuran: data[i].Ukuran, // subitem 9
                    Denier: data[i].Denier, // subitem 10
                    Warna: data[i].Warna, // subitem 11
                    LotNumber: data[i].LotNumber, // subitem 12
                    IdOrder: data[i].IdOrder, // subitem 13
                    Identifikasi: data[i].Identifikasi, // subitem 14
                    IdKomposisi: data[i].IdKomposisi, // subitem 15
                    NamaKomposisi: data[i].NamaKomposisi, // subitem 16
                    JamMulai: data[i].JamMulai, // subitem 17
                    JamSelesai: data[i].JamSelesai, // subitem 18
                    NoUrut: data[i].NoUrut, // subitem 19
                });
            }

            addTable_DataTable(
                "table_konversi",
                listKonversi.map((item, index) => {
                    return {
                        IdKonversi: `<input class="form-check-input" type="checkbox" value="${index}" name="cheackbox_konversi"> ${item.IdKonversi}`,
                        NamaKomposisi: item.NamaKomposisi,
                    };
                }),
                null,
                null,
                "450px"
            );

            const checkboxes = document.querySelectorAll(
                'input[name="cheackbox_konversi"]'
            );
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    if (checkbox.checked) {
                        uncheckOtherCheckboxes(checkboxes, checkbox);

                        konversiPil = checkbox.value;
                        listHasil.length = 0;
                        clearTable_DataTable(
                            "table_hasil",
                            tableHasilWidth,
                            "Memuat data..."
                        );

                        tampilRincianKonversi(
                            konversiPil,
                            listKonversi[konversiPil].IdKonversi
                        );

                        btnProses.disabled = false;
                        btnProses.focus();
                    }
                });
            });
        });
}

function uncheckOtherCheckboxes(checkboxes, checkedCheckbox) {
    checkboxes.forEach(function (checkbox) {
        if (checkbox !== checkedCheckbox) {
            checkbox.checked = false;
        }
    });
}

function tampilRincianKonversi(i, id_konversi) {
    dateInput.value = dateTimeToDate(listKonversi[i].Tanggal);
    txtShift.value = listKonversi[i].Shift;
    timeAwal.value = dateTimetoTime(listKonversi[i].AwalShift);
    timeAkhir.value = dateTimetoTime(listKonversi[i].AkhirShift);
    txtIdMesin.value = listKonversi[i].IdMesin;
    txtNamaMesin.value = listKonversi[i].TypeMesin;
    txtUkuran.value = listKonversi[i].Ukuran;
    txtDenier.value = listKonversi[i].Denier;
    txtWarna.value = listKonversi[i].Warna;
    txtLot.value = listKonversi[i].LotNumber;
    txtIdOrder.value = listKonversi[i].IdOrder;
    txtNamaOrder.value = listKonversi[i].Identifikasi;
    txtIdKomposisi.value = listKonversi[i].IdKomposisi;
    txtNamaKomposisi.value = listKonversi[i].NamaKomposisi;
    timeMulai.value = dateTimetoTime(listKonversi[i].JamMulai);
    timeAkhir.value = dateTimetoTime(listKonversi[i].JamSelesai);
    txtNoUrut.value = listKonversi[i].NoUrut;

    tampilDetailKonversi(id_konversi);
}

function tampilDetailKonversi(id_konversi) {
    fetch("/Konversi/getListKonvDetail/" + id_konversi)
        .then((response) => response.json())
        .then((data) => {
            for (let i = 0; i < data.length; i++) {
                listHasil.push({
                    Type: data[i].Type,
                    IdType: data[i].IdType, // subitem 1
                    JumlahPrimer: data[i].JumlahPrimer, // subitem 2
                    SatuanPrimer: data[i].SatuanPrimer, // subitem 3
                    JumlahSekunder: data[i].JumlahSekunder, // subitem 4
                    SatuanSekunder: data[i].SatuanSekunder, // subitem 5
                    JumlahTritier: data[i].JumlahTritier, // subitem 6
                    SatuanTritier: data[i].SatuanTritier, // subitem 7
                    Presentase: data[i].Presentase, // subitem 8
                    StatusType: data[i].StatusType, // subitem 9
                });
            }

            addTable_DataTable("table_hasil", listHasil, tableHasilCol);

            hitungJumlahBahanHasil(); // DARI EVENT CHECKBOX KONVERSI
        });
}

function hitungJumlahBahanHasil() {
    let jum_bahan = 0;
    let jum_hasil = 0;
    let jum_afalan = 0;

    for (let i = 0; i < listHasil.length; i++) {
        if (
            listHasil[i].StatusType == "BB" ||
            listHasil[i].StatusType == "BP"
        ) {
            jum_bahan += listHasil[i].JumlahTritier;
        } else if (listHasil[i].StatusType == "AF") {
            jum_afalan += listHasil[i].JumlahTritier;
        } else if (listHasil[i].StatusType == "HP") {
            jum_hasil += listHasil[i].JumlahTritier;
        }
    }

    txtBahanTerpakai.value = jum_bahan;
    txtHasilTimbang.value = jum_hasil;
    txtAfalan.value = jum_afalan;

    toleransi(jum_bahan);
}

function toleransi(jum_bahan) {
    var range1, range2, toleransi, total_hasil_produksi;

    if (
        txtIdMesin.value === "M-003" ||
        txtIdMesin.value === "M-004" ||
        txtIdMesin.value === "M-006" ||
        txtIdMesin.value === "M-007"
    ) {
        toleransi = (8 / 100) * jum_bahan;
        range1 = jum_bahan - toleransi;
        range2 = jum_bahan + toleransi;
        total_hasil_produksi =
            parseFloat(txtHasilTimbang.value) + parseFloat(txtAfalan.value);

        if (total_hasil_produksi >= range1 && total_hasil_produksi <= range2) {
            btnProses.disabled = false;
            btnProses.focus();
        } else if (total_hasil_produksi < range1) {
            alert(
                "Total_hasil_produksi : " +
                    total_hasil_produksi +
                    " lebih kecil dari : " +
                    range1
            );
        } else if (total_hasil_produksi > range2) {
            alert(
                "Total_hasil_produksi : " +
                    total_hasil_produksi +
                    " lebih besar dari : " +
                    range2
            );
        }
    } else if (
        txtIdMesin.value === "M-001" ||
        txtIdMesin.value === "M-002" ||
        txtIdMesin.value === "M-005"
    ) {
        toleransi = (4 / 100) * jum_bahan;
        range1 = jum_bahan - toleransi;
        range2 = jum_bahan + toleransi;
        total_hasil_produksi =
            parseFloat(txtHasilTimbang.value) + parseFloat(txtAfalan.value);

        if (total_hasil_produksi >= range1 && total_hasil_produksi <= range2) {
            btnProses.disabled = false;
            btnProses.focus();
        } else if (total_hasil_produksi < range1) {
            alert(
                "Total Hasil Produksi: " +
                    total_hasil_produksi +
                    " lebih kecil dari: " +
                    range1
            );
        } else if (total_hasil_produksi > range2) {
            alert(
                "Total Hasil Produksi: " +
                    total_hasil_produksi +
                    " lebih besar dari: " +
                    range2
            );
        }
    }
}

function cekPenyesuaian() {
    let penyesuaian = false;

    for (let i = 0; i < listHasil.length; i++) {
        fetch(`/Konversi/getPenyesuaianTrans/null/${listHasil[i].IdType}/06`)
            .then((response) => response.json())
            .then((data) => {
                if (data[0].jumlah > 1) {
                    alert(
                        "Terdapat penyesuaian untuk type " + listHasil[i].Type
                    );
                    penyesuaian = true;
                }
            });
    }

    return penyesuaian;
}

function prosesInventory() {
    const getIdTrans = (jum_hutang) => {
        for (let j = 0; j < jum_hutang.length; j++) {
            if (j != 0) {
                listHutangExt.length = 0;
            }

            fetch(`/Konversi/getIdTransInv/
                ${id_type[j]}/
                ${subkel[j]}/
                ${dateInput.value}/
                ${shift}`)
                .then((response) => response.json())
                .then((data) => {
                    for (let k = 0; k < data.length; k++) {
                        listHutangExt.push(data[k]);

                        fetchStmt(
                            `/Konversi/updHutang/
                            ${id_type[j]}/
                            tmpUser/
                            ${subkel[j]}/
                            ${listHutangExt[k].Trans}`,

                            () => {
                                if (listHutangExt.length - 1) {
                                    hidInventory.value = `Proses Inventory Berhasil! Ada hutang ditemukan.`;
                                    hidInventory.dispatchEvent(
                                        new Event("change")
                                    );
                                }
                            }
                        );
                    }
                })
                .catch((error) => {
                    hidInventory.value = `Error pada "udpHutang" atau "getIdTransInv"`;
                    hidInventory.dispatchEvent(new Event("change"));

                    console.error("Error: ", error);
                });
        }
    };

    fetch(`/Konversi/getTransaksiKonv/
        ${listKonversi[konversiPil].IdKonversi}`)
        .then((response) => response.json())
        .then((data) => {
            for (let i = 0; i < data.length; i++) {
                listTmpTrans.push(data[i]); // dset.Tables(0)
            }

            // Cek saldo barang
            if (listTmpTrans.length > 0) {
                for (let i = 0; i < listTmpTrans.length; i++) {
                    if (
                        listTmpTrans[i].JumlahPengeluaranPrimer >
                            listTmpTrans[i].SaldoPrimer ||
                        listTmpTrans[i].JumlahPengeluaranSekunder >
                            listTmpTrans[i].SaldoSekunder ||
                        listTmpTrans[i].JumlahPengeluaranTritier >
                            listTmpTrans[i].SaldoTritier
                    ) {
                        alert(
                            `Saldo untuk type ${listTmpTrans[i].NamaType} tidak mencukupi`
                        );
                    }
                }
            }

            // Tentukan shift
            let shift = "";
            switch (timeAwal.value) {
                case "07:00":
                    shift = "P";
                    break;
                case "15:00" || "12:00":
                    shift = "S";
                    break;
                case "17:00" || "19:00" || "23:00":
                    shift = "M";
                    break;

                default:
                    break;
            }

            // Cek hutang EXT
            fetch(`/Konversi/getJumlahHutang/
                ${listTmpTrans[i].IdType}/
                ${listTmpTrans[i].idsubkelompok_type}/
                ${dateInput.value}/
                ${shift}`)
                .then((response) => response.json())
                .then((data) => {
                    for (let i = 0; i < data.length; i++) {
                        listTmpExt.push(data[i]); // dset.Tables(1)
                        // Total, TotalS
                    }

                    let jum_hutang = 0;
                    let id_type,
                        subkel = [];

                    for (let i = 0; i < listTmpTrans.length; i++) {
                        if (listTmpExt[i].TotalS == null) {
                            listTmpExt[i].TotalS = 0;
                        }

                        if (listTmpExt[i].Total == null) {
                            listTmpExt[i].Total = 0;
                        }

                        if (
                            listTmpTrans[i].JumlahPemasukanSekunder ==
                                listTmpExt[i].TotalS &&
                            listTmpTrans[i].JumlahPemasukanTritier ==
                                listTmpExt[i].Total &&
                            listTmpTrans[i].JumlahPemasukanSekunder != 0 &&
                            listTmpTrans[i].JumlahPemasukanTritier != 0
                        ) {
                            id_type.push(listTmpTrans[i].IdType);
                            subkel.push(listTmpTrans[i].idsubkelompok_type);
                            jum_hutang += 1;
                        } else {
                            if (
                                listTmpExt[i].TotalS != 0 ||
                                listTmpExt[i].Total != 0
                            ) {
                                alert(
                                    "Jumlah hutang tidak sesuai dengan konversi."
                                );
                            } else {
                                alert("Tidak ada hutang kawan!");
                            }
                        }
                    }

                    if (jum_hutang > 0) {
                        showModal(
                            "Lunasi",
                            "Ada hutang benang, apakah ingin dilunaskan?",
                            () => {
                                for (let i = 0; i < listTmpTrans.length; i++) {
                                    fetchStmt(
                                        `/Konversi/updACCKonversi/
                                            ${listTmpTrans[i].IdTransaksi}/
                                            ${listTmpTrans[i].IdType}/
                                            tmpUser/
                                            ${dateInput.value}/
                                            ${listTmpTrans[i].JumlahPengeluaranPrimer}/
                                            ${listTmpTrans[i].JumlahPengeluaranSekunder}/
                                            ${listTmpTrans[i].JumlahPemasukanPrimer}/
                                            ${listTmpTrans[i].JumlahPemasukanSekunder}/
                                            ${listTmpTrans[i].JumlahPemasukanTritier}`
                                    );

                                    getIdTrans(jum_hutang);
                                }
                            },
                            () => {}
                        );
                    } else {
                        for (let i = 0; i < listTmpTrans.length; i++) {
                            fetchStmt(
                                `/Konversi/updACCKonversi/
                                    ${listTmpTrans[i].IdTransaksi}/
                                    ${listTmpTrans[i].IdType}/
                                    tmpUser/
                                    ${dateInput.value}/
                                    ${listTmpTrans[i].JumlahPengeluaranPrimer}/
                                    ${listTmpTrans[i].JumlahPengeluaranSekunder}/
                                    ${listTmpTrans[i].JumlahPemasukanPrimer}/
                                    ${listTmpTrans[i].JumlahPemasukanSekunder}/
                                    ${listTmpTrans[i].JumlahPemasukanTritier}`,

                                () => {
                                    if (i == listTmpTrans.length - 1) {
                                        hidInventory.value = `Proses Inventory Berhasil! Tidak ada hutang ditemukan.`;
                                        hidInventory.dispatchEvent(
                                            new Event("change")
                                        );
                                    }
                                }
                            );
                        }
                    }
                })
                .catch((error) => {
                    hidInventory.value = `Error pada "getJumlahHutang"`;
                    hidInventory.dispatchEvent(new Event("change"));

                    console.error("Error: ", error);
                });
        });

    return sukses;
}

function prosesExtruder() {
    const cekSisaOrd = () => {
        fetch(`/Konversi/getOrderStatus/${txtIdOrder.value}`)
            .then((response) => response.json())
            .then((data) => {
                if (data[0].StatusOrder == "FINISH") {
                    alert(
                        `Order dengan nomor ${
                            txtIdOrder.value
                        } sudah terpenuhi. Terdapat sisa stok sebesar: ${
                            data[0].JumlahPemasukanTritier -
                            data[0].JumlahTritier
                        }.`
                    );
                } else {
                    alert(
                        `Order dengan nomor ${
                            txtIdOrder.value
                        } sudah terpenuhi sebesar: ${
                            data[0].JumlahProduksiTritier -
                            data[0].JumlahTritier
                        }. Sisa yang belum terpenuhi sebesar: ${
                            data[0].JumlahTritier -
                            data[0].JumlahProduksiTritier
                        }`
                    );
                }

                hidExtruder.value = `Proses Extruder Behasil! Lancar jaya.`;
                hidExtruder.dispatchEvent(new Event("change"));
            })
            .catch((error) => {
                hidExtruder.value = `Error pada "getOrderStatus"`;
                hidExtruder.dispatchEvent(new Event("change"));

                console.error(error);
            });
    };

    // Update master konversi
    fetchStmt(
        `/Konversi/updACCMasterKonv/
        ${listKonversi[konversiPil].IdKonversi}/
        tmpUser`,

        () => {
            // Update order
            for (let i = 0; i < listHasil.length; i++) {
                if (listHasil[i].StatusType == "HP") {
                    const post_action =
                        i === listHasil.length - 1
                            ? () => {
                                  fetch(
                                      `/Konversi/getKeteranganSaldo/
                                      ${txtIdOrder.value}/
                                      ${txtNoUrut.value}`
                                  )
                                      .then((response) => response.json())
                                      .then((data) => {
                                          alert(data.nmerror);
                                          cekSisaOrd();
                                      })
                                      .catch((error) => {
                                          hidExtruder.value = `Error pada "getKeteranganSaldo" atau "updACCMasterKonv"`;
                                          hidExtruder.dispatchEvent(
                                              new Event("change")
                                          );

                                          console.error(error);
                                      });
                              }
                            : () => {};

                    fetchStmt(
                        `/Konversi/updSaldoOrdDet/
                        ${txtIdOrder.value}/
                        ${txtNoUrut.value}/
                        ${listHasil[i].JumlahPrimer}/
                        ${listHasil[i].JumlahSekunder}/
                        ${listHasil[i].JumlahTritier}`,
                        post_action
                    );
                }
            }
        }
    );
}
//#endregion

function init() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "450px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
        },
    });

    $("#table_hasil").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableHasilCol,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel hasil...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );
            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    daftarKonversiBelumACC();
}

$(document).ready(function () {
    init();
});
