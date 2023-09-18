<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuatBarcodeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U001", NULL, NULL, NULL, NULL]);
        $dataType = DB::connection('ConnInventory')->select('exec SP_5409_INV_IdType_Schedule @idtype =?, @divisi =?', ["", "JBJ"]);

        //  dd($dataType);
        return view('BarcodeKerta2.BuatBarcode', compact('dataDivisi', 'dataType'));
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
            $dataType = DB::connection('ConnInventory')->select('exec SP_5409_INV_IdType_Schedule @idtype = ?, @divisi = ?', [ "", $crExplode[0] ]);
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
        //
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}