<?php

namespace App\Http\Controllers\Payroll\Maintenance\Fkik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FkikController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Maintenance.Fkik.FKIK', compact('data'));
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
        // dd($cr);
        //getDivisi
        if ($crExplode[1] == "getDataIjin") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1273_HRD_IJIN_KARYAWAN @Kode = ?,@Nama = ?,@Nama = ?', [$crExplode[0]]);
            // dd($dataDivisi);
            // Return the options as JSON data
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
