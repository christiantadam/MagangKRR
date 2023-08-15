<?php

namespace App\Http\Controllers\Accounting\Piutang\BKMCashAdvance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateBKMController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMCashAdvance.CreateBKM', compact('data'));
    }

    public function getTabelPelunasan($bulan, $tahun)
    {
        //dd($bulan, $tahun);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_CASH_ADV] @bln = ?, @thn = ?', [$bulan, $tahun]);
        return response()->json($tabel);
    }

    function getDataBank()
    {
        $bank =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BANK]');
        return response()->json($bank);
    }

    function getKodePerkiraan()
    {
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_KODE_PERKIRAAN] @Kode = ?', 1);
        return response()->json($kode);
    }

    public function getTabelTampilBKM($tanggalInputTampil, $tanggalInputTampil2)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BKM_CASHADV_1_PERTGL] @tgl1 = ?, @tgl2 = ?', [$tanggalInputTampil, $tanggalInputTampil2]);
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

    }

    //Update the specified resource in storage.
    public function update(Request $request)
    {
        // $idcoba = $request->idPelunasan;
        // $kode = $request ->idKodePerkiraan;
        // $keterangan = $request ->keterangan;
        // DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_DETAIL_KRGLBH] @iddetail = ?, @keterangan = ?, @kode = ?', [
        //     $idcoba, $keterangan, $kode]);
        // return redirect()->back()->with('success', 'Detail Sudah Terkoreksi');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
