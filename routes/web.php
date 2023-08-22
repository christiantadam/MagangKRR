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

// Payroll
Route::get('Payroll', 'App\Http\Controllers\Payroll\HomeController@index');

// Payroll Master
// Route::get('ProgramPayroll/Master/Karyawan/Harian', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanHarianController@index');
Route::resource('KaryawanHarian', App\Http\Controllers\Payroll\Master\Karyawan\KaryawanHarianController::class);
// Route::get('ProgramPayroll/Master/Karyawan/Keluarga', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@index')->name('karyawanKeluarga.index');
// Route::get('getDivisi/{Kode}', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@getDivisi');
// Route::get('getPegawaiKeluarga/{Id_Div}', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@getPegawaiKeluarga');
// Route::get('getDataKeluarga/{Id_Peg}', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@getDataKeluarga');
// Route::get('getDataPegawai/{Id_Peg}', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@getDataPegawai');
//Master
Route::resource('KaryawanKeluarga', App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController::class);
Route::resource('MasterNomer', App\Http\Controllers\Payroll\Master\Nomer\NomerController::class);
Route::resource('MasterKartu', App\Http\Controllers\Payroll\Master\Kartu\KartuController::class);
Route::resource('settingDivisiHarian', App\Http\Controllers\Payroll\Master\SettingDivisi\HarianController::class);
Route::resource('settingDivisiStaff', App\Http\Controllers\Payroll\Master\SettingDivisi\StaffController::class);
Route::resource('settingShift', App\Http\Controllers\Payroll\Master\SettingShift\SettingShiftController::class);
Route::resource('MasterKlinik', App\Http\Controllers\Payroll\Master\Klinik\KlinikController::class);
//Agenda
Route::resource('TambahAgenda', App\Http\Controllers\Payroll\Agenda\TambahAgenda\TambahAgendaController::class);
Route::resource('UbahAgenda', App\Http\Controllers\Payroll\Agenda\UbahAgenda\UbahAgendaController::class);
Route::resource('HariBesar', App\Http\Controllers\Payroll\Agenda\HariBesar\HariBesarController::class);
Route::resource('InsertSupervisor', App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaSupervisorController::class);

// Route::post('ProgramPayroll/Master/Karyawan/updatePekerja', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@updatePekerja');
// Route::post('ProgramPayroll/Master/Karyawan/tambahKeluarga', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@tambahKeluarga');
// Route::post('ProgramPayroll/Master/Karyawan/updateKeluarga', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@updateKeluarga');
// Route::post('ProgramPayroll/Master/Karyawan/hapusKeluarga', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@hapusKeluarga');


Route::get('ProgramPayroll/Master/Divisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@index')->name('divisi.index');
//Divisi
Route::post('ProgramPayroll/Master/insertDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@InsertDivisi');
Route::post('ProgramPayroll/Master/updateDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@UpdateDivisi');
Route::post('ProgramPayroll/Master/deleteDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@deleteDivisi');

// Route::get('ProgramPayroll/Master/SettingDivisi/Harian', 'App\Http\Controllers\Payroll\Master\SettingDivisi\HarianController@index');
// Route::get('ProgramPayroll/Master/SettingDivisi/Staff', 'App\Http\Controllers\Payroll\Master\SettingDivisi\StaffController@index');
// Route::get('ProgramPayroll/Master/Nomer', 'App\Http\Controllers\Payroll\Master\Nomer\NomerController@index');
// Route::get('ProgramPayroll/Master/Kartu', 'App\Http\Controllers\Payroll\Master\Kartu\KartuController@index');
// Route::get('ProgramPayroll/Master/SettingShift', 'App\Http\Controllers\Payroll\Master\SettingShift\SettingShiftController@index');
// Route::get('ProgramPayroll/Master/Klinik', 'App\Http\Controllers\Payroll\Master\Klinik\KlinikController@index');

