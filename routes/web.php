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

//route adstar
Route::resource('AdStar', App\Http\Controllers\AdStarController\AdStar::class);
Route::resource('AdStarHome', App\Http\Controllers\AdStarController\AdStarHome::class);
Route::resource('CopyTabel', App\Http\Controllers\AdStarController\CopyTabel::class);
Route::resource('HasilProd', App\Http\Controllers\AdStarController\HasilProd::class);
Route::resource('MaintOrder', App\Http\Controllers\AdStarController\MaintOrder::class);
Route::resource('StopOrder', App\Http\Controllers\AdStarController\StopOrder::class);
Route::resource('UpKodeBarang', App\Http\Controllers\AdStarController\UpKodeBarang::class);
Route::resource('PrintTabel', App\Http\Controllers\AdStarController\PrintTabel::class);
Route::resource('OpenTop', App\Http\Controllers\AdStarController\OpenTop::class);
Route::resource('CloseTop', App\Http\Controllers\AdStarController\CloseTop::class);

//route barcode
Route::resource('Barcode', App\Http\Controllers\BarcodeAdStarController\Barcode::class);
Route::resource('Schedule', App\Http\Controllers\BarcodeAdStarController\Schedule::class);
Route::resource('BuatBarcode', App\Http\Controllers\BarcodeAdStarController\BuatBarcode::class);
Route::resource('Repress', App\Http\Controllers\BarcodeAdStarController\Repress::class);
Route::resource('CetakBarcodeRusak', App\Http\Controllers\BarcodeAdStarController\CetakBarcodeRusak::class);
Route::resource('DaftarPalet', App\Http\Controllers\BarcodeAdStarController\DaftarPalet::class);
Route::resource('HangusBarcode', App\Http\Controllers\BarcodeAdStarController\HangusBarcode::class);
Route::resource('KirimGudang', App\Http\Controllers\BarcodeAdStarController\KirimGudang::class);
Route::resource('BatalKirim', App\Http\Controllers\BarcodeAdStarController\BatalKirim::class);
Route::resource('KonversiGudang', App\Http\Controllers\BarcodeAdStarController\KonversiGudang::class);
Route::resource('HasilBarcode', App\Http\Controllers\BarcodeAdStarController\HasilBarcode::class);

//route form repress
Route::resource('BalJadiPalet', App\Http\Controllers\FormRepressController\BalJadiPaletController::class);
Route::resource('PaletJadiBal', App\Http\Controllers\FormRepressController\PaletJadiBalController::class);
Route::resource('ScanBarcode', App\Http\Controllers\FormRepressController\ScanBarcodeController::class);
Route::resource('PilihJenisRepress', App\Http\Controllers\FormRepressController\PilihJenisRepressController::class);
