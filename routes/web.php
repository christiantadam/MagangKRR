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

Route::get('/AdStar', function () {
    return view ('AdStar');
});

Route::get('/UpKdBrng', function () {
    return view ('UpKdBrng');
});

Route::get('/HslPrdPrs', function () {
    return view ('HslPrdPrs');
});

Route::get('/MnOrdPrs', function () {
    return view ('MnOrdPrs');
});

Route::get('/StpOrdPrs', function () {
    return view ('StpOrdPrs');
});

Route::get('/CpTbl', function () {
    return view ('CpTbl');
});

Route::get('/bntkez', function () {
    return view ('bntkez');
});
