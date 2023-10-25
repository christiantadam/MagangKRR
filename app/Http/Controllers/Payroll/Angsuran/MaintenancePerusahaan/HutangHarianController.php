<?php

namespace App\Http\Controllers\Payroll\Angsuran\MaintenancePerusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HutangHarianController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Angsuran.MaintenanceHutangHarian.HutangHarian', compact('data'));
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
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_HUTANG_MASTER @kd_pegawai = ?, @no_bukti = ?, @tanggal = ?, @nilai_hutang = ?, @sisa_hutang= ?, @keterangan = ?, @jns_hutang = ?', [
            $data['Kd_Pegawai'],
            $data['Bukti'],
            $data['tanggal_Hutang'],
            $data['Jumlah'],
            $data['Jumlah'],
            $data['Keterangan'],
            0,
        ]);
        return redirect()->route('Hutang.index')->with('alert', 'Data hutang berhasil ditambahkan!');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($crExplode);
        if ($crExplode[$lastIndex] == "getListHutang") {
            $dataHutang = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HUTANG_MASTER @kode = ?', [3]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataHutang);
        }else if ($crExplode[$lastIndex] == "getHutang") {
            $nomorHutang = str_replace('_', '/', $crExplode[0]);
            $dataHutang = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HUTANG_MASTER @kode = ?,@NO_BUKTI = ?', [2,$nomorHutang]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataHutang);
        }else if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN @Kode = ?', [1]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataDivisi);
        }else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataPegawai);
        }else if ($crExplode[$lastIndex] == "getNomorBukti") {
            $dataNomor = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_NO_BUKTI');
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataNomor);
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
        // dd($data , " Masuk store bosq");
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_HUTANG_MASTER @no_bukti = ?, @nilai_hutang = ?, @sisa_hutang = ?, @keterangan = ?', [
            $data['Bukti'],
            $data['Jumlah'],
            $data['Sisa'],
            $data['Keterangan'],
        ]);
        return redirect()->route('Hutang.index')->with('alert', 'Data hutang berhasil diupdate!');
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_DEL_HUTANG_MASTER @no_bukti = ?', [
            $data['Bukti'],
        ]);
        return redirect()->route('Hutang.index')->with('alert', 'Data hutang berhasil dihapus!');
    }
}
