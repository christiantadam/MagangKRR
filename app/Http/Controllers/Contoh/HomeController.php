<?php

namespace App\Http\Controllers\Contoh;

// use Illuminate\Http\Request;
// use App\User;
// use Auth;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\HakAksesController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Contoh.home');
    }
}
