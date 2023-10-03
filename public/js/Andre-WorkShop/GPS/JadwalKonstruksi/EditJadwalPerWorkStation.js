let tgl = document.getElementById("tgl");
let table_data = $("#TableEditPerWorkstation").DataTable();
let btnok = document.getElementById("btnok");
let WorkStation = document.getElementById('WorkStation');
let btnbatal = document.getElementById('batal');

//#region set tanggal

const currentDate = new Date();

// Get the first day of the current month
const firstDayOfMonth = new Date();
firstDayOfMonth.setDate(1);
console.log(Date(currentDate.getFullYear(), currentDate.getMonth(), 1));

// Format the date to be in 'YYYY-MM-DD' format for setting the input value
const formattedFirstDay = firstDayOfMonth.toISOString().slice(0, 10);

// Format the current date to be in 'YYYY-MM-DD' format for setting the input value
const formattedCurrentDate = currentDate.toISOString().slice(0, 10);

tgl.value = formattedCurrentDate;

//#endregion

//#region tanggal on enter

tgl.addEventListener("keypress", function(event){
    if (event.key == "Enter") {
        btnok.disabled = true;
        table_data.clear().draw();
        let tglSrv, tglEst;
        tglSrv = formattedCurrentDate;
        tglEst = tgl.value;
        if (tglEst < tglSrv) {
            alert("Tanggal estimasi harus lebih besar dari/sama dengan tanggal sekarang");
            btnok.disabled = true;
            tgl.focus();
            return;
        }
        else{
            btnok.disabled = false;
            btnok.focus();
        }

    }
})


//#endregion

//#region btn ok on click

btnok.addEventListener('click', function(){
    if (WorkStation.value != "Pilih Work Station" || WorkStation.value != null) {
        LoadData();
        btnbatal.style.display = "";
    }
});

//#endregion

//#region load data

function LoadData(){

}

//#endregion
