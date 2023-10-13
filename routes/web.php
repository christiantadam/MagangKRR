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

// Payroll Main
Route::get('Payroll', 'App\Http\Controllers\Payroll\HomeController@index');
Route::resource('CobaCoba', App\Http\Controllers\CobacobaController::class);
// Payroll Master
Route::resource('KaryawanHarian', App\Http\Controllers\Payroll\Master\Karyawan\KaryawanHarianController::class);
Route::resource('KaryawanKeluarga', App\Http\Controllers\Payroll\Master\Karyawan\KaryawanKeluargaController::class);
Route::resource('MasterNomer', App\Http\Controllers\Payroll\Master\Nomer\NomerController::class);
Route::resource('MasterKartu', App\Http\Controllers\Payroll\Master\Kartu\KartuController::class);
Route::resource('settingDivisiHarian', App\Http\Controllers\Payroll\Master\SettingDivisi\HarianController::class);
Route::resource('settingDivisiStaff', App\Http\Controllers\Payroll\Master\SettingDivisi\StaffController::class);
Route::resource('settingShift', App\Http\Controllers\Payroll\Master\SettingShift\SettingShiftController::class);
Route::resource('MasterKlinik', App\Http\Controllers\Payroll\Master\Klinik\KlinikController::class);
Route::get('ProgramPayroll/Master/Divisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@index')->name('divisi.index');
Route::post('ProgramPayroll/Master/insertDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@InsertDivisi');
Route::post('ProgramPayroll/Master/updateDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@UpdateDivisi');
Route::post('ProgramPayroll/Master/deleteDivisi', 'App\Http\Controllers\Payroll\Master\Divisi\DivisiController@deleteDivisi');

//Payroll Agenda
Route::resource('AgendaMasuk/Jam', App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaJamController::class);
Route::resource('AgendaMasuk/AgendaShift', App\Http\Controllers\Payroll\Agenda\AgendaMasuk\AgendaShiftController::class);
Route::resource('TambahAgenda', App\Http\Controllers\Payroll\Agenda\TambahAgenda\TambahAgendaController::class);
Route::resource('UbahAgenda', App\Http\Controllers\Payroll\Agenda\UbahAgenda\UbahAgendaController::class);
Route::resource('HariBesar', App\Http\Controllers\Payroll\Agenda\HariBesar\HariBesarController::class);
Route::resource('InsertSupervisor', App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaSupervisorController::class);
Route::resource('InsertPegawaiBaru', App\Http\Controllers\Payroll\Agenda\InsertAgenda\InsertAgendaPegawaiBaruController::class);
Route::resource('KoreksiShift', App\Http\Controllers\Payroll\Agenda\KoreksiShift\KoreksiShiftController::class);
Route::resource('GantiShift/Aturan1_3', App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift1Controller::class);
Route::resource('GantiShift/Aturan2', App\Http\Controllers\Payroll\Agenda\GantiShift\GantiShift2Controller::class);
//Payroll Transaksi
Route::resource('AbsenSimpang', App\Http\Controllers\Payroll\Transaksi\AbsenSimpang\AbsenSimpangController::class);
Route::resource('Kontrak', App\Http\Controllers\Payroll\Transaksi\Kontrak\KontrakController::class);
Route::resource('KoreksiAbsen', App\Http\Controllers\Payroll\Transaksi\KoreksiAbsen\KoreksiAbsenController::class);
Route::resource('InputRange', App\Http\Controllers\Payroll\Transaksi\InputRange\InputRangeController::class);
Route::resource('Lembur', App\Http\Controllers\Payroll\Transaksi\Lembur\LemburController::class);
Route::resource('CheckClockError', App\Http\Controllers\Payroll\Transaksi\CheckClockError\CheckClockErrorController::class);
Route::resource('CheckClockInOut', App\Http\Controllers\Payroll\Transaksi\CheckClockInOut\CheckClockInOutController::class);
Route::resource('MaintenancePelatihan', App\Http\Controllers\Payroll\Transaksi\MaintenancePelatihan\MaintenancePelatihanController::class);
Route::resource('MaintenanceKoreksi', App\Http\Controllers\Payroll\Transaksi\MaintenanceKoreksi\MaintenanceKoreksiController::class);
Route::resource('Koperasi', App\Http\Controllers\Payroll\Transaksi\Koperasi\KoperasiController::class);
Route::resource('MaintenanceResign', App\Http\Controllers\Payroll\Transaksi\MaintenanceResign\MaintenanceResignController::class);
Route::resource('KenaikanUpah', App\Http\Controllers\Payroll\Transaksi\KenaikanUpah\KenaikanUpahController::class);
Route::resource('Skorsing/Permohonan', App\Http\Controllers\Payroll\Transaksi\Skorsing\Permohonan\PermohonanController::class);
Route::resource('Skorsing/AccBayar', App\Http\Controllers\Payroll\Transaksi\Skorsing\AccBayar\AccBayarController::class);
Route::resource('Peringatan/Permohonan', App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController::class);
Route::resource('ProsesGajiStaff', App\Http\Controllers\Payroll\Transaksi\ProsesGaji\ProsesGajiController::class);
Route::resource('Rekap', App\Http\Controllers\Payroll\Transaksi\RekapAbsenLembur\RekapAbsenLemburController::class);
Route::resource('EstimasiGaji', App\Http\Controllers\Payroll\Transaksi\EstimasiGaji\EstimasiGajiController::class);
Route::resource('HitGajiHarian', App\Http\Controllers\Payroll\Transaksi\HitGajiHarian\HitGajiHarianController::class);
Route::resource('HitTHRHarian', App\Http\Controllers\Payroll\Transaksi\HitTHRHarian\HitTHRHarianController::class);
Route::resource('InputCheckClock', App\Http\Controllers\Payroll\Transaksi\InputCheckClock\InputCheckClockController::class);
Route::resource('TransferAbsen', App\Http\Controllers\Payroll\Transaksi\TransferAbsen\TransferAbsenController::class);
Route::resource('VerifikasiAbsen', App\Http\Controllers\Payroll\Transaksi\VerifikasiAbsen\VerifikasiAbsenController::class);
Route::get('getPegawai/{Id_Div}', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan\PermohonanPeringatanController@getPegawai');
Route::resource('Transaksi/InputLibur', App\Http\Controllers\Payroll\Transaksi\InputLibur\InputLiburController::class);
Route::resource('Transaksi/Mutasi/Harian', App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiHarian\MutasiHarianController::class);
Route::resource('Transaksi/Mutasi/Staff', App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiStaff\MutasiStaffController::class);
Route::resource('Transaksi/Mutasi/Histori', App\Http\Controllers\Payroll\Transaksi\Mutasi\HistoriMutasi\HistoriMutasiController::class);
Route::resource('Transaksi/Absen1', App\Http\Controllers\Payroll\Transaksi\Absen1\Absen1Controller::class);
Route::resource('Peringatan/AccPermohonan', App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController::class);
Route::post('ProgramPayroll/Transaksi/Peringatan/AccPermohonan/proses-peringatan', 'App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan\AccPermohonanController@prosesPeringatan')->name('prosesPeringatan');

//Payroll Laporan
Route::resource('LaporanAbnormal', App\Http\Controllers\Payroll\Laporan\Absen\LaporanAbnormal\LaporanAbnormalController::class);
Route::resource('FormDaftarHadir', App\Http\Controllers\Payroll\Laporan\Staff\FormDaftarHadir\FormDaftarHadirController::class);
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





