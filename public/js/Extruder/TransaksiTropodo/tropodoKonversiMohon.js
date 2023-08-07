//#region Variables
const dateInput = document.getElementById("tanggal");

const txtShift = document.getElementById("shift");
const timeAwal = document.getElementById("shift_awal");
const timeAkhir = document.getElementById("shift_akhir");

const timeMulai = document.getElementById("waktu_mulai");
const timeSelesai = document.getElementById("waktu_selesai");

const btnTambah = document.getElementById("btn_tambah_item");
const btnKoreksiDetail = document.getElementById("btn_koreksi_dalam");
const btnHapusDetail = document.getElementById("btn_hapus_dalam");
const btnKonversi = document.getElementById("btn_konversi_baru");
const btnKoreksiMaster = document.getElementById("btn_koreksi_luar");
const btnHapusMaster = document.getElementById("btn_hapus_luar");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const txtLot = document.getElementById("lot");
const txtUkuran = document.getElementById("ukuran");
const txtDenier = document.getElementById("denier");
const txtWarna = document.getElementById("warna");
const txtProduksi1 = document.getElementById("item_produksi1");
const txtProduksi2 = document.getElementById("item_produksi2");
const txtStokPrimer = document.getElementById("stok_primer");
const txtStokSekunder = document.getElementById("stok_sekunder");
const txtStokTersier = document.getElementById("stok_tritier");
const txtPrimer = document.getElementById("primer");
const txtSekunder = document.getElementById("sekunder");
const txtTersier = document.getElementById("tritier");
const txtJenis = document.getElementById("jenis");
const txtNoUrut = document.getElementById("no_urut");

const slcNomor = document.getElementById("select_nomor");
const slcNoOrder = document.getElementById("select_order");
const slcSpek = document.getElementById("select_spek");
const slcMesin = document.getElementById("select_mesin");
const slcKomposisi = document.getElementById("select_komposisi");

const listOfInput = document.querySelectorAll(".card .form-control");
const listOfMasterInput = document.querySelectorAll(".master .form-control");
const listOfSelect = document.querySelectorAll(".form-select");

const listKomposisi = [];
const listKonversi = [];

var modeProses = "";
//#endregion

//#region Events
slcNomor.addEventListener("change", () => {
    listOfInput.forEach((input) => {
        input.value = "";
        input.disabled = false;
    });

    getDataKonversi(slcNomor.value);

    if (modeProses == "koreksi") {
        // BAGIAN INI BELUM SELESAI KAWAN!
    }

    // console.log(slcNomor.value);
    // console.log("Halo dunia!");
});
//#endregion

//#region Functions
function clearDataDetail() {
    listOfInput.forEach((input) => {
        input.value = "";
    });
}

function clearDataMaster() {
    listOfSelect.forEach((select) => {
        select.selectedIndex = 0;
    });
    listOfMasterInput.forEach((input) => {
        input.value = "";
    });
}

function disableDetail() {
    btnTambah.disabled = true;
    btnKoreksiDetail.disabled = true;
    btnHapusDetail.disabled = true;

    txtPrimer.disabled = true;
    txtSekunder.disabled = true;
    txtTersier.disabled = true;
}

function disableMaster() {
    listOfMasterInput.forEach((input) => {
        input.disabled = true;
    });
}

function toggleButton(tmb) {
    switch (tmb) {
        case 1:
            slcKomposisi.disabled = true;
            btnKonversi.disabled = false;
            btnKoreksiMaster.disabled = false;
            btnHapusMaster.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;
        case 2:
            btnKonversi.disabled = true;
            btnKoreksiMaster.disabled = true;
            btnHapusMaster.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";

        default:
            break;
    }
}

