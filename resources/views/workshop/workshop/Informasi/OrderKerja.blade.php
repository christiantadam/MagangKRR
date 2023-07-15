@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Informasi Order Kerja
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-7">

            <div class="row">
                <div class="col-lg-4">
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

        <div class="col-lg-5" style="padding: 17.5px;">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-lacak-gambar" id="pengorder">
                <label class="form-check-label" for="radio-lacak-gambar">
                    Sebagai Pengorder
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-lacak-gambar" id="terima_order">
                <label class="form-check-label" for="radio-lacak-gambar">
                    Sebagai Penerima Order
                </label>
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

    <div class="mt-3">
        <div class="float-start" style="margin-left: 12.5px;">
            <button type="button" class="btn btn-light custom-btn">Refresh</button>
        </div>

        <div class="float-end" style="margin-right: 12.5px;">
            <button type="button" class="btn btn-secondary custom-btn" style="margin-left: 12.5px;">KELUAR</button>
        </div>
    </div>
</div>

@endsection