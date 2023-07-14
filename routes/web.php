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

Route::get('MaintenanceBKMPenagihan', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@MaintenanceBKMPenagihan');
Route::get('BKMNoPenagihan', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@BKMNoPenagihan');
Route::get('CreateBKM', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@CreateBKM');
Route::get('UpdateDetailBKM', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@UpdateDetailBKM');
Route::get('BKMTransitorisBank', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@BKMTransitorisBank');
Route::get('BatalBKMTransitoris', 'App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController@BatalBKMTransitoris');
Route::get('BKMBKKPembulatan', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@BKMBKKPembulatan');
Route::get('BKMDPPelunasan', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@BKMDPPelunasan');
Route::get('BKMBKKNotaKredit', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@BKMBKKNotaKredit');
Route::get('BKMLC', 'App\Http\Controllers\Accounting\Piutang\BKMLCController@BKMLC');
Route::get('BKMPengembalianKE', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@BKMPengembalianKE');
Route::get('UpdateKursBKM', 'App\Http\Controllers\Accounting\Piutang\UpdateKursBKMController@UpdateKursBKM');
Route::get('KodePerkiraanBKM', 'App\Http\Controllers\Accounting\Piutang\KodePerkiraanBKMController@KodePerkiraanBKM');
Route::get('MaintenanceInformasiBank', 'App\Http\Controllers\Accounting\Piutang\InformasiBank\MaintenanceInformasiBankController@MaintenanceInformasiBank');
Route::get('AnalisaInformasiBank', 'App\Http\Controllers\Accounting\Piutang\InformasiBank\AnalisaInformasiBankController@AnalisaInformasiBank');
Route::get('FakturUangMuka', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@FakturUangMuka');
Route::get('PenagihanPenjualan', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@PenagihanPenjualan');
Route::get('NotaPenjualanTunai', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@NotaPenjualanTunai');
Route::get('UpdateSuratJalan', 'App\Http\Controllers\Accounting\Piutang\UpdateSuratJalanController@UpdateSuratJalan');
Route::get('ACCPenagihanPenjualan', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@ACCPenagihanPenjualan');
Route::get('StatusDokumenTagihan', 'App\Http\Controllers\Accounting\Piutang\StatusDokumenTagihanController@StatusDokumenTagihan');
Route::get('PenagihanPenjualanEkspor', 'App\Http\Controllers\Accounting\Piutang\PenagihanPenjualanEksporController@PenagihanPenjualanEkspor');
Route::get('ACCPenagihanPenjualanExport', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanExportController@ACCPenagihanPenjualanExport');
Route::get('MaintenancePelunasanPenjualan', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@MaintenancePelunasanPenjualan');