<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StpOrdPrs extends Controller
{
    public function index()
    {
        // $dataorder = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode= ?', [10]);
        //     dd($dataorder);
        return view('AdStar.StpOrdPrs');//
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


        //getorder
        if ($crExplode[1] == "dataorder") {
            $dataorder = DB::connection('ConnADSTAR')->select('exec SP_1486_ADSTAR_LIST_ORDER @Kode= ?', [ $crExplode[0]]);

            // dd($dataObjek);
            // Return the options as JSON data
            return response()->json($dataorder);

            // dd($crExplode);
            // dd($dataorder);
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
