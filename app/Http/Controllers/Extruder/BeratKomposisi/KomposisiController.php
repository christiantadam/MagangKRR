<?php

namespace App\Http\Controllers\Extruder\BeratKomposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomposisiController extends Controller
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

    public function komposisiKonversi($fun_str, $fun_data)
    {
        $param_data = explode('~', $fun_data);
        // dd($param_data);
        // dd(count($param_data));

        switch ($fun_str) {
            case 'SP_1273_ABM_BERAT_STANDART_1':
            case 'SP_1273_PRG_DATA_KOMPOSISI_1':
                $param_str = '@KD_BRG = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_PRG_UPDATE_KOMPOSISI_KONVERSI_1':
                $param_str = '@KD_BRG = ?, @PP = ?, @PE = ?, @CaCO3 = ?, @Masterbatch = ?, @UV = ?, @AntiStatic = ?, @Conductive = ?, @LDPE = ?, @LLDPE = ?, @HDPE = ?, @UserId = 4384';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_PRG_ListKonversi_1~1':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 1';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_PRG_ListKonversi_1~2':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 2, @KodeBarang = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_PRG_UPDATE_KONVERSI_1':
                $param_str = '@Kode = ?, @KodeBarang = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_Cek_KonversiKomposisi_1~1':
            case 'SP_1273_INV_Cek_KonversiKomposisi_1~2':
            case 'SP_1273_INV_Cek_KonversiKomposisi_1~4':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = ' . explode('~', $fun_str)[1] . ', @KodeBarang = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_Cek_KonversiKomposisi_1~3':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 3, @Tanggal = ?, @NoKonversi = ?, @UserId = 4384';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_Insert_KonversiKomposisi_1~1':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 1, @Tanggal = ?, @NoKonversi = ?, @KodeBarang = ?, @BeratStandart = ?, @JenisBarang = ?, @Terkandung = ?, @Waste = ?, @PP = ?, @PE = ?, @CaCO3 = ?, @Masterbatch = ?, @UV = ?, @AntiStatic = ?, @Conductive = ?, @LDPELami = ?, @LLDPEInner = ?, @HDPEInner = ?, @PersenPP = ?, @PersenPE = ?, @PersenCaCO3 = ?, @PersenMB = ?, @PersenUV = ?, @PersenAS = ?, @PersenConductive = ?, @PersenLDPE = ?, @PersenLLDPE = ?, @PersenHDPE = ?, @KoefPP = ?, @KoefPE = ?, @KoefCaCO3 = ?, @KoefMB = ?, @KoefUV = ?, @KoefAS = ?, @KoefConductive = ?, @KoefLDPE = ?, @KoefLLDPE = ?, @KoefHDPE = ?, @TglLoading = ?, @UserId = 4384';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_Insert_KonversiKomposisi_1~2':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 2, @Tanggal = ?, @NoKonversi = ?, @PP = ?, @PE = ?, @CaCO3 = ?, @Masterbatch = ?, @UV = ?, @AntiStatic = ?, @Conductive = ?, @LDPELami = ?, @LLDPEInner = ?, @HDPEInner = ?, @PersenPP = ?, @PersenPE = ?, @PersenCaCO3 = ?, @PersenMB = ?, @PersenUV = ?, @PersenAS = ?, @PersenConductive = ?, @PersenLDPE = ?, @PersenLLDPE = ?, @PersenHDPE = ?, @KoefPP = ?, @KoefPE = ?, @KoefCaCO3 = ?, @KoefMB = ?, @KoefUV = ?, @KoefAS = ?, @KoefConductive = ?, @KoefLDPE = ?, @KoefLLDPE = ?, @KoefHDPE = ?, @TglLoading = ?, @UserId = 4384';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_Insert_KonversiKomposisi_1~3':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 3, @Tanggal = ?, @NoKonversi = ?, @UserId = 4384';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_Insert_KonversiKomposisi_1~4':
                $fun_str = explode('~', $fun_str)[0];
                $param_str = '@Kode = 4, @Tanggal = ?, @NoKonversi = ?, @TglLoading = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_PRG_DATA_BarangEksport_1':
                $param_str = '@KodeBarang = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

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
