<?php

namespace App\Http\Controllers\Payroll\Laporan\Staff\PotonganKoperasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PotonganKoperasiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $divisi = DB::connection('ConnPayroll')->select('exec SP_1003_KOP_LIHATANGGOTA @NOKARTU = ?',[4384]);
        dd($divisi);
        return view('Payroll.Laporan.Staff.PotonganKoperasi.PotonganKoperasi', compact('data'));
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
