<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KodePerkiraanBKMController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.KodePerkiraanBKM', compact('data'));
    }

    public function getIdBKM5($BlnThn)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_TPELUNASAN] @Kode = ?, @BlnThn = ?', [5, $BlnThn]);
        return response()->json($tabel);
    }
    public function getIdBKM6($BlnThn)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_TPELUNASAN] @Kode = ?, @BlnThn = ?', [6, $BlnThn]);
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
