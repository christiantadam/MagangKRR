<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MasterController extends Controller
{
    public function MaintenanceMesin()
    {
        return view('WORKSHOP.Workshop.Master.MaintenanceMesin');
    }

    public function UpdateNoGambar()
    {
        return view('WORKSHOP.Workshop.Master.UpdateNoGambar');
    }
}
