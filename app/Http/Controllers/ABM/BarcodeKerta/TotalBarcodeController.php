<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TotalBarcodeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('BarcodeKerta2.TotalBarcode', compact('data'));
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
        // dd($cr);
        //getDivisi
        if ($crExplode[$lasindex] == "get_tgl_total_barcode") {
            $dataKelut = DB::connection('ConnInventory')->select('exec SP_1273_INV_CEK_TOTALBARCODE @tanggal = ?, @shift = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataKelut);
            // Return the options as JSON data
            return response()->json($dataKelut);
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
