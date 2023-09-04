<?php

namespace App\Http\Controllers\Payroll\Transaksi\KoreksiAbsen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KoreksiAbsenController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ? ',[1]);
        // dd($dataShift);
        return view('Payroll.Transaksi.KoreksiAbsen.koreksiAbsen', compact('dataDivisi','dataShift'));
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
    public function show( $cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @Id_Div = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        }else if ($crExplode[$lastIndex] == "getDataAbsen") {
            $dataAbsen = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_ABSEN_PER_KARYAWAN @kdPegawai = ?,@tglAwal = ?,@tglAkhir = ?,@divisi = ?', [$crExplode[0],$crExplode[1],$crExplode[2],$crExplode[3]]);
            // dd($dataAbsen);
            return response()->json($dataAbsen);
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
