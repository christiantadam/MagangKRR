<?php

namespace App\Http\Controllers\Accounting\Piutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BKMBKKNotaKreditController extends Controller
{
    public function index()
    {
        $data = 'Accounting';
        return view('Accounting.Piutang.BKMBKKNotaKredit', compact('data'));
    }

    public function getDataNotaKredit()
    {
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_NOTA_KREDIT] ');
        return response()->json($tabel);
    }

    function getUraianEnterBKM($id, $tanggal)
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

    function getUraianEnterBKK($id, $tanggal)
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
        $idBKK = $idBank . '-R' . substr($tahun, -2) . substr($nomorIdBKK, -5);

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
        //dd($request->all());
        $idBKM = $request->idBKM;
        $tanggal = $request->tanggal;
        $konversi = $request->konversi;
        $nilai1 = $request->nilai1;
        $idBankBKM = $request->idBankBKM;
        // $idMataUang = $request->idMataUang;
        // $kursRupiah = $request->kursRupiah;
        // $idPembayaran = $request->idPembayaran;
        // $uraian = $request->uraian;
        // $nilai = $request->nilai;
        // $idKodePerkiraanBKK = $request->idKodePerkiraanBKK;
        // $jenisBankBKK = $request->jenisBankBKK;

        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_INSERT_BKM_TPELUNASAN]
        @idBKM = ?,
        @tgl = ?,
        @userinput = ?,
        @terjemahan = ?,
        @nilai = ?,
        @IdBank= ?', [
            $idBKM,
            $tanggal,
            null,
            $konversi,
            $nilai1,
            $idBankBKM
        ]);
        return redirect()->back()->with('success', 'BKK TPembayaran berhasil diSIMPAN');
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
