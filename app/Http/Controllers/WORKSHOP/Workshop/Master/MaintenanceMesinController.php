<?php

namespace App\Http\Controllers\WORKSHOP\Workshop\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceMesinController extends Controller
{

    public function index()
    {
        $divisi = DB::connection('Connworkshop')->select('exec SP_5298_WRK_DIVISI');
        //$mesin = DB::connection('Connworkshop')->select('exec SP_5298_WRK_LIST-MESIN');

        return view('WORKSHOP.Workshop.Master.MaintenanceMesin', compact(['divisi']));
    }
    public function getmesin($id) {
        $data = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_LIST-MESIN] @Id_Divisi = ?', [$id]);
        // dd($data);
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
