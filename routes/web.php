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
Route::get('MaintenanceTTKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceTTKRR1Controller@MaintenanceTTKRR1');
Route::get('ACCBayarTT', 'App\Http\Controllers\Accounting\Hutang\ACCBayarTTController@ACCBayarTT');
Route::get('MaintenanceBKKKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKKKRR1Controller@MaintenanceBKKKRR1');
Route::get('MaintenanceBKMKRR1', 'App\Http\Controllers\Accounting\Hutang\MaintenanceBKMKRR1Controller@MaintenanceBKMKRR1');
Route::get('KodePerkiraanBKK', 'App\Http\Controllers\Accounting\Hutang\KodePerkiraanBKKController@KodePerkiraanBKK');
Route::get('MaintenanceKursBKK', 'App\Http\Controllers\Accounting\Hutang\MaintenanceKursBKKController@MaintenanceKursBKK');
Route::get('BatalBKK', 'App\Http\Controllers\Accounting\Hutang\BatalBKKController@BatalBKK');
Route::get('UraianBKK', 'App\Http\Controllers\Accounting\Hutang\UraianBKKController@UraianBKK');

#region Maintenance BKM Penagihan
Route::resource('MaintenanceBKMPenagihan', App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController::class);
Route::get('detailtabelpenagihan/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelPelunasan');
Route::get('detailbank', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getDataBank');
Route::get('tabeldetailpelunasan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelDetailPelunasan');
Route::get('detailkodeperkiraan/{kode}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getKodePerkiraan');
Route::get('tabelkuranglebih/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelKurangLebih');
Route::get('tabeltampilbkm/{tanggalInputTampil}/{tanggalInputTampil2}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelTampilBKM');
Route::get('tabelbiaya/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getTabelBiaya');
Route::get('cekNoPelunasanBKMPenagihan/{idPelunasan}/{idCustomer}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@cekNoPelunasanBKMPenagihan');
Route::get('cekJumlahRincianBKMPenagihan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@cekJumlahRincianBKMPenagihan');
Route::post('insertUpdateBKMPenagihan/groupbkm', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@insertUpdateBKMPenagihan');
Route::get('getCetakBKMNoPenagihan/{idBKMInput}', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKMPenagihanController@getCetakBKMNoPenagihan');
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


#region Update BKM
Route::resource('UpdateDetailBKM', App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController::class);
Route::get('tabeldatapelunasan/{bulan}/{tahun}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelPelunasan');
Route::get('cektabelpelunasan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@cekTabelPelunasan');
Route::get('tabeldetpelunasan/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelDetailPelunasan');
Route::get('tabeldetkuranglebih/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelKurangLebih');
Route::get('dettabelkuranglebih/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelKurangLebih');
Route::get('dettabelbiaya/{idPelunasan}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelBiaya');
Route::get('tabeltampilbkmcashadv/{tanggalInputTampil}/{tanggalInputTampil2}', 'App\Http\Controllers\Accounting\Piutang\BKMCashAdvance\UpdateDetailBKMController@getTabelTampilBKM');
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
Route::get('KelebihanBayarJualTunai', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\KelebihanBayarJualTunaiController@KelebihanBayarJualTunai');
Route::get('SelisihTimbang', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\SelisihTimbangController@SelisihTimbang');
Route::get('ACCNotaKredit', 'App\Http\Controllers\Accounting\Piutang\ACCNotaKreditController@ACCNotaKredit');
Route::get('Pengajuan', 'App\Http\Controllers\Accounting\Piutang\MaintenanceBKKNotaKredit\PengajuanController@Pengajuan');
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
Route::get('ProgramPayroll/Master/Divisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@index')->name('divisi.index');
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
Route::resource('ProgramPayroll/Skorsing/Permohonan', App\Http\Controllers\Payroll\Transaksi\Skorsing\Permohonan\PermohonanController::class);
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





