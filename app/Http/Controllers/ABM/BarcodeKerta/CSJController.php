<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CSJController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('BarcodeKerta2.CSJ', compact('data'));
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
        $lasindex = count($crExplode) - 1;

        //getDivisi
        if ($crExplode[1] == "getSJ") {
            $dataSJ = DB::connection('ConnInventory')->select('exec SP_1273_INV_NoSJ');
            // dd($dataSJ);
            // Return the options as JSON data
            return response()->json($dataSJ);
        } else if ($crExplode[$lasindex] == "getListSJ") {
            $dataKirimKRR = DB::connection('ConnInventory')->select('exec SP_1273_INV_DataKirim_KRR @Divisi = ?, @NoSJ = ?, @Tanggal = ?', ["JBR", $crExplode[0], $crExplode[1]]);
            // dd($dataKirimKRR);
            // Return the options as JSON data
            return response()->json($dataKirimKRR);
        } else if ($crExplode[$lasindex] == "getListSJ2") {
            $dataKirimKRR = DB::connection('ConnInventory')->select('exec SP_1273_INV_DataKirim_KRR @Divisi = ?, @NoSJ = ?, @Tanggal = ?', ["ADR", $crExplode[0], $crExplode[1]]);
            // dd($dataKirimKRR);
            // Return the options as JSON data
            return response()->json($dataKirimKRR);
        } else if ($crExplode[$lasindex] == "getListSJ3") {
            $dataKirimKRR = DB::connection('ConnInventory')->select('exec SP_1273_INV_DataKirim_KRR @Divisi = ?, @NoSJ = ?, @Tanggal = ?', ["WBR", $crExplode[0], $crExplode[1]]);
            // dd($dataKirimKRR);
            // Return the options as JSON data
            return response()->json($dataKirimKRR);
        } else if ($crExplode[$lasindex] == "getCetak") {
            $dataPrint = DB::connection('ConnInventory')->table('VW_BCD_1273_KIRIMKRR')
                // ->where('Tanggal',$crExplode[0])
                ->get();
            // dd($dataPrint);
            // dd($dataPegawai);
            return response()->json($dataPrint);
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

        if ($data['opsi'] == "satu") {
            DB::connection('ConnInventory')->statement('exec SP_1273_INV_ambil_counter_sj_mojosari @mode = ?', [
                '5'
            ]);
            return redirect()->route('CSJ.index')->with('alert', 'Data Updated successfully!');


        } else if ($data['opsi'] == "dua") {
            DB::connection('ConnInventory')->statement('exec SP_1273_INV_ambil_counter_sj_mojosari @mode = ? ', [
                '6'
            ]);
            return redirect()->route('CSJ.index')->with('alert', 'Data Updated successfully!');

        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
