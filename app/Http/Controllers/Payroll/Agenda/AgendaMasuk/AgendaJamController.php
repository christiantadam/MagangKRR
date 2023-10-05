<?php

namespace App\Http\Controllers\Payroll\Agenda\AgendaMasuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

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
        $arrayDivisi = explode(".", $data['id_divisi']);
        // dd($data);


        // Mengambil tanggal baru dalam format yang diinginkan
        // echo $tanggal_baru;

        if ($data['opsi'] === 'insertPegawai') {
            $tanggal_awal = new DateTime($data['Tanggal1']);
            $tanggal_akhir = new DateTime($data['Tanggal2']);
            $tanggal_akhir->modify('+1 day');
            // dd($tanggal_akhir);
            $interval = new DateInterval('P1D'); // P1D mewakili interval 1 hari
            $daterange = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);
            $hari = (int)$tanggal_awal->format('w');
            // dd($data);
            if ($data['Tanggal1'] === $data['Tanggal2']) {
                $Jam_Masuk = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Masuk'];
                $Jam_Keluar = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Keluar'];
                $Awal_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['awal_Jam_istirahat'];
                $Akhir_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['akhir_Jam_istirahat'];
                $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                    $data['kd_pegawai'],
                    $tanggal_awal->format('Y-m-d'),
                ]);

                if ($dataAgenda[0]->ada >= '1') {
                    return redirect()->route('Jam.index')->with('alert', 'Agenda tanggal ' . $tanggal_awal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kd_pegawai'] . ' Sudah ada sehingga tidak bisa diproses');
                } else {
                    // dd("masuk gan");
                    if ($hari === '0') {
                        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                            $data['kd_pegawai'],
                            $tanggal_awal->format('Y-m-d'),
                            0,
                            'B',
                            $data['User_Input']
                        ]);
                    } else if ($hari >= 1 && $hari <= 6) {

                        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                            $data['kd_pegawai'],
                            $tanggal_awal->format('Y-m-d'),
                            $Jam_Masuk,
                            $Jam_Keluar,
                            $data['Jml_Jam'],
                            $Awal_Istirahat,
                            $Akhir_Istirahat,
                            'M',
                            $data['User_Input']
                        ]);
                    }
                };
                return redirect()->route('Jam.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
            } else if ($data['Tanggal1'] != $data['Tanggal2']) {
                // dd($data);
                foreach ($daterange as $tanggal) {
                    // dd($tanggal->format('Y-m-d'));

                    $Jam_Masuk = $tanggal->format('Y-m-d') . " " . $data['Jam_Masuk'];
                    $Jam_Keluar = $tanggal->format('Y-m-d') . " " . $data['Jam_Keluar'];
                    $Awal_Istirahat = $tanggal->format('Y-m-d') . " " . $data['awal_Jam_istirahat'];
                    $Akhir_Istirahat = $tanggal->format('Y-m-d') . " " . $data['akhir_Jam_istirahat'];
                    // dd($Jam_Masuk, $Jam_Keluar, $Awal_Istirahat, $Akhir_Istirahat);
                    $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                        $data['kd_pegawai'],
                        $tanggal->format('Y-m-d'),

                    ]);
                    if ($dataAgenda[0]->ada >= '1') {
                        return redirect()->route('Jam.index')->with('alert', 'Agenda tanggal ' . $tanggal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kd_pegawai'] . ' Sudah ada sehingga tidak bisa diproses');
                    } else {
                        if ($hari === '0') {
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                $data['kd_pegawai'],
                                $tanggal->format('Y-m-d'),
                                0,
                                'B',
                                $data['User_Input']
                            ]);
                        } else if ($hari >= 1 && $hari <= 6) {

                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                                $data['kd_pegawai'],
                                $tanggal->format('Y-m-d'),
                                $Jam_Masuk,
                                $Jam_Keluar,
                                $data['Jml_Jam'],
                                $Awal_Istirahat,
                                $Akhir_Istirahat,
                                'M',
                                $data['User_Input']
                            ]);
                        }
                    }
                    // dd($dataAgenda[0]->ada);



                    // echo ($tanggal->format('Y-m-d'));
                };
                // return redirect()->route('Jam.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
            };
        } else if ($data['opsi'] === 'insertDivisi') {
            $tanggal_awal = new DateTime($data['Tanggal1']);
            $tanggal_akhir = new DateTime($data['Tanggal2']);
            $tanggal_akhir->modify('+1 day');
            // dd($data);
            // dd($tanggal_akhir);
            $interval = new DateInterval('P1D'); // P1D mewakili interval 1 hari
            $daterange = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);

            if ($data['Tanggal1'] === $data['Tanggal2']) {
                $hari = (int)$tanggal_awal->format('w');
                foreach ($arrayDivisi as $divisi) {
                    $Jam_Masuk = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Masuk'];
                    $Jam_Keluar = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Keluar'];
                    $Awal_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['awal_Jam_istirahat'];
                    $Akhir_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['akhir_Jam_istirahat'];
                    // dd($Jam_Masuk, $Jam_Keluar, $Awal_Istirahat, $Akhir_Istirahat, 'Tanggal kembar lol');
                    $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_SHIFT @id_divisi = ?', [
                        $divisi,
                    ]);
                    // dd($dataShift);
                    foreach ($dataShift as $shift) {
                        // dd($shift->Kd_Pegawai);
                        $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                            $shift->Kd_Pegawai,
                            $tanggal_awal->format('Y-m-d'),
                        ]);

                        if ($dataAgenda[0]->ada >= '1') {
                            return redirect()->route('Jam.index')->with('alert', 'Agenda tanggal ' . $tanggal_awal->format('Y-m-d') . ' untuk kd pegawai : ' . $shift->Kd_Pegawai . ' Sudah ada sehingga tidak bisa diproses');
                        } else {
                            // dd("masuk gan");
                            if ($hari === '0') {
                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                    $shift->Kd_Pegawai,
                                    $tanggal_awal->format('Y-m-d'),
                                    0,
                                    'B',
                                    $data['User_Input']
                                ]);
                            } else if ($hari >= 1 && $hari <= 6) {

                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                                    $shift->Kd_Pegawai,
                                    $tanggal_awal->format('Y-m-d'),
                                    $Jam_Masuk,
                                    $Jam_Keluar,
                                    $data['Jml_Jam'],
                                    $Awal_Istirahat,
                                    $Akhir_Istirahat,
                                    'M',
                                    $data['User_Input']
                                ]);
                            }
                        }
                        // dd($dataAgenda[0]->ada);

                    };
                };
                return redirect()->route('Jam.index')->with('alert', 'Agenda divisi berhasil ditambahkan!');
            } else if ($data['Tanggal1'] != $data['Tanggal2']) {
                // dd($data,'mantap');
                foreach ($daterange as $tanggal) {
                    // dd($tanggal->format('Y-m-d'));
                    $hari = (int)$tanggal->format('w');
                    foreach ($arrayDivisi as $divisi) {
                        $Jam_Masuk = $tanggal->format('Y-m-d') . " " . $data['Jam_Masuk'];
                        $Jam_Keluar = $tanggal->format('Y-m-d') . " " . $data['Jam_Keluar'];
                        $Awal_Istirahat = $tanggal->format('Y-m-d') . " " . $data['awal_Jam_istirahat'];
                        $Akhir_Istirahat = $tanggal->format('Y-m-d') . " " . $data['akhir_Jam_istirahat'];
                        // dd($Jam_Masuk, $Jam_Keluar, $Awal_Istirahat, $Akhir_Istirahat);
                        $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_SHIFT @id_divisi = ?', [
                            $divisi,
                        ]);
                        // dd($dataShift);
                        foreach ($dataShift as $shift) {
                            // dd($shift->Kd_Pegawai);
                            $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                                $shift->Kd_Pegawai,
                                $tanggal->format('Y-m-d'),

                            ]);
                            // dd($dataAgenda);
                            if ($dataAgenda[0]->ada >= '1') {
                                return redirect()->route('Jam.index')->with('alert', 'Agenda tanggal ' . $tanggal->format('Y-m-d') . ' untuk kd pegawai : ' . $shift->Kd_Pegawai . ' Sudah ada sehingga tidak bisa diproses');
                            } else {
                                // dd(      $shift->Kd_Pegawai,
                                // $tanggal->format('Y-m-d'),
                                // $Jam_Masuk,
                                // $Jam_Keluar,
                                // $data['Jml_Jam'],
                                // $Awal_Istirahat,
                                // $Akhir_Istirahat,
                                // 'M',
                                // $data['User_Input']);
                                if ($hari === '0') {
                                    DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                        $shift->Kd_Pegawai,
                                        $tanggal->format('Y-m-d'),
                                        0,
                                        'B',
                                        $data['User_Input']
                                    ]);
                                } else if ($hari >= 1 && $hari <= 6) {

                                    DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                                        $shift->Kd_Pegawai,
                                        $tanggal->format('Y-m-d'),
                                        $Jam_Masuk,
                                        $Jam_Keluar,
                                        $data['Jml_Jam'],
                                        $Awal_Istirahat,
                                        $Akhir_Istirahat,
                                        'M',
                                        $data['User_Input']
                                    ]);
                                }
                            }
                            // dd($dataAgenda[0]->ada);

                        };
                    };
                    echo ($tanggal->format('Y-m-d'));
                };
                return redirect()->route('Jam.index')->with('alert', 'Agenda divisi berhasil ditambahkan!');
            }
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
        } else if ($crExplode[$lastIndex] == "cekAgenda") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [$crExplode[0], $crExplode[1]]);
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
