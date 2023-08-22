<?php

namespace App\Http\Controllers\Payroll\Agenda\InsertAgenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InsertAgendaSupervisorController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?', [1] );
        return view('Payroll.Agenda.InsertAgenda.insertSupervisor', compact('dataDivisi','dataShift'));
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
        // dd("Masuk Show");
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_AGENDA_PEGAWAI @divisi = ?, @tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        }
        else if ($crExplode[$lastIndex] == "getDataShift") {
            //getDataKeluarga
            $dataShiftFull = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?, @shift = ?', [2, $crExplode[0]]);
            return response()->json($dataShiftFull);
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
