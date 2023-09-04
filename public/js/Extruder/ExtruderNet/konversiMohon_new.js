//#region Variables
const slcNomor = document.getElementById("select_nomor");
const slcOrder = document.getElementById("select_nomor_order");
const slcSpek = document.getElementById("select_spek");
const slcMesin = document.getElementById("select_mesin");
const slcKomposisi = document.getElementById("select_komposisi");

const txtShift = document.getElementById("shift");
const txtWarna = document.getElementById("warna");
const txtIdProd = document.getElementById("id_produksi");
const txtNamaProd = document.getElementById("nama_produksi");
const txtJenis = document.getElementById("jenis");

const numLot = document.getElementById("lot");
const numUkuran = document.getElementById("ukuran");
const numDenier = document.getElementById("denier");
const numStokPrimer = document.getElementById("stok_primer");
const numPrimer = document.getElementById("primer");
const numStokSekunder = document.getElementById("stok_sekunder");
const numSekunder = document.getElementById("sekunder");
const numStokTritier = document.getElementById("stok_tritier");
const numTritier = document.getElementById("tritier");

const dateTanggal = document.getElementById("tanggal");
const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");
const timeMulai = document.getElementById("waktu_mulai");
const timeSelesai = document.getElementById("waktu_selesai");

const spnSatPrimer = document.getElementById("sat_primer");
const spnSatSekunder = document.getElementById("sat_sekunder");
const spnSatTritier = document.getElementById("sat_tritier");

const btnTambahDetail = document.getElementById("btn_baru_detail");
const btnKoreksiDetail = document.getElementById("btn_koreksi_detail");
const btnHapusDetail = document.getElementById("btn_hapus_detail");
const btnBaruMaster = document.getElementById("btn_baru_master");
const btnKoreksiMaster = document.getElementById("btn_koreksi_master");
const btnHapusMaster = document.getElementById("btn_hapus_master");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const hidNoUrut = document.getElementById("no_urut");

const listKonversi = [];
/* ISI LIST KONVERSI
    0 Type
    1 IdType *hidden
    2 JumlahPrimer
    3 SatPrimer
    4 JumlahSekunder
    5 SatSekunder
    6 JumlahTritier
    7 SatTrititer
    8 Persentase
    9 StatusType *Jenis
    10 IdSubKelompok
*/

const listKomposisi = [];
/* ISI LIST KOMPOSISI
    0 StatusType *Jenis
    1 IdType *hidden
    2 NamaType
    3 NamaSubKelompok
    4 SatuanPrimer *hidden
    5 SatuanSekunder *hidden
    6 SatuanTritier *hidden
    7 IdSubKelompok
*/

const colKonversi = [
    { width: "350px" }, // Nama Type
    { width: "100px" }, // Qty. Primer
    { width: "100px" }, // Sat. Primer
    { width: "125px" }, // Qty. Sekunder
    { width: "125px" }, // Sat. Sekunder
    { width: "100px" }, // Qty. Tritier
    { width: "100px" }, // Sat. Tritier
    { width: "60px" }, // Presentase
    { width: "60px" }, // Jenis
    { width: "125px" }, // Sub-kelompok
];

const colKomposisi = [
    { width: "50px" }, // Jenis
    { width: "275px" }, // Nama Type
    { width: "125px" }, // Sub-kelompok
    { width: "100px" }, // Id Sub-kel.
];

const listOfDetail = document.querySelectorAll(".card input, .card span");
const listOfMaster = document.querySelectorAll("input:not(.card input)");
const listOfSelect = document.querySelectorAll("select");

var modeProses = "";
//#endregion

//#region Events
//#endregion

//#region Functions
function clearDataDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") {
            ele.value = "";
        } else ele.textContent = "";
    });
}

function clearDataMaster() {
    listOfMaster.forEach((ele) => (ele.value = ""));
    listOfSelect.forEach((ele) => (ele.selectedIndex = 0));
}

function disableDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") ele.disabled = true;
    });
}

function disableMaster() {
    listOfMaster.forEach((ele) => (ele.disabled = true));
}

function getDataKomposisiFetch(no_komposisi) {
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length);

    // SP_5298_EXT_LIST_KOMPOSISI_BAHAN
    fetchSelect(
        "/Konversi/getListKomposisiBahan/" + no_komposisi.trim(),
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listKomposisi.push({
                    StatusType: data[i].StatusType,
                    IdType: data[i].IdType,
                    NamaType: data[i].NamaType,
                    NamaSubKelompok: data[i].NamaSubKelompok,
                    SatuanPrimer:
                        data[i].SatuanPrimer !== undefined
                            ? data[i].SatuanPrimer
                            : "Null",
                    SatuanSekunder:
                        data[i].SatuanSekunder !== undefined
                            ? data[i].SatuanSekunder
                            : "Null",
                    SatuanTritier:
                        data[i].SatuanTritier !== undefined
                            ? data[i].SatuanTritier
                            : "Null",
                    IdSubKelompok: data[i].IdSubKelompok,
                });
            }

            addTable_DataTable("table_komposisi", listKomposisi, colKomposisi);
        }
    );
}

