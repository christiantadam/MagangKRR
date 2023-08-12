@extends('layouts.appAdStar')
@section('content')
<link href="{{ asset('css/AdStar/StpOrdPrs.css') }}" rel="stylesheet">

<div class="container">
<h2>Stop Order Press</h2>
</div>


<div class="container">
    <div class="card">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">No. Order Kerja:</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" aria-label="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noorderkerja">
                                ...
                    </button>
                    <input type="text" class="form-control" placeholder="" aria-label="">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">No. Pesanan:</div>
            <div class="col-lg-3">
                <input type="text" class="form-control" placeholder="" aria-label="">
            </div>
            <div class="col-lg-2 aligned-text">Surat Pesanan:</div>
            <div class="col-lg-3">
                <input type="text" class="form-control" placeholder="" aria-label="">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Qty Order:</div>
            <div class="col-lg-2">
                <input type="number" id="qty-ordr" class="input-small" required min="0" placeholder="lbr">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Hasil Order:</div>
            <div class="col-lg-2">
                <input type="number" id="hsl-ordr" class="input-small" required min="0" placeholder="lbr">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Rencana Kerja:</div>
            <div class="col-lg-2">
                <input type="date" id="rncn-kerja" class="form-control" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Rencana Finish:</div>
            <div class="col-lg-2">
                <input type="date" id="rncn-finish" class="form-control" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Tgl Finish:</div>
            <div class="col-lg-2">
                <input type="date" id="tgl-finish" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">
                <button class="btn btn-primary">Stop Order</button>
            </div>
            <div class="col-lg-2 aligned-text">
                <button class="btn btn-success">Unstop Order</button>
            </div>
        </div>
    </div>

    <div class="scrollable-container">
        <!-- Add content here -->
    </div>
</div>

@endsection
