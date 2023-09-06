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

// Barcode Kerta 2
Route::resource('Schedule', App\Http\Controllers\ABM\BarcodeKerta\ScheduleController::class);
Route::post('Schedule/destroySelected', 'ABM\BarcodeKerta\ScheduleController@destroy')->name('Schedule.destroySelected');
// Route::get('/ABM/BarcodeKerta/Schedule', 'App\Http\Controllers\ABM\BarcodeKerta\ScheduleController@index');
Route::resource('BuatBarcode', App\Http\Controllers\ABM\BarcodeKerta\BuatBarcodeController::class);
// Route::get('/ABM/BarcodeKerta/BuatBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\BuatBarcodeController@index');
Route::resource('Repress', App\Http\Controllers\ABM\BarcodeKerta\RepressController::class);
// Route::get('/ABM/BarcodeKerta/Repress', 'App\Http\Controllers\ABM\BarcodeKerta\RepressController@index');
Route::resource('CBR', App\Http\Controllers\ABM\BarcodeKerta\CBRController::class);
// Route::get('/ABM/BarcodeKerta/CBR', 'App\Http\Controllers\ABM\BarcodeKerta\CBRController@index');
Route::resource('HanguskanBarcode', App\Http\Controllers\ABM\BarcodeKerta\HanguskanBarcodeController::class);
// Route::post('HanguskanBarcode/updateStatusType', 'ABM\BarcodeKerta\HanguskanBarcodeController@updateStatusType')->name('HanguskanBarcode.updateStatusType');
// Route::get('/ABM/BarcodeKerta/HanguskanBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\HanguskanBarcodeController@index');
Route::resource('KirimGudang', App\Http\Controllers\ABM\BarcodeKerta\KirimGudangController::class);
// Route::get('/ABM/BarcodeKerta/KirimGudang', 'App\Http\Controllers\ABM\BarcodeKerta\KirimGudangController@index');
Route::resource('BatalKirim', App\Http\Controllers\ABM\BarcodeKerta\BatalKirimController::class);
// Route::get('/ABM/BarcodeKerta/BatalKirim', 'App\Http\Controllers\ABM\BarcodeKerta\BatalKirimController@index');
Route::resource('CekBarcode', App\Http\Controllers\ABM\BarcodeKerta\CekBarcodeController::class);
// Route::get('/ABM/BarcodeKerta/CekBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\CekBarcodeController@index');
Route::resource('CSJ', App\Http\Controllers\ABM\BarcodeKerta\CSJController::class);
// Route::get('/ABM/BarcodeKerta/CSJ', 'App\Http\Controllers\ABM\BarcodeKerta\CSJController@index');
Route::resource('TotalBarcode', App\Http\Controllers\ABM\BarcodeKerta\TotalBarcodeController::class);
// Route::get('/ABM/BarcodeKerta/TotalBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\TotalBarcodeController@index');

Route::resource('/ABM/PermohonanPenerimaBarang', App\Http\Controllers\ABM\PermohonanPenerimaBarangController::class);
// Route::get('/ABM/PermohonanPenerimaBarang', 'App\Http\Controllers\ABM\PermohonanPenerimaBarangController@index');
Route::resource('/ABM/ScanBarcode', App\Http\Controllers\ABM\ScanBarcodeController::class);
// Route::get('/ABM/ScanBarcode', 'App\Http\Controllers\ABM\ScanBarcodeController@index');
Route::resource('/ABM/Scan', App\Http\Controllers\ABM\ScanController::class);
// Route::get('/ABM/Scan', 'App\Http\Controllers\ABM\ScanController@index');
Route::resource('/ABM/PilihJenisRepress', App\Http\Controllers\ABM\PilihJenisRepressController::class);
// Route::get('/ABM/PilihJenisRepress', 'App\Http\Controllers\ABM\PilihJenisRepressController@index');

Route::get('/ABM/BalJadiPalet', 'App\Http\Controllers\ABM\BalJadiPaletController@index');
Route::get('/ABM/PaletJadiBal', 'App\Http\Controllers\ABM\PaletJadiBalController@index');
Route::get('/ABM/Konversi', 'App\Http\Controllers\ABM\KonversiController@index');
Route::get('/ABM/PrintUlang', 'App\Http\Controllers\ABM\PrintUlangController@index');



