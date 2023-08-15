<?php

namespace App\Http\Controllers\Payroll\Master\Kartu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KartuController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        // $records = DB::table('VW_PRG_1486_PAY_LOOK_PEGAWAI')
        //     ->where('Kd_Pegawai','A12001')
        //     ->get();
        // dd($records);
        return view('Payroll.Master.Kartu.kartu', compact('dataDivisi'));
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

        //getDivisi
        if ($crExplode[1] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @id_div = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[1] == "getDataPegawai") {

            //getDataPegawai
            $records = DB::table('VW_PRG_1486_PAY_LOOK_PEGAWAI')
            ->where('Kd_Pegawai',$crExplode[0])
            ->get();
            // dd($records);
            // dd($dataPegawai);
            return response()->json($records);
        } else if ($crExplode[1] == "getDataKeluarga") {
            //getDataKeluarga
            $dataKeluarga = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_MAINT_KELUARGA @kdPeg = ?, @modul = ?', [$crExplode[0], 4]);
            return response()->json($dataKeluarga);
        } else if ($crExplode[1] == "getPegawaiKeluarga") {
            // getPegawaiKeluarga
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI ?', [$crExplode[0]]);
            // Return the options as JSON data
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
