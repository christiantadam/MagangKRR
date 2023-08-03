<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaintenanceBKMPenagihanController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.MaintenanceBKMPenagihan', compact('data'));
    }

    public function getTabelPenagihan($bulan, $tahun)
    {
        //dd($bulan, $tahun);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_PELUNASAN_TAGIHAN] @bln = ?, @thn = ?', [$bulan, $tahun]);
        return response()->json($tabel);
    }

    function getDataBank()
    {
        $bank =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BANK]');
        return response()->json($bank);
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
        //
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
