<?php

namespace App\Http\Controllers\WORKSHOP\Gps\InformasiKonstruksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JadwalPerWorkStationController extends Controller
{

    public function index()
    {
        //
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-WORKSTATION]');
        return view('workshop.GPS.Informasi_Konstruksi.JadwalPerWorkStation', compact(['data']));
    }
    public function LoadData($worksts,$date1,$date2){
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_NOANTRI-KONSTRUKSI-NOFINISH] @kode = ?, @worksts = ?, @date1 = ?, @date2 = ?', [1, $worksts, $date1, $date2]);
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
