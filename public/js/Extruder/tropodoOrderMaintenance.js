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
const btnDetail = document.getElementById("btn_detail");

const slcType = document.getElementById("select_benang");

const listDetail = document.querySelectorAll(".card .detail_order");

// listDetail.forEach((ele) => {
//     console.log(ele.id);
// });

var listOrder = [];
var listDummy = [
    {
        idType: 1,
        namaType: "Type A",
        satPrimer: "Primer 1-1",
        qtyPrimer: "Primer 2-1",
        satSekunder: "Sekunder 1-1",
        qtySekunder: "Sekunder 2-1",
        satTersier: "Tersier 1-1",
        qtyTersier: "Tersier 2-1",
    },
    {
        idType: 2,
        namaType: "Type B",
        satPrimer: "Primer 1-2",
        qtyPrimer: "Primer 2-2",
        satSekunder: "Sekunder 1-2",
        qtySekunder: "Sekunder 2-2",
        satTersier: "Tersier 1-2",
        qtyTersier: "Tersier 2-2",
    },
    {
        idType: 3,
        namaType: "Type C",
        satPrimer: "Primer 1-3",
        qtyPrimer: "Primer 2-3",
        satSekunder: "Sekunder 1-3",
        qtySekunder: "Sekunder 2-3",
        satTersier: "Tersier 1-3",
        qtyTersier: "Tersier 2-3",
    },
];

//#endregion

//#region Events
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

txtPrimer1.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        txtSekunder1.disabled = false;
        txtSekunder1.focus();
    }
});

txtSekunder1.addEventListener("keypress", function () {
    txtTersier1.disabled = false;
    txtTersier1.focus();
});

txtTersier1.addEventListener("keypress", function () {
    btnDetail.disabled = false;
    btnDetail.focus();
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
    }

    // Lakukan pencarian terhadap tabel berdasarkan Nama Type
    if (isTableContains(slcType.options[slcType.selectedIndex].text)) {
        alert("Sudah ada type benang yang sama dalam order.");
    } else {
        dataDetail = {
            idType: slcType.value,
            namaType: slcType.options[slcType.selectedIndex].text,
            satPrimer: txtPrimer2.value,
            qtyPrimer: txtPrimer1.value,
            satSekunder: txtSekunder2.value,
            qtySekunder: txtSekunder1.value,
            satTersier: txtTersier2.value,
            qtyTersier: txtTersier1.value,
        };

        addDataToTable([dataDetail]);
    }

    // Lakukan konfirmasi apakah ingin melakukan penambahan data lagi
    const addConfirm = window.confirm(
        "Ingin input data bahan / hasil produksi lagi?"
    );
    if (addConfirm) {
        clearDataDetail();
        slcType.focus();
    } else btnProses.focus();
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

function addDataToTable(listData) {
    const tableBody = document.querySelector("#table_order tbody");

    for (const item of listData) {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td style="display: none">${item.idType}</td>
            <td>${item.namaType}</td>
            <td class="text-center">${item.satPrimer}</td>
            <td class="text-center">${item.qtyPrimer}</td>
            <td class="text-center">${item.satSekunder}</td>
            <td class="text-center">${item.qtySekunder}</td>
            <td class="text-center">${item.satTersier}</td>
            <td class="text-center">${item.qtyTersier}</td>
        `;

        tableBody.appendChild(row);
    }
}

function isTableContains(searchStr) {
    const table = document.getElementById("table_order");
    const rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        for (let j = 0; j < cells.length; j++) {
            if (cells[j].textContent.includes(searchStr)) {
                return true; // The string is found, return true
            }
        }
    }

    return false; // The string is not found, return false
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

function init() {
    toggleButtons(1);
    btnBaru.focus();
    addDataToTable(listDummy);
}
//#endregion

init();
// alert("Halo dunia.");
