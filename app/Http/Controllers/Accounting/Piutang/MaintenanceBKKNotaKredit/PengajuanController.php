<?php

namespace App\Http\Controllers\Accounting\Piutang\MaintenanceBKKNotaKredit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.MaintenanceBKKNotaKredit.Pengajuan', compact('data'));
    }

    public function loadDataNotaK()
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [sp_list_nota_kredit1]');
        return response()->json($tabel);
    }

    public function getJenisBayarPenagajuan()
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [sp_jenis_dok]');
        return response()->json($tabel);
    }

    //SP NYA SALAH
    // public function getBankPengajuan()
    // {
    //     $tabel =  DB::connection('ConnAccounting')->select('exec [sp_bank]');
    //     return response()->json($tabel);
    // }

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
    public function show(cr $cr)
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

    }
}
