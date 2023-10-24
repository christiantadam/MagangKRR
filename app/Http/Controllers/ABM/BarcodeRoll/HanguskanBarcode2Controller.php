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
        $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XKdUser = ?,@XIdDivisi = ?', ["4384", "ABM"]);
        // $dataDivisi2 = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U002", NULL, NULL, NULL, NULL]);

        // dd($dataObjek);

        return view('BarcodeRollWoven.HanguskanBarcode2', compact('dataObjek'));
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
        if ($crExplode[1] == "txtIdObjek") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_INV_ListBarcode_BlmKirim @Kode = ?, @status = ?, @idobjek = ?', ["1", "1", $crExplode[0]]);
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
