<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MnOrdPrs extends Controller
{
    public function index()
    {
        $dataCust = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode=1');
        $datanoordkrj = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode=10');



        return view('AdStar.MnOrdPrs', compact('dataCust','datanoordkrj'));//
    }

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
    }

    //Display the specified resource.
    public function show($cr)
    {
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) -1;

        //getDivisi
        if ($crExplode[$lastIndex] == "dataBrng") {
            $dataBrng = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode= ?, @idcust= ?', [2, $crExplode[0]]);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataBrng);

            // dd($crExplode);
        }
        elseif ($crExplode[$lastIndex] == "dataSrtPsn") {
            $dataSrtPsn = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode= ?, @idcust= ?, @KD_BRG= ?' , [3, $crExplode[0], $crExplode[1]]);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataSrtPsn);

            // dd($crExplode);
        }
        elseif ($crExplode[$lastIndex] == "datastkordsblm") {
            $datastkordsblm = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode= ?, @KD_BRG= ?', [12, $crExplode[0]]);
            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($datastkordsblm);

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
