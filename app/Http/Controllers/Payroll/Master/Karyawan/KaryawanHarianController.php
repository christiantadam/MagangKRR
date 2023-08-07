<?php

namespace App\Http\Controllers\Payroll\Master\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaryawanHarianController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataPosisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_POSISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_SHIFT ');
        return view('Payroll.Master.Karyawan.karyawanHarian', compact('dataPosisi', 'dataShift'));

    }

    public function getDivisi($Posisi)
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?, @pos = ?', [4, $Posisi]);

        // Return the options as JSON data
        return response()->json($dataDivisi);
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
        // dd($cr);
        //getDivisi
        if ($crExplode[1] == "getDivisi") {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?, @pos = ?', [4, $crExplode[0]]);
            // dd($dataDivisi);
            // Return the options as JSON data
            return response()->json($dataDivisi);
        } else if ($crExplode[1] == "getNamaPegawai") {

            //getDataPegawai
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[1] == "getShift") {
            //getDataKeluarga
            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_SHIFT ');
            return response()->json($dataShift);
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
