//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const slcObjek = document.getElementById("select_objek");

const widthStok = 7;
const listStok = [];
//#endregion

//#region Events
//#endregion

//#region Functions
function tampilBarangSetengahJadi(id_objek) {
    fetchSelect(
        "/warehouseTerima/SP_1273_INV_AmbilBarangSetJadi/" + id_objek,
        (data) => {
            for (let i = 0; i < data.length; i++) {
                let f_index = "000000000" + data[i].NoIndeks;
                listStok.push({
                    NoIndeks: f_index.substring(f_index.length - 9),
                    KodeBarang: data[i].Kode_Barang,
                    NamaType: data[i].NamaType,
                    QtyPrimer: data[i].Qty_Primer,
                    QtySekunder: data[i].Qty_Sekunder,
                    Qty: data[i].Qty,
                });
            }

            if (data.length > 0) {
                addTable_DataTable("table_stok", listStok);
            } else
                clearTable_DataTable(
                    "table_stok",
                    widthStok,
                    "Data barang tidak ditemukan."
                );
        }
    );
}
//#endregion

function init() {
    $("#table_stok").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel stok...",
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

    clearTable_DataTable("table_stok", widthStok);
    slcDivisi.focus();
}

$(document).ready(() => init());

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/WarehouseTerima";
});
