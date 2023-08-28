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
