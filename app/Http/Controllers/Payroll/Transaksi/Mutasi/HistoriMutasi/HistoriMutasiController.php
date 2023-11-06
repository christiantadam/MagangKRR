<?php

namespace App\Http\Controllers\Payroll\Transaksi\Mutasi\HistoriMutasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoriMutasiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.Mutasi.HistoriMutasi.historiMutasi', compact('data'));
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
        if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI');
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataDivisi);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $data = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($data);
        }else if ($crExplode[$lastIndex] == "getHistori") {
            $data = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_HISTORY_MUTASI @kd_pegawai = ?', [$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($data);
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
