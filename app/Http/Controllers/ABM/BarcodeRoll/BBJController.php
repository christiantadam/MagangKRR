<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BBJController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataKelompokUtama = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdObjek_KelompokUtama @XIdObjek_KelompokUtama = ?, @Type = ?', ["137", "6"]);

        // dd($dataKelompokUtama);
        return view('BarcodeRollWoven.BBJ', compact('data', 'dataKelompokUtama'));
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

        if ($crExplode[$lasindex] == "getKelompok") {
            $dataKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok @XIdKelompokUtama_Kelompok = ?', [$crExplode[0]]);
            // dd($dataKelompok);
            // Return the options as JSON data
            return response()->json($dataKelompok);
        } else if ($crExplode[$lasindex] == "getSubKelompok") {
            $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IDKELOMPOK_SUBKELOMPOK @XIdKelompok_SubKelompok = ?', [$crExplode[0]]);
            // dd($dataSubKelompok);
            // Return the options as JSON data
            return response()->json($dataSubKelompok);
        } else if ($crExplode[$lasindex] == "getType") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdSubKelompok_Type @XIdSubKelompok_Type = ?', [$crExplode[0]]);
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[$lasindex] == "getTampil") {
            $dataTampil = DB::connection('ConnInventory')->select('exec SP_1003_INV_Saldo_Barang @IdType = ?', [$crExplode[0]]);
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
