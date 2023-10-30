<?php

namespace App\Http\Controllers\WORKSHOP\Gps\JadwalKonstruksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditEstimasiWaktuController extends Controller
{
    public function index()
    {
        //
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_LIST-WORKSTATION]');
        return view('workshop.GPS.Jadwal_konstruksi.EditEstimasiWaktu', compact(['data']));
    }

    public function Loaddata($worksts, $date1)
    {
        $data = DB::connection('Connworkshop')->select('[SP_5298_PJW_NOANTRI-KONSTRUKSI-NOFINISH] @worksts = ?, @date1 = ? ', [$worksts, $date1]);
        // dd($data);
        $no_Antri = [];
        $idk = 0;
        for ($i = 0; $i < count($data); $i++) {
            # code...
            if ($data[$i]->Cancel == 0) {
                # code...
                $no_Antri[] = $data[$i]->NoAntrian;
                $idk += 1;
            }
        }
        $arraydata = [];
        for ($k = 0; $k < $idk - 1; $k++) {
            # code...
            $table = DB::connection('Connworkshop')->select('[SP_5298_PJW_JADWAL-KONSTRUKSI] @kode = ?, @noAntri = ?, @date1 = ?, @worksts = ? ', [1,$no_Antri[$k], $date1, $worksts]);
            $arraydata[] = $table;
        }
        return $arraydata;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
