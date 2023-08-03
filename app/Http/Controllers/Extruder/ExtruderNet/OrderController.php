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
            case 'formTropodoOrderMaintenance':
                $form_data = ['listBenang' => $this->getListBenang(2)];
                break;
            case 'formTropodoOrderACC':
                $form_data = ['listOrderBlmAcc' => $this->getOrderBlmAcc('EXT')];
                break;
            case 'formTropodoOrderStatus':
                $form_data = [
                    'listBatalOrder' => $this->getListBatalOrd('EXT'),
                ];

            default:
                break;
        }

        // dd($this->getListSpek("EXT0001002"));

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

        // PARAMETER @kode int
        // TABLE Inventory - Objek, KelompokUtama, Divisi, Satuan, Type, Sub-Kelompok, Kelompok
        // SELECT : NamaType, SatPrimer, SatSekunder, SatTritier
        // *ambil data Type dengan IdSubKelompok yang punya IdKelompokUtama '0121' atau '2481'
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

        // PARAMETER @tanggal datetime, @identifikasi varchar(100) = null, @user char(7), @kode char(1) = null
        // INSERT : TABLE OrderMasterEXT
    }

    public function insOrderDetail($id_order, $type_benang, $jmlh_primer, $jmlh_sekunder, $jmlh_tersier, $prod_primer, $prod_sekunder, $prod_tersier)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_ORDERDETAIL_BENANG @idorder = ?, @typebenang = ?, @jumlahprimer = ?, @jumlahsekunder = ?, @jumlahtritier = ?, @jumprodprimer = ?, @jumprodsekunder = ?, @jumprodtritier = ?',
            [$id_order, strtoupper(str_replace('_', ' ', $type_benang)), $jmlh_primer, $jmlh_sekunder, $jmlh_tersier, $prod_primer, $prod_sekunder, $prod_tersier]
        );

        // PARAMETER @idorder varchar(10), @typebenang varchar(100), @jumlahprimer numeric(9,2), @jumlahsekunder numeric(9,2), @jumlahtritier numeric(9,2), @jumprodprimer numeric(9,2), @jumprodsekunder numeric(9,2),	@jumprodtritier numeric(9,2)
        // INSERT : TABLE OrderDetailEXT
    }

    public function updCounterOrder($id_divisi)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_UPDATE_COUNTER_ORDER @iddivisi = ?',
            [$id_divisi]
        );

        // PARAMETER @iddivisi varchar(3)
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

        // PARAMETER @divisi char(3)
        // SELECT : OrderMasterEXT - IdOrder, Identifikasi
    }

    public function getListSpek($id_order)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_SPEK_ORDER_1 @idorder = ?',
            [$id_order]
        );

        // PARAMETER @idorder varchar(10)
        // SELECT : OrderDetailEXT - *
    }

    public function updAccOrder($id_order, $user_acc)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_ACC_ORDER @idorder = ?, @useracc = ?',
            [$id_order, $user_acc]
        );

        // PARAMETER @idorder varchar(10), @useracc char(4)
        // UPDATE : TABLE OrderMasterExt
    }
    #endregion

    #region Order - Status
    public function getListBatalOrd($id_divisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_BATAL_ORDER @iddivisi = ?',
            [$id_divisi]
        );

        // PARAMETER @iddivisi char(3)
        // SELECT : OrderMasterEXT - IdOrder, TanggalOrder, Identifikasi
        // OrderDetailEXT - TglSelesai, SaatLog
    }

    public function getListOrderBtl($id_order)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_ORDER_BATAL @idorder = ?',
            [$id_order]
        );

        // PARAMETER @idorder varchar(10)
        // SELECT : OrderMasterEXT - IdOrder, TanggalOrder, Identifikasi, SaatLog
        // OrderDetailEXT - TypeBenang, JumlahPrimer, JumlahSekunder, JumlahTritier, JumlahProduksiPrimer, JumlahProduksiSekunder, Jumlah ProduksiTritier, TglSelesai, StatusOrder
    }

    public function updStatusOrder($id_order, $status, $ket)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_STATUS_ORDER @idorder = ?, @status = ?, @ket = ?',
            [$id_order, $status, strtoupper(str_replace('_', ' ', $ket))]
        );

        // PARAMETER @idorder varchar(10), @status varchar(30), @ket varchar(50)
        // UPDATE : OrderDetailEXT
    }
    #endregion
}
