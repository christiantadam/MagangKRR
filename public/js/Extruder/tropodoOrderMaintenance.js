//#region Variables
const txtIdentifikasi = document.getElementById("identifikasi");
const txtPrimer1 = document.getElementById("primer1");
const txtSekunder1 = document.getElementById("sekunder1");
const txtTersier1 = document.getElementById("tertier1");
const txtPrimer2 = document.getElementById("primer2");
const txtSekunder2 = document.getElementById("sekunder2");
const txtTersier2 = document.getElementById("tertier2");

const btnBaru = document.getElementById("btn_baru");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const slcType = document.getElementById("select_benang");

var listOrder = [];
var listDummy = [];
//#endregion

btnBaru.addEventListener("click", function () {
    txtIdentifikasi.value = "";
    listOrder = [];
    clearDataDetail();
    toggleButtons(2);
    txtIdentifikasi.focus();
});

txtIdentifikasi.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        const inputValue = txtIdentifikasi.value.trim();
        if (inputValue === "") {
            alert("Masukkan identifikasi order terlebih dahulu");
            txtIdentifikasi.focus();
        } else {
            slcType.disabled = false;
            slcType.focus();
        }
    }
});

slcType.addEventListener("change", function () {
    if (this.value != "-- Pilih Type Benang --") {
        txtPrimer1.disabled = false;
        txtPrimer1.focus();
        txtPrimer1.value = "";

        const [SatPrimer, SatSekunder, SatTirtier] = this.value.split(",");
        txtPrimer2.value = SatPrimer;
        txtSekunder2.value = SatSekunder;
        txtTersier2.value = SatTirtier;
    }
});

//#region Utilities
function toggleButtons(tmb) {
    switch (tmb) {
        case 1:
            txtIdentifikasi.disabled = true;
            btnBaru.disabled = false;
            btnProses.disabled = true;
            btnKeluar.textContent = "Keluar";
            break;

        default:
            txtIdentifikasi.disabled = false;
            btnBaru.disabled = true;
            btnProses.disabled = false;
            btnKeluar.textContent = "Batal";
            break;
    }
}

function clearDataDetail() {
    // Kosongkan semua input & button pada card Detail Order
}

function disableDetail() {
    // Disable semua input & button pada card Detail Order
}

function loadTable() {
    // Nama Type - Qty. Primer - Sat. Primer - Qty. Sekunder - Sat. Sekunder - Qty. Tersier - Sat. Tersier
    // CALL "toggleButtons(1)"
    // Ubah fokus ke "btnBaru"
}

function fetchData(urlString, idTarget) {
    const eleTarget = document.getElementById(idTarget);
    const loadingOption = eleTarget.querySelector('[value="loading"]');

    if (eleTarget.options.length <= 3) {
        loadingOption.style.display = "block";

        fetch(urlString)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })
            .then((data) => {
                // console.log(urlString);
                // console.log(data);

                addOptions(idTarget, data);
                loadingOption.style.display = "none";
            })
            .catch((error) => {
                console.error("Error:", error);
                loadingOption.style.display = "none";
            });
    }
}

function addOptions(idSelect, optionData) {
    const selectEle = document.getElementById(idSelect);
    optionData = JSON.parse(optionData);

    for (let i = 0; i < optionData.length; i++) {
        const newOption = document.createElement("option");

        switch (idSelect) {
            // case selectKelompokUtama.id:
            //     newOption.value = optionData[i].IdKelompokUtama;
            //     newOption.text = optionData[i].NamaKelompokUtama;
            //     break;

            default:
                break;
        }

        selectEle.appendChild(newOption);
    }
}
//#endregion
