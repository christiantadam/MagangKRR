<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formOrderMaintenance':
                $form_data = ['listBenang' => $this->getListBenang(2)];
                break;
            case 'formOrderACC':
                $form_data = ['listOrderBlmAcc' => $this->getOrderBlmAcc('EXT')];
                break;
            case 'formOrderStatus':
                $form_data = ['listBatalOrder' => $this->getListBatalOrd('EXT')];
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

    #region Order - Maintenance
    public function getListBenang($kode)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_BENANG @kode = ?',
            [$kode]
        );
    }

    public function getNoOrder($kode = null)
    {
        $divisi = $kode == 'D'
            ? 'DEX'
            : 'EXT';

        $mCounterResult = DB::connection('ConnExtruder')
            ->select('SELECT IdOrder + 1 AS mCounter FROM CounterTrans WHERE divisi = ?', [$divisi]);

        $mCounter = $mCounterResult[0]->mCounter;
        $mCode = '000000000' . $mCounter;
        $mCode = $divisi . substr($mCode, -7);

        return response()->json(['NoOrder' => $mCode]);

        // *Query SELECT pada SP_5298_EXT_INSERT_ORDER_BENANG
    }

    public function insOrderBenang($tanggal, $identifikasi = null, $user, $kode = null)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_ORDER_BENANG @tanggal = ?, @identifikasi = ?, @user = ?, @kode = ?',
            [$tanggal, $identifikasi, $user, $kode]
        );
    }

    public function insOrderDetail($id_order, $type_benang, $jmlh_primer, $jmlh_sekunder, $jmlh_tersier, $prod_primer, $prod_sekunder, $prod_tersier)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_ORDERDETAIL_BENANG @idorder = ?, @typebenang = ?, @jumlahprimer = ?, @jumlahsekunder = ?, @jumlahtritier = ?, @jumprodprimer = ?, @jumprodsekunder = ?, @jumprodtritier = ?',
            [$id_order, strtoupper(str_replace('_', ' ', $type_benang)), $jmlh_primer, $jmlh_sekunder, $jmlh_tersier, $prod_primer, $prod_sekunder, $prod_tersier]
        );
    }

    public function updCounterOrder($id_divisi)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_UPDATE_COUNTER_ORDER @iddivisi = ?',
            [$id_divisi]
        );
    }
    #endregion

    #region Order - ACC
    public function getOrderBlmAcc($divisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_ORDER_BLM_ACC @divisi = ?',
            [$divisi]
        );
    }

    public function getListSpek($id_order)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_SPEK_ORDER_1 @idorder = ?',
            [$id_order]
        );
    }

    public function updAccOrder($id_order, $user_acc)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_ACC_ORDER @idorder = ?, @useracc = ?',
            [$id_order, $user_acc]
        );
    }
    #endregion

    #region Order - Status
    public function getListBatalOrd($id_divisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_BATAL_ORDER @iddivisi = ?',
            [$id_divisi]
        );
    }

    public function getListOrderBtl($id_order)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_ORDER_BATAL @idorder = ?',
            [$id_order]
        );
    }

    public function updStatusOrder($id_order, $status, $ket)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_STATUS_ORDER @idorder = ?, @status = ?, @ket = ?',
            [$id_order, $status, strtoupper(str_replace('_', ' ', $ket))]
        );
    }
    #endregion
}
