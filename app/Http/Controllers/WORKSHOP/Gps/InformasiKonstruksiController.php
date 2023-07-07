<?php

namespace App\Http\Controllers\WORKSHOP\Gps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiKonstruksiController extends Controller
{
    public function JadwalPerWorkStation()
    {
        return view('workshop.GPS.Informasi_Konstruksi.JadwalPerWorkStation');
    }
}
