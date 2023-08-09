<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaOrderGambarController extends Controller
{

    public function index()
    {
        return view('WORKSHOP.Workshop.Transaksi.PenerimaOrderGambar');

    }
    public function GetAllData($tgl_awal , $tgl_akhir) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-GBR] @kode = ?, @tgl1 = ?, @tgl2 = ?', [14, $tgl_awal, $tgl_akhir]);
        return response()->json($all);
    }
    public function cekuser($user) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_WRK_USER-WRK] @kode = ?, @user = ?', [1, $user]);
        return response()->json($data);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
        //dd($request->all());
        $radiobox = $request->radiobox;
        if ($radiobox == "acc") {
            # code...
            $data = $request->semuacentang;
            $iduser = $request->iduser;
            $idorder = explode(",", $data);
            for ($i=0; $i < count($idorder); $i++) {
                DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_ACC-RCV-ORDER-GBR] @user = ?, @noOrder = ?', [$iduser, $idorder[$i]]);
            }
            return redirect()->back()->with('success', 'Order DiACC');
        }
        else if($radiobox == "batal_acc"){
            $data = $request->semuacentang;
            $idorder = explode(",", $data);
            for ($i=0; $i < count($idorder); $i++) {
                DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_BATAL-ACC-RCV-ORDER-GBR] @noOrder = ?', [ $idorder[$i]]);
            }
            return redirect()->back()->with('success', 'Batal ACC Order');
        }
        else if ($radiobox == "tolak_setuju") {
            # code...
            $data = $request->semuacentang;
            $idorder = explode(",", $data);
            $dataket = $request->KetTdkS;
            $ket = explode(",", $dataket);
            for ($i=0; $i < count($idorder); $i++) {
                DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_TOLAK-ORDER-GBR]  @noOrder = ?, @ket = ?', [$idorder[$i],$ket[$i]]);
            }
            return redirect()->back()->with('success', 'Order diTolak');
        }
    }


    public function destroy($id)
    {
        //
    }
}
