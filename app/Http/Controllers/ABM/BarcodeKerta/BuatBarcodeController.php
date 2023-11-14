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
        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["4384", NULL, NULL, NULL, NULL]);
        // $dataType = DB::connection('ConnInventory')->select('exec SP_5409_INV_IdType_Schedule @idtype =?, @divisi =?', ["", "JBJ"]);

        //  dd($dataDivisi);
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

        } else if ($crExplode[$lasindex] == "getIdBarang") {
            $dataNoIndex = DB::connection('ConnInventory')
                ->table('Dispresiasi')
                ->where('Status', '0')
                ->where('Type_Transaksi', ['22', '28']) // Menggunakan $crExplode[0] sebagai NoIndeks
                ->orderBy('Id_barang', 'desc') // Urutkan berdasarkan NoIndeks secara descending
                ->first(); // Ambil data dari baris pertama yang sesuai

            // Mengembalikan dataNoIndex sebagai respons JSON
            return response()->json(['NoIndeks' => $dataNoIndex->NoIndeks]);

        } else if ($crExplode[$lasindex] == "getBarcodeACC") {
            $dataBarcodeACC = DB::connection('ConnInventory')->select('exec SP_5409_INV_CekBarcodeBelumACC @idkelompokutama = ?', [$crExplode[0]]);
            // dd($dataBarcodeACC);
            // Return the options as JSON data
            return response()->json($dataBarcodeACC);

        } else if ($crExplode[$lasindex] == "getJenisBarcode") {
            $dataJenisBarcode = DB::connection('ConnInventory')->select('exec SP_5409_INV_CekJenisBarcode @kodebarang = ?, @noindeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataJenisBarcode);
            // Return the options as JSON data
            return response()->json($dataJenisBarcode);

        } else if ($crExplode[$lasindex] == "cekBarcode") {
            $dataCekBarcode = DB::connection('ConnInventory')->select('exec SP_5409_INV_CekBarcode @kodebarang = ?, @noindeks = ?', [$crExplode[0], $crExplode[1]]);
            // dd($dataCekBarcode);
            // Return the options as JSON data
            return response()->json($dataCekBarcode);

        } else if ($crExplode[$lasindex] == "getDataStatus") {
            $statusdispresiasi = DB::connection('ConnInventory')->table('Dispresiasi')
                ->where('kode_barang', $crExplode[0])
                ->where('noindeks', $crExplode[1])
                ->whereNotNull('y_idtrans')
                // ->whereNull('NoTempTrans') // Uncomment this line if needed
                ->whereIn('type_transaksi', ['22', '29', '28'])
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

        if ($data['opsi'] == "satu") {
            // dd($data);
            $dataNoIndex = DB::connection('ConnInventory')
                ->table('Dispresiasi')
                ->where('Kode_Barang', $data['kodebarang']) // Menggunakan $crExplode[0] sebagai NoIndeks
                ->orderBy('NoIndeks', 'desc') // Urutkan berdasarkan NoIndeks secara descending
                ->first(); // Ambil data dari baris pertama yang sesuai
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_ACCBarcode @kodebarang = ?, @noindeks = ?, @userid = ?', [
                $data['kodebarang'],
                $dataNoIndex->NoIndeks,
                '4384'
            ]);
            // return redirect()->route('BuatBarcode.index')->with('alert', 'Data Updated successfully!');
            return redirect()->back();


        } else if ($data['opsi'] == "dua") {
            $dataNoIndex = DB::connection('ConnInventory')
                ->table('Dispresiasi')
                ->where('Kode_Barang', $data['kodebarang']) // Menggunakan $crExplode[0] sebagai NoIndeks
                ->orderBy('NoIndeks', 'desc') // Urutkan berdasarkan NoIndeks secara descending
                ->first(); // Ambil data dari baris pertama yang sesuai
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_DataPrintUlang @kodebarang = ?, @noindeks = ?', [
                $data['kodebarang'],
                $dataNoIndex->NoIndeks,
            ]);
            // return redirect()->route('BuatBarcode.index')->with('alert', 'Data Updated successfully!');
            return redirect()->back();

        } else if ($data['opsi'] == "tiga") {
            $dataNoIndex = DB::connection('ConnInventory')
                ->table('Dispresiasi')
                ->where('Kode_Barang', $data['kodebarang']) // Menggunakan $crExplode[0] sebagai NoIndeks
                ->orderBy('NoIndeks', 'desc') // Urutkan berdasarkan NoIndeks secara descending
                ->first(); // Ambil data dari baris pertama yang sesuai
            DB::connection('ConnInventory')->statement('exec SP_5409_INV_PenghangusanBarcodeOtomatis @kodebarang = ?, @noindeks = ?, @userid = ?', [
                $data['kodebarang'],
                $dataNoIndex->NoIndeks,
                "4384"
            ]);
            return redirect()->back();

        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
