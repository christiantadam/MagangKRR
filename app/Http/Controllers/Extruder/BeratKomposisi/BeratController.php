<?php

namespace App\Http\Controllers\Extruder\BeratKomposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeratController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.BeratKomposisi.' . $form_name;
        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
        ];

        return view($view_name, $view_data);
    }

    public function beratStandar($fun_str, $fun_data)
    {
        $param_data = explode('~', $fun_data);

        switch ($fun_str) {
            case 'SP_7775_PBL_SELECT_WOVEN':
            case 'SP_1273_PRG_CEK_KOMPOSISI_1':
            case 'SP_1003_PBL_SELECT_JUMBO':
            case 'SP_1273_BCD_DATA_ADSTAR':
            case 'SP_1273_BCD_DATA_CIRCULAR':
                $param_str = '@KD_BRG = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_7775_PBL_UPDATE_BERAT_WOVEN':
                $param_str = '@KD_BRG = ?, @ket = ?, @brt_karung = ?, @brt_inner = ?, @brt_lami = ?, @brt_lain = ?, @brt_total = ?, @UserId = ?';
                $param_data[1] = str_replace('-', '/', $param_data[1]); // @ket
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1003_PBL_UPDATE_BERAT_JUMBO_1':
                $param_str = '@KD_BRG = ?, @ket = ?, @brt_cloth = ?, @brt_inner = ?, @brt_lami = ?, @brt_conductive = ?, @brt_total = ?, @UserId = ?';
                $param_data[1] = str_replace('-', '/', $param_data[1]); // @ket
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_BCD_UPDATE_BERAT_ADSTAR':
                $param_str = '@KD_BRG = ?, @ket = ?, @brt_cloth = ?, @brt_lami = ?, @brt_kertas = ?, @brt_total = ?, @UserId = ?';
                $param_data[1] = str_replace('-', '/', $param_data[1]); // @ket
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_BCD_UPDATE_BERAT_CIRCULAR':
                $param_str = '@KD_BRG = ?, @ket = ?, @brt_karung = ?, @brt_reinforced = ?, @brt_lami = ?, @brt_conductive = ?, @brt_total = ?, @UserId = ?';
                $param_data[1] = str_replace('-', '/', $param_data[1]); // @ket
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            default:
                dd("SP tidak ditemukan.");
                break;
        }
    }

    private function executeSP($action_str, $sp_str, $param_str, $param_data)
    {
        if ($action_str == 'statement') {
            return DB::connection('ConnPurchase')->statement(
                'exec ' . $sp_str . ' ' . $param_str,
                $param_data
            );
        } else if ($action_str == 'select') {
            return DB::connection('ConnPurchase')->select(
                'exec ' . $sp_str . ' ' . $param_str,
                $param_data
            );
        }
    }
}
