<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UpKdBrng extends Controller
{
    public function index()
    {
        $dataUpKdBrng = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_KODE_BRG ?', [1],[1],NULL,[2]);
        // dd($dataUpKdBrng);
        return view('AdStar.UpKdBrng', compact('dataUpKdBrng'));//
    }
}
