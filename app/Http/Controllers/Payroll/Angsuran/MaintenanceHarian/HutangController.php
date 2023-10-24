<?php

namespace App\Http\Controllers\Payroll\Angsuran\MaintenanceHarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HutangController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Angsuran.MaintenanceHutangPerusahaan.Hutang', compact('data'));
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
        if ($crExplode[$lastIndex] == "getListHutang") {
            $dataHutang = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HUTANG_MASTER @kode = ?', [1]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataHutang);
        }else if ($crExplode[$lastIndex] == "getHutang") {
            $nomorHutang = str_replace('_', '/', $crExplode[0]);
            $dataHutang = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HUTANG_MASTER @kode = ?,@NO_BUKTI = ?', [2,$nomorHutang]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataHutang);
        }else if ($crExplode[$lastIndex] == "getDivisi") {
            $nomorHutang = str_replace('_', '/', $crExplode[0]);
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_STAFF @Kode = ?', [1]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataDivisi);
        }else if ($crExplode[$lastIndex] == "getPegawai") {
            $nomorHutang = str_replace('_', '/', $crExplode[0]);
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataPegawai);
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
