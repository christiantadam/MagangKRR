<?php

namespace App\Http\Controllers\Payroll\Agenda\KoreksiShift;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KoreksiShiftController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?', [1]);
        // dd($dataShift);
        return view('Payroll.Agenda.KoreksiShift.koreksiShift', compact('dataDivisi', 'dataShift'));
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
        // dd("Masuk Show");
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getShiftAll") {

            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_AGENDA @kddiv = ?, @tanggal1 = ?, @tanggal2 = ?', [$crExplode[0], $crExplode[1], $crExplode[2]]);
            // dd($dataPegawai);
            return response()->json($dataShift);
        } else if ($crExplode[$lastIndex] == "getShiftData") {

            $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?, @shift = ?', [2, $crExplode[0]]);
            // dd($dataShift);
            return response()->json($dataShift);
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
        $data = array_filter($request->all(), 'is_numeric', ARRAY_FILTER_USE_KEY);

        $dataCount = count($data);
        dd($data);
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
        return redirect()->route('settingShift.index')->with('alert', 'Data Pegawai Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
