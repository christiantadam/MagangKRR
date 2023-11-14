<?php

namespace App\Http\Controllers\Payroll\Maintenance\Fik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FikController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN ? ', [1]);
        return view('Payroll.Maintenance.Fik.FIK', compact('data','dataDivisi'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        // dd($cr);
        //getDivisi
        if ($crExplode[1] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1273_HRD_GET_NAMA @Nama = ?', [$crExplode[0]]);
            // dd($dataDivisi);
            // Return the options as JSON data
            return response()->json($dataPegawai);
        }else if ($crExplode[1] == "getPegawaiKartu") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1273_HRD_HISTORY_PEGAWAI @Kode = ?, @Kartu = ?', [9,$crExplode[0]]);
            // dd($dataDivisi);
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
        DB::connection('ConnPayroll')->statement('exec SP_1273_HRD_IJIN_KARYAWAN  @Kode = ? , @Tanggal = ? , @Kd_Pegawai = ? , @Jns_Keluar = ? ,
        @Kembali = ? , @Jam_AWal = ? , @Jam_Akhir = ? , @Jenis_Alasan = ? , @Keterangan = ? , @Menyetujui = ? ', [
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
