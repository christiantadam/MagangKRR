<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatusOrderGambarController extends Controller
{

    public function index()
    {
        $divisi = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_USER-DIVISI] @user = ?', [4384]);
        return view('WORKSHOP.Workshop.Transaksi.StatusOrderGambar', compact(['divisi']));
    }
    public function GetAllData($tgl_awal, $tgl_akhir,$div)
    {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-GBR] @kode = ?, @tgl1 = ?, @tgl2 = ?, @div = ?', [9, $tgl_awal, $tgl_akhir,$div]);
        return response()->json($all);
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
        dd($request->all());
    }


    public function destroy($id)
    {
        //
    }
}
