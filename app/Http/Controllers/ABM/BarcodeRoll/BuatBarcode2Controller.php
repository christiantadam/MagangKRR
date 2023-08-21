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
        $dataSubKelompokType = DB::connection('ConnInventory')->select('exec SP_1003_INV_IdSubKelompok_Type @XIdSubKelompok_Type = ?', ["SKLT1"]);
        $data = 'HAPPY HAPPY HAPPY';

        // SP_1003_INV_IdSubKelompok_Type

        // dd($dataSubKelompokType);

        return view('BarcodeRollWoven.BuatBarcode2', compact('data' , 'dataSubKelompok', 'dataSubKelompokType'));
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
