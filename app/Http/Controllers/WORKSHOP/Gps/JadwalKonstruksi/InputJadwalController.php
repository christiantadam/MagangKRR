<?php

namespace App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InputJadwalController extends Controller
{

    public function index()
    {
        //
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-WORKSTATION]');
        return view('workshop.GPS.Jadwal_konstruksi.InputJadwal', compact(['data']));
    }
    public function LoadData($noOd) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-ORDER-GAMBAR] @kode = ?, @noOd = ?', [1,$noOd]);
        return response()->json($data);
    }
    public function cekdataestimasi($noOd) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_CEK-ESTIMASI-KONSTRUKSI] @noOd = ?', [$noOd]);
        return response()->json($data);
    }
    public function Getdatabagian($noOd) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-BAGIAN-GAMBAR] @noOd = ?', [$noOd]);
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
