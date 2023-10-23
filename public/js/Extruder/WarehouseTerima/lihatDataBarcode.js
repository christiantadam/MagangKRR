//#region Variables
const LD_tanggal = document.getElementById("ld_tanggal");
const LD_btnCancel = document.getElementById("ld_cancel");
const LD_btnConfirm = document.getElementById("ld_confirm");
const LD_table = document.getElementById("ld_table");

const spnLoading = document.getElementById("loading_lbl");
const btnRefresh = document.getElementById("btn_refresh");
const hidDivisi = document.getElementById("hidden_divisi");

const LD_listKirim = [];
/** ISI LIST KIRIM
 * 0 TglKirim
 * 1 NamaType
 * 2 KodeBarang
 * 3 NoIndeks
 * 4 Primer
 * 5 Sekunder
 * 6 Tritier
 * 7 Divisi
 */

const LD_colKirim = [
    { width: "1px" }, // No.
    { width: "1px" }, // Tanggal
    { width: "1px" }, // Type
    { width: "1px" }, // Kode Barang
    { width: "1px" }, // No. Indeks
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Divisi
];

var LD_formData = { title: "", kode: "" };
//#endregion

//#region Events
btnRefresh.addEventListener("click", function () {
    LD_listKirim.length = 0;
    clearTable_DataTable("ld_table", LD_colKirim.length, "Memuat data...");
    // 2017-07-17 00:00:00.000  ABM
    LD_showData(12, LD_tanggal.value);
});
//#endregion

//#region Functions
function LD_showData(kode, tgl = "") {
    let fetch_url =
        "/warehouseTerima/SP_1273_INV_ListKirimBahanBaku/" +
        kode +
        "~" +
        hidDivisi.value;
    if (tgl != "") fetch_url += "~" + tgl;

    fetchSelect(fetch_url, (data) => {
        for (let i = 0; i < data.length; i++) {
            LD_listKirim.push({
                Nomor: i + 1,
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
            addTable_DataTable("ld_table", LD_listKirim);
        } else {
            clearTable_DataTable(
                "ld_table",
                LD_colKirim.length,
                "Tidak ditemukan Data Gelondongan pada <b>" +
                    LD_tanggal.value +
                    "</b>."
            );
        }
    });
}
//#endregion

function init_dt() {
    spnLoading.classList.add("hidden");
    LD_table.classList.remove("hidden");
    LD_tanggal.value = getCurrentDate();

    if (!$.fn.DataTable.isDataTable("#ld_table")) {
        $("#ld_table").DataTable({
            responsive: true,
            paging: false,
            scrollY: "250px",
            scrollX: "",
            dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
            language: {
                searchPlaceholder: " Tabel kirim...",
                search: "",
            },

            initComplete: () => {
                var searchInput = $('input[type="search"]:last').addClass(
                    "form-control"
                );

                searchInput.wrap('<div class="input-group"></div>');
                searchInput.before(
                    '<span class="input-group-text">Cari:</span>'
                );
            },
        });
    }

    addTable_DataTable("ld_table", [
        {
            Nomor: "",
            Tanggal: "",
            Type: "",
            Kode: "",
            NoIndeks: "",
            Primer: "",
            Sekunder: "",
            Tritier: "",
            Divisi: "",
        },
    ]);

    document.getElementById("ld_title").textContent = LD_formData.title;
    LD_listKirim.length = 0;
    clearTable_DataTable("ld_table", LD_colKirim.length, "Memuat data...");
    LD_showData(LD_formData.kode);
}

$("#form_lihat_data").on("shown.bs.modal", function () {
    init_dt();
});

$("#form_lihat_data").on("hidden.bs.modal", function () {
    LD_listKirim.length = 0;
    clearTable_DataTable("ld_table", LD_colKirim.length);
});
