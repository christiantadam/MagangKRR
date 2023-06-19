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
}
