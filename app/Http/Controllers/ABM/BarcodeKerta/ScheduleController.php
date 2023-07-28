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
        $dataDivisi = DB::connection('ConnABM')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["p", NULL, "p", "p", "p"]);
        $dataKelut = DB::connection('ConnABM')->select('exec SP_1273_BCD_SLC_KELUT ?, ?, ?', ["p", "1", "p"]);
        $dataKelompok = DB::connection('ConnABM')->select('exec SP_1003_INV_IdKelompokUtama_Kelompok ?, ?, ?, ?, ?', ["p", NULL, "p", "p", "p"]);
        $dataSubKelompok = DB::connection('ConnABM')->select('exec SP_1003_INV_IdKelompok_SubKelompok ?, ?, ?', ["p", NULL, "p"]);
        $dataType = DB::connection('ConnABM')->select('exec SP_1003_INV_IdSubKelompok_Type ?', ["p"]);

        // dd($dataType);
        return view('BarcodeKerta2.Schedule', compact('dataDivisi', 'dataKelut', 'dataKelompok', 'dataSubKelompok','dataType'));
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
    public function show(cr $cr)
    {
        //
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
