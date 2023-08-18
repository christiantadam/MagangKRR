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
const txtIdProduksi = document.getElementById("id_produksi");
const txtNamaProduksi = document.getElementById("nama_produksi");
const txtStokPrimer = document.getElementById("stok_primer");
const txtStokSekunder = document.getElementById("stok_sekunder");
const txtStokTersier = document.getElementById("stok_tritier");
const txtPrimer = document.getElementById("primer");
const txtSekunder = document.getElementById("sekunder");
const txtTersier = document.getElementById("tritier");
const txtJenis = document.getElementById("jenis");
const txtNoUrut = document.getElementById("no_urut");

const txtHidden = document.getElementById("input_hidden");

const slcNomor = document.getElementById("select_nomor");
const slcNoOrder = document.getElementById("select_nomor_order");
const slcSpek = document.getElementById("select_spek");
const slcMesin = document.getElementById("select_mesin");
const slcKomposisi = document.getElementById("select_komposisi");

const spnPrimer = document.getElementById("sat_primer");
const spnSekunder = document.getElementById("sat_sekunder");
const spnTersier = document.getElementById("sat_tritier");

const listOfInput = document.querySelectorAll(".card .form-control");
const listOfMasterInput = document.querySelectorAll(
    ".master .form-control:not(.input_waktu)"
);
const listOfDateTime = document.querySelectorAll(".master .input_waktu");
const listOfSelect = document.querySelectorAll(".form-select");

const listKomposisi = [];
const listKonversi = [];

var modeProses = "";
var komposisiPil = -1;
var konversiPil = -1;

const tableKomposisiWidth = 4;
const tableKomposisiCol = [
    { width: "100px" },
    { width: "300px" },
    { width: "125px" },
    { width: "100px" },
];

const tableKonversiWidth = 10;
const tableKonversiCol = [
    { width: "300px" },
    { width: "100px" },
    { width: "100px" },
    { width: "125px" },
    { width: "125px" },
    { width: "100px" },
    { width: "100px" },
    { width: "100px" },
    { width: "100px" },
    { width: "125px" },
];
//#endregion

//#region Events
btnBaru.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);

    modeProses = "baru";
    toggleButton(2);

    slcNoOrder.disabled = false;
    slcNoOrder.focus();
});

btnKoreksiMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        tableKomposisiWidth,
        "padding=100px"
    );

    modeProses = "koreksi";
    toggleButton(2);

    slcNomor.selectedIndex = 0;
    slcNomor.disabled = false;
    slcNomor.focus();
});

btnHapusMaster.addEventListener("click", function () {
    clearDataMaster();
    clearDataDetail();

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        tableKomposisiWidth,
        "padding=100px"
    );

    slcNomor.disabled = false;
    slcNomor.focus();

    modeProses = "hapus";
    toggleButton(2);
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButton(1);
        clearDataMaster();
        clearDataDetail();
        disableDetail();

        modeProses = "";

        listKomposisi.length = 0;
        clearTable_DataTable(
            "table_komposisi",
            tableKomposisiWidth,
            "padding=100px"
        );
    }
});

btnTambah.addEventListener("click", function () {
    listOfInput.forEach((input) => {
        if (input.value == "") {
            alert("Ada data yang belum terisi. \nMohon periksa kembali.");
        }
    });

    let found = false;
    listKonversi.forEach((data) => {
        if (data.IdType == txtIdProduksi.value) {
            found = true;
        }
    });

    if (found) {
        alert("Sudah ada item yang sama dalam tabel konversi.");
    } else {
        let i = listKonversi.length;
        listKonversi[i].NamaType = txtNamaProduksi.value;
        listKonversi[i].IdType = txtIdProduksi.value;
        listKonversi[i].QtyPrimer = txtPrimer.value;
        listKonversi[i].SatPrimer = spnPrimer.textContent;
        listKonversi[i].QtySekunder = txtSekunder.value;
        listKonversi[i].SatSekunder = spnSekunder.textContent;
        listKonversi[i].QtyTersier = txtTersier.value;
        listKonversi[i].SatTersier = spnTersier.textContent;
        listKonversi[i].Presentase = "0";
        listKonversi[i].Jenis = listKomposisi[komposisiPil].StatusType;
        listKonversi[i].SubKelompok = listKomposisi[komposisiPil].IdSubKelompok;

        addTable_DataTable(
            "table_konversi",
            listKonversi.map((item) => {
                return {
                    StatusType: item.StatusType,
                    NamaType: item.NamaType,
                    NamaSubKelompok: item.NamaSubKelompok,
                    IdSubKelompok: item.IdSubKelompok,
                };
            }),
            tableKonversiCol,
            rowClickedKonversi
        );

        showModal(
            "Tambah Item",
            "Ingin input item konversi lagi?",
            () => {
                clearDataDetail();
                slcKomposisi.focus();
            },
            () => {
                btnProses.focus();
            }
        );
    }
});

