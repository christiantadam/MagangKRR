<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaintenanceDivisiController extends Controller
{
    public function index()
    {
        $divisi = DB::connection('Connworkshop')->select('exec SP_5298_WRK_DIVISI');
        // dd($divisi);
        return view('WORKSHOP.Workshop.Master.MaintenanceDivisi', compact(['divisi']));
    }
    public function create()
    {
        dd('masuk create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        //buat variabel
        $idDivisi = $request->IdDivisi;
        $namaDivisi = $request->nama_divisi;
        //ini itu buat isi data ke data bese
        DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_PROSES-DIVISI] @kode = ?, @kdDivisi = ?, @nmDivisi = ?', [1, $idDivisi, $namaDivisi]);
        //ini buat kasih pensan sukses
        return redirect()->back()->with('success', $namaDivisi . ' Sudah Dibuat! Dengan Kode Divisi ' . $idDivisi);
    }
    public function show($id)
    {
        dd('masuk show');
    }
    public function edit($id)
    {
        dd('masuk edit');
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $idDivisi = $request->KodeDivisi;
        $namaDivisi = $request->nama_divisi;
        DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_PROSES-DIVISI] @kode = ?, @kdDivisi = ?, @nmDivisi = ?', [2, $idDivisi, $namaDivisi]);
        return redirect()->back()->with('success', $namaDivisi . ' Sudah Diubah! Dengan Kode Divisi ' . $idDivisi);

    }
    public function destroy($id)
    {
        //dd('masuk delete');
        DB::connection('Connworkshop')->statement('exec [SP_5298_WRK_PROSES-DIVISI] @kode = ?, @kdDivisi = ?', [3, $id]);
        return redirect()->back()->with('success', $id . ' Sudah DiHapus!');
    }
}
