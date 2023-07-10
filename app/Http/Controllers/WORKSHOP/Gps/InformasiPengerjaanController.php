<?php

namespace App\Http\Controllers\WORKSHOP\Gps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiPengerjaanController extends Controller
{
    public function JadwalPerMesinPengerjaan() {
        return view('workshop.GPS.Informasi_Pengerjaan.JadwalPerMesin');
    }
}
