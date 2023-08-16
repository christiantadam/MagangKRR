<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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

        // dd($this->getListIdKonv(3, 'KONV0001', 'type1'));

        return view($view_name, $view_data);
    }

    #region Benang - ACC
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

    public function getListProdNG($no_konv) // belum cek db
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
    #endregion
}
