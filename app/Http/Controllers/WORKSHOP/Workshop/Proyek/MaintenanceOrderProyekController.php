<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Proyek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceOrderProyekController extends Controller
{

    public function index()
    {
        $satuan = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_SATUAN]');
        $divisi = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_USER-DIVISI] @user = ?', [4384]);
        return view('WORKSHOP.Workshop.Proyek.MaintenanceOrderProyek', compact(['divisi', 'satuan']));
    }
    public function GetMesin($idDivisi) {
        $mesin = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_LIST-MESIN] @Id_divisi = ?', [$idDivisi]);
        return response()->json($mesin);
    }
    public function GetDataAll($tgl_awal, $tgl_akhir, $divisi)
    {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-PRY] @kode = ?, @tgl1 = ?, @tgl2 = ?, @div = ?', [1, $tgl_awal, $tgl_akhir, $divisi]);
        return response()->json($all);
    }
    public function GatDataForUserOrder($tgl_awal, $tgl_akhir, $iduserOrder, $divisi)
    {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-PRY] @kode = ?, @tgl1 = ?, @tgl2 = ?, @user = ?, @div = ?', [2, $tgl_awal, $tgl_akhir, $iduserOrder, $divisi]);
        return response()->json($all);
    }
    public function GetDataTable($noOrder) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-PRY] @kode = ?, @noOrder = ?', [3, $noOrder]);
        return response()->json($all);
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $tgl = $request->Tanggalmodal;
        $IdDiv = $request->iddivmodal;
        $namaBrg = $request->NamaProyekModal;
        $jml = $request->Jumlah;
        $userOd = $request->PengOrderModal;
        $ketOd = $request->KeteranganModal;
        $noSat = $request->SatuanModal;
        $noMesin = $request->MesinModal;
        $radio = $request->inlineRadioOptions;
        if ($radio == "Buat") {
            $noket = 1;
            DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_INSERT-ORDER-PRY] @tgl = ?, @IdDiv = ?, @namaBrg = ?, @jml = ?, @userOd = ?, @ketOd = ?, @noSat = ?, @noMesin = ?, @noKet = ?', [$tgl, $IdDiv, $namaBrg, $jml, $userOd, $ketOd, $noSat, $noMesin, $noket]);
        }
        if ($radio == "Perbaikan") {
            $noket = 3;
            DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_INSERT-ORDER-PRY] @tgl = ?, @IdDiv = ?, @namaBrg = ?, @jml = ?, @userOd = ?, @ketOd = ?, @noSat = ?, @noMesin = ?, @noKet = ?', [$tgl, $IdDiv, $namaBrg, $jml, $userOd, $ketOd, $noSat, $noMesin, $noket]);
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
