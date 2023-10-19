//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listBarcode = [];
/** ISI LIST BARCODE
 * 0 ...
 */

const colBarcode = [
    { width: "1px" }, // Tanggal
    { width: "150px" }, // Type
    { width: "125px" }, // No. Barcode
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
//#endregion

//#region Events
//#endregion

//#region Functions
function showData() {
    fetchSelect(
        "/warehouseTerima/SP_1273_INV_ListBarcodeBahanBaku/2~" +
            slcDivisi.value,
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listBarcode.push({
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
        }
    );
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
