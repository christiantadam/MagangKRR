<?php

namespace App\Http\Controllers\Payroll\Maintenance\Fik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FikController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $data = 'HAPPY HAPPY HAPPY';
        $dataDivisi = DB::connection('ConnPayroll')->select('exec SP_1486_PAY_SLC_DIVISI_HARIAN ? ', [1]);
        return view('Payroll.Maintenance.Fik.FIK', compact('data','dataDivisi'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    //Display the specified resource.
    public function show(cr $cr)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request)
    {
        //
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
