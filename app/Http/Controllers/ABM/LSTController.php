<?php

namespace App\Http\Controllers\ABM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LSTController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi @XKdUser = ?', ["U001"]);
        $dataDivisiDiminta = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi_Diminta @XKdUser = ?', ["U001"]);
        $data = 'HAPPY HAPPY HAPPY';

        // dd($dataDivisi);
        return view('LST', compact('data', 'dataDivisi', 'dataDivisiDiminta'));
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
            $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U001"]);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataObjek);

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
