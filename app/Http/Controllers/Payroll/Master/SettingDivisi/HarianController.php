<?php

namespace App\Http\Controllers\Payroll\Master\SettingDivisi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HarianController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN ? ', [1]);
        $dataManager = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER');
        $dataSupervisor = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA2');
        // dd($dataSupervisor);
        return view('Payroll.Master.SettingDivisi.settingHarian', compact('dataDivisi', 'dataManager', 'dataSupervisor'));
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
        if ($crExplode[1] == "getData") {
            $data = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SET_DIVISI_HARIAN @Id_Div = ?', [$crExplode[0]]);
            // dd($data);
            return response()->json($data);
        } else if ($crExplode[1] == "getDataPegawai") {

            //getDataPegawai
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_MAINT_PEKERJA @kdpeg = ?, @modul = ?', [$crExplode[0], 2]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
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
        $data = $request->all();
        dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_DIVISI2 @idDiv = ?, @IdMngr = ?, @IdSpv = ?', [

            $data['idDiv'],
            $data['IdMngr'],
            $data['IdSpv']
        ]);
        return redirect()->route('settingDivisiHarian.index')->with('alert', 'Data Divisi Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
