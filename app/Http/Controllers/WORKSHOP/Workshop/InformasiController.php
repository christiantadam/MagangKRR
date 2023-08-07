<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        return view();
    }

    public function OrderGambarSelesai()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderGambarSelesai');
    }

    public function OrderKerjaSelesai()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderKerjaSelesai');
    }

    public function OrderProyekSelesai()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderProyekSelesai');
    }

    public function NomorGambar()
    {
        return view('WORKSHOP.Workshop.Informasi.NomorGambar');
    }

    public function OrderGambar()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderGambar');
    }

    public function OrderKerja()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderKerja');
    }

    public function OrderProyek()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderProyek');
    }
}