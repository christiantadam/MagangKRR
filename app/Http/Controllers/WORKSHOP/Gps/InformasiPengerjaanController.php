<?php

namespace App\Http\Controllers\WORKSHOP\Gps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiPengerjaanController extends Controller
{
    public function JadwalPerMesinPengerjaan() {
        return view('workshop.GPS.Informasi_Pengerjaan.JadwalPerMesin');
    }
    public function JadwalPerOrderPengerjaan() {
        return view('workshop.GPS.Informasi_Pengerjaan.JadwalPerOrder');
    }
    public function DaftarOrderKerjaProyek() {
        return view('workshop.GPS.Informasi_Pengerjaan.DaftarOrderKerjaProyek');
    }
    public function EDMCNC() {
        return view('workshop.GPS.Informasi_Pengerjaan.GrafikMesinEDM-CNC');
    }
    public function DrillMillScrap() {
        return view('workshop.GPS.Informasi_Pengerjaan.GrafikDrill-Mill-Scrap');
    }
}
