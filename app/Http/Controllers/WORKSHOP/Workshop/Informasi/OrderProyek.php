<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderProyek extends Controller
{
    public function index()
    {
        //
        $divisi = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_USER-DIVISI] @user = ?', [4384]);
        return view('WORKSHOP.Workshop.Informasi.OrderProyek',compact(['divisi']));
    }
    public function GetAllDataPengorder($tgl_awal , $tgl_akhir, $divisi) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-PRY] @kode = ?, @tgl1 = ?, @tgl2 = ?, @div = ?', [14, $tgl_awal, $tgl_akhir,$divisi]);
        return response()->json($all);
    }
    public function GetAllDataPenerima($tgl_awal , $tgl_akhir) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-PRY] @kode = ?, @tgl1 = ?, @tgl2 = ?', [15, $tgl_awal, $tgl_akhir]);
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
        //
    }

    public function destroy($id)
    {
        //
    }
}