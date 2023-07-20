<?php

namespace App\Http\Controllers\Accounting\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceBankController extends Controller
{
    public function maintenanceBank()

    {
        $maintenanceBank = DB::connection('ConnAccounting')->select('exec SP_1273_ACC_LIST_BANK_ALL_TBANK');
        return view('Accounting.Master.MaintenanceBank', compact(['maintenanceBank']));
    }
    function getDataBank($idBank)
    {
        $data =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_LIST_BANK_IDBANK_TBANK] @IdBank = ?', [$idBank]);
        return response()->json($data);
    }

    function getKodePerkiraan($idBank)
    {
        $kodePerkiraan =  DB::connection('ConnAccounting')->select('exec [SP_1273_ACC_LIST_BKK1_KODEPERKIRAAN]');
        return response()->json($kodePerkiraan);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        dd($request->all());
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
