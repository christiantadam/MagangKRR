<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceOrderKerjaController extends Controller
{

    public function index()
    {
        //
        $satuan = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_SATUAN]');
        $divisi = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_USER-DIVISI] @user = ?', [4384]);
        return view('WORKSHOP.Workshop.Transaksi.MaintenanceOrderKerja', compact(['divisi', 'satuan']));
    }
    public function LoadData1($noGambar)
    {
        $data1 = DB::connection('ConnPurchase')->select('[SP_5298_WRK_LOAD-BARANG-2] @noGbr = ?', [$noGambar]);
        return response()->json($data1);
    }
    public function LoadData2($kdbarang)
    {
        $data2 = DB::connection('Connworkshop')->select('[SP_5298_WRK_SALDO-BARANG] @kdBarang = ?', [$kdbarang]);
        return response()->json($data2);
    }
    public function LoadData($kdBarang)
    {
        $data = DB::connection('ConnPurchase')->select('[SP_5298_WRK_LOAD-BARANG-1] @kdBarang = ?', [$kdBarang]);
        return response()->json($data);
    }
    public function GetDataAll($tgl_awal, $tgl_akhir, $divisi)
    {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-KRJ] @kode = ?, @tgl1 = ?, @tgl2 = ?, @div = ?', [1, $tgl_awal, $tgl_akhir, $divisi]);
        return response()->json($all);
    }
    public function GatDataForUserOrder($tgl_awal, $tgl_akhir, $iduserOrder, $divisi)
    {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-KRJ] @kode = ?, @tgl1 = ?, @tgl2 = ?, @user = ?, @div = ?', [2, $tgl_awal, $tgl_akhir, $iduserOrder, $divisi]);
        return response()->json($all);
    }
    public function mesin($idDivisi)
    {
        $mesin = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_LIST-MESIN] @Id_divisi = ?', [$idDivisi]);
        return response()->json($mesin);
    }


    public function create()
    {
        //
    }

    public function inputfile(Request $request) {
        dd($request->all());
        $kdBarang = $request->kode;
        $pdf = $request->name;
        DB::connection('ConnPurchase')->table('Y_FOTO')->insert([
            'KD_BARANG' => $kdBarang,
            'PDF' => $pdf
        ]);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $tgl = $request->tanggalmodal;
        $IdDiv = $request->iddivisiOrder;
        $kdBrg = $request->Kdbarangmodal;
        $noGbr = $request->NomorGambarModal;
        $namaBrg = $request->NamaBarangModal;
        $jml = $request->JumlahModal;
        $userOd = $request->UserModal;
        $ketOd = $request->KeteranganModal;
        $noSat = $request->SatuanModal;
        $noMesin = $request->MesinModal;
        $radio = $request->inlineRadioOptions;
        if ($radio == "Baru") {
            DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_INSERT-ORDER-KRJ] @tgl = ?, @IdDiv = ?, @kdBrg = ?, @noGbr = ?, @namaBrg = ?, @jml = ?, @userOd = ?, @ketOd = ?, @noSat = ?, @noMesin = ?, @noKet = ?', [$tgl, $IdDiv, $kdBrg, $noGbr, $namaBrg, $jml, $userOd, $ketOd, $noSat, $noMesin, 1]);
        }
        if ($radio == "Perbaikan") {
            DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_INSERT-ORDER-KRJ] @tgl = ?, @IdDiv = ?, @kdBrg = ?, @noGbr = ?, @namaBrg = ?, @jml = ?, @userOd = ?, @ketOd = ?, @noSat = ?, @noMesin = ?, @noKet = ?', [$tgl, $IdDiv, $kdBrg, $noGbr, $namaBrg, $jml, $userOd, $ketOd, $noSat, $noMesin, 3]);
        }
        return redirect()->back()->with('success', 'Data TerSIMPAN');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
