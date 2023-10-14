<?php

namespace App\Http\Controllers\Payroll\Agenda\InsertAgenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class InsertAgendaSupervisorController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?', [1]);
        return view('Payroll.Agenda.InsertAgenda.insertSupervisor', compact('dataDivisi', 'dataShift'));
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
        $arrayPegawai = explode(".", $data['pegawai']);
        $tanggal_agenda = new DateTime($data['Tanggal']);
        $masuk = new DateTime($tanggal_agenda->format('Y-m-d') . " " . $data['jam_masuk']);
        $pulang = new DateTime($tanggal_agenda->format('Y-m-d') . " " . $data['jam_pulang']);
        // dd($pulang->format('G'));
        if ($pulang->format('G') < $masuk->format('G')) {
            $pulang->modify('+1 day');
        }
        if ($masuk->format('G') >= 0 && $masuk->format('G') < 7 && $masuk->format('a') == 'am') {
            $masuk->modify('+1 day');
            $pulang->modify('+1 day');
        }
        if ($data['jam_istirahat_awal'] == "00:00") {
            $awal_istirahat = DateTime::createFromFormat('H:i:s A', '00:00:00 AM');
            $akhir_istirahat = DateTime::createFromFormat('H:i:s A', '00:00:00 AM');
        } else {
            $awal_istirahat = new DateTime($tanggal_agenda->format('Y-m-d') . " " . $data['jam_istirahat_awal']);
            $akhir_istirahat = new DateTime($tanggal_agenda->format('Y-m-d') . " " . $data['jam_istirahat_akhir']);
            if ($awal_istirahat->format('G') < $masuk->format('G')) {
                $awal_istirahat->modify('+1 day');
            }
            if ($akhir_istirahat->format('G') < $masuk->format('G')) {
                $akhir_istirahat->modify('+1 day');
            }
            if ($awal_istirahat < $masuk) {
                $awal_istirahat->modify('+1 day');
                $akhir_istirahat->modify('+1 day');
            }
        }
        foreach ($arrayPegawai as $kd_pegawai) {
            dump($kd_pegawai);
            $a = '';
            $b = '';
            $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_JAM_AGENDA @kd_pegawai = ?, @tanggal = ?', [
                $kd_pegawai,
                $data['Tanggal'],
            ]);
            if (count($dataAgenda) > 0) {
                if ($dataAgenda[0]->Jam_Masuk != "") {
                    $a = $dataAgenda[0]->Jam_Masuk;
                } else {
                    $a = 'Jam masuk kosong';
                }
                if ($dataAgenda[0]->Jam_Keluar != "") {
                    $b = $dataAgenda[0]->Jam_Keluar;
                } else {
                    $b = 'Jam keluar kosong';
                }
            } else {
                return redirect()->route('InsertSupervisor.index')->with('alert', "Data tidak ditemukan, Agenda untuk tanggal " . $data['Tanggal'] . " kode Pegawai  " . $kd_pegawai . " Tidak ada ");
                // dump("Data tidak ditemukan, Agenda untuk tanggal " . $data['Tanggal'] ." kode Pegawai  " . $kd_pegawai . " Tidak ada ");
            }

            // dump($a,$b);
        }
        foreach ($arrayPegawai as $kd_pegawai) {
            if ($data['jam_istirahat_awal'] != '00:00' || $data['jam_istirahat_akhir'] != '00:00') {
                $wewe4 = $data['Tanggal'] . " " . $data['jam_istirahat_awal'];
                $wewe5 = $data['Tanggal'] . " " . $data['jam_istirahat_akhir'];
                $wewe3 = ($masuk->diff($pulang)->format('%i')) - ($awal_istirahat->diff($akhir_istirahat)->format('%i'));
                $wewe3 = $wewe3 / 60;
            } else {
                $wewe4 = "";
                $wewe5 = "";
                $wewe3 = $masuk->diff($pulang)->format('%i');
                $wewe3 = $wewe3 / 60;
            }
            $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA_2 @tanggal = ?, @kd_pegawai = ?', [
                $data['Tanggal'],
                $kd_pegawai,
            ]);
            if ($wewe4 == "") {
                $awal_jam_istirahat = "";
            } else {
                $awal_jam_istirahat = $awal_istirahat->format('Y-m-d H:i:s');
            }
            if ($wewe5 == "") {
                $akhir_jam_istirahat = "";
            } else {
                $akhir_jam_istirahat = $akhir_istirahat->format('Y-m-d H:i:s');
            }
            if ($dataAgenda[0]->ada == '0') {
                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_UPDATE_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_jam_istirahat = ?, @awalistirahat = ?, @akhiristirahat = ?, @jmljam = ?, @shift = ?', [
                    $kd_pegawai,
                    $data['Tanggal'],
                    $masuk->format('Y-m-d H:i:s'),
                    $pulang->format('Y-m-d H:i:s'),
                    $wewe3,
                    $awal_jam_istirahat,
                    $akhir_jam_istirahat,
                    'm',
                    $data['User_Input']
                ]);
            }
        }
        dd($masuk->format('Y-m-d H:i:s'));
    }

    //Display the specified resource.
    public function show($cr)
    {
        // dd("Masuk Show");
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_AGENDA_PEGAWAI @divisi = ?, @tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getDataShift") {
            //getDataKeluarga
            $dataShiftFull = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?, @shift = ?', [2, $crExplode[0]]);
            return response()->json($dataShiftFull);
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
