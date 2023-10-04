<?php

namespace App\Http\Controllers\Payroll\Transaksi\InputRange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class InputRangeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI');
        $dataKlinik = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_KLINIK ');
        return view('Payroll.Transaksi.InputRange.inputRange', compact('dataDivisi', 'dataKlinik'));
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
        $tanggal_awal = new DateTime($data['Tanggal1']);
        $tanggal_akhir = new DateTime($data['Tanggal2']);
        $tanggal_akhir->modify('+1 day');
        // dd($data);
        $interval = new DateInterval('P1D'); // P1D mewakili interval 1 hari
        $daterange = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);
        if ($data['Tanggal1'] === $data['Tanggal2']) {
            $dataLembur = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_JML_LEMBUR @tanggal = ?, @kdpegawai = ?', [$tanggal_awal->format('Y-m-d'), $data['kdpegawai'],]);
            if ($dataLembur[0]->ada >= 1) {
                return redirect()->route('InputRange.index')->with('alert', 'ada lembur pada tanggal ' . $tanggal_awal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kdpegawai']);
            } else {
                $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_AGENDA @kdPegawai = ? , @tanggal = ?', [$data['kdpegawai'], $tanggal_awal->format('Y-m-d')]);

                if (count($dataAgenda) >= 1) {

                    if ($data['ketabsensi'] === 'S') {
                        // dd($data);
                        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_UPDATE_STATUS_ABSEN @idagenda = ?, @ketabsensi = ?, @userid = ?, @alasan = ?, @kdklinik= ?', [
                            $dataAgenda[0]->id_agenda,
                            $data['ketabsensi'],
                            'U001',
                            $data['alasan'],
                            $data['kdklinik'],
                        ]);
                    } else {
                        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_UPDATE_STATUS_ABSEN @idagenda = ?, @ketabsensi = ?, @userid = ?, @alasan = ?', [
                            $dataAgenda[0]->id_agenda,
                            $data['ketabsensi'],
                            'U001',
                            $data['alasan'],
                        ]);
                    }
                    return redirect()->route('InputRange.index')->with('alert', 'Agenda pegawai berhasil diupdate!');
                } else {
                    if ($data['ketabsensi'] = 'S') {
                        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_AGENDA_BARU @kdPegawai = ?, @tanggal = ?, @userid = ?, @alasan = ?, @ketabsensi= ?, @kdklinik= ?', [
                            $data['kdpegawai'],
                            $tanggal_awal->format('Y-m-d'),
                            'U001',
                            $data['alasan'],
                            $data['ketabsensi'],
                            $data['kdklinik'],
                        ]);
                    } else {
                        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_AGENDA_BARU @kdPegawai = ?, @tanggal = ?, @userid = ?, @alasan = ?, @ketabsensi= ?', [
                            $data['kdpegawai'],
                            $tanggal_awal->format('Y-m-d'),
                            'U001',
                            $data['alasan'],
                            $data['ketabsensi'],

                        ]);
                    }
                    return redirect()->route('InputRange.index')->with('alert', 'Agenda pegawai berhasil ditambahkan!');
                }
            };
        } else if ($data['Tanggal1'] != $data['Tanggal2']) {
            foreach ($daterange as $tanggal) {
                $dataLembur = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_JML_LEMBUR @tanggal = ?, @kdpegawai = ?', [$tanggal->format('Y-m-d'), $data['kdpegawai'],]);
                if ($dataLembur[0]->ada >= 1) {
                    return redirect()->route('InputRange.index')->with('alert', 'ada lembur pada tanggal ' . $tanggal->format('Y-m-d') . ' untuk kd pegawai : ' . $data['kdpegawai']);
                } else {
                    $dataAgenda = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_AGENDA @kdPegawai = ? , @tanggal = ?', [$data['kdpegawai'], $tanggal->format('Y-m-d')]);



                    if (count($dataAgenda) >= 1) {

                        if ($data['ketabsensi'] === 'S') {
                            // dd($data);
                            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_UPDATE_STATUS_ABSEN @idagenda = ?, @ketabsensi = ?, @userid = ?, @alasan = ?, @kdklinik= ?', [
                                $dataAgenda[0]->id_agenda,
                                $data['ketabsensi'],
                                'U001',
                                $data['alasan'],
                                $data['kdklinik'],
                            ]);
                        } else {
                            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_UPDATE_STATUS_ABSEN @idagenda = ?, @ketabsensi = ?, @userid = ?, @alasan = ?', [
                                $dataAgenda[0]->id_agenda,
                                $data['ketabsensi'],
                                'U001',
                                $data['alasan'],
                            ]);
                        }

                    } else {
                        if ($data['ketabsensi'] = 'S') {
                            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_AGENDA_BARU @kdPegawai = ?, @tanggal = ?, @userid = ?, @alasan = ?, @ketabsensi= ?, @kdklinik= ?', [
                                $data['kdpegawai'],
                                $tanggal->format('Y-m-d'),
                                'U001',
                                $data['alasan'],
                                $data['ketabsensi'],
                                $data['kdklinik'],
                            ]);
                        } else {
                            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_INSERT_AGENDA_BARU @kdPegawai = ?, @tanggal = ?, @userid = ?, @alasan = ?, @ketabsensi= ?', [
                                $data['kdpegawai'],
                                $tanggal->format('Y-m-d'),
                                'U001',
                                $data['alasan'],
                                $data['ketabsensi'],

                            ]);
                        }

                    }
                };
            }
            return redirect()->route('InputRange.index')->with('alert', 'data sudah diproses!');
        }
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI @id_divisi = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "cekLembur") {
            $ada = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_JML_LEMBUR @tanggal = ? , @kdpegawai = ?', [$crExplode[1], $crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($ada);
        } else if ($crExplode[$lastIndex] == "getAgenda") {
            $ada = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_AGENDA @kdPegawai = ? , @tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($ada);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($ada);
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

    public function ambilDataAgenda($kd_pegawai, $tanggal)
    {
        return DB::connection('ConnPayroll')->select('exec SP_5409_PAY_CEK_AGENDA @kdPegawai = ? , @tanggal = ?', [$kd_pegawai, $tanggal]);
    }
}
