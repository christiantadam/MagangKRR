<?php

namespace App\Http\Controllers\Payroll\Agenda\GantiShift;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GantiShift1Controller extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        // dd($dataDivisi);
        return view('Payroll.Agenda.GantiShift.gantiShift1', compact('dataDivisi'));
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
        if ($data['opsi'] == 0) {
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_CONFIGURESHIFT @mindate = ?, @maxdate = ?, @id_Div = ?', [
                $data['mindate'],
                $data['maxdate'],
                $data['id_Div'],
            ]);
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_HITUNG_JENJANG @tanggal = ?', [
                $data['mindate']
            ]);
            return redirect()->route('Aturan1_3.index')->with('alert', 'Selesai Ganti Shift !');
        } else if ($data['opsi'] == 1) {
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_CONFIGURESHIFT @mindate = ?, @maxdate = ?', [
                $data['mindate'],
                $data['maxdate'],

            ]);
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_HITUNG_JENJANG @tanggal = ?', [
                $data['mindate']
            ]);
            return redirect()->route('Aturan1_3.index')->with('alert', 'Selesai Ganti Shift !');
        }
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
        if ($crExplode[$lastIndex] == "getDataNomor") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PRG_PAY_look_harian');
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getShift") {
            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_GETSHIFTKARY @kd_pegawai = ? , @mindate = ?, @maxdate = ?', [
                $crExplode[0],
                $crExplode[1],
                $crExplode[2],
            ]);
            // dd($dataPegawai);
            return response()->json($dataShift);
        };
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
    public function destroy($id)
    {
        //
    }
}
