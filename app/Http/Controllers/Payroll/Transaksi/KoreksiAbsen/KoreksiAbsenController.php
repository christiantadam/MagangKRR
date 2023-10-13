<?php

namespace App\Http\Controllers\Payroll\Transaksi\KoreksiAbsen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class KoreksiAbsenController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ? ', [1]);
        // dd($dataShift);
        return view('Payroll.Transaksi.KoreksiAbsen.koreksiAbsen', compact('dataDivisi', 'dataShift'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }
    function hitungSelisihJam($jamawal, $jamakhir) {
        $interval = $jamawal->diff($jamakhir);
        $total_minutes = $interval->days * 24 * 60;
        $total_minutes += $interval->h * 60;
        $total_minutes += $interval->i;

        $total_jam = intval($total_minutes / 30) / 2;

        return $total_jam;
    }
    function hitungJamKerja($jam_masuk, $datang, $pulang, $awalistirahat, $akhiristirahat) {
        if ($awalistirahat && $akhiristirahat) {
            $jamkerjaawal = ($datang > $jam_masuk) ? $awalistirahat->getTimestamp() - $datang->getTimestamp() : $awalistirahat->getTimestamp() - $jam_masuk->getTimestamp();
            $jamkerjaakhir = $pulang->getTimestamp() - $akhiristirahat->getTimestamp();

            if ($jamkerjaawal > 0 && $jamkerjaakhir > 0) {
                $jamkerja = $jamkerjaawal + $jamkerjaakhir;
            } elseif ($jamkerjaawal < 0 && $jamkerjaakhir < 0) {
                $jamkerja = 0;
            } elseif ($jamkerjaawal <= 0) {
                $jamkerja = $jamkerjaakhir;
            } else {
                $jamkerja = $jamkerjaawal;
            }
        } elseif (!$awalistirahat && !$akhiristirahat) {
            $jamkerja = $pulang->getTimestamp() - $datang->getTimestamp();
        } else {
            $jamkerja = 0;
        }

        // Convert to hours
        $totaljam = floor($jamkerja / 60);
        if ($jamkerja % 60 < 25) {
            // Do nothing
        } elseif ($jamkerja % 60 >= 25 && $jamkerja % 60 < 55) {
            $totaljam += 0.5;
        } elseif ($jamkerja % 60 >= 55) {
            ++$totaljam;
        }

        return $totaljam;
    }
    function hitungMasuk($jammasuk, $jamkeluar, $datang, $pulang) {
        $hasil = array_fill(0, 3, 0);
        // calculate the difference in minutes between arrival and start time
        $terlambat = ($datang->getTimestamp() - $jammasuk->getTimestamp()) / 60;
        if ($terlambat < -5) {
            $hasil[0] = (($terlambat * -1) - 5) / 60;
        } else {
            $hasil[0] = 0;
        }
        // calculate the difference in minutes between end time and departure
        $pulangawal = ($jamkeluar->getTimestamp() - $pulang->getTimestamp()) / 60;
        if ($pulangawal < 0) {
            $hasil[1] = ($pulangawal * -1) / 60;
            if ($hasil[1] >= 3) {
                $hasil[1] = (($pulangawal * -1) / 60) - 1;
            } else {
                $hasil[1] = ($pulangawal * -1) / 60;
            }
        } elseif ($pulangawal >= 30) {
            $lebih = (floor($pulangawal / 30)) * 30 / 60;
            if ($pulangawal % 30 > 25) {
                $lebih += 0.5;
            }
            $hasil[1] = 0;
        } elseif ($pulangawal > 25 && $pulangawal < 30) {
            $lebih = 0.5;
            $hasil[1] = 0;
        } else {
            $hasil[1] = 0;
        }
        $hasil[2] = isset($lebih) ? $lebih : 0;

        return $hasil;
    }
    function hitungLembur($jamkerja, $tanggal) {
        $hasil = array_fill(0, 5, 0);
        $actualkerja = $jamkerja * 60;
        $hari = date('w', strtotime($tanggal));
        $libur = false;
        $dataLibur = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_HARI_LIBUR @tanggal = ?', [
            $tanggal
        ]);
        if (count($dataLibur) > 0) {
            $libur = true;
        } else {
            $libur = false;
        }

        $lebih = 0;
        $lembur1 = 0;
        $lembur2 = 0;
        $lembur3 = 0;
        $lembur4 = 0;
        $jumlahlembur = floor($actualkerja / 30);

        if ($libur == false && $hari != 0) { // bukan minggu dan bukan libur
            if ($jumlahlembur % 30 >= 25) {
                $jumlahlembur += 1;
            }
            if ($jumlahlembur >= 2) {
                $lembur1 = 2 * 30 / 60;
                $lembur2 = ($jumlahlembur - 2) * 30 / 60;
            } elseif ($jumlahlembur < 2 && $jumlahlembur > 0) {
                $lembur1 = 0.5;
            }
        } elseif ($libur == true || $hari != 6) { // libur selain hari sabtu
            if ($jumlahlembur % 30 >= 25) {
                $jumlahlembur += 1;
            }
            if ($jumlahlembur >= 2 && $jumlahlembur <= 14) {
                $lembur2 = $jumlahlembur * 30 / 60;
            } elseif ($jumlahlembur > 14 && $jumlahlembur <= 16) {
                $lembur2 = 7;
                $lembur3 = ($jumlahlembur - 14) * 30 / 60;
            } elseif ($jumlahlembur > 16) {
                $lembur2 = 7;
                $lembur3 = 1;
                $lembur4 = ($jumlahlembur - 16) * 30 / 60;
            } elseif ($jumlahlembur < 2 && $jumlahlembur > 0) {
                $lembur2 = 0.5;
            }
        } elseif ($libur == true && $hari == 6) { // liburan hari Sabtu
            if ($jumlahlembur % 30 >=25){
                $jumlahlembur +=1;
            }

            if($jumlahlembur >=2 && $jumlahlembur <=10){
                $lembur2= $jumlahlembur*30/60;
            }else if($jumlahlembur >10 && $jumlahlembur <=12){
                $lembur2=5;
                $lembur3=($jumlahlembur-10)*30/60;
            }else if($jumlahlembur >12){
                $lembur2=5;
                $lembur3=1;
                $lembur4=($jumlahlembur-12)*30/60;
            }
        }

        // Mengisi array hasil dengan nilai-nilai lebur yang telah dihitung
        $hasil[0] = round($lebih,2);
        $hasil[1] = round($lembur1,2);
        $hasil[2] = round($lembur2,2);
        $hasil[3] = round($lembur3,2);
        $hasil[4] = round($lembur4,2);
        return $hasil; // Mengembalikan array hasil

    }
    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->all();
        dump($data);
        $jam_masuk = new DateTime($data['Tanggal'] . " " . $data['jam_Masuk']);
        $jam_keluar = new DateTime($data['Tanggal'] . " " . $data['jam_Keluar']);
        $datang = new DateTime($data['Tanggal'] . " " . $data['jam_Datang']);
        $pulang = new DateTime($data['Tanggal'] . " " . $data['jam_Pulang']);
        dump($jam_masuk, $jam_keluar, $datang, $pulang);
        if ($jam_masuk->format('G') == 0 && $datang->format('G') > 15) {
            $datang->modify('-1 day');
            $pulang->modify('-1 day');
        }

        if ($datang->format('G') >= 0 && $datang->format('G') < 4) {
            $datang->modify('+1 day');
        }

        if ($jam_keluar->format('G') < $jam_masuk->format('G')) {
            $jam_keluar->modify('+1 day');
        }

        if ($jam_keluar < $jam_masuk) {
            $jam_keluar->modify('+1 day');
        }

        if ($jam_masuk->format('G') >= 0 && $jam_masuk->format('G') < 7) {
            $jam_masuk->modify('+1 day');
            $jam_keluar->modify('+1 day');
            $datang->modify('+1 day');
            $pulang->modify('+1 day');
        }

        if ($pulang->format('G') < $datang->format('G')) {
            $pulang->modify('+1 day');
        }

        if ($pulang < $datang) {
            $pulang->modify('+1 day');
        }
        $totalKerja = $this->hitungSelisihJam($jam_masuk, $jam_keluar);
        $awalistirahat = new DateTime($data['Tanggal'] . " " . $data['jam_Istirahat_Awal']);
        $akhiristirahat = new DateTime($data['Tanggal'] . " " . $data['jam_Istirahat_Akhir']);
        dump($totalKerja);
        if ($awalistirahat->format('G') < $jam_masuk->format('G')) {
            $awalistirahat->modify('+1 day');
        }

        if ($akhiristirahat->format('G') < $jam_masuk->format('G')) {
            $akhiristirahat->modify('+1 day');
        }

        if ($awalistirahat < $jam_masuk) {
            $awalistirahat->modify('+1 day');
            $akhiristirahat->modify('+1 day');
        }

        $totalIstirahat = $this->hitungSelisihJam($awalistirahat, $akhiristirahat);
        if ($awalistirahat != $akhiristirahat) {
            $jamkerja = $this->hitungJamKerja($jam_masuk, $datang, $pulang, $awalistirahat, $akhiristirahat);
        } else {
            $jamkerja = $this->hitungJamKerja($jam_masuk, $datang, $pulang, $pulang, $pulang);
        }
        if ($data['ketAbsen'] == 'M') {
            $hasil = $this->hitungMasuk($jam_masuk, $jam_keluar, $datang, $pulang);
            $terlambat = $hasil[0];
            $pulangawal = $hasil[0];
            $lebih = $hasil[0];
            if ($terlambat > 0.17) {
                $statusAbsen = 'A';
            }else {
                $statusAbsen = 'M';
            }
        }else if ($data['ketAbsen'] == 'L'){
            $hasil = $this->hitungLembur($jamkerja, $data['Tanggal']);
            $lebih = $hasil[0];
            $lembur1 = $hasil[1];
            $lembur2 = $hasil[2];
            $lembur3 = $hasil[3];
            $lembur4 = $hasil[4];
            $statusAbsen = "L";
        }else {
            $statusAbsen = $data['ketAbsen'];
        }
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_ABSEN @kd_pegawai = ?, @Tanggal = ?, @Jam_Masuk = ?, @Jam_Keluar = ?, @Jml_Jam= ?, @awal_jam_istirahat = ?, @awalistirahat = ?, @akhiristirahat = ?, @jmljam = ?, @shift = ?', [
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


        dd($jamkerja,$hasil[1]);
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @Id_Div = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getDataAbsen") {
            $dataAbsen = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_ABSEN_PER_KARYAWAN @kdPegawai = ?,@tglAwal = ?,@tglAkhir = ?,@divisi = ?', [$crExplode[0], $crExplode[1], $crExplode[2], $crExplode[3]]);
            // dd($dataAbsen);
            return response()->json($dataAbsen);
        } else if ($crExplode[$lastIndex] == "getShift") {
            $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_SHIFT @kode = ?,@shift = ?', [2, $crExplode[0]]);
            // dd($dataAbsen);
            return response()->json($dataShift);
        } else if ($crExplode[$lastIndex] == "getDatangPulang") {
            $dataShift = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_MASUK_KELUAR @tanggal = ?,@kdpegawai = ?', [2, $crExplode[0]]);
            // dd($dataAbsen);
            return response()->json($dataShift);
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
