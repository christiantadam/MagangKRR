<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ABM extends Controller
{
    public function Schedule()
    {
        return view('BarcodeKerta2.Schedule');
    }

    public function BuatBarcode()
    {
        return view('BarcodeKerta2.BuatBarcode');
    }

    public function Repress()
    {
        return view('BarcodeKerta2.Repress');
    }

    public function CBR()
    {
        return view('BarcodeKerta2.CBR');
    }

    public function HanguskanBarcode()
    {
        return view('BarcodeKerta2.HanguskanBarcode');
    }

    public function KirimGudang()
    {
        return view('BarcodeKerta2.KirimGudang');
    }

    public function BatalKirim()
    {
        return view('BarcodeKerta2.BatalKirim');
    }

    public function CekBarcode()
    {
        return view('BarcodeKerta2.CekBarcode');
    }

    public function CSJ()
    {
        return view('BarcodeKerta2.CSJ');
    }
    
    public function TotalBarcode()
    {
        return view('BarcodeKerta2.TotalBarcode');
    }

    //========================================================

    public function BuatBarcode2()
    {
        return view('BarcodeRollWoven.BuatBarcode2');
    }

    public function BRS()
    {
        return view('BarcodeRollWoven.BRS');
    }

    public function BBJ()
    {
        return view('BarcodeRollWoven.BBJ');
    }

    public function CBR2()
    {
        return view('BarcodeRollWoven.CBR2');
    }

    public function HanguskanBarcode2()
    {
        return view('BarcodeRollWoven.HanguskanBarcode2');
    }

    public function KirimGudang2()
    {
        return view('BarcodeRollWoven.KirimGudang2');
    }

    public function KirimCircular()
    {
        return view('BarcodeRollWoven.KirimCircular');
    }

    public function BatalKirim2()
    {
        return view('BarcodeRollWoven.BatalKirim2');
    }

    public function Repress2()
    {
        return view('BarcodeRollWoven.Repress2');
    }

    public function CekBarcode2()
    {
        return view('BarcodeRollWoven.CekBarcode2');
    }

    public function Penghanguskan()
    {
        return view('BarcodeRollWoven.Penghanguskan');
    }

    public function SettingTimbangan()
    {
        return view('BarcodeRollWoven.SettingTimbangan');
    }

    public function MSD()
    {
        return view('BarcodeRollWoven.MSD');
    }
}
