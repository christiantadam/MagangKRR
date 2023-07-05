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
Route::get('MaintenanceBank', 'App\Http\Controllers\Accounting\Master\MaintenanceBankController@index');
Route::get('MaintenanceMataUang', 'App\Http\Controllers\Accounting\Master\MaintenanceMataUangController@index');
Route::get('MaintenanceStatusSupplier', 'App\Http\Controllers\Accounting\Master\MaintenanceStatusSupplierController@index');

Route::get('MaintenancePenagihan', 'App\Http\Controllers\Accounting\Hutang\MaintenancePenagihanController@index');
Route::get('BatalPenagihan', 'App\Http\Controllers\Accounting\Hutang\BatalPenagihanController@index');
Route::get('UpdatePIB', 'App\Http\Controllers\Accounting\Hutang\UpdatePIBController@index');
Route::get('ACCSerahTerimaPenagihan', 'App\Http\Controllers\Accounting\Hutang\ACCSerahTerimaPenagihanController@index');
Route::get('PenagihandiRETUR', 'App\Http\Controllers\Accounting\Hutang\PenagihandiRETURController@index');
Route::get('PelunasanHutang', 'App\Http\Controllers\Accounting\Hutang\PelunasanHutangController@index');