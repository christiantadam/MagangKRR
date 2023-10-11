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

/**
 * LAST : btnKoreksi_Click() | frmKonversi.vb
 *
 * User_id = 4384
 *
 * Dokumentasi Alur Kerja Form + Test Case terhadap database lokal
 * Bisa juga dipakai sebagai User Manual
 * https://docs.google.com/document/d/1dRO-LCljmRm9tND8NfYJJTtf_j88ZXvakePGIBnaaJA/edit?usp=sharing
 */

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

Route::get('/Extruder/{pageName?}', [ExtruderController::class, 'index']);
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
