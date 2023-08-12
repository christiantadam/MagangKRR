<?php

namespace App\Http\Controllers\Payroll\Master\SettingDivisi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataManager = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER ');
        // dd($dataManager);
        return view('Payroll.Master.SettingDivisi.settingStaff', compact('dataManager'));
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
        // dd($cr);


        $dataStaff = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_SEMUA_STAFF');

        return response()->json($dataStaff);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request)
    {
        $data = array_filter($request->all(), 'is_numeric', ARRAY_FILTER_USE_KEY);

        $dataCount = count($data);
        // dd($dataCount);
        for ($i = 0; $i < $dataCount; $i++) {
            $dataItem = $data[$i];
            $explodedData = explode('.', $dataItem);

            if (count($explodedData) >= 3) {
                $id_div = $explodedData[0];
                $kd_manager = $explodedData[1];
                $kd_pegawai = $explodedData[2];

                // Eksekusi prosedur simpan dalam database
                DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_PEG_DIV_MANAGER  @id_div = ?, @kd_manager = ?, @kd_pegawai = ?', [
                    $id_div,
                    $kd_manager,
                    $kd_pegawai
                ]);
            }
        }

        return redirect()->route('settingDivisiStaff.index')->with('alert', 'Data Divisi Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
