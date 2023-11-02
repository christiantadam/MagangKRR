<?php

namespace App\Http\Controllers\Payroll\Angsuran\AngsuranHutang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AngsuranHutangController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('Payroll.Angsuran.AngsuranHutang.AngsuranHutang', compact('data'));
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
        $crExplode = explode(".", $cr);
        $lastIndex = count($crExplode) - 1;
        // dd($crExplode);
        if ($crExplode[$lastIndex] == "cekTanggal") {
            $listData = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_TANGGAL_ANGSURAN @Tanggal = ?, @Kode = ?', [$crExplode[0],3]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($listData);
        }else if ($crExplode[$lastIndex] == "getListData") {
            $dataHutang = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_HUTANG_HARIAN @Tanggal = ?', [$crExplode[0]]);
            // Return the options as JSON data
            // dd($dataHutang);
            return response()->json($dataHutang);
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
        $data = $request->all();
        $arrayNoHutang = explode(".", $data['listNomorHutang']);
        $arrayNilaiAngsuran = explode(".", $data['listNilaiAngsuran']);
        $arraySisa = explode(".", $data['listSisa']);
        $length = count($arrayNoHutang);
        $arrayNoBukti = [];

        foreach ($arrayNoHutang as $hutang) {
            $dataBukti = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_NO_ANGSURAN @no_hutang = ?', [$hutang]);
            $noAngs = !is_null($dataBukti[0]->nomor) ? $dataBukti[0]->nomor : '0';
            if ($noAngs === '0') {
                $no = 1;
            } else {
                $no = substr($noAngs, 0, 3) + 1;
            }
            $NoAngsuran = str_pad($no, 3, '0', STR_PAD_LEFT) . '/' . substr($hutang, 0, 4) . '/' . substr($hutang, -2);
            $arrayNoBukti[] = $NoAngsuran;
        };
        // dd($data,$arrayNoHutang,$arrayNoBukti,$arrayNilaiAngsuran,$arraySisa);
        for ($i = 0; $i < $length; $i++) {
            DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_INS_HUTANG_ANGSURAN @no_bukti = ?, @tanggal = ?, @no_hutang = ?, @nilai_angsuran = ?, @pot_gaji= ?, @sisa_hutang= ?', [

                $arrayNoBukti[$i],
                $data['tanggal_Hutang'],
                $arrayNoHutang[$i],
                $arrayNilaiAngsuran[$i],
                'Y',
                $arraySisa[$i]
            ]);
            if ($arraySisa == '0') {
                DB::connection('ConnPayroll')->statement('exec SP_1486_PAY_LUNAS_HUTANG @no_hutang = ?, @tgl_lunas = ?, @sisa = ?', [

                    $arrayNoHutang[$i],
                    $data['tanggal_Hutang'],
                    $arraySisa[$i]

                ]);
            }
            // dump($arrayNoHutang[$i],$arrayNoBukti[$i],$arrayNilaiAngsuran[$i],$arraySisa[$i]);
        };

        return redirect()->back()->with('alert', 'Data sudah TerSimpan.');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
