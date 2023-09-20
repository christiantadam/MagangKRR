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

    public function OrderProyek()
    {
        return view('WORKSHOP.Workshop.Informasi.OrderProyek');
    }
}
