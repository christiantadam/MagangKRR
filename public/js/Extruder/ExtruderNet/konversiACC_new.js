//#region Variables
const dateInput = document.getElementById("tanggal");
const hidInput = document.getElementById("hidden_input");

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
const listOfInputTime = document.querySelectorAll("input[type='time']");

const listKonversi = [];
/* ISI LIST KONVERSI
    0 IdKonversi
    1 IdDivisi *hidden
    2 NamaDivisi *hidden
    3 Tanggal *hidden
    4 Shift *hidden
    5 AwalShift *hidden
    6 AkhirShift *hidden
    7 IdMesin *hidden
    8 TypeMesin *hidden
    9 Ukuran *hidden
    10 Denier *hidden
    11 Warna *hidden
    12 LotNumber *hidden
    13 IdOrder *hidden
    14 Identifikasi *hidden
    15 IdKomposisi *hidden
    16 Spec
    17 JamMulai *hidden
    18 JamSelesai *hidden
    19 NoUrutOrderEXT
*/

const listHasil = [];
/* ISI LIST HASIL
    0 NamaType
    1 IdType
    2 QtyPrimer
    3 SatPrimer
    4 QtySekunder
    5 SatSekunder
    6 QtyTritier
    7 SatTritier
    8 Persentase
    9 Jenis
*/

const listTmpTrans = [];
/* ISI LIST TMP TRANSAKSI
    0 IdTransaksi
    1 IdTypeTransaksi
    2 UraianDetailTransaksi
    3 IdType
    4 IdPenerima
    5 IdPemberi
    6 SaatAwalTransaksi
    7 SaatAkhirTransaksi
    8 JumlahPemasukanPrimer
    9 JumlahPemasukanSekunder
    10 JumlahPemasukanTritier
    11 JumlahPengeluaranPrimer
    12 JumlahPengeluaranSekunder
    13 JumlahPengeluaranTritier
    14 AsalIdSubKelompok
    15 TujuanIdSubKelompok
    16 idkonversi
    17 SaldoPrimer
    18 SaldoSekunder
    19 SaldoTritier
    20 namatype
    21 idsubkelompok_type
*/

const listTmpExt = [];
/* ISI LIST TMP EXTRUDER
    0 Total
    1 TotalS
*/

const listHutangExt = [];
/* ISI LIST HUTANG EXT
    0 Trans
*/

const tableHasilCol = [
    { width: "300px" }, // Nama Type
    { width: "100px" }, // Qty. Primer
    { width: "100px" }, // Sat. Primer
    { width: "110px" }, // Qty. Sekunder
    { width: "110px" }, // Sat. Sekunder
    { width: "100px" }, // Qty. Tritier
    { width: "100px" }, // Sat. Tritier
    { width: "1px" }, // Persentase
    { width: "1px" }, // Jenis
];

var listIdType;
var listSubKel;
var konversiPil = -1;
var prosesInventory = "";
//#endregion

//#region Events
btnProses.addEventListener("click", function () {});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/ExtruderNet";
});

hidInput.addEventListener("change", function () {
    let [strFunction, strData] = (let[(strFunction, strData)] = this.value
        .split("|")
        .map((str) => str.trim()));

    if (strFunction == "cekPenyesuaian") {
        console.log("Cek penyesuaian selesai.");
    } else if (strFunction == "prosesInventory") {
        console.log("Proses inventory selesai.");
    }
});
//#endregion

//#region Functions
function clearForm(emptyAll = true) {
    listOfInputTxt.forEach((input) => (input.value = ""));
    listOfInputTime.forEach((input) => (input.value = "00:00"));
    dateInput.value = getCurrentDate();

    listHasil.length = 0;
    clearTable_DataTable("table_hasil", tableHasilCol.length);

    if (emptyAll) {
        listKonversi.length = 0;
        clearTable_DataTable("table_konversi", 2);
    }
}

