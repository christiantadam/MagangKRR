<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view();
    }


    public function PenerimaOrderGambar()
    {
        return view('WORKSHOP.Workshop.Transaksi.PenerimaOrderGambar');
    }

    public function ProsesPembeliGambar()
    {
        return view('WORKSHOP.Workshop.Transaksi.ProsesPembeliGambar');
    }

    public function StatusOrderGambar()
    {
        return view('WORKSHOP.Workshop.Transaksi.StatusOrderGambar');
    }

    public function MaintenanceNomorGambar()
    {
        return view('WORKSHOP.Workshop.Transaksi.MaintenanceNomorGambar');
    }

    public function MaintenanceOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.MaintenanceOrderKerja');
    }

    public function ACCManagerKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.ACCManagerKerja');
    }

    public function ACCDirekturKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.ACCDirekturKerja');
    }

    public function PenerimaOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.PenerimaOrderKerja');
    }

    public function CetakSuratOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.CetakSuratOrderKerja');
    }

    public function StatusOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.StatusOrderKerja');
    }
}
