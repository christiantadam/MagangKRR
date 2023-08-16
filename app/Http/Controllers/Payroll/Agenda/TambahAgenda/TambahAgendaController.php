<?php

namespace App\Http\Controllers\Payroll\Agenda\TambahAgenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TambahAgendaController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        return view('Payroll.Agenda.TambahAgenda.tambahAgenda', compact('dataDivisi'));
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

        //getPegawai
        if ($crExplode[1] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        }
        else if ($crExplode[2] == "getAgendaPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_AGENDA_PEGAWAI @kd_pegawai = ?, @Tanggal = ?', [$crExplode[0],$crExplode[1] ]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
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
