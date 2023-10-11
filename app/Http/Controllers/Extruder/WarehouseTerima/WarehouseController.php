<?php

namespace App\Http\Controllers\Extruder\WarehouseTerima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.WarehouseTerima.' . $form_name;
        $view_data = [
            'pageName' => 'WarehouseTerima',
            'formName' => $form_name,
        ];

        return view($view_name, $view_data);
    }

    public function warehouseTerima($fun_str, $fun_data)
    {
        $param_data = explode('~', $fun_data);
        switch ($fun_str) {
            case 'SP_5409_INV_CekBarcodeKirimGudang':
                $param_str = '@kodebarang = ?, @noindeks = ?, @statusdispresiasi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_5409_INV_SimpanPenerimaanAwalGudang': // ditemukan query select juga
            case 'SP_5409_INV_SimpanPenerimaanAwalGudang2':
                $param_str = '@kodebarang = ?, @noindeks = ?';
                if ($fun_str == 'SP_5409_INV_SimpanPenerimaanAwalGudang') {
                    $action_str = 'statement';
                } else $action_str = 'select';
                return $this->executeSP($action_str, $fun_str, $param_str, $param_data);

            case 'SP_5409_INV_SimpanPenerimaanAwalGudang': // ditemukan query select juga
                $param_str = '@kode_barang = ?, @item_number = ?, @Divisi = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_ACCGUDANG_BARCODEMOJOSARI': // ditemukan query select juga
                $param_str = '@Tanggal = ?, @Uraian = ?, @JumlahKeluarPrimer = ?, @JumlahKeluarSekunder = ?, @JumlahKeluarTritier = ?, @IdType = ?, @IdPemberi = ?, @user_id = 4384, @Divisi = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_ListBarcodeTerimaBahanBaku': // ditemukan query select juga
                $param_str = '@status = ?, @Divisi = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1003_INV_UserDivisi':
                $param_str = '@XKdUser = 4384';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_ListBarcodeTerimaBahanBaku':
                $param_str = '@status = ?, @Divisi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_CekBarcodeGelondonganMojosari':
                $param_str = '@kodebarang = ?, @noindeks = ?, @typetrans = ?, @typetrans1 = ?, @typetrans2 = ?, @typetrans3 = ?, @Divisi = ?, @statusdispresiasi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_TampilGelondongan_Mojo':
                $param_str = '@kode_barang = ?, @noindeks = ?, @Divisi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'Sp_Jam_Server':
                $param_str = '';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_SimpanPermohonanKirimMojosari':
                $param_str = '@kode_barang = ?, @noindeks = ?, @Divisi = ?, @status = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_ListBarcodeBahanBaku':
                $param_str = '@status = ?, @iddivisi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_LMT_SimpanPembatalanKirimKeGudang':
                $param_str = '@kodebarang = ?, @noindeks = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            default:
                dd("SP tidak ditemukan.");
                break;
        }
    }

    private function executeSP($action_str, $sp_str, $param_str, $param_data)
    {
        if ($action_str == 'statement') {
            return DB::connection('ConnInventory')->statement(
                'exec ' . $sp_str . ' ' . $param_str,
                $param_data
            );
        } else if ($action_str == 'select') {
            return DB::connection('ConnInventory')->select(
                'exec ' . $sp_str . ' ' . $param_str,
                $param_data
            );
        }
    }
}
