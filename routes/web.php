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
#home Workshop
Route::get('HomeWorkshop', 'App\Http\Controllers\HomeController@HomeWorkshop');
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
Route::get('EditEstimasiTanggalPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@EditEstimasiTanggal');
Route::get('EditEstimasiWaktuPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@EditEstimasiWaktu');
Route::get('EditJumlahBarang', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@EditJumlahBarang');
Route::get('FinishJadwalPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@FinishJadwal');
Route::get('DeletePerMesin', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@DeletePerMesin');
Route::get('DeletePerOrder', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@DeletePerOrder');
Route::get('BiayaProsesMakloon', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@BiayaProsesMakloon');
Route::get('HargaMaterial', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@HargaMaterial');
Route::get('MaintenanceDataSPart', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@MaintenanceDataSpart');
Route::get('NomorOrderKerjaProyek', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@NomorOrderKerjaProyek');
Route::get('DataPerencanaan', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@DataPerencanaan');
Route::get('DataSelesai', 'App\Http\Controllers\WORKSHOP\Gps\JadwalPengerjaanController@DataSelesai');

#gps3
Route::get('JadwalPerWorkStation', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@JadwalPerWorkStation');
Route::get('JadwalPerOder', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@JadwalPerOrder');
Route::get('DaftarOrderGambar', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@DaftarOrderGambar');
Route::get('DaftarEstimasiJadwal', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@DaftarEstimasiJadwal');
Route::get('GrafikWorkStation', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@GrafikWorkStation');
Route::get('JadwalKonstruksiPerBulan', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@JadwalKonstruksiPerBulan');
Route::get('HistoriProsesKonstruksi', 'App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksiController@HistoriProsesKonstruksi');
#gps4
Route::get('JadwalPerMesinPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@JadwalPerMesinPengerjaan');
Route::get('JadwalPerOrderPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@JadwalPerOrderPengerjaan');
Route::get('DaftarOrderKerjaProyek', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@DaftarOrderKerjaProyek');
Route::get('EDMCNC', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@EDMCNC');
Route::get('DrillMillScrap', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@DrillMillScrap');
Route::get('MesinGrinding', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@MesinGrinding');
Route::get('MesinLas', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@MesinLas');
Route::get('PunchInjectCasting', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@PunchInjectCasting');
Route::get('Turning', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@Turning');
Route::get('Finishing', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@Finishing');
Route::get('ProsesMakloon', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@Makloon');
Route::get('PengerjaanPerOrder', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@PengerjaanPerOrder');
Route::get('PengerjaanPerBulan', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@PengerjaanPerBulan');
Route::get('HistoriProsesPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@HistoriProsesPengerjaan');
Route::get('DaftarSPerPart', 'App\Http\Controllers\WORKSHOP\Gps\InformasiPengerjaanController@DaftarSPerPart');

#gps - Laporan
Route::get('OrderPengerjaanMasuk', 'App\Http\Controllers\WORKSHOP\Gps\LaporanController@OrderPengerjaanMasuk');
Route::get('HasilPengerjaan', 'App\Http\Controllers\WORKSHOP\Gps\LaporanController@HasilPengerjaan');

#Workshop
Route::get('Workshop', 'App\Http\Controllers\HomeController@Workshop');

// Workshop - Master
Route::resource('MaintenanceDivisi', App\Http\Controllers\WORKSHOP\Workshop\Master\MaintenanceDivisiController::class);
Route::resource('MaintenanceDrafter', App\Http\Controllers\WORKSHOP\Workshop\Master\MaintenanceDrafterController::class);
Route::resource('UpdateNoGambar', App\Http\Controllers\WORKSHOP\Workshop\Master\UpdateNoGambarController::class);
Route::resource('MaintenanceMesin', App\Http\Controllers\WORKSHOP\Workshop\Master\MaintenanceMesinController::class);

Route::get('getdata/{id}', 'App\Http\Controllers\WORKSHOP\Workshop\Master\UpdateNoGambarController@Getdata');
Route::get('getmesin/{id}', 'App\Http\Controllers\WORKSHOP\Workshop\Master\MaintenanceMesinController@getmesin');


// Workshop - Transaksi
Route::get('MaintenanceOrderGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@MaintenanceOrderGambar');
Route::get('ACCManagerGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@ACCManagerGambar');
Route::get('ACCDirekturGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@ACCDirekturGambar');
Route::get('PenerimaOrderGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@PenerimaOrderGambar');
Route::get('ProsesPembeliGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@ProsesPembeliGambar');
Route::get('StatusOrderGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@StatusOrderGambar');
Route::get('MaintenanceNomorGambar', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@MaintenanceNomorGambar');
Route::get('MaintenanceOrderKerja', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@MaintenanceOrderKerja');
Route::get('ACCManagerKerja', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@ACCManagerKerja');
Route::get('ACCDirekturKerja', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@ACCDirekturKerja');
Route::get('PenerimaOrderKerja', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@PenerimaOrderKerja'); // Last
Route::get('CetakSuratOrderKerja', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@CetakSuratOrderKerja');
Route::get('StatusOrderKerja', 'App\Http\Controllers\WORKSHOP\Workshop\TransaksiController@StatusOrderKerja');

// Workshop - Proyek
Route::get('MaintenanceOrderProyek', 'App\Http\Controllers\WORKSHOP\Workshop\ProyekController@MaintenanceOrderProyek');
Route::get('ACCManagerProyek', 'App\Http\Controllers\WORKSHOP\Workshop\ProyekController@ACCManagerProyek');
Route::get('ACCDirekturProyek', 'App\Http\Controllers\WORKSHOP\Workshop\ProyekController@ACCDirekturProyek');
Route::get('PenerimaOrderProyek', 'App\Http\Controllers\WORKSHOP\Workshop\ProyekController@PenerimaOrderProyek');
Route::get('CetakSuratOrderProyek', 'App\Http\Controllers\WORKSHOP\Workshop\ProyekController@CetakSuratOrderProyek');
Route::get('StatusOrderProyek', 'App\Http\Controllers\WORKSHOP\Workshop\ProyekController@StatusOrderProyek');

// Workshop - Informasi
Route::get('OrderGambarSelesai', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@OrderGambarSelesai');
Route::get('OrderKerjaSelesai', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@OrderKerjaSelesai');
Route::get('OrderProyekSelesai', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@OrderProyekSelesai');
Route::get('NomorGambar', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@NomorGambar');
Route::get('OrderGambar', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@OrderGambar');
Route::get('OrderKerja', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@OrderKerja');
Route::get('OrderProyek', 'App\Http\Controllers\WORKSHOP\Workshop\InformasiController@OrderProyek');
