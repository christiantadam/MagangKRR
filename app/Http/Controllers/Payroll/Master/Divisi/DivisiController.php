<?php

namespace App\Http\Controllers\Payroll\Master\Divisi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI ?', [0]);
        $dataPosisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_POSISI ?', [0]);
        $dataManager = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER');
        // dd($dataDivisi);
        return view('Payroll.Master.Divisi.divisi', compact('dataDivisi','dataPosisi', 'dataManager'));
    }
    public function getPegawai($Id_Div)
    {

        $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA ?', [$Id_Div], [1]);

        // Return the options as JSON data
        return response()->json($dataPegawai);
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
    public function show( $cr)
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