function daftarKonversiBelumACCFetch() {
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", 2, "Memuat data...");

    // SP_5298_EXT_LIST_KONV_BLM_ACC
    fetchSelect("/Konversi/getListKonvBlmAcc/EXT", (data) => {
        if (data.length == 0) {
            clearTable_DataTable(
                "table_konversi",
                2,
                "Data konversi tidak ditemukan."
            );
        } else {
            for (let i = 0; i < data.length; i++) {
                listKonversi.push({
                    IdKonversi: data[i].IdKonversi,
                    IdDivisi: data[i].IdDivisi,
                    NamaDivisi: data[i].NamaDivisi,
                    Tanggal: data[i].Tanggal,
                    Shift: data[i].Shift,
                    AwalShift: data[i].AwalShift,
                    AkhirShift: data[i].AkhirShift,
                    IdMesin: data[i].IdMesin,
                    TypeMesin: data[i].TypeMesin,
                    Ukuran: data[i].Ukuran,
                    Denier: data[i].Denier,
                    Warna: data[i].Warna,
                    LotNumber: data[i].LotNumber,
                    IdOrder: data[i].IdOrder,
                    Identifikasi: data[i].Identifikasi,
                    IdKomposisi: data[i].IdKomposisi,
                    NamaKomposisi: data[i].NamaKomposisi,
                    JamMulai: data[i].JamMulai,
                    JamSelesai: data[i].JamSelesai,
                    NoUrut: data[i].nourutorderext,
                });
            }

            addTable_DataTable(
                "table_konversi",
                listKonversi.map((item, index) => {
                    return {
                        IdKonversi: `<input class="form-check-input" type="checkbox" value="${index}" name="checkbox_konversi"> ${item.IdKonversi}`,
                        NamaKomposisi: item.NamaKomposisi,
                    };
                }),
                null,
                null,
                "450px"
            );

            const checkboxes = document.querySelectorAll(
                'input[name="checkbox_konversi"]'
            );

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    clearCheckedBoxes(checkboxes, checkbox);
                    if (checkbox.checked) {
                        konversiPil = checkbox.value;
                        listHasil.length = 0;
                        clearTable_DataTable(
                            "table_hasil",
                            tableHasilCol.length,
                            "Memuat data..."
                        );

                        tampilRincianKonversi(
                            konversiPil,
                            listKonversi[konversiPil].IdKonversi
                        );
                    } else {
                        clearForm(false);
                    }
                });
            });
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

    // DEBUG
    // console.log(dateInput.value);
    // console.log(formatDateToDDMMYY(dateInput.value));

    tampilDetailKonversiFetch(id_konversi);
}

function tampilDetailKonversiFetch(id_konversi) {
    // SP_5298_EXT_LIST_KONV_DETAIL_1
    fetchSelect("/Konversi/getListKonvDetail/" + id_konversi, (data) => {
        if (data.length == 0) {
            clearTable_DataTable(
                "table_hasil",
                tableHasilCol.length,
                `Data untuk Konversi <b>${id_konversi}</b> tidak ditemukan.`
            );
        } else {
            for (let i = 0; i < data.length; i++) {
                listHasil.push({
                    Type: data[i].Type,
                    IdType: data[i].IdType,
                    JumlahPrimer: data[i].JumlahPrimer,
                    SatuanPrimer: data[i].SatuanPrimer,
                    JumlahSekunder: data[i].JumlahSekunder,
                    SatuanSekunder: data[i].SatuanSekunder,
                    JumlahTritier: data[i].JumlahTritier,
                    SatuanTritier: data[i].SatuanTritier,
                    Persentase: data[i].Persentase,
                    StatusType: data[i].StatusType,
                });
            }

            addTable_DataTable("table_hasil", listHasil, tableHasilCol);
            hitungJumlahBahanHasil();

            // DEBUG
            // cekPenyesuaianFetch();

            konversiPil = 0;
            prosesInventoryFetch();
        }
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
            jum_bahan += parseFloat(listHasil[i].JumlahTritier);
        } else if (listHasil[i].StatusType == "AF") {
            jum_afalan += parseFloat(listHasil[i].JumlahTritier);
        } else if (listHasil[i].StatusType == "HP") {
            jum_hasil += parseFloat(listHasil[i].JumlahTritier);
        }
    }

    txtBahanTerpakai.value = jum_bahan != 0 ? jum_bahan : "";
    txtHasilTimbang.value = jum_hasil != 0 ? jum_hasil : "";
    txtAfalan.value = jum_afalan != 0 ? jum_afalan : "";

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
            parseFloat(
                txtHasilTimbang.value.trim() == "" ? 0 : txtHasilTimbang.value
            ) + parseFloat(txtAfalan.value.trim() == "" ? 0 : txtAfalan.value);

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
        } else
            alert(
                "Jumlah bahan tidak valid (Jumlah bahan = " + jum_bahan + ")."
            );
    } else if (
        txtIdMesin.value === "M-001" ||
        txtIdMesin.value === "M-002" ||
        txtIdMesin.value === "M-005"
    ) {
        toleransi = (4 / 100) * jum_bahan;
        range1 = jum_bahan - toleransi;
        range2 = jum_bahan + toleransi;
        total_hasil_produksi =
            parseFloat(
                txtHasilTimbang.value.trim() == "" ? 0 : txtHasilTimbang.value
            ) + parseFloat(txtAfalan.value.trim() == "" ? 0 : txtAfalan.value);

        if (total_hasil_produksi >= range1 && total_hasil_produksi <= range2) {
            btnProses.disabled = false;
            btnProses.focus();
        } else if (total_hasil_produksi < range1) {
            alert(
                "Total Hasil Produksi = " +
                    total_hasil_produksi +
                    ", lebih kecil dari = " +
                    range1
            );
        } else if (total_hasil_produksi > range2) {
            alert(
                "Total Hasil Produksi = " +
                    total_hasil_produksi +
                    ", lebih besar dari = " +
                    range2
            );
        } else
            alert(
                "Jumlah bahan tidak valid (Jumlah bahan = " + jum_bahan + ")."
            );
    } else
        alert(
            "Type mesin tidak terdaftar (Type mesin = " +
                txtIdMesin.value +
                ")."
        );
}

