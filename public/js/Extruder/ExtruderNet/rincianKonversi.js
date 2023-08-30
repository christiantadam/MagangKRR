//#region Variables
const slcKelompokUtamaRK = document.getElementById("select_kelut_rk");
const slcKelompokRK = document.getElementById("select_kel_rk");
const slcSubKelompokRK = document.getElementById("select_subkel_rk");
const slcTypeRK = document.getElementById("select_type_rk");

const txtIdKelompokUtama = document.getElementById("id_kelut_rk");
const txtNamaKelompokUtama = document.getElementById("nama_kelut_rk");
const txtIdKelompok = document.getElementById("id_kel_rk");
const txtNamaKelompok = document.getElementById("nama_kel_rk");
const txtIdSubKelompok = document.getElementById("id_subkel_rk");
const txtNamaSubKelompok = document.getElementById("nama_subkel_rk");
const txtIdType = document.getElementById("id_type_rk");
const txtNamaType = document.getElementById("nama_type_rk");

const txtSaldoPrimerAsal = document.getElementById("saldo_primer_asal");
const txtSaldoSekunderAsal = document.getElementById("saldo_sekunder_asal");
const txtSaldoTersierAsal = document.getElementById("saldo_tritier_asal");
const spnSatuanPrimerAsal = document.getElementById("sat_primer_asal");
const spnSatuanSekunderAsal = document.getElementById("sat_sekunder_asal");
const spnSatuanTersierAsal = document.getElementById("sat_tritier_asal");
const txtPrimerAsal = document.getElementById("primer_asal");
const txtSekunderAsal = document.getElementById("sekunder_asal");
const txtTersierAsal = document.getElementById("tritier_asal");

const txtSaldoPrimerTujuan = document.getElementById("saldo_primer_tujuan");
const txtSaldoSekunderTujuan = document.getElementById("saldo_sekunder_tujuan");
const txtSaldoTersierTujuan = document.getElementById("saldo_tritier_tujuan");
const spnSatuanPrimerTujuan = document.getElementById("sat_primer_tujuan");
const spnSatuanSekunderTujuan = document.getElementById("sat_sekunder_tujuan");
const spnSatuanTersierTujuan = document.getElementById("sat_tritier_tujuan");
const txtPrimerTujuan = document.getElementById("primer_tujuan");
const txtSekunderTujuan = document.getElementById("sekunder_tujuan");
const txtTersierTujuan = document.getElementById("tritier_tujuan");

const btnConfirmRK = document.getElementById("rk_confirm");
const btnCancelRK = document.getElementById("rk_cancel");

var reftechKelRK = false;
var refetchSubkelRK = false;
var refetchTypeRK = false;
//#endregion

//#region Events
txtPrimerAsal.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        txtSekunderAsal.focus();
    }
});

txtSekunderAsal.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        txtTersierAsal.focus();
    }
});

txtTersierAsal.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        if (txtTersierAsal.value <= 0) {
            alert("Jumlah tritier harus lebih besar dari 0.");
            this.focus();
        } else {
            txtTersierTujuan.value = this.value;

            if (slcKelompokUtamaRK.disabled == false) {
                slcKelompokUtamaRK.focus();
            } else {
                btnConfirm.focus();
            }
        }
    }
});

txtPrimerTujuan.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        txtSekunderTujuan.focus();
    }
});

txtSekunderTujuan.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        txtTersierTujuan.focus();
    }
});

txtTersierTujuan.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        if (txtTersierTujuan.value <= 0) {
            alert("Jumlah tritier harus lebih besar dari 0.");
            this.focus();
        } else {
            btnConfirm.focus();
        }
    }
});

