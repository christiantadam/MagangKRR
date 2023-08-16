<!-- LAST: btnProses_Click() | FrmMohonKonversiNG.vb -->

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extruder\ExtruderController;
use App\Http\Controllers\Extruder\ExtruderNet\BenangController;
use App\Http\Controllers\Extruder\ExtruderNet\KonversiController;
use App\Http\Controllers\Extruder\ExtruderNet\MasterController;
use App\Http\Controllers\Extruder\ExtruderNet\OrderController;

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

#region ExtruderNet - Bagian Order
Route::get('/Order/getListBenang/{kode}', [OrderController::class, 'getListBenang']);
Route::get('/Order/getNoOrder/{kode?}', [OrderController::class, 'getNoOrder']);
Route::get('/Order/insOrderBenang/{tanggal}/{identifikasi?}/{user}/{kode?}', [OrderController::class, 'insOrderBenang']);
Route::get('/Order/insOrderDetail/{id_order}/{type_benang}/{jmlh_primer}/{jmlh_sekunder}/{jmlh_tersier}/{prod_primer}/{prod_sekunder}/{prod_tersier}', [OrderController::class, 'insOrderDetail']);
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
Route::get('/Konversi/getDetailKonversi/{id_konversi}', [KonversiController::class, 'getDetailKonversi']);
Route::get('/Konversi/getSatuan/{id_type}', [KonversiController::class, 'getSatuan']);
Route::get('/Konversi/getSaldoBarang/{id_type}', [KonversiController::class, 'getSaldoBarang']);
Route::get('/Konversi/getDataKonversi/{id_konversi}', [KonversiController::class, 'getDataKonversi']);
Route::get('/Konversi/getNoKonversiMaster/{kode?}', [KonversiController::class, 'getNoKonversiMaster']);
Route::get('/Konversi/getIdKonversiInv/{id_konversi}', [KonversiController::class, 'getIdKonversiInv']);
Route::get('/Konversi/getListMesin/{kode}', [KonversiController::class, 'getListMesin']);
Route::get('/Konversi/getOrdAccBlmSelesai/{divisi}', [KonversiController::class, 'getOrdAccBlmSelesai']);
Route::get('/Konversi/getListKomposisi/{kode}/{mesin}', [KonversiController::class, 'getListKomposisi']);
Route::get('/Konversi/getListSpek/{id_order}', [KonversiController::class, 'getListSpek']);
Route::get('/Konversi/getSaldoInv/{id_type}', [KonversiController::class, 'getSaldoInv']);

Route::get('/Konversi/insTmpTransaksi/insTmpTransaksi/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{id_pemohon}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{asal_sub_kel}/{id_konversi}', [KonversiController::class, 'insTmpTransaksi']);
Route::get('/Konversi/insDetailKonv/{id_konversi}/{id_type}/{jumlah_primer}/{jumlah_sekunder}/{jumlah_tritier}/{presentase?}/{id_konversi_inv}', [KonversiController::class, 'insDetailKonv']);

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

Route::get('/Konversi/updACCKonversi/{id_transaksi}/{id_type}/{user_acc}/{waktu_acc}/{keluar_primer}/{masuk_primer}/{masuk_sekunder}/{masuk_tritier}', [KonversiController::class, 'updACCKonversi']);
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
#endregion

#region ExtruderNet - Master
Route::get('/ExtruderNet/getDataKomposisi/{no_komposisi}', [MasterController::class, 'getDataKomposisi']);
Route::get('/ExtruderNet/getIdKomposisi/{id_divisi}/{id_komposisi?}', [MasterController::class, 'getIdKomposisi']);
Route::get('/ExtruderNet/getKelompokUtama/{id_objek}/{type?}', [MasterController::class, 'getKelompokUtama']);
Route::get('/ExtruderNet/getKelompok/{id_kelompok_utama}/{type?}', [MasterController::class, 'getKelompok']);
Route::get('/ExtruderNet/getSubKelompok/{id_kelompok}', [MasterController::class, 'getSubKelompok']);
Route::get('/ExtruderNet/getType/{id_sub_kelompok}', [MasterController::class, 'getType']);
Route::get('/ExtruderNet/getBarang/{kode}/{kode_barang}/{id_komposisi}/{id_kelompok}/{id_divisi}/{mesin}', [MasterController::class, 'getBarang']);
#endregion