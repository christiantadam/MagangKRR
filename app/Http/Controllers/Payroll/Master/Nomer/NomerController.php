<?php

namespace App\Http\Controllers\Payroll\Master\Nomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NomerController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI ');
        return view('Payroll.Master.Nomer.nomer', compact('dataDivisi'));
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
            if ($crExplode[0] == "") {
                $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @Id_Div = ?', [NULL]);
            return response()->json($dataPeg);
            }
            else{
                $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PEGAWAI @Id_Div = ?', [$crExplode[0]]);
                // dd($dataPeg);
                // Return the options as JSON data
                return response()->json($dataPeg);
            }

        } else if ($crExplode[1] == "getNamaPegawai") {

            //getDataPegawai
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataPegawai);
            return response()->json($dataPegawai);
        } else if ($crExplode[1] == "getPegawai2") {
            //getDataKeluarga
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_GET_PEGAWAI @Kd_Pegawai = ?', [$crExplode[0]]);
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
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_STAFF_2 @kd_pegawai = ?, @nama = ?, @NIK = ?, @alamat = ?, @kota= ?, @tgl_masuk_awal = ?
        , @tgl_masuk = ?, @no_kartu = ?, @no_induk = ?, @no_rbh = ?, @no_astek = ?, @no_koperasi = ?, @tglkop = ?, @no_npwp = ?, @no_rek = ?, @no_bpjs = ?, @nmibu = ?
        , @tgg = ?, @idklinik = ?, @jnspeg = ?, @jab = ?, @nopen = ?, @email = ?, @notelp = ?, @cvaksin = ?, @kotalahir = ?, @tgl_lahir = ?, @kartumakan = ?, @rekBCA = ?', [
            $data['kd_pegawai'],
            $data['nama'],
            $data['NIK'],
            $data['alamat'],
            $data['kota'],
            $data['tgl_masuk_awal'],
            $data['tgl_masuk'],
            $data['no_kartu'],
            $data['no_induk'],
            $data['no_rbh'],
            $data['no_astek'],
            $data['no_koperasi'],
            $data['tglkop'],
            $data['no_npwp'],
            $data['no_rek'],
            $data['no_bpjs'],
            $data['nmibu'],
            $data['tgg'],
            $data['idklinik'],
            $data['jnspeg'],
            $data['jab'],
            $data['nopen'],
            $data['email'],
            $data['notelp'],
            $data['cvaksin'],
            $data['kotalahir'],
            $data['tgl_lahir'],
            $data['kartumakan'],
            $data['rekBCA']

        ]);
        return redirect()->route('MasterNomer.index')->with('alert', 'Data Pekerja Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
