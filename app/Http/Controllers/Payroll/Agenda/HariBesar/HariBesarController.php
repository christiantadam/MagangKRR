<?php

namespace App\Http\Controllers\Payroll\Agenda\HariBesar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HariBesarController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Agenda.HariBesar.hariBesar', compact('data'));
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
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_HARILIBUR @tanggal = ?, @keterangan = ?', [
            $data['tanggal'],
            $data['keterangan'],

        ]);
        return redirect()->route('HariBesar.index')->with('alert', 'Data libur berhasil ditambahkan!');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);

        //getPegawai
        if ($crExplode[1] == "getLibur") {
            $dataLibur = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_HARILIBUR @tahun = ?', [$crExplode[0]]);
            // dd($crExplode[0],$dataLibur);
            // dd($dataPegawai);
            return response()->json($dataLibur);
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

        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_HARILIBUR @tanggal = ?, @keterangan = ?', [
            $data['tanggal'],
            $data['keterangan'],

        ]);
        return redirect()->route('HariBesar.index')->with('alert', 'Data Libur Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_DEL_HARILIBUR @tanggal = ?', [
            $data['tanggal'],
        ]);
        return redirect()->route('HariBesar.index')->with('alert', 'Data libur berhasil dihapus!');
    }
}
