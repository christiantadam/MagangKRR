<!--
    LAST: Sub getSatuan | FrmMohonKonversi.vb
 -->

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extruder\ExtruderController;
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

#region ExtruderNet - Bagian Order
Route::get('/ExtruderNet/getListBenang/{kode}', [OrderController::class, 'getListBenang']);
Route::get('/ExtruderNet/getNoOrder/{kode?}', [OrderController::class, 'getNoOrder']);
Route::get('/ExtruderNet/insOrderBenang/{tanggal}/{identifikasi?}/{user}/{kode?}', [OrderController::class, 'insOrderBenang']);
Route::get('/ExtruderNet/insOrderDetail/{id_order}/{type_benang}/{jmlh_primer}/{jmlh_sekunder}/{jmlh_tersier}/{prod_primer}/{prod_sekunder}/{prod_tersier}', [OrderController::class, 'insOrderDetail']);
Route::get('/ExtruderNet/updCounterOrder/{id_divisi}', [OrderController::class, 'updCounterOrder']);

Route::get('/ExtruderNet/getOrderBlmAcc/{divisi}', [OrderController::class, 'getOrderBlmAcc']);
Route::get('/ExtruderNet/getListSpek/{id_order}', [OrderController::class, 'getListSpek']);
Route::get('/ExtruderNet/updAccOrder/{id_order}/{user_acc}', [OrderController::class, 'updAccOrder']);

Route::get('/ExtruderNet/getListBatalOrd/{id_divisi}', [OrderController::class, 'getListBatalOrd']);
Route::get('/ExtruderNet/getListOrderBtl/{id_order}', [OrderController::class, 'getListOrderBtl']);
Route::get('/ExtruderNet/updStatusOrder/{id_order}/{status}/{ket}', [OrderController::class, 'updStatusOrder']);
#endregion

#region ExtrudeerNet - Bagian Konversi
Route::get('/ExtruderNet/getListKomposisi/{id_komposisi}', [KonversiController::class, 'getListKomposisi']);
Route::get('/ExtruderNet/getSatuan/{id_type}', [KonversiController::class, 'getSatuan']);
Route::get('/ExtruderNet/getSaldoBarang/{id_type}', [KonversiController::class, 'getSaldoBarang']);
Route::get('/ExtruderNet/getDataKonversi/{id_konversi}', [KonversiController::class, 'getDataKonversi']);
Route::get('/ExtruderNet/insTmpTransaksi/insTmpTransaksi/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{id_pemohon}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{asal_sub_kel}/{id_konversi}', [KonversiController::class, 'insTmpTransaksi']);
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
