let tglawal = document.getElementById("tglawal");
let tglakhir = document.getElementById("tglakhir");

let WorkStation = document.getElementById('WorkStation');

//#region set Tanggal

const currentDate = new Date();

// Get the first day of the current month
const firstDayOfMonth = new Date();
firstDayOfMonth.setDate(1);
// console.log(Date(currentDate.getFullYear(), currentDate.getMonth(), 1));

// Format the date to be in 'YYYY-MM-DD' format for setting the input value
const formattedFirstDay = firstDayOfMonth.toISOString().slice(0, 10);
const tanggalTerakhirBulanIni = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
// Mendapatkan nilai hari terakhir dari bulan ini

var hariTerakhir = tanggalTerakhirBulanIni.getDate();
var tglakhirnilai = new Date(currentDate.getFullYear(), currentDate.getMonth(), hariTerakhir+1);
// console.log(hariTerakhir);
// Mengatur variabel tglakhir ke tanggal terakhir bulan ini
console.log("Tanggal terakhir bulan ini: " + tglakhirnilai.toISOString().slice(0, 10));

tglawal.value = formattedFirstDay;
tglakhir.value = tglakhirnilai.toISOString().slice(0, 10);

//#endregion

//#region workstation blm pilih

WorkStation.addEventListener('change', function(){
    if (WorkStation.value != 'Pilih Work Station') {
        tglawal.focus();
    }
});

//#endregion

//#region focus

tglawal.addEventListener('keypress', function(event){
    if (event.key == "Enter") {
        tglakhir.focus();
    }
});

WorkStation.focus();

//#endregion

//#region load data

function loadData(){

}

//#endregion
