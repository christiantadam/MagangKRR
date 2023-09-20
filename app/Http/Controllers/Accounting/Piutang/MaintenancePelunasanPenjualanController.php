<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenancePelunasanPenjualanController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.MaintenancePelunasanPenjualan', compact('data'));
    }

    public function getCustIsi()
    {
        $tabel =  DB::connection('ConnSales')->select('exec [SP_1486_ACC_LIST_ALL_CUSTOMER] @Kode = ?', [1]);
        return response()->json($tabel);
    }

    public function getJenisPembayaran()
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_TJENISPEMBAYARAN] @Kode = ?', [1]);
        return response()->json($tabel);
    }

    public function getReferensiBank($idCustomer)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_REFERENSI_BANK] @Kode = ?, @Id_Cust = ?', [4, $idCustomer]);
        return response()->json($tabel);
    }

    public function getDataRefBank($idReferensi)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_1486_ACC_LIST_REFERENSI_BANK] @Kode = ?, @IdReferensi = ?', [2, $idReferensi]);
        return response()->json($tabel);
    }

    public function getListPenagihanSJ($idCustomer)
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_LIST_PENAGIHAN_SJ] @Kode = ?, @IdCustomer = ?', [3, $idCustomer]);
        return response()->json($tabel);
    }

    public function getLihatDetailPelunasan($no_Pen)
    {
        $noPen = str_replace('.', '/', $no_Pen);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Penagihan = ?', [4, $noPen]);
        return response()->json($tabel);
    }

    public function getListPelunasanTagihan($no_Pen)
    {
        $noPen = str_replace('.', '/', $no_Pen);
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_LIST_PELUNASAN_TAGIHAN] @Kode = ?, @Id_Penagihan = ?', [4, $noPen]);
        return response()->json($tabel);
    }

    public function getKdPerkiraan()
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [Sp_List_KodePerkiraan] @Kode = ?', [1]);
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
