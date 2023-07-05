<?php

namespace App\Http\Controllers\WORKSHOP\Gps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPengerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MaintenanceMaterialType(){
        return view('workshop.GPS.Jadwal_pengerjaan.MaintenanceMaterialType');
    }
    public function MaintenanceBagianBarang() {
        return view('workshop.GPS.Jadwal_pengerjaan.MaintenanceBagianBarang');
    }
    public function InputJadwal() {
        return view('workshop.GPS.Jadwal_pengerjaan.InputJadwal');
    }
    public function EditJamKerja() {
        return view('workshop.GPS.Jadwal_pengerjaan.EditJamKerja');
    }
    public function EditPerMesin() {
        return view('workshop.GPS.Jadwal_pengerjaan.EditPerMesin');
    }
    public function EditPerOrder() {
        return view('workshop.GPS.Jadwal_pengerjaan.EditPerOrder');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
