<?php

namespace App\Http\Controllers\Payroll\Transaksi\MaintenanceKoreksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaintenanceKoreksiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.MaintenanceKoreksi.maintenanceKoreksi', compact('data'));
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
        if ($data['opsi'] == "harian") {
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_KOREKSI_HARIAN @Kode = ?, @tanggal = ?, @kd_pegawai = ?, @nilai = ?, @keterangan= ?, @user_input = ?', [
                $data['kode'],
                $data['tanggal'],
                $data['kd_pegawai'],
                $data['nilai'],
                $data['keterangan'],
                $data['user_input'],


            ]);
            return redirect()->route('MaintenanceKoreksi.index')->with('alert', 'Data koreksi harian berhasil ditambahkan!');
        } else if ($data['opsi'] == "staff") {
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_KOREKSI_STAFF @Kode = ?, @tanggal = ?, @kd_pegawai = ?, @nilai = ?, @keterangan= ?, @user_input = ?', [
                $data['kode'],
                $data['tanggal'],
                $data['kd_pegawai'],
                $data['nilai'],
                $data['keterangan'],
                $data['user_input'],


            ]);
            return redirect()->route('MaintenanceKoreksi.index')->with('alert', 'Data koreksi staff berhasil ditambahkan!');
        }
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getDivisiHarian") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @kode = ?', [1]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        } else if ($crExplode[$lastIndex] == "getDivisiStaff") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_STAFF @kode = ?', [1]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getPegawaiKoreksi") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_GET_PEGAWAI_KOREKSI @Kd_Pegawai = ?,@tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "cekKoreksi") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_5409_CEK_KOREKSI_GAJI @Kd_Pegawai = ?,@Tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "cekGajiHarian") {
            $dataGaji = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_CEK_GAJI_HARIAN @Tanggal = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataGaji);
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
        $data = $request->all();
        if ($data['opsi'] == "harian") {
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_KOREKSI_HARIAN @Kode = ?, @tanggal = ?, @kd_pegawai = ?, @nilai = ?, @keterangan= ?, @user_input = ?', [
                $data['kode'],
                $data['tanggal'],
                $data['kd_pegawai'],
                $data['nilai'],
                $data['keterangan'],
                $data['user_input'],


            ]);
            return redirect()->route('MaintenanceKoreksi.index')->with('alert', 'Data harian berhasil dikoreksi!');
        }else if ($data['opsi'] == "harian"){
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_KOREKSI_STAFF @Kode = ?, @tanggal = ?, @kd_pegawai = ?, @nilai = ?, @keterangan= ?, @user_input = ?', [
                $data['kode'],
                $data['tanggal'],
                $data['kd_pegawai'],
                $data['nilai'],
                $data['keterangan'],
                $data['user_input'],


            ]);
            return redirect()->route('MaintenanceKoreksi.index')->with('alert', 'Data staff berhasil dikoreksi!');
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
