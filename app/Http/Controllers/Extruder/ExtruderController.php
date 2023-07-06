<?php

namespace App\Http\Controllers\Extruder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtruderController extends Controller
{
    public function index($pageName = "index")
    {
        $var1 = "Halo dunia";

        $viewName = $pageName == "index"
            ? 'extruder.index'
            : 'extruder.' . $pageName . '.index';

        return view($viewName, compact('var1'));
    }
}
