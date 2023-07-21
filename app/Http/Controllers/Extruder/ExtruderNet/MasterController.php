<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        if ($form_name == 'formKomposisiTropodo') {
            $form_data = $this->komposisiTropodo();
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        return view($view_name, $view_data);
    }

    public function komposisiTropodo()
    {
        $id_komposisi = $this->getIdKomposisi('EXT');
        $mesin = $this->getMesin(1);
        $objek = $this->getObjek('EXT');

        return [
            'listIdKomposisi' => $id_komposisi,
            'listMesin' => $mesin,
            'listObjek' => $objek,
        ];
    }

    public function getIdKomposisi($id_divisi, $id_komposisi = null)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_KOMPOSISI_1 @iddivisi = ?, @idkomposisi = ?',
            [$id_divisi, $id_komposisi]
        );

        // If @idkomposisi = null
        // SELECT * FROM MasterKomposisi
        // WHERE IdDivisi=@iddivisi AND IdKomposisi >= 'DEX000013'
        // ORDER BY NamaKomposisi

        // Else
        // SELECT MasterKomposisi.NamaKomposisi, MasterKomposisi.IdMesin, MasterMesin.TypeMesin
        // FROM MasterKomposisi INNER JOIN MasterMesin
        // ON MasterKomposisi.IdMesin = MasterMesin.IdMesin
        // WHERE MasterKomposisi.IdKomposisi = @idkomposisi
        // ORDER BY MasterKomposisi.NamaKomposisi
    }

    public function getMesin($kode)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_MESIN @kode = ?',
            [$kode]
        );

        // If @kode = 1     SELECT * FROM MasterMesin WHERE IdDivisi='EXT'
        // If @kode = 2     SELECT * FROM MasterMesin WHERE IdDivisi='MEX'
        // If @kode = 3     SELECT * FROM MasterMesin WHERE IdDivisi='DEX'
    }

    public function getObjek($id_divisi)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDDIVISI_OBJEK @xiddivisi_objek = ?',
            [$id_divisi]
        );

        // SELECT * FROM objek WHERE IdDivisi_Objek = @xiddivisi_objek
        // ORDER BY NamaObjek
    }

    public function getKelompokUtama($id_objek, $type = null)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDOBJEK_KELOMPOKUTAMA @xidobjek_kelompokutama = ?, @type = ?',
            [$id_objek, $type]
        );

        // If @type = null
        // SELECT NamaKelompokUtama, IdKelompokUtama FROM KelompokUtama
        // WHERE IdObjek_KelompokUtama = @xidobjek_kelompokutama
        // ORDER BY NamaKelompokUtama

        // If @type = '3'
        // SELECT * FROM KelompokUtama
        // WHERE IdObjek_KelompokUtama = @xidobjek_kelompokutama AND IdKelompokUtama = '0213'
        // ORDER BY NamaKelompokUtama
    }

    public function getKelompok($id_kelompok_utama, $type = null)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK @xidkelompokutama_kelompok = ?, @type = ?',
            [$id_kelompok_utama, $type]
        );

        // If @type = null
        // SELECT DISTINCT NamaKelompok, IdKelompok FROM vw_prg_5298_ext_subkel
        // WHERE IdKelompokUtama = @xidkelompokutama_kelompok
        // ORDER BY NamaKelompok ASC

        // If @type = '1'
        // SELECT DISTINCT IdKelompok, NamaKelompok FROM vw_prg_5298_ext_subkel
        // WHERE IdKelompokUtama = @xidkelompokutama_kelompok AND IdKelompok = '001122'
        // ORDER BY NamaKelompok ASC
    }
}
