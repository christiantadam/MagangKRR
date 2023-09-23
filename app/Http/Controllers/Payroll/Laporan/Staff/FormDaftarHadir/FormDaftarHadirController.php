<?php

namespace App\Http\Controllers\Payroll\Laporan\Staff\FormDaftarHadir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormDaftarHadirController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Laporan.Staff.FormDaftarHadir.formDaftarHadir', compact('data'));
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
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
         if ($crExplode[$lastIndex] == "getViewHadir") {

            //getDataPegawai
            $records = DB::table('VW_PRG_1486_PAY_KARYAWAN_STAFF_2')
            ->get();
            // dd($records);
            // dd($dataPegawai);
            return response()->json($records);
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
