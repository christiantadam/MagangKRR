//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const txtNoBarcode = document.getElementById("no_barcode");
const spnBarcode = document.getElementById("btn_barcode");
const hidGetFetch = document.getElementById("ambil_data_fetch");

const btnLihat = document.getElementById("btn_lihat");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listRekap = [];
/** ISI LIST REKAP
 * 0 - Tanggal
 * 1 - Type
 * 2 - Primer
 * 3 - Sekunder
 * 4 - Tritier
 * 5 - IdType
 * 6 - Divisi
 */

const listKirim = [];
/** ISI LIST KIRIM
 * 0 - TglMutasi
 * 1 - NamaType
 * 2 - NoBarcode
 * 3 - NamaSubKelompok
 * 4 - NamaKelompok
 * 5 - KodeBarang
 * 6 - NoIndeks
 * 7 - QtyPrimer
 * 8 - QtySekunder
 * 9 - QtyTritier
 * 10 - IdDivisi
 */

const colRekap = [
    { width: "1px" }, // Tanggal
    { width: "1px" }, // Type
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Id Type
    { width: "1px" }, // Divisi
];

const colKirim = [
    { width: "1px" }, // Tanggal
    { width: "200px" }, // Type
    { width: "125px" }, // No. Barcode
    { width: "125px" }, // Sub-kelompok
    { width: "1px" }, // Kelompok
    { width: "125px" }, // Kode Barang
    { width: "125px" }, // No. Indeks
    { width: "1px" }, // Primer
    { width: "1px" }, // Sekunder
    { width: "1px" }, // Tritier
    { width: "1px" }, // Divisi
];
//#endregion

//#region Events
slcDivisi.addEventListener("change", function () {
    if (this.selectedIndex != 0) {
        txtNoBarcode.disabled = false;
        txtNoBarcode.value = "";
        txtNoBarcode.focus();
    } else {
        slcDivisi.focus();
        alert("Pilih Divisi Terlebih Dahulu!");
    }
});

txtNoBarcode.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        if (slcDivisi.selectedIndex == 0) {
            alert("Pilih Divisi Terlebih Dahulu!");
            this.value = "";
            slcDivisi.focus();
            return;
        }

        if (this.value.trim() != "") {
            let kode_barang = this.value.substring(this.value.length - 9);
            let no_indeks = this.value.substring(0, 9).replace(/^0+/, "");

            cekBarcodeDispatch(
                kode_barang,
                no_indeks,
                "cekBarcode_barcodeKeyPress"
            );
        } else alert("Scan Barcode Terlebih Dahulu!");

        spnBarcode.textContent = listKirim.length;
        txtNoBarcode.value = "";
        txtNoBarcode.focus();
    }
});

btnKeluar.addEventListener("click", function () {
    window.location.href = "/Extruder/WarehouseTerima";
});

hidGetFetch.addEventListener("change", function () {
    switch (this.value.split("~")[0]) {
        case "cekBarcode_barcodeKeyPress":
            let sts = this.value.split("~")[1];
            let sudahTembak = false;
            if (sts == 3 || sts == 1) {
                for (let i = 0; i < listKirim.length; i++) {
                    if (listKirim[i].NoBarcode == this.value.trim()) {
                        sudahTembak = true;
                        break;
                    }
                }

                if (!sudahTembak) {
                    ambilDataBarangFetch(kode_barang, no_indeks);
                } else alert("Barcode Sudah Pernah Ditembak!");
            } else if (sts == 2) {
                alert("Barcode Sudah Dikirim Ke Gudang!");
            } else alert("Data Barcode Tidak Ditemukan!");
            break;

        default:
            console.log(this.value);
            break;
    }
});
//#endregion

//#region Functions
// Tested
function cekBarcodeDispatch(kode_barang, no_indeks, parent_fun = "cekBarcode") {
    let statusKu = 0;
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
             * Keterangan Status:
             * 1 - Belum diterima ke gudang
             * 2 - Sudah dikirim ke gudang
             * 3 - Belum dikirim
             * 4 - Data tidak ada
             */

            if (!fetchEmpty) {
                if (data[0].Status === null) {
                    statusKu = 4;
                } else statusKu = data[0].Status;
            }

            hidGetFetch.value = parent_fun + "~" + statusKu;
            hidGetFetch.dispatchEvent(new Event("change"));
        }
    );
}

