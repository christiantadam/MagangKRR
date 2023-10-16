<?php

namespace App\Http\Controllers\ABM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PilihJenisRepressController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["4384", NULL, NULL, NULL, NULL]);
        $dataDivisi2 = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U002", NULL, NULL, NULL, NULL]);

        // dd($crExplode);
        return view('PilihJenisRepress', compact('dataDivisi', 'dataDivisi2'));
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
            // if ($crExplode[0] == "ABN") {
            //     $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U001"]);
            // } else if ($crExplode[0] == "JBJ") {
            //     $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U001"]);
            // }
            // // dd($dataObjek);
            // // Return the options as JSON data
            // return response()->json($dataObjek);

            // // dd($crExplode);
            $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "4384"]);
            // dd($dataSchedule);
            return response()->json($dataObjek);
        } else if ($crExplode[1] == "getIdObjek") {

            //getDataPegawai
            $dataKelut = DB::connection('ConnInventory')->select('exec SP_1273_BCD_HASILPROSESBARCODE @IdObjek = ?, @Kode = ?', [$crExplode[0]], "6");
            // dd($dataSchedule);
            return response()->json($dataKelut);
        } else if ($crExplode[1] == "txtIdObjek") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_BCD_HASILPROSESBARCODE @Kode = ?, @IdObjek = ?', ["6", $crExplode[0]]);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[1] == "getPrintInput") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_BCD_HASILPROSESBARCODE @Kode = ?, @IdTrans = ?', ["8", $crExplode[0]]);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[1] == "getPrintPenerima") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_1273_BCD_AmbilHasilBarcode @Kode = ?, @IdTransaksi = ?', ["9", $crExplode[0]]);
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[1] == "getTableBarcode") {
            $dataBarcodePengirim = DB::connection('ConnInventory')->select('exec SP_1273_BCD_AmbilHasilBarcode @Kode = ?, @IdTransaksi = ?', ["10", $crExplode[0]]);
            // dd($dataBarcodePengirim);
            // Return the options as JSON data
            return response()->json($dataBarcodePengirim);
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
        $data = $request->all();
        // dd($data);
        // kodeUpd: "simpanPegawai",
        if ($data['opsi'] == "satu") {
            DB::connection('ConnInventory')->statement('exec SP_1273_INV_Update_StatusDispresiasi @Kode = ?, @kodebarang = ?, @noindeks = ?', [
                '1',
                $data['kodebarang'],
                $data['noindeks']
            ]);
            return redirect()->route('PilihJenisRepress.index')->with('alert', 'Data Updated successfully!');


        } else if ($data['opsi'] == "dua") {
            DB::connection('ConnInventory')->statement('exec SP_1273_INV_PenghangusanBarcode @IdTransaksi = ?, @IdPenerima = ?, @JumlahKeluarPrimer = ?, @JumlahKeluarSekunder = ?, @JumlahKeluarTritier = ?', [
                // '3',
                // $data['kodebarang'],
                // $data['noindeks']
            ]);
            return redirect()->route('PilihJenisRepress.index')->with('alert', 'Data Updated successfully!');

        } else if ($data['opsi'] == "tiga") {
            DB::connection('ConnInventory')->statement('exec SP_1273_INV_Update_StatusDispresiasi @Kode = ?, @kodebarang = ?, @noindeks = ?', [
                '3',
                $data['kodebarang'],
                $data['noindeks']
            ]);
            return redirect()->route('PilihJenisRepress.index')->with('alert', 'Data Updated successfully!');
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
