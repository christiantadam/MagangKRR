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

        return [
            'idKomposisi' => $id_komposisi,
            'mesin' => $mesin,
        ];
    }

    public function getIdKomposisi($id_divisi)
    {
        return DB::connection('ConnExtruder')->select('exec SP_5298_EXT_LIST_KOMPOSISI_1 @iddivisi = ?', [$id_divisi]);
    }

    public function getMesin($kode)
    {
        return DB::connection('ConnExtruder')->select('exec SP_5298_EXT_LIST_MESIN @kode = ?', [$kode]);
    }
}