function cekPenyesuaianFetch() {
    let penyesuaian = false;
    for (let i = 0; i < listHasil.length; i++) {
        if (!penyesuaian) {
            // SP_5298_EXT_CHECK_PENYESUAIAN_TRANSAKSI
            fetchSelect(
                "/Konversi/getPenyesuaianTransaksi/" +
                    listHasil[i].IdType.trim() +
                    "/06",
                (data) => {
                    if (data > 1) {
                        penyesuaian = true;
                        alert(
                            "Terdapat penyesuaian untuk type " +
                                listHasil[i].NamaType +
                                "."
                        );

                        hidInput.value = "cekPenyesuaian | " + penyesuaian;
                        hidInput.dispatchEvent(new Event("change"));
                    }
                }
            );
        } else break;
    }

    hidInput.value = "cekPenyesuaian | " + penyesuaian;
    hidInput.dispatchEvent(new Event("change"));
}

function prosesInventoryFetch() {
    // SP_5409_EXT_DISPLAY_TRANSAKSI_KONVERSI
    fetchSelect(
        "/Konversi/getTransaksiKonversi/" +
            listKonversi[konversiPil].IdKonversi,
        (dataTrans) => {
            for (let i = 0; i < dataTrans.length; i++)
                listTmpTrans.push(dataTrans[i]);

            // Cek saldo barang
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
                        "Saldo untuk type " +
                            listTmpTrans[i].NamaType +
                            " tidak mencukupi."
                    );

                    return;
                }
            }

            // Tentukan shift
            let shift = "";
            let waktuAwal = new Date("1970-01-01T" + timeAwal.value);
            if (waktuAwal <= new Date("1970-01-01T11:59")) {
                shift = "P";
            } else if (waktuAwal <= new Date("1970-01-01T16:59")) {
                shift = "S";
            } else shift = "M";

            // Cek hutang berdasarkan [id_type, subkel, shift, tgl]
            for (let i = 0; i < listTmpTrans.length; i++) {
                // SP_5298_EXT_AMBIL_JUMLAH_HUTANG
                fetchSelect(
                    "/Konversi/getJumlahHutang/" +
                        listTmpTrans[i].IdType.trim() +
                        "/" +
                        listTmpTrans[i].idsubkelompok_type.trim() +
                        "/" +
                        shift +
                        "/" +
                        formatDateToDDMMYY(dateInput.value),
                    (dataHut) => {
                        for (let j = 0; j < dataHut.length; j++)
                            listTmpExt.push(dataHut[j]);

                        // Cek apakah jumlah yang dikonversi = hutang
                        let jmlh_hutang = -1;
                        listIdType = new Array(50);
                        listSubKel = new Array(50);

                        for (let j = 0; j < listTmpTrans.length; j++) {
                            if (listTmpExt[j].TotalS === undefined)
                                listTmpExt[j].TotalS = 0;
                            if (listTmpExt[j].Total === undefined)
                                listTmpExt[j].Total = 0;

                            if (
                                listTmpTrans[j].JumlahPemasukanSekunder ==
                                    listTmpExt[j].TotalS &&
                                listTmpTrans[j].JumlahPemasukanTritier ==
                                    listTmpExt[j].Total &&
                                (listTmpTrans[j].JumlahPemasukanSekunder != 0 ||
                                    listTmpTrans[j].JumlahPemasukanTritier != 0)
                            ) {
                                listIdType[jmlh_hutang] =
                                    listTmpTrans[j].IdType;
                                listSubKel[jmlh_hutang] =
                                    listTmpTrans[j].idsubkelompok_type;
                                jmlh_hutang += 1;
                            } else {
                                if (
                                    listTmpExt[j].TotalS != 0 ||
                                    listTmpExt[j].Total != 0
                                ) {
                                    alert(
                                        "Jumlah hutang tidak sesuai dengan konversi."
                                    );

                                    return;
                                } else
                                    console.log(
                                        "Tidak ditemukan hutang extruder"
                                    );
                            }
                        }

                        if (jmlh_hutang > 0) {
                            lunasiHutangFetch(jmlh_hutang);
                        } else {
                            // Tidak ditemukan hutang extruder

                            for (let j = 0; j < listTmpTrans.length; j++) {
                                // SP_5298_EXT_PROSES_ACC_KONVERSI
                                fetchStmt(
                                    "/Konversi/updProsesACCKonversi/" +
                                        listTmpTrans[j].IdTransaksi +
                                        "/" +
                                        listTmpTrans[j].IdType +
                                        "/4384/" +
                                        listTmpTrans[j]
                                            .JumlahPengeluaranPrimer +
                                        "/" +
                                        listTmpTrans[j]
                                            .JumlahPengeluaranSekunder +
                                        "/" +
                                        listTmpTrans[j]
                                            .JumlahPengeluaranTritier +
                                        "/" +
                                        listTmpTrans[j].JumlahPemasukanPrimer +
                                        "/" +
                                        listTmpTrans[j]
                                            .JumlahPemasukanSekunder +
                                        "/" +
                                        listTmpTrans[j].JumlahPemasukanTritier
                                );
                            }
                        }
                    }
                );
            }
        }
    );
}

