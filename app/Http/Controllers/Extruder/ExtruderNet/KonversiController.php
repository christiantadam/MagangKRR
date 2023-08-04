<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonversiController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'nama form disini':
                $form_data = [];
                break;

            default:
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        // dd($this->getDetailKonversi("KONV0002"));

        return view($view_name, $view_data);
    }

    #region Konversi - Permohonan
    public function getListKomposisi($id_komposisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_KOMPOSISI_BAHAN @idkomposisi = ?',
            [$id_komposisi]
        );

        // PARAMETER @idkomposisi char(9)
        // TABLE Extruder - MasterKomposisi, KomposisiBahan; Inventory - Type
        // *ambil data dengan pada Tabel Type yang Nonaktif = 'Y'
    }

    public function getSatuan($id_type)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_GET_SATUAN @idtype = ?',
            [$id_type]
        );

        // PARAMETER @idtype varchar(20)
        // TABLE Inventory - Satuan, Type
    }

    public function getSaldoBarang($id_type)
    {
        return DB::connection('ConnInventory')->select(
            'exec SP_5298_EXT_SALDO_BARANG @idtype = ?',
            [$id_type]
        );

        // PARAMETER @idtype char(20)
        // TABLE Inventory - Type, Satuan
    }

    public function getDataKonversi($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_DATA_KONVERSI @idkonversi = ?',
            [$id_konversi]
        );

        // PARAMETER @idkonversi varchar(14)
        // TABLE Extruder - MasterKonversiEXT, MasterKomposisi, OrderMasterEXT, MasterMesin, OrderDetailEXT
    }

    public function getDetailKonversi($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_DETAIL_KONVERSI_1 @idkonversi = ?',
            [$id_konversi]
        );

        // PARAMETER @idkonversi varchar(14)
        // TABLE Extruder - DetailKonversiEXT, MasterKonversiEXT, KomposisiBahan, MasterKomposisi
    }

    public function insTmpTransaksi($id_type_transaksi, $uraian_detail_transaksi, $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $asal_sub_kel, $id_konversi)
    { // BELUM DI TES
        $sp_str = '';

        if ($uraian_detail_transaksi == 'asal_konversi') {
            $sp_str = 'SP_5298_EXT_INSERT_04_ASALTMPTRANSAKSI';
        } else if ($uraian_detail_transaksi == 'tujuan_konversi') {
            $sp_str = 'SP_5298_EXT_INSERT_04_TUJUANTMPTRANSAKSI';
        }

        return DB::connection('ConnInventory')->statement(
            'exec ' . $sp_str . ' @XIdTypeTransaksi = ?, @XUraianDetailTransaksi = ?, @XIdType = ?, @XIdPemohon = ?, @XsaatAwalTransaksi = ?, @XJumlahKeluarPrimer = ?, @XJumlahKeluarSekunder = ?, @XJumlahKeluarTritier = ?, @XAsalSubKel = ?, @XIdKonversi = ?',
            [$id_type_transaksi, ucwords(str_replace('_', ' ', $uraian_detail_transaksi)), $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $asal_sub_kel, $id_konversi]
        );

        // PARAMETER @xidtypetransaksi char(2), @xuraiandetailtransaksi varchar(50), @xidtype varchar(20), @xidpemohon char(7), @xsaatawaltransaksi datetime, @xjumlahkeluarprimer numeric(15,2), @xjumlahkeluarsekunder numeric(15,2), @xjumlahkeluartritier numeric(15,2), @xasalsubkel char(6), @xidkonversi char(9)
        // TABLE Inventory - Tmp_Transaksi
    }
    #endregion
}
