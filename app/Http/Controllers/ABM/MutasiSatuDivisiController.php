<?php

namespace App\Http\Controllers\ABM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MutasiSatuDivisiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi @XKdUser = ?', ["4384"]);
        $data = 'HAPPY HAPPY HAPPY';

        // dd($dataDivisi);
        return view('MutasiSatuDivisi', compact('data', 'dataDivisi'));
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
        //SP_1273_INV_CekBarcodeHangus
        $crExplode = explode(".", $cr);

        //getDivisi
        if ($crExplode[1] == "txtIdDivisi") {
            $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1273_INV_CekBarcodeHangus @divisi = ?', [$crExplode[0]]);
            // dd($dataDivisi);
            // Return the options as JSON data
            return response()->json($dataDivisi);
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
