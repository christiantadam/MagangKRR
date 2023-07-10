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

Route::get('Accounting', 'App\Http\Controllers\HomeController@Accounting');
Route::get('MaintenanceBank', 'App\Http\Controllers\Accounting\Master\MaintenanceBankController@MaintenanceBank');
Route::get('MaintenanceMataUang', 'App\Http\Controllers\Accounting\Master\MaintenanceMataUangController@MaintenanceMataUang');
Route::get('MaintenanceStatusSupplier', 'App\Http\Controllers\Accounting\Master\MaintenanceStatusSupplierController@MaintenanceStatusSupplier');

Route::get('MaintenancePenagihan', 'App\Http\Controllers\Accounting\Hutang\MaintenancePenagihanController@MaintenancePenagihan');
Route::get('BatalPenagihan', 'App\Http\Controllers\Accounting\Hutang\BatalPenagihanController@BatalPenagihan');
Route::get('UpdatePIB', 'App\Http\Controllers\Accounting\Hutang\UpdatePIBController@UpdatePIB');
Route::get('ACCSerahTerimaPenagihan', 'App\Http\Controllers\Accounting\Hutang\ACCSerahTerimaPenagihanController@ACCSerahTerimaPenagihan');
Route::get('PenagihandiRETUR', 'App\Http\Controllers\Accounting\Hutang\PenagihandiRETURController@PenagihandiRETUR');
Route::get('PelunasanHutang', 'App\Http\Controllers\Accounting\Hutang\PelunasanHutangController@PelunasanHutang');
Route::get('MaintenanceJurnalBeli', 'App\Http\Controllers\Accounting\Hutang\MaintenanceJurnalBeliController@MaintenanceJurnalBeli');
Route::get('RekapHutang', 'App\Http\Controllers\Accounting\Hutang\RekapHutangController@RekapHutang');
Route::get('PenyesuaianSaldoSupplier', 'App\Http\Controllers\Accounting\Hutang\PenyesuaianSaldoSupplierController@PenyesuaianSaldoSupplier');
Route::get('PengajuanBKK', 'App\Http\Controllers\Accounting\Hutang\PengajuanBKKController@PengajuanBKK');
Route::get('ACCBKK', 'App\Http\Controllers\Accounting\Hutang\ACCBKKController@ACCBKK');
Route::get('MaintenanceBKK', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKKController@MaintenanceBKK');
Route::get('MaintenanceTTKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceTTKRR1Controller@MaintenanceTTKRR1');
Route::get('ACCBayarTT', 'App\Http\Controllers\Accounting\Hutang\ACCBayarTTController@ACCBayarTT');
Route::get('MaintenanceBKKKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKKKRR1Controller@MaintenanceBKKKRR1');
Route::get('MaintenanceBKMKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKMKRR1Controller@MaintenanceBKMKRR1');
Route::get('KodePerkiraanBKK', 'App\Http\Controllers\Accounting\Hutang\KodePerkiraanBKKController@KodePerkiraanBKK');
Route::get('MaintenanceKursBKK', 'App\Http\Controllers\Accounting\Hutang\MaintenanceKursBKKController@MaintenanceKursBKK');
Route::get('BatalBKK', 'App\Http\Controllers\Accounting\Hutang\BatalBKKController@BatalBKK');
Route::get('UraianBKK', 'App\Http\Controllers\Accounting\Hutang\UraianBKKController@UraianBKK');

Route::get('MaintenanceBKMPenagihan', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@index');
Route::get('BKMNoPenagihan', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@index');
Route::get('CreateBKM', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@index');
Route::get('UpdateDetailBKM', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@UpdateDetailBKM');
Route::get('BKMTransitorisBank', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@BKMTransitorisBank');