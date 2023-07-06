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
Route::get('/ABM', function () {
    return view ('ABM');
});

Route::get('/ABM/Schedule', 'App\Http\Controllers\ABM@Schedule');
Route::get('/ABM/Buat-Barcode', 'App\Http\Controllers\ABM@BuatBarcode');
Route::get('/ABM/Repress', 'App\Http\Controllers\ABM@Repress');
Route::get('/ABM/CBR', 'App\Http\Controllers\ABM@CBR');
Route::get('/ABM/Hanguskan-Barcode', 'App\Http\Controllers\ABM@HanguskanBarcode');
Route::get('/ABM/Kirim-Gudang', 'App\Http\Controllers\ABM@KirimGudang');
Route::get('/ABM/Batal-Kirim', 'App\Http\Controllers\ABM@BatalKirim');
Route::get('/ABM/Cek-Barcode', 'App\Http\Controllers\ABM@CekBarcode');
Route::get('/ABM/CSJ', 'App\Http\Controllers\ABM@CSJ');
Route::get('/ABM/Total-Barcode', 'App\Http\Controllers\ABM@TotalBarcode');

// ========================================================

Route::get('/ABM/Buat-Barcode2', 'App\Http\Controllers\ABM@BuatBarcode2');
Route::get('/ABM/BRS', 'App\Http\Controllers\ABM@BRS');
Route::get('/ABM/BBJ', 'App\Http\Controllers\ABM@BBJ');
Route::get('/ABM/CBR2', 'App\Http\Controllers\ABM@CBR2');
Route::get('/ABM/Hanguskan-Barcode2', 'App\Http\Controllers\ABM@HanguskanBarcode2');
Route::get('/ABM/Kirim-Gudang2', 'App\Http\Controllers\ABM@KirimGudang2');
Route::get('/ABM/Kirim-Circular', 'App\Http\Controllers\ABM@KirimCircular');
Route::get('/ABM/Batal-Kirim2', 'App\Http\Controllers\ABM@BatalKirim2');
Route::get('/ABM/Repress2', 'App\Http\Controllers\ABM@Repress2');
Route::get('/ABM/Cek-Barcode2', 'App\Http\Controllers\ABM@CekBarcode2');
Route::get('/ABM/Penghangusan-Barcode', 'App\Http\Controllers\ABM@Penghanguskan');
Route::get('/ABM/Setting-Timbangan', 'App\Http\Controllers\ABM@SettingTimbangan');
Route::get('/ABM/MSD', 'App\Http\Controllers\ABM@MSD');

// ========================================================

Route::get('/ABM/LST', function () {
    return view ('LST');
});