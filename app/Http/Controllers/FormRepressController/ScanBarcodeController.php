<?php

namespace App\Http\Controllers\FormRepressController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScanBarcodeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U001", NULL, NULL, NULL, NULL]);
        $dataDivisi2 = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U002", NULL, NULL, NULL, NULL]);

        // dd($dataObjek);
        return view('FormRepress.ScanBarcode', compact('dataDivisi', 'dataDivisi2'));
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
        if ($crExplode[1] == "getXIdDivisi") {
            if ($crExplode[0] == "JBJ") {
                $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U001"]);
            } else if ($crExplode[0] == "ABN") {
                $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U001"]);
            }
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataObjek);

            // dd($crExplode);
        } else if ($crExplode[1] == "txtIdObjek") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_BCD_HasilProsesBarcode @Kode = ?, @IdObjek = ?', ["5", $crExplode[0]]);
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);

            // dd($crExplode);
        } else if ($crExplode[1] == "getHasilBarcode") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_BCD_AmbilHasilBarcode @Kode = ?, @IdTransaksi = ?', ["6", $crExplode[0]]);
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);

            // dd($crExplode);
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