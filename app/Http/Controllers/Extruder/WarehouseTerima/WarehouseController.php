<?php

namespace App\Http\Controllers\Extruder\WarehouseTerima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WarehouseController extends Controller
{
    public function index($form_name)
    {
        $view_name = 'extruder.WarehouseTerima.' . $form_name;
        $form_data = [];

        switch ($form_name) {
            case 'formScanGelondongan':
            case 'formBatalGelondongan':
            case 'formScanAssesoris':
                $form_data = ['listDivisi' => $this->getListDivisi()];
                break;

            default:
                # code...
                break;
        }

        $view_data = [
            'pageName' => 'WarehouseTerima',
            'formName' => $form_name,
            'formData' => $form_data,
        ];

        return view($view_name, $view_data);
    }

    private function getListDivisi()
    {
        return $this->executeSP(
            'select',
            'SP_1003_INV_UserDivisi',
            '@XKdUser = 4384',
            []
        );
    }

    private function getStatusDispresiasi($kode_barang, $no_indeks, $trans1, $trans2, $trans3, $trans4, $divisi)
    {
        // [SP_1273_INV_CekBarcodeGelondonganMojosari]
        return DB::connection('ConnInventory')
            ->table('Dispresiasi')
            ->select('Dispresiasi.Status')
            ->join('Type', 'Dispresiasi.Id_type_tujuan', '=', 'Type.IdType')
            ->join('Subkelompok', 'Type.IdSubkelompok_Type', '=', 'Subkelompok.IdSubkelompok')
            ->join('Kelompok', 'Subkelompok.IdKelompok_Subkelompok', '=', 'Kelompok.IdKelompok')
            ->join('KelompokUtama', 'Kelompok.IdKelompokUtama_Kelompok', '=', 'KelompokUtama.IdKelompokUtama')
            ->join('Objek', 'KelompokUtama.IdObjek_KelompokUtama', '=', 'Objek.IdObjek')
            ->where('Dispresiasi.Kode_barang', $kode_barang)
            ->where('Dispresiasi.NoIndeks', $no_indeks)
            ->whereIn('type_transaksi', [$trans1, $trans2, $trans3, $trans4])
            ->where('Objek.IdDivisi_Objek', $divisi)
            ->get();
    }

