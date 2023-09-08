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
Route::resource('CpTbl', App\Http\Controllers\AdStarController\CpTbl::class);
Route::resource('HslPrdPrs', App\Http\Controllers\AdStarController\HslPrdPrs::class);
Route::resource('MnOrdPrs', App\Http\Controllers\AdStarController\MnOrdPrs::class);
Route::resource('StpOrdPrs', App\Http\Controllers\AdStarController\StpOrdPrs::class);
Route::resource('UpKdBrng', App\Http\Controllers\AdStarController\UpKdBrng::class);
Route::resource('PrintTbl', App\Http\Controllers\AdStarController\PrintTbl::class);
Route::resource('OpnTop', App\Http\Controllers\AdStarController\OpnTop::class);
Route::resource('ClsTop', App\Http\Controllers\AdStarController\ClsTop::class);

//route barcode
Route::resource('Barcode', App\Http\Controllers\BarcodeAdStarController\Barcode::class);
Route::resource('Schedule', App\Http\Controllers\BarcodeAdStarController\Schedule::class);
Route::resource('BtBrcd', App\Http\Controllers\BarcodeAdStarController\BtBrcd::class);
Route::resource('Repress', App\Http\Controllers\BarcodeAdStarController\Repress::class);
Route::resource('CtkBrcdRsk', App\Http\Controllers\BarcodeAdStarController\CtkBrcdRsk::class);
Route::resource('DftPlt', App\Http\Controllers\BarcodeAdStarController\DftPlt::class);
Route::resource('HngsBrcd', App\Http\Controllers\BarcodeAdStarController\HngsBrcd::class);
Route::resource('KrmGdng', App\Http\Controllers\BarcodeAdStarController\KrmGdng::class);
Route::resource('BtlKrm', App\Http\Controllers\BarcodeAdStarController\BtlKrm::class);
Route::resource('KnvGdng', App\Http\Controllers\BarcodeAdStarController\KnvGdng::class);
Route::resource('HslBrcd', App\Http\Controllers\BarcodeAdStarController\HslBrcd::class);
