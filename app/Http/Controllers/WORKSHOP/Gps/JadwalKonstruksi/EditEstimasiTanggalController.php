<?php

namespace App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EditEstimasiTanggalController extends Controller
{

    public function index()
    {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-WORKSTATION]');
        // dd($data);
        return view('workshop.GPS.Jadwal_konstruksi.EditEstimasiTanggal',compact(['data']));
    }
    public function NOFINISH($worksts, $date1){
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_NOANTRI-KONSTRUKSI-NOFINISH] @worksts = ?, @date1 = ?', [$worksts, $date1]);
        return response()->json($data);
    }
    public function getdatatable($noAntri, $date , $worksts) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_JADWAL-KONSTRUKSI] @kode = ?, @noAntri = ?, @date = ?, @worksts = ?', [1,$noAntri,$date, $worksts]);
        return response()->json($data);
    }
    public function cekestimasi($noOd) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_CEK-ESTIMASI-KONSTRUKSI] @noOd = ?', [$noOd]);
        return response()->json($data);
    }
    public function cekestimasikonstruksi($estDate,$worksts) {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_CEK-ESTDATE-KONSTRUKSI] @estDate = ?, @worksts = ?', [$estDate, $worksts]);
        return response()->json($data);
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $estDate = $request->estDate;
        $noAntri = $request->noAntri;
        $idBag = $request->idBag;
        $estHour = $request->estHour;
        $estMinute = $request->estMinute;
        $worksts = $request->worksts;
        $oldDate =  $request->oldDate;
        $jamKrj = $request->jamKrj;
        $user = 4384;
        $keterangan = $request->keterangan;
        DB::connection('Connworkshop')->statement('exec [SP_5298_PJW_EDIT-ESTDATE-KONSTRUKSI-NEW] @estDate = ?, @noAntri = ?, @idBag = ?, @estHour = ?, @estHour = ?, @worksts = ?, @oldDate = ?, @jamKrj = ?, @user = ?, @keterangan = ?',
         [$estDate,$noAntri,$idBag,$estHour, $estMinute,$worksts, $oldDate,$jamKrj,$user,$keterangan]);

    }


    public function destroy($id)
    {
        //
    }
}
