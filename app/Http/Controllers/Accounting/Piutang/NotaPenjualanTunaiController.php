<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaPenjualanTunaiController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.NotaPenjualanTunai', compact('data'));
    }

    public function getLihatPesanan($noSP)
    {
        $data =  DB::connection('ConnSales')->select('exec [SP_1486_ACC_LIST_HEADER_PESANAN]
        @Kode = ?, @IDSURATPESANAN = ?', [3, $noSP]);
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
