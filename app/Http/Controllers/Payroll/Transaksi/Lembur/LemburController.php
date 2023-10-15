<?php

namespace App\Http\Controllers\Payroll\Transaksi\Lembur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class LemburController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI');
        return view('Payroll.Transaksi.Lembur.lembur', compact('dataDivisi'));
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
        if ($crExplode[$lastIndex] == "getSemuaLembur") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_LEMBUR @divisi = ?, @tanggal = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        }else if ($crExplode[$lastIndex] == "getLemburDouble") {
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_LEMBUR @divisi = ?, @tanggal = ? , @status = ?', [$crExplode[0], $crExplode[1], 1]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
        }else if ($crExplode[$lastIndex] == "cekAccSupervisor") {
            // dd($crExplode);
            $dataPeg = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_CEK_ACC_SUPERVISOR  @id_actual = ?', [$crExplode[0]]);
            // dd($dataPeg);
            // Return the options as JSON data
            return response()->json($dataPeg);
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
        DB::connection('ConnPayroll')->statement('exec SP_5409_LBR_UDT_LEMBUR @jmlJam = ?, @ketlembur = ?, @user_input = ?, @lembur15 = ?, @lembur2 = ?, @lembur3= ?, @lembur4= ?, @idactual= ?, @status= ?', [

            $data['Jml_Jam'],
            $data['Alasan'],
            'A12001',
            $data['Lembur15x'],
            $data['Lembur2x'],
            $data['Lembur3x'],
            $data['Lembur4x'],
            $data['idactual'],
            1,
        ]);
        return redirect()->route('Lembur.index')->with('alert', 'Data Lembur Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd('Masuk Destroy', $data);
        DB::connection('ConnPayroll')->statement('exec SP_5409_LBR_UDT_LEMBUR @jmlJam = ?, @ketlembur = ?, @user_input = ?, @lembur15 = ?, @lembur2 = ?, @lembur3= ?, @lembur4= ?, @idactual= ?, @status= ?', [
            $data['Jml_Jam'],
            $data['Alasan'],
            'A12001',
            $data['Lembur15x'],
            $data['Lembur2x'],
            $data['Lembur3x'],
            $data['Lembur4x'],
            $data['idactual'],
            2,
        ]);
        return redirect()->route('Lembur.index')->with('alert', 'Data Lembur berhasil dihapus!');
    }
}
