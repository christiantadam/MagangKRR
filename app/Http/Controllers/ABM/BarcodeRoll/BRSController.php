<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BRSController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IDKELOMPOK_SUBKELOMPOK @XIdKelompok_SubKelompok = ?', ["6493"]);

        // dd($dataSubKelompok);
        return view('BarcodeRollWoven.BRS', compact('data', 'dataSubKelompok'));
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

        if ($crExplode[$lasindex] == "txtType") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdSubKelompok_Type @XIdSubKelompok_Type = ?', [$crExplode[0]]);
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[$lasindex] == "getTampil") {
            $dataTampil = DB::connection('ConnInventory')->select('exec SP_1003_INV_SALDO_BARANG @IdType = ?', [$crExplode[0]]);
            // dd($dataTampil);
            // Return the options as JSON data
            return response()->json($dataTampil);
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
