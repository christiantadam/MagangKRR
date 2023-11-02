<?php

use App\Http\Controllers\Extruder\BeratKomposisi\BeratController;
use App\Http\Controllers\Extruder\BeratKomposisi\KomposisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extruder\ExtruderController;
use App\Http\Controllers\Extruder\ExtruderNet\BenangController;
use App\Http\Controllers\Extruder\ExtruderNet\KonversiController;
use App\Http\Controllers\Extruder\ExtruderNet\MasterController;
use App\Http\Controllers\Extruder\ExtruderNet\OrderController;
use App\Http\Controllers\Extruder\ExtruderNet\PencatatanController;
use App\Http\Controllers\Extruder\WarehouseTerima\WarehouseController;
use App\Http\Controllers\ABM\BarcodeRoll\SettingTimbanganController;

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

Route::get('Accounting', 'App\Http\Controllers\HomeController@Accounting');
#region Maintenance Bank
// Route::get('MaintenanceBank', 'App\Http\Controllers\Accounting\Master\MaintenanceBankController@');
Route::get('detailbank/{idBank}', 'App\Http\Controllers\Accounting\Master\MaintenanceBankController@getDataBank');
Route::get('detailkodeperkiraan/{kodePerkiraan}', 'App\Http\Controllers\Accounting\Master\MaintenanceBankController@getKodePerkiraan');
Route::resource('MaintenanceBank', App\Http\Controllers\Accounting\Master\MaintenanceBankController::class);
#endregion

#region Maintenance Mata Uang
Route::get('detailmatauang/{idMataUang}', 'App\Http\Controllers\Accounting\Master\MaintenanceMataUangController@getDataMataUang');
Route::resource('MaintenanceMataUang', App\Http\Controllers\Accounting\Master\MaintenanceMataUangController::class);
#endregion

#region Maintenance Status Supplier
Route::get('detailStatusSupplier/{idSupplier}', 'App\Http\Controllers\Accounting\Master\MaintenanceStatusSupplierController@getDataMataUang');
Route::resource('MaintenanceStatusSupplier', App\Http\Controllers\Accounting\Master\MaintenanceStatusSupplierController::class);
Route::get('getTabelStatusSupplier', 'App\Http\Controllers\Accounting\Master\MaintenanceStatusSupplierController@getTabel');
#endregion

#region Maintenance Penagihan
//Route::get('detailSupplier/{idSupplier}', 'App\Http\Controllers\Accounting\Hutang\MaintenancePenagihanController@getDataSupplier');
Route::resource('MPIsiDetail', App\Http\Controllers\Accounting\Hutang\MPIsiDetailController::class);
Route::post('handle_form_submission_faktur', 'IsiDeatilFakturPajak@handleFormSubmission');
Route::get('detaildivisi/{idDivisi}', 'App\Http\Controllers\Accounting\Hutang\MPIsiDetailController@getDataDivisi');
Route::get('detailtabelpo/{noPO}', 'App\Http\Controllers\Accounting\Hutang\MPIsiDetailController@getTabelPO');
Route::resource('MaintenancePenagihan', App\Http\Controllers\Accounting\Hutang\MaintenancePenagihanController::class);
#endregion

#region Maintenance Batal Penagihan
Route::resource('BatalPenagihan', App\Http\Controllers\Accounting\Hutang\BatalPenagihanController::class);
Route::get('detailpenagihan/{idPenagihan}', 'App\Http\Controllers\Accounting\Hutang\BatalPenagihanController@getDataPenagihan');
#endregion

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

#region Maintenance TT KRR1
Route::resource('MaintenanceTTKRR1', App\Http\Controllers\Accounting\Hutang\MaintenanceTTKRR1Controller::class);
Route::get('getSupplierTTKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceTTKRR1Controller@getSupplierTTKRR1');
Route::get('getTabelListDetailBrg/{idSupplier}', 'App\Http\Controllers\Accounting\Hutang\MaintenanceTTKRR1Controller@getTabelListDetailBrg');
#endregion

Route::get('ACCBayarTT', 'App\Http\Controllers\Accounting\Hutang\ACCBayarTTController@ACCBayarTT');
Route::get('MaintenanceBKKKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKKKRR1Controller@MaintenanceBKKKRR1');
Route::get('MaintenanceBKMKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKMKRR1Controller@MaintenanceBKMKRR1');

#region Kode Perkiraan BKK
Route::resource('KodePerkiraanBKK', App\Http\Controllers\Accounting\Hutang\KodePerkiraanBKKController::class);
Route::get('getIdBKKKdPrk/{BlnThn}', 'App\Http\Controllers\Accounting\Hutang\KodePerkiraanBKKController@getIdBKKKdPrk');
Route::get('getIdBKKKdPrk2/{BlnThn}', 'App\Http\Controllers\Accounting\Hutang\KodePerkiraanBKKController@getIdBKKKdPrk2');
Route::get('getTabelRincianBKK/{idBKK}', 'App\Http\Controllers\Accounting\Hutang\KodePerkiraanBKKController@getTabelRincianBKK');
#endregion

Route::get('MaintenanceKursBKK', 'App\Http\Controllers\Accounting\Hutang\MaintenanceKursBKKController@MaintenanceKursBKK');

#region Batal BKK
Route::resource('BatalBKK', App\Http\Controllers\Accounting\Hutang\BatalBKKController::class);
Route::get('getIdBKKBesar/{bulanTahun}', 'App\Http\Controllers\Accounting\Hutang\BatalBKKController@getIdBKKBesar');
Route::get('getIdBKKKecil/{bulanTahun}', 'App\Http\Controllers\Accounting\Hutang\BatalBKKController@getIdBKKKecil');
Route::get('getListBKKBtlBKK/{idBKKSelect}', 'App\Http\Controllers\Accounting\Hutang\BatalBKKController@getListBKKBtlBKK');
Route::get('getCheckBtlBKK/{idBKKSelect}', 'App\Http\Controllers\Accounting\Hutang\BatalBKKController@getCheckBtlBKK');
#endregion

#region Uraian BKK
Route::resource('UraianBKK', App\Http\Controllers\Accounting\Hutang\UraianBKKController::class);
Route::get('getCheckBKKIdBKK/{idBKK}', 'App\Http\Controllers\Accounting\Hutang\UraianBKKController@getCheckBKKIdBKK');
Route::get('getListBKK/{idBKK}', 'App\Http\Controllers\Accounting\Hutang\UraianBKKController@getListBKK');
Route::get('getListBKKTotalIdBKK/{idBKK}', 'App\Http\Controllers\Accounting\Hutang\UraianBKKController@getListBKKTotalIdBKK');
#endregion

