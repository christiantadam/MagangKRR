<?php

namespace App\Http\Controllers\Payroll\Transaksi\Skorsing\Permohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.Skorsing.Permohonan.permohonan', compact('data'));

    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data , " Masuk store bosq");
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_SKORS @MinDate = ?, @MaxDate = ?, @kd_pegawai = ?, @kode_skors = ?, @keterangan= ?, @id_user= ?', [

            $data['MinDate'],
            $data['MaxDate'],
            $data['kd_pegawai'],
            $data['kode_skors'],
            $data['keterangan'],
            $data['id_user'],

        ]);
        return redirect()->route('Permohonan.index')->with('alert', 'Data klinik berhasil ditambahkan!');
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
