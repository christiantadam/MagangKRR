<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UpKdBrng extends Controller
{
    public function index()
    {
        $dataUpKdBrng = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_KODE_BRG @Kode=1');
        // $dataUpKdBrng2 = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_KODE_BRG @Kode=2, @nama=:nama', ['nama' => substr(nama-barang.value, 3, 4) // Mengambil substring dari Nama_Brg.Text]);
        // dd($dataUpKdBrng);
        return view('AdStar.UpKdBrng', compact('dataUpKdBrng'));//
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
    public function show($id)
    {
        //
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
