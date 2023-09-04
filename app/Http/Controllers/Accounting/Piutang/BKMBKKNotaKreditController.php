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

    public function getTabelTampilBKM($tanggalTampilBKM, $tanggalTampilBKM2)
    {
        // dd("masuk");
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BKM_NOTA_KREDIT_PERTGL] @tgl1 = ?, @tgl2 = ?', [$tanggalTampilBKM, $tanggalTampilBKM2]);
        return response()->json($tabel);
    }

    public function getTabelTampilBKK($tanggalTampilBKK, $tanggalTampilBKK2)
    {
        // dd("masuk");
        $tabel =  DB::connection('ConnAccounting')->select('exec [SP_5298_ACC_LIST_BKK_NOTA_KREDIT_PERTGL] @tgl1 = ?, @tgl2 = ?', [$tanggalTampilBKK, $tanggalTampilBKK2]);
        return response()->json($tabel);
    }

    // public function getIdPelunasan()
    // {
    //     $idPelunasan = DB::connection('ConnAccounting')
    //         ->table('T_Pelunasan_Tagihan')
    //         ->first('Id_Pelunasan');
    //     dd($idPelunasan);

    //     return response()->json(['Id_Pelunasan' => $idPelunasan]);
    // }

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
        $konversi1 = $request->konversi1;
        $nilai1 = $request->nilai1;
        $nilai = $request->nilai;
        $idBankBKM = $request->idBankBKM;
        $idBankBKK = $request->idBankBKK;
        $idMataUang = $request->idMataUangBKM;
        $idBKK = $request->idBKK;
        $idCustomer = $request->idCustomer;
        $kursRupiah = $request->kursRupiah;
        $jenisBankBKM = $request->jenisBankBKM;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $jumlahUangBKM = $request->jumlahUangBKM;
        $idPelunasan = $request->idPelunasan;
        $idPenagihan = $request->idPenagihan;
        $idKodePerkiraanBKM = $request->idKodePerkiraanBKM;
        // $idPembayaran = $request->idPembayaran;
        // $uraian = $request->uraian;
        // $nilai = $request->nilai;
        // $idKodePerkiraanBKK = $request->idKodePerkiraanBKK;
        // $jenisBankBKK = $request->jenisBankBKK;

        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_INSERT_BKM_TPELUNASAN]
        @idBKM = ?,
        @tglinput = ?,
        @userinput = ?,
        @terjemahan = ?,
        @nilaipelunasan = ?,
        @IdBank= ?,
        @kode = ?', [
            $idBKM,
            $tanggal,
            null,
            $konversi,
            $nilai1,
            $idBankBKM,
            1
        ]);

        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_INSERT_BKM_TPELUNASAN_TAG]
        @idBKM = ?,
        @tgl = ?,
        @idBKKAcuan = ?,
        @idUang = ?,
        @idJenis = ?,
        @idBank = ?,
        @nilaipelunasan = ?,
        @user = ?,
        @idCust = ?,
        @Kurs = ?,
        @status = ?', [
            $idBKM,
            $tanggal,
            $idBKK,
            $idMataUang,
            1,
            $idBankBKM,
            $nilai1,
            1,
            $idCustomer,
            $kursRupiah,
            'Y'
        ]);

        // DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_INSERT_BKM_TDETAILPEL]
        // @idpelunasan = ?,
        // @idpenagihan = ?,
        // @sisa = ?,
        // @kodePerk = ?,
        // @kode = ?', [
        //     $idPelunasan,
        //     $idPenagihan,
        //     $jumlahUangBKM,
        //     $idKodePerkiraanBKM,
        //     1
        // ]);

        $tgl = $bulan . $tahun;

        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_COUNTER_IDBKM]
        @idbkm = ?,
        @idbank = ?,
        @jenis = ?,
        @tgl = ?', [
            $idBKK,
            $idBankBKK,
            $jenisBankBKM,
            $tgl
        ]);

        DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_INSERT_BKK_TPEMBAYARAN]
        @idBKK = ?,
        @tgl = ?,
        @userinput = ?,
        @terjemahan = ?,
        @nilai = ?,
        @IdBank =  ?,
        @kode = ?', [
            $idBKK,
            $tanggal,
            null,
            $konversi1,
            $nilai,
            $idBankBKK,
            1
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
        $proses =  $request->all();
        if ($proses['cetak'] == "cetakBKM") {
            //dd($request->all());
            $idBKMTampil = $request ->idBKMTampil;
            DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_TGLCETAK_BKM] @idBKM = ?', [
                $idBKMTampil]);
            return redirect()->back()->with('success', 'Detail Sudah Terkoreksi');
        }
        else if ($proses['cetak'] == "cetakBKK") {
            //dd($request->all());
            $idBKKTampil = $request ->idBKKTampil;
            DB::connection('ConnAccounting')->statement('exec [SP_5298_ACC_UPDATE_TGLCETAK_BKK] @idBKK = ?', [
                $idBKKTampil]);
            return redirect()->back()->with('success', 'Detail Sudah Terkoreksi');
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
