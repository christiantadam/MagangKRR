<?php

namespace App\Http\Controllers\Accounting\Piutang\PenjualanLokal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenagihanPenjualanController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.PenjualanLokal.PenagihanPenjualan', compact('data'));
    }

    public function getCustomer()
    {
        //dd("masuk");
        $data =  DB::connection('ConnSales')->select('exec [SP_1486_ACC_LIST_ALL_CUSTOMER]
        @Kode = 1');
        return response()->json($data);
    }

    public function getCustomerKoreksi()
    {
        //dd("masuk");
        $data =  DB::connection('ConnSales')->select('exec [SP_1486_ACC_LIST_CUSTOMER]
        @Kode = 1');
        return response()->json($data);
    }

    public function getNoPenagihanUM($noSP)
    {
        //dd("masuk");
        $data =  DB::connection('ConnSales')->select('exec [SP_1486_ACC_LIST_TAGIHAN_DP_1]
        @SuratPesanan = ?' [$noSP]);
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
