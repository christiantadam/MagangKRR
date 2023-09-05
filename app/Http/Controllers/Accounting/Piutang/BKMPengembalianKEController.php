<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BKMPengembalianKEController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMPengembalianKE', compact('data'));
    }

    public function getNamaCustomer()
    {
        $cust =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_CUSTOMER]');
        return response()->json($cust);
    }

    public function getJenisPembayaran()
    {
        $jenis =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_JENIS_DOK]');
        return response()->json($jenis);
    }

    function getUraianBKMEnter($id, $tanggal)
    {
        $idBank = $id;
        $tanggal = $tanggal;
        $jenis = 'R';

        $result = DB::statement("EXEC [dbo].[SP_5409_ACC_COUNTER_BKM_BKK] ?, ?, ?, ?", [
            $jenis,
            $tanggal,
            $idBank,
            null
            // Pass by reference for output parameter
        ]);

        $tahun = substr($tanggal, -10, 4);
        $x = DB::connection('ConnAccounting')->table('T_COUNTER_BKM')->where('Periode', '=', $tahun)->first();
        $nomorIdBKM = '00000' . str_pad($x->Id_BKM_E_Rp, 5, '0', STR_PAD_LEFT);
        $idBKM = $idBank . '-R' . substr($tahun, -2) . substr($nomorIdBKM, -5);

        return response()->json($idBKM);
    }

    function getUraianBKKEnter($id, $tanggal)
    {
        $idBank = $id;
        $tanggal = $tanggal;
        $jenis = 'P';

        $result = DB::statement("EXEC [dbo].[SP_5409_ACC_COUNTER_BKM_BKK] ?, ?, ?, ?", [
            $jenis,
            $tanggal,
            $idBank,
            null
            // Pass by reference for output parameter
        ]);

        $tahun = substr($tanggal, -10, 4);
        $x = DB::connection('ConnAccounting')->table('T_COUNTER_BKK')->where('Periode', '=', $tahun)->first();
        $nomorIdBKK = '00000' . str_pad($x->Id_BKK_E_Rp, 5, '0', STR_PAD_LEFT);
        $idBKK = $idBank . '-P' . substr($tahun, -2) . substr($nomorIdBKK, -5);

        return response()->json($idBKK);
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
