// Untuk form konversi acc, konversi mohon belum di-tes secara menyeluruh, mungkin nanti kalau ada waktu bisa kembali lagi untuk melakukan testing terhadap form tersebut

function getSatuan(id_type, i) {
    fetch("/ExtruderNet/getSatuan/" + id_type)
        .then((response) => response.json())
        .then((data) => {
            listSatuan.splice(0);
            listSatuan.push(data[0].SatPrimer);
            listSatuan.push(data[0].SatSekunder);
            listSatuan.push(data[0].SatTritier);

            addSpecificData("table_konversi", 3, i, listSatuan[0]);
            addSpecificData("table_konversi", 5, i, listSatuan[1]);
            addSpecificData("table_konversi", 7, i, listSatuan[2]);
        });
}

function addSpecificData(tableId, x, y, data) {
    const table = document.getElementById(tableId);
    const targetRow = table.rows[y];

    if (targetRow) {
        if (x >= 0 && x < targetRow.cells.length) {
            targetRow.cells[x].innerText = data;
        } else {
            console.error("Invalid column index:", x);
        }
    } else {
        console.error("Invalid row index:", y);
    }
}

// http://127.0.0.1:8000/Extruder/ExtruderNet/Konversi/formTropodoKonversiACC
// array:1 [▼ // app\Http\Controllers\Extruder\ExtruderNet\KonversiController.php:36
//   0 => {#276 ▼
//     +"IdTransaksi": "1"					0
//     +"IdTypeTransaksi": "01"				1
//     +"UraianDetailTransaksi": "Asal Konversi"		2
//     +"IdType": "type3               "			3
//     +"IdPenerima": null					4
//     +"IdPemberi": null					5
//     +"SaatAwalTransaksi": "2023-08-05 15:30:00.000"	6
//     +"SaatAkhirTransaksi": null				7
//     +"JumlahPemasukanPrimer": ".00"			8
//     +"JumlahPemasukanSekunder": ".00"			9
//     +"JumlahPemasukanTritier": ".00"			10
//     +"JumlahPengeluaranPrimer": null			11
//     +"JumlahPengeluaranSekunder": null			12
//     +"JumlahPengeluaranTritier": null			13
//     +"AsalIdSubkelompok": null				14
//     +"TujuanIdSubkelompok": null			15
//     +"idkonversi": "INV0003  "				16
//     +"SaldoPrimer": "100.00"				17
//     +"SaldoSekunder": "100.00"				18
//     +"SaldoTritier": "100.00"				19
//     +"namatype": "Type C"				20
//     +"idsubkelompok_type": "sub7  "			21
//   }
// ]
