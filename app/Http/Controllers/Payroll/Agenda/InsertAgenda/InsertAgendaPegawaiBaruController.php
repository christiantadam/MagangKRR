<?php

namespace App\Http\Controllers\Payroll\Agenda\InsertAgenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class InsertAgendaPegawaiBaruController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?', [1]);
        return view('Payroll.Agenda.InsertAgenda.insertPegawaiBaru', compact('dataDivisi', 'dataShift'));
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
        $arrayPegawai = explode(".", $data['pegawai']);
        // dd($data, $arrayPegawai);
        $tanggal_awal = new DateTime($data['Tanggal1']);
        $tanggal_akhir = new DateTime($data['Tanggal2']);
        // dd($tanggal_awal->format('N'));
        $selisih = $tanggal_awal->diff($tanggal_akhir);
        $selisih_hari = $selisih->days;
        $tanggal_akhir->modify('+1 day');
        // dd($selisih_hari, $data);
        $interval = new DateInterval('P1D'); // P1D mewakili interval 1 hari
        $daterange = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);
        // dd($data);

        $divAturan = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_ATURAN @id_div = ?', [
            $data['id_div']
        ]);
        dump($data['Tanggal1'],$data['Tanggal2']);


        if ($data['Tanggal1'] === $data['Tanggal2']) {
            dd($divAturan[0]->Aturan,'mantap');
            foreach ($arrayPegawai as $kd_pegawai) {
                if ($divAturan[0]->Aturan === '2') {
                    if ($selisih_hari > 7) {
                        return redirect()->route('InsertPegawaiBaru.index')->with('alert', 'Range tanggal tidak boleh lebih dari 7 hari');
                    }
                }
                // dd($tanggal_awal->format('N'));
                if ($tanggal_awal->format('N') == 6) { // 6 adalah kode untuk hari Sabtu di PHP
                    switch ((int)$data['Kd_Shift']) {
                        case 0:
                        case 1:
                        case 7:
                            $shiftbaru = 14;
                            break;
                        case 2:
                        case 8:
                        case 13:
                            $shiftbaru = 15;
                            break;
                        case 3:
                        case 12:
                            $shiftbaru = 16;
                            break;
                        case 4:
                        case 9:
                            $shiftbaru = 17;
                            break;
                        case 5:
                            $shiftbaru = 18;
                            break;
                        case 6:
                            $shiftbaru = 19;
                            break;
                    }
                    // dd($shiftbaru);
                    $jmljam = 5;
                    $keterangan = "M";
                } else if ($tanggal_awal->format('N') != 7) { // 6 adalah kode untuk hari Sabtu di PHP
                    $shiftbaru = (int)$data['Kd_Shift'];
                    $jmljam = 7;
                    $keterangan = "M";
                } else if ($tanggal_awal->format('N') == 7) { // 6 adalah kode untuk hari Sabtu di PHP
                    $shiftbaru = (int)$data['Kd_Shift'];
                    $keterangan = "B";
                }
                $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?, @shift = ?', [
                    2,
                    $shiftbaru,
                ]);
                // dd(count($dataShift), $dataShift);

                if (count($dataShift) > 0) {
                    $masuk = explode(" ", $dataShift[0]->masuk)[1];
                    $pulang = explode(" ", $dataShift[0]->pulang)[1];
                    $istirahat1 = explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                    $istirahat2 = explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                    $jam_masuk = new DateTime($tanggal_awal->format('Y-m-d') . " " . $masuk);
                    $jam_keluar = new DateTime($tanggal_awal->format('Y-m-d') . " " . $pulang);
                    if ($jam_keluar->format('H') < $jam_masuk->format('H')) {
                        $jam_keluar->modify('+1 day');
                    }
                    if ($jam_keluar < $jam_masuk) {
                        $jam_keluar->modify('+1 day');
                    }
                    if ($jam_masuk->format('G') >= 0 && $jam_masuk->format('H') < 7 && $jam_masuk->format('A') == 'AM') {
                        // Menambahkan 1 hari ke jam_masuk dan jam_keluar
                        $jam_masuk->modify('+1 day');
                        $jam_keluar->modify('+1 day');
                    }
                    $awalistirahat = new DateTime($tanggal_awal->format('Y-m-d') . " " . $istirahat1);
                    $akhiristirahat = new DateTime($tanggal_awal->format('Y-m-d') . " " . $istirahat2);
                    if ($awalistirahat->format('H') < $jam_masuk->format('H')) {
                        $jam_keluar->modify('+1 day');
                    }
                    if ($akhiristirahat->format('H') < $jam_masuk->format('H')) {
                        $jam_keluar->modify('+1 day');
                    }
                    if ($awalistirahat < $jam_masuk) {
                        $awalistirahat->modify('+1 day');
                        $akhiristirahat->modify('+1 day');
                    }
                    dd(
                        $tanggal_awal->format('Y-m-d'),
                        $kd_pegawai,
                        $data['User_Input'],
                        $keterangan,
                        $jam_masuk->format('Y-m-d H:i:s'),
                        $jam_keluar->format('Y-m-d H:i:s'),
                        $awalistirahat->format('Y-m-d H:i:s'),
                        $akhiristirahat->format('Y-m-d H:i:s'),
                        $jmljam,
                        $data['Kd_Shift'],
                        $masuk,
                        $pulang
                    );
                    if ($awalistirahat != $akhiristirahat) {

                        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_AGENDA_KARYAWAN_BARU @tanggal = ?, @kdpegawai = ?, @userid = ?, @ketabsensi = ?, @masuk= ?, @keluar = ?, @awalistirahat = ?, @akhiristirahat = ?, @jmljam = ?, @shift = ?', [
                            $tanggal_awal->format('Y-m-d'),
                            $kd_pegawai,
                            $data['User_Input'],
                            $keterangan,
                            $jam_masuk->format('Y-m-d H:i:s'),
                            $jam_keluar->format('Y-m-d H:i:s'),
                            $awalistirahat->format('Y-m-d H:i:s'),
                            $akhiristirahat->format('Y-m-d H:i:s'),
                            $jmljam,
                            $data['Kd_Shift']
                        ]);
                    } else {
                        dd(
                            $tanggal_awal->format('Y-m-d'),
                            $kd_pegawai,
                            $data['User_Input'],
                            $keterangan,
                            $jam_masuk->format('Y-m-d H:i:s'),
                            $jam_keluar->format('Y-m-d H:i:s'),
                            $jmljam,
                            $data['Kd_Shift']
                        );
                        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_AGENDA_KARYAWAN_BARU @tanggal = ?, @kdpegawai = ?, @userid = ?, @ketabsensi = ?, @masuk= ?, @keluar = ?, @jmljam = ?, @shift = ?', [
                            $tanggal_awal->format('Y-m-d'),
                            $kd_pegawai,
                            $data['User_Input'],
                            $keterangan,
                            $jam_masuk->format('Y-m-d H:i:s'),
                            $jam_keluar->format('Y-m-d H:i:s'),
                            $jmljam,
                            $data['Kd_Shift']
                        ]);
                    }
                }
            }
            return redirect()->route('InsertPegawaiBaru.index')->with('alert', 'Data Tersimpan');
        } else if ($data['Tanggal1'] != $data['Tanggal2']) {
            foreach ($daterange as $tanggal) {
                foreach ($arrayPegawai as $kd_pegawai) {
                    if ($divAturan[0]->Aturan === '2') {
                        if ($selisih_hari > 7) {
                            return redirect()->route('InsertPegawaiBaru.index')->with('alert', 'Range tanggal tidak boleh lebih dari 7 hari');
                        }
                    }
                    // dd($tanggal_awal->format('N'));
                    if ($tanggal->format('N') == 6) { // 6 adalah kode untuk hari Sabtu di PHP
                        switch ((int)$data['Kd_Shift']) {
                            case 0:
                            case 1:
                            case 7:
                                $shiftbaru = 14;
                                break;
                            case 2:
                            case 8:
                            case 13:
                                $shiftbaru = 15;
                                break;
                            case 3:
                            case 12:
                                $shiftbaru = 16;
                                break;
                            case 4:
                            case 9:
                                $shiftbaru = 17;
                                break;
                            case 5:
                                $shiftbaru = 18;
                                break;
                            case 6:
                                $shiftbaru = 19;
                                break;
                        }
                        // dd($shiftbaru);
                        $jmljam = 5;
                        $keterangan = "M";
                    } else if ($tanggal->format('N') != 7) { // 6 adalah kode untuk hari Sabtu di PHP
                        $shiftbaru = (int)$data['Kd_Shift'];
                        $jmljam = 7;
                        $keterangan = "M";
                    } else if ($tanggal->format('N') == 7) { // 6 adalah kode untuk hari Sabtu di PHP
                        $shiftbaru = (int)$data['Kd_Shift'];
                        $keterangan = "B";
                    }
                    $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?, @shift = ?', [
                        2,
                        $shiftbaru,
                    ]);
                    // dd(count($dataShift), $dataShift);

                    if (count($dataShift) > 0) {
                        $masuk = explode(" ", $dataShift[0]->masuk)[1];
                        $pulang = explode(" ", $dataShift[0]->pulang)[1];
                        $istirahat1 = explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                        $istirahat2 = explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                        $jam_masuk = new DateTime($tanggal->format('Y-m-d') . " " . $masuk);
                        $jam_keluar = new DateTime($tanggal->format('Y-m-d') . " " . $pulang);
                        if ($jam_keluar->format('H') < $jam_masuk->format('H')) {
                            $jam_keluar->modify('+1 day');
                        }
                        if ($jam_keluar < $jam_masuk) {
                            $jam_keluar->modify('+1 day');
                        }
                        if ($jam_masuk->format('G') >= 0 && $jam_masuk->format('H') < 7 && $jam_masuk->format('A') == 'AM') {
                            // Menambahkan 1 hari ke jam_masuk dan jam_keluar
                            $jam_masuk->modify('+1 day');
                            $jam_keluar->modify('+1 day');
                        }
                        $awalistirahat = new DateTime($tanggal->format('Y-m-d') . " " .$istirahat1);
                        $akhiristirahat = new DateTime($tanggal->format('Y-m-d') . " " .$istirahat2);
                        if ($awalistirahat->format('H') < $jam_masuk->format('H')) {
                            $awalistirahat->modify('+1 day');
                        }
                        if ($akhiristirahat->format('H') < $jam_masuk->format('H')) {
                            $akhiristirahat->modify('+1 day');
                        }
                        if ($awalistirahat < $jam_masuk) {
                            $awalistirahat->modify('+1 day');
                            $akhiristirahat->modify('+1 day');
                        }
                        if ($awalistirahat != $akhiristirahat) {
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @tanggal = ?, @kdpegawai = ?, @userid = ?, @ketabsensi = ?, @masuk= ?, @keluar = ?, @awalistirahat = ?, @akhiristirahat = ?, @jmljam = ?, @shift = ?', [
                                $tanggal->format('Y-m-d'),
                                $kd_pegawai,
                                $data['User_Input'],
                                $keterangan,
                                $jam_masuk->format('Y-m-d H:i:s'),
                                $jam_keluar->format('Y-m-d H:i:s'),
                                $awalistirahat->format('Y-m-d H:i:s'),
                                $akhiristirahat->format('Y-m-d H:i:s'),
                                $jmljam,
                                $data['Kd_Shift']
                            ]);
                        } else {
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @tanggal = ?, @kdpegawai = ?, @userid = ?, @ketabsensi = ?, @masuk= ?, @keluar = ?, @jmljam = ?, @shift = ?', [
                                $tanggal->format('Y-m-d'),
                                $kd_pegawai,
                                $data['User_Input'],
                                $keterangan,
                                $jam_masuk->format('Y-m-d H:i:s'),
                                $jam_keluar->format('Y-m-d H:i:s'),
                                $jmljam,
                                $data['Kd_Shift']
                            ]);
                        }
                    }
                }
            }
        }
    }

    //Display the specified resource.
    public function show($cr)
    {
        // dd("Masuk Show");
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
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
