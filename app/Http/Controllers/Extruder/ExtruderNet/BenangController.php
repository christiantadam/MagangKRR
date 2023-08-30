<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BenangController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formBenangMohon':
                $current_date = Carbon::now();
                $formatted_date = $current_date->format('Y-m-d');

                $form_data = ['listNomor' => $this->getKoreksiSrtBlmAcc($formatted_date)];
                break;

            default:
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        return view($view_name, $view_data);
    }

    #region Benang - ACC
    public function getListIdKonversiNG($tanggal1, $tanggal2, $kode = null)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_IDKONVERSI_NG @Tanggal1 = ?, @Tanggal2 = ?, @kode = ?',
            [$tanggal1, $tanggal2, $kode]
        );

        // PARAMETER - @Tanggal1 datetime, @Tanggal2 datetime, @kode char(1) = null
    }

    public function getDetailDataBenangNG($id_konversi_ng)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_DETAILDATA_BENANG_N @IdKonversiNG = ?',
            [$id_konversi_ng]
        );

        // PARAMTER - @IdKonversiNG int

        // IdKonversiNG = 1, 2, 3, 4, 5

        // *VW_PRG_5298_EXT_DETAILDATA_BENANG_NG
        // - INVENTORY.dbo.VW_PRG_5298_EXT_SUBKEL
        // - INVENTORY.dbo.VW_PRG_5298_EXT_TYPE
        // - INVENTORY.dbo.VW_PRG_5298_EXT_TMPTRANSAKSI
        // - VW_PRG_5298_EXT_KONVERSI_SORTIR
        // => WHERE VW_PRG_5298_EXT_KONVERSI_SORTIR.SaatLog IS NULL

        // **INVENTORY.dbo.VW_PRG_5298_EXT_SUBKEL
        // Divisi - Objek - KelompokUtama - Kelompok - SubKelompok

        // **INVENTORY.dbo.VW_PRG_5298_EXT_TYPE
        // Type

        // **INVENTORY.dbo.VW_PRG_5298_EXT_TMPTRANSAKSI
        // Tmp_Transaksi (FK | IdType - Type, IdTypeTransaksi - TypeTransaksi)

        // **VW_PRG_5298_EXT_KONVERSI_SORTIR
        // DetailKonversiNG - IdKonversiNG(MasterKonversiNG)
    }

    public function getPenyesuaianTransaksi($kode = null, $id_type = null, $id_type_transaksi = null, $id_transaksi = null, $kode_barang = null, $id_sub_kel = null)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_CHECK_PENYESUAIAN_TRANSAKSI @Kode = ?, @idtype = ?, @idtypetransaksi = ?, @Idtransaksi = ?, @KodeBarang = ?, @idSubKel = ?',
            [$kode, $id_type, $id_type_transaksi, $id_transaksi, $kode_barang, $id_sub_kel]
        );

        // PARAMETER - @Kode char(1)=null, @idtype  varchar(20) =null, @idtypetransaksi  varchar(2) = null, @Idtransaksi int =null, @KodeBarang varchar(10) =null, @idSubKel char(6)=null
    }

    public function getTransaksiKonversiNG($id_konv_ng)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5409_EXT_DISPLAY_TRANSAKSI_KONVERSI_NG @idkonvNG = ?',
            [$id_konv_ng]
        );

        // PARAMETER - @idkonvNG  varchar(14)
    }

    public function updProsesACCKonversi($id_transaksi, $id_type, $user_acc, $waktu_acc = null, $keluar_primer, $keluar_sekunder, $keluar_tritier, $masuk_primer, $masuk_sekunder, $masuk_tritier)
    {
        return DB::connection('ConnInventory')->statement(
            'exec SP_5298_EXT_PROSES_ACC_KONVERSI @XIdTransaksi = ?, @XIdType = ?, @XUserACC = ?, @XWaktuACC = ?, @XKeluarPrimer = ?, @XKeluarSekunder = ?, @XKeluarTritier = ?, @XMasukPrimer = ?, @XMasukSekunder = ?, @XMasukTritier = ?',
            [$id_transaksi, $id_type, $user_acc, $waktu_acc, $keluar_primer, $keluar_sekunder, $keluar_tritier, $masuk_primer, $masuk_sekunder, $masuk_tritier]
        );

        // PARAMETER - @XIdTransaksi  integer, @XIdType  varchar(20), @XUserACC char(7), @XWaktuACC  datetime = null, @XKeluarPrimer  numeric(9,2), @XKeluarSekunder  numeric(9,2), @XKeluarTritier  numeric(9,2), @XMasukPrimer  numeric(9,2), @XMasukSekunder  numeric(9,2), @XMasukTritier  numeric(9,2)
    }

    public function updACCKonversiNG($id_konversi_ng, $user_acc)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_ACC_KONVERSI_NG @IdKonversiNG = ?, @UserAcc = ?',
            [$id_konversi_ng, $user_acc]
        );

        // PARAMETER - @IdKonversiNG int, @UserAcc char(7)
    }
    #endregion

    #region Benang - Permohonan
    public function getListDataNG($id_konversi, $tanggal)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LISTDATA_NG @IdKonversi = ?, @Tanggal = ?',
            [$id_konversi, $tanggal]
        );

        // dd($this->getDataNG(1, 'KONV0001', 'TYPE001'));

        // PARAMETER - @IdKonversi int, @Tanggal datetime
        // MasterKonversiEXT - IdKonversi(MasterKonversiNG), IdKomposisi(MasterKomposisi)
        // MasterKonversiNG - IdKonversiNG(DetailKonversiNG)
        // *parameter @IdKonversi dipakai oleh MasterKonversiNG.IdKonversiNG
    }

    public function getDetailUraianKonvNG($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_DETAILURAIAN_KONV_NG @IdKonversi = ?',
            [$id_konversi]
        );
        // INV0003

        // PARAMETER - @IdKonversi char(9)
        // ===
        // EXTRUDER | DetailKonversiNG - IdKonversiNG(MasterKonversiNG),
        // IdKonversiINV(VW_PRG_5298_EXT_TMPTRANSAKSI_1.IdKonversi)
        // ===
        // INVENTORY | VW_PRG_5298_EXT_TMPTRANSAKSI_1
        // Tmp_Transaksi - IdPenerima/IdPemberi(UserLogin.KoderUser),
        // IdType(VW_PRG_5298_EXT_TYPE_LENGKAP.IdType),
        // TujuanIdSubKelompok(VW_PRG_5298_EXT_SUBKEL.IdSubKelompok)
        // ===
        // INVENTORY | VW_PRG_5298_EXT_TYPE_LENGKAP
        // Type - UnitPrimer/Sekunder/Tritier(Satuan.no_satuan),
        // IdSubKelompok_Type(SubKelompok.IdSubKelompok)
        // SubKelompok - IdKelompok_SubKelompok(Kelompok.IdKelompok),
        // Kelompok - IdKelompokUtama_Kelompok(KelompokUtama.IdKelompokUtama)
        // KelompokUtama - IdObjek_KelompokUtama(Objek.IdObjek)
        // Objek - IdDivisi_Objek(Divisi.IdDivisi)
    }

    public function getKoreksiSrtBlmAcc($tanggal)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_KOREKSI_SORTIRNG_BLMACC @Tanggal = ?',
            [$tanggal]
        );

        // PARAMETER - @Tanggal datetime
        // MasterKonversiNG - IdKonversiNG(DetailKonversiNG), IdKonversiEXT(MasterKonversiEXT.IdKonversi)
        // MasterKonversiEXT - IdMesin(MasterMesin)
        // WHERE saatlog is null AND useracc is null
    }

    public function getListProdNG($no_konv)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_PROD_NG @NoKonv = ?',
            [$no_konv]
        );

        // PARAMETER - @NoKonv char(14)
        // MasterKonversiEXT - IdKonversi(DetailKonversiEXT), IdMesin(MasterMesin)
        // DetailKonversiEXT - IdType(KomposisiBahan)
        // KomposisiBahan - IdKomposisi(MasterKomposisi)
        // MasterKomposisi - IdKomposisi(MasterKonversiEXT)
        // WHERE KomposisiBahan.StatusType = 'HP' AND KomposisiBahan.NamaType LIKE '%NG%'
    }

    public function getDataNG($kode, $no_konv, $id_type)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_CEK_DATA_NG @kode = ?, @noKonv = ?, @idType = ?',
            [$kode, $no_konv, $id_type]
        );

        // PARAMETER - @kode int, @noKonv char(14), @idType varchar(20)
        // DetailKonversiNG - MasterKonversiNG(IdKonversiNG)
    }

    public function getListIdKonv($kode, $id_konversi = null, $id_type = null, $id_divisi = null, $tanggal = null, $shift = null)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_IDKONV @Kode = ?, @IdDivisi = ?, @Tanggal = ?, @Shift = ?, @IdKonversi = ?, @idType = ?',
            [$kode, $id_divisi, $tanggal, $shift, $id_konversi, $id_type]
        );

        // dd($this->getListIdKonv(3, 'KONV0001', 'type1'));

        // PARAMETER - @Kode int, @IdDivisi char(3)=null, @Tanggal datetime=null, @Shift char(2)=null, @IdKonversi char(14)=null, @idType char(20)=null
        // MesterKonversiEXT - IdKonversi(DetailKonversiEXT), IdMesin(MasterMesin), IdKomposisi(MasterKomposisi)
        // MasterKomposisi - IdKomposisi(KomposisiBahan)
        // DetailKonversiEXT - IdType(KomposisiBahan)
    }

    public function getIdKonversiNG()
    {
        $idKonversiNG = MasterKonversiNG::on('ConnExtruder')
            ->select('IdKonversiNG')
            ->first()
            ->IdKonversiNG;

        return response()->json(['IdKonversiNG' => $idKonversiNG]);

        // *Query SELECT pada SP_5298_EXT_INSERT_MASTERKONV_NG
    }

    public function getListCounter()
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_LIST_COUNTER'
        );
    }

    public function insMasterKonvNG($tanggal, $user_input, $id_konversi_ext)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_MASTERKONV_NG @Tanggal = ?, @UserInput = ?, @IdKonversiEXT = ?',
            [$tanggal, $user_input, $id_konversi_ext]
        );

        // PARAMETER - @Tanggal datetime, @UserInput Char(7), @IdKonversiEXT Char(14)
    }

    public function insDetailKonvNG($id_konversi_ng, $id_type, $jumlah_primer, $jumlah_sekunder, $jumlah_tritier, $id_konv_inv = null)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_DETAILKONV_NG @IdKonversiNG = ?, @IdType = ?, @JumlahPrimer = ?, @JumlahSekunder = ?, @JumlahTritier = ?, @IdKonv_Inv = ?',
            [$id_konversi_ng, $id_type, $jumlah_primer, $jumlah_sekunder, $jumlah_tritier, $id_konv_inv]
        );

        // PARAMETER - @IdKonversiNG int, @IdType varchar(20), @JumlahPrimer numeric(9,2), @JumlahSekunder numeric(9,2), @JumlahTritier numeric(9,2), @IdKonv_Inv varchar(10) = null
    }

    public function insAsalTmpTrans($id_type_transaksi, $uraian_detail_transaksi, $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $asal_sub_kel, $id_konversi)
    {
        return DB::connection('ConnInventory')->statement(
            'exec SP_5298_EXT_INSERT_04_ASALTMPTRANSAKSI @XIdTypeTransaksi = ?, @XUraianDetailTransaksi = ?, @XIdType = ?, @XIdPemohon = ?, @XSaatawalTransaksi = ?, @XJumlahKeluarPrimer = ?, @XJumlahKeluarSekunder = ?, @XJumlahKeluarTritier = ?, @XAsalsubKel = ?, @XIdKonversi = ?',
            [$id_type_transaksi, Str::title(str_replace('_', ' ', $uraian_detail_transaksi)), $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $asal_sub_kel, $id_konversi]
        );

        // PARAMETER - @XIdTypeTransaksi  char(2), @XUraianDetailTransaksi  varchar(50), @XIdType  varchar(20), @XIdPemohon  char(7), @XSaatawalTransaksi  datetime, @XJumlahKeluarPrimer  numeric(15,2), @XJumlahKeluarSekunder numeric(15,2), @XJumlahKeluarTritier numeric(15,2), @XAsalsubKel  char(6), @XIdKonversi  char(9)
    }

    public function insTujuanTmpTrans($id_type_transaksi, $uraian_detail_transaksi, $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $tujuan_sub_kel, $id_konversi)
    {
        return DB::connection('ConnInventory')->statement(
            'exec SP_5298_EXT_INSERT_04_TUJUANTMPTRANSAKSI @XIdTypeTransaksi = ?, @XUraianDetailTransaksi = ?, @XIdType = ?, @XIdPemohon = ?, @XSaatawalTransaksi = ?, @XJumlahKeluarPrimer = ?, @XJumlahKeluarSekunder = ?, @XJumlahKeluarTritier = ?, @XTujuansubKel = ?, @XIdKonversi = ?',
            [$id_type_transaksi, Str::title(str_replace('_', ' ', $uraian_detail_transaksi)), $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $tujuan_sub_kel, $id_konversi]
        );

        // PARAMETER - @XIdTypeTransaksi  char(2), @XUraianDetailTransaksi  varchar(50), @XIdType  varchar(20), @XIdPemohon  char(7), @XSaatawalTransaksi  datetime, @XJumlahKeluarPrimer  numeric(15,2), @XJumlahKeluarSekunder numeric(15,2), @XJumlahKeluarTritier numeric(15,2), @XtujuansubKel  char(6), @XIdKonversi  char(9)
    }

    public function updDetailKonvNG($id_konversi, $id_type, $j_primer, $j_sekunder, $j_tritier)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_UPDATE_DETAIL_KONV_NG @idkonversi = ?, @idType = ?, @jprimer = ?, @jsekunder = ?, @jtritier = ?',
            [$id_konversi, $id_type, $j_primer, $j_sekunder, $j_tritier]
        );

        // PARAMETER - @idkonversi int, @idType varchar(20), @jprimer numeric(18,2), @jsekunder numeric(18,2), @jtritier numeric(18,2)
    }

    public function updTmpTransaksi($id_transaksi, $uraian_detail_transaksi = null, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $tujuan_sub_kelompok = null)
    {
        return DB::connection('ConnInventory')->statement(
            'exec SP_5298_EXT_UPDATE_TMPTRANSAKSI @XIdTransaksi = ?, @XUraianDetailTransaksi = ?, @XJumlahKeluarPrimer = ?, @XJumlahKeluarSekunder = ?, @XJumlahKeluarTritier = ?, @XTujuanSubKelompok = ?',
            [$id_transaksi, $uraian_detail_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $tujuan_sub_kelompok]
        );

        // PARAMETER - @XIdTransaksi       int, @XUraianDetailTransaksi varchar (150) = null, @XJumlahKeluarPrimer numeric (9,2), @XJumlahKeluarSekunder numeric (9,2), @XJumlahKeluarTritier numeric (9,2), @XTujuanSubKelompok char (6) =null
    }

    public function delKonversiNG($id_konversi)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5409_EXT_DELETE_KONVERSI_NG @idkonversi = ?',
            [$id_konversi]
        );

        // PARAMETER - @idkonversi varchar(14)
    }
    #endregion

    #region Form Rincian Konversi
    public function getIdObjekKelUtama($id_objek_kelompok_utama, $type = null)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA @Xidobjek_kelompokutama = ?, @Type = ?',
            [$id_objek_kelompok_utama, $type]
        );

        // dd($this->getIdObjKelUtama("032", "3"));

        // PARAMETER - @Xidobjek_kelompokutama  varchar(4), @Type char(1) = null
    }

    public function geIdKelUtamaKelompok($id_kelompok_utama_kelompok, $type = null)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK @XIdKelompokUtama_Kelompok = ?, @type = ?',
            [$id_kelompok_utama_kelompok, $type]
        );

        // PARAMETER - @XIdKelompokUtama_Kelompok    char (4), @type char(1)=null
    }

    public function getIdKelSubKelompok($id_kelompok_sub_kelompok)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDKELOMPOK_SUBKELOMPOK @XIdKelompok_SubKelompok = ?',
            [$id_kelompok_sub_kelompok]
        );

        // PARAMETER - @XIdKelompok_SubKelompok    char (6)
    }

    public function getIdSubKelompokType($id_sub_kelompok_type)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDSUBKELOMPOK_TYPE @XIdSubKelompok_Type = ?',
            [$id_sub_kelompok_type]
        );

        // PARAMTER - @XIdSubKelompok_Type     char (6)
    }

    public function getSaldoBarang($id_type)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_SALDO_BARANG @IdType = ?',
            [$id_type]
        );

        // PARAMETER - @IdType char(20)
    }
    #endregion
}