function getSatuanFetch(id_type, i) {
    // SP_5298_EXT_GET_SATUAN
    fetchSelect("/Konversi/getSatuan/" + id_type, (data) => {
        listKonversi[i].SatPrimer = data[0].SatPrimer;
        listKonversi[i].SatSekunder = data[0].SatSekunder;
        listKonversi[i].SatTritier = data[0].SatTritier;

        if (i == listKonversi.length - 1) {
            addTable_DataTable("table_konversi", listKonversi, colKonversi);

            prosesIsiFetch();
        }
    });
}

function getSaldoFetch(id_type) {
    // SP_5298_EXT_SALDO_BARANG
    fetchSelect("/Konversi/getSaldoBarang/" + id_type, (data) => {
        numStokPrimer.value = data[0].SaldoPrimer;
        numStokSekunder.value = data[0].SaldoSekunder;
        numStokTritier.value = data[0].SaldoTritier;
    });
}

function getDataKonversiFetch(id_konversi) {
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", colKonversi.length);

    // SP_5298_EXT_DATA_KONVERSI
    fetchSelect("/Konversi/getDataKonversi/" + id_konversi.trim(), (data) => {
        dateTanggal.value = dateTimeToDate(data[0].Tanggal);
        txtShift.value = data[0].Shift.trim();
        timeAwal.value = dateTimetoTime(data[0].AwalShift);
        timeAkhir.value = dateTimetoTime(data[0].AkhirShift);
        numUkuran.value = data[0].Ukuran;
        numDenier.value = data[0].Denier;
        timeMulai.value = dateTimetoTime(data[0].JamMulai);
        timeSelesai.value = dateTimetoTime(data[0].JamSelesai);
        txtWarna.value = data[0].Warna.trim();
        numLot.value = data[0].LotNumber.trim();
        hidNoUrut.value = data[0].NoUrutOrderEXT;

        addOptionIfNotExists(
            slcMesin,
            data[0].IdMesin.trim(),
            data[0].IdMesin.trim() + " | " + data[0].TypeMesin.trim()
        );

        addOptionIfNotExists(
            slcOrder,
            data[0].IdOrder.trim(),
            data[0].IdOrder.trim() + " | " + data[0].Identifikasi.trim()
        );

        addOptionIfNotExists(
            slcKomposisi,
            data[0].IdKomposisi.trim(),
            data[0].IdKomposisi.trim() + " | " + data[0].NamaKomposisi.trim()
        );

        addOptionIfNotExists(slcSpek, data[0].TypeBenang.trim());

        // SP_5298_EXT_LIST_DETAIL_KONVERSI_1
        fetchSelect(
            "/Konversi/getListDetailKonversi/" + id_konversi.trim(),
            (data) => {
                for (let i = 0; i < data.length; i++) {
                    listKonversi.push({
                        Type: data[i].Type,
                        IdType: data[i].IdType,
                        JumlahPrimer: data[i].JumlahPrimer,
                        SatPrimer: "",
                        JumlahSekunder: data[i].JumlahSekunder,
                        SatSekunder: "",
                        JumlahTritier: data[i].JumlahTritier,
                        SatTritier: "",
                        Persentase: data[i].Persentase,
                        StatusType: data[i].StatusType,
                        IdSubKelompok: data[i].IdSubKelompok,
                    });
                }

                for (let i = 0; i < listKonversi.length; i++) {
                    getSatuanFetch(listKonversi[i].IdType.trim(), i);
                }
            }
        );
    });
}

function createTmpTransaksiInventoryFetch(i, id_konv_inv) {
    let uraian = "";
    if (
        listKonversi[i].StatusType.trim() == "BB" ||
        listKonversi[i].StatusType.trim() == "BP"
    ) {
        uraian = "asal_konversi";
    } else if (
        listKonversi[i].StatusType == "HP" ||
        listKonversi[i].StatusType == "AF"
    ) {
        uraian = "tujuan_konversi";
    } else {
        alert("Jenis tidak valid.");
        return;
    }

    // SP_5298_EXT_INSERT_04_ASALTMPTRANSAKSI
    // SP_5298_EXT_INSERT_04_TUJUANTMPTRANSAKSI
    fetchStmt(
        "/Konversi/insTmpTransaksi/04/" +
            uraian +
            "/" +
            listKonversi[i].IdType.trim() +
            "/4384/" +
            dateTanggal.value +
            "/" +
            listKonversi[i].JumlahPrimer.replace(".", "_") +
            "/" +
            listKonversi[i].JumlahSekunder.replace(".", "_") +
            "/" +
            listKonversi[i].JumlahTritier.replace(".", "_") +
            "/" +
            listKonversi[i].IdSubKelompok.trim() +
            "/" +
            id_konv_inv.trim()
    );
}

