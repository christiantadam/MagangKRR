<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

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


Route::get('EditPerOrderkonstruksi', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditPerOrder');
Route::get('EditEstimasiTanggal', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditEstimasiTanggal');
Route::get('EditEstimasiWaktu', 'App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksiController@EditEstimasiWaktu');
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