// Payroll Agenda
Route::get('ProgramPayroll/Agenda/AgendaMasuk/Jam', 'App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaJamController@index');
Route::get('ProgramPayroll/Agenda/AgendaMasuk/Shift', 'App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaShiftController@index');
// Route::get('ProgramPayroll/Agenda/TambahAgenda', 'App\Http\Controllers\Payroll\Agenda\TambahAgenda\TambahAgendaController@index');
// Route::get('ProgramPayroll/Agenda/UbahAgenda', 'App\Http\Controllers\Payroll\Agenda\UbahAgenda\UbahAgendaController@index');
// Route::get('ProgramPayroll/Agenda/HariBesar', 'App\Http\Controllers\Payroll\Agenda\HariBesar\HariBesarController@index');
Route::get('ProgramPayroll/Agenda/GantiShift/Aturan1', 'App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift1Controller@index');
Route::get('ProgramPayroll/Agenda/GantiShift/Aturan2', 'App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift2Controller@index');
Route::get('ProgramPayroll/Agenda/KoreksiShift', 'App\Http\Controllers\Payroll\Agenda\KoreksiShift\KoreksiShiftController@index');
Route::get('ProgramPayroll/Agenda/InsertPegawaiBaru', 'App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaPegawaiBaruController@index');
// Route::get('ProgramPayroll/Agenda/InsertSupervisor', 'App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaSupervisorController@index');

