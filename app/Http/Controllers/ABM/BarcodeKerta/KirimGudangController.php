<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KirimGudangController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi_Diminta ?, ?, ?', ["4384", NULL, NULL, NULL, NULL]);
        // SP_1273_INV_CekDataSP

        return view('BarcodeKerta2.KirimGudang', compact('dataDivisi'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //cek barcode
        // $status = DB::connection('ConnInventory')->table('')->select()->where();
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    //Display the specified resource.
    public function show($cr, Request $request)
    {
        $crExplode = explode(".", $cr);
        $lasindex = count($crExplode) - 1;

        //getDivisi
        if ($crExplode[$lasindex] == "getSP") {
            $dataSP = DB::connection('ConnInventory')->select('exec SP_1273_INV_CekDataSP @kode = ?, @KodeBarang = ?', ["2", $crExplode[0]]);
            // dd($dataSP);
            // Return the options as JSON data
            return response()->json($dataSP);
        } else if ($crExplode[$lasindex] == "getTampilData") {
            $dataTampil = DB::connection('ConnInventory')->select('exec SP_5409_INV_TampilDataBarang @kodebarang = ?, @noindeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataTampil);
            // Return the options as JSON data
            return response()->json($dataTampil);
        } else if ($crExplode[$lasindex] == "getDataStatus") {
            $statusdispresiasi = DB::connection('ConnInventory')->table('Dispresiasi')
                ->where('kode_barang', $crExplode[0])
                ->where('noindeks', $crExplode[1])
                ->whereNotNull('y_idtrans')
                // ->whereNull('NoTempTrans') // Uncomment this line if needed
                ->where('type_transaksi', '22')
                ->value('status');
            // dd($statusdispresiasi);
            return response()->json($statusdispresiasi);
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
        // kodeUpd: "simpanPegawai",

        DB::connection('ConnInventory')->statement('exec SP_1273_INV_SimpanPermohonanKirimKeKRR1
        @userid = ?,
        @kodebarang = ?,
        @noindeks = ?,
        @barcode = ?,
        @status = ?,
        @divisi = ?,
        @NoSP = ?', [
            '4384',
            $data['kodebarang'],
            $data['noindeks'],
            ' ',
            '1',
            $data['divisi'],
            $data['NoSP']

        ]);
        return redirect()->route('KirimGudang.index')->with('alert', 'Data Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
