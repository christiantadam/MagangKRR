@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Maintenance Divisi
</div>

<div class="card-body">
    <form action="#">
        <div class="row">
            <div class="col-lg-2">
                <span class="custom-alignment">Kode Divisi:</span>
            </div>

            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" name="kode_divisi" class="form-control">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="custom-alignment">Nama Divisi:</span>
            </div>

            <div class="col-lg-6">
                <input type="text" name="nama_divisi" class="form-control">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="input-group d-flex justify-content-center">
                    <button type="button" class="btn btn-success custom-btn"><u>I</u>SI</button>
                    <button type="button" class="btn btn-warning custom-btn"><u>K</u>OREKSI</button>
                    <button type="button" class="btn btn-danger custom-btn"><u>H</u>APUS</button>
                    <button type="button" class="btn btn-primary custom-btn" disabled><u>P</u>ROSES</button>
                    <button type="button" class="btn btn-secondary custom-btn"><u>K</u>ELUAR</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection