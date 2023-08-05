<?php

namespace App\Http\Controllers\ABM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScanBarcodeController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataDivisi = DB::connection('ConnABM')->select('exec SP_1003_INV_UserDivisi ?, ?, ?, ?, ?', ["p", NULL, "p", "p", "p"]);
        $dataObjek = DB::connection('ConnABM')->select('exec SP_1003_INV_User_Objek ?, ?, ?, ?', ["p", "p", NULL, "p"]);


        // dd($dataObjek);
        return view('ScanBarcode.ScanBarcode    ', compact('dataDivisi', 'dataObjek'));
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
    public function show(cr $cr)
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
