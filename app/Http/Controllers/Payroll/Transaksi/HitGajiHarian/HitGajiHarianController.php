<?php

namespace App\Http\Controllers\Payroll\Transaksi\HitGajiHarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HitGajiHarianController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.HitGajiHarian.hitGajiHarian', compact('data'));
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
        if ($data['AwalAkhirMinggu'] === "0") {
            // dd("Masuk Haid" ,$data);
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_HITUNG_HAID @MinDate = ?, @MaxDate = ?', [
                $data['MinDate'],
                $data['MaxDate'],
            ]);
        }
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_PROSES_GAJI_HARIAN @MinDate = ?, @MaxDate = ?, @AwalAkhirMinggu = ?', [
            $data['MinDate'],
            $data['MaxDate'],
            $data['AwalAkhirMinggu'],
        ]);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_LANJUTAN_PROSES_GAJI @MinDate = ?, @MaxDate = ?', [
            $data['MinDate'],
            $data['MaxDate'],
        ]);
        DB::connection('ConnPayroll')->statement('exec SP_5409_KOP_PROSES_SLIP_HARIAN @MinDate = ?, @MaxDate = ?, @AwalAkhirMinggu = ?', [
            $data['MinDate'],
            $data['MaxDate'],
            $data['AwalAkhirMinggu'],
        ]);
        return redirect()->route('HitGajiHarian.index')->with('alert', 'Hitung Gaji Selesai...');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