slcKelompokUtamaRK.addEventListener("mousedown", function () {
    if (this.options.length <= 2) {
        clearOptions(this, "Kelompok Utama");
        const errorOption = addLoadingOption(this);

        // SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA
        fetchSelect(
            `/Benang/getIdObjekKelUtama/032/4`,
            (data) => {
                addOptions(this, data, {
                    valueKey: "IdKelompokUtama",
                    textKey: "NamaKelompokUtama",
                });

                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKelompokUtamaRK.addEventListener("change", function () {
    slcTypeRK.selectedIndex = 0;
    slcSubKelompokRK.selectedIndex = 0;

    if (slcKelompokUtamaRK.selectedIndex != 0) {
        slcKelompokRK.focus();
    }

    reftechKelRK = true;
});

slcKelompokRK.addEventListener("mousedown", function () {
    if (this.options.length <= 2 || reftechKelRK) {
        clearOptions(this, "Kelompok");
        const errorOption = addLoadingOption(this);

        // SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK
        fetchSelect(
            `/Benang/geIdKelUtamaKelompok/${slcKelompokUtamaRK.value}`,
            (data) => {
                addOptions(this, data, {
                    valueKey: "IdKelompok",
                    textKey: "NamaKelompok",
                });

                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcKelompokRK.addEventListener("change", function () {
    slcTypeRK.selectedIndex = 0;
    slcSubKelompokRK.selectedIndex = 0;

    if (slcKelompokUtamaRK.value == "0731") {
        if (
            txtNamaKelompok.value == slcKelompokRK.textContent.split(" | ")[1]
        ) {
            slcSubKelompokRK.focus();
        } else {
            alert(
                "Nama kelompok (nama mesin) antara Asal Konversi dan Tujuan Konversi tidak sama!"
            );
            slcKelompokRK.selectedIndex = 0;
            slcKelompokRK.focus();
        }
    } else {
        slcSubKelompokRK.disabled = false;
        slcSubKelompokRK.focus();
    }

    refetchSubkelRK = true;
});

slcSubKelompokRK.addEventListener("mousedown", function () {
    if (this.options.length <= 2 || refetchSubkelRK) {
        clearOptions(this, "Sub-kelompok");
        const errorOption = addLoadingOption(this);

        // SP_5298_EXT_IDKELOMPOK_SUBKELOMPOK
        fetchSelect(
            `/Benang/getIdKelSubKelompok/${slcKelompokRK.value}`,
            (data) => {
                addOptions(this, data, {
                    valueKey: "IdSubKelompok",
                    textKey: "NamaSubKelompok",
                });

                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcSubKelompokRK.addEventListener("change", function () {
    slcTypeRK.selectedIndex = 0;
    slcTypeRK.focus();

    refetchTypeRK = true;
});

slcTypeRK.addEventListener("mousedown", function () {
    if (this.options.length <= 2 || refetchTypeRK) {
        clearOptions(this, "Type");
        const errorOption = addLoadingOption(this);

        // SP_5298_EXT_IDSUBKELOMPOK_TYPE
        fetchSelect(
            `/Benang/getIdSubKelompokType/${slcSubKelompokRK.value}`,
            (data) => {
                addOptions(this, data, {
                    valueKey: "IdType",
                    textKey: "NamaType",
                });

                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcTypeRK.addEventListener("change", function () {
    saldoType(this.textContent.split(" | ")[1], false);
    txtPrimerTujuan.focus();
});

btnConfirmRK.addEventListener("click", function () {
    document.getElementById("form_rk_return").value = "CONFIRM";
    document
        .getElementById("form_rk_return")
        .dispatchEvent(new Event("change"));
});

btnCancelRK.addEventListener("click", function () {
    document.getElementById("form_rk_return").value = "CANCEL";
    document
        .getElementById("form_rk_return")
        .dispatchEvent(new Event("change"));
});
//#endregion

//#region Functions
function saldoType(id_type, asal) {
    // SP_5298_EXT_SALDO_BARANG
    fetchSelect(`/Benang/getSaldoBarang/${id_type}`, (data) => {
        if (asal) {
            txtSaldoPrimerAsal.value = data[0].SaldoPrimer;
            txtSaldoSekunderAsal.value = data[0].SaldoSekunder;
            txtSaldoTersierAsal.value = data[0].SaldoTritier;
            spnSatuanPrimerAsal.textContent = data[0].SatPrimer;
            spnSatuanSekunderAsal.textContent = data[0].SatSekunder;
            spnSatuanTersierAsal.textContent = data[0].SatTritier;
        } else {
            txtSaldoPrimerTujuan.value = data[0].SaldoPrimer;
            txtSaldoSekunderTujuan.value = data[0].SaldoSekunder;
            txtSaldoTersierTujuan.value = data[0].SaldoTritier;
            spnSatuanPrimerTujuan.textContent = data[0].SatPrimer;
            spnSatuanSekunderTujuan.textContent = data[0].SatSekunder;
            spnSatuanTersierTujuan.textContent = data[0].SatTritier;
        }
    });
}
//#endregion

function init_rk() {
    txtPrimerAsal.focus();
    saldoType(txtIdType.value, true);
}

// $(document).ready(function () {
//     init_rk();
// });
