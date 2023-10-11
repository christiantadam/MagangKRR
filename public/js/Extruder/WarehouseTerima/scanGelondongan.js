//#region Variables
const slcDivisi = document.getElementById("select_divisi");
const txtNoBarcode = document.getElementById("no_barcode");
const spnBarcode = document.getElementById("btn_barcode");

const btnLihat = document.getElementById("btn_lihat");
const btnProses = document.getElementById("btn_proses");
const btnKeluar = document.getElementById("btn_keluar");

const listRekap = [];
/** ISI LIST REKAP
 * 0 Tanggal
 * 1 Type
 * 2 Primer
 * 3 Sekunder
 * 4 Tritier
 * 5 IdType
 * 6 Pemberi
 * 7 Divisi
 */

const listKirim = [];
/** ISI LIST KIRIM
 * 0 TglMutasi
 * 1 NamaType
 * 2 NoBarcode
 * 3 NamaSubkelompok
 * 4 NamaKelompok
 * 5 KodeBarang
 * 6 NoIndeks
 * 7 QtyPrimer
 * 8 QtySekunder
 * 9 Qty
 * 10 IdType
 * 11 NoTempTrans
 */

var [noIndeks, kodeBarang] = ["", ""];
//#endregion

//#region Events
//#endregion

//#region Functions
function cekBarcode(kode_barang, no_indeks) {
    let statusKu = 0;
    fetchSelect(
        "/warehouseTerima/SP_5409_INV_CekBarcodeKirimGudang/" +
            kode_barang +
            "~" +
            no_indeks,
        (data) => {
            /**
             * 1 belum dikirim
             * 2 sudah dikirim ke gudang
             * 3 sudah diterima oleh gudang
             * 4 data tidak ditemukan
             */

            if (data.length > 0) {
                statusKu = data[0].statusdispresiasi;
            } else statusKu = 4;

            return statusKu;
        }
    );
}

function ambilDataBarang(kode_barang, no_indeks) {
    let [type, id_type, pemberi] = ["", "", ""];
    let [primer, sekunder, tritier] = [0, 0, 0];
    let [tanggal, divisi] = ["", ""];

    fetchSelect(
        "/warehouseTerima/SP_5409_INV_SimpanPenerimaanAwalGudang/" +
            kode_barang +
            "~" +
            no_indeks,
        (data) => {
            if (data.length > 0) {
                alert(data[0].NmError);
                return;
            }

            fetchSelect(
                "/warehouseTerima/SP_5409_INV_SimpanPenerimaanAwalGudang2/" +
                    kode_barang +
                    "~" +
                    no_indeks,
                (data) => {
                    if (data.length > 0) {
                        listKirim.push({
                            TglMutasi: dateTimeToDate(data[0].Tgl_mutasi),
                            NamaType: data[0].NamaType,
                            NoBarcode: txtNoBarcode.value,
                            NamaSubkelompok: data[0].NamaSubKelompok,
                            NamaKelompok: data[0].NamaKelompok,
                            KodeBarang: kode_barang,
                            NoIndeks: no_indeks,
                            QtyPrimer: data[0].Qty_Primer,
                            QtySekunder: data[0].Qty_sekunder,
                            Qty: data[0].Qty,
                            IdType: data[0].IdType,
                            NoTempTrans: data[0].NoTempTrans,
                        });

                        type = data[0].NamaType;
                        id_type = data[0].IdType;
                        primer = data[0].Qty_Primer;
                        sekunder = data[0].Qty_sekunder;
                        tritier = data[0].Qty;
                        tanggal = dateTimeToDate(data[0].Tgl_mutasi);
                        pemberi = data[0].UraianDetailTransaksi;
                        divisi = data[0].Divisi;
                    } else {
                        alert("Tembak Ulang Barcode.");
                    }

                    spnBarcode.textContent = listKirim.length;
                    buatRekap(
                        id_type,
                        type,
                        tanggal,
                        primer,
                        sekunder,
                        tritier,
                        pemberi,
                        divisi
                    );
                }
            );
        }
    );
}

function buatRekap(
    id_type,
    type,
    tanggal,
    primer,
    sekunder,
    tritier,
    pemberi,
    divisi
) {
    let [primer2, sekunder2, tritier2] = [0, 0, 0];
    let [indeks, found] = [-1, false];
    for (let i = 0; i < listRekap.length; i++) {
        if (
            listRekap[i].IdType == id_type &&
            listRekap[i].Tanggal == tanggal &&
            listRekap[i].Pemberi == pemberi
        ) {
            indeks = i;
            primer2 = parseFloat(listRekap[i].Primer);
            sekunder2 = parseFloat(listRekap[i].Sekunder);
            tritier2 = parseFloat(listRekap[i].Tritier);
            found = true;
        }

        if (found) {
            listRekap.push({
                Tanggal: tanggal,
                Type: type,
                Primer: primer,
                Sekunder: sekunder,
                Tritier: tritier,
                IdType: id_type,
                Pemberi: pemberi,
                Divisi: divisi,
            });
        } else {
            primer2 += parseFloat(primer);
            sekunder2 += parseFloat(sekunder);
            tritier2 += parseFloat(tritier);
            listRekap[indeks].Primer = primer2;
            listRekap[indeks].Sekunder = sekunder2;
            listRekap[indeks].Tritier = tritier2;
        }
    }
}
//#endregion

function init() {
    spnBarcode.textContent = listKirim.length;
}

$(document).ready(() => init());
