<?php

namespace App\Http\Controllers\ABM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintUlang2Controller extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('PrintUlang2', compact('data'));
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
        if ($crExplode[$lasindex] == "getBarcodePrintUlang") {
            $dataBarcode = DB::connection('ConnInventory')->select('exec SP_1273_INV_Data_PrintUlang @KodeBarang = ?, @NoIndeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataBarcode);
            // Return the options as JSON data
            return response()->json($dataBarcode);
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
        // $data = $request->all();
        // // dd($data);
        // // kodeUpd: "simpanPegawai",

        // DB::connection('ConnInventory')->statement('exec SP_5409_INV_PenghangusanBarcode @kodebarang = ?, @noindeks = ?, @userid = ?', [
        //     $data['kodebarang'],
        //     $data['noindeks'],
        //     'U001'

        // ]);
        // return redirect()->route('HanguskanBarcode.index')->with('alert', 'Data Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
