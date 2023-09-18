<?php

namespace App\Http\Controllers\Payroll\Transaksi\KenaikanUpah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KenaikanUpahController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.KenaikanUpah.kenaikanUpah', compact('data'));
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
        if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?', [1] );
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getDataGaji") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_GET_PEGAWAI @Kd_pegawai = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
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

        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_KENAIKANUPAH @kd_pegawai = ?, @U_gol = ?, @T_Jab = ?, @tanggal = ?, @U_gol_lama = ?, @T_jab_lama = ?', [

            $data['kd_pegawai'],
            $data['U_gol'],
            $data['T_Jab'],
            $data['tanggal'],
            $data['U_gol_lama'],
            $data['T_jab_lama']
        ]);
        return redirect()->route('KenaikanUpah.index')->with('alert', 'Data Upah Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
