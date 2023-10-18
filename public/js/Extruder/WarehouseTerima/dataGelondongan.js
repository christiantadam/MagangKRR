//#region Variables
const DT_tanggal = document.getElementById("mdl_tanggal");
const DT_btnCancel = document.getElementById("mdl_cancel");
const DT_btnConfirm = document.getElementById("mdl_confirm");
const DT_table = document.getElementById("mdl_table");

const spnLoading = document.getElementById("loading_lbl");
const btnRefresh = document.getElementById("btn_referesh");
const hidDivisi = document.getElementById("hid_divisi");

const DT_listKirim = [];

const DT_colKirim = [
    { width: "1px" }, // No.
    { width: "1px" }, // Tanggal
    { width: "150px" }, // Type
    { width: "100px" }, // No. Indeks
    { width: "1px" }, // Bagian
    { width: "1px" }, // Mesin
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Divisi
];
//#endregion

//#region Events
//#endregion

//#region Functions
function DT_showData() {
    fetchSelect(
        "/warehouseTerima/SP_1273_INV_ListKirimBahanBaku/2~" +
            hidDivisi.textContent,
        (data) => {
            for (let i = 0; i < data.length; i++) {
                DT_listKirim.push({
                    TglKirim: dateTimeToDate(data[i].TglKirim),
                    NamaType: data[i].NamaType,
                    KodeBarang: data[i].KodeBarang,
                    NoIndeks: data[i].NoIndeks,
                    Primer: data[i].Primer,
                    Sekunder: data[i].Sekunder,
                    Tritier: data[i].Tritier,
                    Divisi: data[i].Divisi,
                });
            }

            if (data.length > 0) {
                addTable_DataTable("mdl_table", DT_listKirim, DT_colKirim);
            } else {
                clearTable_DataTable(
                    "mdl_table",
                    DT_colKirim.length,
                    "Tidak ditemukan data gelondongan pada <b>" +
                        DT_tanggal.value +
                        "</b>."
                );
            }
        }
    );
}
//#endregion

function init_dt() {
    spnLoading.classList.add("hidden");
    DT_table.classList.remove("hidden");
    DT_tanggal.value = getCurrentDate();

    if (!$.fn.DataTable.isDataTable("#mdl_table")) {
        $("#mdl_table").DataTable({
            responsive: true,
            paging: false,
            scrollY: "250px",
            scrollX: "1000000px",
            columns: DT_colKirim,
            dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
            language: {
                searchPlaceholder: " Tabel kirim...",
                search: "",
            },

            initComplete: () => {
                var searchInput = $('input[type="search"]').addClass(
                    "form-control"
                );

                searchInput.wrap('<div class="input-group"></div>');
                searchInput.before(
                    '<span class="input-group-text">Cari:</span>'
                );
            },
        });
    }

    addTable_DataTable(
        "mdl_table",
        [
            {
                TglKirim: "",
                NamaType: "",
                KodeBarang: "",
                NoIndeks: "",
                Primer: "",
                Sekunder: "",
                Tritier: "",
                Divisi: "",
            },
        ],
        DT_colKirim
    );

    DT_listKirim.length = 0;
    clearTable_DataTable("mdl_table", DT_colKirim.length, "Memuat data...");
    DT_showData();
}

$("#form_data_gelondongan").on("shown.bs.modal", function () {
    init_dt();
});
