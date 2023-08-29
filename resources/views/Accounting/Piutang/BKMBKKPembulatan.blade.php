@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BKM-BKK Pembulatan</div>
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
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 60%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <label for="radio_1">Rincian Data</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 180%; table-layout: fixed;" id="tabelRincianData">
                                                    <colgroup>
                                                    <col style="width: 40%;">
                                                    <col style="width: 35%;">
                                                    <col style="width: 35%;">
                                                    <col style="width: 30%;">
                                                    <col style="width: 40%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Customer</th>
                                                            <th>No. Bukti</th>
                                                            <th>Invoice</th>
                                                            <th>Mata Uang</th>
                                                            <th>Nilai Rincian</th>
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
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="tanggal">Tanggal</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="idBKK">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="idKodePerkiraan" name="kode_sidKodePerkiraanelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="kodePerkiraanSelect" name="kodePerkiraanSelect" class="form-control">
s
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="uraian">Uraian</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="uraian" name="uraian" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div style="display: flex; justify-content: center;">
                                                <input type="submit" name="pilihbkm" value="Pilih BKM" class="btn btn-primary">
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div>
                                                    <button type="submit" name="proses" class="btn btn-primary">PROSES</button>
                                                </div>
                                                <div style="display: flex; justify-content: center;">
                                                    <input type="submit" name="batal" value="Batal" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div >
                                                    <button type="submit" name="tampilbkk" class="btn btn-primary">Tampil BKK</button>
                                                </div>
                                                <div >
                                                    <input type="submit" name="tutup" value="TUTUP" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/BKMBKKPembulatan.js') }}"></script>
@endsection
