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

Route::get('BKMLC', 'App\Http\Controllers\Accounting\Piutang\BKMLCController@BKMLC');

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
Route::get('DataPenagihanPenjualan/{IdPenagihan}', 'App\Http\Controllers\Accounting\Piutang\PenjualanLokal\FakturUangMukaController@getDataPenagihan');
#endregion

Route::get('NotaPenjualanTunai', 'App\Http\Controllers\Accounting\Piutang\NotaPenjualanTunaiController@NotaPenjualanTunai');
Route::get('UpdateSuratJalan', 'App\Http\Controllers\Accounting\Piutang\UpdateSuratJalanController@UpdateSuratJalan');
Route::get('ACCPenagihanPenjualan', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanController@ACCPenagihanPenjualan');
Route::get('StatusDokumenTagihan', 'App\Http\Controllers\Accounting\Piutang\StatusDokumenTagihanController@StatusDokumenTagihan');
Route::get('PenagihanPenjualanEkspor', 'App\Http\Controllers\Accounting\Piutang\PenagihanPenjualanEksporController@PenagihanPenjualanEkspor');
Route::get('ACCPenagihanPenjualanExport', 'App\Http\Controllers\Accounting\Piutang\ACCPenagihanPenjualanExportController@ACCPenagihanPenjualanExport');
Route::get('MaintenancePelunasanPenjualan', 'App\Http\Controllers\Accounting\Piutang\MaintenancePelunasanPenjualanController@MaintenancePelunasanPenjualan');
Route::get('PelunasanPenjualanCashAdvance', 'App\Http\Controllers\Accounting\Piutang\PelunasanPenjualanCashAdvanceController@PelunasanPenjualanCashAdvance');
Route::get('AnalisaStatusPenjualan', 'App\Http\Controllers\Accounting\Piutang\AnalisaStatusPenjualanController@AnalisaStatusPenjualan');
Route::get('NotaKreditRetur', 'App\Http\Controllers\Accounting\Piutang\MaintenanceNotaKredit\NotaKreditReturController@NotaKreditRetur');
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

