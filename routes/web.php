<?php

use Illuminate\Support\Facades\Route;

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

//route adstar AdStar/
Route::resource('AdStar', App\Http\Controllers\AdStarController\AdStar::class);
Route::resource('AdStarAdStarHome', App\Http\Controllers\AdStarController\AdStarHome::class);
Route::resource('AdStarCopyTabel', App\Http\Controllers\AdStarController\CopyTabel::class);
Route::resource('AdStarHasilProd', App\Http\Controllers\AdStarController\HasilProd::class);
Route::resource('AdStarMaintOrder', App\Http\Controllers\AdStarController\MaintOrder::class);
Route::resource('AdStarStopOrder', App\Http\Controllers\AdStarController\StopOrder::class);
Route::resource('AdStarUpKodeBarang', App\Http\Controllers\AdStarController\UpKodeBarang::class);
Route::resource('AdStarPrintTabel', App\Http\Controllers\AdStarController\PrintTabel::class);
Route::resource('AdStarOpenTop', App\Http\Controllers\AdStarController\OpenTop::class);
Route::resource('AdStarCloseTop', App\Http\Controllers\AdStarController\CloseTop::class);

//route barcode AdStar/
Route::resource('AdStarBarcode', App\Http\Controllers\BarcodeAdStarController\Barcode::class);
Route::resource('AdStarSchedule', App\Http\Controllers\BarcodeAdStarController\Schedule::class);
Route::resource('AdStarBuatBarcode', App\Http\Controllers\BarcodeAdStarController\BuatBarcode::class);
Route::resource('AdStarRepress', App\Http\Controllers\BarcodeAdStarController\Repress::class);
Route::resource('AdStarCetakBarcodeRusak', App\Http\Controllers\BarcodeAdStarController\CetakBarcodeRusak::class);
Route::resource('AdStarDaftarPalet', App\Http\Controllers\BarcodeAdStarController\DaftarPalet::class);
Route::resource('AdStarHangusBarcode', App\Http\Controllers\BarcodeAdStarController\HangusBarcode::class);
Route::resource('AdStarKirimGudang', App\Http\Controllers\BarcodeAdStarController\KirimGudang::class);
Route::resource('AdStarBatalKirim', App\Http\Controllers\BarcodeAdStarController\BatalKirim::class);
Route::resource('AdStarKonversiGudang', App\Http\Controllers\BarcodeAdStarController\KonversiGudang::class);
Route::resource('AdStarHasilBarcode', App\Http\Controllers\BarcodeAdStarController\HasilBarcode::class);

//route form repress AdStar/
Route::resource('AdStarBalJadiPalet', App\Http\Controllers\FormRepressController\BalJadiPaletController::class);
Route::resource('AdStarPaletJadiBal', App\Http\Controllers\FormRepressController\PaletJadiBalController::class);
Route::resource('AdStarScanBarcode', App\Http\Controllers\FormRepressController\ScanBarcodeController::class);
Route::resource('AdStarPilihJenisRepress', App\Http\Controllers\FormRepressController\PilihJenisRepressController::class);
Route::resource('AdStarKonversi', App\Http\Controllers\FormRepressController\KonversiController::class);
Route::resource('AdStarPrintUlang', App\Http\Controllers\FormRepressController\PrintUlangController::class);
