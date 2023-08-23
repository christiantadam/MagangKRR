<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BKMTransitorisBankController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMTransitorisBank', compact('data'));
    }

    function getMataUang()
    {
        $data =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_MATA_UANG]
        @kode = ?', [1]);
        return response()->json($data);
    }

    function getBank()
    {
        //dd("mau");
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BANK]');
        return response()->json($kode);
    }

    function getJenisPembayaran()
    {
        //dd("mau");
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_JENIS_DOK]');
        return response()->json($kode);
    }

    function getKodePerkiraan()
    {
        //dd("mau");
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_KODE_PERKIRAAN] @Kode = ?', [1]);
        return response()->json($kode);
    }

    function getUraianEnter($id, $tanggal)
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
