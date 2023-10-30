<?php

namespace App\Http\Controllers\Accounting\Hutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UraianBKKController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Hutang.UraianBKK', compact('data'));
    }

    public function getCheckBKKIdBKK($idBKK)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_CHECK_BKK_IDBKK] @IdBKK = ?', [$idBKK]);
        return response()->json($tabel);
    }

    public function getListBKK($idBKK)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_LIST_BKK_IDBKK] @IdBKK = ?', [$idBKK]);
        return response()->json($tabel);
    }

    public function getListBKKTotalIdBKK($idBKK)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_LIST_BKK_TOTAL_IDBKK] @IdBKK = ?', [$idBKK]);
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
    public function show(cr $cr)
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
        $idDetail = $request->idDetail;
        $rincian = $request->rincian;
        $nilaiRincian = $request->nilaiRincian;
        $idBayar = $request->idBayar;
        $idKodePerkiraan = $request->idKodePerkiraan;

        DB::connection('ConnAccounting')->statement('exec [SP_1273_ACC_UDT_BKK2_DETAILBAYAR]
        @IdDetailBayar = ?,
        @IdPembayaran = ?,
        @rincian = ?,
        @Nilai = ?,
        @Perkiraan = ?', [
            $idDetail,
            $rincian,
            $nilaiRincian,
            $idBayar,
            $idKodePerkiraan
        ]);
        return redirect()->back()->with('success', 'Data sudah diKoreksi!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
