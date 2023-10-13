//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const txtNoBarcode = document.getElementById("no_barcode");
const spnBarcode = document.getElementById("btn_barcode");

const btnLihat = document.getElementById("btn_lihat");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");
//#endregion

//#region Events
slcDivisi.addEventListener("change", function () {
    if (this.selectedIndex != 0) {
        txtNoBarcode.disabled = false;
        txtNoBarcode.value = "";
        txtNoBarcode.focus();
    } else {
        slcDivisi.focus();
        alert("Pilih Dulu Divisinya !!...");
    }
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/WarehouseTerima";
});
//#endregion

//#region Functions
function cekBarcode(kode_barang, no_indeks) {
    let statusKu = 0;

    // Ambil status dispresiasi dan tmp_transaksi
    fetchSelect(
        "/warehouseTerima/SP_1273_INV_CekBarcodeGelondonganMojosari/" +
            kode_barang +
            "~" +
            no_indeks +
            "~23~26~27~22~" +
            slcDivisi.value,
        (data) => {
            let fetchEmpty = true;
            if (data.length > 0) fetchEmpty = false;

            /**
             * Status Dispresiasi
             * 1 Belum diterima ke gudang
             * 2 Sudah dikirim ke gudang
             * 3 Belum dikirim
             * 4 Data tidak ada
             */

            if (!fetchEmpty) {
                if (data[0].statusdispresiasi === null) {
                    statusKu = 4;
                } else statusKu = data[0].statusdispresiasi;
            }
        }
    );

    return statusKu;
}
//#endregion

function init() {
    // Debug cekBarcode()
    addOptionIfNotExists(slcDivisi, "EXT", "EXT - Extruder", true);
    console.log(cekBarcode(1, 1));
}

$(document).ready(() => init());
