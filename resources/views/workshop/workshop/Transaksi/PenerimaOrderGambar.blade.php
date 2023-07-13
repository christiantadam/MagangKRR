@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Penerima Order Gambar
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6 row">

            <div class="col-lg-4">
                <span class="custom-alignment">Tgl. ACC Direktur:</span>
            </div>

            <div class="col-lg-8">
                <div class="input-group">
                    <input type="date" name="tgl_awal" class="form-control">
                    <span class="input-group-text">s/d</span>
                    <input type="date" name="tgl_akhir" class="form-control">
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-terima-gambar" id="acc_order">
                        <label class="form-check-label" for="radio-terima-gambar">
                            ACC Order
                        </label>
                    </div>
                </div>

                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-terima-gambar" id="batal_acc">
                        <label class="form-check-label" for="radio-terima-gambar">
                            Batal ACC
                        </label>
                    </div>
                </div>

                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_tolak">
                        <label class="form-check-label" for="radio-terima-gambar">
                            Order Ditolak
                        </label>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-1">
                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_kerja">
                        <label class="form-check-label" for="radio-terima-gambar">
                            Order Dikerjakan
                        </label>
                    </div>
                </div>

                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_selesai">
                        <label class="form-check-label" for="radio-terima-gambar">
                            Order Selesai
                        </label>
                    </div>
                </div>

                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_batal">
                        <label class="form-check-label" for="radio-terima-gambar">
                            Order Dibatalkan
                        </label>
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

    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card card-keterangan">
                <div class="card-header">Keterangan</div>

                <div class="card-body row">
                    <div class="col-lg-6">
                        <span style="color: red;">xxxxx -></span>
                        <span>Sudah diterima</span><br>

                        <span style="color: blue;">xxxxx -></span>
                        <span>Sedang dikerjakan</span><br>
                    </div>

                    <div class="col-lg-6">
                        <span>xxxxx -> Belum Diterima</span><br>

                        <span style="color: grey;">xxxxx -></span>
                        <span>Ditolak</span>
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
                <button type="button" class="btn btn-primary" style="width: 7.5em;"><b>PROSES</b></button>
                <button type="button" class="btn btn-warning">KOREKSI</button>
                <button type="button" class="btn btn-secondary" style="margin-left: 12.5px;">KELUAR</button>
            </div>
        </div>
    </div>
</div>

@endsection