<?php

namespace App\Http\Controllers\Payroll\Transaksi\MaintenancePelatihan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaintenancePelatihanController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Transaksi.MaintenancePelatihan.maintenancePelatihan', compact('data'));
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
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_MAINT_PELATIHAN @Kode = ?, @Tanggal = ?, @Kd_Pegawai = ?, @Jenis = ?, @NamaLembaga= ?, @Tempat = ?, @Topik = ?, @Lama = ?, @waktu = ?, @Nilai = ?', [
            1,
            $data['TglPelatihan'],
            $data['Kd_Peg'],
            $data['JenisPelatihan'],
            $data['Lembaga_Pelatihan'],
            $data['tempat_Pelatihan'],
            $data['topik_Pelatihan'],
            $data['Lama_Pelatihan'],
            $data['waktu'],
            $data['Nilai'],

        ]);
        return redirect()->route('MaintenancePelatihan.index')->with('alert', 'Data pelatihan berhasil ditambahkan!');
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($cr);
        //getDivisi
        if ($crExplode[$lastIndex] == "getDivisi") {
            $dataDiv = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI');
            // dd($dataDiv);
            // Return the options as JSON data
            return response()->json($dataDiv);
        } else if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA @id_div = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        } else if ($crExplode[$lastIndex] == "getPelatihan") {
            $dataPelatihan = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_LIST_PELATIHAN @Kode = ?, @Kd_Pegawai = ?', [1, $crExplode[0]]);
            // dd($dataPelatihan);
            // Return the options as JSON data
            return response()->json($dataPelatihan);
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

        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_MAINT_PELATIHAN @Kode = ?, @id = ?, @Tanggal = ?, @Kd_Pegawai = ?, @Jenis = ?, @NamaLembaga= ?, @Tempat = ?, @Topik = ?, @Lama = ?, @waktu = ?, @Nilai = ?', [
            2,
            $data['Id_Pelatihan'],
            $data['TglPelatihan'],
            $data['Kd_Peg'],
            $data['JenisPelatihan'],
            $data['Lembaga_Pelatihan'],
            $data['tempat_Pelatihan'],
            $data['topik_Pelatihan'],
            $data['Lama_Pelatihan'],
            $data['waktu'],
            $data['Nilai'],

        ]);
        return redirect()->route('MaintenancePelatihan.index')->with('alert', 'Data Pelatihan Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_MAINT_PELATIHAN @Kode = ?, @id = ?, @Tanggal = ?, @Kd_Pegawai = ?, @Jenis = ?, @NamaLembaga= ?, @Tempat = ?, @Topik = ?, @Lama = ?, @waktu = ?, @Nilai = ?', [
            3,
            $data['Id_Pelatihan'],
            $data['TglPelatihan'],
            $data['Kd_Peg'],
            $data['JenisPelatihan'],
            $data['Lembaga_Pelatihan'],
            $data['tempat_Pelatihan'],
            $data['topik_Pelatihan'],
            $data['Lama_Pelatihan'],
            $data['waktu'],
            $data['Nilai'],

        ]);
        return redirect()->route('MaintenancePelatihan.index')->with('alert', 'Data Pelatihan berhasil dihapus!');
    }
}
