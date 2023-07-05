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
#GPS
Route::get('gps', 'App\Http\Controllers\HomeController@GPS');
Route::get('estimasiJadwal', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@estimasi_jadwal');
Route::get('MaintenanceGambar', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@MaintenanceBagianGambar');
Route::get('InputJadwalKonstruksi', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@InputJadwal');
Route::get('EditJam', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditJamkerja');
Route::get('EditPerWorkStation', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditPerWorkStation');
Route::get('EditPerOrderkonstruksi', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditPerOrder');
Route::get('EditEstimasiTanggal', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditEstimasiTanggal');
Route::get('EditEstimasiWaktu', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditEstimasiWaktu');
Route::get('FinishJadwalKonstruksi', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@FinishJadwalKonstruksi');
Route::get('DeleteJadwalPerWorkStation', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@DeleteJadwalPerWorkStation');
Route::get('DeleteJadwalPerOrder', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@DeleteJadwalPerOrder');
#gps2
Route::get('MaintenanceMaterialType', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@MaintenanceMaterialType');
Route::get('MaintenanceMaterialType', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@MaintenanceMaterialType');
Route::get('MaintenanceBagianBarang', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@MaintenanceBagianBarang');
Route::get('InputJadwal', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@InputJadwal');
Route::get('EditJamKerja', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@EditJamKerja');
Route::get('EditPerMesin', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@EditPerMesin');
Route::get('EditPerOrder', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@EditPerOrder');
#Workshop
Route::get('Workshop', 'App\Http\Controllers\HomeController@Workshop');
