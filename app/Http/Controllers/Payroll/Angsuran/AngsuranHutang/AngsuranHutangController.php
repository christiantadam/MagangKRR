<?php

namespace App\Http\Controllers\Payroll\Angsuran\AngsuranHutang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AngsuranHutangController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Angsuran.AngsuranHutang.AngsuranHutang', compact('data'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($crExplode);
        if ($crExplode[$lastIndex] == "cekTanggal") {
            $listData = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_TANGGAL_ANGSURAN @Tanggal = ?, @Kode = ?', [$crExplode[0],3]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($listData);
        }else if ($crExplode[$lastIndex] == "getListData") {
            $dataHutang = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HUTANG_HARIAN @Tanggal = ?', [$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataHutang);
        }
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request)
    {
        //
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
