<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MnOrdPrs extends Controller
{
    public function index()
    {
        $dataCust = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode=1');


        return view('AdStar.MnOrdPrs', compact('dataCust'));//
    }
}
