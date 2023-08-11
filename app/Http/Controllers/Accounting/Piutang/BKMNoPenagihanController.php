<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BKMNoPenagihanController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMNoPenagihan', compact('data'));
    }

    function getNamaCustomer($kode = null)
    {
        $cust =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_CUSTOMER] @Kode = ?', [$kode]);
        return response()->json($cust);
    }

    function getMataUang()
    {
        $data =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_MATA_UANG]
        @Kode = ?', [1]);
        return response()->json($data);
    }

    function getDataBank()
    {
        $bank =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BANK]');
        return response()->json($bank);
    }

    function getJenisPembayaran()
    {
        $jenis =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_JENIS_DOK]');
        return response()->json($jenis);
    }

    function getKodePerkiraan()
    {
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_KODE_PERKIRAAN] @Kode = ?', 1);
        return response()->json($kode);
    }

    function getJenisBank($idBank)
    {
        //dd("mau");
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BANK_1] @idBank = ?', [$idBank]);
        return response()->json($kode);
    }

    function getUraianEnter($idBank, $jenis, $tanggal, $id)
    {
        //dd("mau");
        $kode =  DB::connection('ConnAccounting')->select('exec [SP_5409_ACC_COUNTER_BKM_BKK] @bank = ?, @jenis = ?, @tgl = ?, @id = ?',
        [$idBank, $jenis, $tanggal, $id]);
        return response()->json($kode);
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
