<?php

namespace App\Http\Controllers\ABM\BarcodeRoll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class SettingTimbanganController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        return view('BarcodeRollWoven.SettingTimbangan', compact('data'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'timbangan' => 'required|in:500,1000', // Sesuaikan dengan nilai yang diizinkan
        ]);

        // Ambil nilai dari formulir
        $timbangan = $request->input('timbangan');

        // Simpan pengaturan timbangan ke database
        // Tidak perlu menggunakan 'Setting::updateOrCreate', cukup 'create'
        Setting::create(['timbangan' => $timbangan]);

        // Redirect kembali ke indeks SettingTimbangan
        return redirect()->route('settingtimbangan.index')->with('success', 'Setting Timbangan Tersimpan.');
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
        //
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