// Payroll Transaksi
Route::get('ProgramPayroll/Transaksi/InputCheckClock', 'App\Http\Controllers\Payroll\Transaksi\InputCheckClock\InputCheckClockController@index');
Route::get('ProgramPayroll/Transaksi/TransferAbsen', 'App\Http\Controllers\Payroll\Transaksi\TransferAbsen\TransferAbsenController@index');
Route::get('ProgramPayroll/Transaksi/VerifikasiAbsen', 'App\Http\Controllers\Payroll\Transaksi\VerifikasiAbsen\VerifikasiAbsenController@index');
Route::get('ProgramPayroll/Transaksi/AbsenSimpang', 'App\Http\Controllers\Payroll\Transaksi\AbsenSimpang\AbsenSimpangController@index');
Route::get('ProgramPayroll/Transaksi/Kontrak', 'App\Http\Controllers\Payroll\Transaksi\Kontrak\KontrakController@index');
Route::post('ProgramPayroll/Transaksi/updateKontrak', 'App\Http\Controllers\Payroll\Transaksi\Kontrak\KontrakController@update');
Route::get('getPegawai/{Id_Div}', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController@getPegawai');
Route::get('ProgramPayroll/Transaksi/KoreksiAbsen', 'App\Http\Controllers\Payroll\Transaksi\KoreksiAbsen\KoreksiAbsenController@index');
Route::get('ProgramPayroll/Transaksi/InputLibur', 'App\Http\Controllers\Payroll\Transaksi\InputLibur\InputLiburController@index');
Route::get('ProgramPayroll/Transaksi/InputRange', 'App\Http\Controllers\Payroll\Transaksi\InputRange\InputRangeController@index');
Route::get('ProgramPayroll/Transaksi/Lembur', 'App\Http\Controllers\Payroll\Transaksi\Lembur\LemburController@index');
Route::get('ProgramPayroll/Transaksi/CheckClockError', 'App\Http\Controllers\Payroll\Transaksi\CheckClockError\CheckClockErrorController@index');
Route::get('ProgramPayroll/Transaksi/CheckClockInOut', 'App\Http\Controllers\Payroll\Transaksi\CheckClockInOut\CheckClockInOutController@index');
Route::get('ProgramPayroll/Transaksi/MaintenancePelatihan', 'App\Http\Controllers\Payroll\Transaksi\MaintenancePelatihan\MaintenancePelatihanController@index');
Route::get('ProgramPayroll/Transaksi/MaintenanceKoreksi', 'App\Http\Controllers\Payroll\Transaksi\MaintenanceKoreksi\MaintenanceKoreksiController@index');
Route::get('ProgramPayroll/Transaksi/Koperasi', 'App\Http\Controllers\Payroll\Transaksi\Koperasi\KoperasiController@index');
Route::get('ProgramPayroll/Transaksi/Mutasi/Harian', 'App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiHarian\MutasiHarianController@index');
Route::get('ProgramPayroll/Transaksi/Mutasi/Staff', 'App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiStaff\MutasiStaffController@index');
Route::get('ProgramPayroll/Transaksi/Mutasi/Histori', 'App\Http\Controllers\Payroll\Transaksi\Mutasi\HistoriMutasi\HistoriMutasiController@index');
Route::get('ProgramPayroll/Transaksi/MaintenanceResign', 'App\Http\Controllers\Payroll\Transaksi\MaintenanceResign\MaintenanceResignController@index');
Route::get('ProgramPayroll/Transaksi/KenaikanUpah', 'App\Http\Controllers\Payroll\Transaksi\KenaikanUpah\KenaikanUpahController@index');
Route::get('ProgramPayroll/Transaksi/Absen1', 'App\Http\Controllers\Payroll\Transaksi\Absen1\Absen1Controller@index');
Route::get('ProgramPayroll/Transaksi/Skorsing/Permohonan', 'App\Http\Controllers\Payroll\Transaksi\Skorsing\Permohonan\PermohonanController@index');
Route::get('ProgramPayroll/Transaksi/Skorsing/AccBayar', 'App\Http\Controllers\Payroll\Transaksi\Skorsing\AccBayar\AccBayarController@index');
Route::get('ProgramPayroll/Transaksi/Peringatan/Permohonan', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController@index');
Route::get('ProgramPayroll/Transaksi/Peringatan/Permohonan/getPegawai/{Id_Div}', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController@getPegawai');


Route::get('ProgramPayroll/Transaksi/Peringatan/AccPermohonan', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController@index');
Route::post('ProgramPayroll/Transaksi/Peringatan/AccPermohonan/proses-peringatan', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController@prosesPeringatan')->name('prosesPeringatan');


Route::get('ProgramPayroll/Transaksi/Rekap', 'App\Http\Controllers\Payroll\Transaksi\RekapAbsenLembur\RekapAbsenLemburController@index');
Route::get('ProgramPayroll/Transaksi/EstimasiGaji', 'App\Http\Controllers\Payroll\Transaksi\EstimasiGaji\EstimasiGajiController@index');
Route::get('ProgramPayroll/Transaksi/HitGajiHarian', 'App\Http\Controllers\Payroll\Transaksi\HitGajiHarian\HitGajiHarianController@index');
Route::get('ProgramPayroll/Transaksi/HitTHRHarian', 'App\Http\Controllers\Payroll\Transaksi\HitTHRHarian\HitTHRHarianController@index');

// Payroll Laporan
Route::get('ProgramPayroll/Laporan/Absen/LaporanAbnormal', 'App\Http\Controllers\Payroll\Laporan\Absen\LaporanAbnormal\LaporanAbnormalController@index');
Route::get('ProgramPayroll/Laporan/Absen/DaftarLembur/getDataLembur', 'App\Http\Controllers\Payroll\Laporan\Absen\DaftarLemburSupervisor\DaftarLemburSupervisorController@getDataLembur')->name('getDataLembur');
Route::get('ProgramPayroll/Laporan/Absen/DaftarLembur', 'App\Http\Controllers\Payroll\Laporan\Absen\DaftarLemburSupervisor\DaftarLemburSupervisorController@index');
Route::get('ProgramPayroll/Laporan/Staff/FormDaftarHadir', 'App\Http\Controllers\Payroll\Laporan\Staff\FormDaftarHadir\FormDaftarHadirController@index');
Route::get('ProgramPayroll/Laporan/Staff/AbsensiKaryawan/RekapAbsen', 'App\Http\Controllers\Payroll\Laporan\Staff\AbsensiKaryawan\RekapAbsen\RekapAbsenController@index');
Route::get('ProgramPayroll/Laporan/Staff/AbsensiKaryawan/CetakDetailAbsen', 'App\Http\Controllers\Payroll\Laporan\Staff\AbsensiKaryawan\CetakDetailAbsen\CetakDetailAbsenController@index');
Route::get('ProgramPayroll/Laporan/Staff/AbsensiKaryawan/RekapPerolehanASI', 'App\Http\Controllers\Payroll\Laporan\Staff\AbsensiKaryawan\RekapPerolehanASI\RekapPerolehanASIController@index');

Route::get('ProgramPayroll/Laporan/Staff/Lembur/LemburPerDivisi', 'App\Http\Controllers\Payroll\Laporan\Staff\Lembur\LemburPerDivisi\LemburPerDivisiController@index');
Route::get('ProgramPayroll/Laporan/Staff/Lembur/LemburPerManager', 'App\Http\Controllers\Payroll\Laporan\Staff\Lembur\LemburPerManager\LemburPerManagerController@index');
Route::get('ProgramPayroll/Laporan/Staff/Lembur/DetailLembur', 'App\Http\Controllers\Payroll\Laporan\Staff\Lembur\DetailLembur\DetailLemburController@index');

Route::get('ProgramPayroll/Laporan/Staff/Hutang/KartuHutang', 'App\Http\Controllers\Payroll\Laporan\Staff\Hutang\KartuHutang\KartuHutangController@index');
Route::get('ProgramPayroll/Laporan/Staff/Hutang/HutangKoperasi', 'App\Http\Controllers\Payroll\Laporan\Staff\Hutang\HutangKoperasi\HutangKoperasiController@index');
Route::get('ProgramPayroll/Laporan/Staff/Hutang/AngsuranKoperasi', 'App\Http\Controllers\Payroll\Laporan\Staff\Hutang\AngsuranKoperasi\AngsuranKoperasiController@index');
Route::get('ProgramPayroll/Laporan/Staff/Hutang/DaftarPelunasan', 'App\Http\Controllers\Payroll\Laporan\Staff\Hutang\DaftarPelunasan\DaftarPelunasanController@index');

Route::get('ProgramPayroll/Laporan/PotonganKoperasi', 'App\Http\Controllers\Payroll\Laporan\Staff\PotonganKoperasi\PotonganKoperasiController@index');
Route::get('ProgramPayroll/Laporan/DaftarPotongan', 'App\Http\Controllers\Payroll\Laporan\Staff\DaftarPotongan\DaftarPotonganController@index');
Route::get('ProgramPayroll/Laporan/JumlahPegawai', 'App\Http\Controllers\Payroll\Laporan\Staff\JumlahPegawai\JumlahPegawaiController@index');
Route::get('ProgramPayroll/Laporan/AngsuranBajuSeragam', 'App\Http\Controllers\Payroll\Laporan\Staff\AngsuranBajuSeragam\AngsuranBajuSeragamController@index');

Route::get('ProgramPayroll/Laporan/DaftarHadir', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarHadir\DaftarHadirController@index');
Route::get('ProgramPayroll/Laporan/AbsensiPerHari', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerHari\AbsensiPerHariController@index');
Route::get('ProgramPayroll/Laporan/AbsensiPerMinggu', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerMinggu\AbsensiPerMingguController@index');
Route::get('ProgramPayroll/Laporan/AbsensiPerBulan', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerBulan\AbsensiPerBulanController@index');
Route::get('ProgramPayroll/Laporan/AbsensiPerTahun', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarAbsensi\AbsensiPerTahun\AbsensiPerTahunController@index');
Route::get('ProgramPayroll/Laporan/UpahHarianManager', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarUpahHarian\UpahHarianManager\UpahHarianManagerController@index');
Route::get('ProgramPayroll/Laporan/UpahHarianDivisi', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarUpahHarian\UpahHarianDivisi\UpahHarianDivisiController@index');
Route::get('ProgramPayroll/Laporan/UpahPerManager', 'App\Http\Controllers\Payroll\Laporan\Harian\TandaTerimaUpahPegawai\UpahPerManager\UpahPerManagerController@index');
Route::get('ProgramPayroll/Laporan/UpahPerDivisi', 'App\Http\Controllers\Payroll\Laporan\Harian\TandaTerimaUpahPegawai\UpahPerDivisi\UpahPerDivisiController@index');
Route::get('ProgramPayroll/Laporan/UpahSkorsing', 'App\Http\Controllers\Payroll\Laporan\Harian\TandaTerimaUpahPegawai\UpahSkorsing\UpahSkorsingController@index');
Route::get('ProgramPayroll/Laporan/LaporanUangMakanKecil', 'App\Http\Controllers\Payroll\Laporan\Harian\LaporanUangMakanKecil\LaporanUangMakanKecilController@index');
Route::get('ProgramPayroll/Laporan/PembayaranPerManager', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarPembayaran\PembayaranPerManager\PembayaranPerManagerController@index');
Route::get('ProgramPayroll/Laporan/SeluruhKaryawan', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarPembayaran\SeluruhKaryawan\SeluruhKaryawanController@index');
Route::get('ProgramPayroll/Laporan/KaryawanSkorsing', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarPembayaran\KaryawanSkorsing\KaryawanSkorsingController@index');
Route::get('ProgramPayroll/Laporan/DaftarTunjunganHaid', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarTunjunganHaid\DaftarTunjunganHaidController@index');
Route::get('ProgramPayroll/Laporan/Slip', 'App\Http\Controllers\Payroll\Laporan\Harian\Slip\SlipController@index');
Route::get('ProgramPayroll/Laporan/LaporanMingguanPerManager', 'App\Http\Controllers\Payroll\Laporan\Harian\LaporanLemburPerMinggu\LaporanMingguanManager\LaporanMingguanManagerController@index');
Route::get('ProgramPayroll/Laporan/LaporanMingguanPerDivisi', 'App\Http\Controllers\Payroll\Laporan\Harian\LaporanLemburPerMinggu\LaporanMingguanDivisi\LaporanMingguanDivisiController@index');
Route::get('ProgramPayroll/Laporan/LaporanPerDivisi', 'App\Http\Controllers\Payroll\Laporan\Harian\LaporanKhususPerManager\LaporanPerdivisi\LaporanPerDivisiController@index');
Route::get('ProgramPayroll/Laporan/LaporanPerGroup', 'App\Http\Controllers\Payroll\Laporan\Harian\LaporanKhususPerManager\LaporanPerGroup\LaporanPerGroupController@index');
Route::get('ProgramPayroll/Laporan/PerDivisiLembur', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarLembur\PerDivisiLembur\PerDivisiLemburController@index');
Route::get('ProgramPayroll/Laporan/PerManagerLembur', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarLembur\PerManagerLembur\PerManagerLemburController@index');
Route::get('ProgramPayroll/Laporan/JumlahPegawaiLemburPerManager', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarLembur\JPLPM\JPLPMController@index');
Route::get('ProgramPayroll/Laporan/PegawaiPerDivisi', 'App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\PegawaiPerDivisi\PegawaiPerDivisiController@index');
Route::get('ProgramPayroll/Laporan/PerPegawai', 'App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\PerPegawai\PerPegawaiController@index');
Route::get('ProgramPayroll/Laporan/PegawaiPerBulan', 'App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\PegawaiPerBulan\PegawaiPerBulanController@index');
Route::get('ProgramPayroll/Laporan/JumlahPerBulan', 'App\Http\Controllers\Payroll\Laporan\Harian\Peringatan\JumlahPerBulan\JumlahPerBulanController@index');
Route::get('ProgramPayroll/Laporan/PerPeriodik', 'App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DCS\PerPeriodik\PerPeriodikController@index');
Route::get('ProgramPayroll/Laporan/PerDivisi', 'App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DCS\PerDivisi\PerDivisiController@index');
Route::get('ProgramPayroll/Laporan/PerManager', 'App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DCS\PerManager\PerManagerController@index');
Route::get('ProgramPayroll/Laporan/DaftarPegawaiTidakBeliSeragam', 'App\Http\Controllers\Payroll\Laporan\Harian\Seragam\DPIBS\DPIBSController@index');
Route::get('ProgramPayroll/Laporan/TandaTerimaPenerimaan', 'App\Http\Controllers\Payroll\Laporan\Harian\Seragam\TTP\TTPController@index');
Route::get('ProgramPayroll/Laporan/DaftarGajiLamaBaru', 'App\Http\Controllers\Payroll\Laporan\Harian\DaftarGajiLamaBaru\DaftarGajiLamaBaruController@index');
Route::get('ProgramPayroll/Laporan/Perminggu', 'App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluarMutasi\PerMinggu\PerMingguController@index');
Route::get('ProgramPayroll/Laporan/Perbulan', 'App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluarMutasi\PerBulan\PerBulanController@index');
Route::get('ProgramPayroll/Laporan/KontrakPerbulan', 'App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluarMutasi\KontrakPerBulan\KontrakPerBulanController@index');
Route::get('ProgramPayroll/Laporan/DaftarPegawaiMasukKeluar', 'App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiMasukKeluar\JumlahPegawaiMasukKeluarController@index');
Route::get('ProgramPayroll/Laporan/JumlahPegawaiPerManager', 'App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiPerManager\JumlahPegawaiPerManagerController@index');
Route::get('ProgramPayroll/Laporan/JumlahPegawaiKontrak', 'App\Http\Controllers\Payroll\Laporan\Harian\JumlahPegawaiKontrak\JumlahPegawaiKontrakController@index');
Route::get('ProgramPayroll/Laporan/Daftar3BulanKerja', 'App\Http\Controllers\Payroll\Laporan\Harian\Daftar3BulanKerja\Daftar3BulanKerjaController@index');
Route::get('ProgramPayroll/Laporan/Refrensi', 'App\Http\Controllers\Payroll\Laporan\Harian\Refrensi\RefrensiController@index');
Route::get('ProgramPayroll/Laporan/DaftarTHRHarian', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\DaftarTHRHarian\DaftarTHRHarianController@index');
Route::get('ProgramPayroll/Laporan/TandaTerimaTHR', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\TandaTerimaTHR\TandaTerimaTHRController@index');
Route::get('ProgramPayroll/Laporan/RekapTHRHarian', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\RekapTHRHarian\RekapTHRHarianController@index');
Route::get('ProgramPayroll/Laporan/DaftarGoodWill', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\DaftarGoodWill\DaftarGoodWillController@index');
Route::get('ProgramPayroll/Laporan/RekapGoodWill', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\RekapGoodWill\RekapGoodWillController@index');
Route::get('ProgramPayroll/Laporan/TandaTerimaTHRLgkp', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\TandaTerimaTHRLgkp\TandaTerimaTHRLgkpController@index');
Route::get('ProgramPayroll/Laporan/DaftarTHRHarianLgkp', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\DaftarTHRLgkp\DaftarTHRLgkpController@index');
Route::get('ProgramPayroll/Laporan/SlipTHRHarian', 'App\Http\Controllers\Payroll\Laporan\Harian\THR\SlipTHRHarian\SlipTHRHarianController@index');
Route::get('ProgramPayroll/Laporan/DCT', 'App\Http\Controllers\Payroll\Laporan\DaftarCutiTahunan\DCTController@index');
Route::get('ProgramPayroll/Laporan/SPH', 'App\Http\Controllers\Payroll\Laporan\Koprasi\SlipPotonganHarian\SPHController@index');
Route::get('ProgramPayroll/Laporan/SPS', 'App\Http\Controllers\Payroll\Laporan\Koprasi\SlipPotonganStaff\SPSController@index');

// Payroll Angsuran
Route::get('ProgramPayroll/Angsuran/Hutang', 'App\Http\Controllers\Payroll\Angsuran\MaintenanceHarian\HutangController@index');
Route::get('ProgramPayroll/Angsuran/HutangHarian', 'App\Http\Controllers\Payroll\Angsuran\MaintenancePerusahaan\HutangHarianController@index');
Route::get('ProgramPayroll/Angsuran/AngsuranStaff', 'App\Http\Controllers\Payroll\Angsuran\AngsuranStaff\AHSController@index');
Route::get('ProgramPayroll/Angsuran/AngsuranHutang', 'App\Http\Controllers\Payroll\Angsuran\AngsuranHutang\AngsuranHutangController@index');


// Payroll Maintenance
Route::get('ProgramPayroll/Maintenance/Fik', 'App\Http\Controllers\Payroll\Maintenance\Fik\FikController@index');
Route::get('ProgramPayroll/Maintenance/Fkik', 'App\Http\Controllers\Payroll\Maintenance\Fkik\FkikController@index');



