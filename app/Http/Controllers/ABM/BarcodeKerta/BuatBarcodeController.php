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
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[1] == "buatBarcode") {
            $dataBarcode = DB::connection('ConnInventory')->select('exec SP_5409_INV_SimpanPermohonanBarcode
            @idtype = ?, @userid = ?, @tanggal = ?, @jumlahmasukprimer = ?, @jumlahmasuksekunder = ?,
            @jumlahmasuktertier = ?, @asalidsubkelompok = ?, @idsubkontraktor = ?, @kodebarang = ?, @uraian = ?',
            [ "0016",
              "U001",
              "2023-09-22",
              "1",
              "10",
              "12",
              "SKL01",
              "00000KB02",
              "00000KB02",
              "Pagi",]);
            dd($dataBarcode);
            // Return the options as JSON data
            return response()->json($dataBarcode);
        } else if ($crExplode[1] == "getJumlahBarcode") {
            $dataJumlahBarcode = DB::connection('ConnInventory')->select('exec SP_5409_INV_JumlahBarcode @tanggal = ?, @kelompokutama = ?, @shift = ?', [ ]);
            // dd($dataJumlahBarcode);
            // Return the options as JSON data
            return response()->json($dataJumlahBarcode);
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
