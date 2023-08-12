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
        $dataTransaksi = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_HASIL_PRODUKSI @Kode=1 @tanggal=' );
        $dataOrder = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode=5');

        return view('AdStar.HslPrdPrs', compact('dataMesin','dataOrder'));//
    }
    // ,'?\dataTransaksi','dataOrder'
}
