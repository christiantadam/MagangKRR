<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data2 = DB::connection('ConnABM')->select('exec SP_5409_INV_IdType_Schedule @divisi = ?, @idtype = ?',  ['terserah', 'seterah']);
        //dd($data2);
        $data = 'HAPPY HAPPY HAPPY';
        return view('BarcodeKerta2.Schedule', compact('data'));
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
