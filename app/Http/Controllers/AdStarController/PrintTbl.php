<?php

namespace App\Http\Controllers\AdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintTbl extends Controller
{
    public function index()
    {
        return view('AdStar.PrintTbl');//
    }
}
