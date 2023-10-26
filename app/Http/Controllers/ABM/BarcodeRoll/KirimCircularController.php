<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KirimCircularController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $dataKelut = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdObjek_KelompokUtama ?, ?', ["043", "6"]);
        // $dataKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok @XIdKelompokUtama_Kelompok = ?', ["0628"]);
        // $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IDKELOMPOK_SUBKELOMPOK @XIdKelompok_SubKelompok = ?', ["KKL628"]);

        $data = 'HAPPY HAPPY HAPPY';
        // dd($dataSubKelompok);
        return view('BarcodeRollWoven.KirimCircular', compact('data', 'dataKelut'));
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
        } else  if ($crExplode[$lasindex] == "getSubKelompok") {
            $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IDKELOMPOK_SUBKELOMPOK @XIdKelompok_SubKelompok = ?', [$crExplode[0]]);
            // dd($dataSubKelompok);
            // Return the options as JSON data
            return response()->json($dataSubKelompok);
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
