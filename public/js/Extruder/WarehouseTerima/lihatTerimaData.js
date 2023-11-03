//#region Variables
const spnLoading = document.getElementById("loading_lbl");
const spnTitle = document.getElementById("ld_title");
const divTable = document.getElementById("tempat_tabel");
const TD_btnConfirm = document.getElementById("ld_confirm");
const TD_btnCancel = document.getElementById("ld_cancel");

var [TD_tableId, TD_tableName, TD_formTitle] = [
    "halo_table",
    "Tabel cari...",
    "Lihat Data",
];

var TD_strTable = `
    <table id="${TD_tableId}" class="hover cell-border">
        <thead>
            <tr>
                <th>Tes123</th>
                <th>Tes123</th>
                <th>Tes123</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
`;

const TD_listTable = [];
var TD_pilTable = -1;
var TD_keyStr = "";
var [selectedData, confirmedData] = [{}, {}];
//#endregion

//#region Events
//#endregion

//#region Functions
function TD_rowClicked(row, data, _) {
    if (
        TD_pilTable ==
        findClickedRowInList(TD_listTable, TD_keyStr, data[TD_keyStr])
    ) {
        row.style.background = "white";
        TD_pilTable = -1;
    } else {
        clearSelection_DataTable(TD_tableId);
        row.style.background = "aliceblue";
        TD_pilTable = findClickedRowInList(
            TD_listTable,
            TD_keyStr,
            data[TD_keyStr]
        );

        selectedData = data;
        console.log(selectedData);
    }
}
//#endregion

function init_dt() {
    spnLoading.classList.add("hidden");
    divTable.classList.remove("hidden");
    spnTitle.textContent = TD_formTitle;

    divTable.innerHTML = TD_strTable;
    if (!$.fn.DataTable.isDataTable("#" + TD_tableId)) {
        $("#" + TD_tableId).DataTable({
            responsive: true,
            paging: true,
            scrollY: "250px",
            scrollX: "",
            dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
            language: {
                searchPlaceholder: " " + TD_tableName,
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

        addTable_DataTable(TD_tableId, TD_listTable, null, TD_rowClicked);
    }
}

$("#form_lihat_data").on("shown.bs.modal", function () {
    init_dt();
});

$("#form_lihat_data").on("hidden.bs.modal", function () {
    clearTable_DataTable(
        "table_kirim_gudang",
        Object.keys(TD_listTable[0]).length
    );

    TD_listTable.length = 0;
    TD_strTable = ``;
    divTable.innerHTML = TD_strTable;
    divTable.classList.add("hidden");
    spnLoading.classList.remove("hidden");
});

$(document).keypress(function (e) {
    if ($("#form_lihat_data").is(":visible")) {
        if (e.which === 13) {
            confirmedData = selectedData;
            selectedData = {};
        } else if (e.which === 27) {
            selectedData = {};
        }
    }
});