#region Maintenance BKM Penagihan
Route::resource('MaintenanceBKMPenagihan', App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController::class);
Route::get('detailtabelpenagihan/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelPelunasan');
Route::get('detailbank', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getDataBank');
Route::get('tabeldetailpelunasan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelDetailPelunasan');
Route::get('detailkodeperkiraan/{kode}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getKodePerkiraan');
Route::get('tabelkuranglebih/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelKurangLebih');
Route::get('getTabelTampilBKMPenagihan/{tanggalInputTampil}/{tanggalInputTampil2}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelTampilBKMPenagihan');
Route::get('tabelbiaya/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelBiaya');
Route::get('cekNoPelunasanBKMPenagihan/{idPelunasan}/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@cekNoPelunasanBKMPenagihan');
Route::get('cekJumlahRincianBKMPenagihan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@cekJumlahRincianBKMPenagihan');
Route::post('insertUpdateBKMPenagihan/groupbkm', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@insertUpdateBKMPenagihan');
Route::get('getCetakBKMNoPenagihan/{idBKMInput}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getCetakBKMNoPenagihan');
Route::get('getCetakBKMJumlahPelunasan/{idBKMInput}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getCetakBKMJumlahPelunasan');
// Route::get('prosesSisaPiutang/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@prosesSisaPiutang');
#endregion

#region Maintenance BKM No Penagihan
Route::resource('BKMNoPenagihan', App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController::class);
Route::get('detailcustomer/{kode?}', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getNamaCustomer');
Route::get('detailmatauang/', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getMataUang');
Route::get('detailbank', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getDataBank');
Route::get('jenispembayaran', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getJenisPembayaran');
Route::get('detailkodeperkiraan/{kode}', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getKodePerkiraan');
Route::get('detailjenisbank/{idBank}', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getJenisBank');
Route::get('getidbkm/{idBank}/{tanggalInput}', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getUraianEnter');
Route::get('tabeltampilbkm/{tanggalInputTampil}/{tanggalInputTampil2}', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@getTabelTampilBKM');
//Route::get('BKMNoPenagihan', 'App\Http\Controllers\Accounting\Piutang\BKMNoPenagihanController@BKMNoPenagihan');
#endregion

#region Create BKM
Route::resource('CreateBKM', App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController::class);
Route::get('detailtabelpelunasan2/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@getTabelPelunasan');
Route::get('detailkodeperkiraan/{kode}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@getKodePerkiraan');
Route::get('detailjenisbankk/{idBank}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@getJenisBank');
Route::get('tabeltampilbkm/{tanggalInputTampil}/{tanggalInputTampil2}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@getTabelTampilBKM');
Route::get('getJenisBankCreateBKM/{idBank}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@getJenisBankCreateBKM');
Route::post('insertUpdateCreateBKM', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@insertUpdateCreateBKM');
Route::post('insertUpdateCreateBKM2', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@insertUpdateCreateBKM2');
Route::get('getCetak/{idBKMInput}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\CreateBKMController@getCetak');
#endregion


#region Update Detail BKM
Route::resource('UpdateDetailBKM', App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController::class);
Route::get('tabeldatapelunasan/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelPelunasan');
Route::get('cektabelpelunasan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@cekTabelPelunasan');
Route::get('tabeldetpelunasan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelDetailPelunasan');
Route::get('tabeldetkuranglebih/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelKurangLebih');
Route::get('dettabelkuranglebih/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelKurangLebih');
Route::get('dettabelbiaya/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelBiaya');
Route::get('tabeltampilbkmcashadv/{tanggalInputTampil}/{tanggalInputTampil2}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelTampilBKM');
Route::get('getCetakUpdateDetailBKM/{idBKMInput}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getCetakUpdateDetailBKM');
#endregion

#region BKM Transitoris Bank
Route::resource('BKMTransitorisBank', App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController::class);
Route::get('getmatauang', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getMataUang');
Route::get('getbank', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getBank');
Route::get('getjenispembayaran', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getJenisPembayaran');
Route::get('getkodeperkiraan', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getKodePerkiraan');
Route::get('getidbkk/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getUraianEnter');
Route::get('getidbkmtransitoris/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getUraianEnterBKM');
Route::get('tabeltampilbkmtransitoris/{tanggalInputTampilBKM}/{tanggalInputTampilBKM2}', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getTabelTampilBKM');
Route::get('tabeltampilbkktransitoris/{tanggalInputTampilBKK}/{tanggalInputTampilBKK2}', 'App\Http\Controllers\Accounting\Piutang\BKMTransitorisBankController@getTabelTampilBKK');
#endregion

#region Batal BKM Transitoris
Route::resource('BatalBKMTransitoris', App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController::class);
Route::get('getIdBKMBatal3/{bulanTahun}', 'App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController@getIdBKM3');
Route::get('getIdBKMBatal4/{bulanTahun}', 'App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController@getIdBKM4');
Route::get('getDataBatalBKM/{idBKM}', 'App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController@getDataBKM');
Route::get('cekBatalBKK/{idBKM}', 'App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController@cekBatalBKK');
Route::delete('deletedata/{idBKM}/{alasan}', 'App\Http\Controllers\Accounting\Piutang\BatalBKMTransitorisController@hapus');
#endregion

#region BKM BKK Pembulatan
Route::resource('BKMBKKPembulatan', App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController::class);
Route::get('tabeldetailbkmbkk/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getTabelPelunasan');
Route::get('tabeldetbiayabkmbkk/{idBKM}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getTabelDetailBiaya');
Route::get('getBankPembulatan', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getBankPembulatan');
Route::get('getJenisBankPembulatan/{idBank}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getJenisBankPembulatan');
Route::get('getIDBKK/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getIDBKK');
Route::get('getTabelTampilBKKPembulatan/{tanggalInputTampilBKK}/{tanggalInputTampilBKK2}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getTabelTampilBKKPembulatan');
Route::post('insertUpdate', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@insertUpdate');
Route::get('getCetakBKMBKKPembulatan/{idBKKTampil}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKPembulatanController@getCetakBKMBKKPembulatan');
#endregion

#region BKM DP Pelunasan
Route::resource('BKMDPPelunasan', App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController::class);
Route::get('getcust/', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getNamaCustomer');
Route::get('getTabelPelunasanBKMDP/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getTabelDataPelunasan');
Route::get('getidbkmBKMDP/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getUraianEnterBKM');
Route::get('getTabelTampilBKMDP/{tanggalTampilBKM}/{tanggalTampilBKM2}', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getTabelTampilBKM');
Route::get('getTabelTampilBKKDP/{tanggalTampilBKK}/{tanggalTampilBKK2}', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getTabelTampilBKK');
Route::get('getidbkmBKMDP/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getUraianEnterBKM');
Route::get('getIdPembayaran', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getIdPembayaran');
Route::get('getIdPelunasan', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getIdPelunasan');
Route::get('getidbkmBKKDP/{idBankBKK}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMDPPelunasanController@getUraianEnterBKK');
#endregion

#region BKM BKK Nota Kredit
Route::resource('BKMBKKNotaKredit', App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController::class);
Route::get('getTabelNotaKredit', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getDataNotaKredit');
Route::get('getidBKMNota/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getUraianEnterBKM');
Route::get('getidBKKNota/{idBank}/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getUraianEnterBKK');
Route::get('getTabelTampilBKKNota/{tanggalTampilBKK}/{tanggalTampilBKK2}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getTabelTampilBKK');
Route::get('getTabelTampilBKMNota/{tanggalTampilBKM}/{tanggalTampilBKM2}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getTabelTampilBKM');
Route::get('getIdPelunasanNota', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getIdPelunasan');
Route::get('getIdPembayaranNota', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getIdPembayaran');
Route::get('getCetakBKMBKKNotaKredit/{idBKMTampil}', 'App\Http\Controllers\Accounting\Piutang\BKMBKKNotaKreditController@getCetakBKMBKKNotaKredit');
#endregion

Route::resource('BKMLC', App\Http\Controllers\Accounting\Piutang\BKMLCController::class);
Route::get('getListPelunasanDollar/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\BKMLCController@getListPelunasanDollar');

#region BKM Pengembalian KE
Route::resource('BKMPengembalianKE', App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController::class);
Route::get('getcustomer/', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getNamaCustomer');
Route::get('getjenispembayaran', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getJenisPembayaran');
Route::get('getidbkmke/{idBank}/{tanggalInput}', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getUraianBKMEnter');
Route::get('getidbkkke/{idBank}/{tanggalInput}', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getUraianBKKEnter');
Route::get('getTabelTampilBKMKE/{tanggalTampilBKM}/{tanggalTampilBKM2}', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getTabelTampilBKM');
Route::get('getTabelTampilBKKKE/{tanggalTampilBKK}/{tanggalTampilBKK2}', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getTabelTampilBKK');
Route::get('getIdPembayaranKE', 'App\Http\Controllers\Accounting\Piutang\BKMPengembalianKEController@getIdPembayaran');
#endregion

#region Update Kurs BKM
Route::resource('UpdateKursBKM', App\Http\Controllers\Accounting\Piutang\UpdateKursBKMController::class);
Route::get('tabelpelunasankurs/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\UpdateKursBKMController@getTabelPelunasan');
#endregion

#region Maintenance Kode Perkiraan BKM
Route::resource('KodePerkiraanBKM', App\Http\Controllers\Accounting\Piutang\KodePerkiraanBKMController::class);
Route::get('getIdBKMBatal5/{BlnThn}', 'App\Http\Controllers\Accounting\Piutang\KodePerkiraanBKMController@getIdBKM5');
Route::get('getIdBKMBatal6/{BlnThn}', 'App\Http\Controllers\Accounting\Piutang\KodePerkiraanBKMController@getIdBKM6');
Route::get('getlistrincian/{idBKM}', 'App\Http\Controllers\Accounting\Piutang\KodePerkiraanBKMController@getTabelRincian');
#endregion

#region Maintenance Informasi Bank
Route::resource('MaintenanceInformasiBank', App\Http\Controllers\Accounting\Piutang\InformasiBank\MaintenanceInformasiBankController::class);
Route::get('getTabelInformasiBank/{tanggal}', 'App\Http\Controllers\Accounting\Piutang\InformasiBank\MaintenanceInformasiBankController@getTabelInfoBank');
#endregion

#region Analisa Informasi Bank
Route::resource('AnalisaInformasiBank', App\Http\Controllers\Accounting\Piutang\InformasiBank\AnalisaInformasiBankController::class);
Route::get('getTabelAnalisis/{tanggal}/{tanggal2}/{radiogrup}', 'App\Http\Controllers\Accounting\Piutang\InformasiBank\AnalisaInformasiBankController@getTabelAnalisis');
#endregion

#region Faktur Uang Muka
Route::resource('FakturUangMuka', App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController::class);
Route::get('getNoPenagihan/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getNoPenagihan');
Route::get('getJenisCustomer/{idJenisCustomer}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getJenisCustomer');
Route::get('getAlamatCust/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getAlamatCust');
Route::get('getNoSP/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getNomorSP');
Route::get('getNomorPO/{noSP}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getNomorPO');
Route::get('getUserPenagih', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getUserPenagih');
Route::get('getJenisPajak', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getJenisPajak');
Route::get('getDokumen/{kode}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getDokumen');
Route::get('DataPenagihanF/{IdPenagihan}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getDataPenagihan');
#endregion

#region Penagihan Penjualan
Route::resource('PenagihanPenjualan', App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController::class);
Route::get('getCustomerr', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@getCustomer');
Route::get('getCustomer', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@getCustomerKoreksi');
Route::get('getNoPenagihanUM/{noSP}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@getNoPenagihanUM');
Route::get('getSuratJalan/{noSP}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@getSuratJalan');
Route::get('getNoPenagihanPenjualan/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@getNoPenagihan');
Route::get('DataPenagihanPenjualan/{IdPenagihan}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@getDataPenagihan');
Route::get('LihatPenagihan/{idJenisPajak}/{IdPenagihan}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\PenagihanPenjualanController@LihatPenagihan');
#endregion

#region Nota Penjualan Tunai
Route::resource('NotaPenjualanTunai', App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController::class);
Route::get('getLihatPesanan/{noSP}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getLihatPesanan');
Route::get('getNotaJualTunai/{noSP}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getNotaJualTunai');
Route::get('getNotaJualTunai2/{noSP}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getNotaJualTunai2');
Route::get('getUserPenagihNota', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getUserPenagihNota');
Route::get('getJenisPajakNota', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getJenisPajakNota');
Route::get('getNoPenagihanUMNota/{noSP}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getNoPenagihanUMNota');
Route::get('getNoPenagihanNota', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getNoPenagihan');
Route::get('getJenisCust/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getJenisCust');
Route::get('getJnsCust/{idJenisCustomer}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getJnsCust');
Route::get('getLihatSP/{idNoPenagihan}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getLihatSP');
Route::get('getDataSP/{noSP}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getDataSP');
Route::get('getLihatPenagihan/{idNoPenagihan}', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@getLihatPenagihan');
#endregion

#region Update Surat Jalan
Route::resource('UpdateSuratJalan', App\Http\Controllers\Accounting\Piutang\UpdateSuratJalanController::class);
Route::get('getTabelSuratJalan', 'App\Http\Controllers\Accounting\Piutang\UpdateSuratJalanController@getTabelSuratJalan');
#endregion

#region ACC Penagihan Penjualan
Route::resource('ACCPenagihanPenjualan', App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController::class);
Route::get('getDisplayHeader', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@getDisplayHeader');
Route::get('getDisplayDetail/{idPenagihan}', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@getDisplayDetail');
Route::get('getDisplaySuratJalan/{idPenagihan}', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@getDisplaySuratJalan');
Route::get('accCheckCtkSJ/{idPenagihan}', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@accCheckCtkSJ');
Route::get('accCheckCtkSP/{idPenagihan}', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@accCheckCtkSP');
#endregion

#region Status Dokumen Tagihan
Route::resource('StatusDokumenTagihan', App\Http\Controllers\Accounting\Piutang\StatusDokumenTagihanController::class);
Route::get('getCust', 'App\Http\Controllers\Accounting\Piutang\StatusDokumenTagihanController@getCust');
Route::get('getTabelStatusDokumen/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\StatusDokumenTagihanController@getTabelStatusDokumen');
Route::get('getDataStatusDokumen', 'App\Http\Controllers\Accounting\Piutang\StatusDokumenTagihanController@getDataStatusDokumen');
#endregion

#region Penagihan Penjualan Ekspor
Route::resource('ACCPenagihanPenjualanExport', App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanExportController::class);
Route::get('getTabelPenagihanEx', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanExportController@getTabelPenagihanEx');
Route::get('getDetailPenagihanEx/{idPenagihan}', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanExportController@getDetailPenagihanEx');
#endregion

#region Penagihan Penjualan Ekspor
Route::resource('PenagihanPenjualanExport', App\Http\Controllers\Accounting\Piutang\PenagihanPenjualanExportController::class);
Route::get('getCustomerEx', 'App\Http\Controllers\Accounting\Piutang\PenagihanPenjualanExportController@getCustomerEx');
Route::get('getSuratJalanEx/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\PenagihanPenjualanExportController@getSuratJalanEx');
#endregion

#region Maintenance Pelunasan Penjualan
Route::resource('MaintenancePelunasanPenjualan', App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController::class);
Route::get('getCustIsi', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getCustIsi');
Route::get('getCustKoreksi', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getCustKoreksi');
Route::get('getJenisPembayaran', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getJenisPembayaran');
Route::get('getReferensiBank/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getReferensiBank');
Route::get('getDataRefBank/{idReferensi}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getDataRefBank');
Route::get('getListPenagihanSJ/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getListPenagihanSJ');
Route::get('getListPelunasanTagihan/{noPen}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getListPelunasanTagihan');
Route::get('getKdPerkiraan', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getKdPerkiraan');
Route::get('getListPelunasan/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getListPelunasan');
Route::get('getDataPelunasanTagihan/{IdPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getDataPelunasanTagihan');
Route::get('LihatDetailPelunasan/{IdPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@LihatDetailPelunasan');
Route::get('getCekReferensiPelunasan/{IdPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@getCekReferensiPelunasan');
#endregion

#region Pelunasan Penjualan Cash Advance
Route::resource('PelunasanPenjualanCashAdvance', App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController::class);
Route::get('getCustIsiCashAdvance', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@getCustIsiCashAdvance');
Route::get('getNoPelunasanCashAdvance/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@getNoPelunasanCashAdvance');
Route::get('LihatHeaderPelunasanCashAdvance/{noPelunasan}', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@LihatHeaderPelunasanCashAdvance');
Route::get('LihatDetailPelunasanCashAdvance/{noPelunasan}', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@LihatDetailPelunasanCashAdvance');
Route::get('getLihat_PenagihanCashAdvance/{noPen}', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@getLihat_PenagihanCashAdvance');
Route::get('getLihat_PenagihanCashAdvance2/{noPen}', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@getLihat_PenagihanCashAdvance2');
#endregion

#region Analisa Status Penjualan
Route::resource('AnalisaStatusPenjualan', App\Http\Controllers\Accounting\Piutang\AnalisaStatusPenjualanController::class);
Route::get('getDisplaySuratJalan/{tanggal}/{tanggal2}', 'App\Http\Controllers\Accounting\Piutang\AnalisaStatusPenjualanController@getDisplaySuratJalan');
#endregion

#region Nota Kredit Retur
Route::resource('NotaKreditRetur', App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\NotaKreditReturController::class);
Route::get('getCustNotaKredit', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\NotaKreditReturController@getCustNotaKredit');
Route::get('getListSJNotaKredit/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\NotaKreditReturController@getListSJNotaKredit');
Route::get('getLihat_PenagihanNotaKredit/{idCustomer}/{MIdRetur}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\NotaKreditReturController@getLihat_PenagihanNotaKredit');
#endregion

Route::get('PotHarga', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\PotHargaController@PotHarga');
Route::get('Free', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\FreeController@Free');

#region Kelebihan Bayar Jual Tunai
Route::resource('KelebihanBayarJualTunai', App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\KelebihanBayarJualTunaiController::class);
Route::get('getCustKelebihanBayar', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\KelebihanBayarJualTunaiController@getCustKelebihanBayar');
Route::get('getListNotaKreditKelebihanBayar', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\KelebihanBayarJualTunaiController@getListNotaKreditKelebihanBayar');
#endregion

Route::get('SelisihTimbang', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\SelisihTimbangController@SelisihTimbang');

#region ACC Nota Kredit
Route::resource('ACCNotaKredit', App\Http\Controllers\Accounting\Piutang\ACCNotaKreditController::class);
#endregion

Route::get('getTabelHeaderACCNotaKredit', 'App\Http\Controllers\Accounting\Piutang\ACCNotaKreditController@getTabelHeaderACCNotaKredit');
Route::get('getDetailHeaderACCNotaKredit/{idNotaKredit}', 'App\Http\Controllers\Accounting\Piutang\ACCNotaKreditController@getDetailHeaderACCNotaKredit');
Route::get('getDetailHeaderACCNotaKredit2/{idNotaKredit}', 'App\Http\Controllers\Accounting\Piutang\ACCNotaKreditController@getDetailHeaderACCNotaKredit2');

#region Pengajuan
Route::resource('Pengajuan', App\Http\Controllers\Accounting\Piutang\MaintenanceBKKNotaKredit\PengajuanController::class);
Route::get('loadDataNotaK', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKKNotaKredit\PengajuanController@loadDataNotaK');
Route::get('getJenisBayarPenagajuan', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKKNotaKredit\PengajuanController@getJenisBayarPenagajuan');
Route::get('getBankPengajuan', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKKNotaKredit\PengajuanController@getBankPengajuan');
#endregion

Route::get('BKK', 'App\Http\Controllers\Accounting\TransBank\BKKController@BKK');
Route::get('BKM', 'App\Http\Controllers\Accounting\TransBank\BKMController@BKM');

Route::get('CekNotadanFaktur', 'App\Http\Controllers\Accounting\Informasi\CekNotadanFakturController@CekNotadanFaktur');
Route::get('CetakNotaKredit', 'App\Http\Controllers\Accounting\Informasi\CetakNotaKreditController@CetakNotaKredit');
Route::get('Soplang', 'App\Http\Controllers\Accounting\Informasi\SoplangController@Soplang');
Route::get('RekapPiutang', 'App\Http\Controllers\Accounting\Informasi\RekapPiutangController@RekapPiutang');
Route::get('KartuHutang', 'App\Http\Controllers\Accounting\Informasi\KartuHutangController@KartuHutang');
// Payroll Main
Route::get('Payroll', 'App\Http\Controllers\Payroll\HomeController@index');
Route::resource('CobaCoba', App\Http\Controllers\CobacobaController::class);
// Payroll Master
Route::resource('ProgramPayroll/KaryawanHarian', App\Http\Controllers\Payroll\Master\Karyawan\KaryawanHarianController::class);
Route::resource('ProgramPayroll/KaryawanKeluarga', App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController::class);
Route::resource('ProgramPayroll/MasterNomer', App\Http\Controllers\Payroll\Master\Nomer\NomerController::class);
Route::resource('ProgramPayroll/MasterKartu', App\Http\Controllers\Payroll\Master\Kartu\KartuController::class);
Route::resource('ProgramPayroll/settingDivisiHarian', App\Http\Controllers\Payroll\Master\SettingDivisi\HarianController::class);
Route::resource('ProgramPayroll/settingDivisiStaff', App\Http\Controllers\Payroll\Master\SettingDivisi\StaffController::class);
Route::resource('ProgramPayroll/settingShift', App\Http\Controllers\Payroll\Master\SettingShift\SettingShiftController::class);
Route::resource('ProgramPayroll/MasterKlinik', App\Http\Controllers\Payroll\Master\Klinik\KlinikController::class);
Route::resource('ProgramPayroll/Master/Divisi', App\Http\Controllers\Payroll\Master\Divisi\DivisiController::class);
Route::post('ProgramPayroll/Master/insertDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@InsertDivisi');
Route::post('ProgramPayroll/Master/updateDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@UpdateDivisi');
Route::post('ProgramPayroll/Master/deleteDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@deleteDivisi');

//Payroll Agenda
Route::resource('ProgramPayroll/AgendaMasuk/Jam', App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaJamController::class);
Route::resource('ProgramPayroll/AgendaMasuk/AgendaShift', App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaShiftController::class);
Route::resource('ProgramPayroll/TambahAgenda', App\Http\Controllers\Payroll\Agenda\TambahAgenda\TambahAgendaController::class);
Route::resource('ProgramPayroll/UbahAgenda', App\Http\Controllers\Payroll\Agenda\UbahAgenda\UbahAgendaController::class);
Route::resource('ProgramPayroll/HariBesar', App\Http\Controllers\Payroll\Agenda\HariBesar\HariBesarController::class);
Route::resource('ProgramPayroll/InsertSupervisor', App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaSupervisorController::class);
Route::resource('ProgramPayroll/InsertPegawaiBaru', App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaPegawaiBaruController::class);
Route::resource('ProgramPayroll/KoreksiShift', App\Http\Controllers\Payroll\Agenda\KoreksiShift\KoreksiShiftController::class);
Route::resource('ProgramPayroll/GantiShift/Aturan1_3', App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift1Controller::class);
Route::resource('ProgramPayroll/GantiShift/Aturan2', App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift2Controller::class);
//Payroll Transaksi
Route::resource('ProgramPayroll/AbsenSimpang', App\Http\Controllers\Payroll\Transaksi\AbsenSimpang\AbsenSimpangController::class);
Route::resource('ProgramPayroll/Kontrak', App\Http\Controllers\Payroll\Transaksi\Kontrak\KontrakController::class);
Route::resource('ProgramPayroll/KoreksiAbsen', App\Http\Controllers\Payroll\Transaksi\KoreksiAbsen\KoreksiAbsenController::class);
Route::resource('ProgramPayroll/InputRange', App\Http\Controllers\Payroll\Transaksi\InputRange\InputRangeController::class);
Route::resource('ProgramPayroll/Lembur', App\Http\Controllers\Payroll\Transaksi\Lembur\LemburController::class);
Route::resource('ProgramPayroll/CheckClockError', App\Http\Controllers\Payroll\Transaksi\CheckClockError\CheckClockErrorController::class);
Route::resource('ProgramPayroll/CheckClockInOut', App\Http\Controllers\Payroll\Transaksi\CheckClockInOut\CheckClockInOutController::class);
Route::resource('ProgramPayroll/MaintenancePelatihan', App\Http\Controllers\Payroll\Transaksi\MaintenancePelatihan\MaintenancePelatihanController::class);
Route::resource('ProgramPayroll/MaintenanceKoreksi', App\Http\Controllers\Payroll\Transaksi\MaintenanceKoreksi\MaintenanceKoreksiController::class);
Route::resource('ProgramPayroll/Koperasi', App\Http\Controllers\Payroll\Transaksi\Koperasi\KoperasiController::class);
Route::resource('ProgramPayroll/MaintenanceResign', App\Http\Controllers\Payroll\Transaksi\MaintenanceResign\MaintenanceResignController::class);
Route::resource('ProgramPayroll/KenaikanUpah', App\Http\Controllers\Payroll\Transaksi\KenaikanUpah\KenaikanUpahController::class);
Route::resource('ProgramPayroll/Skorsing/PermohonanSkorsing', App\Http\Controllers\Payroll\Transaksi\Skorsing\Permohonan\PermohonanController::class);
Route::resource('ProgramPayroll/Skorsing/AccBayar', App\Http\Controllers\Payroll\Transaksi\Skorsing\AccBayar\AccBayarController::class);
Route::resource('ProgramPayroll/Peringatan/Permohonan', App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController::class);
Route::resource('ProgramPayroll/ProsesGajiStaff', App\Http\Controllers\Payroll\Transaksi\ProsesGaji\ProsesGajiController::class);
Route::resource('ProgramPayroll/Rekap', App\Http\Controllers\Payroll\Transaksi\RekapAbsenLembur\RekapAbsenLemburController::class);
Route::resource('ProgramPayroll/EstimasiGaji', App\Http\Controllers\Payroll\Transaksi\EstimasiGaji\EstimasiGajiController::class);
Route::resource('ProgramPayroll/HitGajiHarian', App\Http\Controllers\Payroll\Transaksi\HitGajiHarian\HitGajiHarianController::class);
Route::resource('ProgramPayroll/HitTHRHarian', App\Http\Controllers\Payroll\Transaksi\HitTHRHarian\HitTHRHarianController::class);
Route::resource('ProgramPayroll/InputCheckClock', App\Http\Controllers\Payroll\Transaksi\InputCheckClock\InputCheckClockController::class);
Route::resource('ProgramPayroll/TransferAbsen', App\Http\Controllers\Payroll\Transaksi\TransferAbsen\TransferAbsenController::class);
Route::resource('ProgramPayroll/VerifikasiAbsen', App\Http\Controllers\Payroll\Transaksi\VerifikasiAbsen\VerifikasiAbsenController::class);
Route::get('getPegawai/{Id_Div}', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController@getPegawai');
Route::resource('ProgramPayroll/Transaksi/InputLibur', App\Http\Controllers\Payroll\Transaksi\InputLibur\InputLiburController::class);
Route::resource('ProgramPayroll/Transaksi/Mutasi/Harian', App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiHarian\MutasiHarianController::class);
Route::resource('ProgramPayroll/Transaksi/Mutasi/Staff', App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiStaff\MutasiStaffController::class);
Route::resource('ProgramPayroll/Transaksi/Mutasi/Histori', App\Http\Controllers\Payroll\Transaksi\Mutasi\HistoriMutasi\HistoriMutasiController::class);
Route::resource('ProgramPayroll/Transaksi/Absen1', App\Http\Controllers\Payroll\Transaksi\Absen1\Absen1Controller::class);
Route::resource('ProgramPayroll/Peringatan/AccPermohonan', App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController::class);
Route::post('ProgramPayroll/Transaksi/Peringatan/AccPermohonan/proses-peringatan', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController@prosesPeringatan')->name('prosesPeringatan');

//Payroll Laporan
Route::resource('ProgramPayroll/LaporanAbnormal', App\Http\Controllers\Payroll\Laporan\Absen\LaporanAbnormal\LaporanAbnormalController::class);
Route::resource('ProgramPayroll/FormDaftarHadir', App\Http\Controllers\Payroll\Laporan\Staff\FormDaftarHadir\FormDaftarHadirController::class);
Route::get('ProgramPayroll/Laporan/Absen/DaftarLembur/getDataLembur', 'App\Http\Controllers\Payroll\Laporan\Absen\DaftarLemburSupervisor\DaftarLemburSupervisorController@getDataLembur')->name('getDataLembur');
Route::resource('ProgramPayroll/Laporan/DaftarLembur', App\Http\Controllers\Payroll\Laporan\Absen\DaftarLemburSupervisor\DaftarLemburSupervisorController::class);
Route::resource('ProgramPayroll/Laporan/RekapAbsen', App\Http\Controllers\Payroll\Laporan\Staff\AbsensiKaryawan\RekapAbsen\RekapAbsenController::class);
Route::resource('ProgramPayroll/Laporan/CetakDetailAbsen', App\Http\Controllers\Payroll\Laporan\Staff\AbsensiKaryawan\CetakDetailAbsen\CetakDetailAbsenController::class);
Route::resource('ProgramPayroll/Laporan/RekapPerolehanASI', App\Http\Controllers\Payroll\Laporan\Staff\AbsensiKaryawan\RekapPerolehanASI\RekapPerolehanASIController::class);
Route::resource('ProgramPayroll/Laporan/LemburPerDivisi', App\Http\Controllers\Payroll\Laporan\Staff\Lembur\LemburPerDivisi\LemburPerDivisiController::class);
Route::resource('ProgramPayroll/Laporan/LemburPerManager', App\Http\Controllers\Payroll\Laporan\Staff\Lembur\LemburPerManager\LemburPerManagerController::class);
Route::resource('ProgramPayroll/Laporan/DetailLembur', App\Http\Controllers\Payroll\Laporan\Staff\Lembur\DetailLembur\DetailLemburController::class);
Route::resource('ProgramPayroll/Laporan/KartuHutang', App\Http\Controllers\Payroll\Laporan\Staff\Hutang\KartuHutang\KartuHutangController::class);
Route::resource('ProgramPayroll/Laporan/HutangKoperasi', App\Http\Controllers\Payroll\Laporan\Staff\Hutang\HutangKoperasi\HutangKoperasiController::class);
Route::resource('ProgramPayroll/Laporan/AngsuranKoperasi', App\Http\Controllers\Payroll\Laporan\Staff\Hutang\AngsuranKoperasi\AngsuranKoperasiController::class);
Route::resource('ProgramPayroll/Laporan/DaftarPelunasan', App\Http\Controllers\Payroll\Laporan\Staff\Hutang\DaftarPelunasan\DaftarPelunasanController::class);
Route::resource('ProgramPayroll/Laporan/PotonganKoperasi', App\Http\Controllers\Payroll\Laporan\Staff\PotonganKoperasi\PotonganKoperasiController::class);
Route::resource('ProgramPayroll/Laporan/DaftarPotongan', App\Http\Controllers\Payroll\Laporan\Staff\DaftarPotongan\DaftarPotonganController::class);
Route::resource('ProgramPayroll/Laporan/JumlahPegawai', App\Http\Controllers\Payroll\Laporan\Staff\JumlahPegawai\JumlahPegawaiController::class);
Route::resource('ProgramPayroll/Laporan/AngsuranBajuSeragam', App\Http\Controllers\Payroll\Laporan\Staff\AngsuranBajuSeragam\AngsuranBajuSeragamController::class);
Route::resource('ProgramPayroll/Laporan/DaftarHadir', App\Http\Controllers\Payroll\Laporan\Harian\DaftarHadir\DaftarHadirController::class);
Route::resource('ProgramPayroll/Laporan/AbsensiPerHari', App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerHari\AbsensiPerHariController::class);
Route::resource('ProgramPayroll/Laporan/AbsensiPerMinggu', App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerMinggu\AbsensiPerMingguController::class);
Route::resource('ProgramPayroll/Laporan/AbsensiPerBulan', App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerBulan\AbsensiPerBulanController::class);
Route::resource('ProgramPayroll/Laporan/AbsensiPerTahun', App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerTahun\AbsensiPerTahunController::class);
Route::resource('ProgramPayroll/Laporan/UpahHarianManager', App\Http\Controllers\Payroll\Laporan\Harian\DaftarUpahHarian\UpahHarianManager\UpahHarianManagerController::class);
Route::resource('ProgramPayroll/Laporan/UpahHarianDivisi', App\Http\Controllers\Payroll\Laporan\Harian\DaftarUpahHarian\UpahHarianDivisi\UpahHarianDivisiController::class);
Route::resource('ProgramPayroll/Laporan/UpahPerManager', App\Http\Controllers\Payroll\Laporan\Harian\TandaTerimaUpahPegawai\UpahPerManager\UpahPerManagerController::class);
Route::resource('ProgramPayroll/Laporan/UpahPerDivisi', App\Http\Controllers\Payroll\Laporan\Harian\TandaTerimaUpahPegawai\UpahPerDivisi\UpahPerDivisiController::class);
Route::resource('ProgramPayroll/Laporan/UpahSkorsing', App\Http\Controllers\Payroll\Laporan\Harian\TandaTerimaUpahPegawai\UpahSkorsing\UpahSkorsingController::class);
Route::resource('ProgramPayroll/Laporan/LaporanUangMakanKecil', App\Http\Controllers\Payroll\Laporan\Harian\LaporanUangMakanKecil\LaporanUangMakanKecilController::class);
Route::resource('ProgramPayroll/Laporan/PembayaranPerManager', App\Http\Controllers\Payroll\Laporan\Harian\DaftarPembayaran\PembayaranPerManager\PembayaranPerManagerController::class);
Route::resource('ProgramPayroll/Laporan/SeluruhKaryawan', App\Http\Controllers\Payroll\Laporan\Harian\DaftarPembayaran\SeluruhKaryawan\SeluruhKaryawanController::class);
Route::resource('ProgramPayroll/Laporan/KaryawanSkorsing', App\Http\Controllers\Payroll\Laporan\Harian\DaftarPembayaran\KaryawanSkorsing\KaryawanSkorsingController::class);
Route::resource('ProgramPayroll/Laporan/DaftarTunjunganHaid', App\Http\Controllers\Payroll\Laporan\Harian\DaftarTunjunganHaid\DaftarTunjunganHaidController::class);
Route::resource('ProgramPayroll/Laporan/Slip', App\Http\Controllers\Payroll\Laporan\Harian\Slip\SlipController::class);
Route::resource('ProgramPayroll/Laporan/LaporanMingguanPerManager', App\Http\Controllers\Payroll\Laporan\Harian\LaporanLemburPerMinggu\LaporanMingguanManager\LaporanMingguanManagerController::class);
Route::resource('ProgramPayroll/Laporan/LaporanMingguanPerDivisi', App\Http\Controllers\Payroll\Laporan\Harian\LaporanLemburPerMinggu\LaporanMingguanDivisi\LaporanMingguanDivisiController::class);
Route::resource('ProgramPayroll/Laporan/LaporanPerDivisi', App\Http\Controllers\Payroll\Laporan\Harian\LaporanKhususPerManager\LaporanPerdivisi\LaporanPerDivisiController::class);
Route::resource('ProgramPayroll/Laporan/LaporanPerGroup', App\Http\Controllers\Payroll\Laporan\Harian\LaporanKhususPerManager\LaporanPerGroup\LaporanPerGroupController::class);
Route::resource('ProgramPayroll/Laporan/PerDivisiLembur', App\Http\Controllers\Payroll\Laporan\Harian\DaftarLembur\PerDivisiLembur\PerDivisiLemburController::class);
Route::resource('ProgramPayroll/Laporan/PerManagerLembur', App\Http\Controllers\Payroll\Laporan\Harian\DaftarLembur\PerManagerLembur\PerManagerLemburController::class);
Route::resource('ProgramPayroll/Laporan/JumlahPegawaiLemburPerManager', App\Http\Controllers\Payroll\Laporan\Harian\DaftarLembur\JPLPM\JPLPMController::class);
Route::resource('ProgramPayroll/Laporan/PegawaiPerDivisi', App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\PegawaiPerDivisi\PegawaiPerDivisiController::class);
Route::resource('ProgramPayroll/Laporan/PerPegawai', App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\PerPegawai\PerPegawaiController::class);
Route::resource('ProgramPayroll/Laporan/PegawaiPerBulan', App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\PegawaiPerBulan\PegawaiPerBulanController::class);
Route::resource('ProgramPayroll/Laporan/JumlahPerBulan', App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\JumlahPerBulan\JumlahPerBulanController::class);
Route::resource('ProgramPayroll/Laporan/PerPeriodik', App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DCS\PerPeriodik\PerPeriodikController::class);
Route::resource('ProgramPayroll/Laporan/PerDivisi', App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DCS\PerDivisi\PerDivisiController::class);
Route::resource('ProgramPayroll/Laporan/PerManager', App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DCS\PerManager\PerManagerController::class);
Route::resource('ProgramPayroll/Laporan/DaftarPegawaiTidakBeliSeragam', App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DPIBS\DPIBSController::class);
Route::resource('ProgramPayroll/Laporan/TandaTerimaPenerimaan', App\Http\Controllers\Payroll\Laporan\Harian\Seragam\TTP\TTPController::class);
Route::resource('ProgramPayroll/Laporan/DaftarGajiLamaBaru', App\Http\Controllers\Payroll\Laporan\Harian\DaftarGajiLamaBaru\DaftarGajiLamaBaruController::class);
Route::resource('ProgramPayroll/Laporan/PerMinggu', App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluarMutasi\PerMinggu\PerMingguController::class);
Route::resource('ProgramPayroll/Laporan/PerBulan', App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluarMutasi\PerBulan\PerBulanController::class);
Route::resource('ProgramPayroll/Laporan/KontrakPerBulan', App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluarMutasi\KontrakPerBulan\KontrakPerBulanController::class);
Route::resource('ProgramPayroll/Laporan/DaftarPegawaiMasukKeluar', App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluar\JumlahPegawaiMasukKeluarController::class);
Route::resource('ProgramPayroll/Laporan/JumlahPegawaiPerManager', App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiPerManager\JumlahPegawaiPerManagerController::class);
Route::resource('ProgramPayroll/Laporan/JumlahPegawaiKontrak', App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiKontrak\JumlahPegawaiKontrakController::class);
Route::resource('ProgramPayroll/Laporan/Daftar3BulanKerja', App\Http\Controllers\Payroll\Laporan\Harian\Daftar3BulanKerja\Daftar3BulanKerjaController::class);
Route::resource('ProgramPayroll/Laporan/Refrensi', App\Http\Controllers\Payroll\Laporan\Harian\Refrensi\RefrensiController::class);
Route::resource('ProgramPayroll/Laporan/DaftarTHRHarian', App\Http\Controllers\Payroll\Laporan\Harian\THR\DaftarTHRHarian\DaftarTHRHarianController::class);
Route::resource('ProgramPayroll/Laporan/TandaTerimaTHR', App\Http\Controllers\Payroll\Laporan\Harian\THR\TandaTerimaTHR\TandaTerimaTHRController::class);
Route::resource('ProgramPayroll/Laporan/RekapTHRHarian', App\Http\Controllers\Payroll\Laporan\Harian\THR\RekapTHRHarian\RekapTHRHarianController::class);
Route::resource('ProgramPayroll/Laporan/DaftarGoodWill', App\Http\Controllers\Payroll\Laporan\Harian\THR\DaftarGoodWill\DaftarGoodWillController::class);
Route::resource('ProgramPayroll/Laporan/RekapGoodWill', App\Http\Controllers\Payroll\Laporan\Harian\THR\RekapGoodWill\RekapGoodWillController::class);
Route::resource('ProgramPayroll/Laporan/TandaTerimaTHRLgkp', App\Http\Controllers\Payroll\Laporan\Harian\THR\TandaTerimaTHRLgkp\TandaTerimaTHRLgkpController::class);
Route::resource('ProgramPayroll/Laporan/DaftarTHRHarianLgkp', App\Http\Controllers\Payroll\Laporan\Harian\THR\DaftarTHRLgkp\DaftarTHRLgkpController::class);
Route::resource('ProgramPayroll/Laporan/SlipTHRHarian', App\Http\Controllers\Payroll\Laporan\Harian\THR\SlipTHRHarian\SlipTHRHarianController::class);
Route::resource('ProgramPayroll/Laporan/DCT', App\Http\Controllers\Payroll\Laporan\DaftarCutiTahunan\DCTController::class);
Route::resource('ProgramPayroll/Laporan/SPH', App\Http\Controllers\Payroll\Laporan\Koprasi\SlipPotonganHarian\SPHController::class);
Route::resource('ProgramPayroll/Laporan/SPS', App\Http\Controllers\Payroll\Laporan\Koprasi\SlipPotonganStaff\SPSController::class);


// Payroll Angsuran
Route::resource('ProgramPayroll/Angsuran/Hutang', App\Http\Controllers\Payroll\Angsuran\MaintenanceHarian\HutangController::class);
Route::resource('ProgramPayroll/Angsuran/HutangHarian', App\Http\Controllers\Payroll\Angsuran\MaintenancePerusahaan\HutangHarianController::class);
Route::resource('ProgramPayroll/Angsuran/AngsuranStaff', App\Http\Controllers\Payroll\Angsuran\AngsuranStaff\AHSController::class);
Route::resource('ProgramPayroll/Angsuran/AngsuranHutang', App\Http\Controllers\Payroll\Angsuran\AngsuranHutang\AngsuranHutangController::class);

// Payroll Maintenance
Route::resource('ProgramPayroll/Maintenance/Fik', App\Http\Controllers\Payroll\Maintenance\Fik\FikController::class);
Route::resource('ProgramPayroll/Maintenance/Fkik', App\Http\Controllers\Payroll\Maintenance\Fkik\FkikController::class);





Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('Contoh', 'App\Http\Controllers\HomeController@Contoh');
Route::get('ProgramContoh', 'App\Http\Controllers\Contoh\Transaksi\ContohController@index');
#home Workshop
Route::get('HomeWorkshop', 'App\Http\Controllers\HomeController@HomeWorkshop');
#GPS Jadwal Konstruksi
Route::get('gps', 'App\Http\Controllers\HomeController@GPS');

Route::resource('estimasiJadwal', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EstimasiJadwalController::class);
Route::get('CekEstimasiKonstruksi/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EstimasiJadwalController@CekEstimasiKonstruksi');
Route::get('LoadDataEstimasiJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EstimasiJadwalController@LoadData');
Route::get('GetTanggalEstimasiJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EstimasiJadwalController@GetTanggal');
Route::get('CekjadwalEstimasiJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EstimasiJadwalController@Cekjadwal');
Route::get('cektanggalEstimasiJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EstimasiJadwalController@cektanggal');



Route::resource('MaintenanceGambar', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\MaintenanceBagianGambarController::class);
Route::get('LoadDataMaintenanceGambar/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\MaintenanceBagianGambarController@LoadData');
Route::get('cekdataestimasiMaintenanceGambar/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\MaintenanceBagianGambarController@cekdataestimasi');
Route::get('cekdataMaintenanceGambar/{noOd}/{bagian}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\MaintenanceBagianGambarController@cekdata');
Route::get('GetdatabagianMaintenanceGambar/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\MaintenanceBagianGambarController@Getdatabagian');
Route::get('cekdatabagianMaintenanceGambar/{noOd}/{Idbag}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\MaintenanceBagianGambarController@cekdatabagian');

Route::resource('InputJadwalKonstruksi', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController::class);
Route::get('LoadDataInputJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@LoadData');
Route::get('cekdataestimasiInputJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@cekdataestimasi');
Route::get('GetdatabagianInputJadwal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@Getdatabagian');
Route::get('GetJamKerjaInputJadwal/{worksts}/{estDate}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@GetJamKerja');
Route::get('CekdatasudahadaInputJadwal/{idBagian}/{estDate}/{worksts}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@Cekdatasudahada');
Route::get('Cekestimasidatekonstruksi/{EstDate}/{worksts}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@Cekestimasidatekonstruksi');
Route::get('HitungSisaJamInputJadwalKons/{EstDate}/{worksts}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\InputJadwalController@HitungSisaJam');

Route::resource('EditJam', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJamKerjaOptimalController::class);
Route::get('HitungSisaJamEditJam/{EstDate}/{worksts}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJamKerjaOptimalController@HitungSisaJam');
Route::get('GetJamKerjaEditJam/{worksts}/{estDate}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJamKerjaOptimalController@GetJamKerja');

Route::resource('EditPerWorkStation', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerWorkStationController::class);
Route::get('NoAntriEditPerWorkstation/{worksts}/{date1}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerWorkStationController@NoAntri');
Route::get('getdatatableEditPerWorkstation/{noAntri}/{date}/{worksts}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerWorkStationController@getdatatable');

Route::resource('EditPerOrderkonstruksi', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerOrderController::class);
Route::get('LoadDataEditPerOrderKonstruksi/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerOrderController@LoadData');
Route::get('cekEstimasiKonstruksiEditPerOrderKonstruksi/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerOrderController@cekEstimasiKonstruksi');
Route::get('getDataTableEditPerOrderKonstruksi/{noOd}/{idBag}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditJadwalPerOrderController@getDataTable');

Route::resource('EditEstimasiTanggal', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiTanggalController::class);
Route::get('NOFINISHEditEstimasiJadwal/{worksts}/{date1}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiTanggalController@NOFINISH');
// Route::get('getdatatableEditEstimasiJadwal/{noAntri}/{date}/{worksts}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiTanggalController@getdatatable');
Route::get('cekestimasiEditEstimasiTanggal/{noOd}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiTanggalController@cekestimasi');
Route::get('cekestimasikonstruksiEditEstimasiTanggal/{noOd}/{newTgl}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiTanggalController@cekestimasikonstruksi');

Route::resource('EditEstimasiWaktu', App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiWaktuController::class);
Route::get('LoaddataEditEstimasiWaktu/{worksts}/{date1}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiWaktuController@Loaddata');
Route::get('hitungjamEditEstimasiWaktu/{EstDate}/{worksts}/{noQue}', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi\EditEstimasiWaktuController@hitungjam');


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
Route::resource('MaintenanceOrderGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderGambarController::class);
Route::get('getalldata/{tgl_awal}/{tgl_akhir}/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderGambarController@GetDataAll');
Route::get('GatDataForUserOrder/{tgl_awal}/{tgl_akhir}/{iduserOrder}/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderGambarController@GatDataForUserOrder');
Route::get('mesin/{idDivisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderGambarController@mesin');
Route::get('GetBarang/{KdBrg}/{IdDiv}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderGambarController@GetBarang');

Route::resource('ACCManagerGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCManagerGambarController::class);
Route::get('getalldatamanager/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCManagerGambarController@GetDataAll');

Route::resource('ACCDirekturGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCDirekturGambarController::class);
Route::get('getalldataDirektur/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCDirekturGambarController@GetAllData');

Route::resource('PenerimaOrderGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController::class);
Route::get('getalldataPenerimaGambar/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController@GetAllData');
Route::get('cekuser/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController@cekuser');
Route::get('cekuserkoreksi/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController@cekuserkoreksi');
Route::get('cekuserprosesmodal/{user}/{kode}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController@cekuserprosesmodal');
Route::get('ceknomorGambar/{nogambar}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController@ceknomorGambar');
Route::get('GetUserDrafterPenerimaOrderGambar/{noOd}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderGambarController@GetUserDrafter');



Route::resource('ProsesPembeliGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ProsesPembeliGambarController::class);
Route::get('getalldataPembeliGambar/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ProsesPembeliGambarController@GetAllData');
Route::get('GetDataModalPembeliGambar/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ProsesPembeliGambarController@GetDataModal');
Route::get('getdataprintGambar/{idorder}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ProsesPembeliGambarController@getdataprint');
Route::post('UpdateCetakpembeligambar', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ProsesPembeliGambarController@updatedatacetak');



Route::resource('StatusOrderGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\StatusOrderGambarController::class);
Route::get('getalldataStatusOrderGambar/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\StatusOrderGambarController@GetAllData');

Route::resource('MaintenanceKodeGambar', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceKodeBarangController::class);
Route::get('getbarangkodeGambar/{noOd}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceKodeBarangController@getbarang');
Route::get('selectnoGambar/{noOd}/{kode}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceKodeBarangController@selectnoGambar');

Route::resource('MaintenanceOrderKerja', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController::class);
Route::get('getalldatakerja/{tgl_awal}/{tgl_akhir}/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@GetDataAll');
Route::get('GatDataForUserOrderkerja/{tgl_awal}/{tgl_akhir}/{iduserOrder}/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@GatDataForUserOrder');
Route::get('LoadData1/{noGambar}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@LoadData1');
Route::get('LoadData2/{kdbarang}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@LoadData2');
Route::get('LoadData/{kdBarang}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@LoadData');
Route::get('Mesinmodal/{idDivisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@mesin');
Route::post('inputfile', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@inputfile');
Route::get('selectpdf/{kdBarang}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@selectpdf');
Route::post('updatefile', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\MaintenanceOrderKerjaController@updatepdf');

Route::resource('ACCManagerKerja', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCManagerKerjaController::class);
Route::get('getalldataACCManagerKerja/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCManagerKerjaController@GetDataAll');
Route::get('LoaddataACCManagerKerja/{id}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCManagerKerjaController@Loaddata');
Route::get('getsaldoACCManagerKerja/{kodebarang}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCManagerKerjaController@getsaldo');

Route::resource('ACCDirekturKerja', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCDirekturKerjaController::class);
Route::get('getalldataACCDirekturKerja/{tglawal}/{tglakhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCDirekturKerjaController@getalldata');
Route::get('getsaldoACCDirekturKerja/{kode}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCDirekturKerjaController@getdatasaldo');

Route::resource('ACCPPIC', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCPPICController::class);
Route::get('ACCCPPIC/{user}/{nomorOrder}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\ACCDirekturKerjaController@ACCCPPIC');


Route::resource('PenerimaOrderKerja', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderKerjaController::class);
Route::get('getalldataPenerimaOrderKerja/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderKerjaController@GetAllData');
Route::get('cekuserPenerimaOrderKerja/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderKerjaController@cekuser');
Route::get('cekuserkoreksiOrderKerja/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderKerjaController@cekuserkoreksi');
Route::get('namauserPenerimaOrderKerja/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderKerjaController@namauserPenerimaOrderKerja');
Route::get('LoadStokPenerimaOrderKerja/{kdbarang}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\PenerimaOrderKerjaController@LoadStok');

Route::resource('CetakSuratOrderKerja', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\CetakOrderKerjaController::class);
Route::get('getalldataCetakSuratOrderKerja/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\CetakOrderKerjaController@GetAllData');
Route::get('getdataprintCetakOrderKerja/{idorder}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\CetakOrderKerjaController@getdataprint');
Route::post('UpdateCetakSuratOrderKerja', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\CetakOrderKerjaController@updatedatacetak');

Route::resource('StatusOrderKerja', App\Http\Controllers\WORKSHOP\Workshop\Transaksi\StatusOrderKerjaController::class);
Route::get('getalldataStatusOrderKerja/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Transaksi\StatusOrderKerjaController@GetAllData');

// Workshop - Proyek
Route::resource('MaintenanceOrderProyek', App\Http\Controllers\WORKSHOP\Workshop\Proyek\MaintenanceOrderProyekController::class);
Route::get('GetDataAllMaintenanceOrderProyek/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\MaintenanceOrderProyekController@GetDataAll');
Route::get('GatDataForUserOrderMaintenanceOrderKerja/{tgl_awal}/{tgl_akhir}/{iduserOrder}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\MaintenanceOrderProyekController@GatDataForUserOrder');
Route::get('GetMesinMaintenanceOrderProyek/{idDivisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\MaintenanceOrderProyekController@GetMesin');
Route::get('GetDataTableMaintenanceOrderProyek/{noOrder}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\MaintenanceOrderProyekController@GetDataTable');

Route::resource('ACCManagerProyek', App\Http\Controllers\WORKSHOP\Workshop\Proyek\ACCManagerProyekController::class);
Route::get('GetDataAllACCManagerProyek/{divisi}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\ACCManagerProyekController@GetDataAll');
Route::get('GetDataTableACCManagerProyek/{idOrder}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\ACCManagerProyekController@GetDataTable');

Route::resource('ACCDirekturProyek', App\Http\Controllers\WORKSHOP\Workshop\Proyek\ACCDirekturProyekController::class);
Route::get('GetDataAllACCDirekturProyek/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\ACCDirekturProyekController@GetAllData');

Route::resource('PenerimaOrderProyek', App\Http\Controllers\WORKSHOP\Workshop\Proyek\PenerimaOrderProyekController::class);
Route::get('GetDataAllPenerimaOrderProyek/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\PenerimaOrderProyekController@GetAllData');
Route::get('cekuserPenerimaOrderGambar/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\PenerimaOrderProyekController@cekuser');
Route::get('namauserPenerimaOrderProyek/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\PenerimaOrderProyekController@namauserPenerimaOrderProyek');
Route::get('cekuserkoreksiPenerimaOrderProyek/{user}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\PenerimaOrderProyekController@cekuserkoreksi');

Route::resource('CetakSuratOrderProyek', App\Http\Controllers\WORKSHOP\Workshop\Proyek\CetakOrderProyekController::class);
Route::get('GetAllDataCetakOrderProyek/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\CetakOrderProyekController@GetAllData');
Route::get('getdataprintCetakOrderProyek/{idorder}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\CetakOrderProyekController@getdataprint');
Route::post('updatedatacetakOrderProyek', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\CetakOrderProyekController@updatedatacetak');


Route::resource('StatusOrderProyek', App\Http\Controllers\WORKSHOP\Workshop\Proyek\StatusOrderProyekController::class);
Route::get('GetAllDataStatusOrderProyek/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Proyek\StatusOrderProyekController@GetAllData');


// Workshop - Informasi

Route::resource('OrderGambarSelesai', App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderGambar::class);
Route::get('GetAllDataPengorder/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderGambar@GetAllDataPengorder');
Route::get('GetAllDataPenerima/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderGambar@GetAllDataPenerima');

Route::resource('OrderKerjaSelesai', App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderKerja::class);
Route::get('GetAllDataPengorderKerja/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderKerja@GetAllDataPengorder');
Route::get('GetAllDataPenerimaKerja/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderKerja@GetAllDataPenerima');

Route::resource('OrderProyekSelesai', App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderProyek::class);
Route::get('GetAllDataPengorderProyek/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderProyek@GetAllDataPengorder');
Route::get('GetAllDataPenerimaProyek/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\LacakOrderProyek@GetAllDataPenerima');

Route::resource('NomorGambar', App\Http\Controllers\WORKSHOP\Workshop\Informasi\NomorGambar::class);
Route::get('getdataNomorGambar/{kdbarang}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\NomorGambar@getdata');

Route::resource('OrderGambar', App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderGambar::class);
Route::get('GetAllDataPengorderGambar/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderGambar@GetAllDataPengorder');
Route::get('GetAllDataPenerimaGambar/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderGambar@GetAllDataPenerima');

Route::resource('OrderKerja', App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderKerja::class);
Route::get('GetAllDataPengorderKerja/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderKerja@GetAllDataPengorder');
Route::get('GetAllDataPenerimaKerja/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderKerja@GetAllDataPenerima');

Route::resource('OrderProyek', App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderProyek::class);
Route::get('GetAllDataPengorderProyek/{tgl_awal}/{tgl_akhir}/{div}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderProyek@GetAllDataPengorder');
Route::get('GetAllDataPenerimaProyek/{tgl_awal}/{tgl_akhir}', 'App\Http\Controllers\WORKSHOP\Workshop\Informasi\OrderProyek@GetAllDataPenerima');

/* EXTRUDER */
Route::get('/Extruder/{pageName?}', [ExtruderController::class, 'index']);
Route::get('/Extruder/WarehouseTerima/{formName?}', [WarehouseController::class, 'index']);
Route::get('/Extruder/{pageName?}/{formName?}', [ExtruderController::class, 'index']);

Route::get('/Extruder/ExtruderNet/Master/{formName?}/{namaGedung?}', [MasterController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Order/{formName?}/{namaGedung?}', [OrderController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Konversi/{formName?}/{namaGedung?}', [KonversiController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Benang/{formName?}/{namaGedung?}', [BenangController::class, 'index']);
Route::get('/Extruder/ExtruderNet/Catat/{formName?}', [PencatatanController::class, 'index']);

Route::get('/beratStandar/{fun_str}/{fun_data}', [BeratController::class, 'beratStandar']);
Route::get('/komposisiKonversi/{fun_str}/{fun_data}', [KomposisiController::class, 'komposisiKonversi']);
Route::get('/warehouseTerima/{fun_str}/{fun_data}', [WarehouseController::class, 'warehouseTerima']);

#region ExtruderNet - Master (KITE)
Route::get('/Master/getCekBahanKite/{kode}', [MasterController::class, 'getCekBahanKite']);
Route::get('/Master/getKiteExtruder/{kode}/{tgl_start?}/{kode_barang?}/{jenis_fas?}/{bahan_pp?}/{benang?}/{meter?}/{roll?}/{meter_awal?}/{hasil?}/{id_order?}/{caco3?}', [MasterController::class, 'getKiteExtruder']);
Route::get('/Master/getKiteExtOrder/{kode}/{id_order}', [MasterController::class, 'getKiteExtOrder']);
Route::get('/Master/getKiteExtruder7/{id_order}/{tgl_start}/{bahan_pp}/{caco3}/{benang}', [MasterController::class, 'getKiteExtruder7']);
#endregion

#region ExtruderNet - Master (Tropodo)
Route::get('/Master/getListKomposisiBahan/{id_komposisi}', [MasterController::class, 'getListKomposisiBahan']);
Route::get('/Master/getDetailBahan/{id_type}', [MasterController::class, 'getDetailBahan']);
Route::get('/Master/getListKomposisi/{id_divisi}/{id_komposisi?}', [MasterController::class, 'getListKomposisi']);
Route::get('/Master/getListMesin/{kode}', [MasterController::class, 'getListMesin']);
Route::get('/Master/getIdDivisiObjek/{id_divisi}', [MasterController::class, 'getIdDivisiObjek']);
Route::get('/Master/getIdObjekKelompokUtama/{id_objek}/{type?}', [MasterController::class, 'getIdObjekKelompokUtama']);
Route::get('/Master/getIdKelompokUtamaKelompok/{id_kelompok_utama}/{type?}', [MasterController::class, 'getIdKelompokUtamaKelompok']);
Route::get('/Master/getCekKelompokMesin/{id_kel}', [MasterController::class, 'getCekKelompokMesin']);
Route::get('/Master/getIdKelompokSubKelompok/{id_kelompok}', [MasterController::class, 'getIdKelompokSubKelompok']);
Route::get('/Master/getIdSubKelompokType/{id_sub_kelompok}', [MasterController::class, 'getIdSubKelompokType']);
Route::get('/Master/getCekKonversi/{id_komposisi}/{id_type}', [MasterController::class, 'getCekKonversi']);
Route::get('/Master/getCekKomposisi/{id}', [MasterController::class, 'getCekKomposisi']);
Route::get('/Master/getIdMesin/{id_kel}', [MasterController::class, 'getIdMesin']);

Route::get('/Master/insKomposisiBahan/{id_komposisi}/{id_objek}/{nama_objek}/{id_kelompok_utama}/{nama_kelompok_utama}/{id_kelompok}/{nama_kelompok}/{id_sub_kelompok}/{nama_sub_kelompok}/{id_type}/{nama_type}/{kd_brg?}/{jumlah_primer}/{sat_primer?}/{jumlah_sekunder}/{sat_sekunder?}/{jumlah_tritier}/{sat_tritier?}/{persentase}/{status_type}/{cadangan?}', [MasterController::class, 'insKomposisiBahan']);
Route::get('/Master/insMasterKomposisi/{nama_komposisi}/{id_mesin}/{id_divisi}', [MasterController::class, 'insMasterKomposisi']);
Route::get('/Master/getMasterKomposisi/{id_divisi}', [MasterController::class, 'getMasterKomposisi']);

Route::get('/Master/updIdKomposisiCounter/{id_divisi}', [MasterController::class, 'updIdKomposisiCounter']);

Route::get('/Master/delMasterKomposisi/{id_komposisi}', [MasterController::class, 'delMasterKomposisi']);
Route::get('/Master/delKomposisiBahan1/{id_komposisi}/{id_type}', [MasterController::class, 'delKomposisiBahan1']);
Route::get('/Master/delKomposisiBahan/{id_komposisi}', [MasterController::class, 'delKomposisiBahan']);
#endregion

#region ExtruderNet - Master (Mojosari)
Route::get('/Master/getListKomposisiBahanMjs/{id_komposisi}', [MasterController::class, 'getListKomposisiBahanMjs']);
Route::get('/Master/getCekJumlahKomposisi/{kode}/{id_komposisi}/{id_kelompok?}/{jns?}/{persentase?}', [MasterController::class, 'getCekJumlahKomposisi']);
Route::get('/Master/getPrgBomBarang/{kode}/{kode_barang?}/{id_komposisi?}/{id_kelompok?}/{id_divisi?}/{mesin?}', [MasterController::class, 'getPrgBomBarang']);
Route::get('/Master/getPrgTypeProduksi/{kode}/{id_kelut}', [MasterController::class, 'getPrgTypeProduksi']);

Route::get('/Master/insKomposisiBahanMjs/{kode}/{id_komposisi}/{id_type?}/{kd_brg?}/{id_divisi?}/{persentase?}/{primer?}/{sekunder?}/{tritier?}/{cadangan?}/{tmp_tritir?}/{id_type1?}', [MasterController::class, 'insKomposisiBahanMjs']);

Route::get('/Master/delKomposisiBahanMjs/{id_komposisi}', [MasterController::class, 'delKomposisiBahanMjs']);
#endregion

#region ExtruderNet - Form Bagian Order
Route::get('/Order/getListBenang/{kode}', [OrderController::class, 'getListBenang']);
Route::get('/Order/insOrderBenang/{gedung}/{tanggal}/{identifikasi}/{kode?}', [OrderController::class, 'insOrderBenang']);
Route::get('/Order/getNoOrder/{kode?}', [OrderController::class, 'getNoOrder']);
Route::get('/Order/getNoOrderMjs/', [OrderController::class, 'getNoOrderMjs']);
Route::get('/Order/insOrderDetail/{id_order}/{type_benang}/{jmlh_primer}/{jmlh_sekunder}/{jmlh_tritier}/{prod_primer}/{prod_sekunder}/{prod_tritier}', [OrderController::class, 'insOrderDetail']);
Route::get('/Order/updCounterOrder/{id_divisi}', [OrderController::class, 'updCounterOrder']);

Route::get('/Order/getOrderBlmAcc/{divisi}', [OrderController::class, 'getOrderBlmAcc']);
Route::get('/Order/getListSpek/{id_order}', [OrderController::class, 'getListSpek']);
Route::get('/Order/updAccOrder/{id_order}', [OrderController::class, 'updAccOrder']);

Route::get('/Order/getListBatalOrd/{id_divisi}', [OrderController::class, 'getListBatalOrd']);
Route::get('/Order/getListOrderBtl/{id_order}', [OrderController::class, 'getListOrderBtl']);
Route::get('/Order/updStatusOrder/{id_order}/{status}/{ket}', [OrderController::class, 'updStatusOrder']);
#endregion

#region ExtruderNet - Form Konversi Mohon
Route::get('/Konversi/getListKomposisiBahan/{id_komposisi}', [KonversiController::class, 'getListKomposisiBahan']);
Route::get('/Konversi/getSatuan/{id_type}', [KonversiController::class, 'getSatuan']);
Route::get('/Konversi/getSaldoBarang/{id_type}', [KonversiController::class, 'getSaldoBarang']);
Route::get('/Konversi/getDataKonversi/{id_konversi}', [KonversiController::class, 'getDataKonversi']);
Route::get('/Konversi/getListDetailKonversi/{id_konversi}', [KonversiController::class, 'getListDetailKonversi']);
Route::get('/Konversi/getListKonversi/{id_divisi}/{kode?}/{datetime?}', [KonversiController::class, 'getListKonversi']);
Route::get('/Konversi/getIdKonversiInv/{id_konversi}', [KonversiController::class, 'getIdKonversiInv']);
Route::get('/Konversi/getListMesin/{kode}', [KonversiController::class, 'getListMesin']);
Route::get('/Konversi/getOrdAccBlmSelesai/{divisi}', [KonversiController::class, 'getOrdAccBlmSelesai']);
Route::get('/Konversi/getListKomposisi/{kode}/{id_mesin}', [KonversiController::class, 'getListKomposisi']);
Route::get('/Konversi/getListSpek/{id_order}', [KonversiController::class, 'getListSpek']);
Route::get('/Konversi/getSaldoInv/{id_type}', [KonversiController::class, 'getSaldoInv']);

Route::get('/Konversi/insTmpTransaksi/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{asal_sub_kel}/{id_konversi}', [KonversiController::class, 'insTmpTransaksi']);
Route::get('/Konversi/insDetailKonversi/{id_konversi}/{id_type}/{jumlah_primer}/{jumlah_sekunder}/{jumlah_tritier}/{presentase?}/{id_konversi_inv}', [KonversiController::class, 'insDetailKonversi']);
Route::get('/Konversi/insMasterKonversi/{tgl}/{shift}/{awal}/{akhir}/{mesin}/{ukuran}/{denier}/{warna}/{lot_number}/{id_order}/{no_urut}/{id_komp}/{jam1}/{jam2}/{kode?}', [KonversiController::class, 'insMasterKonversi']);
Route::get('/Konversi/getMasterKonversi/{kode?}', [KonversiController::class, 'getMasterKonversi']);

Route::get('/Konversi/updListCounter', [KonversiController::class, 'updListCounter']);
Route::get('/Konversi/getListCounter', [KonversiController::class, 'getListCounter']);
Route::get('/Konversi/updMasterKonversi/{tgl}/{shift}/{awal}/{akhir}/{ukuran}/{denier}/{warna}/{lot_number}/{jam1}/{jam2}/{id_konv}', [KonversiController::class, 'updMasterKonversi']);

Route::get('/Konversi/delDetailKonversi/{id_konversi}/{id_konv_inv}', [KonversiController::class, 'delDetailKonversi']);
Route::get('/Konversi/delKonversi/{id_konversi}', [KonversiController::class, 'delKonversi']);
#endregion

#region ExtruderNet - Form Konversi ACC
Route::get('/Konversi/getListKonvBlmAcc/{id_divisi}', [KonversiController::class, 'getListKonvBlmAcc']);
Route::get('/Konversi/getListKonvDetail/{id_konversi}', [KonversiController::class, 'getListKonvDetail']);
Route::get('/Konversi/getPenyesuaianTransaksi/{id_type}/{id_type_transaksi}', [KonversiController::class, 'getPenyesuaianTransaksi']);
Route::get('/Konversi/getTransaksiKonversi/{id_konv_ext}', [KonversiController::class, 'getTransaksiKonversi']);
Route::get('/Konversi/getJumlahHutang/{id_type}/{subkel}/{shift}/{tgl}', [KonversiController::class, 'getJumlahHutang']);
Route::get('/Konversi/getIdTransInv/{id_type}/{subkel}/{tgl}/{shift}', [KonversiController::class, 'getIdTransInv']);
Route::get('/Konversi/getOrderStatus/{id_order}', [KonversiController::class, 'getOrderStatus']);

Route::get('/Konversi/updProsesACCKonversi/{id_transaksi}/{id_type}/{waktu_acc}/{keluar_primer}/{keluar_sekunder}/{keluar_tritier}/{masuk_primer}/{masuk_sekunder}/{masuk_tritier}', [KonversiController::class, 'updProsesACCKonversi']);
Route::get('/Konversi/updProsesHutang/{id_type}/{subkel}/{id_inv}', [KonversiController::class, 'updProsesHutang']);
Route::get('/Konversi/updACCMasterKonv/{id_konversi}', [KonversiController::class, 'updACCMasterKonv']);

Route::get('/Konversi/updSaldoOrderDetail/{id_order}/{no_urut_order}/{primer}/{sekunder}/{tritier}', [KonversiController::class, 'updSaldoOrderDetail']);
Route::get('/Konversi/getSaldoOrderDetail/{id_order}/{no_urut_order}', [KonversiController::class, 'getSaldoOrderDetail']);
#endregion

#region ExtruderNet - Form Benang Mohon
Route::get('/Benang/getListDataNG/{id_konversi}/{tanggal}', [BenangController::class, 'getListDataNG']);
Route::get('/Benang/getDetailUraianKonvNG/{id_konversi}', [BenangController::class, 'getDetailUraianKonvNG']);
Route::get('/Benang/getKoreksiSortirNGBlmAcc/{tanggal}', [BenangController::class, 'getKoreksiSortirNGBlmAcc']);
Route::get('/Benang/getListProdNG/{no_konv}', [BenangController::class, 'getListProdNG']);
Route::get('/Benang/getCekDataNG/{kode}/{no_konv}/{id_type}', [BenangController::class, 'getCekDataNG']);
Route::get('/Benang/getListIdKonv1/{id_divisi}/{tanggal}/{shift}/{id_konversi?}/{id_type?}', [BenangController::class, 'getListIdKonv1']);
Route::get('/Benang/getListIdKonv3/{id_konversi}/{id_type}', [BenangController::class, 'getListIdKonv3']);
Route::get('/Benang/getListCounter', [BenangController::class, 'getListCounter']);

Route::get('/Benang/insMasterKonvNG/{tanggal}/{id_konversi_ext}', [BenangController::class, 'insMasterKonvNG']);
Route::get('/Benang/getMasterKonversiNG', [BenangController::class, 'getMasterKonversiNG']);
Route::get('/Benang/insDetailKonvNG/{id_konversi_ng}/{id_type}/{jumlah_primer}/{jumlah_sekunder}/{jumlah_tritier}/{id_konv_inv?}', [BenangController::class, 'insDetailKonvNG']);
Route::get('/Benang/insAsalTmpTrans/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{saat_awal_transaksi}/{jumlah_primer}/{jumlah_sekunder}/{jumlah_tritier}/{asal_sub_kel}/{id_konversi}', [BenangController::class, 'insAsalTmpTrans']);
Route::get('/Benang/insTujuanTmpTrans/{id_type_transaksi}/{uraian_detail_transaksi}/{id_type}/{saat_awal_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{tujuan_sub_kel}/{id_konversi}', [BenangController::class, 'insTujuanTmpTrans']);

Route::get('/Benang/updDetailKonvNG/{id_konversi}/{id_type}/{j_primer}/{j_sekunder}/{j_tritier}', [BenangController::class, 'updDetailKonvNG']);
Route::get('/Benang/updTmpTransaksi/{id_transaksi}/{uraian_detail_transaksi}/{jumlah_keluar_primer}/{jumlah_keluar_sekunder}/{jumlah_keluar_tritier}/{tujuan_sub_kelompok?}', [BenangController::class, 'updTmpTransaksi']);

Route::get('/Benang/delKonversiNG/{id_konversi}', [BenangController::class, 'delKonversiNG']);
#endregion

#region ExtruderNet - Form Benang ACC
Route::get('/Benang/getListIdKonversiNG/{tanggal1}/{tanggal2}/{kode?}', [BenangController::class, 'getListIdKonversiNG']);
Route::get('/Benang/getDetailDataBenangNG/{id_konversi_ng}', [BenangController::class, 'getDetailDataBenangNG']);
Route::get('/Benang/getPenyesuaianTransaksi/{kode?}/{id_type?}/{id_type_transaksi?}/{id_transaksi?}/{kode_barang?}/{id_sub_kel?}', [BenangController::class, 'getPenyesuaianTransaksi']);
Route::get('/Benang/getTransaksiKonversiNG/{id_konversi_ng}', [BenangController::class, 'getTransaksiKonversiNG']);

Route::get('/Benang/updProsesACCKonversi/{id_transaksi}/{id_type}/{waktu_acc}/{keluar_primer}/{keluar_sekunder}/{keluar_tritier}/{masuk_primer}/{masuk_sekunder}/{masuk_tritier}', [BenangController::class, 'updProsesACCKonversi']);
Route::get('/Benang/updACCKonversiNG/{id_konversi_ng}', [BenangController::class, 'updACCKonversiNG']);
#endregion

#region ExtruderNet - Form Rincian Konversi
Route::get('/Benang/getKelompokUtama_IdObjek/{id_objek_kelompok_utama}/{type?}', [BenangController::class, 'getKelompokUtama_IdObjek']);
Route::get('/Benang/getKelompok_IdKelut/{id_kelompok_utama_kelompok}/{type?}', [BenangController::class, 'getKelompok_IdKelut']);
Route::get('/Benang/getSubKelompok_IdKelompok/{id_kelompok_sub_kelompok}', [BenangController::class, 'getSubKelompok_IdKelompok']);
Route::get('/Benang/getType_IdSubkel/{id_sub_kelompok_type}', [BenangController::class, 'getType_IdSubkel']);
Route::get('/Benang/getSaldoBarang/{id_type}', [BenangController::class, 'getSaldoBarang']);
#endregion

#region ExtruderNet - Form Catat Gangguan
Route::get('/Catat/getListIdKomposisi/{tanggal}/{id_mesin}', [PencatatanController::class, 'getListIdKomposisi']);
Route::get('/Catat/getDisplayShift/{id_konversi}', [PencatatanController::class, 'getDisplayShift']);
Route::get('/Catat/getListMesin/{kode}', [PencatatanController::class, 'getListMesin']);
Route::get('/Catat/getListGangguan', [PencatatanController::class, 'getListGangguan']);
Route::get('/Catat/getListGangguanProd/{bulan}/{tahun}', [PencatatanController::class, 'getListGangguanProd']);
Route::get('/Catat/getListShift/{id_konversi}', [PencatatanController::class, 'getListShift']);
Route::get('/Catat/getNoTrans', [PencatatanController::class, 'getNoTrans']);

Route::get('/Catat/insGangguanProd/{tanggal}/{id_mesin}/{id_gangguan}/{id_konversi?}/{shift}/{awal}/{akhir}/{awal_gangguan}/{akhir_gangguan}/{jumlah_jam}/{jumlah_menit}/{status}/{keterangan}/{jam_user}', [PencatatanController::class, 'insGangguanProd']);
Route::get('/Catat/updGangguanProd/{no_trans}/{awal}/{akhir}/{jam}/{menit}/{ket}', [PencatatanController::class, 'updGangguanProd']);
Route::get('/Catat/delGangguanProd/{no_trans}', [PencatatanController::class, 'delGangguanProd']);
#endregion

#region ExtruderNet - Form Catat Daya
Route::get('/Catat/getFaktorKali/{id_mesin}', [PencatatanController::class, 'getFaktorKali']);
Route::get('/Catat/getKwahMesinPerbulan/{bulan}/{tahun}', [PencatatanController::class, 'getKwahMesinPerbulan']);
Route::get('/Catat/getListDataKwahMesin/{bulan}/{tahun}', [PencatatanController::class, 'getListDataKwahMesin']);
Route::get('/Catat/getKwahMesin/{tanggal}/{id_divisi}', [PencatatanController::class, 'getKwahMesin']);

Route::get('/Catat/insKwahMesin/{tanggal}/{id_mesin}/{jam}/{counter}/{kali}/{jam_user}', [PencatatanController::class, 'insKwahMesin']);
Route::get('/Catat/updKwahMesin/{id_kwah_mesin}/{counter}', [PencatatanController::class, 'updKwahMesin']);
Route::get('/Catat/delKwahMesin/{id_kwah}', [PencatatanController::class, 'delKwahMesin']);
#endregion

#region ExtruderNet - Form Catat Effisiensi
Route::get('/Catat/getListAwalProdEff/{tanggal}/{no_mesin}/{shift}', [PencatatanController::class, 'getListAwalProdEff']);
Route::get('/Catat/getListEffisiensi/{tanggal}/{no_mesin}/{shift}/{awal_produksi}', [PencatatanController::class, 'getListEffisiensi']);
Route::get('/Catat/getListIdKonversi/{tanggal}/{no_mesin}/{shift}', [PencatatanController::class, 'getListIdKonversi']);
Route::get('/Catat/getCekDataEff/{tgl}/{mesin}/{shift}/{awal}/{akhir}/{id_konversi}', [PencatatanController::class, 'getCekDataEff']);

Route::get('/Catat/insEff/{Tanggal}/{IdMesin}/{Shift}/{AwalProduksi}/{AkhirProduksi}/{IdKonversi}/{ScrewRevolution}/{MotorCurrent}/{SlitterWidth}/{NoOfYarn}/{WaterGap}/{RollSpeed3}/{StretchingRatio}/{Relax}/{Denier}/{DenierRata}/{JamUser}', [PencatatanController::class, 'insEff']);
Route::get('/Catat/updEff/{Tanggal}/{IdMesin}/{Shift}/{AwalProduksi}/{AkhirProduksi}/{IdKonversi}/{ScrewRevolution}/{MotorCurrent}/{SlitterWidth}/{NoOfYarn}/{WaterGap}/{RollSpeed3}/{StretchingRatio}/{Relax}/{Denier}/{DenierRata}/{JamUser}', [PencatatanController::class, 'updEff']);
Route::get('/Catat/delEff/{Tanggal}/{IdMesin}/{Shift}/{AwalProduksi}/{AkhirProduksi}', [PencatatanController::class, 'delEff']);
#endregion

#region ExtruderNet - Form Catat Perawatan
Route::get('/Catat/getListJnsPerawatan/{id_divisi}', [PencatatanController::class, 'getListJnsPerawatan']);
Route::get('/Catat/getListWinder/{id_perawatan}/{id_mesin}', [PencatatanController::class, 'getListWinder']);
Route::get('/Catat/getJenisGangguan/{id_perawatan}', [PencatatanController::class, 'getJenisGangguan']);
Route::get('/Catat/getJenisPenyebab/{id_perawatan}', [PencatatanController::class, 'getJenisPenyebab']);
Route::get('/Catat/getJenisPenyelesaian/{id_perawatan}', [PencatatanController::class, 'getJenisPenyelesaian']);
Route::get('/Catat/getDataPerawatan/{tanggal}/{user_id}', [PencatatanController::class, 'getDataPerawatan']);

Route::get('/Catat/insPerawatan/{tanggal}/{shift}/{waktu}/{id_perawatan}/{id_mesin}/{no_winder}/{gangguan}/{sebab}/{solusi}/{mulai}/{selesai}/{id_gangguan?}', [PencatatanController::class, 'insPerawatan']);
Route::get('/Catat/updPerawatan/{shift}/{waktu}/{id_perawatan}/{id_mesin}/{no_winder}/{gangguan}/{sebab}/{solusi}/{mulai}/{selesai}/{kode}/{id_gangguan?}', [PencatatanController::class, 'updPerawatan']);
Route::get('/Catat/delPerawatan/{kode}', [PencatatanController::class, 'delPerawatan']);
#endregion

//route adstar AdStar/
Route::resource('AdStar', App\Http\Controllers\AdStarController\AdStar::class);
Route::resource('AdStarAdStarHome', App\Http\Controllers\AdStarController\AdStarHome::class);
Route::resource('AdStarCopyTabel', App\Http\Controllers\AdStarController\CopyTabel::class);
Route::resource('AdStarHasilProd', App\Http\Controllers\AdStarController\HasilProd::class);
Route::resource('AdStarMaintOrder', App\Http\Controllers\AdStarController\MaintOrder::class);
Route::resource('AdStarStopOrder', App\Http\Controllers\AdStarController\StopOrder::class);
Route::resource('AdStarUpKodeBarang', App\Http\Controllers\AdStarController\UpKodeBarang::class);
Route::resource('AdStarPrintTabel', App\Http\Controllers\AdStarController\PrintTabel::class);
Route::resource('AdStarOpenTop', App\Http\Controllers\AdStarController\OpenTop::class);
Route::resource('AdStarCloseTop', App\Http\Controllers\AdStarController\CloseTop::class);

//route barcode AdStar/
Route::resource('AdStarBarcode', App\Http\Controllers\BarcodeAdStarController\Barcode::class);
Route::resource('AdStarSchedule', App\Http\Controllers\BarcodeAdStarController\Schedule::class);
Route::resource('AdStarBuatBarcode', App\Http\Controllers\BarcodeAdStarController\BuatBarcode::class);
Route::resource('AdStarRepress', App\Http\Controllers\BarcodeAdStarController\Repress::class);
Route::resource('AdStarCetakBarcodeRusak', App\Http\Controllers\BarcodeAdStarController\CetakBarcodeRusak::class);
Route::resource('AdStarDaftarPalet', App\Http\Controllers\BarcodeAdStarController\DaftarPalet::class);
Route::resource('AdStarHangusBarcode', App\Http\Controllers\BarcodeAdStarController\HangusBarcode::class);
Route::resource('AdStarKirimGudang', App\Http\Controllers\BarcodeAdStarController\KirimGudang::class);
Route::resource('AdStarBatalKirim', App\Http\Controllers\BarcodeAdStarController\BatalKirim::class);
Route::resource('AdStarKonversiGudang', App\Http\Controllers\BarcodeAdStarController\KonversiGudang::class);
Route::resource('AdStarHasilBarcode', App\Http\Controllers\BarcodeAdStarController\HasilBarcode::class);

//route form repress AdStar/
Route::resource('AdStarBalJadiPalet', App\Http\Controllers\FormRepressController\BalJadiPaletController::class);
Route::resource('AdStarPaletJadiBal', App\Http\Controllers\FormRepressController\PaletJadiBalController::class);
Route::resource('AdStarScanBarcode', App\Http\Controllers\FormRepressController\ScanBarcodeController::class);
Route::resource('AdStarPilihJenisRepress', App\Http\Controllers\FormRepressController\PilihJenisRepressController::class);
Route::resource('AdStarKonversi', App\Http\Controllers\FormRepressController\KonversiController::class);
Route::resource('AdStarPrintUlang', App\Http\Controllers\FormRepressController\PrintUlangController::class);
Route::get('/ABM', function () {
    return view('ABM');
});

// Barcode Kerta 2
Route::resource('ABM/BarcodeKerta2/Schedule', App\Http\Controllers\ABM\BarcodeKerta\ScheduleController::class);
Route::post('ABM/BarcodeKerta2/Schedule/destroySelected', 'ABM\BarcodeKerta\ScheduleController@destroy')->name('Schedule.destroySelected');
// Route::get('/ABM/BarcodeKerta/Schedule', 'App\Http\Controllers\ABM\BarcodeKerta\ScheduleController@index');
Route::resource('ABM/BarcodeKerta2/BuatBarcode', App\Http\Controllers\ABM\BarcodeKerta\BuatBarcodeController::class);
// Route::get('/ABM/BarcodeKerta/BuatBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\BuatBarcodeController@getNoIndex');
Route::resource('ABM/BarcodeKerta2/Repress', App\Http\Controllers\ABM\BarcodeKerta\RepressController::class);
// Route::get('/ABM/BarcodeKerta/Repress', 'App\Http\Controllers\ABM\BarcodeKerta\RepressController@index');
Route::resource('ABM/BarcodeKerta2/CBR', App\Http\Controllers\ABM\BarcodeKerta\CBRController::class);
// Route::get('/ABM/BarcodeKerta/CBR', 'App\Http\Controllers\ABM\BarcodeKerta\CBRController@index');
Route::resource('ABM/BarcodeKerta2/HanguskanBarcode', App\Http\Controllers\ABM\BarcodeKerta\HanguskanBarcodeController::class);
// Route::post('HanguskanBarcode/updateStatusType', 'ABM\BarcodeKerta\HanguskanBarcodeController@updateStatusType')->name('HanguskanBarcode.updateStatusType');
// Route::get('/ABM/BarcodeKerta/HanguskanBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\HanguskanBarcodeController@index');
Route::resource('ABM/BarcodeKerta2/KirimGudang', App\Http\Controllers\ABM\BarcodeKerta\KirimGudangController::class);
// Route::get('/ABM/BarcodeKerta/KirimGudang', 'App\Http\Controllers\ABM\BarcodeKerta\KirimGudangController@index');
Route::resource('ABM/BarcodeKerta2/BatalKirim', App\Http\Controllers\ABM\BarcodeKerta\BatalKirimController::class);
// Route::get('/ABM/BarcodeKerta/BatalKirim', 'App\Http\Controllers\ABM\BarcodeKerta\BatalKirimController@index');
Route::resource('ABM/BarcodeKerta2/CekBarcode', App\Http\Controllers\ABM\BarcodeKerta\CekBarcodeController::class);
// Route::get('/ABM/BarcodeKerta/CekBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\CekBarcodeController@index');
Route::resource('ABM/BarcodeKerta2/CSJ', App\Http\Controllers\ABM\BarcodeKerta\CSJController::class);
// Route::get('/ABM/BarcodeKerta/CSJ', 'App\Http\Controllers\ABM\BarcodeKerta\CSJController@index');
Route::resource('ABM/BarcodeKerta2/TotalBarcode', App\Http\Controllers\ABM\BarcodeKerta\TotalBarcodeController::class);
// Route::get('/ABM/BarcodeKerta/TotalBarcode', 'App\Http\Controllers\ABM\BarcodeKerta\TotalBarcodeController@index');

Route::resource('/ABM/PermohonanPenerimaBarang', App\Http\Controllers\ABM\PermohonanPenerimaBarangController::class);
// Route::get('/ABM/PermohonanPenerimaBarang', 'App\Http\Controllers\ABM\PermohonanPenerimaBarangController@index');
Route::resource('/ABM/ScanBarcode', App\Http\Controllers\ABM\ScanBarcodeController::class);
// Route::get('/ABM/ScanBarcode', 'App\Http\Controllers\ABM\ScanBarcodeController@index');
Route::resource('/ABM/Scan', App\Http\Controllers\ABM\ScanController::class);
// Route::get('/ABM/Scan', 'App\Http\Controllers\ABM\ScanController@index');
Route::resource('/ABM/PilihJenisRepress', App\Http\Controllers\ABM\PilihJenisRepressController::class);
// Route::get('/ABM/PilihJenisRepress', 'App\Http\Controllers\ABM\PilihJenisRepressController@index');

Route::resource('/ABM/BalJadiPalet', App\Http\Controllers\ABM\BalJadiPaletController::class);
// Route::get('/ABM/BalJadiPalet', 'App\Http\Controllers\ABM\BalJadiPaletController@index');
Route::resource('/ABM/PaletJadiBal', App\Http\Controllers\ABM\PaletJadiBalController::class);
// Route::get('/ABM/PaletJadiBal', 'App\Http\Controllers\ABM\PaletJadiBalController@index');
Route::resource('/ABM/Konversi', App\Http\Controllers\ABM\KonversiController::class);
// Route::get('/ABM/Konversi', 'App\Http\Controllers\ABM\KonversiController@index');
Route::resource('/ABM/PrintUlang', App\Http\Controllers\ABM\PrintUlangController::class);
// Route::get('/ABM/PrintUlang', 'App\Http\Controllers\ABM\PrintUlangController@index');



// Barcode Roll Woven
Route::resource('/ABM/BarcodeRollWoven/BuatBarcode2', App\Http\Controllers\ABM\BarcodeRoll\BuatBarcode2Controller::class);
// Route::get('/ABM/BarcodeRollWoven/BuatBarcode', 'App\Http\Controllers\ABM\BarcodeRoll\BuatBarcode2Controller@index');
Route::resource('/ABM/BarcodeRollWoven/BRS', App\Http\Controllers\ABM\BarcodeRoll\BRSController::class);
// Route::get('/ABM/BarcodeRollWoven/BRS', 'App\Http\Controllers\ABM\BarcodeRoll\BRSController@index');
Route::resource('/ABM/BarcodeRollWoven/BBJ', App\Http\Controllers\ABM\BarcodeRoll\BBJController::class);
// Route::get('/ABM/BarcodeRollWoven/BBJ', 'App\Http\Controllers\ABM\BarcodeRoll\BBJController@index');
Route::resource('/ABM/BarcodeRollWoven/CBR', App\Http\Controllers\ABM\BarcodeRoll\CBR2Controller::class);
// Route::get('/ABM/BarcodeRollWoven/CBR', 'App\Http\Controllers\ABM\BarcodeRoll\CBR2Controller@index');
Route::resource('/ABM/BarcodeRollWoven/HanguskanBarcode', App\Http\Controllers\ABM\BarcodeRoll\HanguskanBarcode2Controller::class);
// Route::get('/ABM/BarcodeRollWoven/HanguskanBarcode', 'App\Http\Controllers\ABM\BarcodeRoll\HanguskanBarcode2Controller@index');
Route::resource('/ABM/BarcodeRollWoven/KirimGudang2', App\Http\Controllers\ABM\BarcodeRoll\KirimGudang2Controller::class);
// Route::get('/ABM/BarcodeRollWoven/KirimGudang', 'App\Http\Controllers\ABM\BarcodeRoll\KirimGudang2Controller@index');
Route::resource('/ABM/BarcodeRollWoven/KirimCircular', App\Http\Controllers\ABM\BarcodeRoll\KirimCircularController::class);
// Route::get('/ABM/BarcodeRollWoven/KirimCircular', 'App\Http\Controllers\ABM\BarcodeRoll\KirimCircularController@index');
Route::resource('/ABM/BarcodeRollWoven/BatalKirim2', App\Http\Controllers\ABM\BarcodeRoll\BatalKirim2Controller::class);
// Route::get('/ABM/BarcodeRollWoven/BatalKirim', 'App\Http\Controllers\ABM\BarcodeRoll\BatalKirim2Controller@index');
Route::get('/ABM/BarcodeRollWoven/Repress', 'App\Http\Controllers\ABM\BarcodeRoll\Repress2Controller@index');
Route::resource('/ABM/BarcodeRollWoven/CekBarcode', App\Http\Controllers\ABM\BarcodeRoll\CekBarcode2Controller::class);
// Route::get('/ABM/BarcodeRollWoven/CekBarcode', 'App\Http\Controllers\ABM\BarcodeRoll\CekBarcode2Controller@index');
Route::get('/ABM/BarcodeRollWoven/Penghanguskan', 'App\Http\Controllers\ABM\BarcodeRoll\PenghanguskanController@index');
Route::resource('/ABM/BarcodeRollWoven/SettingTimbangan', App\Http\Controllers\ABM\BarcodeRoll\SettingTimbanganController::class);
Route::post('/simpan_data', [App\Http\Controllers\ABM\BarcodeRoll\SettingTimbanganController::class, 'simpanData']);
// Route::post('/pengaturan', [App\Http\Controllers\ABM\BarcodeRoll\SettingTimbanganController::class, 'store'])->name('pengaturan.store');
// Route::get('/ABM/BarcodeRollWoven/SettingTimbangan', 'App\Http\Controllers\ABM\BarcodeRoll\SettingTimbanganController@index');
Route::get('/ABM/BarcodeRollWoven/MSD', 'App\Http\Controllers\ABM\BarcodeRoll\MSDController@index');

Route::get('/ABM/ScanMutasiSatuDivisi', 'App\Http\Controllers\ABM\ScanMutasiSatuDivisiController@index');
Route::resource('MutasiSatuDivisi', App\Http\Controllers\ABM\MutasiSatuDivisiController::class);
// Route::get('/ABM/MutasiSatuDivisi', 'App\Http\Controllers\ABM\MutasiSatuDivisiController@index');
Route::resource('/ABM/PrintUlang2', App\Http\Controllers\ABM\PrintUlang2Controller::class);
Route::get('/ABM/AccPermohonanSatuDivisi', 'App\Http\Controllers\ABM\AccPermohonanSatuDivisiController@index');


// Laporan Serah Terima
Route::resource('/ABM/LST', App\Http\Controllers\ABM\LSTController::class);
// Route::get('/ABM/LST', 'App\Http\Controllers\ABM\LSTController@index');

// Route::get('/ABM/Schedule', 'App\Http\Controllers\ABM@Schedule');
// Route::get('/ABM/Buat-Barcode', 'App\Http\Controllers\ABM@BuatBarcode');
// Route::get('/ABM/Repress', 'App\Http\Controllers\ABM@Repress');
// Route::get('/ABM/CBR', 'App\Http\Controllers\ABM@CBR');
// Route::get('/ABM/Hanguskan-Barcode', 'App\Http\Controllers\ABM@HanguskanBarcode');
// Route::get('/ABM/Kirim-Gudang', 'App\Http\Controllers\ABM@KirimGudang');
// Route::get('/ABM/Batal-Kirim', 'App\Http\Controllers\ABM@BatalKirim');
// Route::get('/ABM/Cek-Barcode', 'App\Http\Controllers\ABM@CekBarcode');
// Route::get('/ABM/CSJ', 'App\Http\Controllers\ABM@CSJ');
// Route::get('/ABM/Total-Barcode', 'App\Http\Controllers\ABM@TotalBarcode');

// // ========================================================

// Route::get('/ABM/Buat-Barcode2', 'App\Http\Controllers\ABM@BuatBarcode2');
// Route::get('/ABM/BRS', 'App\Http\Controllers\ABM@BRS');
// Route::get('/ABM/BBJ', 'App\Http\Controllers\ABM@BBJ');
// Route::get('/ABM/CBR2', 'App\Http\Controllers\ABM@CBR2');
// Route::get('/ABM/Hanguskan-Barcode2', 'App\Http\Controllers\ABM@HanguskanBarcode2');
// Route::get('/ABM/Kirim-Gudang2', 'App\Http\Controllers\ABM@KirimGudang2');
// Route::get('/ABM/Kirim-Circular', 'App\Http\Controllers\ABM@KirimCircular');
// Route::get('/ABM/Batal-Kirim2', 'App\Http\Controllers\ABM@BatalKirim2');
// Route::get('/ABM/Repress2', 'App\Http\Controllers\ABM@Repress2');
// Route::get('/ABM/Cek-Barcode2', 'App\Http\Controllers\ABM@CekBarcode2');
// Route::get('/ABM/Penghangusan-Barcode', 'App\Http\Controllers\ABM@Penghanguskan');
// Route::get('/ABM/Setting-Timbangan', 'App\Http\Controllers\ABM@SettingTimbangan');
// Route::get('/ABM/MSD', 'App\Http\Controllers\ABM@MSD');

// // ========================================================

// Route::get('/ABM/LST', function () {
//     return view ('LST');
// });
