@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BKM-BKK Pembulatan</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('BKMBKKPembulatan') }}" id="formkoreksi">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="bulanTahun" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulan" name="bulan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="tahun" name="tahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnOK" name="btnOK" value="OK" class="btn">
                                    </div>
                                </div>

                                <!--CARD 1-->
                                <br>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 40%;">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <label for="radio_1">Data BKM</label>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 180%; table-layout: fixed;" id="tabelDataBKM">
                                                    <colgroup>
                                                    <col style="width: 60%;">
                                                    <col style="width: 60%;">
                                                    <col style="width: 60%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>No. BKM</th>
                                                        <th>Tgl. BKM</th>
                                                        <th>Nilai Pelunasan</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" id="idBKM" name="idBKM" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" id="id_bkk" name="id_bkk" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="idPembayaran" id="idPembayaran">
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="idMataUang" id="idMataUang">
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 60%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <label for="radio_1">Rincian Data</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 240%; table-layout: fixed;" id="tabelRincianData">
                                                    <colgroup>
                                                    <col style="width: 40%;">
                                                    <col style="width: 35%;">
                                                    <col style="width: 35%;">
                                                    <col style="width: 30%;">
                                                    <col style="width: 40%;">
                                                    <col style="width: 20%;">
                                                    <col style="width: 20%;">
                                                    <col style="width: 20%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Customer</th>
                                                            <th>No. Bukti</th>
                                                            <th>Invoice</th>
                                                            <th>Mata Uang</th>
                                                            <th>Nilai Rincian</th>
                                                            <th>Id. Bank</th>
                                                            <th>Id. Jenis</th>
                                                            <th>Id. Uang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <b>BKK</b>
                                            <p><div class="row">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan">Bank</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="namaBankSelect" name="namaBankSelect" class="form-control">
s
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idBank" name="idBank" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="jenisBank" name="jenisBank" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <p><div class="row">
                                                <div class="col-md-3">
                                                    <label for="tanggal">Tanggal</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <p><div class="row">
                                                <div class="col-md-3">
                                                    <label for="idBKK">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" name="idBKK" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <p><div class="row">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" name="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <p><div class="row">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="idKodePerkiraan" name="idKodePerkiraan" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="kodePerkiraanSelect" name="kodePerkiraanSelect" class="form-control">
s
                                                    </select>
                                                </div>
                                            </div>
                                            <p><div class="row">
                                                <div class="col-md-3">
                                                    <label for="uraian">Uraian</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="uraian" name="uraian" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" id="konversi" name="konversi" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div style="display: flex; justify-content: center;">
                                                <input type="submit" id="btnPilihBKM" name="btnPilihBKM" value="Pilih BKM" class="btn btn-primary">
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div>
                                                    <button type="submit" id="btnProses" name="btnProses" class="btn btn-success">PROSES</button>
                                                </div>
                                                <div style="display: flex; justify-content: center;">
                                                    <input type="submit" id="btnBatal" name="btnBatal" value="Batal" class="btn btn-danger">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div >
                                                    <button type="submit" id="btnTampilBKK" name="btnTampilBKK" class="btn btn-primary">Tampil BKK</button>
                                                </div>
                                                <div >
                                                    <input type="submit" name="tutup" value="TUTUP" class="btn btn-secondary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="modal fade" id="modalTampilBKK" tabindex="-1" role="dialog" aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="padding: 25px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cetak BKK Nota Kredit</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('BKMBKKPembulatan') }}" id="formTampilBKK" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodTampilBKK">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggalInputTampilBKM" style="margin-right: 10px;">Tanggal
                                                        Input</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalTampilBKK" name="tanggalTampilBKK" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    S/D
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalTampilBKK2"
                                                        name="tanggalTampilBKK2" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnOkTampilBKK" name="btnOkTampilBKK">OK</button>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKKTampil" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKKTampil" name="idBKKTampil"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnCetakBKK" name="btnCetakBKK">CETAK</button>
                                                </div>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 120%; table-layout: fixed;"id="tabelTampilBKK">
                                                    <colgroup>
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Tgl. Input</th>
                                                            <th>Id. BKM</th>
                                                            <th>Nilai Pelunasan</th>
                                                            <th>Terjemahan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <input type="hidden" name="cetak" id="cetak" value="cetakBKK">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/BKMBKKPembulatan.js') }}"></script>
@endsection
