<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceOrderGambarController extends Controller
{

    public function index()
    {
        $divisi = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_USER-DIVISI] @user = ?', [4384]);
        $satuan = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_SATUAN]');

        //dd($satuan);
        return view('WORKSHOP.Workshop.Transaksi.MaintenanceOrderGambar', compact(['divisi','satuan']));
    }
    public function GetDataAll($tgl_awal,$tgl_akhir,$divisi) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-GBR] @kode = ?, @tgl1 = ?, @tgl2 = ?, @div = ?',[1,$tgl_awal,$tgl_akhir,$divisi]);
        return response()->json($all);
    }
    public function GatDataForUserOrder($tgl_awal,$tgl_akhir,$iduserOrder,$divisi) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-GBR] @kode = ?, @tgl1 = ?, @tgl2 = ?, @user = ?, @div = ?',[2,$tgl_awal,$tgl_akhir,$iduserOrder,$divisi]);
        return response()->json($all);
    }
    public function mesin($idDivisi) {
        $mesin = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_LIST-MESIN] @Id_divisi = ?', [$idDivisi]);
        return response()->json($mesin);
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
