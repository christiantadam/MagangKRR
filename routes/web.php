<!--
    PERBAIKAN   : getDataKonversi() | FrmMohonKonversi.vb
    MIGRASI     : loadDataKwaH() | FrmDaya.vb
-->

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extruder\ExtruderController;
use App\Http\Controllers\Extruder\ExtruderNet\BenangController;
use App\Http\Controllers\Extruder\ExtruderNet\KonversiController;
use App\Http\Controllers\Extruder\ExtruderNet\MasterController;
use App\Http\Controllers\Extruder\ExtruderNet\OrderController;
use App\Http\Controllers\Extruder\ExtruderNet\PencatatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('Contoh', 'App\Http\Controllers\HomeController@Contoh');
Route::get('ProgramContoh', 'App\Http\Controllers\Contoh\Transaksi\ContohController@index');

Route::get('/Extruder/{pageName?}', [ExtruderController::class, 'index']);
Route::get('/Extruder/{pageName?}/{formName?}', [ExtruderController::class, 'index']);

Route::get('/Extruder/ExtruderNet/Master/{formName?}', [MasterController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Order/{formName?}', [OrderController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Konversi/{formName?}', [KonversiController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Benang/{formName?}', [BenangController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Catat/{formName?}', [PencatatanController::class, 'index']);

#region ExtruderNet - Master (unfinished)
Route::get('/ExtruderNet/getDataKomposisi/{no_komposisi}', [MasterController::class, 'getDataKomposisi']);
Route::get('/ExtruderNet/getIdKomposisi/{id_divisi}/{id_komposisi?}', [MasterController::class, 'getIdKomposisi']);
Route::get('/ExtruderNet/getKelompokUtama/{id_objek}/{type?}', [MasterController::class, 'getKelompokUtama']);
Route::get('/ExtruderNet/getKelompok/{id_kelompok_utama}/{type?}', [MasterController::class, 'getKelompok']);
Route::get('/ExtruderNet/getSubKelompok/{id_kelompok}', [MasterController::class, 'getSubKelompok']);
Route::get('/ExtruderNet/getType/{id_sub_kelompok}', [MasterController::class, 'getType']);
Route::get('/ExtruderNet/getBarang/{kode}/{kode_barang}/{id_komposisi}/{id_kelompok}/{id_divisi}/{mesin}', [MasterController::class, 'getBarang']);
#endregion

#region ExtruderNet - Form Bagian Order
Route::get('/Order/getListBenang/{kode}', [OrderController::class, 'getListBenang']);
Route::get('/Order/getNoOrder/{kode?}', [OrderController::class, 'getNoOrder']);
Route::get('/Order/insOrderBenang/{tanggal}/{identifikasi?}/{user}/{kode?}', [OrderController::class, 'insOrderBenang']);
Route::get('/Order/insOrderDetail/{id_order}/{type_benang}/{jmlh_primer}/{jmlh_sekunder}/{jmlh_tritier}/{prod_primer}/{prod_sekunder}/{prod_tritier}', [OrderController::class, 'insOrderDetail']);
Route::get('/Order/updCounterOrder/{id_divisi}', [OrderController::class, 'updCounterOrder']);

Route::get('/Order/getOrderBlmAcc/{divisi}', [OrderController::class, 'getOrderBlmAcc']);
Route::get('/Order/getListSpek/{id_order}', [OrderController::class, 'getListSpek']);
Route::get('/Order/updAccOrder/{id_order}/{user_acc}', [OrderController::class, 'updAccOrder']);

Route::get('/Order/getListBatalOrd/{id_divisi}', [OrderController::class, 'getListBatalOrd']);
Route::get('/Order/getListOrderBtl/{id_order}', [OrderController::class, 'getListOrderBtl']);
Route::get('/Order/updStatusOrder/{id_order}/{status}/{ket}', [OrderController::class, 'updStatusOrder']);
#endregion

#region ExtruderNet - Form Konversi Mohon
Route::get('/Konversi/getListKomposisiBahan/{id_komposisi}', [KonversiController::class, 'getListKomposisiBahan']);
Route::get('/Konversi/getSatuan/{id_type}', [KonversiController::class, 'getSatuan']);
Route::get('/Konversi/getSaldoBarang/{id_type}', [KonversiController::class, 'getSaldoBarang']);
Route::get('/Konversi/getDataKonversi/{id_konversi}', [KonversiController::class, 'getDataKonversi']);
Route::get('/Konversi/getListDetailKonversi/{id_konversi}', [KonversiController::class, 'getListDetailKonversi']);
Route::get('/Konversi/getListKonversi/{id_divisi}/{kode?}/{datetime?}', [KonversiController::class, 'getListKonversi']);
Route::get('/Konversi/getIdKonversiInv/{id_konversi}', [KonversiController::class, 'getIdKonversiInv']);
Route::get('/Konversi/getListMesin/{kode}', [KonversiController::class, 'getListMesin']);
Route::get('/Konversi/getOrdAccBlmSelesai/{divisi}', [KonversiController::class, 'getOrdAccBlmSelesai']);
Route::get('/Konversi/getListKomposisi/{kode}/{id_mesin}', [KonversiController::class, 'getListKomposisi']);
Route::get('/Konversi/getListSpek/{id_order}', [KonversiController::class, 'getListSpek']);
Route::get('/Konversi/getSaldoInv/{id_type}', [KonversiController::class, 'getSaldoInv']);

Route::get('/Konversi/insTmpTransaksi/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{id_pemohon}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{asal_sub_kel}/{id_konversi}', [KonversiController::class, 'insTmpTransaksi']);
Route::get('/Konversi/insDetailKonversi/{id_konversi}/{id_type}/{jumlah_primer}/{jumlah_sekunder}/{jumlah_tritier}/{presentase?}/{id_konversi_inv}', [KonversiController::class, 'insDetailKonversi']);
Route::get('/Konversi/insMasterKonversi/{tgl}/{shift}/{awal}/{akhir}/{mesin}/{ukuran}/{denier}/{warna}/{lot_number}/{id_order}/{no_urut}/{id_komp}/{jam1}/{jam2}/{user}/{kode?}', [KonversiController::class, 'insMasterKonversi']);
Route::get('/Konversi/getMasterKonversi/{kode?}', [KonversiController::class, 'getMasterKonversi']);

Route::get('/Konversi/updListCounter', [KonversiController::class, 'updListCounter']);
Route::get('/Konversi/getListCounter', [KonversiController::class, 'getListCounter']);
Route::get('/Konversi/updMasterKonversi/{tgl}/{shift}/{awal}/{akhir}/{ukuran}/{denier}/{warna}/{lot_number}/{jam1}/{jam2}/{id_konv}', [KonversiController::class, 'updMasterKonversi']);

Route::get('/Konversi/delDetailKonversi/{id_konversi}/{id_konv_inv}', [KonversiController::class, 'delDetailKonversi']);
Route::get('/Konversi/delKonversi/{id_konversi}', [KonversiController::class, 'delKonversi']);
#endregion

#region ExtruderNet - Form Konversi ACC
Route::get('/Konversi/getListKonvBlmAcc/{id_divisi}', [KonversiController::class, 'getListKonvBlmAcc']);
Route::get('/Konversi/getListKonvDetail/{id_konversi}', [KonversiController::class, 'getListKonvDetail']);
Route::get('/Konversi/getPenyesuaianTrans/{kode?}/{id_type?}/{id_type_transaksi?}/{id_transaksi?}/{kode_barang?}/{id_sub_kel?}', [KonversiController::class, 'getPenyesuaianTrans']);
Route::get('/Konversi/getTransaksiKonv/{id_konv_ext}', [KonversiController::class, 'getTransaksiKonv']);
Route::get('/Konversi/getJumlahHutang/{id_type}/{subkel}/{shift}/{tgl}', [KonversiController::class, 'getJumlahHutang']);
Route::get('/Konversi/getIdTransInv/{id_type}/{subkel}/{tgl}/{shift}', [KonversiController::class, 'getIdTransInv']);
Route::get('/Konversi/getOrderStatus/{id_order}', [KonversiController::class, 'getOrderStatus']);
Route::get('/Konversi/getKeteranganSaldo/{id_order}/{no_urut_order}', [KonversiController::class, 'getKeteranganSaldo']);

Route::get('/Konversi/updACCKonversi/{id_transaksi}/{id_type}/{user_acc}/{waktu_acc}/{keluar_primer}/{keluar_sekunder}/{keluar_tritier}/{masuk_primer}/{masuk_sekunder}/{masuk_tritier}', [KonversiController::class, 'updACCKonversi']);
Route::get('/Konversi/updHutang/{id_type}/{subkel}/{id_inv}/{pemberi}', [KonversiController::class, 'updHutang']);
Route::get('/Konversi/updACCMasterKonv/{id_konversi}/{user_acc}', [KonversiController::class, 'updACCMasterKonv']);
Route::get('/Konversi/updSaldoOrdDet/{id_order}/{no_urut_order}/{primer}/{sekunder}/{tritier}', [KonversiController::class, 'updSaldoOrdDet']);
#endregion

#region ExtruderNet - Form Benang Mohon
Route::get('/Benang/getListDataNG/{id_konversi}/{tanggal}', [BenangController::class, 'getListDataNG']);
Route::get('/Benang/getDetailUraianKonvNG/{id_konversi}', [BenangController::class, 'getDetailUraianKonvNG']);
Route::get('/Benang/getKoreksiSrtBlmAcc/{tanggal}', [BenangController::class, 'getKoreksiSrtBlmAcc']);
Route::get('/Benang/getListProdNG/{no_konv}', [BenangController::class, 'getListProdNG']);
Route::get('/Benang/getDataNG/{kode}/{no_konv}/{id_type}', [BenangController::class, 'getDataNG']);
Route::get('/Benang/getListIdKonv/{kode}/{id_konversi?}/{id_type?}/{id_divisi?}/{tanggal?}/{shift?}', [BenangController::class, 'getListIdKonv']);
Route::get('/Benang/getIdKonversiNG', [BenangController::class, 'getIdKonversiNG']);
Route::get('/Benang/getListCounter', [BenangController::class, 'getListCounter']);

Route::get('/Benang/insMasterKonvNG/{tanggal}/{user_input}/{id_konversi_ext}', [BenangController::class, 'insMasterKonvNG']);
Route::get('/Benang/insDetailKonvNG/{id_konversi_ng}/{id_type}/{jumlah_primer}/{jumlah_sekunder}/{jumlah_tritier}/{id_konv_inv?}', [BenangController::class, 'insDetailKonvNG']);
Route::get('/Benang/insAsalTmpTrans/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{id_pemohon}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{asal_sub_kel}/{id_konversi}', [BenangController::class, 'insAsalTmpTrans']);
Route::get('/Benang/insTujuanTmpTrans/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{id_pemohon}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{tujuan_sub_kel}/{id_konversi}', [BenangController::class, 'insTujuanTmpTrans']);

Route::get('/Benang/updDetailKonvNG/{id_konversi}/{id_type}/{j_primer}/{j_sekunder}/{j_tritier}', [BenangController::class, 'updDetailKonvNG']);
Route::get('/Benang/updTmpTransaksi/{id_transaksi}/{uraian_detail_transaksi?}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{tujuan_sub_kelompok?}', [BenangController::class, 'updTmpTransaksi']);

Route::get('/Benang/delKonversiNG/{id_konversi}', [BenangController::class, 'delKonversiNG']);
#endregion

#region ExtruderNet - Form Benang ACC
Route::get('/Benang/getListIdKonversiNG/{tanggal1}/{tanggal2}/{kode?}', [BenangController::class, 'getListIdKonversiNG']);
Route::get('/Benang/getDetailDataBenangNG/{id_konversi_ng}', [BenangController::class, 'getDetailDataBenangNG']);
Route::get('/Benang/getPenyesuaianTransaksi/{kode?}/{id_type?}/{id_type_transaksi?}/{id_transaksi?}/{kode_barang?}/{id_sub_kel?}', [BenangController::class, 'getPenyesuaianTransaksi']);
Route::get('/Benang/getTransaksiKonversiNG/{id_konversi_ng}', [BenangController::class, 'getTransaksiKonversiNG']);

Route::get('/Benang/updProsesACCKonversi/{id_transaksi}/{id_type}/{user_acc}/{waktu_acc?}/{keluar_primer}/{keluar_sekunder}/{keluar_tritier}/{masuk_primer}/{masuk_sekunder}/{masuk_tritier}', [BenangController::class, 'updProsesACCKonversi']);
Route::get('/Benang/updACCKonversiNG/{id_konversi_ng}/{user_acc}', [BenangController::class, 'updACCKonversiNG']);
#endregion

#region ExtruderNet - Form Rincian Konversi
Route::get('/Benang/getIdObjekKelUtama/{id_objek_kelompok_utama}/{type?}', [BenangController::class, 'getIdObjekKelUtama']);
Route::get('/Benang/geIdKelUtamaKelompok/{id_kelompok_utama_kelompok}/{type?}', [BenangController::class, 'geIdKelUtamaKelompok']);
Route::get('/Benang/getIdKelSubKelompok/{id_kelompok_sub_kelompok}', [BenangController::class, 'getIdKelSubKelompok']);
Route::get('/Benang/getIdSubKelompokType/{id_sub_kelompok_type}', [BenangController::class, 'getIdSubKelompokType']);
Route::get('/Benang/getSaldoBarang/{id_type}', [BenangController::class, 'getSaldoBarang']);
#endregion

#region ExtruderNet - Form Catat Gangguan
Route::get('/Catat/getListIdKomposisi/{tanggal}/{id_mesin}', [PencatatanController::class, 'getListIdKomposisi']);
Route::get('/Catat/getDisplayShift/{id_konversi}', [PencatatanController::class, 'getDisplayShift']);
Route::get('/Catat/getListMesin/{kode}', [PencatatanController::class, 'getListMesin']);
Route::get('/Catat/getListGangguan', [PencatatanController::class, 'getListGangguan']);
Route::get('/Catat/getListGangguanProd/{bulan}/{tahun}', [PencatatanController::class, 'getListGangguanProd']);
Route::get('/Catat/getListShift/{id_konversi}', [PencatatanController::class, 'getListShift']);
Route::get('/Catat/getNoTrans', [PencatatanController::class, 'getNoTrans']);

Route::get('/Catat/insGangguanProd/{tanggal}/{id_mesin}/{id_gangguan}/{id_konversi?}/{shift}/{awal}/{akhir}/{awal_gangguan}/{akhir_gangguan}/{jumlah_jam}/{jumlah_menit}/{status}/{keterangan}/{jam_user}/{user}', [PencatatanController::class, 'insGangguanProd']);

Route::get('/Catat/updGangguanProd/{no_trans}/{awal}/{akhir}/{jam}/{menit}/{ket}', [PencatatanController::class, 'updGangguanProd']);

Route::get('/Catat/delGangguanProd/{no_trans}', [PencatatanController::class, 'delGangguanProd']);
#endregion

#region ExtruderNet - Form Catat Daya
Route::get('/Catat/getFaktorKali/{id_mesin}', [PencatatanController::class, 'getFaktorKali']);
Route::get('/Catat/getKwahMesinPerbulan/{bulan}/{tahun}', [PencatatanController::class, 'getKwahMesinPerbulan']);
Route::get('/Catat/insKwahMesin/{tanggal}/{id_mesin}/{jam}/{counter}/{kali}/{jam_user}/{user}', [PencatatanController::class, 'insKwahMesin']);
Route::get('/Catat/updKwahMesin/{id_kwah_mesin}/{counter}', [PencatatanController::class, 'updKwahMesin']);
Route::get('/Catat/delKwahMesin/{id_kwah}', [PencatatanController::class, 'delKwahMesin']);
Route::get('/Catat/getListDataKwahMesin/{bulan}/{tahun}', [PencatatanController::class, 'getListDataKwahMesin']);
Route::get('/Catat/getKwahMesin/{tanggal}/{id_divisi}', [PencatatanController::class, 'getKwahMesin']);
#endregion

#region ExtruderNet - Form Catat Effisiensi
Route::get('/Catat/getListAwalProdEff/{tanggal}/{no_mesin}/{shift}', [PencatatanController::class, 'getListAwalProdEff']);
Route::get('/Catat/getListEffisiensi/{tanggal}/{no_mesin}/{shift}/{awal_produksi}', [PencatatanController::class, 'getListEffisiensi']);
Route::get('/Catat/getListIdKonversi/{tanggal}/{no_mesin}/{shift}', [PencatatanController::class, 'getListIdKonversi']);
Route::get('/Catat/getCekDataEff/', [PencatatanController::class, 'getCekDataEff']);
Route::get('/Catat/insEff/{Tanggal}/{IdMesin}/{Shift}/{AwalProduksi}/{AkhirProduksi}/{IdKonversi}/{ScrewRevolution}/{MotorCurrent}/{SlitterWidth}/{NoOfYarn}/{WaterGap}/{RollSpeed3}/{StretchingRatio}/{Relax}/{Denier}/{DenierRata}/{JamUser}/{UserInput}', [PencatatanController::class, 'insEff']);
Route::get('/Catat/updEff/{Tanggal}/{IdMesin}/{Shift}/{AwalProduksi}/{AkhirProduksi}/{IdKonversi}/{ScrewRevolution}/{MotorCurrent}/{SlitterWidth}/{NoOfYarn}/{WaterGap}/{RollSpeed3}/{StretchingRatio}/{Relax}/{Denier}/{DenierRata}/{JamUser}/{UserInput}', [PencatatanController::class, 'updEff']);
Route::get('/Catat/delEff/{Tanggal}/{IdMesin}/{Shift}/{AwalProduksi}/{AkhirProduksi}', [PencatatanController::class, 'delEff']);
#endregion