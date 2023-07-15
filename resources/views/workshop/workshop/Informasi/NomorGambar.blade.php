@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Informasi Nomor Gambar
</div>
<div class="card-body">
    <form action="#">
        <div class="row">
            <div class="col-lg-2">
                <span class="custom-alignment">Kode Barang:</span>
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
                <span class="custom-alignment">No. Barang:</span>
            </div>
            <div class="col-lg-3">
                <input type="text" name="no_barang" class="form-control">
            </div>
        </div>

        <div class="float-end">
            <button type="button" class="btn btn-primary" disabled><u>P</u>ROSES</button>
            <button type="button" class="btn btn-secondary"><u>K</u>ELUAR</button>
        </div>
    </form>
</div>

@endsection