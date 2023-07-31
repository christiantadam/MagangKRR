//#region Variables
var listOrder = [];
var listDetail = [];
//#endregion

//#region Events
//#endregion

//#region Functions
function showOrder() {
    listOrder = [];
    listDetail = [];

    fetchData("/ExtruderNet/getOrderBlmAcc/EXT", listOrder);
}
//#endregion
