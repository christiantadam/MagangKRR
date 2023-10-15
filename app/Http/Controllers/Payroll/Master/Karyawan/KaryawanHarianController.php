<?php

namespace App\Http\Controllers\Payroll\Master\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaryawanHarianController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataPosisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_POSISI ');
        $dataShift = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_SHIFT ');
        return view('Payroll.Master.Karyawan.karyawanHarian', compact('dataPosisi', 'dataShift'));
    }

    public function getDivisi($Posisi)
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?, @pos = ?', [4, $Posisi]);

        // Return the options as JSON data
        return response()->json($dataDivisi);
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
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_PEGAWAI  @id_div = ? , @kd_peg = ? , @nama_peg = ? , @no_induk = ? ,
        @no_kartu = ? , @jenis_peg = ? , @alamat = ? , @kota = ? , @tmp_lahir = ? , @tgl_lahir = ? , @jns_kelamin = ? , @agama = ? , @kawin = ? ,
        @tgl_masuk = ? , @tgl_masuk_awal = ? , @jabatan = ? , @golongan = ? , @no_astek = ? , @no_rbh = ? , @no_koperasi = ? , @tgl_agt_kop = ? , @gaji_pokok = ? ,
        @u_golongan = ? , @t_jabatan = ? , @u_jenjang = ? , @Tinggi_Badan = ? , @berat_Badan = ? , @pendidikan = ? , @Shift = ? , @pos = ? , @TglAwalKontrak = ? ,
        @TglAkhirKontrak = ? , @Tanggungan = ? , @NPWP = ? , @No_rek = ? , @NIK = ? ', [
            $data['id_div'],
            $data['kd_peg'],
            $data['nama_peg'],
            $data['no_induk'],
            $data['no_kartu'],
            $data['jenis_peg'],
            $data['alamat'],
            $data['kota'],
            $data['tmp_lahir'],
            $data['tgl_lahir'],
            $data['jns_kelamin'],
            $data['agama'],
            $data['kawin'],
            $data['tgl_masuk'],
            $data['tgl_masuk_awal'],
            $data['jabatan'],
            $data['golongan'],
            $data['no_astek'],
            $data['no_rbh'],
            $data['no_koperasi'],
            $data['tgl_agt_kop'],
            $data['gaji_pokok'],
            $data['u_golongan'],
            $data['t_jabatan'],
            $data['u_jenjang'],
            $data['Tinggi_Badan'],
            $data['berat_Badan'],
            $data['pendidikan'],
            $data['Shift'],
            $data['pos'],
            $data['TglAwalKontrak'],
            $data['TglAkhirKontrak'],
            $data['Tanggungan'],
            $data['NPWP'],
            $data['No_rek'],
            $data['NIK'],
        ]);
        return redirect()->route('KaryawanHarian.index')->with('alert', 'Data berhasil ditambahkan!');
        // return $result;
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        // dd($cr);
        //getDivisi
        if ($crExplode[1] == "getDivisi") {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?, @pos = ?', [4, $crExplode[0]]);
            // dd($dataDivisi);
            // Return the options as JSON data
            return response()->json($dataDivisi);
        } else if ($crExplode[1] == "getNamaPegawai") {

            //getDataPegawai
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[1] == "getPegawai") {
            //getDataKeluarga
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_GET_PEGAWAI @Kd_Pegawai = ?',[$crExplode[0]]);
            return response()->json($dataPeg);
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
        // dd($data , " Masuk update bosq");
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_PEGAWAI  @id_div = ? , @kd_peg = ? , @nama_peg = ? , @no_induk = ? ,
        @no_kartu = ? , @jenis_peg = ? , @alamat = ? , @kota = ? , @tmp_lahir = ? , @tgl_lahir = ? , @jns_kelamin = ? , @agama = ? , @kawin = ? ,
        @tgl_masuk = ? , @tgl_masuk_awal = ? , @jabatan = ? , @golongan = ? , @no_astek = ? , @no_rbh = ? , @no_koperasi = ? , @tgl_agt_kop = ? , @gaji_pokok = ? ,
        @u_golongan = ? , @t_jabatan = ? , @u_jenjang = ? , @Tinggi_Badan = ? , @berat_Badan = ? , @pendidikan = ? , @Shift = ? , @pos = ? , @TglAwalKontrak = ? ,
        @TglAkhirKontrak = ? , @Tanggungan = ? , @NPWP = ? , @No_rek = ? , @NIK = ? ', [
            $data['id_div'],
            $data['kd_peg'],
            $data['nama_peg'],
            $data['no_induk'],
            $data['no_kartu'],
            $data['jenis_peg'],
            $data['alamat'],
            $data['kota'],
            $data['tmp_lahir'],
            $data['tgl_lahir'],
            $data['jns_kelamin'],
            $data['agama'],
            $data['kawin'],
            $data['tgl_masuk'],
            $data['tgl_masuk_awal'],
            $data['jabatan'],
            $data['golongan'],
            $data['no_astek'],
            $data['no_rbh'],
            $data['no_koperasi'],
            $data['tgl_agt_kop'],
            $data['gaji_pokok'],
            $data['u_golongan'],
            $data['t_jabatan'],
            $data['u_jenjang'],
            $data['Tinggi_Badan'],
            $data['berat_Badan'],
            $data['pendidikan'],
            $data['Shift'],
            $data['pos'],
            $data['TglAwalKontrak'],
            $data['TglAkhirKontrak'],
            $data['Tanggungan'],
            $data['NPWP'],
            $data['No_rek'],
            $data['NIK'],
        ]);
        return redirect()->route('KaryawanHarian.index')->with('alert', 'Data berhasil diupdate!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
