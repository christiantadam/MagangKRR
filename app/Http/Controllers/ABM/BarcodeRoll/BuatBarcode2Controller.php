<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuatBarcode2Controller extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $dataSubKelompok = DB::connection('ConnInventory')->select('exec SP_1003_INV_IDKELOMPOK_SUBKELOMPOK @XIdKelompok_SubKelompok = ?, @type = ?', ["006493", "1"]);

        $data = 'HAPPY HAPPY HAPPY';

        // SP_1003_INV_IdSubKelompok_Type

        // dd($dataSubKelompokType);

        return view('BarcodeRollWoven.BuatBarcode2', compact('data' , 'dataSubKelompok'));
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
        $lasindex = count($crExplode) - 1;
        // dd($cr);

        if ($crExplode[$lasindex] == "getType") {
            $dataType = DB::connection('ConnInventory')->select('exec SP_5409_INV_IdType_Schedule @idtype = ?, @divisi = ?', [" ", $crExplode[0]]);
            // dd($dataType);
            // Return the options as JSON data
            return response()->json($dataType);
        } else if ($crExplode[$lasindex] == "getBarcode") {
            $dataBarcodeKonversi = DB::connection('ConnInventory')->select('exec SP_5409_INV_SLC_BarcodeKonversi @kode_barang = ?, @noindeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataBarcodeKonversi);
            // Return the options as JSON data
            return response()->json($dataBarcodeKonversi);
        } else if ($crExplode[$lasindex] == "buatBarcode") {
            $crExplode = explode("~", $cr);
            $dataBarcode = DB::connection('ConnInventory')->statement(
                'exec SP_5409_INV_SimpanPermohonanBarcodeKonversi
                @idtypeasal = ?,
                @idtypetujuan = ?,
                @userid = ?,
                @tanggal = ?,
                @jumlahmasukprimer = ?,
                @jumlahmasuksekunder = ?,
                @jumlahmasuktertier = ?,
                @asalidsubkelompok = ?,
                @tujuanidsubkelompok = ?,
                @kodebarangasal = ?,
                @kodebarangtujuan = ?,
                @noindeksasal = ?,
                @uraian = ?,
                @noindeks = ?,
                @hasil = ?',
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
                    $crExplode[10],
                    $crExplode[11],
                    $crExplode[12],
                    " ",
                    " "
                ]
            );
            // dd($crExplode);
            return response()->json($dataBarcode);
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
            return redirect()->route('BuatBarcode2.index')->with('alert', 'Data Updated successfully!');


        } else if ($data['opsi'] == "dua") {
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_DataPrintUlang @kodebarang = ?, @noindeks = ?', [
                $data['kodebarang'],
                $data['noindeks']
            ]);
            return redirect()->route('BuatBarcode2.index')->with('alert', 'Data Updated successfully!');

        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}

