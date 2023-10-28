<?php

namespace App\Http\Controllers\Payroll\Angsuran\AngsuranStaff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AHSController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Angsuran.AngsuranStaff.AHS', compact('data'));
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
        if ($crExplode[$lastIndex] == "getListData") {
            $listData = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @Kode = ?', [5]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($listData);
        }else if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @Kode = ?', [1]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataDivisi);
        }else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @id_div = ?, @Kode = ?', [$crExplode[0],2]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataPegawai);
        }else if ($crExplode[$lastIndex] == "getBuktiKoreksi") {
            $dataBukti = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @kd_pegawai = ?, @Kode = ?', [$crExplode[0],6]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataBukti);
        }else if ($crExplode[$lastIndex] == "getBuktiIsi") {
            $dataBukti = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @kd_pegawai = ?, @Kode = ?', [$crExplode[0],3]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataBukti);
        }else if ($crExplode[$lastIndex] == "getAngsuran") {
            $nomorAngsuran = str_replace('_', '/', $crExplode[0]);
            $dataAngsuran = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @NO_ANGSURAN = ?, @Kode = ?', [$nomorAngsuran,7]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataAngsuran);
        }else if ($crExplode[$lastIndex] == "getData") {
            $nomorBukti = str_replace('_', '/', $crExplode[0]);
            $dataAngsuran = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_ANGSURAN_HUTANG_STAFF @NO_BUKTI = ?, @Kode = ?', [$nomorBukti,2]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataAngsuran);
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
