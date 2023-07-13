@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Maintenance Kode Barang
</div>

<div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">

            <div class="row mt-1">
                <div class="col-lg-2">
                    <span class="custom-alignment">Tanggal Order:</span>
                </div>

                <div class="col-lg-3">
                    <input type="date" name="tgl" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <span class="custom-alignment">No. Order:</span>
                </div>

                <div class="col-lg-3">
                    <input type="text" name="no_order" class="form-control">
                </div>

                <div class="col-lg-2">
                    <span class="custom-alignment">No. Gambar:</span>
                </div>

                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" name="no_gambar" class="form-control">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <span class="custom-alignment">Divisi:</span>
                </div>

                <div class="col-lg-8">
                    <input type="text" name="divisi" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <span class="custom-alignment">Kd. Barang:</span>
                </div>

                <div class="col-lg-3">
                    <input type="text" name="kd_barang" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <span class="custom-alignment">Nama Barang:</span>
                </div>

                <div class="col-lg-8">
                    <input type="text" name="nama_barang" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-2">
                    <span class="custom-alignment">Peng-Order:</span>
                </div>

                <div class="col-lg-2">
                    <input type="text" name="pengorder" class="form-control" value="USER" style="font-weight: bold;" disabled>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="input-group d-flex justify-content-end">
                <button type="button" class="btn btn-success custom-btn">ISI</button>
                <button type="button" class="btn btn-warning custom-btn">KOREKSI</button>
                <button type="button" class="btn btn-danger custom-btn">HAPUS</button>
            </div>
        </div>

        <div class="col-lg-2 content-center">
            <button type="button" class="btn btn-secondary custom-btn">KELUAR</button>
        </div>
    </div>
</div>

@endsection