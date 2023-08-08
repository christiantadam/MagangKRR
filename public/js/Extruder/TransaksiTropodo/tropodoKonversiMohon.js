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
const btnBaru = document.getElementById("btn_konversi_baru");
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
const slcNoOrder = document.getElementById("select_nomor_order");
const slcSpek = document.getElementById("select_spek");
const slcMesin = document.getElementById("select_mesin");
const slcKomposisi = document.getElementById("select_komposisi");

const listOfInput = document.querySelectorAll(".card .form-control");
const listOfMasterInput = document.querySelectorAll(".master .form-control");
const listOfSelect = document.querySelectorAll(".form-select");

const listKomposisi = [];
const listKonversi = [];

var modeProses = "";

const tableKomposisiWidth = 4;
const tableKomposisiCol = [
    { width: "auto" },
    { width: "300px" },
    { width: "auto" },
    { width: "auto" },
];

const tableKonversiWidth = 10;
const tabelKonversiCol = [
    { width: "300px" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
    { width: "auto" },
];
//#endregion

//#region Events
btnBaru.addEventListener("click", () => {
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);

    modeProses = "baru";
    toggleButton(2);

    slcNoOrder.disabled = false;
    slcNoOrder.focus();
});

btnKoreksiMaster.addEventListener("click", () => {
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", tableKomposisiWidth);

    modeProses = "koreksi";
    toggleButton(2);

    slcNoOrder.selectedIndex = 0;
    slcNoOrder.disabled = false;
    slcNoOrder.focus();
});

btnHapusMaster.addEventListener("click", () => {
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", tableKomposisiWidth);

    slcNomor.disabled = false;
    slcNomor.focus();

    modeProses = "hapus";
    toggleButton(2);
});

btnKeluar.addEventListener("click", () => {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButton(1);
        clearDataMaster();
        clearDataDetail();
        disableDetail();

        modeProses = "";

        listKomposisi.length = 0;
        clearTable_DataTable("table_komposisi", tableKomposisiWidth);
    }
});

slcNomor.addEventListener("change", () => {
    listOfInput.forEach((input) => {
        input.value = "";
        input.disabled = false;
    });

    getDataKonversi(slcNomor.value);

    if (modeProses == "koreksi") {
        document.getElementById("table_konversi").scrollIntoView();

        txtPrimer.disabled = false;
        txtSekunder.disabled = false;
        txtTersier.disabled = false;
        btnTambah.disabled = false;
        btnKoreksiDetail.disabled = false;
        btnHapusDetail.disabled = false;

        txtLot.disabled = false;
        txtUkuran.disabled = false;
        txtDenier.disabled = false;
        txtWarna.disabled = false;
        txtShift.disabled = false;

        getDataKomposisi(slcNomor.value);
    } else if (modeProses == "hapus") {
        btnProses.focus();
    }
});

slcNoOrder.addEventListener("change", () => {
    listOfInput.forEach((input) => {
        input.value = "";
    });

    slcSpek.selectedIndex = 0;

    if (modeProses == "baru") {
        slcSpek.disabled = false;
        slcSpek.focus();
    } else {
        slcNoOrder.focus();
    }
});

slcSpek.addEventListener("click", () => {
    if (this.options.length <= 3) {
        const loadingOption = this.querySelector('[value="loading"]');
        loadingOption.style.display = "block";

        fetch("/Konversi/getListSpek/" + slcNoOrder.value)
            .then((response) => response.json())
            .then((data) => {
                addOptions("select_spek", data, {
                    valueKey: "TypeBenang",
                    textKey: "NoUrutOrder",
                });
                loadingOption.style.display = "none";
            })
            .catch((error) => {
                console.error("Error: ", error);
                loadingOption.style.display = "none";
            });
    }
});

slcSpek.addEventListener("change", () => {
    listOfInput.forEach((input) => {
        input.value = "";
    });

    getDataUkuran(this.value);

    if (modeProses == "baru") {
        slcMesin.disabled = false;
        slcMesin.focus();
    } else {
        this.focus();
    }
});

slcMesin.addEventListener("change", () => {
    slcKomposisi.selectedIndex = 0;

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", tableKomposisiWidth);

    if (modeProses == "baru") {
        listOfInput.forEach((input) => {
            input.value = "";
            input.disabled = false;
        });

        slcKomposisi.disabled = false;
        slcKomposisi.focus();
    }
});

slcKomposisi.addEventListener("click", () => {
    if (this.options.length <= 3) {
        const loadingOption = this.querySelector('[value="loading"]');
        loadingOption.style.display = "block";

        fetch("/Konversi/getListKomposisi/1/" + slcMesin.value)
            .then((response) => response.json())
            .then((data) => {
                addOptions("select_komposisi", data, {
                    valueKey: "IdKomposisi",
                    textKey: "NamaKomposisi",
                });
                loadingOption.style.display = "none";
            })
            .catch((error) => {
                console.error("Error: ", error);
                loadingOption.style.display = "none";
            });
    }
});

