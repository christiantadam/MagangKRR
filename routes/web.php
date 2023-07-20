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
Route::get('CpTbl', 'App\Http\Controllers\AdStarController\CpTbl@index');
Route::get('HslPrdPrs', 'App\Http\Controllers\AdStarController\HslPrdPrs@index');
Route::get('MnOrdPrs', 'App\Http\Controllers\AdStarController\MnOrdPrs@index');
Route::get('StpOrdPrs', 'App\Http\Controllers\AdStarController\StpOrdPrs@index');
Route::get('UpKdBrng', 'App\Http\Controllers\AdStarController\UpKdBrng@index');
Route::get('PrintTbl', 'App\Http\Controllers\AdStarController\PrintTbl@index');

//route barcode
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
