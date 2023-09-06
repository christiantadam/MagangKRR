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

    public function StatusOrderKerja()
    {
        return view('WORKSHOP.Workshop.Transaksi.StatusOrderKerja');
    }
}