function insertDetailFetch(id_konv_inv) {
    let totalBahan = hitungTotalBahan();
    let persentase = 0;
    for (let i = 0; i < listKonversi.length; i++) {
        if (
            listKonversi[i].StatusType == "BB" ||
            listKonversi[i].StatusType == "BP" ||
            listKonversi[i].StatusType == "AF"
        ) {
            persentase = persentase(listKonversi[i].JumlahTritier, totalBahan);
        }

        // SP_5409_EXT_INSERT_DETAILKONVERSI
        fetchStmt(
            "/Konversi/insDetailKonversi/" +
                slcNomor.value +
                "/" +
                listKonversi[i].IdType +
                "/" +
                listKonversi[i].JumlahPrimer.replace(".", "_") +
                "/" +
                listKonversi[i].JumlahSekunder.replace(".", "_") +
                "/" +
                listKonversi[i].JumlahTritier.replace(".", "_") +
                "/" +
                persentase +
                "/" +
                id_konv_inv,
            () => {
                createTmpTransaksiInventoryFetch(i, id_konv_inv);
            }
        );
    }
}

function ambilDataUkuran(nama_spek) {
    try {
        let x = nama_spek.split("-", 5);
        txtUkuran.value = parseFloat(x[1]) / 100;

        let denier = -1;
        switch (x[2].substring(0, 1)) {
            case "A":
                denier = 1000;
                break;
            case "B":
                denier = 1100;
                break;
            case "C":
                denier = 1200;
                break;
            case "D":
                denier = 1300;
                break;
            case "E":
                denier = 1400;
                break;
            case "F":
                denier = 1500;
                break;
            case "G":
                denier = 1600;
                break;
            case "H":
                denier = 1700;
                break;
            case "I":
                denier = 1800;
                break;
            case "J":
                denier = 1900;
                break;
            case "K":
                denier = 2000;
                break;
            case "L":
                denier = 2100;
                break;
            case "M":
                denier = 2200;
                break;
            case "N":
                denier = 2300;
                break;

            default:
                if (!isNaN(x[2].substring(0, 1))) {
                    denier = x[2] * 10;
                } else alert("Denier tidak valid.");
                break;
        }
    } catch (error) {
        console.error("Error: ", error);
        alert("Gagal menentukan ukuran.");
    }
}

function hitungTotalBahan() {
    let qty = 0;
    for (let i = 0; i < listKonversi.length; i++) {
        if (
            listKonversi[i].StatusType.trim() == "BB" ||
            listKonversi[i].StatusType.trim() == "BP"
        ) {
            qty += listKonversi[i].JumlahTritier;
        }
    }

    return qty;
}

function persentase(qty_tritier, total_bahan) {
    return Math.round((qty_tritier / total_bahan) * 100 * 100) / 100;
}

function prosesIsiFetch() {
    // SP_5298_EXT_INSERT_MASTER_KONVERSI
    fetchStmt(
        "/Konversi/insMasterKonversi/" +
            dateTanggal.value +
            "/" +
            txtShift.value +
            "/" +
            timeAwal.value.replace(":", "_") +
            "/" +
            timeAkhir.value.replace(":", "_") +
            "/" +
            slcMesin.value +
            "/" +
            numUkuran.value.replace(".", "_") +
            "/" +
            numDenier.value.replace(".", "_") +
            "/" +
            txtWarna.value +
            "/" +
            numLot.value.replace(".", "_") +
            "/" +
            slcKomposisi.value +
            "/" +
            timeMulai.value.replace(":", "_") +
            "/" +
            timeSelesai.value.replace(":", "_") +
            "/4384",
        () => {
            fetchSelect("/Konversi/getMasterKonversi", (data) => {
                console.log(data);
            });
        }
    );
}
//#endregion

function initKonversiMohon() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKonversi,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
        },
    });

    $("#table_komposisi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKomposisi,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel komposisi...",
            search: "",
        },

        initComplete: function () {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    clearTable_DataTable("table_konversi", colKonversi.length);
    clearTable_DataTable("table_komposisi", colKomposisi.length);

    // getDataKomposisiFetch("DEX000013");
    // getSatuanFetch(1);
    getDataKonversiFetch("EXT-0000009013");
}

$(document).ready(() => initKonversiMohon());
