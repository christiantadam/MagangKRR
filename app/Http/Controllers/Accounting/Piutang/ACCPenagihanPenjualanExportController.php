<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ACCPenagihanPenjualanExportController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.ACCPenagihanPenjualanExport', compact('data'));
    }

    public function getTabelPenagihanEx()
    {
        $data =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_PENAGIHAN_SJ_EXPORT]
        @Kode = ?', [4]);
        return response()->json($data);
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