// Tested
function ambilDataBarangFetch(kode_barang, no_indeks) {
    let [type, id_type] = ["", ""];
    let [primer, sekunder, tritier] = [0, 0, 0];
    let [tanggal, divisi] = ["", ""];

    fetchSelect(
        "/warehouseTerima/SP_1273_INV_TampilGelondongan_Mojo/" +
            kode_barang +
            "~" +
            no_indeks +
            "~" +
            slcDivisi.value,
        (data) => {
            let fetchEmpty = true;
            if (data.length > 0) fetchEmpty = false;

            if (!fetchEmpty) {
                listKirim.push({
                    TglMutasi: dateTimeToDate(data[0].tgl_mutasi),
                    NamaType: data[0].namatype,
                    NoBarcode: txtNoBarcode.value,
                    NamaSubKelompok: data[0].namasubkelompok,
                    NamaKelompok: data[0].namakelompok,
                    KodeBarang: kode_barang,
                    NoIndeks: no_indeks,
                    QtyPrimer: data[0].qty_primer,
                    QtySekunder: data[0].qty_sekunder,
                    QtyTritier: data[0].qty,
                    IdDivisi: data[0].iddivisi_objek,
                });

                addTable_DataTable("table_kirim", listKirim, colKirim);

                type = data[0].namatype;
                id_type = data[0].idtype;
                primer = data[0].qty_primer;
                sekunder = data[0].qty_sekunder;
                tritier = data[0].qty;
                tanggal = dateTimeToDate(data[0].tgl_mutasi);
                divisi = data[0].iddivisi_objek;

                buatRekapFetch(
                    id_type,
                    type,
                    tanggal,
                    [primer, sekunder, tritier],
                    divisi
                );
            }
        }
    );
}

// Tested
function buatRekapFetch(id_type, type, tanggal, jumlah, divisi) {
    let [primer, sekunder, tritier] = jumlah;
    let [primer2, sekunder2, tritier2] = [0, 0, 0];

    let [indeks, found] = [-1, false];
    for (let i = 0; i < listRekap.length; i++) {
        if (listRekap[i].IdType == id_type && listRekap[i].Tanggal == tanggal) {
            indeks = i;
            primer2 = listRekap[i].Primer;
            sekunder2 = listRekap[i].Sekunder;
            tritier2 = listRekap[i].Tritier;
            found = true;
            break;
        }
    }

    if (!found) {
        listRekap.push({
            Tanggal: tanggal,
            Type: type,
            Primer: primer,
            Sekunder: sekunder,
            Tritier: tritier,
            IdType: id_type,
            Divisi: divisi,
        });

        addTable_DataTable("table_rekap", listRekap);
    } else {
        primer2 = parseFloat(primer2) + parseFloat(primer);
        sekunder2 = parseFloat(sekunder2) + parseFloat(sekunder);
        tritier2 = parseFloat(tritier2) + parseFloat(tritier);
        listRekap[indeks].Primer = primer2;
        listRekap[indeks].Sekunder = sekunder2;
        listRekap[indeks].Tritier = tritier2;
    }
}

// Tested
function ambilJamServerDispatch(parent_fun = "ambilJamServer") {
    fetchSelect("/warehouseTerima/SP_JAM_SERVER/_", (data) => {
        let fetchEmpty = true;
        if (data.length > 0) fetchEmpty = false;

        let jam_server = "_";
        if (!fetchEmpty) jam_server = data[0].jam_server;

        hidGetFetch.value = parent_fun + "~" + jam_server;
        hidGetFetch.dispatchEvent(new Event("change"));
    });
}

function kirimGudang(kode_barang, no_indeks, user_id, divisi) {
    // Ambil jam server
    fetchSelect("/warehouseTerima/SP_JAM_SERVER/_", (data) => {
        let fetchEmpty = true;
        if (data.length > 0) fetchEmpty = false;

        let jam_server = "_";
        if (!fetchEmpty) {
            jam_server = data[0].jam_server;
        }
    });
}
//#endregion

function init() {
    $("#table_rekap").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "",
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel rekap...",
            search: "",
        },
    });

    $("#table_kirim").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKirim,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel kirim...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    // addTable_DataTable(
    //     "table_rekap",
    //     [
    //         {
    //             qwe: "qwe",
    //             wer: "wer",
    //             ert: "ert",
    //             qwe1: "qwe",
    //             wer1: "wer",
    //             ert1: "ert",
    //             qwe2: "qwe",
    //             wer2: "wer",
    //         },
    //     ],
    //     colRekap
    // );

    clearTable_DataTable("table_rekap", colRekap.length);
    clearTable_DataTable("table_kirim", colKirim.length);

    // Debug cekBarcodeDispatch()
    // addOptionIfNotExists(slcDivisi, "EXT", "EXT - Extruder", true);
    // cekBarcodeDispatch(1, 1);

    // Debug ambilDataBarangFetch() & buatRekapFetch()
    // addOptionIfNotExists(slcDivisi, "EXT", "EXT - Extruder", true);
    // ambilDataBarangFetch(1, 1);

    // Debug ambilJamServer()
    // ambilJamServerDispatch();
}

$(document).ready(() => init());
