<?php

namespace App\Http\Controllers\Accounting\Piutang\BKMCashAdvance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateDetailBKMController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMCashAdvance.UpdateDetailBKM', compact('data'));
    }

    public function getTabelPelunasan($bulan, $tahun)
    {
        //dd($bulan, $tahun);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_PELUNASAN_TAGIHAN_1] @kode = ?, @bln = ?, @thn = ?', [1, $bulan, $tahun]);
        return response()->json($tabel);
    }

    public function cekTabelPelunasan($idPelunasan)
    {
        //dd($idPelunasan);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_PELUNASAN_TAGIHAN_1] @kode = ?, @idP = ?', [2, $idPelunasan]);
        return response()->json($tabel);
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
