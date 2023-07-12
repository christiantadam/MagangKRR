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
Route::get('ProgramPayroll/Master/Karyawan/Harian', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanHarianController@index');
Route::get('ProgramPayroll/Master/Karyawan/Keluarga', 'App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController@index');
Route::get('ProgramPayroll/Master/Divisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@index');
Route::get('ProgramPayroll/Master/SettingDivisi/Harian', 'App\Http\Controllers\Payroll\Master\SettingDivisi\HarianController@index');
Route::get('ProgramPayroll/Master/SettingDivisi/Staff', 'App\Http\Controllers\Payroll\Master\SettingDivisi\StaffController@index');
Route::get('ProgramPayroll/Master/Nomer', 'App\Http\Controllers\Payroll\Master\Nomer\NomerController@index');
Route::get('ProgramPayroll/Master/Kartu', 'App\Http\Controllers\Payroll\Master\Kartu\KartuController@index');
Route::get('ProgramPayroll/Master/SettingShift', 'App\Http\Controllers\Payroll\Master\SettingShift\SettingShiftController@index');
Route::get('ProgramPayroll/Master/Klinik', 'App\Http\Controllers\Payroll\Master\Klinik\KlinikController@index');

// Payroll Agenda
Route::get('ProgramPayroll/Agenda/AgendaMasuk/Jam', 'App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaJamController@index');
Route::get('ProgramPayroll/Agenda/AgendaMasuk/Shift', 'App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaShiftController@index');
Route::get('ProgramPayroll/Agenda/TambahAgenda', 'App\Http\Controllers\Payroll\Agenda\TambahAgenda\TambahAgendaController@index');
Route::get('ProgramPayroll/Agenda/UbahAgenda', 'App\Http\Controllers\Payroll\Agenda\UbahAgenda\UbahAgendaController@index');
Route::get('ProgramPayroll/Agenda/HariBesar', 'App\Http\Controllers\Payroll\Agenda\HariBesar\HariBesarController@index');
Route::get('ProgramPayroll/Agenda/GantiShift/Aturan1', 'App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift1Controller@index');
Route::get('ProgramPayroll/Agenda/GantiShift/Aturan2', 'App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift2Controller@index');
Route::get('ProgramPayroll/Agenda/KoreksiShift', 'App\Http\Controllers\Payroll\Agenda\KoreksiShift\KoreksiShiftController@index');
Route::get('ProgramPayroll/Agenda/InsertPegawaiBaru', 'App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaPegawaiBaruController@index');
Route::get('ProgramPayroll/Agenda/InsertSupervisor', 'App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaSupervisorController@index');

// Payroll Transaksi
Route::get('ProgramPayroll/Transaksi/InputCheckClock', 'App\Http\Controllers\Payroll\Transaksi\InputCheckClock\InputCheckClockController@index');
Route::get('ProgramPayroll/Transaksi/TransferAbsen', 'App\Http\Controllers\Payroll\Transaksi\TransferAbsen\TransferAbsenController@index');
Route::get('ProgramPayroll/Transaksi/VerifikasiAbsen', 'App\Http\Controllers\Payroll\Transaksi\VerifikasiAbsen\VerifikasiAbsenController@index');
Route::get('ProgramPayroll/Transaksi/AbsenSimpang', 'App\Http\Controllers\Payroll\Transaksi\AbsenSimpang\AbsenSimpangController@index');
Route::get('ProgramPayroll/Transaksi/Kontrak', 'App\Http\Controllers\Payroll\Transaksi\Kontrak\KontrakController@index');
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
Route::get('ProgramPayroll/Transaksi/Peringatan/AccPermohonan', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController@index');
Route::get('ProgramPayroll/Transaksi/Rekap', 'App\Http\Controllers\Payroll\Transaksi\RekapAbsenLembur\RekapAbsenLemburController@index');
Route::get('ProgramPayroll/Transaksi/EstimasiGaji', 'App\Http\Controllers\Payroll\Transaksi\EstimasiGaji\EstimasiGajiController@index');
Route::get('ProgramPayroll/Transaksi/HitGajiHarian', 'App\Http\Controllers\Payroll\Transaksi\HitGajiHarian\HitGajiHarianController@index');
Route::get('ProgramPayroll/Transaksi/HitTHRHarian', 'App\Http\Controllers\Payroll\Transaksi\HitTHRHarian\HitTHRHarianController@index');
// Payroll Laporan
Route::get('ProgramPayroll/Laporan/Absen/LaporanAbnormal', 'App\Http\Controllers\Payroll\Laporan\Absen\LaporanAbnormal\LaporanAbnormalController@index');
Route::get('ProgramPayroll/Laporan/Absen/DaftarLembur', 'App\Http\Controllers\Payroll\Laporan\Absen\DaftarLemburSupervisor\DaftarLemburSupervisorController@index');
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



