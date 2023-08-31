<?php

namespace App\Http\Controllers\Payroll\Transaksi\AbsenSimpang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenSimpangController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.AbsenSimpang.absenSimpang', compact('data'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    //Display the specified resource.
    public function show($cr)
    {
        // dd("Masuk Show");
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
        if ($crExplode[$lastIndex] == "getDataSimpang") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_ABSEN_SALAH_SHIFT @tanggal = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        }else if ($crExplode[$lastIndex] == "getViewSimpang") {

            //getDataPegawai
            $records = DB::table('VW_PRG_5409_PAY_ABSEN_ANEH')
            ->where('Tanggal',$crExplode[0])
            ->get();
            // dd($records);
            // dd($dataPegawai);
            return response()->json($records);
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
        //
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = array_filter($request->all(), 'is_numeric', ARRAY_FILTER_USE_KEY);
        // dd($data);
        foreach ($data as $item) {
            // dd($item);
            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_HAPUS_ABSEN_ANEH @idagenda = ?', [
                $item,
            ]);
        }

        // dd('Masuk Destroy', $data);

        return redirect()->route('AbsenSimpang.index')->with('alert', 'Data absen berhasil dihapus!');
    }
}
