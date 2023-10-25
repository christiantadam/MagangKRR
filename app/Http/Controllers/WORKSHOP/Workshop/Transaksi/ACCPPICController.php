<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ACCPPICController extends Controller
{

    public function index()
    {
        //
        $PPIC = DB::connection('Connworkshop')->select('exec [SP_4384_WRK_ACC_PPIC] @kode = ?', [2]);
        $List = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_LIST-ORDER-KRJ] @kode = ?', [21]);
        return view('WORKSHOP.Workshop.Transaksi.ACCPPIC', compact(['PPIC', 'List']));
        // return view('WsORKSHOP.Workshop.Transaksi.ACCPPIC');

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        $user = $request->user;
        $nomorOrder = $request->nomorOrder;
        DB::connection('Connworkshop')->statement('exec [SP_4384_WRK_ACC_PPIC] @kode = ?, @user = ?, @nomorOrder = ?', [1, $user , $nomorOrder]);

    }

    public function destroy($id)
    {
        //
    }
}
