//#region Variables
const dateInput = document.getElementById("tanggal");

const timeAwal = document.getElementById("awal");
const timeAkhir = document.getElementById("akhir");

const txtScrew = document.getElementById("screw_revolution");
const txtRoll = document.getElementById("roll_speed");
const txtMotor = document.getElementById("motor_current");
const txtStretch = document.getElementById("stretching_ratio");
const txtSlitter = document.getElementById("slitter_width");
const txtRelax = document.getElementById("relax");
const txtNoYam = document.getElementById("no_yam");
const txtDenier = document.getElementById("denier");
const txtWater = document.getElementById("water_gap");
const txtRata = document.getElementById("denier_rata");

const slcMesin = document.getElementById("select_mesin");
const slcShift = document.getElementById("select_shift");
const slcKodeKonv = document.getElementById("select_kode_konversi");
const slcWaktu = document.getElementById("select_waktu_produksi");

const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const groupBox1Ctr = document.querySelectorAll("#group_box1 .form-control");
const groupBox1Slc = document.querySelectorAll("#group_box1 .form-select");
const groupBox2 = document.querySelectorAll("#group_box2 .form-control");

var refetchWaktu = false;
var modeProses = "";
//#endregion

//#region Events
dateInput.addEventListener("keypress", function (event) {
    if (event.key == "Enter") slcMesin.focus();
});

dateInput.addEventListener("change", () => (refetchWaktu = true));

slcMesin.addEventListener("change", () => {
    slcShift.focus();
    refetchWaktu = true;
});

slcShift.addEventListener("change", () => {
    if (modeProses == "isi") {
        dateInput.focus();
    } else if (modeProses == "koreksi" || modeProses == "hapus") {
        slcWaktu.classList.remove("hidden");
        slcWaktu.focus();
    }

    refetchWaktu = true;
});

slcWaktu.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        if (this.options.length <= 1 || refetchWaktu) {
            clearOptions(this);
            const errorOption = addLoadingOption(this);
            const optionKeys = {
                valueKey: "AwalProduksi",
                textKey: "AkhirProduksi",
            };

            // SP_5298_EXT_LIST_AWALPROD_EFF
            fetchSelect(
                "/Catat/getListAwalProdEff/" +
                    dateInput.value +
                    "/" +
                    slcMesin.value +
                    "/" +
                    slcShift.value,
                (data) => {
                    addOptions(
                        this,
                        data.map((item) => {
                            return {
                                AwalProduksi: dateTimetoTime(item.AwalProduksi),
                                AkhirProduksi: dateTimetoTime(
                                    item.AkhirProduksi
                                ),
                            };
                        }),
                        optionKeys
                    );
                    this.removeChild(errorOption);
                },
                errorOption
            );
        }
    }
});

slcWaktu.addEventListener("mousedown", function () {
    if (this.options.length <= 1 || refetchWaktu) {
        clearOptions(this);
        const errorOption = addLoadingOption(this);
        const optionKeys = {
            valueKey: "AwalProduksi",
            textKey: "AkhirProduksi",
        };

        // SP_5298_EXT_LIST_AWALPROD_EFF
        fetchSelect(
            "/Catat/getListAwalProdEff/" +
                dateInput.value +
                "/" +
                slcMesin.value +
                "/" +
                slcShift.value,
            (data) => {
                addOptions(
                    this,
                    data.map((item) => {
                        return {
                            AwalProduksi: dateTimetoTime(item.AwalProduksi),
                            AkhirProduksi: dateTimetoTime(item.AkhirProduksi),
                        };
                    }),
                    optionKeys
                );
                this.removeChild(errorOption);
            },
            errorOption
        );
    }
});

slcWaktu.addEventListener("change", function () {
    timeAwal.value = this[this.selectedIndex].textContent.split(" | ")[0];
    timeAkhir.value = this[this.selectedIndex].textContent.split(" | ")[1];

    if (timeAwal.value != "00:00") {
        if (modeProses == "koreksi" || modeProses == "hapus") {
            getDataEffisiensi();

            if (modeProses == "koreksi") {
                txtScrew.focus();
            } else {
                btnProses.focus();
            }
        }
    }
});
//#endregion

//#region Functions
function setEnable(m_value) {
    groupBox1Ctr.forEach((input) => (input.disabled = !m_value));
    groupBox1Slc.forEach((input) => (input.disabled = !m_value));
    groupBox2.forEach((input) => (input.disabled = !m_value));
}

function toggleButtons(tmb) {
    switch (tmb) {
        case 1:
            btnIsi.disabled = false;
            btnKoreksi.disabled = false;
            btnHapus.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;
        case 2:
            btnIsi.disabled = true;
            btnKoreksi.disabled = true;
            btnHapus.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";
            break;

        default:
            break;
    }
}

function clearData() {
    groupBox1Ctr.forEach((input) => (input.value = ""));
    groupBox1Slc.forEach((input) => (input.selectedIndex = 0));
    groupBox2.forEach((input) => (input.value = ""));

    timeAwal.value = "00:00";
    timeAkhir.value = "00:00";
}

function getDataEffisiensi() {
    // SP_5298_EXT_LIST_EFFISIENSI
    fetchSelect(
        "/Catat/getListEffisiensi/" +
            dateInput.value +
            "/" +
            slcMesin.value +
            "/" +
            slcShift.value +
            "/" +
            timeAwal.value,
        (data) => {
            txtScrew.value = data[0].ScrewRevolution;
            txtMotor.value = data[0].MotorCurrent;
            txtSlitter.value = data[0].SlitterWidth;
            txtNoYam.value = data[0].NoOfYarn;
            txtWater.value = data[0].WaterGap;
            txtRoll.value = data[0].RollSpeed3;
            txtStretch.value = data[0].StretchingRatio;
            txtRelax.value = data[0].Relax;
            txtDenier.value = data[0].Denier;
            txtRata.value = data[0].DenierRata;

            addOptionIfNotExists(
                slcKodeKonv,
                data[0].IdKonversi,
                data[0].IdKonversi + " | " + data[0].NamaKomposisi
            );

            txtScrew.focus();
        }
    );
}
//#endregion

function init() {
    timeAwal.value = "00:00";
    timeAkhir.value = "00:00";
    dateInput.value = getCurrentDate();
}

$(document).ready(() => {
    init();
});
