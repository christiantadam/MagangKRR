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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('Contoh', 'App\Http\Controllers\HomeController@Contoh');
Route::get('ProgramContoh', 'App\Http\Controllers\Contoh\Transaksi\ContohController@index');

// Payroll
Route::get('Payroll', 'App\Http\Controllers\Payroll\HomeController@index');

// Payroll Master
Route::get('ProgramPayroll/Master/Karyawan/Harian', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanHarianController@index');
Route::get('ProgramPayroll/Master/Karyawan/Keluarga', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@index');
Route::get('ProgramPayroll/Master/Divisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@index');
Route::get('ProgramPayroll/Master/SettingDivisi/Harian', 'App\Http\Controllers\Payroll\Master\SettingDivisi\HarianController@index');
Route::get('ProgramPayroll/Master/SettingDivisi/Staff', 'App\Http\Controllers\Payroll\Master\SettingDivisi\StaffController@index');
Route::get('ProgramPayroll/Master/Nomer', 'App\Http\Controllers\Payroll\Master\Nomer\NomerController@index');
Route::get('ProgramPayroll/Master/Kartu', 'App\Http\Controllers\Payroll\Master\Kartu\KartuController@index');
Route::get('ProgramPayroll/Master/SettingShift', 'App\Http\Controllers\Payroll\Master\SettingShift\SettingShiftController@index');
Route::get('ProgramPayroll/Master/Klinik', 'App\Http\Controllers\Payroll\Master\Klinik\KlinikController@index');

// Payroll Agenda
Route::get('ProgramPayroll/Agenda/AgendaMasuk/Jam', 'App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaJamController@index');
Route::get('ProgramPayroll/Agenda/AgendaMasuk/Shift', 'App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaShiftController@index');
Route::get('ProgramPayroll/Agenda/TambahAgenda', 'App\Http\Controllers\Payroll\Agenda\TambahAgenda\TambahAgendaController@index');
Route::get('ProgramPayroll/Agenda/UbahAgenda', 'App\Http\Controllers\Payroll\Agenda\UbahAgenda\UbahAgendaController@index');
Route::get('ProgramPayroll/Agenda/HariBesar', 'App\Http\Controllers\Payroll\Agenda\HariBesar\HariBesarController@index');
Route::get('ProgramPayroll/Agenda/GantiShift/Aturan1', 'App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift1Controller@index');
Route::get('ProgramPayroll/Agenda/GantiShift/Aturan2', 'App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift2Controller@index');
Route::get('ProgramPayroll/Agenda/KoreksiShift', 'App\Http\Controllers\Payroll\Agenda\KoreksiShift\KoreksiShiftController@index');
Route::get('ProgramPayroll/Agenda/InsertPegawaiBaru', 'App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaPegawaiBaruController@index');
Route::get('ProgramPayroll/Agenda/InsertSupervisor', 'App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaSupervisorController@index');

// Payroll Maintenance
Route::get('ProgramPayroll/Angsuran/Hutang', 'App\Http\Controllers\Payroll\Angsuran\MaintenanceHarian\HutangController@index');
Route::get('ProgramPayroll/Angsuran/HutangHarian', 'App\Http\Controllers\Payroll\Angsuran\MaintenancePerusahaan\HutangHarianController@index');


// Payroll Maintenance
Route::get('ProgramPayroll/Maintenance/Fik', 'App\Http\Controllers\Payroll\Maintenance\Fik\FikController@index');
Route::get('ProgramPayroll/Maintenance/Fkik', 'App\Http\Controllers\Payroll\Maintenance\Fkik\FkikController@index');



