<?php

namespace App\Http\Controllers\Extruder\ExtruderNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PencatatanController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.ExtruderNet.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formCatatGangguan':
                $form_data = [
                    'listMesin' => $this->getListMesin(1),
                    'listGangguan' => $this->getListGangguan(),
                ];
                break;
            case 'formCatatDaya':
                $form_data = ['listMesin' => $this->getListMesin(1)];
                break;

            default:
                break;
        }

        $view_data = [
            'pageName' => 'ExtruderNet',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        // dd($this->getListGangguanProd(8, 2023));

        return view($view_name, $view_data);
    }

    #region Daya Produksi
    public function getFaktorKali($id_mesin)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_FAKTOR_KALI @idmesin = ?',
            [$id_mesin]
        );

        // @idmesin  varchar(5)
    }

    public function getKwahMesinPerbulan($bulan, $tahun)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_KWAH_MESIN_PERBULAN @bulan = ?, @tahun = ?',
            [$bulan, $tahun]
        );

        // @bulan  varchar(2), @tahun varchar(4)
    }

    public function insKwahMesin($tanggal, $id_mesin, $jam, $counter, $kali, $jam_user, $user)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_KWAH_MESIN @tanggal = ?, @idmesin = ?, @jam = ?, @counter = ?, @kali = ?, @jamuser = ?, @user = ?',
            [$tanggal, $id_mesin, $jam, $counter, $kali, $jam_user, $user]
        );

        // @tanggal  datetime, @idmesin  varchar(5), @jam datetime, @counter  numeric(10,2), @kali  numeric(10,2), @jamuser datetime, @user  varchar(7)
    }

    public function updKwahMesin($id_kwah_mesin, $counter)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_UPDATE_KWAH_MESIN @idkwahmesin = ?, @counter = ?',
            [$id_kwah_mesin, $counter]
        );

        // @IdKWaHMesin numeric(9,0), @counter  numeric(10,2)
    }

    public function delKwahMesin($id_kwah)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_DELETE_KWAH_MESIN @IdKwah = ?',
            [$id_kwah]
        );

        // @IdKwah numeric(9,0)
    }

    public function getListDataKwahMesin($bulan, $tahun)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LISTDATA_KWAH_MESIN @bulan = ?, @tahun = ?',
            [$bulan, $tahun]
        );

        // @bulan  varchar(2), @tahun varchar(4)
    }

    public function getKwahMesin($tanggal, $id_divisi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_KWAH_MESIN @tanggal = ?, @iddivisi = ?',
            [$tanggal, $id_divisi]
        );

        // @tanggal datetime, @iddivisi char(3)
    }
    #endregion

    #region Gangguan Produksi
    public function getListMesin($kode)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_MESIN @kode = ?',
            [$kode]
        );

        // If @kode = 1     SELECT * FROM MasterMesin WHERE IdDivisi='EXT'
        // If @kode = 2     SELECT * FROM MasterMesin WHERE IdDivisi='MEX'
        // If @kode = 3     SELECT * FROM MasterMesin WHERE IdDivisi='DEX'
    }

    public function getListIdKomposisi($tanggal, $id_mesin)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_IDKOMPOSISI @tanggal = ?, @idmesin = ?',
            [$tanggal, $id_mesin]
        );

        // @tanggal datetime, @idmesin varchar(5)
    }

    public function getDisplayShift($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_DISPLAY_SHIFT @IdKonversi = ?',
            [$id_konversi]
        );

        // @IdKonversi Varchar(14)
    }

    public function getListGangguan()
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_GANGGUAN',
            []
        );
    }

    public function getListGangguanProd($bulan, $tahun)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5409_EXT_LIST_GANGGUAN_PROD @Bulan = ?, @Tahun = ?',
            [$bulan, $tahun]
        );

        // @Bulan Numeric(10,2), @Tahun Numeric(10,2)
    }

    public function getListShift($id_konversi)
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_LIST_SHIFT @idkonversi = ?',
            [$id_konversi]
        );

        // @idkonversi char(14)
    }

    public function getNoTrans()
    {
        return DB::connection('ConnExtruder')->select(
            'exec SP_5298_EXT_NO_TRANS',
            []
        );
    }

    public function insGangguanProd($tanggal, $id_mesin, $id_gangguan, $id_konversi = null, $shift, $awal, $akhir, $awal_gangguan, $akhir_gangguan, $jumlah_jam, $jumlah_menit, $status, $keterangan, $jam_user, $user)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_INSERT_GANGGUAN_PROD @Tanggal = ?, @IdMesin = ?, @IdGangguan = ?, @IdKonversi = ?, @Shift = ?, @Awal = ?, @Akhir = ?, @AwalGangguan = ?, @AkhirGangguan = ?, @JumlahJam = ?, @JumlahMenit = ?, @Status = ?, @Keterangan = ?, @JamUser = ?, @User = ?',
            [$tanggal, $id_mesin, $id_gangguan, $id_konversi, $shift, $awal, $akhir, $awal_gangguan, $akhir_gangguan, $jumlah_jam, $jumlah_menit, $status, $keterangan, $jam_user, $user]
        );

        // @Tanggal Datetime, @IdMesin Char(5), @IdGangguan Char(5), @IdKonversi Char(14)=null, @Shift Char(2), @Awal datetime, @Akhir datetime, @AwalGangguan datetime, @AkhirGangguan datetime, @JumlahJam numeric(9, @JumlahMenit numeric(9, @Status Char(1), @Keterangan Varchar(100), @JamUser datetime, @User Char(7)
    }

    public function updGangguanProd($no_trans, $awal, $akhir, $jam, $menit, $ket)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_UPDATE_GANGGUAN_PROD @NoTrans = ?, @Awal = ?, @Akhir = ?, @Jam = ?, @Menit = ?, @Ket = ?',
            [$no_trans, $awal, $akhir, $jam, $menit, $ket]
        );

        // PARAMTER - @NoTrans int, @Awal datetime, @Akhir datetime, @Jam numeric(9,0), @Menit numeric(9,0), @Ket varchar(100)
    }

    public function delGangguanProd($no_trans)
    {
        return DB::connection('ConnExtruder')->statement(
            'exec SP_5298_EXT_DELETE_GANGGUAN_PROD @NoTrans = ?',
            [$no_trans]
        );

        // PARAMTER - @NoTrans int
    }
    #endregion
}