slcKomposisi.addEventListener("change", () => {
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", tableKomposisiWidth);

    listOfInput.forEach((input) => {
        input.value = "";
    });

    if (modeProses == "baru") {
        getDataKomposisi(this.value);
        txtLot.disabled = false;
        txtLot.value = "";
        txtLot.focus();

        listOfInput.forEach((input) => {
            input.disabled = false;
        });
    }
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
            btnBaru.disabled = false;
            btnKoreksiMaster.disabled = false;
            btnHapusMaster.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;
        case 2:
            btnBaru.disabled = true;
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

    fetch("/Konversi/getListKomposisiBahan/" + no_komposisi)
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

            addTable_DataTable("table_komposisi", tableData, tableKomposisiCol);
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function getSaldo(id_type) {
    fetch("/Konversi/getSaldoBarang/" + id_type)
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
    clearTable_DataTable(
        "table_konversi",
        tableKonversiWidth,
        "Memuat data..."
    );

    fetch("/Konversi/getDataKonversi/" + id_konversi)
        .then((response) => response.json())
        .then((data) => {
            dateInput.value = dateTimeToDate(data[0].Tanggal);
            txtShift.value = data[0].Shift;
            timeAwal.value = dateTimetoTime(data[0].AwalShift);
            timeAkhir.value = dateTimetoTime(data[0].AkhirShift);
            txtUkuran.value = data[0].Ukuran;
            txtDenier.value = data[0].Denier;
            timeMulai.value = dateTimetoTime(data[0].JamMulai);
            timeSelesai.value = dateTimetoTime(data[0].JamSelesai);
            txtWarna.value = data[0].Warna;
            txtLot.value = data[0].LotNumber;
            txtNoUrut.value = data[0].NoUrutOrderEXT;

            addOptionIfNotExists(
                slcMesin,
                data[0].IdMesin,
                data[0].IdMesin + " | " + data[0].TypeMesin
            );
            addOptionIfNotExists(
                slcNoOrder,
                data[0].IdOrder,
                data[0].IdOrder + " | " + data[0].Identifikasi
            );
            addOptionIfNotExists(
                slcKomposisi,
                data[0].IdKomposisi,
                data[0].IdKomposisi + " | " + data[0].NamaKomposisi
            );
            addOptionIfNotExists(
                slcSpek,
                data[0].TypeBenang,
                data[0].TypeBenang
            );
        })
        .catch((error) => {
            console.error("Error: ", error);
        });

    let notFound = false; // *untuk pengecekkan pada fetch "getSatuan()"
    fetch("/Konversi/getDetailKonversi/" + id_konversi)
        .then((response) => response.json())
        .then((data) => {
            const listOfYakusoku = [];
            listKonversi.length = 0;

            for (let i = 0; i < data.length; i++) {
                const yakusoku = fetch("/Konversi/getSatuan/" + data[i].IdType)
                    .then((response) => response.json())
                    .then((data2) => {
                        if (data2.length != 0) {
                            const newItem = {
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
                            };

                            return newItem;
                        } else {
                            notFound = true;
                        }
                    })
                    .catch((error) => {
                        console.error("Error: ", error);
                    });

                listOfYakusoku.push(yakusoku);
            }

            return Promise.all(listOfYakusoku);
        })
        .then((resolvedData) => {
            if (notFound || resolvedData.length == 0) {
                clearTable_DataTable(
                    "table_konversi",
                    tableKonversiWidth,
                    "Data untuk <b>Konversi " +
                        slcNomor.value +
                        "</b> tidak ditemukan."
                );
            } else {
                const tableData = resolvedData.map((item) => {
                    const newItem = Object.fromEntries(
                        Object.entries(item).map(([key, value]) => [
                            key,
                            value === undefined ? "NULL" : value,
                        ])
                    );
                    const { ["IdType"]: _, ...finalItem } = newItem;

                    return finalItem;
                });
                console.log(tableData);
                addTable_DataTable(
                    "table_konversi",
                    tableData,
                    tabelKonversiCol
                );
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
        "/Konversi/insTmpTransaksi/04/" +
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
            "/Konversi/insDetailKonv/" +
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
        "/Konversi/insMasterKonv/" +
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
            fetch("/Konversi/getNoKonversiMaster")
                .then((response) => response.json())
                .then((data) => {
                    slcNomor.value = data.NoKonversi;

                    fetch("/Konversi/updListCounter")
                        .then((response) => response.json())
                        .then(() => {
                            fetch("/Konversi/getNoKonversiCounter")
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

    fetch("/Konversi/getIdKonversiInv/" + id_konversi_ext)
        .then((response) => response.json())
        .then((data) => {
            idKonvInv = data[0].IdKonversi_Inv;

            fetchStmt(
                "/Konversi/delDetailKonversi/" +
                    id_konversi_ext +
                    "/" +
                    idKonvInv
            );

            insertDetail(idKonvInv);

            fetchStmt(
                "/Konversi/updMasterKonversi/" +
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
    fetchStmt("/Konversi/delKonversi/" + id_konversi_ext);

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
        columns: tabelKonversiCol,
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
        columns: tableKomposisiCol,
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
    btnBaru.focus();
}

$(document).ready(() => {
    init();
});
