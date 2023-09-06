@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Kode Perkiraan BKM</div>
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
                                                    <input type="text" id="rincianPembayaran" class="form-control" style="width: 100%">
                                                </div>
                                                <p><div class="col-md-6">
                                                    <label for="nilaiRincian">Nilai Rincian</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" id="nilaiRincian" class="form-control" style="width: 100%">
                                                </div>
                                                <p><div class="col-md-6">
                                                    <label for="kodePerkiraan">Kode Perkiraan</label>
                                                </div>
                                                <div class="row" style="padding-left: 15px">
                                                    <div class="col-md-3">
                                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <select name="bank_select" class="form-control">
                                                            <option value="option1">Kd1</option>
                                                            <option value="option2">Kd2</option>
                                                            <option value="option3">Kd3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" name="idBKM" id="idBKM" class="form-control" style="width: 100%">
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <div style="overflow-y: auto; height: 200px;">
                                                <table style="width: 100%; table-layout: fixed;">
                                                    <colgroup>
                                                        <col style="width: 25%;">
                                                        <col style="width: 25%;">
                                                        <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Rincian Pelunasan</th>
                                                            <th>Nilai Rincian</th>
                                                            <th>Kd. Perkiraan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-container" style="display: flex;">
                                        <div style="width: 40%;">
                                            <p><div style="padding-left: 450px">
                                                <input type="submit" name="proses" value="PROSES" class="btn btn-primary" disabled>
                                            </div>
                                            <div style="padding-left: 450px">
                                                <input type="submit" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
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
<script src="{{ asset('js/Piutang/KodePerkiraanBKM.js') }}"></script>
@endsection
