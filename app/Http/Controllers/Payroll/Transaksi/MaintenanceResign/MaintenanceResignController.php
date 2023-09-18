<?php

namespace App\Http\Controllers\Payroll\Transaksi\MaintenanceResign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaintenanceResignController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.MaintenanceResign.maintenanceResign', compact('data'));
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
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getListData") {
            $dataResign = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_KELUAR @kode = ?, @tgl_keluar = ?', [1, $crExplode[0]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataResign);
        } else if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI');
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getDataResign") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_KELUAR @KODE = ?, @Kd_pegawai = ?', [2, $crExplode[0]]);
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getMasaKerja") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_FIND_KELUAR @Kd_Pegawai = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "cekProses") {
            if ($crExplode[1] == "2") {
                $dataProses = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_CEK_PROSES_MINGGUAN @Tanggal = ?, @id_div = ?', [$crExplode[0]]);
                // dd($dataPeg);
                // Return the options as JSON data
                return response()->json($dataProses);
            } else if ($crExplode[1] == "3") {
                $dataProses = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_CEK_PROSES_BULANAN @Tanggal = ?, @id_div = ?', [$crExplode[0]]);
                // dd($dataPeg);
                // Return the options as JSON data
                return response()->json($dataProses);
            }
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
