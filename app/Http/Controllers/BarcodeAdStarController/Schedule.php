<?php

namespace App\Http\Controllers\BarcodeAdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class Schedule extends Controller
{
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi @XKdUser = ?', ["U001"]);

        return view('BarcodeAdStar.Schedule', compact('dataDivisi',));//
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cr)
    {
        // dd('Masuk Show');
        $crExplode = explode(".", $cr);

        //getDivisi
        if ($crExplode[1] == "getKelut") {
            $dataKelut = DB::connection('ConnInventory')->select('exec SP_1273_BCD_SLC_KELUT @div = ?, @kode = ?', [$crExplode[0], "1"]);
            // dd($dataKelut);
            // Return the options as JSON data
            return response()->json($dataKelut);
        } else if ($crExplode[1] == "getScheduleJBB") {

            //getDataPegawai
            $dataSchedule = DB::connection('ConnInventory')->select('exec SP_5409_INV_ListScheduleJBB @divisi = ?', [$crExplode[0]]);
            // dd($dataSchedule);
            return response()->json($dataSchedule);
        } else if ($crExplode[1] == "getKelompok") {
            //getDataKeluarga
            $dataKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok @XIdKelompokUtama_Kelompok = ?', [$crExplode[0]]);
            dd($dataKelompok);
            return response()->json($dataKelompok);
        } else if ($crExplode[1] == "getSubKelompok") {
            // getPegawaiKeluarga
            $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdKelompok_SubKelompok @XIdKelompok_SubKelompok = ?', [$crExplode[0]]);
            // Return the options as JSON data
            return response()->json($dataSubKelompok);
        } else if ($crExplode[1] == "getType") {
            // getPegawaiKeluarga
            $dataType = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdSubKelompok_Type @XIdSubKelompok_Type = ?', [$crExplode[0]]);
            // Return the options as JSON data
            return response()->json($dataType);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
