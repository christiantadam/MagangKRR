<?php

namespace App\Http\Controllers\Payroll\Transaksi\InputRange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InputRangeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI');
        $dataKlinik = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_KLINIK ');
        return view('Payroll.Transaksi.InputRange.inputRange', compact('dataDivisi', 'dataKlinik'));
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
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "cekLembur") {
            $ada = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_JML_LEMBUR @tanggal = ? , @kdpegawai = ?', [$crExplode[1],$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($ada);
        }else if ($crExplode[$lastIndex] == "getAgenda") {
            $ada = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_AGENDA @kdPegawai = ? , @tanggal = ?', [$crExplode[0],$crExplode[1]]);
            // dd($ada);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($ada);
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
