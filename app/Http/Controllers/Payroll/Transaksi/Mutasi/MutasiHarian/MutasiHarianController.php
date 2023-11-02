<?php

namespace App\Http\Controllers\Payroll\Transaksi\Mutasi\MutasiHarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MutasiHarianController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.Mutasi.Harian.mutasiHarian', compact('data'));
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
        $lastIndex = count($crExplode) - 1;
        // dd($crExplode);
        if ($crExplode[$lastIndex] == "getDataMutasi") {
            $data = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HISTORY_MUTASI @Kode = ?, @Jenis_peg = ?, @Tanggal = ?', [1,1,$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($data);
        }else if ($crExplode[$lastIndex] == "getMutasiFull") {
            $data = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HISTORY_MUTASI @Kode = ?, @New_Kd_Pegawai = ?', [2,$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($data);
        }else if ($crExplode[$lastIndex] == "getDivisi") {
            $data = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?', [1]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($data);
        }else if ($crExplode[$lastIndex] == "getManager") {
            $data = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER');
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($data);
        }else if ($crExplode[1] == "getKodePegawai") {
            // getPegawaiKeluarga
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_CEK_KODE_PEGAWAI @Id_div = ?', [$crExplode[0]]);
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
        //
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
