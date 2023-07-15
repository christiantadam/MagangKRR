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

    <table class="table mt-3">
        <thead class="table-dark">
            <tr>
                <th>No. Order</th>
                <th>Tgl. Order</th>
                <th>Tgl. ACC Direktur</th>
                <th>Nama Barang</th>
                <th>NoGbrRev</th>
                <th>Jumlah</th>
                <th>Status Order</th>
                <th>Divisi</th>
                <th>Mesin</th>
                <th>Keterangan Order</th>
                <th>Peng-order</th>
            </tr>
        </thead>
    </table>

    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="keterangan keterangan-padding">
                <div class="row">
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