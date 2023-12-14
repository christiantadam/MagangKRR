<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class KirimGudang2Controller extends Controller
{
    //Display a listing of the resource.
    public function index()
    {

        $dataDivisi = DB::connection('ConnInventory')->select('exec SP_1003_INV_UserDivisi_Diminta @XKdUser = ?', ["4384"]);
        $dataObjek = DB::connection('ConnInventory')->select('exec SP_1003_INV_User_Objek @XKdUser = ?, @XIdDivisi = ?', ["4384", "ABM"]);


        $data = 'HAPPY HAPPY HAPPY';
        return view('BarcodeRollWoven.KirimGudang2', compact('data', 'dataDivisi', 'dataObjek'));
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

        if ($crExplode[$lasindex] == "getTampilData") {
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
                ->whereIn('type_transaksi', ['22', '29', '28', '26', '23'])
                ->value('status');
            // dd($statusdispresiasi);
            return response()->json($statusdispresiasi);
        } else if ($crExplode[$lasindex] == "getWaktu") {
            $dataWaktu = DB::connection('ConnInventory')->select('exec SP_JAM_SERVER');
            // dd($dataWaktu);
            // Return the options as JSON data
            return response()->json($dataWaktu);
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
        $dataWaktu = DB::connection('ConnInventory')->select('exec SP_JAM_SERVER');
        $status = 0; // Inisialisasi status

        if (!empty($dataWaktu)) {
            $jamServer = $dataWaktu[0]->jam_server; // Pastikan nama kolom sesuai dengan hasil SP

            // Ubah format jamServer ke objek DateTime
            $jamServerObj = new DateTime($jamServer);

            // Tentukan batas jam
            $batasJamAwal = new DateTime("00:00:00");
            $batasJamAkhir = new DateTime("07:00:00");

            // Bandingkan jamServer dengan batas jam
            if ($jamServerObj >= $batasJamAwal && $jamServerObj <= $batasJamAkhir) {
                $status = 1;
            }
            // dd($status);
        }

        DB::connection('ConnInventory')->statement('exec SP_1273_INV_SimpanPermohonanKirimKeGudang
        @kodebarang = ?,
        @noindeks = ?,
        @userid = ?,
        @divisi = ?,
        @status = ?', [
            $data['kodebarang'],
            $data['noindeks'],
            '4384',
            $data['divisi'],
            $status,
        ]);

        return redirect()->route('KirimGudang2.index')->with('alert', 'Data Updated successfully!');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
