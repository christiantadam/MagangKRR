<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Proyek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PenerimaOrderProyekController extends Controller
{

    public function index()
    {
        return view('WORKSHOP.Workshop.Proyek.PenerimaOrderProyek');
    }
    public function GetAllData($tgl_awal, $tgl_akhir)
    {
        $all = DB::connection('Connworkshop')->select('[SP_5298_WRK_LIST-ORDER-PRY] @kode = ?, @tgl1 = ?, @tgl2 = ?', [13, $tgl_awal, $tgl_akhir]);
        return response()->json($all);
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
