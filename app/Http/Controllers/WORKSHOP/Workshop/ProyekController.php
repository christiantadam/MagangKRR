<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        return view();
    }

    public function MaintenanceOrderProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.MaintenanceOrderProyek');
    }

    public function ACCManagerProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.ACCManagerProyek');
    }

    public function ACCDirekturProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.ACCDirekturProyek');
    }

    public function PenerimaOrderProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.PenerimaOrderProyek');
    }

    public function CetakSuratOrderProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.CetakSuratOrderProyek');
    }

    public function StatusOrderProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.StatusOrderProyek');
    }
}
