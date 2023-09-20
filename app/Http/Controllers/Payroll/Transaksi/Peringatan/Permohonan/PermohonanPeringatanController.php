<?php

namespace App\Http\Controllers\Payroll\Transaksi\Peringatan\Permohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermohonanPeringatanController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        // $peringatanDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI ?', [1]);
        // dd($peringatanPegawai);
        return view('Payroll.Transaksi.Peringatan.Permohonan.permohonanPeringatan');
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
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_PERINGATAN @kd_pegawai = ?, @peringatan_ke = ?, @bulan = ?, @tahun = ?, @no_surat= ?, @uraian= ?, @TglBerlaku= ?, @TglAkhir= ?', [

            $data['kd_pegawai'],
            $data['peringatan_ke'],
            $data['bulan'],
            $data['tahun'],
            $data['no_surat'],
            $data['uraian'],
            $data['TglBerlaku'],
            $data['TglAkhir'],
        ]);
        return redirect()->route('Permohonan.index')->with('alert', 'Data Peringatan berhasil ditambahkan!');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI');
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDivisi);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);

            // Return the options as JSON data
            return response()->json($dataPegawai);
        } else if ($crExplode[$lastIndex] == "getPeringatan") {
            $dataPeringatan = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_MAX_PERINGATAN @Type = ?, @Kd_Pegawai = ?', [1, $crExplode[0]]);

            // Return the options as JSON data
            return response()->json($dataPeringatan);
        } else if ($crExplode[$lastIndex] == "getPeringatan2") {
            $dataPeringatan = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_MAX_PERINGATAN @Type = ?, @Kd_Pegawai = ?, @Tahun = ?', [2, $crExplode[0], $crExplode[1]]);
            // dd($dataPeringatan);
            // Return the options as JSON data
            return response()->json($dataPeringatan);
        } else if ($crExplode[$lastIndex] == "getPeringatan3") {
            $dataPeringatan = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_MAX_PERINGATAN @Type = ?, @Kd_Pegawai = ?, @Tahun = ?, @Bulan = ?', [3, $crExplode[0], $crExplode[1], $crExplode[2]]);
            // dd($dataPeringatan);
            // Return the options as JSON data
            return response()->json($dataPeringatan);
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

        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_PERINGATAN @kd_pegawai = ?, @peringatan_ke = ?, @bulan = ?, @tahun = ?, @no_surat= ?, @uraian= ?', [
            $data['kd_pegawai'],
            $data['peringatan_ke'],
            $data['bulan'],
            $data['tahun'],
            $data['no_surat'],
            $data['uraian'],
        ]);
        return redirect()->route('Permohonan.index')->with('alert', 'Data Peringatan Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_DEL_PERINGATAN @kd_pegawai = ?, @peringatan_ke = ?, @bulan = ?, @tahun = ?', [
            $data['kd_pegawai'],
            $data['peringatan_ke'],
            $data['bulan'],
            $data['tahun'],
        ]);
        return redirect()->route('Permohonan.index')->with('alert', 'Data peringatan berhasil dihapus!');
    }
}
