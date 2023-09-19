<?php

namespace App\Http\Controllers\Payroll\Transaksi\Skorsing\AccBayar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccBayarController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.Skorsing.AccBayar.accBayar', compact('data'));
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
        if ($crExplode[$lastIndex] == "getDataSkors") {
            $dataSkors = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_BAYARSKORSING');
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataSkors);
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

        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_KENAIKANUPAH @kd_pegawai = ?, @U_gol = ?, @T_Jab = ?, @tanggal = ?, @U_gol_lama = ?, @T_jab_lama = ?', [

            $data['kd_pegawai'],
            $data['U_gol'],
            $data['T_Jab'],
            $data['tanggal'],
            $data['U_gol_lama'],
            $data['T_jab_lama']
        ]);
        return redirect()->route('KenaikanUpah.index')->with('alert', 'Data Upah Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
