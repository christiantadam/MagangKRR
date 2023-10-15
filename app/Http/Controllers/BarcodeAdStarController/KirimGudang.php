<?php

namespace App\Http\Controllers\BarcodeAdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KirimGudang extends Controller
{
    public function index()
    {
        return view('BarcodeAdStar.KirimGudang');//
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lasindex = count($crExplode) - 1;

        //getDivisi
        ($crExplode[$lasindex] == "getSP") {
            $dataSP = DB::connection('ConnInventory')->select('exec SP_1273_INV_CekDataSP @kode = ?, @KodeBarang = ?', ["2", $crExplode[0]]);
            // dd($dataSP);
            // Return the options as JSON data
            return response()->json($dataSP);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
