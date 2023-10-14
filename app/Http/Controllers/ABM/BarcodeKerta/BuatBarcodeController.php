<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuatBarcodeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["U001", NULL, NULL, NULL, NULL]);
        // $dataType = DB::connection('ConnInventory')->select('exec SP_5409_INV_IdType_Schedule @idtype =?, @divisi =?', ["", "JBJ"]);

        //  dd($dataType);
        return view('BarcodeKerta2.BuatBarcode', compact('dataDivisi'));
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

    // Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lasindex = count($crExplode) - 1;

        // getDivisi
        if ($crExplode[$lasindex] == "txtIdDivisi") {
            $dataDivisi = DB::connection('ConnInventory')->select('exec SP_5409_INV_IdType_Schedule @idtype = ?, @divisi = ?', ["", $crExplode[0]]);
            // dd($dataDivisi);
            // Return the options as JSON data
            return response()->json($dataDivisi);
        } else if ($crExplode[$lasindex] == "buatBarcode") {
            $dataBarcode = DB::connection('ConnInventory')->statement(
                'exec SP_5409_INV_SimpanPermohonanBarcode
        @idtype = ?, @userid = ?, @tanggal = ?, @jumlahmasukprimer = ?, @jumlahmasuksekunder = ?,
        @jumlahmasuktertier = ?, @asalidsubkelompok = ?, @idsubkontraktor = ?, @kodebarang = ?, @uraian = ?, @noindeks = ?, @hasil = ?',
                [
                    $crExplode[0],
                    $crExplode[1],
                    $crExplode[2],
                    $crExplode[3],
                    $crExplode[4],
                    $crExplode[5],
                    $crExplode[6],
                    $crExplode[7],
                    $crExplode[8],
                    $crExplode[9],
                    " ",
                    " "
                ]
            );
            // dd($dataBarcode);
            // Return the options as JSON data
            return response()->json($dataBarcode);

        } else if ($crExplode[$lasindex] == "getJumlahBarcode") {
            $dataJumlahBarcode = DB::connection('ConnInventory')->select('exec SP_5409_INV_JumlahBarcode @tanggal = ?, @kelompokutama = ?, @shift = ?', []);
            // dd($dataJumlahBarcode);
            // Return the options as JSON data
            return response()->json($dataJumlahBarcode);

        } else if ($crExplode[$lasindex] == "getIndex") {
            $dataNoIndex = DB::connection('ConnInventory')
                ->table('Dispresiasi')
                ->where('Kode_Barang', $crExplode[0]) // Menggunakan $crExplode[0] sebagai NoIndeks
                ->orderBy('NoIndeks', 'desc') // Urutkan berdasarkan NoIndeks secara descending
                ->first(); // Ambil data dari baris pertama yang sesuai

            // Mengembalikan dataNoIndex sebagai respons JSON
            return response()->json(['NoIndeks' => $dataNoIndex->NoIndeks]);
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

        if ($data['opsi'] == "satu") {
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_ACCBarcode @kodebarang = ?, @noindeks = ?, @userid = ?', [
                $data['kodebarang'],
                $data['noindeks'],
                'U001'
            ]);
            return redirect()->route('BuatBarcode.index')->with('alert', 'Data Updated successfully!');


        } else if ($data['opsi'] == "dua") {
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_DataPrintUlang @kodebarang = ?, @noindeks = ?', [
                $data['kodebarang'],
                $data['noindeks']
            ]);
            return redirect()->route('BuatBarcode.index')->with('alert', 'Data Updated successfully!');

        } else if ($data['opsi'] == "tiga") {
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_PenghangusanBarcodeOtomatis @kodebarang = ?, @noindeks = ?, userid = ?', [
                $data['kodebarang'],
                $data['noindeks'],
                "U001"
            ]);
            return redirect()->route('BuatBarcode.index')->with('alert', 'Data Updated successfully!');

        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
