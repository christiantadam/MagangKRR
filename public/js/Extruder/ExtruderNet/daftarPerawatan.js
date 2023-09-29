//#region Variables
const spnLoading = document.getElementById("loading_lbl");
const tableRawat = document.getElementById("tabel_perawatan");
const RW_btnConfirm = document.getElementById("rw_confirm");

const listRawat = [];
/* ISI LIST RAWAT
    0 Kode *hidden
    1 Tanggal
    2 NamaUser
    3 UserId *hidden
    4 Shift
    5 Waktu
    6 IdPerawatan *hidden
    7 NamaPerawatan
    8 IdMesin *hidden
    9 TypeMesin
    10 NoWinder
    11 Gangguan
    12 Penyebab
    13 Penyelesaian
    14 WaktuMulai
    15 WaktuSelesai
    16 IdGangguan *hidden
    17 Winder *hidden
*/

const colRawat = [
    { width: "1px" }, // Tanggal
    { width: "100px" }, // Nama
    { width: "1px" }, // Shift
    { width: "1px" }, // Waktu
    { width: "100px" }, // Bagian
    { width: "100px" }, // Mesin
    { width: "100px" }, // No. Winder
    { width: "100px" }, // Gangguan
    { width: "100px" }, // Penyebab
    { width: "100px" }, // Penyelesaian
    { width: "1px" }, // Mulai
    { width: "1px" }, // Selesai
];

var pilRawat = -1;
var RW_tanggal = getCurrentDate();
var RW_clickedData = null;
//#endregion

//#region Events
RW_btnConfirm.addEventListener("click", function () {
    document
        .getElementById("form_rw_return")
        .dispatchEvent(new Event("change"));
});
//#endregion

//#region Functions
function RW_showData() {
    // SP_5298_EXT_DATA_PERAWATAN
    fetchSelect("/Catat/getDataPerawatan/" + RW_tanggal + "/4384", (data) => {
        for (let i = 0; i < data.length; i++) {
            listRawat.push({
                Kode: data[i].Kode,
                Tanggal: dateTimeToDate(data[i].Tanggal),
                NamaUser: data[i].NamaUser,
                UserId: data[i].UserId,
                Shift: data[i].Shift,
                Waktu: data[i].Waktu,
                IdPerawatan: data[i].IdPerawatan,
                NamaPerawatan: data[i].NamaPerawatan,
                TypeMesin: data[i].TypeMesin,
                IdMesin: data[i].IdMesin,
                TypeMesin: data[i].TypeMesin,
                NoWinder: data[i].NoWinder,
                Gangguan: data[i].Gangguan,
                Penyebab: data[i].Penyebab,
                Penyelesaian: data[i].Penyelesaian,
                WaktuMulai: dateTimetoTime(data[i].WaktuMulai),
                WaktuSelesai: dateTimetoTime(data[i].WaktuSelesai),
                IdGangguan:
                    data[i].IdGangguan !== undefined ? data[i].IdGangguan : "",
                Winder: data[i].Winder,
            });
        }

        if (data.length > 0)
            addTable_DataTable("table_perawatan", listRawat, colRawat);
    });
}

function rowClickedRawat(row, data, _) {
    if (pilDaya == findClickedRowInList(listRawat, "Kode", data.Kode)) {
        row.style.background = "white";
        pilDaya = -1;
        RW_clickedData = null;
    } else {
        clearSelection_DataTable("tabel_perawatan");
        row.style.background = "aliceblue";
        pilDaya = findClickedRowInList(listRawat, "Kode", data.Kode);
        RW_clickedData = data;
    }
}
//#endregion

function init_rw() {
    pilRawat = -1;
    RW_tanggal = getCurrentDate();
    RW_clickedData = null;

    spnLoading.classList.add("hidden");
    tableRawat.classList.remove("hidden");

    if (!$.fn.DataTable.isDataTable("#tabel_perawatan")) {
        $("#tabel_perawatan").DataTable({
            responsive: true,
            paging: false,
            scrollY: "250px",
            scrollX: "1000000px",
            columns: colRawat,
            dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
            language: {
                searchPlaceholder: " Tabel perawatan...",
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

    listRawat.length = 0;
    clearTable_DataTable("tabel_perawatan", colRawat.length, "padding=250px");
}

$("#form_daftar_rawat").on("shown.bs.modal", function () {
    init_rw();
});
