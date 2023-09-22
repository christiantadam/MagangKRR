<?php

namespace App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstimasiJadwalController extends Controller
{
    public function index()
    {
        //
        return view('workshop.GPS.Jadwal_konstruksi.EstimasiJadwal');
    }
    public function CekEstimasiKonstruksi($noOd) {
        $all = DB::connection('Connworkshop')->select('[SP_5298_PJW_CEK-ESTIMASI-KONSTRUKSI] @noOd = ?', [$noOd]);
        return response()->json($all);
    }
    public function LoadData($noOd){
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-ORDER-GAMBAR] @kode = ?, @noOd = ?', [1,$noOd]);
        return response()->json($data);
    }
    public function GetTanggal($noOd) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_ESTIMASI_KONSTRUKSI] @noOd = ?', [$noOd]);
        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $noOd = $request->NoOrder;
        $tglStart = $request->TglStart;
        $tglFinish = $request->TglFinish;
        // $ppic = $request->PPIC;
        DB::connection('Connworkshop')->statement('exec [SP_5298_PJW_MAINT-ESTIMASI-KONSTRUKSI] @kode = ?, @noOd = ?, @tglStart = ?, @tglFinish = ?, @ppic = ?', [1, $noOd, $tglStart, $tglFinish,4384]);
        return redirect()->back()->with('success',"Data telah diSimpan.");
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
