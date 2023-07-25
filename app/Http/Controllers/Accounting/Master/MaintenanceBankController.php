<?php

namespace App\Http\Controllers\Accounting\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaintenanceBankController extends Controller
{
    public function index()
    {

        $maintenanceBank = DB::connection('ConnAccounting')->select('exec SP_1273_ACC_LIST_BANK_ALL_TBANK');
        //dd($maintenanceBank);
        return view('Accounting.Master.MaintenanceBank', compact(['maintenanceBank']));

    }
    function getDataBank($idBank)
    {
        $data =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_LIST_BANK_IDBANK_TBANK] @IdBank = ?', [$idBank]);
        return response()->json($data);
    }

    function getKodePerkiraan($kodePerkiraan)
    {
        $data =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_LIST_BKK1_KODEPERKIRAAN]');
        return response()->json($data);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //dd($request->all());
        $IdBank = $request->idBank;
        $NamaBank = $request->isiNamaBank;
        $JenisBank = $request->jenisBankSelect;
        $Alamat = $request->alamat;
        $Kota = $request->kota;
        $Telp = $request->telp;
        $Person = $request->person;
        $Hp = $request->hp;
        $Rekening = $request->norekening;
        $Aktif = $request->Aktif;
        $Saldo = $request->saldoBank;
        $kodePerkiraan = $request->kodePerkiraan;

        if ($request->statusAktif == "on") {
            $Aktif = 'Y';
        }
        else if ($request->statusAktif == "off"){
            $Aktif = 'T';
        }

        DB::connection('ConnAccounting')->statement('exec [SP_1273_ACC_UDT_BANK_TBANK]
        @Kode = ?,
        @IdBank = ?,
        @NamaBank = ?,
        @JenisBank = ?,
        @Alamat = ?,
        @Kota = ?,
        @Telp = ?,
        @Person = ?,
        @Hp = ?,
        @Rekening = ?,
        @Aktif = ?,
        @Saldo = ?,
        @Perkiraan = ?', [
            1,
            $IdBank,
            $NamaBank,
            $JenisBank,
            $Alamat,
            $Kota,
            $Telp,
            $Person,
            $Hp,
            $Rekening,
            $Aktif,
            $Saldo,
            $kodePerkiraan
        ]);
        return redirect()->back();
    }

    //Display the specified resource.
    public function show($cr)
    {
        dd('masuk show');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        dd('masuk edit');
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $idBank = $request->idBank;
        $namaBankSelect = $request->namaBankSelect;
        $jenisBank = $request->jenisBankSelect;
        $alamat = $request->alamat;
        $kota = $request->kota ;
        $telp = $request->telp ;
        $person = $request->person ;
        $hp = $request->hp ;
        $saldoBank = $request->saldoBank;
        $noRekening = $request->norekening;
        $statusAktif = $request->statusAktif;
        $kodePerkiraan = $request->kodePerkiraanSelect;

        if ($request->statusAktif == "on") {
            $statusAktif = 'Y';
        }
        else if ($request->statusAktif == "off"){
            $statusAktif = 'T';
        }

        // Perform the database update for the selected namaBank
        DB::connection('ConnAccounting')->statement('exec [SP_1273_ACC_UDT_BANK_TBANK]
        @Kode = ?,
        @IdBank = ?,
        @NamaBank = ?,
        @JenisBank = ?,
        @Alamat = ?,
        @Kota = ?,
        @Telp = ?,
        @Person = ?,
        @Hp = ?,
        @Rekening = ?,
        @Aktif = ?,
        @Saldo = ?,
        @Perkiraan = ?', [
            2,
            $idBank,
            $namaBankSelect,
            $jenisBank,
            $alamat,
            $kota,
            $telp,
            $person,
            $hp,
            $noRekening,
            $statusAktif,
            $saldoBank,
            $kodePerkiraan
        ]);

        return redirect()->back();
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
