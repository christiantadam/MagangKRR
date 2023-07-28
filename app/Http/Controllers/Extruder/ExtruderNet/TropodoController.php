<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TropodoController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formTropodoOrderMaintenance':
                $form_data = [
                    'listBenang' => $this->getListBenang(2),
                ];
                // dd($form_data);
                break;

            default:
                # code...
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        return view($view_name, $view_data);
    }

    public function getListBenang($kode)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_BENANG @kode = ?',
            [$kode]
        );

        // SP_5298_EXT_LIST_BENANG : PARAMETER @kode int
        // TABLE Inventory - Objek, KelompokUtama, Divisi, Satuan, Type, Sub-Kelompok, Kelompok
        // RETURN NamaType, SatPrimer, SatSekunder, SatTritier
        // *ambil data Type dengan IdSubKelompok yang punya IdKelompokUtama '0121' atau '2481'
    }
}
