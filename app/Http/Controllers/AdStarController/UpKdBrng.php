<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UpKdBrng extends Controller
{
    public function index()
    {
        $dataUpKdBrng = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_KODE_BRG @Kode=1');
        // $dataUpKdBrng2 = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_KODE_BRG @Kode=2, @nama=:nama', ['nama' => substr(nama-barang.value, 3, 4) // Mengambil substring dari Nama_Brg.Text]);
        // dd($dataUpKdBrng);
        return view('AdStar.UpKdBrng', compact('dataUpKdBrng'));//
    }
}
