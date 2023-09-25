<?php

namespace App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MaintenanceBagianGambarController extends Controller
{
    public function index()
    {
        //
        return view('workshop.GPS.Jadwal_konstruksi.MaintenanceGambar');
    }
    public function LoadData($noOd){
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-ORDER-GAMBAR] @kode = ?, @noOd = ?', [1,$noOd]);
        return response()->json($data);
    }
    public function cekdataestimasi($noOd) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_CEK-ESTIMASI-KONSTRUKSI] @noOd = ?', [$noOd]);
        return response()->json($data);
    }
    public function cekdata($noOd, $bagian) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_CEK-BAGIAN-GAMBAR] @noOd = ?, @bagian = ?', [$noOd, $bagian]);
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
