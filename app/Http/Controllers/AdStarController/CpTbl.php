<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CpTbl extends Controller
{
    public function index()
    {
        return view('AdStar.CpTbl');//
    }

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


        //getorder
        if ($crExplode[1] == "dataCust1") {
            $dataCust1 = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_TABEL_HITUNGAN @Kode= ?', [ $crExplode[0]]);
            // dd($dataCust1);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataCust1);

            // dd($crExplode);

        }
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
