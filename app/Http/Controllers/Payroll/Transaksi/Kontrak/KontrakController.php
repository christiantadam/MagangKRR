<?php

namespace App\Http\Controllers\Payroll\Transaksi\Kontrak;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KontrakController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI ?', [1]);
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_SHIFT ');
        // dd($dataDivisi);
        return view('Payroll.Transaksi.Kontrak.kontrak', compact('dataDivisi','dataShift'));

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
