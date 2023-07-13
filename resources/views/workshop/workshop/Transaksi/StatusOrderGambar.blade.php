@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Proses Pemberi Gambar
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-4">
                    <span class="custom-alignment">Tgl. Order:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="date" name="tgl_awal" class="form-control">
                        <span class="input-group-text">s/d</span>
                        <input type="date" name="tgl_akhir" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <span class="custom-alignment">Divisi:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="text" name="divisi" class="form-control">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card card-keterangan">
                <div class="card-header">Keterangan</div>

                <div class="card-body row">
                    <div class="col-lg-6">
                        <span style="color: blue;">xxxxx -></span>
                        <span>Sudah Selesai</span>
                    </div>

                    <div class="col-lg-6">
                        <span>xxxxx -></span>
                        <span>Belum Selesai</span>
                    </div>
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

    <div class="mt-3">
        <div class="float-start" style="margin-left: 12.5px;">
            <button type="button" class="btn btn-primary" style="width: 12.5em;"><b>PROSES</b></button>
            <button type="button" class="btn btn-light custom-btn">Refresh</button>
        </div>

        <div class="float-end" style="margin-right: 12.5px;">
            <button type="button" class="btn btn-dark custom-btn">CETAK</button>
            <button type="button" class="btn btn-secondary custom-btn" style="margin-left: 12.5px;">KELUAR</button>
        </div>
    </div>
</div>

@endsection