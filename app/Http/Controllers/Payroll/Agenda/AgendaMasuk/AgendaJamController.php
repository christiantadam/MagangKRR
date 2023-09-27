<?php

namespace App\Http\Controllers\Payroll\Agenda\AgendaMasuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgendaJamController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        return view('Payroll.Agenda.AgendaMasuk.agendaJam', compact('dataDivisi'));
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
        // dd($data);
        // dd($data , " Masuk store bosq");
        if ( $data['opsi'] === 'hariMinggu') {
            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                $data['kd_pegawai'],
                $data['Tanggal'],
                $data['Jml_Jam'],
                $data['Ket_Absensi'],
                $data['User_Input']
            ]);
            return redirect()->back();
        }else if ($data['opsi'] === 'hariNormal') {
            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                $data['kd_pegawai'],
                $data['Tanggal'],
                $data['Jam_Masuk'],
                $data['Jam_Keluar'],
                $data['Jml_Jam'],
                $data['awal_Jam_istirahat'],
                $data['akhir_Jam_istirahat'],
                $data['Ket_Absensi'],
                $data['User_Input']
            ]);
            return redirect()->back();
        }else if ($data['opsi'] === 'insertDivisi') {
            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_SHIFT @id_divisi = ?', [
                $data['id_divisi'],
            ]);
            // dd($dataShift);
            foreach ($dataShift as $shift) {
                dd($shift->Kd_Pegawai);
            };
            return redirect()->back();
        }

    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getPegawai
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        }else if ($crExplode[$lastIndex] == "cekAgenda") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [$crExplode[0],$crExplode[1]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
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
    public function destroy($id)
    {
        //
    }
}