btnKoreksiDetail.addEventListener("click", function () {
    if (konversiPil == -1) {
        alert("Pilih data yang akan dikoreksi terlebih dahulu.");
    } else {
        showModal(
            "Konfirmasi",
            `Apakah anda yakin akan mengoreksi jumlah item untuk data konversi <b>${listKonversi[konversiPil].Type}</b>?`,
            () => {
                listKonversi[konversiPil].JumlahPrimer = txtPrimer.value;
                listKonversi[konversiPil].JumlahSekunder = txtSekunder.value;
                listKonversi[konversiPil].JumlahTritier = txtTersier.value;

                addTable_DataTable(
                    "table_konversi",
                    listKonversi.map((item) => {
                        return {
                            StatusType: item.StatusType,
                            NamaType: item.NamaType,
                            NamaSubKelompok: item.NamaSubKelompok,
                            IdSubKelompok: item.IdSubKelompok,
                        };
                    }),
                    tableKonversiCol,
                    rowClickedKonversi
                );
            },
            () => {}
        );
    }
});

btnHapusDetail.addEventListener("click", function () {
    if (konversiPil == -1) {
        alert("Pilih data yang akan dihapus terlebih dahulu.");
    } else {
        if (listKonversi.length > 1) {
            showModal(
                "Konfirmasi",
                `Apakah anda yakin akan menghapus data konversi <b>${listKonversi[konversiPil].Type}</b>?`,
                () => {
                    listKonversi.splice(konversiPil);
                    clearDataDetail();

                    addTable_DataTable(
                        "table_konversi",
                        listKonversi.map((item) => {
                            return {
                                StatusType: item.StatusType,
                                NamaType: item.NamaType,
                                NamaSubKelompok: item.NamaSubKelompok,
                                IdSubKelompok: item.IdSubKelompok,
                            };
                        }),
                        tableKonversiCol,
                        rowClickedKonversi
                    );
                },
                () => {}
            );
        } else {
            alert(
                "Data hanya tersisa <b>SATU</b>, sehingga tidak dapat dihapus."
            );
        }
    }
});

btnProses.addEventListener("click", function () {
    if (modeProses == "baru") {
        if (listKomposisi.length < 1) {
            alert(
                "Data tidak dapat diproses karena tidak ditemukan data komposisi."
            );
        } else {
            prosesIsi();
        }
    } else if (modeProses == "koreksi") {
        if (slcNomor.selectedIndex == 0) {
            alert("Pilih data yang akan dikoreksi terlebih dahulu.");
        } else {
            showModal(
                "Konfirmasi",
                "Apakah anda yakin akan mengoreksi data ini?",
                () => {
                    prosesKoreksi(slcNomor.value);
                },
                () => {}
            );
        }
    } else if (modeProses == "hapus") {
        if (slcNomor.selectedIndex == 0) {
            alert("Pilih data yang akan dihapus terlebih dahulu.");
        } else {
            showModal(
                "Konfirmasi",
                "Apakah anda yakin akan menghapus data ini?",
                () => {
                    prosesHapus(slcNomor.value);
                },
                () => {}
            );
        }
    }
});

slcNomor.addEventListener("change", function () {
    listOfInput.forEach((input) => {
        input.value = "";
        input.disabled = false;
    });

    getDataKonversi(this.value);

    // *fungsi dilanjutkan pada txtHidden event "change"
    // **if "GET DATA KONVERSI BERHASIL!"
});

