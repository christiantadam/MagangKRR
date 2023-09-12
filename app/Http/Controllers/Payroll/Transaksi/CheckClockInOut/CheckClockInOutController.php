<?php

namespace App\Http\Controllers\Payroll\Transaksi\CheckClockInOut;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckClockInOutController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataManager = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER');
        // dd($dataManager);
        return view('Payroll.Transaksi.CheckClockInOut.checkClockInOut', compact('dataManager'));
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
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIV_MANAGER @kode = ?, @kd_manager = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        }else if ($crExplode[$lastIndex] == "getPegawai") {
            if (count($crExplode) > 2) {
                $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @id_div = ?, @kode = ?', [$crExplode[0], $crExplode[1]]);
                // dd($dataPeg);
                // Return the options as JSON data
                return response()->json($dataPeg);
            }else{
                $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @id_div = ?', [$crExplode[0]]);
                // dd($dataPeg);
                // Return the options as JSON data
                return response()->json($dataPeg);
            }

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
