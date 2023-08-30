<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CekBarcodeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('BarcodeKerta2.CekBarcode', compact('data'));
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
        $lasindex = count($crExplode) -1;

        //getDivisi
        if ($crExplode[$lasindex] == "getBarcode") {
            $dataBarcode = DB::connection('ConnInventory')->select('exec SP_1273_BCD_CekBarcode @KodeBarang = ?, @NoIndeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataBarcode);
            return response()->json($dataBarcode);
        } else if ($crExplode[1] == "getBarcodeKeluar") {

            //getDataPegawai
            $dataBarcodeKeluar = DB::connection('ConnInventory')->select('exec SP_1273_BCD_CekBarcodeKeluar @KodeBarang = ?, @NoIndeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataSchedule);
            return response()->json($dataBarcodeKeluar);
        } else if ($crExplode[1] == "getBarcodeKirim") {

            //getDataPegawai
            $dataBarcodeKirim = DB::connection('ConnInventory')->select('exec SP_1273_BCD_CekKirimBarcode @KodeBarang = ?, @NoIndeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataSchedule);
            return response()->json($dataBarcodeKirim);
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
