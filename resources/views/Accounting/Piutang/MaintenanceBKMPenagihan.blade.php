@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM Penagihan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('MaintenanceBKMPenagihan') }}" id="formkoreksi">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="bulanTahun" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="tahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnOK" value="OK" class="btn" onclick="clickOK()">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnPilihBank" name="btnPilihBank" value="Pilih Bank" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnGroupBKM" name="btnGroupBKM" value="Group BKM" class="btn">
                                    </div>
                                </div>

                                <br><div>
                                    Data Pelunasan
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 140%; table-layout: fixed;" id="tabelDataPelunasan">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl Pelunasan</th>
                                                    <th>Id. Pelunasan</th>
                                                    <th>Id. Bank</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Mata Uang</th>
                                                    <th>Total Pelunasan</th>
                                                    <th>No. Bukti</th>
                                                    <th>Tgl Pembuatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($tabel as $item)
                                                <tr>
                                                    <td>{{ $item->Tgl_Pelunasan }}</td>
                                                    <td>{{ $item->Id_Pelunasan }}</td>
                                                    <td>{{ $item->Id_bank }}</td>
                                                    <td>{{ $item->Jenis_Pembayaran }}</td>
                                                    <td>{{ $item->Nama_MataUang }}</td>
                                                    <td>{{ $item->Nilai_Pelunasan }}</td>
                                                    <td>{{ $item->No_Bukti }}</td>
                                                    <td>{{ $item->No_Bukti }}</td>
                                                </tr>
                                                @endforeach --}}
                                                <!-- Tambahkan baris lainnya jika diperlukan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--CARD 1-->
                                <br>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 40%;">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                                <label for="radio_1">Detail Pelunasan</label>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 180%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 20%;">
                                                    <col style="width: 20%;">
                                                    <col style="width: 40%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Id. Penagihan</th>
                                                        <th>Nilai Pelunasan</th>
                                                        <th>Pelunasan Rupiah</th>
                                                        <th>Kode Perkiraan</th>
                                                        <th>Customer</th>
                                                        <th>Id. Detail</th>
                                                        <th>Tgl. Penagihan</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                        <td>Data 4</td>
                                                        <td>Data 5</td>
                                                        <td>Data 6</td>
                                                        <td>Data 7</td>
                                                    </tr>
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 30%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_2">
                                                <label for="radio_2">Detail Biaya</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 120%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Keterangan</th>
                                                        <th>Jumlah Biaya</th>
                                                        <th>Kode Perkiraan</th>
                                                        <th>Id. Detail</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                        <td>Data 4</td>
                                                    </tr>
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CARD 3-->
                                    <div class="card" style="width: 30%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_3">
                                                <label for="radio_3">Detail Kurang/Lebih</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 120%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Keterangan</th>
                                                        <th>Jumlah Biaya</th>
                                                        <th>Kode Perkiraan</th>
                                                        <th>Id. Detail</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                        <td>Data 4</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="submit" id="btnKoreksiDetail" name="koreksidetail" value="Koreksi Detail" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" id="btnTampilBKM" name="tampilbkm" value="Tampil BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-4">
                                            <input type="submit" id="btnTutup" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto" disabled>
                                        </div>
                                    </div>
                                </div>

                                <!--MODAL PILIH BANKs-->
                                <div class="modal fade" id="pilihBank" tabindex="-1" role="dialog" aria-labelledby="pilihBankModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pilihBankModal">Maintenance Pilih Bank BKM</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="formPilihBank" method="post" action="/proses_pilih_bank">
                                                <div class="modal-body">
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="idPelunasan" style="margin-right: 10px;">Id. Pelunasan</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="idPelunasan" name="idPelunasan" class="form-control" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="tanggalInput" style="margin-right: 10px;">Tanggal Input</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="tanggalInput" class="form-control" style="width: 100%">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="tanggalTagih" style="margin-right: 10px;">Tanggal Tagih</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="tanggalTagih" class="form-control" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="jenisBayar" style="margin-right: 10px;">Jenis Bayar</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="jenisBayar" class="form-control" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="bankSelect" style="margin-right: 10px;">Bank</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" id="idBank" name="idBank" class="form-control" style="width: 100%">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <select name="namaBankSelect" id="namaBankSelect" class="form-control">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="mataUang" name="mataUang" class="form-control" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="nilaiPelunasan" style="margin-right: 10px;">Nilai Pelunasan</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="nilaiPelunasan" name="nilaiPelunasan" class="form-control" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="col-md-3">
                                                            <label for="noBukti" style="margin-right: 10px;">No. Bukti</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="noBukti" namee="noBukti" class="form-control" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <input type="submit" id="btnProses" name="btnProses" value="Proses" class="btn btn-primary">
                                                        </div>
                                                        <div class="col-3">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="submit" id="btnTutupModal" name="btnTutupModal" value="Tutup" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/MaintenanceBKMPenagihan.js') }}"></script>
@endsection
