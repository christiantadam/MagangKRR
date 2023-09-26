<?php

namespace App\Http\Controllers\WORKSHOP\Gps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalKonstruksiController extends Controller
{
    public function EditJamkerja() {
        return view('workshop.GPS.Jadwal_konstruksi.EditJamkerja');
    }
    public function EditPerWorkStation() {
        return view('workshop.GPS.Jadwal_konstruksi.EditPerWorkStation');
    }
    public function EditPerOrder() {
        return view('workshop.GPS.Jadwal_konstruksi.EditPerOrder');
    }
    public function EditEstimasiTanggal() {
        return view('workshop.GPS.Jadwal_konstruksi.EditEstimasiTanggal');
    }
    public function EditEstimasiWaktu() {
        return view('workshop.GPS.Jadwal_konstruksi.EditEstimasiWaktu');
    }
    public function FinishJadwalKonstruksi() {
        return view('workshop.GPS.Jadwal_konstruksi.FinishJadwalKonstruksi');
    }
    public function DeleteJadwalPerWorkStation() {
        return view('workshop.GPS.Jadwal_konstruksi.DeleteJadwalPerWorkStation');
    }
    public function DeleteJadwalPerOrder() {
        return view('workshop.GPS.Jadwal_konstruksi.DeleteJadwalPerOrder');
    }
}
