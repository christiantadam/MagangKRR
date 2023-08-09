<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HslPrdPrs extends Controller
{
    public function index()
    {
        $dataMesin = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_MESIN');
        $dataTransaksi = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_HASIL_PRODUKSI');
        $dataOrder = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER');

        return view('AdStar.HslPrdPrs', compact('dataMesin','dataTransaksi','dataOrder'));//
    }
}
