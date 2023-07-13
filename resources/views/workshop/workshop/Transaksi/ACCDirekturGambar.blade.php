@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    ACC Direktur -- Order Gambar
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6 row">

            <div class="col-lg-3">
                <span class="custom-alignment">Tgl. Order:</span>
            </div>

            <div class="col-lg-8">
                <div class="input-group">
                    <input type="date" name="tgl_awal" class="form-control">
                    <span class="input-group-text">s/d</span>
                    <input type="date" name="tgl_akhir" class="form-control">
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

    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">title1</th>
                <th scope="col">title2</th>
                <th scope="col">title3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
            </tr>
            <tr>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
            </tr>
            <tr>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
            </tr>
        </tbody>
    </table>

    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card card-keterangan">
                <div class="card-header">Keterangan</div>

                <div class="card-body row">
                    <div class="col-lg-6">
                        <span style="color: red;">xxxxx -></span>
                        <span>Sudah di-ACC</span><br>

                        <span style="color: green;">xxxxx -></span>
                        <span>Ditolak Div. Teknik</span><br>
                    </div>

                    <div class="col-lg-6">
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
                <button type="button" class="btn btn-primary" style="width: 10em;"><b><u>P</u>ROSES</b></button>
                <button type="button" class="btn btn-secondary"><u>K</u>ELUAR</button>
            </div>
        </div>
    </div>
</div>

@endsection