function lunasiHutangFetch(jmlh_hutang) {
    showModal(
        "Lunasi",
        "Ditemukan hutang benang, apakah ingin dilunasi?",
        () => {
            for (let j = 0; j < listTmpTrans.length; j++) {
                // SP_5298_EXT_PROSES_ACC_KONVERSI
                fetchStmt(
                    "/Konversi/updProsesACCKonversi/" +
                        listTmpTrans[j].IdTransaksi +
                        "/" +
                        listTmpTrans[j].IdType +
                        "/4384/" +
                        listTmpTrans[j].JumlahPengeluaranPrimer +
                        "/" +
                        listTmpTrans[j].JumlahPengeluaranSekunder +
                        "/" +
                        listTmpTrans[j].JumlahPengeluaranTritier +
                        "/" +
                        listTmpTrans[j].JumlahPemasukanPrimer +
                        "/" +
                        listTmpTrans[j].JumlahPemasukanSekunder +
                        "/" +
                        listTmpTrans[j].JumlahPemasukanTritier,
                    () => {
                        if (j == listTmpTrans.length - 1) {
                            for (let k = 0; k < jmlh_hutang; k++) {
                                if (k != 0) listHutangExt.length = 0;

                                // SP_5298_EXT_GET_IDTRANS_INV
                                fetchSelect(
                                    "/Konversi/getIdTransInv/" +
                                        listIdType[k] +
                                        "/" +
                                        listSubKel[k] +
                                        "/" +
                                        formatDateToDDMMYY(dateInput.value) +
                                        "/" +
                                        shift,
                                    (dataIdTrans) => {
                                        for (
                                            let l = 0;
                                            l < dataIdTrans.length;
                                            l++
                                        ) {
                                            listHutangExt.push(dataIdTrans);
                                        }

                                        for (
                                            let l = 0;
                                            l < listHutangExt.length;
                                            l++
                                        ) {
                                            // SP_5298_EXT_PROSES_UPDATE_HUTANG
                                            fetchStmt(
                                                "/Konversi/updProsesHutang/" +
                                                    listIdType[k] +
                                                    "/4384/" +
                                                    listSubKel[k] +
                                                    "/" +
                                                    listHutangExt[l].Trans,
                                                () => {
                                                    if (
                                                        l ==
                                                        listHutangExt.length - 1
                                                    )
                                                        alert(
                                                            "Hutang terlunasi."
                                                        );
                                                }
                                            );
                                        }
                                    }
                                );
                            }
                        } else console.log("Hutang tidak dilunasi.");
                    },
                    () => {}
                );
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

    timeAwal.value = "00:00";
    timeAkhir.value = "00:00";
    timeMulai.value = "00:00";
    timeSelesai.value = "00:00";
    daftarKonversiBelumACCFetch();
}

$(document).ready(() => init());
