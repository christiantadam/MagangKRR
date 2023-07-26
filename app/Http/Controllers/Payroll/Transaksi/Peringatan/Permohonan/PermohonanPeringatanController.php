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

        $peringatanDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI ?', [1]);
        // dd($peringatanPegawai);
        return view('Payroll.Transaksi.Peringatan.Permohonan.permohonanPeringatan', compact('peringatanDivisi'));
    }

    public function getPegawai($Id_Div)
    {

        $dataPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA ?', [$Id_Div], [1]);

        // Return the options as JSON data
        return response()->json($dataPegawai);
    }

    public function prosesPeringatan(Request $request)
    {
        $dataDiv = $request->all();

        // Loop melalui data peringatan dan eksekusi stored procedure untuk setiap data


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
        // Validate the form data (if needed)
        $request->validate([
            'id_div' => 'required',
            // Add validation rules for other form fields here if needed
        ]);

        // Get the submitted data
        $idDiv = $request->input('id_div');

        // Now, you can use the $idDiv to fetch data for the selected division from the database
        $peringatanPegawai = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_NAMA ?', [$idDiv] ,[1]);

        // Do whatever you want with the $peringatanPegawai data, for example, pass it to a view
        return view('your.view.name', compact('peringatanPegawai'));
    }

    //Display the specified resource.
    public function show($cr)
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
