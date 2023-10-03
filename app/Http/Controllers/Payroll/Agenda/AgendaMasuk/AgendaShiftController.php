<?php

namespace App\Http\Controllers\Payroll\Agenda\AgendaMasuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class AgendaShiftController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        return view('Payroll.Agenda.AgendaMasuk.agendaShift', compact('dataDivisi'));
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
        // $arrayDivisi = explode(".", $data['id_divisi']);



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

            if ($data['Tanggal1'] === $data['Tanggal2']) {
                // $Jam_Masuk = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Masuk'];
                // $Jam_Keluar = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Keluar'];
                // $Awal_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['awal_Jam_istirahat'];
                // $Akhir_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['akhir_Jam_istirahat'];
                $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                    $data['kd_pegawai'],
                    $tanggal_awal->format('Y-m-d'),
                ]);

                if ($dataAgenda[0]->ada >= '1') {
                    return redirect()->route('Jam.index')->with('alert', 'Agenda tanggal ' . $tanggal_awal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kd_pegawai'] . ' Sudah ada sehingga tidak bisa diproses');
                } else {
                    // dd("masuk gan");
                    $dataLibur = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_HARI_LIBUR @Tanggal = ?', [

                        $tanggal_awal->format('Y-m-d'),
                    ]);
                    if ($dataLibur[0]->ada >= '1') {
                        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                            $data['kd_pegawai'],
                            $tanggal_awal->format('Y-m-d'),
                            0,
                            'B',
                            $data['User_Input']
                        ]);
                        dd("Libur Lol");
                    } else {
                        if ($hari === '0') {
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                $data['kd_pegawai'],
                                $tanggal_awal->format('Y-m-d'),
                                0,
                                'B',
                                $data['User_Input']
                            ]);
                        } else if ($hari >= 1 && $hari <= 6) {
                            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_PERIKSA_PEGAWAI_SHIFT @kd_pegawai = ? , @Tanggal = ?', [
                                $data['kd_pegawai'],
                                $tanggal_awal->format('Y-m-d'),
                            ]);
                            // dd($dataShift);
                            $wewe1 = $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Masuk)[1];
                            $wewe2 = $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Pulang)[1];
                            $wewe3 = null;
                            $wewe4 = null;
                            $wewe5 = null;
                            $dateMasuk = new DateTime($tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Masuk)[1]);
                            $datePulang = new DateTime($dataShift[0]->Pulang);
                            $dateAwalIstirahat = new DateTime($dataShift[0]->awal_jam_istirahat);
                            $dateAkhirIstirahat = new DateTime($dataShift[0]->akhir_jam_istirahat);
                            $tanggalTambah1 = clone $tanggal_awal;
                            $tanggalTambah1->modify('+1 day');
                            if ($dataShift[0]->shift === '3') {
                                $wewe2 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Pulang)[1];
                                $wewe4 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                $wewe5 =  $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                            } else if ($dataShift[0]->shift === '5') {
                                $wewe2 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Pulang)[1];
                                $wewe4 = $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                $wewe5 =  $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                            } else if ($dataShift[0]->shift === '6') {
                                $wewe1 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Masuk)[1];
                                $wewe2 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Pulang)[1];
                                $wewe4 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                $wewe5 =  $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                            } else if ($dataShift[0]->shift === '11') {
                                $wewe2 = $tanggalTambah1->format('Y-m-d') + " " + explode(" ", $dataShift[0]->Pulang)[1];
                                $wewe4 = $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                $wewe5 =  $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                            } else {
                                if($dataShift[0]->awal_jam_istirahat != ""){
                                    $wewe4 = $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                    $wewe5 =  $tanggal_awal->format('Y-m-d') + " " + explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                                }else{
                                    $wewe4 = null;
                                    $wewe5 =  null;
                                }


                            }
                            if ($wewe4 === null || $wewe5 === null) {
                                // Jika wewe4 atau wewe5 adalah string "null"
                                // Hitung selisih menit antara wewe1 dan wewe2
                                $wewe3 = round((strtotime($wewe2) - strtotime($wewe1)) / 60);
                                // Ubah hasil dari menit menjadi jam
                                $wewe3 /= 60;
                            } else {
                                // Jika wewe4 dan wewe5 bukan string "null"
                                // Hitung selisih menit antara wewe1 dan wewe2
                                // Kemudian kurangi dengan selisih menit antara wewe4 dan wewe5
                                $wewe3 = round((strtotime($wewe2) - strtotime($wewe1)) / 60) - round((strtotime($wewe5) - strtotime($wewe4)) / 60);
                                // Ubah hasil dari menit menjadi jam
                                $wewe3 /= 60;
                            }
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                                $data['kd_pegawai'],
                                $tanggal_awal->format('Y-m-d'),
                                $wewe1,
                                $wewe2,
                                $wewe3,
                                $wewe4,
                                $wewe5,
                                'M',
                                $data['User_Input']
                            ]);
                        }
                    };
                };
                return redirect()->route('Jam.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
            } else if ($data['Tanggal1'] != $data['Tanggal2']) {
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
                return redirect()->route('Jam.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
            };
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
