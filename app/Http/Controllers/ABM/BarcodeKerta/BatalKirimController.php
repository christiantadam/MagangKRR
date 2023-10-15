<?php

namespace App\Http\Controllers\ABM\BarcodeKerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatalKirimController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $dataKirim = DB::connection('ConnInventory')->select('exec SP_1273_INV_ListBarcodeKirim @status = ?', ["2"]);
        // SP_1273_INV_CekDataSP

        // dd($dataKirim);
        return view('BarcodeKerta2.BatalKirim', compact('dataKirim'));
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
        {
            $data = $request->all();
            // dd($data);
            // kodeUpd: "simpanPegawai",

            DB::connection('ConnInventory')->statement('exec SP_1273_INV_SimpanPembatalanKirimKeGudang @kodebarang = ?, @noindeks = ?', [
                $data['kodebarang'],
                $data['noindeks'],

            ]);
            return redirect()->route('BatalKirim.index')->with('alert', 'Data Updated successfully!');
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
