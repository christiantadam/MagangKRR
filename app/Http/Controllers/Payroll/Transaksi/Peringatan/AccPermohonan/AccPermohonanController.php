<?php

namespace App\Http\Controllers\Payroll\Transaksi\Peringatan\AccPermohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccPermohonanController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {



        $peringatan = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_PERINGATAN_BLM_ACC ?', [0]);
        // dd($peringatan);
        return view('Payroll.Transaksi.Peringatan.AccPermohonan.accPermohonan', compact('peringatan'));

    }

    public function prosesPeringatan(Request $request)
    {
        $dataPeringatan = $request->all();

        // Loop melalui data peringatan dan eksekusi stored procedure untuk setiap data
        foreach ($dataPeringatan as $peringatan) {
            $kd_pegawai = $peringatan['kd_pegawai'];
            $peringatan_ke = $peringatan['peringatan_ke'];
            $TglBerlaku = $peringatan['TglBerlaku'];
            // $bulan = $peringatan['bulan'];
            // $tahun = $peringatan['tahun'];

            // Eksekusi stored procedure menggunakan statement tanpa mengambil hasilnya
            DB::connection('ConnPayroll')->statement('EXEC SP_1486_PAY_ACC_PERINGATAN ?, ?, ?, ?', [
                'Adam', // Ganti 'Adam' dengan nilai UserAcc yang sesuai
                $kd_pegawai,
                $peringatan_ke,
                // $bulan,
                // $tahun,
                $TglBerlaku,
            ]);
        }

        // Respon berhasil (optional)
        return response()->json(['message' => 'Data peringatan berhasil diproses']);
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
    public function show()
    {
        //
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
