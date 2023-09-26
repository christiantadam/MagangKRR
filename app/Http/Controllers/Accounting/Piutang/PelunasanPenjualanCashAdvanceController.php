<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelunasanPenjualanCashAdvanceController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.PelunasanPenjualanCashAdvance', compact('data'));
    }

    public function getCustIsiCashAdvance()
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_PELUNASAN_TAGIHAN] @Kode = ?', [7]);
        return response()->json($tabel);
    }

    public function getNoPelunasanCashAdvance($idCustomer)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Customer = ?', [6, $idCustomer]);
        return response()->json($tabel);
    }

    public function LihatHeaderPelunasanCashAdvance($noPelunasan)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Pelunasan = ?', [2, $noPelunasan]);
        return response()->json($tabel);
    }

    public function LihatDetailPelunasanCashAdvance($noPelunasan)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Pelunasan = ?', [3, $noPelunasan]);
        return response()->json($tabel);
    }

    public function getLihat_PenagihanCashAdvance($no_Pen)
    {
        $noPen = str_replace('.', '/', $no_Pen);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Penagihan = ?', [5, $noPen]);
        return response()->json($tabel);
    }

    public function getLihat_PenagihanCashAdvance2($no_Pen)
    {
        $noPen = str_replace('.', '/', $no_Pen);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Penagihan = ?', [4, $noPen]);
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
