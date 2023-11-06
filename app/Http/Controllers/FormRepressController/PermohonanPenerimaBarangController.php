<?php

namespace App\Http\Controllers\ABM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermohonanPenerimaBarangController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U001", NULL, NULL, NULL, NULL]);
        $dataDivisi2 = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U002", NULL, NULL, NULL, NULL]);

        // dd($crExplode);
        return view('PermohonanPenerimaBarang', compact('dataDivisi', 'dataDivisi2'));
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
        } else if ($crExplode[1] == "getXIdObjek_KelompokUtama") {

            //getDataPegawai
            $dataKelut = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdObjek_KelompokUtama @XIdObjek_KelompokUtama = ?', [$crExplode[0]]);
            // dd($dataSchedule);
            return response()->json($dataKelut);
        } else if ($crExplode[1] == "getXIdObjek_KelompokUtama1") {

            //getDataPegawai
            $dataKelut = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdObjek_KelompokUtama @XIdObjek_KelompokUtama = ?', [$crExplode[0]]);
            // dd($dataSchedule);
            return response()->json($dataKelut);
        }

        else if ($crExplode[1] == "XIdKelompokUtama_Kelompok") {

            //getDataPegawai
            $dataKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok @XIdKelompokUtama_Kelompok = ?', [$crExplode[0]]);
            // dd($dataKelompok);
            return response()->json($dataKelompok);
        } else if ($crExplode[1] == "XIdKelompokUtama_Kelompok1") {

            //getDataPegawai
            $dataKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok @XIdKelompokUtama_Kelompok = ?', [$crExplode[0]]);
            // dd($dataKelompok);
            return response()->json($dataKelompok);
        }


        else if ($crExplode[1] == "XIdKelompok_SubKelompok") {

            //getDataPegawai
            $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompok_SubKelompok @XIdKelompok_SubKelompok = ?', [$crExplode[0]]);
            // dd($dataSubKelompok);
            return response()->json($dataSubKelompok);
        }else if ($crExplode[1] == "XIdKelompok_SubKelompok1") {

            //getDataPegawai
            $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompok_SubKelompok @XIdKelompok_SubKelompok = ?', [$crExplode[0]]);
            // dd($dataSubKelompok);
            return response()->json($dataSubKelompok);
        }

        else if ($crExplode[1] == "getView1") {

            //getDataPegawai
            $dataView = DB::connection('ConnInventory')->select('exec SP_1273_INV_List_Bon_TmpTransaksi @kode = ?, @XIdTypeTransaksi = ?, @XIdDivisi = ?, @XUser = ?', ["1", "26", $crExplode[0], "U001"]);
            // dd($dataView);
            return response()->json($dataView);
        }else if ($crExplode[1] == "getView2") {

            //getDataPegawai
            $dataView = DB::connection('ConnInventory')->select('exec SP_1273_INV_List_Bon_TmpTransaksi @kode = ?, @XIdTypeTransaksi = ?, @XIdDivisi = ?', ["2", "26", $crExplode[0]]);
            // dd($dataView);
            return response()->json($dataView);
        }

        else if ($crExplode[1] == "getListLogin") {

            //getDataPegawai
            $dataView = DB::connection('ConnInventory')->select('exec SP_1003_INV_ListNama_Login @NamaUser = ?', ["Albert"]);
            // dd($dataView);
            return response()->json($dataView);
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
