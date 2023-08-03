<?php

namespace App\Http\Controllers\Payroll\Master\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaryawanKeluargaController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataPISAT = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_PISAT_STATUS ?', [1]);
        return view('Payroll.Master.Karyawan.karyawanKeluarga', compact('data','dataPISAT'));
    }

    public function getDivisi($Kode)
    {
        $dataDivisi = [];

        if ($Kode == 1) {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN ?', [1]);
        } elseif ($Kode == 2) {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_STAFF ?', [1]);
        }

        // Return the options as JSON data
        return response()->json($dataDivisi);
    }

    public function getPegawaiKeluarga($Id_Div)
    {
        $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI ?', [$Id_Div]);
        // Return the options as JSON data
        return response()->json($dataPegawai);
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
        //
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
