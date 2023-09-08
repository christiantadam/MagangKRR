//#region Variables
const slcKomposisi = document.getElementById("select_id_komposisi");
const slcMesin = document.getElementById("select_mesin");
const slcObjek = document.getElementById("select_objek");
const slcKelut = document.getElementById("select_kelompok_utama");
const slcKelompok = document.getElementById("select_kelompok");
const slcSubkel = document.getElementById("select_sub_kelompok");
const slcType = document.getElementById("select_type");

const numPrimer = document.getElementById("primer");
const numSekunder = document.getElementById("sekunder");
const numTritier = document.getElementById("tritier");
const numPersentase = document.getElementById("persentase");

const txtNamaKomposisi = document.getElementById("nama_komposisi");
const txtSatPrimer = document.getElementById("sat_primer");
const txtSatSekunder = document.getElementById("sat_sekunder");
const txtSatTritier = document.getElementById("sat_tritier");

const btnTambahDetail = document.getElementById("btn_tambah_detail");
const btnKoreksiDetail = document.getElementById("btn_koreksi_detail");
const btnHapusDetail = document.getElementById("btn_hapus_detail");
const btnBaruMaster = document.getElementById("btn_baru_master");
const btnKoreksiMaster = document.getElementById("btn_koreksi_master");
const btnHapusMaster = document.getElementById("btn_hapus_master");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listOfDetail = document.querySelectorAll(".card input, .card select");
const listOfButtonDetail = document.querySelectorAll(".card button");

const listKomposisi = [];
/* ISI LIST KOMPOSISI
    0 StatusType
    1 IdType
    2 NamaType
    3 JumlahPrimer
    4 SatuanPrimer
    5 SatuanSekunder
    6 SatuanTritier
    7 Persentase
    8 IdObjek
    9 NamaObjek
    10 IdKelompokUtama
    11 NamaKelompokUtama
    12 IdKelompok
    13 NamaKelompok
    14 IdSubKelompok
    15 NamaSubKelompok
*/

const posKomposisi = $("#table_komposisi").offset().top - 125;
const colKomposisi = [
    { width: "1px" }, // Jenis
    { width: "100px" }, // Id Type
    { width: "250px" }, // Nama Type
    { width: "100px" }, // Qty. Primer
    { width: "100px" }, // Sat. Primer
    { width: "110px" }, // Qty. Sekunder
    { width: "110px" }, // Sat. Sekunder
    { width: "100px" }, // Qty. Tritier
    { width: "100px" }, // Sat. Tritier
    { width: "1x" }, // Persentase
    { width: "80px" }, // Id Objek
    { width: "100px" }, // Nama Objek
    { width: "80px" }, // Id KelUt.
    { width: "100px" }, // Nama KelUt.
    { width: "100px" }, // Id Kelompok
    { width: "100px" }, // Kelompok
    { width: "80px" }, // Id SubKel.
    { width: "100px" }, // SubKel.
];

var modeProses = "";
var [unitPrimer, unitSekunder, unitTritier] = ["", "", "", ""];
var refetchKelut = false;
//#endregion

//#region Events
document.getElementById("tes123").addEventListener("click", function () {
    slcKomposisi.classList.add("hidden");
    txtNamaKomposisi.classList.remove("hidden");
});

slcKomposisi.addEventListener("change", function () {
    // SP_5298_EXT_LIST_KOMPOSISI_1
    fetchSelect("/Master/getListKomposisi/EXT/" + this.value, (data) => {
        addOptionIfNotExists(slcMesin, data[0].IdMesin);

        getDataKomposisiFetch(this.value, () => {
            listOfDetail.forEach((ele) => (ele.disabled = false));
            listOfButtonDetail.forEach((btn) => (btn.disabled = false));

            if (modeProses == "baru") {
                slcMesin.disabled = false;
                slcMesin.focus();
            } else if (modeProses == "koreksi") {
                slcObjek.disabled = false;
                slcObjek.focus();
            } else if (modeProses == "hapus") {
                btnProses.focus();
            } else if (modeProses == "hapus_detail") {
                btnHapusDetail.disabled = false;
                $("html, body").animate({ scrollTop: posKomposisi }, 100);
            }
        });
    });
});

