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

    public function CetakSuratOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.CetakSuratOrderKerja');
    }

    public function StatusOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.StatusOrderKerja');
    }
}
