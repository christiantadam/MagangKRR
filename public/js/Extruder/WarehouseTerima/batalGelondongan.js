//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const btnHapus = document.getElementById("btn_hapus");
const btnKeluar = document.getElementById("btn_keluar");

const listBarcode = [];
/** ISI LIST BARCODE
 * 0 NamaType
 * 1 KodeBarcode
 * 2 NamaSubKelompok
 * 3 NamaKelompok
 * 4 KodeBarang
 * 5 NoIndeks
 * 6 QtyPrimer
 * 7 QtySekunder
 * 8 Qty
 * 9 TglMutasi
 * 10 Divisi
 */

const colBarcode = [
    { width: "150px" }, // Type
    { width: "150px" }, // No. Barcode
    { width: "125px" }, // Sub-kelompok
    { width: "1px" }, // Kelompok
    { width: "125px" }, // Kode Barang
    { width: "100px" }, // No. Indeks
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Tanggal
    { width: "1px" }, // Divisi
];

var pilBarcode = -1;
var checkboxesBatal = null;
//#endregion

//#region Events
slcDivisi.addEventListener("change", function () {
    showData();
});

btnHapus.addEventListener("click", function () {
    showModal(
        "Konfirmasi",
        "Apakah anda yakin mau membatalkan pengiriman barcode ini?",
        () => {
            fetchStmt(
                "/warehouseTerima/SP_1273_LMT_SimpanPembatalanKirimKeGudang/" +
                    listBarcode[pilBarcode].KodeBarang +
                    "~" +
                    listBarcode[pilBarcode].NoIndeks,
                () => {
                    alert("Pengiriman Berhasil Dibatalkan");
                }
            );
        }
    );
});
//#endregion

//#region Functions
function showData() {
    fetchSelect(
        "/warehouseTerima/SP_1273_INV_ListBarcodeBahanBaku/2~" +
            slcDivisi.value,
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listBarcode.push({
                    NamaType: data[i].NamaType,
                    KodeBarcode:
                        data[i].NoIndeks.padStart(9, "0") +
                        "-" +
                        data[i].Kode_barang.padStart(9, "0"),
                    NamaSubKelompok: data[i].NamaSubKelompok,
                    NamaKelompok: data[i].NamaKelompok,
                    KodeBarang: data[i].KodeBarang,
                    NoIndeks: data[i].NoIndeks,
                    QtyPrimer: data[i].QtyPrimer,
                    QtySekunder: data[i].QtySekunder,
                    Qty: data[i].Qty,
                    TglMutasi: data[i].TglMutasi,
                    Divisi: data[i].Divisi,
                });
            }

            if (listBarcode.length > 0) {
                addTable_DataTable(
                    "table_barcode",
                    listDaya.map((item) => {
                        return {
                            ...item,
                            Tanggal: `<input class="form-check-input" type="checkbox" value="${item.KodeBarcode}" name="checkbox_barcode"> ${item.Tanggal}`,
                        };
                    }),
                    colBarcode,
                    rowClickedBarcode
                );

                checkboxesBatal = document.querySelectorAll(
                    'input[name="checkbox_barcode"]'
                );
            } else {
                clearTable_DataTable(
                    "table_barcode",
                    colBarcode.length,
                    "Tidak ditemukan Data Barcode untuk <b>Divisi " +
                        slcDivisi.options[slcDivisi.selectedIndex].text +
                        "</b>."
                );
            }
        }
    );
}

function rowClickedBarcode(row, data, index) {
    if (
        pilBarcode ==
        findClickedRowInList(listBarcode, "KodeBarcode", data.KodeBarcode)
    ) {
        row.style.background = "white";
        pilBarcode = -1;
        checkboxesBatal[index].checked = false;
        clearAll(false);
        setEnable(false);
        toggleButtons(1);
    } else {
        clearSelection_DataTable("table_barcode");
        clearCheckedBoxes(checkboxesBatal, checkboxesBatal[index]);

        row.style.background = "aliceblue";
        checkboxesBatal[index].checked = true;
        pilBarcode = findClickedRowInList(
            listBarcode,
            "KodeBarcode",
            data.KodeBarcode
        );
    }
}
//#endregion

function init() {
    $("#table_barcode").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colBarcode,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel barcode...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]:last').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    clearTable_DataTable("table_barcode", colBarcode.length);
}

$(document).ready(() => init());

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/WarehouseTerima";
});