// Barcode Roll Woven
Route::get('/ABM/BarcodeRollWoven/BuatBarcode', 'App\Http\Controllers\ABM\BarcodeRoll\BuatBarcode2Controller@index');
Route::get('/ABM/BarcodeRollWoven/BRS', 'App\Http\Controllers\ABM\BarcodeRoll\BRSController@index');
Route::get('/ABM/BarcodeRollWoven/BBJ', 'App\Http\Controllers\ABM\BarcodeRoll\BBJController@index');
Route::get('/ABM/BarcodeRollWoven/CBR', 'App\Http\Controllers\ABM\BarcodeRoll\CBR2Controller@index');
Route::get('/ABM/BarcodeRollWoven/HanguskanBarcode', 'App\Http\Controllers\ABM\BarcodeRoll\HanguskanBarcode2Controller@index');
Route::get('/ABM/BarcodeRollWoven/KirimGudang', 'App\Http\Controllers\ABM\BarcodeRoll\KirimGudang2Controller@index');
Route::get('/ABM/BarcodeRollWoven/KirimCircular', 'App\Http\Controllers\ABM\BarcodeRoll\KirimCircularController@index');
Route::get('/ABM/BarcodeRollWoven/BatalKirim', 'App\Http\Controllers\ABM\BarcodeRoll\BatalKirim2Controller@index');
Route::get('/ABM/BarcodeRollWoven/Repress', 'App\Http\Controllers\ABM\BarcodeRoll\Repress2Controller@index');
Route::get('/ABM/BarcodeRollWoven/CekBarcode', 'App\Http\Controllers\ABM\BarcodeRoll\CekBarcode2Controller@index');
Route::get('/ABM/BarcodeRollWoven/Penghanguskan', 'App\Http\Controllers\ABM\BarcodeRoll\PenghanguskanController@index');
Route::get('/ABM/BarcodeRollWoven/SettingTimbangan', 'App\Http\Controllers\ABM\BarcodeRoll\SettingTimbanganController@index');
Route::get('/ABM/BarcodeRollWoven/MSD', 'App\Http\Controllers\ABM\BarcodeRoll\MSDController@index');

Route::get('/ABM/ScanMutasiSatuDivisi', 'App\Http\Controllers\ABM\ScanMutasiSatuDivisiController@index');
Route::resource('MutasiSatuDivisi', App\Http\Controllers\ABM\MutasiSatuDivisiController::class);
// Route::get('/ABM/MutasiSatuDivisi', 'App\Http\Controllers\ABM\MutasiSatuDivisiController@index');
Route::get('/ABM/AccPermohonanSatuDivisi', 'App\Http\Controllers\ABM\AccPermohonanSatuDivisiController@index');


// Laporan Serah Terima
Route::resource('/ABM/LST', App\Http\Controllers\ABM\LSTController::class);
// Route::get('/ABM/LST', 'App\Http\Controllers\ABM\LSTController@index');

// Route::get('/ABM/Schedule', 'App\Http\Controllers\ABM@Schedule');
// Route::get('/ABM/Buat-Barcode', 'App\Http\Controllers\ABM@BuatBarcode');
// Route::get('/ABM/Repress', 'App\Http\Controllers\ABM@Repress');
// Route::get('/ABM/CBR', 'App\Http\Controllers\ABM@CBR');
// Route::get('/ABM/Hanguskan-Barcode', 'App\Http\Controllers\ABM@HanguskanBarcode');
// Route::get('/ABM/Kirim-Gudang', 'App\Http\Controllers\ABM@KirimGudang');
// Route::get('/ABM/Batal-Kirim', 'App\Http\Controllers\ABM@BatalKirim');
// Route::get('/ABM/Cek-Barcode', 'App\Http\Controllers\ABM@CekBarcode');
// Route::get('/ABM/CSJ', 'App\Http\Controllers\ABM@CSJ');
// Route::get('/ABM/Total-Barcode', 'App\Http\Controllers\ABM@TotalBarcode');

// // ========================================================

// Route::get('/ABM/Buat-Barcode2', 'App\Http\Controllers\ABM@BuatBarcode2');
// Route::get('/ABM/BRS', 'App\Http\Controllers\ABM@BRS');
// Route::get('/ABM/BBJ', 'App\Http\Controllers\ABM@BBJ');
// Route::get('/ABM/CBR2', 'App\Http\Controllers\ABM@CBR2');
// Route::get('/ABM/Hanguskan-Barcode2', 'App\Http\Controllers\ABM@HanguskanBarcode2');
// Route::get('/ABM/Kirim-Gudang2', 'App\Http\Controllers\ABM@KirimGudang2');
// Route::get('/ABM/Kirim-Circular', 'App\Http\Controllers\ABM@KirimCircular');
// Route::get('/ABM/Batal-Kirim2', 'App\Http\Controllers\ABM@BatalKirim2');
// Route::get('/ABM/Repress2', 'App\Http\Controllers\ABM@Repress2');
// Route::get('/ABM/Cek-Barcode2', 'App\Http\Controllers\ABM@CekBarcode2');
// Route::get('/ABM/Penghangusan-Barcode', 'App\Http\Controllers\ABM@Penghanguskan');
// Route::get('/ABM/Setting-Timbangan', 'App\Http\Controllers\ABM@SettingTimbangan');
// Route::get('/ABM/MSD', 'App\Http\Controllers\ABM@MSD');

// // ========================================================

// Route::get('/ABM/LST', function () {
//     return view ('LST');
// });
