<?php

namespace App\Http\Controllers\Payroll\Agenda\AgendaMasuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

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
        $tanggal_awal = new DateTime($data['Tanggal1']);
        $tanggal_akhir = new DateTime($data['Tanggal2']);
        $tanggal_akhir->modify('+1 day');
        // dd($tanggal_akhir);
        $interval = new DateInterval('P1D'); // P1D mewakili interval 1 hari
        $daterange = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);
        dump($data['opsi']);
        if ($data['opsi'] == 'insertPegawai') {

            // dd($data);
            if ($data['Tanggal1'] == $data['Tanggal2']) {
                // $Jam_Masuk = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Masuk'];
                // $Jam_Keluar = $tanggal_awal->format('Y-m-d') . " " . $data['Jam_Keluar'];
                // $Awal_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['awal_Jam_istirahat'];
                // $Akhir_Istirahat = $tanggal_awal->format('Y-m-d') . " " . $data['akhir_Jam_istirahat'];
                $hari = (int)$tanggal_awal->format('w');
                $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                    $data['kd_pegawai'],
                    $tanggal_awal->format('Y-m-d'),
                ]);
                // dd($dataAgenda);
                if ($dataAgenda[0]->ada >= '1') {
                    return redirect()->route('AgendaShift.index')->with('alert', 'Agenda tanggal ' . $tanggal_awal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kd_pegawai'] . ' Sudah ada sehingga tidak bisa diproses');
                } else {
                    // dd("masuk gan");
                    $dataLibur = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_HARI_LIBUR @Tanggal = ?', [

                        $tanggal_awal->format('Y-m-d'),
                    ]);
                    // dd($dataLibur);
                    if ($dataLibur[0]->ada >= '1') {
                        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                            $data['kd_pegawai'],
                            $tanggal_awal->format('Y-m-d'),
                            0,
                            'B',
                            $data['User_Input']
                        ]);
                        // dd("Libur Lol");
                    } else {
                        // dd($hari);
                        if ($hari == '0') {
                            dd(
                                $data['kd_pegawai'],
                                $tanggal_awal->format('Y-m-d'),
                                0,
                                'B',
                                $data['User_Input']
                            );
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                $data['kd_pegawai'],
                                $tanggal_awal->format('Y-m-d'),
                                0,
                                'B',
                                $data['User_Input']
                            ]);
                        } else if ($hari >= 1 && $hari <= 6) {
                            // dd(
                            //     $data['kd_pegawai'],
                            //     $tanggal_awal->format('Y-m-d')
                            // );
                            $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_PERIKSA_PEGAWAI_SHIFT @kd_pegawai = ? , @Tanggal = ?', [
                                $data['kd_pegawai'],
                                $tanggal_awal->format('Y-m-d'),
                            ]);
                            // dd($dataShift);
                            $jam_masuk = $dataShift[0]->Masuk;
                            $jam_pulang = $dataShift[0]->Pulang;
                            if (!is_null($dataShift[0]->awal_jam_istirahat)) {
                                $awal_jam_istirahat = $dataShift[0]->awal_jam_istirahat;
                            } else {
                                $awal_jam_istirahat = null;
                            }
                            if (!is_null($dataShift[0]->akhir_jam_istirahat)) {
                                $akhir_jam_istirahat = $dataShift[0]->akhir_jam_istirahat;
                            } else {
                                $akhir_jam_istirahat = null;
                            }
                            $shift = $dataShift[0]->shift;
                            $jml_efektif = $dataShift[0]->Jml_Efektif;
                            $wewe1 = $tanggal_awal->format('Y-m-d') . " " . explode(" ", $jam_masuk)[1];
                            $wewe2 = $tanggal_awal->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                            // dd($wewe1,$wewe2);
                            $wewe3 = null;
                            $wewe4 = null;
                            $wewe5 = null;
                            $dateMasuk = new DateTime($tanggal_awal->format('Y-m-d') . " " . explode(" ", $dataShift[0]->Masuk)[1]);
                            $datePulang = new DateTime($dataShift[0]->Pulang);
                            $dateAwalIstirahat = new DateTime($dataShift[0]->awal_jam_istirahat);
                            $dateAkhirIstirahat = new DateTime($dataShift[0]->akhir_jam_istirahat);
                            $tanggalTambah1 = clone $tanggal_awal;
                            $tanggalTambah1->modify('+1 day');
                            if ($shift == '3') {
                                $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                $wewe4 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                $wewe5 =  $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                            } else if ($shift == '5') {
                                $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                $wewe4 = $tanggal_awal->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                $wewe5 =  $tanggal_awal->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                            } else if ($shift == '6') {
                                $wewe1 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_masuk)[1];
                                $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                $wewe4 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                $wewe5 =  $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                            } else if ($shift == '11') {
                                $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                $wewe4 = $tanggal_awal->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                $wewe5 =  $tanggal_awal->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                            } else {
                                if ($awal_jam_istirahat != null && $akhir_jam_istirahat != null) {
                                    $wewe4 = $tanggal_awal->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                    $wewe5 =  $tanggal_awal->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                                } else {
                                    $wewe4 = null;
                                    $wewe5 =  null;
                                }
                            }

                            if ($wewe4 == null || $wewe5 == null) {
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
                            // dd( $data['kd_pegawai'],
                            // $tanggal_awal->format('Y-m-d'),
                            // $wewe1,
                            // $wewe2,
                            // $wewe3,
                            // $wewe4,
                            // $wewe5,
                            // 'M',
                            // $data['User_Input']);
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
                return redirect()->route('AgendaShift.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
            } else if ($data['Tanggal1'] != $data['Tanggal2']) {
                foreach ($daterange as $tanggal) {
                    $hari = (int)$tanggal->format('w');
                    $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                        $data['kd_pegawai'],
                        $tanggal->format('Y-m-d'),
                    ]);
                    // dd($dataAgenda);
                    if ($dataAgenda[0]->ada >= '1') {
                        return redirect()->route('AgendaShift.index')->with('alert', 'Agenda tanggal ' . $tanggal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kd_pegawai'] . ' Sudah ada sehingga tidak bisa diproses');
                    } else {
                        // dd("masuk gan");
                        $dataLibur = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_HARI_LIBUR @Tanggal = ?', [

                            $tanggal->format('Y-m-d'),
                        ]);
                        // dd($dataLibur);
                        if ($dataLibur[0]->ada >= '1') {
                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                $data['kd_pegawai'],
                                $tanggal->format('Y-m-d'),
                                0,
                                'B',
                                $data['User_Input']
                            ]);
                            // dd("Libur Lol");
                        } else {
                            // dd($hari);
                            if ($hari == '0') {
                                dd(
                                    $data['kd_pegawai'],
                                    $tanggal->format('Y-m-d'),
                                    0,
                                    'B',
                                    $data['User_Input']
                                );
                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                    $data['kd_pegawai'],
                                    $tanggal->format('Y-m-d'),
                                    0,
                                    'B',
                                    $data['User_Input']
                                ]);
                            } else if ($hari >= 1 && $hari <= 6) {
                                // dd(
                                //     $data['kd_pegawai'],
                                //     $tanggal_awal->format('Y-m-d')
                                // );
                                $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_PERIKSA_PEGAWAI_SHIFT @kd_pegawai = ? , @Tanggal = ?', [
                                    $data['kd_pegawai'],
                                    $tanggal->format('Y-m-d'),
                                ]);
                                // dd($dataShift);
                                $jam_masuk = $dataShift[0]->Masuk;
                                $jam_pulang = $dataShift[0]->Pulang;
                                if (!is_null($dataShift[0]->awal_jam_istirahat)) {
                                    $awal_jam_istirahat = $dataShift[0]->awal_jam_istirahat;
                                } else {
                                    $awal_jam_istirahat = null;
                                }
                                if (!is_null($dataShift[0]->akhir_jam_istirahat)) {
                                    $akhir_jam_istirahat = $dataShift[0]->akhir_jam_istirahat;
                                } else {
                                    $akhir_jam_istirahat = null;
                                }
                                $shift = $dataShift[0]->shift;
                                $jml_efektif = $dataShift[0]->Jml_Efektif;
                                $wewe1 = $tanggal->format('Y-m-d') . " " . explode(" ", $jam_masuk)[1];
                                $wewe2 = $tanggal->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                // dd($wewe1,$wewe2);
                                $wewe3 = null;
                                $wewe4 = null;
                                $wewe5 = null;
                                $dateMasuk = new DateTime($tanggal->format('Y-m-d') . " " . explode(" ", $dataShift[0]->Masuk)[1]);
                                $datePulang = new DateTime($dataShift[0]->Pulang);
                                $dateAwalIstirahat = new DateTime($dataShift[0]->awal_jam_istirahat);
                                $dateAkhirIstirahat = new DateTime($dataShift[0]->akhir_jam_istirahat);
                                $tanggalTambah1 = clone $tanggal;
                                $tanggalTambah1->modify('+1 day');
                                if ($shift == '3') {
                                    $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                    $wewe4 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                    $wewe5 =  $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                                } else if ($shift == '5') {
                                    $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                    $wewe4 = $tanggal->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                    $wewe5 =  $tanggal->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                                } else if ($shift == '6') {
                                    $wewe1 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_masuk)[1];
                                    $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                    $wewe4 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                    $wewe5 =  $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                                } else if ($shift == '11') {
                                    $wewe2 = $tanggalTambah1->format('Y-m-d') . " " . explode(" ", $jam_pulang)[1];
                                    $wewe4 = $tanggal->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                    $wewe5 =  $tanggal->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                                } else {
                                    if ($awal_jam_istirahat != null && $akhir_jam_istirahat != null) {
                                        $wewe4 = $tanggal->format('Y-m-d') . " " . explode(" ", $awal_jam_istirahat)[1];
                                        $wewe5 =  $tanggal->format('Y-m-d') . " " . explode(" ", $akhir_jam_istirahat)[1];
                                    } else {
                                        $wewe4 = null;
                                        $wewe5 =  null;
                                    }
                                }

                                if ($wewe4 == null || $wewe5 == null) {
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
                                dump( $data['kd_pegawai'],
                                $tanggal->format('Y-m-d'),
                                $wewe1,
                                $wewe2,
                                $wewe3,
                                $wewe4,
                                $wewe5,
                                'M',
                                $data['User_Input']);
                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_Jam_istirahat= ?, @akhir_Jam_istirahat= ?, @Ket_Absensi= ?, @User_Input= ?', [

                                    $data['kd_pegawai'],
                                    $tanggal->format('Y-m-d'),
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
                };
                dd('Sukses Mantap');
                return redirect()->route('AgendaShift.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
            };
        } else if ($data['opsi'] == 'insertDivisi') {

            $arrayDivisi = explode(".", $data['id_divisi']);
            dump($arrayDivisi, $data['Tanggal1'], $data['Tanggal2']);
            if ($data['Tanggal1'] == $data['Tanggal2']) {
                $hari = (int)$tanggal_awal->format('w');
                foreach ($arrayDivisi as $divisi) {
                    $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?, @kode = ?', [
                        $divisi,
                        1
                    ]);
                    // dd($dataPegawai,$divisi);
                    foreach ($dataPegawai as $dataPeg) {
                        dump($dataPeg->Kd_Pegawai);
                        $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                            $dataPeg->Kd_Pegawai,
                            $tanggal_awal->format('Y-m-d'),
                        ]);
                        dump($dataAgenda);
                        if ($dataAgenda[0]->ada >= '1') {
                            return redirect()->route('AgendaShift.index')->with('alert', 'Agenda tanggal ' . $tanggal_awal->format('Y-m-d') . ' untuk kd pegawai : ' .  $dataPeg->Kd_Pegawai . ' Sudah ada sehingga tidak bisa diproses');
                        } else {
                            dump("masuk gan");
                            $dataLibur = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_HARI_LIBUR @Tanggal = ?', [

                                $tanggal_awal->format('Y-m-d'),
                            ]);
                            // dd($dataLibur);
                            if ($dataLibur[0]->ada >= '1') {
                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                    $dataPeg->Kd_Pegawai,
                                    $tanggal_awal->format('Y-m-d'),
                                    0,
                                    'B',
                                    $data['User_Input']
                                ]);
                                // dd("Libur Lol");
                            } else {
                                dump($hari);
                                if ($hari == '0') {
                                    // dd(
                                    //     $data['kd_pegawai'],
                                    //     $tanggal->format('Y-m-d'),
                                    //     0,
                                    //     'B',
                                    //     $data['User_Input']
                                    // );
                                    DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                        $dataPeg->Kd_Pegawai,
                                        $tanggal_awal->format('Y-m-d'),
                                        0,
                                        'B',
                                        $data['User_Input']
                                    ]);
                                } else if ($hari >= 1 && $hari <= 6) {
                                    dump(
                                        $dataPeg->Kd_Pegawai,
                                        $tanggal_awal->format('Y-m-d')
                                    );
                                    $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_PERIKSA_PEGAWAI_SHIFT @kd_pegawai = ? , @Tanggal = ?', [
                                        $dataPeg->Kd_Pegawai,
                                        $tanggal_awal->format('Y-m-d'),
                                    ]);
                                    dump(count($dataShift), !is_null($dataPeg->Kd_Pegawai), $dataShift);
                                    if (count($dataShift) > 0) {
                                        $masuk = explode(" ", $dataShift[0]->Masuk)[1];
                                        $keluar = explode(" ", $dataShift[0]->Pulang)[1];
                                        if (!is_null($dataShift[0]->awal_jam_istirahat)) {
                                            $istirahat1 = explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                        } else {
                                            $istirahat1 = '00:00';
                                        }
                                        if (!is_null($dataShift[0]->akhir_jam_istirahat)) {
                                            $istirahat2 = explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                                        } else {
                                            $istirahat2 = '00:00';
                                        }

                                        $jam_masuk =  new DateTime($tanggal_awal->format('Y-m-d') . " " . $masuk);
                                        $jam_keluar = new DateTime($tanggal_awal->format('Y-m-d') . " " . $keluar);
                                    }
                                    dump($istirahat1, $istirahat2);
                                    if ($jam_keluar->format('H') < $jam_masuk->format('H')) {
                                        $jam_keluar->modify('+1 day');
                                    }
                                    if ($jam_keluar < $jam_masuk) {
                                        $jam_keluar->modify('+1 day');
                                    }
                                    if ($jam_masuk->format('H') >= 0 && $jam_masuk->format('H') < 7) {
                                        $jam_masuk->modify('+1 day');
                                        $jam_keluar->modify('+1 day');
                                    }
                                    $awalistirahat =  new DateTime($tanggal_awal->format('Y-m-d') . " " . $istirahat1);
                                    $akhiristirahat =  new DateTime($tanggal_awal->format('Y-m-d') . " " . $istirahat2);
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
                                    $interval = $jam_masuk->diff($jam_keluar);
                                    $jmljam = $interval->h + ($interval->days * 24);
                                    $jam_masuk_baru = clone $jam_masuk;
                                    dump($jmljam, $hari);
                                    if ($hari == '6') {
                                        if ($jmljam == '8') {
                                            // dd(  $dataPeg->Kd_Pegawai,
                                            // $tanggal_awal->format('Y-m-d'),
                                            // $jam_masuk->format('Y-m-d H:i:s'),
                                            // $jam_keluar->format('Y-m-d H:i:s'),
                                            // $jmljam,
                                            // $awalistirahat->format('Y-m-d H:i:s'),
                                            // $akhiristirahat->format('Y-m-d H:i:s'),
                                            // 'M',
                                            // $data['User_Input'],
                                            // 0);
                                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA_LEMBUR_SABTU @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@Jml_Jam_Rehat = ?, @Ket_Absensi= ?, @User_Input= ?', [

                                                $dataPeg->Kd_Pegawai,
                                                $tanggal_awal->format('Y-m-d'),
                                                $jam_masuk->format('Y-m-d H:i:s'),
                                                $jam_masuk_baru->modify('+5 hours')->format('Y-m-d H:i:s'),
                                                $jmljam - 3,
                                                0,
                                                'M',
                                                $data['User_Input']
                                            ]);
                                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA_LEMBUR_SABTU @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@Jml_Jam_Rehat = ?, @Ket_Absensi= ?, @User_Input= ?', [

                                                $dataPeg->Kd_Pegawai,
                                                $tanggal_awal->format('Y-m-d'),
                                                $jam_masuk_baru->format('Y-m-d H:i:s'),
                                                $jam_keluar->format('Y-m-d H:i:s'),
                                                2,
                                                1,
                                                'L',
                                                $data['User_Input']
                                            ]);
                                        } else {
                                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@awal_Jam_istirahat = ?,@akhir_jam_istirahat = ?, @Ket_Absensi= ?, @User_Input= ?, @jmljamrehat = ?', [

                                                $dataPeg->Kd_Pegawai,
                                                $tanggal_awal->format('Y-m-d'),
                                                $jam_masuk->format('Y-m-d H:i:s'),
                                                $jam_keluar->format('Y-m-d H:i:s'),
                                                $jmljam,
                                                $awalistirahat->format('Y-m-d H:i:s'),
                                                $akhiristirahat->format('Y-m-d H:i:s'),
                                                'M',
                                                $data['User_Input'],
                                                0
                                            ]);
                                        }
                                    } else {
                                        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@awal_Jam_istirahat = ?,@akhir_jam_istirahat = ?, @Ket_Absensi= ?, @User_Input= ?', [

                                            $dataPeg->Kd_Pegawai,
                                            $tanggal_awal->format('Y-m-d'),
                                            $jam_masuk->format('Y-m-d H:i:s'),
                                            $jam_keluar->format('Y-m-d H:i:s'),
                                            $jmljam - 1,
                                            $awalistirahat->format('Y-m-d H:i:s'),
                                            $akhiristirahat->format('Y-m-d H:i:s'),
                                            'M',
                                            $data['User_Input']
                                        ]);
                                    }
                                }
                            };
                        };
                    };
                    // dd($dataPegawai);
                };
                return redirect()->route('AgendaShift.index')->with('alert', 'Agenda berhasil ditambahkan');
            } else if ($data['Tanggal1'] != $data['Tanggal2']) {
                foreach ($daterange as $tanggal) {
                    $hari = (int)$tanggal->format('w');
                    foreach ($arrayDivisi as $divisi) {
                        $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?, @kode = ?', [
                            $divisi,
                            1
                        ]);
                        // dd($dataPegawai,$divisi);
                        foreach ($dataPegawai as $dataPeg) {
                            dump($dataPeg->Kd_Pegawai);
                            $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_AGENDA @kd_pegawai = ?, @Tanggal = ?', [

                                $dataPeg->Kd_Pegawai,
                                $tanggal->format('Y-m-d'),
                            ]);
                            dump($dataAgenda);
                            if ($dataAgenda[0]->ada >= '1') {
                                return redirect()->route('AgendaShift.index')->with('alert', 'Agenda tanggal ' . $tanggal->format('Y-m-d') . ' untuk kd pegawai : ' .  $dataPeg->Kd_Pegawai . ' Sudah ada sehingga tidak bisa diproses');
                            } else {
                                dump("masuk gan");
                                $dataLibur = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_CEK_HARI_LIBUR @Tanggal = ?', [

                                    $tanggal_awal->format('Y-m-d'),
                                ]);
                                // dd($dataLibur);
                                if ($dataLibur[0]->ada >= '1') {
                                    DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                        $dataPeg->Kd_Pegawai,
                                        $tanggal->format('Y-m-d'),
                                        0,
                                        'B',
                                        $data['User_Input']
                                    ]);
                                    // dd("Libur Lol");
                                } else {
                                    dump($hari);
                                    if ($hari == '0') {
                                        // dd(
                                        //     $data['kd_pegawai'],
                                        //     $tanggal->format('Y-m-d'),
                                        //     0,
                                        //     'B',
                                        //     $data['User_Input']
                                        // );
                                        DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jml_Jam = ?, @Ket_Absensi = ?, @User_Input= ?', [

                                            $dataPeg->Kd_Pegawai,
                                            $tanggal->format('Y-m-d'),
                                            0,
                                            'B',
                                            $data['User_Input']
                                        ]);
                                    } else if ($hari >= 1 && $hari <= 6) {
                                        dump(
                                            $dataPeg->Kd_Pegawai,
                                            $tanggal->format('Y-m-d')
                                        );
                                        $dataShift = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_PERIKSA_PEGAWAI_SHIFT @kd_pegawai = ? , @Tanggal = ?', [
                                            $dataPeg->Kd_Pegawai,
                                            $tanggal->format('Y-m-d'),
                                        ]);
                                        dump(count($dataShift), !is_null($dataPeg->Kd_Pegawai), $dataShift);
                                        if (count($dataShift) > 0) {
                                            $masuk = explode(" ", $dataShift[0]->Masuk)[1];
                                            $keluar = explode(" ", $dataShift[0]->Pulang)[1];
                                            if (!is_null($dataShift[0]->awal_jam_istirahat)) {
                                                $istirahat1 = explode(" ", $dataShift[0]->awal_jam_istirahat)[1];
                                            } else {
                                                $istirahat1 = '00:00';
                                            }
                                            if (!is_null($dataShift[0]->akhir_jam_istirahat)) {
                                                $istirahat2 = explode(" ", $dataShift[0]->akhir_jam_istirahat)[1];
                                            } else {
                                                $istirahat2 = '00:00';
                                            }

                                            $jam_masuk =  new DateTime($tanggal->format('Y-m-d') . " " . $masuk);
                                            $jam_keluar = new DateTime($tanggal->format('Y-m-d') . " " . $keluar);
                                        }
                                        dump($istirahat1, $istirahat2);
                                        if ($jam_keluar->format('H') < $jam_masuk->format('H')) {
                                            $jam_keluar->modify('+1 day');
                                        }
                                        if ($jam_keluar < $jam_masuk) {
                                            $jam_keluar->modify('+1 day');
                                        }
                                        if ($jam_masuk->format('H') >= 0 && $jam_masuk->format('H') < 7) {
                                            $jam_masuk->modify('+1 day');
                                            $jam_keluar->modify('+1 day');
                                        }
                                        $awalistirahat =  new DateTime($tanggal->format('Y-m-d') . " " . $istirahat1);
                                        $akhiristirahat =  new DateTime($tanggal->format('Y-m-d') . " " . $istirahat2);
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
                                        $interval = $jam_masuk->diff($jam_keluar);
                                        $jmljam = $interval->h + ($interval->days * 24);
                                        $jam_masuk_baru = clone $jam_masuk;
                                        dump($jmljam, $hari);
                                        if ($hari == '6') {
                                            if ($jmljam == '8') {
                                                // dd(  $dataPeg->Kd_Pegawai,
                                                // $tanggal->format('Y-m-d'),
                                                // $jam_masuk->format('Y-m-d H:i:s'),
                                                // $jam_keluar->format('Y-m-d H:i:s'),
                                                // $jmljam,
                                                // $awalistirahat->format('Y-m-d H:i:s'),
                                                // $akhiristirahat->format('Y-m-d H:i:s'),
                                                // 'M',
                                                // $data['User_Input'],
                                                // 0);
                                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA_LEMBUR_SABTU @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@Jml_Jam_Rehat = ?, @Ket_Absensi= ?, @User_Input= ?', [

                                                    $dataPeg->Kd_Pegawai,
                                                    $tanggal->format('Y-m-d'),
                                                    $jam_masuk->format('Y-m-d H:i:s'),
                                                    $jam_masuk_baru->modify('+5 hours')->format('Y-m-d H:i:s'),
                                                    $jmljam - 3,
                                                    0,
                                                    'M',
                                                    $data['User_Input']
                                                ]);
                                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA_LEMBUR_SABTU @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@Jml_Jam_Rehat = ?, @Ket_Absensi= ?, @User_Input= ?', [

                                                    $dataPeg->Kd_Pegawai,
                                                    $tanggal->format('Y-m-d'),
                                                    $jam_masuk_baru->format('Y-m-d H:i:s'),
                                                    $jam_keluar->format('Y-m-d H:i:s'),
                                                    2,
                                                    1,
                                                    'L',
                                                    $data['User_Input']
                                                ]);
                                            } else {
                                                DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@awal_Jam_istirahat = ?,@akhir_jam_istirahat = ?, @Ket_Absensi= ?, @User_Input= ?, @jmljamrehat', [

                                                    $dataPeg->Kd_Pegawai,
                                                    $tanggal->format('Y-m-d'),
                                                    $jam_masuk->format('Y-m-d H:i:s'),
                                                    $jam_keluar->format('Y-m-d H:i:s'),
                                                    $jmljam,
                                                    $awalistirahat->format('Y-m-d H:i:s'),
                                                    $akhiristirahat->format('Y-m-d H:i:s'),
                                                    'M',
                                                    $data['User_Input'],
                                                    0
                                                ]);
                                            }
                                        } else {
                                            DB::connection('ConnPayroll')->statement('exec SP_1003_PAY_INSERT_AGENDA @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?,@awal_Jam_istirahat = ?,@akhir_jam_istirahat = ?, @Ket_Absensi= ?, @User_Input= ?', [

                                                $dataPeg->Kd_Pegawai,
                                                $tanggal->format('Y-m-d'),
                                                $jam_masuk->format('Y-m-d H:i:s'),
                                                $jam_keluar->format('Y-m-d H:i:s'),
                                                $jmljam - 1,
                                                $awalistirahat->format('Y-m-d H:i:s'),
                                                $akhiristirahat->format('Y-m-d H:i:s'),
                                                'M',
                                                $data['User_Input']
                                            ]);
                                        }
                                    }
                                };
                            };
                        };
                        // dd($dataPegawai);
                    };
                    return redirect()->route('AgendaShift.index')->with('alert', 'Agenda berhasil ditambahkan');
                };
            }

            return redirect()->route('AgendaShift.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
        };
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
