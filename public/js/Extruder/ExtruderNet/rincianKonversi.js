//#region Variables
const RK_slcKelut = document.getElementById("select_kelut_rk");
const RK_slcKelompok = document.getElementById("select_kel_rk");
const RK_slcSubkel = document.getElementById("select_subkel_rk");
const RK_slcType = document.getElementById("select_type_rk");

const RK_txtIdKelut = document.getElementById("id_kelut_rk");
const RK_txtNamaKelut = document.getElementById("nama_kelut_rk");
const RK_txtIdKelompok = document.getElementById("id_kel_rk");
const RK_txtNamaKelompok = document.getElementById("nama_kel_rk");
const RK_txtIdSubkel = document.getElementById("id_subkel_rk");
const RK_txtNamaSubkel = document.getElementById("nama_subkel_rk");
const RK_txtIdType = document.getElementById("id_type_rk");
const RK_txtNamaType = document.getElementById("nama_type_rk");

const txtSaldoPrimerAsal = document.getElementById("saldo_primer_asal");
const txtSaldoSekunderAsal = document.getElementById("saldo_sekunder_asal");
const txtSaldoTritierAsal = document.getElementById("saldo_tritier_asal");
const spnSatuanPrimerAsal = document.getElementById("sat_primer_asal");
const spnSatuanSekunderAsal = document.getElementById("sat_sekunder_asal");
const spnSatuanTritierAsal = document.getElementById("sat_tritier_asal");
const txtPrimerAsal = document.getElementById("primer_asal");
const txtSekunderAsal = document.getElementById("sekunder_asal");
const txtTritierAsal = document.getElementById("tritier_asal");

const txtSaldoPrimerTujuan = document.getElementById("saldo_primer_tujuan");
const txtSaldoSekunderTujuan = document.getElementById("saldo_sekunder_tujuan");
const txtSaldoTritierTujuan = document.getElementById("saldo_tritier_tujuan");
const spnSatuanPrimerTujuan = document.getElementById("sat_primer_tujuan");
const spnSatuanSekunderTujuan = document.getElementById("sat_sekunder_tujuan");
const spnSatuanTritierTujuan = document.getElementById("sat_tritier_tujuan");
const txtPrimerTujuan = document.getElementById("primer_tujuan");
const txtSekunderTujuan = document.getElementById("sekunder_tujuan");
const txtTritierTujuan = document.getElementById("tritier_tujuan");

const RK_btnConfirm = document.getElementById("rk_confirm");
const RK_btnCancel = document.getElementById("rk_cancel");

const boxAsalKonversi = document.querySelectorAll("asal_konv .form-control");
const boxTujuanKonversi = document.querySelectorAll(
    "tujuan_konv .form-select, tujuan_konv .form-control"
);

var refetchKelutRK = false;
var reftechKelRK = false;
var refetchSubkelRK = false;
var refetchTypeRK = false;
//#endregion

//#region Events
txtPrimerAsal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") txtSekunderAsal.focus();
});

txtSekunderAsal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") txtTritierAsal.focus();
});

txtTritierAsal.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (txtTritierAsal.value <= 0) {
            alert("Jumlah tritier harus lebih besar dari 0.");
            this.focus();
        } else {
            txtTritierTujuan.value = this.value;

            if (RK_slcKelut.disabled == false) {
                RK_slcKelut.focus();
            } else btnConfirm.focus();
        }
    }
});

txtPrimerTujuan.addEventListener("keypress", function (event) {
    if (event.key == "Enter") txtSekunderTujuan.focus();
});

txtSekunderTujuan.addEventListener("keypress", function (event) {
    if (event.key == "Enter") txtTritierTujuan.focus();
});

txtTritierTujuan.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (txtTritierTujuan.value <= 0) {
            alert("Jumlah tritier harus lebih besar dari 0.");
            this.focus();
        } else btnConfirm.focus();
    }
});

RK_slcKelut.addEventListener("mousedown", function () {
    if (refetchKelutRK) {
        refetchKelutRK = false;
        clearOptions(this, "Kelompok Utama");
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKelompokUtama",
            textKey: "NamaKelompokUtama",
        };

        // SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA
        fetchSelect(
            `/Benang/getKelompokUtama_IdObjek/032/3`,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchKelutRK = true;
            },
            errorOption
        );
    }
});

RK_slcKelut.addEventListener("change", function () {
    if (this.selectedIndex != 0) RK_slcKelompok.focus();
    RK_slcType.selectedIndex = 0;
    RK_slcSubkel.selectedIndex = 0;

    reftechKelRK = true;
});

