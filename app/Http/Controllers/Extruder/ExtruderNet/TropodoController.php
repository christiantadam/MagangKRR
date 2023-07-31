<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TropodoController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formTropodoOrderMaintenance':
                $form_data = [
                    'listBenang' => $this->getListBenang(2),
                ];
                break;
            case 'formTropodoOrderACC':
                $form_data = [
                    'listOrderBlmAcc' => $this->getOrderBlmAcc('EXT'),
                ];
                break;

            default:
                # code...
                break;
        }

        // dd($form_data);

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        return view($view_name, $view_data);
    }

    #region Order - Maintenance
    public function getListBenang($kode)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_BENANG @kode = ?',
            [$kode]
        );

        // SP_5298_EXT_LIST_BENANG : PARAMETER @kode int
        // TABLE Inventory - Objek, KelompokUtama, Divisi, Satuan, Type, Sub-Kelompok, Kelompok
        // RETURN NamaType, SatPrimer, SatSekunder, SatTritier
        // *ambil data Type dengan IdSubKelompok yang punya IdKelompokUtama '0121' atau '2481'
    }

    public function insOrderBenang($tanggal, $identifikasi = null, $user, $kode = null)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_ORDER_BENANG @tanggal = ?, @identifikasi = ?, @user = ?, @kode = ?',
            [$tanggal, $identifikasi, $user, $kode]
        );

        // SP_5298_EXT_INSERT_ORDER_BENANG
        // PARAMETER @tanggal datetime, @identifikasi varchar(100) = null, @user char(7), @kode char(1) = null
        // INSERT : TABLE OrderMasterEXT
        // RETURN NoOrder : TABLE CounterTrans
    }

    public function insOrderDetail($id_order, $type_benang, $jmlh_primer, $jmlh_sekunder, $jmlh_tersier, $prod_primer, $prod_sekunder, $prod_tersier)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_ORDERDETAIL_BENANG @idorder = ?, @typebenang = ?, @jumlahprimer = ?, @jumlahsekunder = ?, @jumlahtritier = ?, @jumprodprimer = ?, @jumprodsekunder = ?, @jumprodtritier = ?',
            [$id_order, $type_benang, $jmlh_primer, $jmlh_sekunder, $jmlh_tersier, $prod_primer, $prod_sekunder, $prod_tersier]
        );

        // SP_5298_EXT_INSERT_ORDERDETAIL_BENANG
        // PARAMETER @idorder varchar(10), @typebenang varchar(100), @jumlahprimer numeric(9,2), @jumlahsekunder numeric(9,2), @jumlahtritier numeric(9,2), @jumprodprimer numeric(9,2), @jumprodsekunder numeric(9,2),	@jumprodtritier numeric(9,2)
        // INSERT : TABLE OrderDetailEXT
    }

    public function updCounterOrder($id_divisi)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_UPDATE_COUNTER_ORDER @iddivisi = ?',
            [$id_divisi]
        );

        // SP_5298_EXT_UPDATE_COUNTER_ORDER : PARAMETER @iddivisi varchar(3)
        // UPDATE : TABLE CounterTrans
    }
    #endregion

    #region Order - ACC
    public function getOrderBlmAcc($divisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_ORDER_BLM_ACC @divisi = ?',
            [$divisi]
        );

        // SP_5298_EXT_ORDER_BLM_ACC : PARAMETER @divisi char(3)
        // RETURN IdOrder, Identifikasi : TABLE OrderMasterEXT
    }
    #endregion
}
