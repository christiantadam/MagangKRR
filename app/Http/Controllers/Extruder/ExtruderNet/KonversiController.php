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
            case 'formTropodoKonversiMohon':
                $form_data = [
                    'listKonversi' => $this->getListKonversi('EXT'),
                    'listMesin' => $this->getListMesin(1),
                    'listNoOrder' => $this->getOrdAccBlmSelesai('EXT'),
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

        // dd($this->getListKomposisi(1, 'mes01'));

        return view($view_name, $view_data);
    }

    #region Konversi - Permohonan
    public function getListKomposisiBahan($id_komposisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_KOMPOSISI_BAHAN @idkomposisi = ?',
            [$id_komposisi]
        );

        // PARAMETER @idkomposisi char(9)
        // TABLE Extruder - MasterKomposisi
        // FK TABLE Extruder - IdKomposisi(KomposisiBahan), Inventory - IdType(Type)
        // WHERE Type.Nonaktif = 'Y' AND KomposisiBahan.IdKomposisi = @IdKomposisi
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
        // TABLE Extruder - MasterKonversiEXT
        // FK TABLE - MasterKomposisi(IdKomposisi), OrderMasterEXT(IdOrder), OrderDetailEXT(IdOrder), MasterMesin(IdMesin)
    }

    public function getDetailKonversi($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_DETAIL_KONVERSI_1 @idkonversi = ?',
            [$id_konversi]
        );

        // PARAMETER @idkonversi varchar(14)
        // TABLE Extruder - DetailKonversiEXT
        // FK TABLE Extruder - MasterKonversiEXT(IdKonversi), KomposisiBahan(IdType), MasterKomposisi(IdKomposisi)
    }

    public function getNoKonversiMaster($kode = null)
    {
        try {
            $divisi = $kode != null
                ? 'DEX'
                : 'EXT';

            $counter = DB::connection('ConnExtruder')
                ->table('CounterTrans')
                ->where('Divisi', $divisi)
                ->value(DB::raw('IdKonversi + 1'));

            $id = '0000000000' . str_pad($counter, 9, '0', STR_PAD_LEFT);
            $id = $divisi . '-' . substr($id, -10);

            return response()->json(['NoKonversi' => $id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // *Query SELECT pada SP_5298_EXT_INSERT_MASTER_KONVERSI
    }

    public function getNoKonversiCounter()
    {
        try {
            $a = DB::connection('ConnExtruder')->select('SELECT IdKonversi FROM counter')[0]->IdKonversi;

            $XIdKonversi = '0000000000' . str_pad($a, 9, '0', STR_PAD_LEFT);
            $XIdKonversi = 'DEX-' . substr($XIdKonversi, -10);

            return response()->json(['NoKonversi' => $XIdKonversi]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // *Query SELECT pada SP_5298_EXT_LIST_COUNTER
    }

    public function getListKonversi($id_divisi, $kode = null, $datetime = null)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_KONVERSI @Kode = ?, @iddivisi = ?, @Tanggal = ?',
            [$kode, $id_divisi, $datetime]
        );

        // PARAMETER @Kode int=null, @iddivisi char(3), @Tanggal datetime=null
        // TABLE Extruder - MasterKonversiEXT
        // FK TABLE Extruder - MasterKomposisi(IdKomposisi), MasterMesin(IdMesin) OrderMasterEXT(IdOrder), OrderDetailEXT(IdOrder)
    }

    public function getIdKonversiInv($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_IDKONVERSI_INV @idkonversi = ?',
            [$id_konversi]
        );

        // PARAMETER @idkonversi varchar(14)
        // TABLE Extruder - DetailKonversiEXT
        // FK TABLE Extruder - MasterKonversiEXT
    }

    public function getListMesin($kode)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_MESIN @kode = ?',
            [$kode]
        );

        // PARAMETER @kode integer
        // TABLE Extruder - MasterMesin
    }

    public function getOrdAccBlmSelesai($divisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_ORDER_ACC_BLM_SELESAI @divisi = ?',
            [$divisi]
        );

        // PARAMETER @Divisi char(3)
        // TABLE Extruder - OrderMasterEXT
        // FK TABLE Extruder - OrderDetailEXT(IdOrder)
    }

    public function getListKomposisi($kode, $id_mesin)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_KOMPOSISI @kode = ?, @idmesin = ?',
            [$kode, $id_mesin]
        );

        // PARAMETER @Kode char(1), @idmesin varchar(5)
        // TABLE Extruder - MasterKomposisi
    }

    public function getListSpek($id_order)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_SPEK_ORDER @idorder = ?',
            [$id_order]
        );

        // PARAMETER @idorder varchar(10)
        // TABLE Extruder - OrderDetailEXT
    }

    public function insTmpTransaksi($id_type_transaksi, $uraian_detail_transaksi, $id_type, $id_pemohon, $saat_awal_transaksi, $jumlah_keluar_primer, $jumlah_keluar_sekunder, $jumlah_keluar_tritier, $asal_sub_kel, $id_konversi)
    {
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
        // FK TABLE Inventory - Type, TypeTransaksi
    }

    public function insDetailKonv($id_konversi, $id_type, $jumlah_primer, $jumlah_sekunder, $jumlah_tritier, $presentase = 0, $id_konversi_inv)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5409_EXT_INSERT_DETAILKONVERSI @IdKonversi = ?, @IdType = ?, @JumlahPrimer = ?, @JumlahSekunder = ?, @JumlahTritier = ?, @Persentase = ?, @idKonversiInv = ?',
            [$id_konversi, $id_type, $jumlah_primer, $jumlah_sekunder, $jumlah_tritier, $presentase, $id_konversi_inv]
        );

        // PARAMETER @IdKonversi varchar(14), @IdType varchar(20), @JumlahPrimer numeric(9,2), @JumlahSekunder numeric(9,2), @JumlahTritier numeric(9,2), @Persentase numeric(9,2)=0, @idKonversiInv varchar(9)
        // TABLE Extruder - DetailHistoryKonversi, DetailKonversiEXT
        // FK TABLE Extruder - MasterKonversiEXT
    }

    public function insMasterKonv($tgl, $shift, $awal, $akhir, $mesin, $denier, $warna, $lot_number, $id_order, $no_urut, $jam1, $jam2, $user, $kode = null)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_MASTER_KONVERSI @tgl = ?, @shift = ?, @awal = ?, @akhir = ?, @mesin = ?, @ukuran = ?, @denier = ?, @warna = ?, @lotNumber = ?, @idOrder = ?, @noUrut = ?, @idKomp = ?, @jam1 = ?, @jam2 = ?, @user = ?, @kode = ?',
            [$tgl, $shift, $awal, $akhir, $mesin, $denier, $warna, $lot_number, $id_order, $no_urut, $jam1, $jam2, $user, $kode]
        );

        // PARAMETER @tgl datetime, @shift char(2), @awal datetime, @akhir datetime, @mesin char(5), @ukuran numeric(9,2), @denier numeric(9,2), @warna varchar(10), @lotNumber varchar(9), @idOrder varchar(10), @noUrut int, @idKomp char(9), @jam1 datetime, @jam2 datetime, @user char(7), @kode char(1) = null
        // TABLE Extruder - MasterKonversiEXT, CounterTrans
        // *fungsi terkait - getNoKonversiMaster()
    }

    public function updListCounter()
    {
        return DB::connection('ConnExtruder')->statement('exec SP_5298_EXT_LIST_COUNTER', []);
        // TABLE Inventory - Counter
        // *fungsi terkait - getNoKonversiCounter()
    }

    public function updMasterKonversi($tgl, $shift, $awal, $akhir, $ukuran, $denier, $warna, $lot_number, $jam1, $jam2, $id_konv)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5409_EXT_UPDATE_MASTER_KONVERSI @tgl = ?, @shift = ?, @awal = ?, @akhir = ?, @ukuran = ?, @denier = ?, @warna = ?, @lotNumber = ?, @jam1 = ?, @jam2 = ?, @idkonv = ?',
            [$tgl, $shift, $awal, $akhir, $ukuran, $denier, $warna, $lot_number, $jam1, $jam2, $id_konv]
        );
        // PARAMETER @tgl datetime, @shift char(2), @awal datetime, @akhir datetime, @ukuran numeric(9,2), @denier numeric(9,2), @warna varchar(10), @lotNumber varchar(9), @jam1 datetime, @jam2 datetime, @idkonv char(14)
        // TABLE Extruder - MasterKonversiEXT
        // FK TABLE Extruder - MasterJadwalProduksi(IdJadwalProduksi), MasterKomposisi(IdKomposisi), OrderMasterEXT(IdOrder)
    }

    public function delDetailKonversi($id_konversi, $id_konv_inv)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5409_EXT_DELETE_DETAIL_KONVERSI @idkonversi = ?, @idkonvInv = ?',
            [$id_konversi, $id_konv_inv]
        );
        // PARAMETER @idkonversi varchar(14), @idkonvInv varchar(9)
        // TABLE Extruder - DetailKonversiEXT
        // FK TABLE Extruder - MasterKonversiEXT
    }

    public function delKonversi($id_konversi)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5409_EXT_DELETE_KONVERSI @idkonversi = ?',
            [$id_konversi]
        );
        // PARAMETER @idkonversi varchar(14)
        // TABLE Extruder - DetailKonversiEXT
    }
    #endregion
}