RK_slcKelompok.addEventListener("mousedown", function () {
    if (reftechKelRK) {
        reftechKelRK = false;
        clearOptions(this, "Kelompok");
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdKelompok",
            textKey: "NamaKelompok",
        };

        // SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK
        fetchSelect(
            `/Benang/getKelompok_IdKelut/${RK_slcKelut.value}`,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else reftechKelRK = true;
            },
            errorOption
        );
    }
});

RK_slcKelompok.addEventListener("change", function () {
    RK_slcType.selectedIndex = 0;
    RK_slcSubkel.selectedIndex = 0;

    if (RK_slcKelut.value == "0731") {
        if (
            RK_txtNamaKelompok.value !=
            RK_slcKelompok.textContent.split(" | ")[1]
        ) {
            RK_slcKelompok.selectedIndex = 0;
            RK_slcKelompok.focus();

            alert(
                "Nama kelompok (nama mesin) antara Asal Konversi dan Tujuan Konversi tidak sama!"
            );
        } else RK_slcSubkel.focus();
    } else {
        RK_slcSubkel.disabled = false;
        RK_slcSubkel.focus();
    }

    refetchSubkelRK = true;
});

RK_slcSubkel.addEventListener("mousedown", function () {
    if (refetchSubkelRK) {
        refetchSubkelRK = false;
        clearOptions(this, "Sub-kelompok");
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdSubKelompok",
            textKey: "NamaSubKelompok",
        };

        // SP_5298_EXT_IDKELOMPOK_SUBKELOMPOK
        fetchSelect(
            `/Benang/getSubKelompok_IdKelompok/${RK_slcKelompok.value}`,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchSubkelRK = true;
            },
            errorOption
        );
    }
});

RK_slcSubkel.addEventListener("change", function () {
    RK_slcType.selectedIndex = 0;
    RK_slcType.focus();

    refetchTypeRK = true;
});

RK_slcType.addEventListener("mousedown", function () {
    if (refetchTypeRK) {
        refetchTypeRK = false;
        clearOptions(this, "Type");
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "IdType",
            textKey: "NamaType",
        };

        // SP_5298_EXT_IDSUBKELOMPOK_TYPE
        fetchSelect(
            `/Benang/getIdSubKelompokType/${RK_slcSubkel.value}`,
            (data) => {
                if (data.length > 0) {
                    addOptions(this, data, optionKeys);
                    this.removeChild(errorOption);
                } else refetchTypeRK = true;
            },
            errorOption
        );
    }
});

RK_slcType.addEventListener("change", function () {
    saldoTypeFetch(this.textContent.split(" | ")[1], false);
    txtPrimerTujuan.focus();
});

RK_btnConfirm.addEventListener("click", function () {
    document
        .getElementById("form_rk_return")
        .dispatchEvent(new Event("change"));
});
//#endregion

//#region Functions
function saldoTypeFetch(id_type, asal) {
    // SP_5298_EXT_SALDO_BARANG
    fetchSelect(`/Benang/getSaldoBarang/${id_type}`, (data) => {
        if (asal) {
            txtSaldoPrimerAsal.value = data[0].SaldoPrimer;
            txtSaldoSekunderAsal.value = data[0].SaldoSekunder;
            txtSaldoTritierAsal.value = data[0].SaldoTritier;
            spnSatuanPrimerAsal.textContent = data[0].SatPrimer;
            spnSatuanSekunderAsal.textContent = data[0].SatSekunder;
            spnSatuanTritierAsal.textContent = data[0].SatTritier;
        } else {
            txtSaldoPrimerTujuan.value = data[0].SaldoPrimer;
            txtSaldoSekunderTujuan.value = data[0].SaldoSekunder;
            txtSaldoTritierTujuan.value = data[0].SaldoTritier;
            spnSatuanPrimerTujuan.textContent = data[0].SatPrimer;
            spnSatuanSekunderTujuan.textContent = data[0].SatSekunder;
            spnSatuanTritierTujuan.textContent = data[0].SatTritier;
        }
    });
}

function RK_clearAll() {
    boxAsalKonversi.forEach((txt) => (txt.value = ""));
    boxTujuanKonversi.forEach((ele) => {
        if (ele.tagName == "SELECT") {
            ele.selectedIndex = 0;
        } else ele.value = "";
    });
}
//#endregion

function init_rk() {
    txtPrimerAsal.focus();
    // saldoTypeFetch(RK_txtIdType.value, true);
}

$("#form_rincian_konversi").on("shown.bs.modal", function () {
    init_rk();
});
