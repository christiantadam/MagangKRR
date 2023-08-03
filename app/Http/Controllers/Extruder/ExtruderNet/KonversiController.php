<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonversiController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'nama form disini':
                $form_data = [];
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

    #region Konversi - Permohonan
    public function getListKomposisi($id_komposisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_KOMPOSISI_BAHAN @idkomposisi = ?',
            [$id_komposisi]
        );

        // PARAMETER @idkomposisi char(9)
        // TABLE Extruder - MasterKomposisi, KomposisiBahan; Inventory - Type
        // SELECT : KomoposisiBahan.*
        // *ambil data yang type-nya -> nonaktif = 'Y'
    }

    public function getSatuan($id_type)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_GET_SATUAN @idtype = ?',
            [$id_type]
        );

        // PARAMETER @idtype varchar(20)
        // TABLE Inventory - Satuan, Type
        // SELECT : *
    }
    #endregion
}
