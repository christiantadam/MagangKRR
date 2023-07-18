<?php

namespace App\Http\Controllers\Accounting\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceBankController extends Controller
{
     public function MaintenanceBank()
     {
        $maintenancebank = DB::connection('ConnAccounting')->select('exec SP_1273_ACC_CHECK_BANK_TBANK @IdBank =?', [1]);
        dd($maintenancebank);
        return view('Accounting.Master.MaintenanceBank', compact('maintenancebank'));
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
