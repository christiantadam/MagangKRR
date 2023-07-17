@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    ACC Direktur -- Order Proyek
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6 row">

            <div class="col-lg-3">
                <span class="custom-alignment">Tgl. Order:</span>
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-5">
                        <input type="Date" class="form-control" name="tgl_awal">
                    </div>
                    <div class="col-lg-2 d-flex justify-content-center">
                        <span style="margin-top: 5px;">s/d</span>
                    </div>
                    <div class="col-lg-5">
                        <input type="Date" class="form-control" name="tgl_akhir">
                    </div>
                </div>
            </div>

            <div class="col-lg-1">
                <button type="button" class="btn btn-primary"><b><u>O</u>K</b></button>
            </div>

        </div>

        <div class="col-lg-6 row d-flex justify-content-center mt-1">

            <div class="col-lg-3 content-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="acc">
                    <label class="form-check-label" for="radio-acc-manager-gambar">
                        ACC
                    </label>
                </div>
            </div>

            <div class="col-lg-3 content-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="batal_acc">
                    <label class="form-check-label" for="radio-acc-manager-gambar">
                        Batal ACC
                    </label>
                </div>
            </div>

            <div class="col-lg-4 content-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="tdk_setuju">
                    <label class="form-check-label" for="radio-acc-manager-gambar">
                        Tdk disetujui
                    </label>
                </div>
            </div>

        </div>
    </div>

    <table class="table mt-3">
        <thead class="table-dark">
            <tr>
                <th>title1</th>
                <th>title2</th>
                <th>title3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>data1</td>
                <td>data2</td>
                <td>data3</td>
            </tr>
            <tr>
                <td>data1</td>
                <td>data2</td>
                <td>data3</td>
            </tr>
            <tr>
                <td>data1</td>
                <td>data2</td>
                <td>data3</td>
            </tr>
        </tbody>
    </table>

    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="keterangan keterangan-padding">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color: red;">xxxxx -></span>
                        <span>Sudah di-ACC</span><br>

                        <span style="color: green;">xxxxx -></span>
                        <span>Ditolak Div. Teknik</span><br>
                    </div>

                    <div class="col-lg-6">
                        <span style="color: deeppink;">xxxxx -></span>
                        <span>Ditunda Div. Teknik</span><br>

                        <span style="color: grey;">xxxxx -></span>
                        <span>Tdk disetujui Direktur</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mt-3">
            <div class="float-start">
                <button type="button" class="btn btn-light">Refresh</button>
                <button type="button" class="btn btn-info">Pilih Semua</button>
            </div>

            <div class="float-end">
                <button type="button" class="btn btn-primary" style="width: 10em;"><b>PROSES</b></button>
                <button type="button" class="btn btn-secondary">KELUAR</button>
            </div>
        </div>
    </div>
</div>

@endsection