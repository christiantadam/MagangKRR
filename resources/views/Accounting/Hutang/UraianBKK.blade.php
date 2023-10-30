@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Uraian BKK</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('FakturUangMuka') }}" id="formkoreksi">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="idBKK" style="margin-right: 10px;">BKK</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="idBKK" name="idBKK" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3" style="d-flex ml-auto">
                                        Nilai BKK Tidak bisa diubah
                                    </div>
                                </div>
                                <br><div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="nilai" style="margin-right: 10px;">Nilai</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="nilai" name="nilai" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 115%; table-layout: fixed;" id="tabelListBKK">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 50%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Detail</th>
                                                    <th>Rincian</th>
                                                    <th>Nilai Rincian</th>
                                                    <th>Kd. Perkiraan</th>
                                                    <th>Id. Bayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Id. Detail</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="idDetail" name="idDetail" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="idBayar" style="margin-right: 10px;">Id. Bayar</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="idBayar" name="idBayar" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="id" style="margin-right: 10px;">Total</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="total" name="total" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="rincian" style="margin-right: 10px;">Rincian</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="rincian" name="rincian" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="nilaiRincian" style="margin-right: 10px;">Nilai Rincian</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="nilaiRincian" name="nilaiRincian" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="kodePerkiraanSelect" style="margin-right: 10px;">Kode Perkiraan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="idKodePerkiraan" name="idKodePerkiraan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-5">
                                        <select id="kodePerkiraanSelect" name="kodePerkiraanSelect" class="form-control" >

                                        </select>
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnIsi" name="btnIsi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnKoreksi" name="btnKoreksi" value="Koreksi" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="btnProses" value="Proses" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-7">
                                            <input type="submit" id="btnKeluar" name="btnKeluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
<script src="{{ asset('js/Hutang/UraianBKK.js') }}"></script>
@endsection
