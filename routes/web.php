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
Route::get('AdStar', 'App\Http\Controllers\AdStarController\AdStar@index');
Route::get('AdStarHome', 'App\Http\Controllers\AdStarController\AdStarHome@index');
Route::get('CpTbl', 'App\Http\Controllers\AdStarController\CpTbl@index');
Route::resource('HslPrdPrs', App\Http\Controllers\AdStarController\HslPrdPrs::class);
Route::get('MnOrdPrs', 'App\Http\Controllers\AdStarController\MnOrdPrs@index');
Route::resource('StpOrdPrs', App\Http\Controllers\AdStarController\StpOrdPrs::class);
Route::get('UpKdBrng', 'App\Http\Controllers\AdStarController\UpKdBrng@index');
Route::get('PrintTbl', 'App\Http\Controllers\AdStarController\PrintTbl@index');
Route::get('OpnTop', 'App\Http\Controllers\AdStarController\OpnTop@index');
Route::get('ClsTop', 'App\Http\Controllers\AdStarController\ClsTop@index');

//route barcode
Route::get('Barcode', 'App\Http\Controllers\BarcodeAdStarController\Barcode@index');
Route::get('Schedule', 'App\Http\Controllers\BarcodeAdStarController\Schedule@index');
Route::get('BtBrcd', 'App\Http\Controllers\BarcodeAdStarController\BtBrcd@index');
Route::get('Repress', 'App\Http\Controllers\BarcodeAdStarController\Repress@index');
Route::get('CtkBrcdRsk', 'App\Http\Controllers\BarcodeAdStarController\CtkBrcdRsk@index');
Route::get('DftPlt', 'App\Http\Controllers\BarcodeAdStarController\DftPlt@index');
Route::get('HngsBrcd', 'App\Http\Controllers\BarcodeAdStarController\HngsBrcd@index');
Route::get('KrmGdng', 'App\Http\Controllers\BarcodeAdStarController\KrmGdng@index');
Route::get('BtlKrm', 'App\Http\Controllers\BarcodeAdStarController\BtlKrm@index');
Route::get('KnvGdng', 'App\Http\Controllers\BarcodeAdStarController\KnvGdng@index');
Route::get('HslBrcd', 'App\Http\Controllers\BarcodeAdStarController\HslBrcd@index');
