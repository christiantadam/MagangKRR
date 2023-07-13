<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        return view();
    }

    public function MaintenanceDrafter()
    {
        return view('WORKSHOP.Workshop.Master.MaintenanceDrafter');
    }

    public function MaintenanceMesin()
    {
        return view('WORKSHOP.Workshop.Master.MaintenanceMesin');
    }

    public function MaintenanceDivisi()
    {
        return view('WORKSHOP.Workshop.Master.MaintenanceDivisi');
    }

    public function UpdateNoGambar()
    {
        return view('WORKSHOP.Workshop.Master.UpdateNoGambar');
    }
}
