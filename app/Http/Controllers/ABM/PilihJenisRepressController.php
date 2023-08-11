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
        $dataDivisi = DB::connection('ConnABM')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U001", NULL, NULL, NULL, NULL]);
        $dataDivisi2 = DB::connection('ConnABM')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U002", NULL, NULL, NULL, NULL]);

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
            if ($crExplode[0] == "JBJ"){
                $dataObjek = DB::connection('ConnABM')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U001"]);
            }

            else if ($crExplode[0] == "JBM"){
                $dataObjek = DB::connection('ConnABM')->select('exec SP_1003_INV_User_Objek @XIdDivisi = ?, @XKdUser = ?', [$crExplode[0], "U002"]);
            }
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataObjek);

            // dd($crExplode);
        } else if ($crExplode[1] == "getIdObjek") {

            //getDataPegawai
            $dataKelut = DB::connection('ConnABM')->select('exec SP_1273_BCD_HasilProsesBarcode @IdObjek = ?, @Kode = ?', [$crExplode[0]], "5");
            // dd($dataSchedule);
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