function getDataKomposisi(no_komposisi) {
    let tableData = [];

    fetch("/ExtruderNet/getListKomposisi/" + no_komposisi)
        .then((response) => response.json())
        .then((data) => {
            listKomposisi.length = 0;
            for (let i = 0; i < data.length; i++) {
                listKomposisi.push({
                    StatusType: data[i].StatusType,
                    IdType: data[i].IdType,
                    NamaType: data[i].NamaType,
                    NamaSubKelompok: data[i].NamaSubKelompok,
                    SatuanPrimer: data[i].SatuanPrimer,
                    SatuanSekunder: data[i].SatuanSekunder,
                    SatuanTritier: data[i].SatuanTritier,
                    IdSubKelompok: data[i].IdSubKelompok,
                });

                tableData.push({
                    StatusType: data[i].StatusType,
                    NamaType: data[i].NamaType,
                    NamaSubKelompok: data[i].NamaSubKelompok,
                    IdSubKelompok: data[i].IdSubKelompok,
                });
            }

            addTable_DataTable("table_komposisi", tableData);
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function getSaldo(id_type) {
    fetch("/ExtruderNet/getSaldoBarang/" + id_type)
        .then((response) => response.json())
        .then((data) => {
            txtStokPrimer.value = data[0].SaldoPrimer;
            txtStokSekunder.value = data[0].SaldoSekunder;
            txtStokTersier.value = data[0].SaldoTritier;
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function getDataKonversi(id_konversi) {
    let tableData = [];

    fetch("/ExtruderNet/getDataKonversi/" + id_konversi)
        .then((response) => response.json())
        .then((data) => {
            dateInput.value = data[0].Tanggal;
            txtShift.value = data[0].Shift;
            timeAwal.value = data[0].AwalShift;
            timeAkhir.value = data[0].AkhirShift;
            txtUkuran.value = data[0].Ukuran;
            txtDenier.value = data[0].Denier;
            timeMulai.value = data[0].JamMulai;
            timeSelesai.value = data[0].JamSelesai;
            txtWarna.value = data[0].Warna;
            txtLot.value = data[0].LotNumber;
            txtNoUrut.value = data[0].NoUrutOrderEXT;

            var optMesin = new Option(
                data[0].IdMesin + " | " + data[0].TypeMesin,
                data[0].IdMesin
            );
            var optOrder = new Option(
                data[0].IdOrder + " | " + data[0].Identifikasi,
                data[0].IdOrder
            );
            var optKomposisi = new Option(
                data[0].IdKomposisi + " | " + data[0].NamaKomposisi,
                data[0].IdKomposisi
            );
            var optSpek = new Option(data[0].TypeBenang, data[0].TypeBenang);

            slcMesin.appendChild(optMesin);
            slcNoOrder.appendChild(optOrder);
            slcKomposisi.appendChild(optKomposisi);
            slcSpek.appendChild(optSpek);

            optMesin.selected = true;
            optOrder.selected = true;
            optKomposisi.selected = true;
            optSpek.selected = true;
        })
        .catch((error) => {
            console.error("Error: ", error);
        });

    fetch("/ExtruderNet/getDetailKonversi/" + id_konversi)
        .then((response) => response.json())
        .then((data) => {
            listKonversi.length = 0;
            for (let i = 0; i < data.length; i++) {
                fetch("/ExtruderNet/getSatuan/" + data[i].IdType)
                    .then((response) => response.json())
                    .then((data2) => {
                        listKonversi.push({
                            Type: data[i].Type,
                            IdType: data[i].IdType, // subitems 1
                            JumlahPrimer: data[i].JumlahPrimer, // subitems 2
                            SatPrimer: data2[0].SatPrimer, // subitems 3
                            JumlahSekunder: data[i].JumlahSekunder, // subitems 4
                            SatSekunder: data2[0].SaldoSekunder, // subitems 5
                            JumlahTritier: data[i].JumlahTritier, // subitems 6
                            SatTritier: data2[0].SatTritier, // subitems 7
                            Persentase: data[i].Persentase, // subitems 8
                            StatusType: data[i].StatusType, // subitems 9
                            IdSubKelompok: data[i].IdSubKelompok, // subitems 10
                        });

                        tableData.push({
                            Type: data[i].Type,
                            JumlahPrimer: data[i].JumlahPrimer,
                            SatPrimer: data2[0].SatPrimer,
                            JumlahSekunder: data[i].JumlahSekunder,
                            SatSekunder: data2[0].SaldoSekunder,
                            JumlahTritier: data[i].JumlahTritier,
                            SatTritier: data2[0].SatTritier,
                            Persentase: data[i].Persentase,
                            StatusType: data[i].StatusType,
                            IdSubKelompok: data[i].IdSubKelompok,
                        });

                        addTable_DataTable("table_konversi", tableData);
                    })
                    .catch((error) => {
                        console.error("Error: ", error);
                    });
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function getDataUkuran(nama_spek) {
    let x = nama_spek.split("-", 5);
    txtUkuran.value = parseFloat(x[0]) / 100;

    let denier = -1;
    switch (x[1].substring(0, 1)) {
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
            if (!isNaN(x[1].substring(0, 1))) {
                denier = x[1] * 10;
            }
            break;
    }

    txtDenier.value = denier;
    txtWarna.value = x[2];
}

function hitungTotalBahan() {
    let qty = 0;

    for (let i = 0; i < listKonversi.length; i++) {
        if (
            listKonversi[i].StatusType == "BB" ||
            listKonversi[i].StatusType == "BP"
        ) {
            qty += listKonversi[i].JumlahTritier;
        }
    }

    return qty;
}

function presentase(qty_tersier, total_bahan) {
    return Math.round((qty_tersier / total_bahan) * 100 * 100) / 100;
}

function createTmpTransaksiInventory(i, id_konv_inv) {
    let uraian = "";
    if (
        listKonversi[i].StatusType == "BB" ||
        listKonversi[i].StatusType == "BP"
    ) {
        uraian = "asal_konversi";
    } else if (
        listKonversi[i].StatusType == "HP" ||
        listKonversi[i].StatusType == "AF"
    ) {
        uraian = "tujuan_konversi";
    }

    fetchStmt(
        "/ExtruderNet/insTmpTransaksi/04/" +
            uraian +
            "/" +
            listKonversi[i].id_type +
            "/tmpUser/" +
            dateInput.value +
            "/" +
            listKonversi[i].JumlahPrimer +
            "/" +
            listKonversi[i].JumlahSekunder +
            "/" +
            listKonversi[i].JumlahTritier +
            "/" +
            listKonversi[i].IdSubKelompok +
            "/" +
            id_konv_inv
    );
}

function insertDetail(id_konv_inv) {
    let totalBahan = hitungTotalBahan();
    let presentaseKu = 0;

    for (let i = 0; i < listKonversi.length - 1; i++) {
        if (
            listKonversi[i].StatusType == "BB" ||
            listKonversi[i].StatusType == "BP" ||
            listKonversi[i].StatusType == "AF"
        ) {
            presentaseKu = presentase(
                listKonversi[i].JumlahTritier,
                totalBahan
            );
        }

        fetchStmt(
            "/ExtruderNet/insDetailKonv/" +
                slcNomor.value +
                "/" +
                listKonversi[i].IdType +
                "/" +
                listKonversi[i].JumlahPrimer +
                "/" +
                listKonversi[i].JumlahSekunder +
                "/" +
                listKonversi[i].JumlahTritier +
                "/" +
                presentaseKu +
                "/" +
                id_konv_inv
        );

        createTmpTransaksiInventory(i, id_konv_inv);
    }
}

function prosesIsi() {
    let idKonvInv = "";

    fetch(
        "/ExtruderNet/insMasterKonv/" +
            dateInput.value +
            "/" +
            txtShift.value +
            "/" +
            timeAwal.value +
            "/" +
            timeAkhir.value +
            "/" +
            slcMesin.value +
            "/" +
            txtUkuran.value +
            "/" +
            txtDenier.value +
            "/" +
            txtWarna.value +
            "/" +
            txtLot.value +
            "/" +
            slcNoOrder.value +
            "/" +
            txtNoUrut.value +
            "/" +
            slcKomposisi.value +
            "/" +
            timeMulai.value +
            "/" +
            timeSelesai.value +
            "/tmpUser"
    )
        .then((response) => response.json())
        .then(() => {
            fetch("/ExtruderNet/getNoKonversiMaster")
                .then((response) => response.json())
                .then((data) => {
                    slcNomor.value = data.NoKonversi;

                    fetch("/ExtruderNet/updListCounter")
                        .then((response) => response.json())
                        .then(() => {
                            fetch("/ExtruderNet/getNoKonversiCounter")
                                .then((response) => response.json())
                                .then((data2) => {
                                    idKonvInv = data2.NoKonversi;
                                    idKonvInv = idKonvInv.padStart(9, "0");
                                    insertDetail(idKonvInv);

                                    toggleButton(1);
                                    disableDetail();

                                    modeProses = "";

                                    alert("Data berhasil tersimpan!");
                                })
                                .catch((error) => {
                                    console.error("Error: ", error);
                                });
                        })
                        .catch((error) => {
                            console.error("Error: ", error);
                        });
                })
                .catch((error) => {
                    console.error("Error: ", error);
                });
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function prosesKoreksi(id_konversi_ext) {
    let idKonvInv = "";

    fetch("/ExtruderNet/getIdKonversiInv/" + id_konversi_ext)
        .then((response) => response.json())
        .then((data) => {
            idKonvInv = data[0].IdKonversi_Inv;

            fetchStmt(
                "/ExtruderNet/delDetailKonversi/" +
                    id_konversi_ext +
                    "/" +
                    idKonvInv
            );

            insertDetail(idKonvInv);

            fetchStmt(
                "/ExtruderNet/updMasterKonversi/" +
                    dateInput.value +
                    "/" +
                    txtShift.value +
                    "/" +
                    timeAwal.value +
                    "/" +
                    timeAkhir.value +
                    "/" +
                    txtUkuran.value +
                    "/" +
                    txtDenier.value +
                    "/" +
                    txtWarna.value +
                    "/" +
                    txtLot.value +
                    "/" +
                    timeMulai.value +
                    "/" +
                    timeAkhir.value +
                    "/" +
                    slcNomor.value
            );

            toggleButton(1);
            disableDetail();
            modeProses = "";

            alert("Data telah berhasil dikoreksi!");
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function prosesHapus(id_konversi_ext) {
    fetchStmt("/ExtruderNet/delKonversi/" + id_konversi_ext);

    toggleButton(1);
    disableDetail();
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi");

    modeProses = "";

    alert("Data telah berhasil dihapus!");
}
//#endregion

function init() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollX: "1000000px",
        columns: [
            { width: "350px" },
            { width: "100px" },
            { width: "100px" },
            { width: "125px" },
            { width: "125px" },
            { width: "100px" },
            { width: "100px" },
            { width: "100px" },
            { width: "100px" },
            { width: "125px" },
        ],
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
        },
    });

    $("#table_komposisi").DataTable({
        responsive: true,
        paging: false,
        scrollX: "1000000px",
        columns: [
            { width: "100px" },
            { width: "250px" },
            { width: "200px" },
            { width: "100px" },
        ],
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel komposisi...",
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

    toggleButton(1);
}

$(document).ready(() => {
    init();
});