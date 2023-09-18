//#region Variables
//#endregion

//#region Events
//#endregion

//#region Functions
//#endregion

function init() {
    $("#table_order").DataTable({
        responsive: true,
        paging: false,
        scrollY: "500px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel order...",
            search: "",
        },

        initComplete: function () {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    clearTable_DataTable("table_order", 4);
}

$(document).ready(() => init());