    private function updKirimMojosari($kode_barang, $no_indeks, $status, $divisi)
    {
        // [SP_1273_INV_SimpanPermohonanKirimMojosari]

        DB::beginTransaction();
        try {
            $select_dispresiasi = DB::connection('ConnInventory')->select(
                'SELECT id_type_tujuan, qty, qty_primer, qty_sekunder, tgl_mutasi,  type_transaksi FROM dispresiasi WHERE kode_barang = ? AND noindeks = ?',
                [$kode_barang, $no_indeks]
            );

            $id_type = $select_dispresiasi[0]->id_type_tujuan;
            $jumlah_keluar_tritier = $select_dispresiasi[0]->qty;
            $jumlah_keluar_primer = $select_dispresiasi[0]->qty_primer;
            $jumlah_keluar_sekunder = $select_dispresiasi[0]->qty_sekunder;
            $tgl_produksi = $select_dispresiasi[0]->tgl_mutasi;

            $select_type = DB::connection('ConnInventory')->select(
                'SELECT SaldoTritier, SaldoSekunder, SaldoPrimer FROM Type WHERE IdType = ?',
                [$id_type]
            );

            $saldo_tritier = $select_type[0]->SaldoTritier;
            $saldo_sekunder = $select_type[0]->SaldoSekunder;
            $saldo_primer = $select_type[0]->SaldoPrimer;

            $select_transaksi = DB::connection('ConnInventory')->select(
                'SELECT t.uraiandetailtransaksi FROM transaksi t, dispresiasi d WHERE d.y_idtrans = t.idtransaksi and d.kode_barang = ? and d.noindeks = ?',
                [$kode_barang, $no_indeks]
            );

            $uraian = $select_transaksi[0]->uraiandetailtransaksi;

            if (doubleval($saldo_tritier) - doubleval($jumlah_keluar_tritier) >= 0) {
                if (doubleval($saldo_sekunder) - doubleval($jumlah_keluar_sekunder) >= 0) {
                    if (doubleval($saldo_primer) - doubleval($jumlah_keluar_primer) >= 0) {
                        // Update dispresiasi
                        DB::connection('ConnInventory')->update(
                            "UPDATE dispresiasi SET type_transaksi = '27', status = '2', ditembak = '3', notemptrans = 4384 WHERE kode_barang = ? AND noindeks = ?",
                            [$kode_barang, $no_indeks]
                        );

                        // Masukkan data dalam tmp_kirim_gudang
                        if ($status == 0) {
                            $tanggal = Carbon::now()->format('Y-m-d');
                            DB::connection('ConnInventory')
                                ->table('tmp_kirim_gudang')
                                ->insert([
                                    'idpemberi' => 4384,
                                    'tglkirim' => $tanggal,
                                    'kodebarang' => $kode_barang,
                                    'noindeks' => $no_indeks,
                                    'primer' => $jumlah_keluar_primer,
                                    'sekunder' => $jumlah_keluar_sekunder,
                                    'tritier' => $jumlah_keluar_tritier,
                                    'idtype' => $id_type,
                                    'tglProduksi' => $tgl_produksi,
                                    'typetransaksi' => '27',
                                    'status' => -1,
                                    'divisi' => $divisi,
                                    'uraian' => $uraian
                                ]);

                            DB::connection('ConnInventory')->update(
                                'UPDATE dispresiasi SET tgl_tembak_keluar = ? WHERE kode_barang = ? AND noindeks = ?',
                                [$tanggal, $kode_barang, $no_indeks]
                            );
                        } else if ($status == 1) {
                            $tanggal = Carbon::now()->subDay()->format('Y-m-d');
                            DB::connection('ConnInventory')
                                ->table('tmp_kirim_gudang')
                                ->insert([
                                    'idpemberi' => 4384,
                                    'tglkirim' => $tanggal,
                                    'kodebarang' => $kode_barang,
                                    'noindeks' => $no_indeks,
                                    'primer' => $jumlah_keluar_primer,
                                    'sekunder' => $jumlah_keluar_sekunder,
                                    'tritier' => $jumlah_keluar_tritier,
                                    'idtype' => $id_type,
                                    'tglProduksi' => $tgl_produksi,
                                    'typetransaksi' => '27',
                                    'status' => -1,
                                    'divisi' => $divisi,
                                    'uraian' => $uraian
                                ]);

                            DB::connection('ConnInventory')->update(
                                'UPDATE dispresiasi SET tgl_tembak_keluar = ? WHERE kode_barang = ? AND noindeks = ?',
                                [$tanggal, $kode_barang, $no_indeks]
                            );
                        }
                    } else return response()->json(['pesan' => 'Saldo Primer tidak mencukupi.']);
                } else return response()->json(['pesan' => 'Saldo Sekunder tidak mencukupi.']);
            } else return response()->json(['pesan' => 'Saldo Primer tidak mencukupi.']);

            DB::commit();
            return 1;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
        }
    }

    public function warehouseTerima($fun_str, $fun_data)
    {
        $param_data = explode('~', $fun_data);
        switch ($fun_str) {
            case 'SP_1273_INV_SimpanPermohonanKirimMojosari':
                return $this->updKirimMojosari($param_data[0], $param_data[1], $param_data[2], $param_data[3]);

            case 'SP_1273_INV_CekBarcodeGelondonganMojosari':
                return $this->getStatusDispresiasi($param_data[0], $param_data[1], $param_data[2], $param_data[3], $param_data[4], $param_data[5], $param_data[6]);

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

            case 'SP_1273_INV_TampilGelondongan_Mojo':
                $param_str = '@kodebarang = ?, @noindeks = ?, @Divisi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_JAM_SERVER':
                $param_str = '';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_SimpanPermohonanKirimMojosari':
                $param_str = '@kode_barang = ?, @noindeks = ?, @Divisi = ?, @status = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_ListBarcodeBahanBaku':
                $param_str = '@status = ?, @iddivisi = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

            case 'SP_1273_LMT_SimpanPembatalanKirimKeGudang':
                $param_str = '@kodebarang = ?, @noindeks = ?';
                return $this->executeSP('statement', $fun_str, $param_str, $param_data);

            case 'SP_1273_INV_ListKirimBahanBaku':
                $param_str = '@Kode = ?, @Divisi = ?';
                if ($param_data[0] == '12') $param_str .= ', @Tanggal = ?';
                return $this->executeSP('select', $fun_str, $param_str, $param_data);

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