txtHidden.addEventListener("change", function (event) {
    if (this.value == "GET DATA KONVERSI BERHASIL!") {
        if (modeProses == "koreksi") {
            $("html, body").animate(
                {
                    scrollTop: $("#table_konversi").offset().top - 125,
                },
                100
            );

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

            getDataKomposisi(slcKomposisi.value);
        } else if (modeProses == "hapus") {
            btnProses.focus();
        }
    }
});

slcNoOrder.addEventListener("change", function () {
    listOfInput.forEach((input) => {
        input.value = "";
    });

    slcSpek.selectedIndex = 0;

    if (modeProses == "baru") {
        slcSpek.disabled = false;
        slcSpek.focus();
    } else {
        this.focus();
    }
});

slcSpek.addEventListener("click", function () {
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

slcSpek.addEventListener("change", function () {
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

slcMesin.addEventListener("change", function () {
    slcKomposisi.selectedIndex = 0;

    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", tableKonversiWidth);
    listKomposisi.length = 0;
    clearTable_DataTable(
        "table_komposisi",
        tableKomposisiWidth,
        "padding=100px"
    );

    if (modeProses == "baru") {
        listOfInput.forEach((input) => {
            input.value = "";
            input.disabled = false;
        });

        slcKomposisi.disabled = false;
        slcKomposisi.focus();
    }
});

slcKomposisi.addEventListener("click", function () {
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

slcKomposisi.addEventListener("change", function () {
    if (listKonversi.length > 0) {
        alert(
            "Komposisi tidak dapat diubah karena telah terdapat item konversi yang ada."
        );
    } else {
        listKonversi.length = 0;
        clearTable_DataTable("table_konversi", tableKonversiWidth);
        listKomposisi.length = 0;
        clearTable_DataTable(
            "table_komposisi",
            tableKomposisiWidth,
            "padding=100px"
        );

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
    }
});

txtLot.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtUkuran.disabled = false;
        txtUkuran.focus();
    }
});

txtUkuran.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtDenier.disabled = false;
        txtDenier.focus();
    }
});

txtDenier.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtWarna.disabled = false;
        txtWarna.focus();
    }
});

txtWarna.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtShift.disabled = false;
        txtShift.focus();
    }
});

txtShift.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        this.value = this.value.toUpperCase();
        timeAwal.focus();
    }
});

timeAwal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeAkhir.focus();
    }
});

timeAkhir.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeMulai.focus();
    }
});

timeMulai.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        timeSelesai.focus();
    }
});

timeSelesai.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        $("html, body").animate(
            {
                scrollTop: $("#table_komposisi").offset().top - 125,
            },
            100
        );
    }
});

txtPrimer.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtSekunder.disabled = false;
        txtSekunder.value = "";
        txtSekunder.focus();
    }
});

txtSekunder.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtTersier.disabled = false;
        txtTersier.value = "";
        txtTersier.focus();
    }
});

