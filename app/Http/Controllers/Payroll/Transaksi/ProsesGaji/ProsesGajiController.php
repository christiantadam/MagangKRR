<?php

namespace App\Http\Controllers\Payroll\Transaksi\ProsesGaji;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProsesGajiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.ProsesGaji.ProsesGajiStaff', compact('data'));
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
        $lastIndex = count($crExplode) - 1;
        if ($crExplode[$lastIndex] == "getData") {
            $dataPeriode = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_FIND_PERIODE @periode = ?',[$crExplode[0]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataPeriode);
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
        $data = $request->all();

        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_AKHIR_PERIODE @Periode = ?, @tgl_tutup = ?', [

            $data['Periode'],
            $data['tgl_tutup'],
        ]);
        return redirect()->route('ProsesGajiStaff.index')->with('alert', 'Proses selesai');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}