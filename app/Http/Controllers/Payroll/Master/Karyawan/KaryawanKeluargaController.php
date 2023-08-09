<?php

namespace App\Http\Controllers\Payroll\Master\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaryawanKeluargaController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataPISAT = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_PISAT_STATUS ?', [1]);
        $dataKawin = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_PISAT_STATUS ?', [2]);
        $dataHubungan = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_PISAT_STATUS ?', [3]);
        $dataKlinik = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_SLC_KLINIK ');
        return view('Payroll.Master.Karyawan.karyawanKeluarga', compact('data', 'dataPISAT', 'dataKawin', 'dataHubungan', 'dataKlinik'));
    }

    public function getDivisi($Kode)
    {
        $dataDivisi = [];

        if ($Kode == 1) {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN ?', [1]);
        } elseif ($Kode == 2) {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_STAFF ?', [1]);
        }

        // Return the options as JSON data
        return response()->json($dataDivisi);
    }

    public function UpdatePekerja(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_PEKERJA @modul = ?, @kdpeg = ?, @nokk = ?, @PISAT = ?, @status= ?, @tgg = ?', [
            1,
            $data['kd_peg'],
            $data['nokk'],
            $data['PISAT'],
            $data['status'],
            $data['tgg']
        ]);
        return redirect()->route('karyawanKeluarga.index')->with('success', 'Data Updated successfully!');
    }
    public function tambahKeluarga(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_KELUARGA @modul = ?, @kdPeg = ?, @idNik = ?, @nmKel = ?, @statKel= ?, @tglLahir = ?, @idPisat = ?, @kotaLahir = ?, @kelamin = ?, @statKawin = ?, @idbpjs = ?, @idklinik = ?', [
            1,
            $data['kdPeg'],
            $data['idNik'],
            $data['nmKel'],
            $data['statKel'],
            $data['tglLahir'],
            $data['idPisat'],
            $data['kotaLahir'],
            $data['kelamin'],
            $data['statKawin'],
            $data['idbpjs'],
            $data['idklinik'],
        ]);
        return redirect()->route('karyawanKeluarga.index')->with('alert', 'Data berhasil ditambahkan!');
    }
    public function updateKeluarga(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_KELUARGA @modul = ?, @idKel = ?, @idNik = ?, @nmKel = ?, @statKel= ?, @tglLahir = ?, @idPisat = ?, @kotaLahir = ?, @kelamin = ?, @statKawin = ?, @idbpjs = ?, @idklinik = ?', [
            2,
            $data['idKel'],
            $data['idNik'],
            $data['nmKel'],
            $data['statKel'],
            $data['tglLahir'],
            $data['idPisat'],
            $data['kotaLahir'],
            $data['kelamin'],
            $data['statKawin'],
            $data['idbpjs'],
            $data['idklinik'],
        ]);
        return redirect()->route('karyawanKeluarga.index')->with('success', 'Data berhasil diupdate!');
    }
    public function hapusKeluarga(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_KELUARGA @modul = ?, @idKel = ?', [
            3,
            $data['idKel'],

        ]);
        return redirect()->route('karyawanKeluarga.index')->with('alert', 'Data berhasil dihapus!');
    }

    public function getPegawaiKeluarga($Id_Div)
    {
        $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI ?', [$Id_Div]);
        // Return the options as JSON data
        return response()->json($dataPegawai);
    }
    public function getDataKeluarga($Id_Peg)
    {
        $dataKeluarga = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_MAINT_KELUARGA @kdPeg = ?, @modul = ?', [$Id_Peg, 4]);
        // dd($dataKeluarga);
        return response()->json($dataKeluarga);
    }
    public function getDataPegawai($Id_Peg)
    {
        $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_MAINT_PEKERJA @kdpeg = ?, @modul = ?', [$Id_Peg, 2]);
        return response()->json($dataPegawai);
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
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_KELUARGA @modul = ?, @kdPeg = ?, @idNik = ?, @nmKel = ?, @statKel= ?, @tglLahir = ?, @idPisat = ?, @kotaLahir = ?, @kelamin = ?, @statKawin = ?, @idbpjs = ?, @idklinik = ?', [
            1,
            $data['kdPeg'],
            $data['idNik'],
            $data['nmKel'],
            $data['statKel'],
            $data['tglLahir'],
            $data['idPisat'],
            $data['kotaLahir'],
            $data['kelamin'],
            $data['statKawin'],
            $data['idbpjs'],
            $data['idklinik'],
        ]);
        return redirect()->route('KaryawanKeluarga.index')->with('alert', 'Data berhasil ditambahkan!');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);

        //getDivisi
        if ($crExplode[1] == "getDivisi") {
            $dataDivisi = [];
            if ($crExplode[0] == 1) {
                $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN ?', [1]);
            } elseif ($crExplode[0] == 2) {
                $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_STAFF ?', [1]);
            }
            // Return the options as JSON data
            return response()->json($dataDivisi);
        } else if ($crExplode[1] == "getDataPegawai") {

            //getDataPegawai
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_MAINT_PEKERJA @kdpeg = ?, @modul = ?', [$crExplode[0], 2]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[1] == "getDataKeluarga") {
            //getDataKeluarga
            $dataKeluarga = DB::connection('ConnPayroll')->select('exec SP_5409_PAY_MAINT_KELUARGA @kdPeg = ?, @modul = ?', [$crExplode[0], 4]);
            return response()->json($dataKeluarga);
        } else if ($crExplode[1] == "getPegawaiKeluarga") {
            // getPegawaiKeluarga
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_KD_PEGAWAI ?', [$crExplode[0]]);
            // Return the options as JSON data
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

        $data = $request->all();
        // dd($data);
        // kodeUpd: "simpanPegawai",
        if ($data['kodeUpd'] == "simpanPegawai") {
            //UpdatePekerja
            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_PEKERJA @modul = ?, @kdpeg = ?, @nokk = ?, @PISAT = ?, @status= ?, @tgg = ?', [
                1,
                $data['kd_peg'],
                $data['nokk'],
                $data['PISAT'],
                $data['status'],
                $data['tgg']
            ]);
            return redirect()->route('KaryawanKeluarga.index')->with('alert', 'Data Pegawai Updated successfully!');
        } else if ($data['kodeUpd'] == "simpanKeluarga") {
            // dd($data);
            ///updateKeluarga
            DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_KELUARGA @modul = ?, @idKel = ?, @idNik = ?, @nmKel = ?, @statKel= ?, @tglLahir = ?, @idPisat = ?, @kotaLahir = ?, @kelamin = ?, @statKawin = ?, @idbpjs = ?, @idklinik = ?', [
                2,
                $data['idKel'],
                $data['idNik'],
                $data['nmKel'],
                $data['statKel'],
                $data['tglLahir'],
                $data['idPisat'],
                $data['kotaLahir'],
                $data['kelamin'],
                $data['statKawin'],
                $data['idbpjs'],
                $data['idklinik'],
            ]);
            return redirect()->route('KaryawanKeluarga.index')->with('alert', 'Data keluarga berhasil diupdate!');
        }
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_PAY_MAINT_KELUARGA @modul = ?, @idKel = ?', [
            3,
            $data['idKel'],
        ]);
        return redirect()->route('KaryawanKeluarga.index')->with('alert', 'Data berhasil dihapus!');
    }
}
