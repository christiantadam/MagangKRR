<?php

namespace App\Http\Controllers\Payroll\Master\Divisi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $data = 'HAPPY HAPPY HAPPY';
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI ?', [0]);
        $dataPosisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_POSISI ?', [0]);
        $dataManager = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_MANAGER');
        // dd($dataDivisi);
        return view('Payroll.Master.Divisi.divisi', compact('dataDivisi', 'dataPosisi', 'dataManager'));
    }

    public function InsertDivisi(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_DIVISI ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $data['kd_div'],
            $data['nama_div'],
            $data['status'],
            $data['no_kabag'],
            $data['jam'],
            $data['aturan'],
            $data['Id_Group_Div'],
            $data['kstatus'],
            $data['div_pos']

        ]);
        return redirect()->route('divisi.index')->with('success', 'Data inserted successfully!');
    }

    public function UpdateDivisi(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_UDT_DIVISI ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $data['kd_div'],
            $data['nama_div'],
            $data['status'],
            $data['no_kabag'],
            $data['jam'],
            $data['aturan'],
            $data['Id_Group_Div'],
            $data['kstatus'],
            $data['div_pos']
        ]);
        return redirect()->route('divisi.index')->with('success', 'Data Updated successfully!');
    }

    public function DeleteDivisi(Request $request)
    {
        $data = $request->all();
        // dd($data);
        DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_DEL_DIVISI ?', [
            $data['kd_div']

        ]);
        return redirect()->route('divisi.index')->with('success', 'Data Deleted successfully!');
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
        if ($crExplode[$lastIndex] == "getPegawai") {
            $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA ?', [$crExplode[0]], [1]);
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
