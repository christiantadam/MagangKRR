<?php

namespace App\Http\Controllers\Extruder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ExtruderController extends Controller
{
    public function index($pageName = "index", $formName = "index")
    {
        $id_komposisi = DB::connection('ConnExtruder')->select('exec SP_5298_EXT_LIST_KOMPOSISI_1 @iddivisi = ?', ['EXT']);
        // dd($id_komposisi);
        $viewName = $pageName == "index"
            ? 'extruder.index'
            : 'extruder.' . $pageName . '.index';
        $viewName = $formName == "index"
            ? $viewName
            : 'extruder.' . $pageName . '.' . $formName;

        $viewData = [
            'pageName' => $pageName,
            'formName' => $formName,
        ];

        return view($viewName, $viewData, compact('id_komposisi'));
    }
}
