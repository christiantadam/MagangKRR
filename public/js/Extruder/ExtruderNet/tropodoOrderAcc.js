//#region Variables
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listOrder = [];
const listDetailOrder = [];

var checkboxes = null;
var terpilih = -1;

const tableOrderWidth = 2;

const tableDetailWidth = 7;
const tableDetailCol = [
    { width: "300px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
    { width: "125px" },
];
//#endregion

//#region Events
btnProses.addEventListener("click", function () {
    const checkedOrder = [];
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            checkedOrder.push(checkbox.id);
        }
    });

    checkedOrder.forEach((order) => {
        fetchStmt("/Order/updAccOrder/" + order + "/tmpUser");
    });

    alert("Data berhasil tersimpan!");
    clearTable("table_detail_order", tableDetailWidth);
    showOrder();
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/ExtruderNet";
});

btnProses.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") {
        btnKeluar.focus();
    }
});

btnKeluar.addEventListener("keydown", function (event) {
    if (event.key === "ArrowLeft") {
        btnProses.focus();
    }
});
//#endregion

//#region Functions
function showOrder() {
    fetch("/Order/getOrderBlmAcc/EXT")
        .then((response) => response.json())
        .then((data) => {
            listOrder.length = 0;
            const strCheckBox = `<input class="form-check-input" type="checkbox" id="`;
            for (let i = 0; i < data.length; i++) {
                listOrder.push({
                    Identifikasi: `${strCheckBox}${data[i].IDOrder}"> ${data[i].Identifikasi}`,
                    IDOrder: data[i].IDOrder,
                });
            }

            addTable_DataTable("table_order", listOrder, null, rowClicked);

            checkboxes = document.querySelectorAll("input[type='checkbox']");
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("click", function (event) {
                    // *untuk menghentikan click event pada row saat checkbox diklik
                    event.stopPropagation();
                });
            });
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function rowClicked(row, data, index) {
    if (terpilih == index) {
        row.style.background = "white";
        terpilih = -1;

        clearTable_DataTable("table_detail_order", tableDetailWidth);
    } else {
        row.style.background = "aliceblue";
        terpilih = index;
        // console.log(index);

        clearTable_DataTable(
            "table_detail_order",
            tableDetailWidth,
            "Memuat data..."
        );

        fetch("/Order/getListSpek/" + data.IDOrder)
            .then((response) => response.json())
            .then((dataFetch) => {
                listDetailOrder.length = 0;
                for (let i = 0; i < dataFetch.length; i++) {
                    listDetailOrder.push({
                        TypeBenang: dataFetch[i].TypeBenang,
                        JumlahPrimer: dataFetch[i].JumlahPrimer,
                        SatuanPrimer: "NULL",
                        JumlahSekunder: dataFetch[i].JumlahSekunder,
                        SatuanSekunder: "NULL",
                        JumlahTritier: dataFetch[i].JumlahTritier,
                        SatuanTritier: "KG",
                    });
                }

                addTable_DataTable(
                    "table_detail_order",
                    listDetailOrder,
                    tableDetailCol
                );

                if (dataFetch.length <= 0) {
                    clearTable_DataTable(
                        "table_detail_order",
                        tableDetailWidth,
                        `Data untuk <b>Order ${data.IDOrder}</b> tidak ditemukan.</h3>`
                    );
                }

                window.scrollTo(0, document.body.scrollHeight);
            });
    }
}

function init() {
    $("#table_order").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel order...",
            search: "",
        },
    });

    $("#table_detail_order").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: tableDetailCol,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel detail...",
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
    showOrder();
}
//#endregion

$(document).ready(() => {
    init();
});
