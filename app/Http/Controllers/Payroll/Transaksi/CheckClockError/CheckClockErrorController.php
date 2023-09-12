<?php

namespace App\Http\Controllers\Payroll\Transaksi\CheckClockError;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckClockErrorController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataManager = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER');
        // dd($dataManager);
        return view('Payroll.Transaksi.CheckClockError.checkClockError', compact('dataManager'));
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
        if ($crExplode[$lastIndex] == "checkError") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_CHECKCLOCK_ERROR @Jenis_Peg = ?, @manager = ?, @Tanggal = ? ', [$crExplode[0], $crExplode[1], $crExplode[2]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
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
