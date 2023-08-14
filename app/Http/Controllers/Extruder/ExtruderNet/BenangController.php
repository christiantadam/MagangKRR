<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BenangController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'nama form di sini':
                $form_data = ['nama list' => $this->fungsi()];
                break;

            default:
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        // dd($this->getListDataNG(1, '2023-07-26 00:00:00.000'));

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
    #endregion
}
