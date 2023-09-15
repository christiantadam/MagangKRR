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

    public function StatusOrderProyek()
    {
        return view('WORKSHOP.Workshop.Proyek.StatusOrderProyek');
    }
}
