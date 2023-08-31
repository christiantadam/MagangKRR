<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HslPrdPrs extends Controller
{
    public function index()
    {
        $dataMesin = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_MESIN');
        // $dataTransaksi = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_HASIL_PRODUKSI @Kode=1 @tanggal=' );
        $dataOrder = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode=5');
        // dd($dataOrder);

        return view('AdStar.HslPrdPrs', compact('dataMesin','dataOrder'));//
    }
    // ,'?\dataTransaksi','dataOrder'


    //Display the specified resource.
    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            // Add validation rules for each input field
        ]);

        // Create a new record in the database using the validated data
        $result = DB::table('SP_1486_ADSTAR_LIST_HASIL_PRODUKSI')->insert($validatedData);

        if ($result) {
            return redirect()->back()->with('success', 'Data saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to save data.');
        }
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);

        //getDivisi
        if ($crExplode[1] == "dataTransaksi") {
            $dataTransaksi = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_HASIL_PRODUKSI @Kode= ?, @tanggal= ?', [1, $crExplode[0]]);
            // dd($dataObjek);
            // Return the options as JSON data a
            return response()->json($dataTransaksi);

            // dd($crExplode);
        }
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
//     public function destroy($id)
//     {
//             //


// }
}
