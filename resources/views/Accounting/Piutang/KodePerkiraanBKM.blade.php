@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Kode Perkiraan BKM</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('KodePerkiraanBKM') }}" id="formkoreksi">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <div style="overflow-y: auto; max-height: 400px;">
                                                <table style="width: 170%; table-layout: fixed;" id="tabelKiri">
                                                    <colgroup>
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 40%;">
                                                        <col style="width: 45%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Id. BKM</th>
                                                            <th>Bank</th>
                                                            <th>Jns. Lunas</th>
                                                            <th>Mata Uang</th>
                                                            <th>Nilai Pelunasan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div class="col">
                                                <div class="d-flex">
                                                    <div class="col-md-6">
                                                        <input type="radio" name="radiogrup1" value="kecil" id="kasKecil">
                                                        <label for="kasKecil">Kas Kecil</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio" name="radiogrup1" value="besar" id="kasBesar">
                                                        <label for="kasBesar">Kas Besar</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <div class="col-md-1" style="padding-right: 30px">
                                                        <label for="bulan">Bulan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" id="bulan" name="bulan" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-1" style="padding-right: 30px">
                                                        <label for="tahun">Tahun</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="number" id="tahun" name="tahun" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-1" >
                                                        <input type="submit" id="btnOK" name="btnOK" value="OK" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="text" id="BlnThn" name="BlnThn" class="form-control" style="width: 100%">

                                        <div class="card">
                                            <div class="card-body">
                                                Koreksi Kode Perkiraan
                                                <p><div class="col-md-6">
                                                    <label for="rincianPembayaran">Rincian Pembayaran</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" id="rincianPembayaran" name="rincianPembayaran" class="form-control" style="width: 100%">
                                                </div>
                                                <p><div class="col-md-6">
                                                    <label for="nilaiRincian">Nilai Rincian</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" id="nilaiRincian" name="nilaiRincian" class="form-control" style="width: 100%">
                                                </div>
                                                <p><div class="col-md-6">
                                                    <label for="kodePerkiraan">Kode Perkiraan</label>
                                                </div>
                                                <div class="row" style="padding-left: 15px">
                                                    <div class="col-md-4">
                                                        <input type="text" id="idKodePerkiraan" name="idKodePerkiraan" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select id="kodePerkiraanSelect" name="kodePerkiraanSelect" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="text" name="idDetail" id="idDetail" class="form-control" style="width: 100%">
                                                <input type="text" name="idBayar" id="idBayar" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" name="idBKM" id="idBKM" class="form-control" style="width: 100%">
                                <input type="text" name="IdPelunasan" id="IdPelunasan" class="form-control" style="width: 100%">

                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <div style="overflow-y: auto; height: 200px;">
                                                <table style="width: 150%; table-layout: fixed;" id="tabelListRincian">
                                                    <colgroup>
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Rincian Pelunasan</th>
                                                            <th>Nilai Rincian</th>
                                                            <th>Kd. Perkiraan</th>
                                                            <th>IdDetail</th>
                                                            <th>IdLunas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-container" style="display: flex;">
                                        <div style="width: 40%;">
                                            <p><div style="padding-left: 450px">
                                                <input type="submit" id="btnProses" name="btnProses" value="PROSES" class="btn btn-primary">
                                            </div>
                                            <div style="padding-left: 450px">
                                                <input type="submit" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/KodePerkiraanBKM.js') }}"></script>
@endsection
