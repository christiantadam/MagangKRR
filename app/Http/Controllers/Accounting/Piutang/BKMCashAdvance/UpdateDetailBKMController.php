<?php

namespace App\Http\Controllers\Accounting\Piutang\BKMCashAdvance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateDetailBKMController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMCashAdvance.UpdateDetailBKM', compact('data'));
    }

    public function getTabelPelunasan($bulan, $tahun)
    {
        //dd($bulan, $tahun);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_PELUNASAN_TAGIHAN_1] @kode = ?, @bln = ?, @thn = ?', [1, $bulan, $tahun]);
        return response()->json($tabel);
    }

    public function cekTabelPelunasan($idPelunasan)
    {
        //dd($idPelunasan);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_PELUNASAN_TAGIHAN_1] @kode = ?, @idP = ?', [2, $idPelunasan]);
        return response()->json($tabel);
    }

    public function getTabelDetailPelunasan($idPelunasan)
    {
        //dd($bulan, $tahun);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_DETAIL_PELUNASAN] @idPelunasan = ?', [$idPelunasan]);
        return response()->json($tabel);
    }

    public function getTabelKurangLebih($idPelunasan)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_DETAIL_KRGLBH] @idPelunasan = ?', [$idPelunasan]);
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
        $proses =  $request->all();
        //dd("masuk");
        if ($proses['detpelunasan'] == "datpelunasan") {
            $idBank = $request->idBank;
            DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_LIST_BANK_1]
            @idBank = ?', [$idBank]);
            return redirect()->back()->with('success', 'Data sudah diKOREKSI');

        } else if ($proses['detpelunasan'] == "detpelunasan") {
            //dd("masuk else if");
            $idDetail = $request->iddetail;
            $kode = $request->idKodePerkiraan;
            DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_DETAIL_PELUNASAN] @iddetail = ?, @kode = ?', [
                $idDetail, $kode]);
            return redirect()->back()->with('success', 'Detail Sudah Terkoreksi');

        }
        // else if ($proses['detpelunasan'] == "detkuranglebih") {
        //     //dd($request->all());
        //     $idcoba = $request->idcoba;
        //     $kode = $request ->idKodePerkiraanKrgLbh;
        //     $keterangan = $request ->keterangan;
        //     DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_DETAIL_KRGLBH] @iddetail = ?, @keterangan = ?, @kode = ?', [
        //         $idcoba, $keterangan, $kode]);
        //     return redirect()->back()->with('success', 'Detail Sudah Terkoreksi');
        // }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
