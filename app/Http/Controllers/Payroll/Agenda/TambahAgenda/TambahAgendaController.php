<?php

namespace App\Http\Controllers\Payroll\Agenda\TambahAgenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TambahAgendaController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        return view('Payroll.Agenda.TambahAgenda.tambahAgenda', compact('dataDivisi'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = array_filter($request->all(), 'is_numeric', ARRAY_FILTER_USE_KEY);
        // dd($data, " Masuk store tambah agenda bosq");
        foreach ($data as $item) {
            $explodedData = explode(".", $item);
            $Kd_Pegawai = $explodedData[0];
            $Tanggal = $explodedData[1];
            $Jam_Masuk = $explodedData[2];
            $Jam_Keluar = $explodedData[3];
            $Awal_Istirahat = $explodedData[4];
            $Akhir_Istirahat = $explodedData[5];
            $Ket_Lembur = $explodedData[6];
            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA_LEMBUR @Kd_Pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @jml_istirahat= ?, @Ket_Absensi= ?, @Ket_Lembur= ?, @User_Input= ?', [
                $Kd_Pegawai,
                $Tanggal,
                $Jam_Masuk,
                $Jam_Keluar,
                8,
                $Awal_Istirahat,
                $Akhir_Istirahat,
                1,
                "L",
                $Ket_Lembur,
                "A12001",


            ]);
        }

        return redirect()->route('TambahAgenda.index')->with('alert', 'Agenda berhasil ditambahkan!');
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
        } else if ($crExplode[$lastIndex] == "getAgendaPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_AGENDA_PEGAWAI @kd_pegawai = ?, @Tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getPegawaiDivisiShift") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_SHIFT @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getShiftPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec [SP_1003_PAY_PERIKSA_PEGAWAI_SHIFT] @kd_pegawai = ?, @tanggal = ?', [$crExplode[0], $crExplode[1]]);
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
