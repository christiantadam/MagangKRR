//#region Variables
const dateInput = document.getElementById("tanggal");

const txtNoOrder = document.getElementById("no_order");
const txtIdentifikasi = document.getElementById("identifikasi");
const txtPrimerQty = document.getElementById("primer_qty");
const txtSekunderQty = document.getElementById("sekunder_qty");
const txtTersierQty = document.getElementById("tersier_qty");

const spnPrimerSat = document.getElementById("primer_sat");
const spnSekunderSat = document.getElementById("sekunder_sat");
const spnTersierSat = document.getElementById("tersier_sat");

const btnBaru = document.getElementById("btn_baru");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
const btnDetail = document.getElementById("btn_detail");

const slcType = document.getElementById("select_benang");

const listDetail = document.querySelectorAll(".card .detail_order");
// listDetail.forEach((ele) => {
//     console.log(ele.id);
// });

var tempData = [];
var listOrder = [];
// var listDummy = [
//     {
//         idType: 1,
//         namaType: "Type A",
//         satPrimer: "Primer 1-1",
//         qtyPrimer: "Primer 2-1",
//         satSekunder: "Sekunder 1-1",
//         qtySekunder: "Sekunder 2-1",
//         satTersier: "Tersier 1-1",
//         qtyTersier: "Tersier 2-1",
//     },
// ];
//#endregion

//#region Events
btnBaru.addEventListener("click", function () {
    txtIdentifikasi.value = "";
    listOrder = [];
    clearTable("table_order");
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
        txtPrimerQty.disabled = false;
        txtPrimerQty.focus();
        txtPrimerQty.value = "";

        const [SatPrimer, SatSekunder, SatTirtier] = this.value.split(",");
        spnPrimerSat.textContent = SatPrimer;
        spnSekunderSat.textContent = SatSekunder;
        spnTersierSat.textContent = SatTirtier;

        txtPrimerQty.disabled = false;
        txtPrimerQty.focus();
    }
});

txtPrimerQty.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtSekunderQty.disabled = false;
        txtSekunderQty.focus();

        if (this.value == "") {
            this.value = 0;
        }
    }
});

txtSekunderQty.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtTersierQty.disabled = false;
        txtTersierQty.focus();

        if (this.value == "") {
            this.value = 0;
        }
    }
});

txtTersierQty.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        btnDetail.disabled = false;
        btnDetail.focus();

        if (this.value == "") {
            this.value = 0;
        }
    }
});

btnDetail.addEventListener("click", function () {
    // Lakukan pengecekkan untuk tiap input pada card Detail Order
    var isDetailEmpty = false;

    if (slcType.selectedIndex != 0) {
        listDetail.forEach((ele) => {
            if (ele.value == "") isDetailEmpty = true;
        });
    } else isDetailEmpty = true;

    if (isDetailEmpty) {
        alert("Ada data yang belum terisi. \nMohon periksa kembali.");
        return;
    }

    // Lakukan pencarian terhadap tabel berdasarkan Nama Type
    if (
        isTableContains(
            "table_order",
            slcType.options[slcType.selectedIndex].text
        )
    ) {
        alert("Sudah ada type benang yang sama dalam order.");
    } else {
        dataDetail = {
            idType: slcType.value,
            namaType: slcType.options[slcType.selectedIndex].text,
            satPrimer: spnPrimerSat.textContent,
            qtyPrimer: txtPrimerQty.value,
            satSekunder: spnSekunderSat.textContent,
            qtySekunder: txtSekunderQty.value,
            satTersier: spnTersierSat.textContent,
            qtyTersier: txtTersierQty.value,
        };

        listOrder.push(dataDetail);
        addDataToTable("table_order", listOrder, 0);

        // Lakukan konfirmasi apakah ingin melakukan penambahan data lagi
        showModal(
            "Tambah Data",
            "Ingin input data bahan / hasil produksi lagi?",
            () => {
                clearDataDetail();
                slcType.focus();
            },
            () => {
                btnProses.focus();
            }
        );
    }
});

btnKeluar.addEventListener("click", function () {
    if (this.textContent == "Keluar") {
        window.location.href = "/Extruder/ExtruderNet";
    } else {
        toggleButtons(1);
        listOrder = [];
        clearTable("table_order");
        clearDataDetail();
        disableDetail();
    }
});

txtNoOrder.addEventListener("change", function () {
    for (let i = 0; i < listOrder.length; i++) {
        fetchStmt(
            "/ExtruderNet/insOrderDetail/" +
                txtNoOrder.value +
                "/" +
                toSnakeCase(listOrder[i].namaType) +
                "/" +
                listOrder[i].qtyPrimer +
                "/" +
                listOrder[i].qtySekunder +
                "/" +
                listOrder[i].qtyTersier +
                "/0/0/0"
        );
    }

    fetchStmt("/ExtruderNet/updCounterOrder/EXT");

    alert("Data berhasil disimpan!");
    toggleButtons(1);
    disableDetail();
    txtNoOrder.value = "";
    txtIdentifikasi.value = "";
    btnBaru.focus();
});

btnProses.addEventListener("click", function () {
    if (listOrder.length < 1) {
        alert("Data order masih kosong!");
    } else {
        fetchStmt(
            "/ExtruderNet/insOrderBenang/" +
                dateInput.value +
                "/" +
                txtIdentifikasi.value +
                "/tempUsr"
        );

        fetch("/ExtruderNet/getNoOrder")
            .then((response) => response.json())
            .then((data) => {
                txtNoOrder.value = data.NoOrder;
                txtNoOrder.dispatchEvent(new Event("change"));
            })
            .catch((error) => {
                console.error("Error: ", error);
            });
    }
});
//#endregion

//#region Functions
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
    slcType.selectedIndex = 0;
    listDetail.forEach((ele) => {
        ele.value = "";
    });
}

function disableDetail() {
    slcType.disabled = true;
    listDetail.forEach((ele) => {
        ele.disabled = true;
    });
}

function init() {
    toggleButtons(1);
    btnBaru.focus();
    getCurrentDate();
}
//#endregion

init();
