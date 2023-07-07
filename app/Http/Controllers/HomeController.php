<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransBL;
use App\User;
use DB;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function Contoh()
    {
        return view('layouts.appContoh');
    }
    public function GPS()
    {
        return view('layouts.WORKSHOP.GPS.appGPS');
    }
    public function Workshop()
    {
        return view('layouts.WORKSHOP.Workshop.appWorkshop');
    }
    public function HomeWorkshop() {
        return view('workshop.homeWorkshop');
    }
}
