<?php

namespace App\Http\Controllers\WORKSHOP\Gps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalKonstruksiController extends Controller
{

<<<<<<< Updated upstream
    public function EditEstimasiTanggal() {
        return view('workshop.GPS.Jadwal_konstruksi.EditEstimasiTanggal');
    }
=======
>>>>>>> Stashed changes
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