txtTersier.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (txtJenis.value == "BB" || txtJenis.value == "BP") {
            txtSekunder.value = Math.round(parseFloat(txtTersier.value) / 25);
        }

        if (modeProses == "baru") {
            btnTambah.disabled = false;
            btnKoreksiDetail.disabled = false;
            btnHapusDetail.disabled = false;
            btnTambah.focus();
        } else if (modeProses == "koreksi") {
            btnTambah.disabled = false;
            btnTambah.focus();
        }
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

    listOfDateTime.forEach((input) => {
        input.classList.add("unclickable");
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
                    IdType: data[i].IdType, // subitems 1
                    NamaType: data[i].NamaType, // subitems 2
                    NamaSubKelompok: data[i].NamaSubKelompok, // subitems 3
                    SatuanPrimer: data[i].SatuanPrimer, // subitems 4
                    SatuanSekunder: data[i].SatuanSekunder, // subitems 5
                    SatuanTritier: data[i].SatuanTritier, // subitems 6
                    IdSubKelompok: data[i].IdSubKelompok, // subitems 7
                });

                tableData.push({
                    StatusType: data[i].StatusType,
                    NamaType: data[i].NamaType,
                    NamaSubKelompok: data[i].NamaSubKelompok,
                    IdSubKelompok: data[i].IdSubKelompok,
                });
            }

            addTable_DataTable(
                "table_komposisi",
                listKomposisi.map((item) => {
                    return {
                        StatusType: item.StatusType,
                        NamaType: item.NamaType,
                        NamaSubKelompok: item.NamaSubKelompok,
                        IdSubKelompok: item.IdSubKelompok,
                    };
                }),
                tableKomposisiCol,
                rowClickedKomposisi
            );
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function getSaldoExt(id_type) {
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

function getSaldoInv(s_id_type) {
    document.body.style.cursor = "wait";

    fetch("/Konversi/getSaldoInv/" + s_id_type)
        .then((response) => response.json())
        .then((data) => {
            txtStokPrimer.value = data[0].SaldoPrimer;
            txtStokSekunder.value = data[0].SaldoSekunder;
            txtStokTersier.value = data[0].SaldoTritier;

            document.body.style.cursor = "default";
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
                            // TABLE KONVERSI
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
                for (let i = 0; i < resolvedData.length; i++) {
                    listKonversi.push(resolvedData[i]);
                }

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
                // console.log(tableData);
                addTable_DataTable(
                    "table_konversi",
                    tableData,
                    tableKonversiCol,
                    rowClickedKonversi
                );
            }

            txtHidden.value = "GET DATA KONVERSI BERHASIL!";
            txtHidden.dispatchEvent(new Event("change"));
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
        .then(function () {
            fetch("/Konversi/getNoKonversiMaster")
                .then((response) => response.json())
                .then((data) => {
                    slcNomor.value = data.NoKonversi;

                    fetch("/Konversi/updListCounter")
                        .then((response) => response.json())
                        .then(function () {
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

function rowClickedKonversi(row, data, index) {
    if (konversiPil == index) {
        row.style.background = "white";
        konversiPil = -1;

        clearDataDetail();
    } else {
        row.style.background = "aliceblue";
        konversiPil = index;

        console.log(listKonversi);
        console.log(index);
        console.log(listKonversi[index]);

        txtIdProduksi.value = listKonversi[index].IdType;
        txtNamaProduksi.value = data.Type;
        txtPrimer.value = data.JumlahPrimer;
        spnPrimer.textContent = data.SatPrimer;
        txtSekunder.value = data.JumlahSekunder;
        spnSekunder.textContent = data.SatSekunder;
        txtTersier.value = data.JumlahTritier;
        spnTersier.textContent = data.SatTritier;

        getSaldoInv(listKonversi[index].IdType);
    }
}

function rowClickedKomposisi(row, data, index) {
    if (komposisiPil == index) {
        row.style.background = "white";
        komposisiPil = -1;

        clearDataDetail();
    } else {
        row.style.background = "aliceblue";
        komposisiPil = index;

        txtIdProduksi.value = listKomposisi[index].IdType;
        txtNamaProduksi.value = data.NamaType;
        spnPrimer.textContent = listKomposisi[index].SatuanPrimer;
        spnSekunder.textContent = listKomposisi[index].SatuanSekunder;
        spnTersier.textContent = listKomposisi[index].SaldoTritier;
        txtJenis.value = data.StatusType;

        getSaldoExt(listKomposisi[index].IdType);

        txtPrimer.disabled = false;
        txtPrimer.focus();

        if (data.StatusType == "BB" || data.StatusType == "BP") {
            if (txtStokTersier.value <= 0) {
                alert(
                    txtNamaProduksi.value +
                        " tidak dapat digunakan untuk transaksi karena stok telah habis."
                );

                clearDataDetail();

                listKomposisi.length = 0;
                clearTable_DataTable(
                    "table_komposisi",
                    tableKomposisiWidth,
                    "padding=100px"
                );

                $("html, body").animate(
                    {
                        scrollTop: $("table_komposisi").offset().top - 125,
                    },
                    100
                );
            } else {
                komposisiPil = index;
            }
        }
    }
}
//#endregion

function init() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableKonversiCol,
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
        columns: tableKomposisiCol,
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

    toggleButton(1);
    btnBaru.focus();
}

$(document).ready(function () {
    init();
});
