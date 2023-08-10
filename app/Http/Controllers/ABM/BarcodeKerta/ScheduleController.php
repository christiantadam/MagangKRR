<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        //$data2 = DB::connection('ConnABM')->select('exec SP_5409_INV_IdType_Schedule @divisi = ?, @idtype = ?, @idkelut = ?, @kode = ?',  ['terserah', 'yeah', 'haey', '1']);
        $dataDivisi = DB::connection('ConnABM')->select('exec SP_1003_INV_UserDivisi @XKdUser = ?', ["U001"]);


        $dataSubKelompok = DB::connection('ConnABM')->select('exec SP_1003_INV_IdKelompok_SubKelompok ?, ?, ?', ["p", NULL, "p"]);
        $dataType = DB::connection('ConnABM')->select('exec SP_1003_INV_IdSubKelompok_Type ?', ["p"]);

        // dd($dataDivisi);
        return view('BarcodeKerta2.Schedule', compact('dataDivisi', 'dataSubKelompok', 'dataType'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data , " Masuk store bosq");
        // Ini akan menyimpan nilai @jumlah yang dihasilkan
       DB::connection('ConnABM')->statement('exec SP_5409_INV_SimpanScheduleJBB @idtype = ?, @status = ?, @divisi = ?, @jumlah = ?', [
            $data['idtype'],
            0,
            $data['divisi'],
            0,
        ]);
        // dd($jumlah);
        return redirect()->route('Schedule.index')->with('alert', 'Data berhasil ditambahkan !');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);

        //getDivisi
        if ($crExplode[1] == "getKelut") {
            $dataKelut = DB::connection('ConnABM')->select('exec SP_1273_BCD_SLC_KELUT @div = ?, @kode = ?', [$crExplode[0], "1"]);
            // dd($dataKelut);
            // Return the options as JSON data
            return response()->json($dataKelut);
        } else if ($crExplode[1] == "getScheduleJBB") {

            //getDataPegawai
            $dataSchedule = DB::connection('ConnABM')->select('exec SP_5409_INV_ListScheduleJBB @divisi = ?', [$crExplode[0]]);
            // dd($dataSchedule);
            return response()->json($dataSchedule);
        } else if ($crExplode[1] == "getKelompok") {
            //getDataKeluarga
            $dataKelompok = DB::connection('ConnABM')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok @XIdKelompokUtama_Kelompok = ?', [$crExplode[0]]);
            return response()->json($dataKelompok);
        } else if ($crExplode[1] == "getSubKelompok") {
            // getPegawaiKeluarga
            $dataSubKelompok = DB::connection('ConnABM')->select('exec SP_1003_INV_IdKelompok_SubKelompok @XIdKelompok_SubKelompok = ?', [$crExplode[0]]);
            // Return the options as JSON data
            return response()->json($dataSubKelompok);
        } else if ($crExplode[1] == "getType") {
            // getPegawaiKeluarga
            $dataType = DB::connection('ConnABM')->select('exec SP_1003_INV_IdSubKelompok_Type @XIdSubKelompok_Type = ?', [$crExplode[0]]);
            // Return the options as JSON data
            return response()->json($dataType);
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
