<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceDrafterController extends Controller
{

    public function index()
    {
        $drafter = DB::connection('Connworkshop')->select('exec [SP_5298_WRK_USER-DRAFTER]');

        return view('WORKSHOP.Workshop.Master.MaintenanceDrafter', compact(['drafter']));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //dd($request->all());
        //buat variabel
        $idDraf = $request->UsrDraf;
        $namaPembuat = $request->nama;
        //ini itu buat isi data ke data bese
        DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_PROSES-DRAFTER] @kode = ?, @kdDraf = ?, @nmDraf = ?', [1, $idDraf, $namaPembuat]);
        //ini buat kasih pensan sukses
        return redirect()->back()->with('success', $namaPembuat . ' Sudah Ditambahkan! Dengan Id User ' . $idDraf);
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
         $idDraf = $request->UserDrafter;
         $namaPembuat = $request->nama;
         DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_PROSES-DRAFTER] @kode = ?, @kdDraf = ?, @nmDraf = ?', [2, $idDraf, $namaPembuat]);
         return redirect()->back()->with('success', $namaPembuat . ' Sudah Diubah! Dengan Kode Divisi ' . $idDraf);
    }


    public function destroy($id)
    {
            //dd('masuk delete');
            DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_PROSES-DRAFTER] @kode = ?, @kdDraf = ?', [3, $id]);
            return redirect()->back()->with('success', $id . ' Sudah DiHapus!');
    }
}