slcMesin.addEventListener("change", function () {
    if (modeProses == "baru") {
        listKomposisi.length = 0;
        clearTable_DataTable("table_komposisi", colKomposisi.length);
        listOfDetail.forEach((ele) => {
            if (ele.tagName == "INPUT") ele.value = "";
        });

        listOfDetail.forEach((ele) => (ele.disabled = false));
        listOfButtonDetail.forEach((ele) => (ele.disabled = false));
        slcObjek.focus();
    }
});

slcObjek.addEventListener("change", function () {
    slcKelut.selectedIndex = 0;
    slcKelut.disabled = false;
    slcKelut.focus();
    slcKelompok.selectedIndex = 0;
    slcType.selectedIndex = 0;
    slcSubkel.selectedIndex = 0;
});

slcKelut.addEventListener("mousedown", function () {
    if (this.querySelectorAll("option").length <= 1 || refetchKelut) {
        refetchKelut = false;
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKelompokUtama",
            textKey: "NamaKelompokUtama",
        };

        // SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA
        fetchSelect(
            "/Master/getIdObjekKelompokUtama/" + slcObjek.value,
            (data) => {
                addOptions(this, data, optionKeys);
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKelut.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (this.querySelectorAll("option").length <= 1 || refetchKelut) {
            refetchKelut = false;
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "IdKelompokUtama",
                textKey: "NamaKelompokUtama",
            };

            // SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA
            fetchSelect(
                "/Master/getIdObjekKelompokUtama/" + slcObjek.value,
                (data) => {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                },
                errorOption
            );
        }
    }
});

slcKelut.addEventListener("change", function () {
    if (condition) {
    }
});
//#endregion

//#region Functions
function clearDataDetail() {
    listOfDetail.forEach((ele) => {
        if (ele.tagName == "INPUT") {
            ele.value = "";
        } else ele.selectedIndex = 0;
    });
}

function clearDataMaster() {
    slcKomposisi.selectedIndex = 0;
    slcMesin.selectedIndex = 0;
}

function disableDetail() {
    listOfButtonDetail.forEach((btn) => (btn.disabled = true));
    numPrimer.disabled = true;
    numSekunder.disabled = true;
    numTritier.disabled = true;
}

function toggleButtons(tmb) {
    switch (tmb) {
        case 1:
            slcKomposisi.disabled = true;
            btnBaruMaster.disabled = false;
            btnKoreksiMaster.disabled = false;
            btnHapusMaster.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;
        case 2:
            btnBaruMaster.disabled = true;
            btnKoreksiMaster.disabled = true;
            btnHapusMaster.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";
            break;

        default:
            break;
    }
}

function getDataKomposisiFetch(no_komposisi, post_action = null) {
    listKomposisi.length = 0;
    clearTable_DataTable("table_komposisi", colKomposisi.length, [
        "padding=250px",
        "Memuat data...",
    ]);

    // SP_5298_EXT_LIST_KOMPOSISI_BAHAN
    fetchSelect(
        "/Master/getListKomposisiBahan/" + no_komposisi.trim(),
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listKomposisi.push({
                    StatusType: data[i].StatusType,
                    IdType: data[i].IdType,
                    NamaType: data[i].NamaType,
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
                    Persentase: data[i].Persentase,
                    IdObjek: data[i].IdObjek,
                    NamaObjek: data[i].NamaObjek,
                    IdKelompokUtama: data[i].IdKelompokUtama,
                    NamaKelompokUtama: data[i].NamaKelompokUtama,
                    IdKelompok: data[i].IdKelompok,
                    NamaKelompok: data[i].NamaKelompok,
                    IdSubKelompok: data[i].IdSubKelompok,
                    NamaSubKelompok: data[i].NamaSubKelompok,
                });
            }

            if (post_action != null) post_action();
        }
    );
}

function getSatuanFetch(id_type) {
    // SP_5298_EXT_DETAIL_BAHAN
    fetchSelect("/Master/getDetailBahan/" + id_type, (data) => {
        unitPrimer = data[0].UnitPrimer;
        unitSekunder = data[0].UnitSekunder;
        unitTritier = data[0].UnitTritier;
        txtSatPrimer.value = data[0].NamaSatPrimer;
        txtSatSekunder.value = data[0].NamaSatSekunder;
        txtSatTritier.value = data[0].NamaSatTritier;
    });
}
//#endregion

function init() {
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

    clearTable_DataTable(
        "table_komposisi",
        colKomposisi.length,
        "padding=250px"
    );
    // toggleButtons(1);
}

$(document).ready(() => init());
