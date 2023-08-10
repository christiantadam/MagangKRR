//#region Variables
const listOfInputTxt = document.querySelectorAll("input[type='text']");

const listKonversi = [];
const listHasil = [];
//#endregion

//#region Events
function clearForm() {
    listOfInputTxt.forEach((input) => {
        input.value = "";
    });

    listKonversi.length = 0;
    // HANDLE TABLE
    listHasil.length = 0;
    // HANDLE TABLE
}

function daftarKonversiBelumACC() {
    listKonversi.length = 0;
    // HANDLE TABLE

    // do SP_5298_EXT_LIST_KONV_BLM_ACC
}
//#endregion

//#region Functions
//#endregion
