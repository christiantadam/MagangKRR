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
        //dd($bulan, $tahun);[SP_5298_ACC_LIST_CASH_ADV]
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

    function getIDBKM($id, $tanggal)
    {
        $idBank = $id;
        $tanggalInput = $tanggal;
        $jenis = 'R';

        $result = DB::statement("EXEC [dbo].[SP_5409_ACC_COUNTER_BKM_BKK] ?, ?, ?, ?", [
            $jenis,
            $tanggalInput,
            $idBank,
            null
            // Pass by reference for output parameter
        ]);

        $tahun = substr($tanggalInput, -10, 4);
        $x = DB::connection('ConnAccounting')->table('T_Counter_BKM')->where('Periode', '=', $tahun)->first();
        $nomorIdBKM = '00000' . str_pad($x->Id_BKM_E_Rp, 5, '0', STR_PAD_LEFT);
        $idBKM = $idBank . '-R' . substr($tahun, -2) . substr($nomorIdBKM, -5);

        return response()->json($idBKM);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        dd($request->all());
        $idBKMNew = $request->idBKMNew;
        $tglInputNew = $request->tglInputNew;
        $userInput = $request->userInput;
        $terjemahan = $request->total1;
        $nilaiPelunasan = $request->total1;

        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_INSERT_BKM_TPELUNASAN]
        @idBKM = ?,
        @tglinput = ?,
        @userinput = ?,
        @terjemahan = ?,
        @nilaipelunasan = ?', [
            $idBKMNew,
            $tglInputNew,
            $userInput,
            $terjemahan,
            $nilaiPelunasan,
        ]);
        return redirect()->back()->with('Success', 'Sudah berhasil disimpan!');
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
        $idBKM = $request ->idBKM;
        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_TGLCETAK_BKM] @idBKM = ?', [
            $idBKM]);
        return redirect()->back()->with('success', 'Detail Sudah Terkoreksi');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
