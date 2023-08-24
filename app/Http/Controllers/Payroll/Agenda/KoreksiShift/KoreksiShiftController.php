<?php

namespace App\Http\Controllers\Payroll\Agenda\KoreksiShift;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KoreksiShiftController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        return view('Payroll.Agenda.KoreksiShift.koreksiShift', compact('dataDivisi'));
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
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getShiftAll") {

            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_AGENDA @kddiv = ?, @tanggal1 = ?, @tanggal2 = ?', [$crExplode[0], $crExplode[1], $crExplode[2]]);
            // dd($dataPegawai);
            return response()->json($dataShift);
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
