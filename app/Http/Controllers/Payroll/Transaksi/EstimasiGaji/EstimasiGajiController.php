<?php

namespace App\Http\Controllers\Payroll\Transaksi\EstimasiGaji;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstimasiGajiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.EstimasiGaji.estimasiGaji', compact('data'));
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
        $data = $request->all();

        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_ESTIMASI_GAJI @MinDate = ?, @MaxDate = ?, @AwalAkhirMinggu = ?', [
            $data['MinDate'],
            $data['MaxDate'],
            $data['AwalAkhirMinggu'],
        ]);
        return redirect()->route('Rekap.index')->with('alert', 'Hitung Gaji Selesai...');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
