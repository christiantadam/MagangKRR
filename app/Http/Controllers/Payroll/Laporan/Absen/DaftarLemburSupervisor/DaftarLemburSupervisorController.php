<?php

namespace App\Http\Controllers\Payroll\Laporan\Absen\DaftarLemburSupervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarLemburSupervisorController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $divisi = DB::connection('ConnPayroll')->select('exec SP_1003_PAY_LIHAT_DIVISI');

        return view('Payroll.Laporan.Absen.DaftarLemburSupervisor.daftarLemburSupervisor', compact('divisi'));

    }
    public function getDataLembur()
{
    // Ambil data dari database berdasarkan divisi dan tanggal
    $divisi = $_GET['divisi']; // Ambil nilai dari input divisi (pastikan divisi ini sesuai dengan name di select HTML)
    $tanggal = $_GET['tanggal']; // Ambil nilai dari input tanggal (pastikan tanggal ini sesuai dengan name di input date HTML)

    // Panggil stored procedure dengan menggunakan divisi dan tanggal sebagai parameter
    $daftarLembur = DB::connection('ConnPayroll')->select('exec SP_5409_LBR_SLC_LEMBUR_SUPERVISOR @tanggal = ?, @divisi = ?', [$tanggal, $divisi]);

    // Kirim data ke view
    return view('Payroll.Laporan.Absen.DaftarLemburSupervisor.daftarLemburSupervisor', compact('daftarLembur'));
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
    public function show()
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
