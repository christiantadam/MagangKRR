<?php

namespace App\Http\Controllers\Payroll\Transaksi\Koperasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KoperasiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.Koperasi.koperasi', compact('data'));
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
        if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1003_KOP_LIHAT_DIVISI');
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?, @modul = ?', [$crExplode[0], 5]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getNoKoperasi") {
            $dataKop = DB::connection('ConnPayroll')->select('exec SP_5409_KOP_GET_NOKOP @Kd_Pegawai = ?', [$crExplode[0]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataKop);
        } else if ($crExplode[$lastIndex] == "getPegawaiBaru") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?, @modul = ?', [$crExplode[0], 2]);
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

        DB::connection('ConnPayroll')->statement('exec SP_KOPPAY_TRANSFER_NOKOP @old_kd_pegawai = ?, @new_kd_pegawai = ?', [
            $data['old_kd_pegawai'],
            $data['new_kd_pegawai'],



        ]);
        return redirect()->route('Koperasi.index')->with('alert', 'Nomor koperasi berhasil ditransfer!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
