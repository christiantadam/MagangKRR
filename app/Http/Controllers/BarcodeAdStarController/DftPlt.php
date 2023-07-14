<?php

namespace App\Http\Controllers\BarcodeAdStarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DftPlt extends Controller
{
    public function index()
    {
        return view('BarcodeAdStar.DftPlt');//
    }
}
