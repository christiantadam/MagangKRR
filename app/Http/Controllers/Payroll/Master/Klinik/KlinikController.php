<?php

namespace App\Http\Controllers\Payroll\Master\Klinik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KlinikController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataKlinik = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_KLINIK ');
        return view('Payroll.Master.Klinik.klinik', compact('dataKlinik'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data , " Masuk store bosq");
        DB::connection('ConnPayroll')->statement('exec SP_5409_PRG_MAINT_KLINIK @kode = ?, @nm = ?, @alamat = ?, @kota = ?, @telp= ?', [
            1,
            $data['nm'],
            $data['alamat'],
            $data['kota'],
            $data['telp'],

        ]);
        return redirect()->route('MasterKlinik.index')->with('alert', 'Data klinik berhasil ditambahkan!');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);

        //getDivisi
        if ($crExplode[1] == "getKlinik") {
            $dataKlinik = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_KLINIK ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataKlinik);
        }
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request)
    {
        $data = $request->all();

        DB::connection('ConnPayroll')->statement('exec SP_5409_PRG_MAINT_KLINIK @kode = ?, @idklinik = ?, @nm = ?, @alamat = ?, @kota = ?, @telp= ?', [
            2,
            $data['idklinik'],
            $data['nm'],
            $data['alamat'],
            $data['kota'],
            $data['telp']
        ]);
        return redirect()->route('MasterKlinik.index')->with('alert', 'Data Klinik Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_PRG_MAINT_KLINIK @kode = ?, @idklinik = ?', [
            3,
            $data['idklinik'],
        ]);
        return redirect()->route('MasterKlinik.index')->with('alert', 'Data klinik berhasil dihapus!');
    }
}
