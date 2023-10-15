<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HanguskanBarcode2Controller extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U001", NULL, NULL, NULL, NULL]);
        $dataDivisi2 = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U002", NULL, NULL, NULL, NULL]);
        // $dataDivisi3 = DB::connection('ConnInventory')->select('exec SP_1273_INV_ListBarcodeACC @status=?, @idobjek=?', ["1", "MST"]);
        // dd($dataDivisi3);

        return view('BarcodeKerta2.HanguskanBarcode', compact('dataDivisi', 'dataDivisi2'));
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
        if ($crExplode[1] == "txtIdDivisi") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_INV_ListBarcodeACC @status = ?, @idobjek = ?', ["1", $crExplode[0]]);
            // dd($dataKelut);
            // Return the options as JSON data
            return response()->json($dataType);
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

        DB::connection('ConnInventory')->statement('exec SP_5409_INV_PenghangusanBarcode @kodebarang = ?, @noindeks = ?, @userid = ?', [
            $data['kodebarang'],
            $data['noindeks'],
            'U001'

        ]);
        return redirect()->route('HanguskanBarcode.index')->with('alert', 'Data Updated successfully!');
    }
}
