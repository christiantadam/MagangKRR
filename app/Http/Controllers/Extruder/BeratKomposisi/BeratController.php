<?php

namespace App\Http\Controllers\Extruder\BeratKomposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeratController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.BeratKomposisi.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formBeratWoven':
                $current_date = Carbon::now();
                $formatted_date = $current_date->format('Y-m-d');

                $form_data = [
                    'listNomor' => $this->getKoreksiSortirNGBlmAcc($formatted_date),
                    'listKelut' => $this->getKelompokUtama_IdObjek('032', '3'),
                ];
                break;

            default:
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        return view($view_name, $view_data);
    }

    #region Berat Woven
    public function beratWoven($fun_str, $fun_data)
    {
        switch ($fun_str) {
            case 'SP_7775_PBL_SELECT_WOVEN':
                return $this->getSelectWoven($fun_str, $fun_data);

            case 'SP_1273_PRG_CEK_KOMPOSISI_1':
                return $this->getCekKomposisi($fun_str, $fun_data);

            case 'SP_7775_PBL_UPDATE_BERAT_WOVEN':
                return $this->updBeratWoven($fun_str, $fun_data);

            default:
                dd("SP tidak ditemukan.");
                break;
        }
    }

    private function updBeratWoven($fun_str, $fun_data)
    {
        $data = explode('~', $fun_data);
        $data[1] = str_replace('-', '/', $data[1]); // @ket

        return DB::connection('ConnPurchase')->statement(
            'exec ' . $fun_str . ' @KD_BRG = ?, @ket = ?, @brt_karung = ?, @brt_inner = ?, @brt_lami = ?, @brt_lain = ?, @brt_total = ?, @UserId = ?',
            $data
        );

        // @KD_BRG CHAR(9), @ket VARCHAR(100), @brt_karung numeric(10,2), @brt_inner numeric(10,2), @brt_lami numeric(10,2), @brt_lain numeric(10,2), @brt_total numeric(10,2),  @UserId char(4)
    }

    private function getCekKomposisi($fun_str, $fun_data)
    {
        return DB::connection('ConnPurchase')->select(
            'exec ' . $fun_str . ' @KD_BRG = ?',
            explode('~', $fun_data)
        );

        // @KD_BRG CHAR(9)
    }

    private function getSelectWoven($fun_str, $fun_data)
    {
        return DB::connection('ConnPurchase')->select(
            'exec ' . $fun_str . ' @KD_BRG = ?',
            explode('~', $fun_data)
        );

        // @KD_BRG CHAR(9)
    }
    #endregion
}
