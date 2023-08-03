//#region Variables
const listKomposisi = [];
const listKonversi = [];
//#endregion

//#region Events
//#endregion

//#region Functions
function getDataKomposisi(no_komposisi) {
    fetch("/ExtruderNet/getListKomposisi/" + no_komposisi)
        .then((response) => response.json())
        .then((data) => {
            listKomposisi.splice(0);
            for (let i = 0; i < data.length; i++) {
                listKomposisi.push({
                    StatusType: data[i].StatusType,
                    IdType: data[i].IdType,
                    NamaType: data[i].NamaType,
                    NamaSubKelompok: data[i].NamaSubKelompok,
                    SatuanPrimer: data[i].SatuanPrimer,
                    SatuanSekunder: data[i].SatuanSekunder,
                    SatuanTritier: data[i].SatuanTritier,
                    IdSubKelompok: data[i].IdSubKelompok,
                });
            }

            addTable_DataTable("table_komposisi", listKomposisi);
        })
        .catch((error) => {
            console.error("Error: ", error);
        });
}

function getSatuan(id_type, i) {
    // do SP_5298_EXT_GET_SATUAN
    fetch("/ExtruderNet/getSatuan/" + id_type)
        .then((response) => response.json())
        .then((data) => {
            listKonversi.splice(0);
            for (let i = 0; i < data.length; i++) {
                listKonversi.push({
                    SatPrimer: data[i].SatPrimer,
                    SatSekunder: data[i].SatSekunder,
                    SatTritier: data[i].SatTritier,
                });
            }
        });

    // trying to find a way to add data into a specific row for multiple columns but not all of them
}

function init() {
    $("#table_konversi").DataTable({
        dom: '<"datatable-top-info"i><"datatable-search"f>rt<"datatable-bottom"lp><"datatable-clear">',
        responsive: true,
        paging: false,
        scrollX: "1000000px",
        columns: [
            { width: "350px" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
        ],
    });

    $("#table_komposisi").DataTable({
        dom: '<"datatable-top-info"i><"datatable-search"f>rt<"datatable-bottom"lp><"datatable-clear">',
        responsive: true,
        paging: false,
        scrollX: "1000000px",
        columns: [
            { width: "auto" },
            { width: "auto" },
            { width: "250px" },
            { width: "200px" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
            { width: "auto" },
        ],
    });
}
//#endregion

$(document).ready(() => {
    init();
});
