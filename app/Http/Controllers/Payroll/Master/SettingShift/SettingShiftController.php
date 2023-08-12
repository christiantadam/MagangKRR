<?php

namespace App\Http\Controllers\Payroll\Master\SettingShift;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingShiftController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?', [1]);
        // dd($dataShift);
        return view('Payroll.Master.SettingShift.settingShift', compact('dataDivisi', 'dataShift'));
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
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[1] == "getShift") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_DATA_KARYAWAN ?', [$crExplode[0]]);
            // dd($dataPegawai);
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
        $data = $request->all();
        // dd($data);
        // kodeUpd: "simpanPegawai",

        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_UDT_SHIFT @kd_pegawai = ?, @shift = ?, @kddiv = ?', [
            $data['kd_pegawai'],
            $data['shift'],
            $data['kddiv']

        ]);
        return redirect()->route('settingShift.index')->with('alert', 'Data Pegawai Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
