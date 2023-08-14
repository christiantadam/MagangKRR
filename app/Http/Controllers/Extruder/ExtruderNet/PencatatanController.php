<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PencatatanController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'nama form di sini':
                $form_data = ['nama list' => $this->fungsi()];
                break;

            default:
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        // dd($this->getOrderBlmAcc('EXT'));

        return view($view_name, $view_data);
    }

    #region Gangguan Produksi

    #endregion
}
