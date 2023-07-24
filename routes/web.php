<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extruder\ExtruderController;
use App\Http\Controllers\Extruder\ExtruderNet\MasterController;

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

Route::get('/Extruder/ExtruderNet/{formName?}', [MasterController::class, 'index']);

#region ExtruderNet - Master

Route::get(
    '/ExtruderNet/getIdKomposisi/{id_divisi}/{id_komposisi?}',
    [MasterController::class, 'getIdKomposisi']
);

Route::get(
    '/ExtruderNet/getKelompokUtama/{id_objek}/{type?}',
    [MasterController::class, 'getKelompokUtama']
);

Route::get(
    '/ExtruderNet/getKelompok/{id_kelompok_utama}/{type?}',
    [MasterController::class, 'getKelompok']
);

Route::get(
    '/ExtruderNet/getSubKelompok/{id_kelompok}',
    [MasterController::class, 'getSubKelompok']
);

Route::get(
    '/ExtruderNet/getType/{id_sub_kelompok}',
    [MasterController::class, 'getType']
);

#endregion