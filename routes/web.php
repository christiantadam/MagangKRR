<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extruder\ExtruderController;
use App\Http\Controllers\Extruder\ExtruderNet\MasterController;
use App\Http\Controllers\Extruder\ExtruderNet\TropodoController;

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
// Route::get('/Extruder/{pageName?}/{formName?}', [ExtruderController::class, 'index']);

Route::get('/Extruder/ExtruderNet/Master/{formName?}', [MasterController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Tropodo/{formName?}', [TropodoController::class, 'index']);

#region ExtruderNet - Tropodo
Route::get('/ExtruderNet/getListBenang/{kode}', [TropodoController::class, 'getListBenang']);
Route::get('/ExtruderNet/insOrderBenang/{tanggal}/{identifikasi?}/{user}/{kode?}', [TropodoController::class, 'insOrderBenang']);
Route::get('/ExtruderNet/insOrderDetail/{id_order}/{type_benang}/{jmlh_primer}/{jmlh_sekunder}/{jmlh_tersier}/{prod_primer}/{prod_sekunder}/{prod_tersier}', [TropodoController::class, 'insOrderDetail']);
Route::get('/ExtruderNet/updCounterOrder/{id_divisi}', [TropodoController::class, 'updCounterOrder']);

Route::get('/ExtruderNet/getOrderBlmAcc/{divisi}', [TropodoController::class, 'getOrderBlmAcc']);
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
