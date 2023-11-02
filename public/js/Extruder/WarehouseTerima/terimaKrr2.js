//#region Variables
const txtSuratJalan = document.getElementById("surat_jalan");
const txtScanBarcode = document.getElementById("scan_bar");
const spnJumlahItem = document.getElementById("jmlh_item");
const spnTervalidasi = document.getElementById("tervalidasi");

const btnSJ_JBK = document.getElementById("btn_sj_jbk");
const btnSJ_WVN = document.getElementById("btn_sj_wvn");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listTerima = [];
//#endregion

//#region Events
//#endregion

//#region Functions
function loadDataFromServer(no_sj, kd_div) {
    let kode = kd_div == 1 ? 1 : 2;
    fetchSelect(
        "warehouseTerima/spSelect_TerimaDariKRR2/" + no_sj.trim() + "~" + kode,
        (data) => {
            for (let i = 0; i < data.length; i++) {
                listTerima.push({
                    NoBarcode: data[i].No_Barcode,
                    NamaType: data[i].NamaType,
                    Primer: data[i].Primer,
                    Sekunder: data[i].Sekunder,
                    Tritier: data[i].Tritier,
                    Status: data[i].Status,
                    NoBttb: data[i].No_BTTB,
                });

                if (kd_div == 2 && data[i].Status == -1) {
                    spnTervalidasi.textContent =
                        parseFloat(spnTervalidasi.textContent) + 1;
                } else if (kd_div != 2 && data[i].Status == 2) {
                    spnTervalidasi.textContent =
                        parseFloat(spnTervalidasi.textContent) + 1;
                }
            }

            let cek_status = 0;
            if (kd_div == 2) {
                cek_status = -1;
            } else cek_status = 2;

            // belum menambahkan class untuk row_hijau & row_merah
            addTable_DataTable(
                "table_terima",
                listTerima,
                null,
                (row, data, index) => {
                    if (data[index].Status == cek_status) {
                        $(row).addClass("row_hijau");
                    } else $(row).addClass("row_merah");
                },
                null,
                "colored_row"
            );

            txtScanBarcode.value = "";
            txtScanBarcode.focus();
        }
    );
}
//#endregion

function init() {
    $("#table_terima").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel terima...",
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

    clearTable_DataTable("table_terima", 6);
}

$(document).ready(() => init());

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/WarehouseTerima";
});
