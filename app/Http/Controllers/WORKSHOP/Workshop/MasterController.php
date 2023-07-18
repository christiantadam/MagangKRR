<?php

namespace App\Http\Controllers\WORKSHOP\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $divisi = DB::connection('ConnExtruder')->select('exec SP_5298_WRK_DIVISI');
       // dd($$divisi);
        return view('WORKSHOP.Workshop.Master.MaintenanceDivisi',compact(['divisi']));


    }

    public function UpdateNoGambar()
    {
        return view('WORKSHOP.Workshop.Master.UpdateNoGambar');
    }
}
