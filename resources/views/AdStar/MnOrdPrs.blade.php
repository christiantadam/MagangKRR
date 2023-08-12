@extends('layouts.appAdStar')
@section('content')
<link href="{{ asset('css/AdStar/MnOrdPrs.css') }}" rel="stylesheet">
<div class="container">
<h2>Maintenance Order Press</h2>
</div>

    <div class="container">
        <div class="card">
            <h3 class="card-title">Sales</h3>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Customer:</div>
                <div class="col-lg-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="" aria-label="">
                        <input type="text" class="form-control" placeholder="" aria-label="">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noorderkerja">
                            ...
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Nama Barang:</div>
                <div class="col-lg-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="" aria-label="">
                        <input type="text" class="form-control" placeholder="" aria-label="">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noorderkerja">
                            ...
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">No. Pesanan:</div>
                <div class="col-lg-2">
                    <input type="number" id="qty-ordr" class="" required min="0" placeholder="lbr">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Surat Pesanan:</div>
                <div class="col-lg-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="" aria-label="">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noorderkerja">
                            ...
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Jumlah Order:</div>
                <div class="col-lg-2">
                    <input type="number" id="qty-ordr" class="input-small" required min="0" placeholder="lbr">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Jumlah Press:</div>
                <div class="col-lg-2">
                    <input type="number" id="qty-ordr" class="input-small" required min="0" placeholder="lbr">
                </div>
            </div>
        </div>
    </div>

        <div class="card">
            <h3 class="card-title">AdStar</h3>
            <div class="input-container">
                <label for="no-order-kerja">No. Order Kerja:</label>
                <input type="text" id="no-order-kerja" required>
                <button type="button">...</button>
            </div>
            <div class="input-container">
                <label for="tgl-order">Tanggal Order:</label>
                <input type="date" id="tgl-order" required>
            </div>
            <div class="input-container">
                <label for="stock-order-sebelumnya">Stock Order Sebelumnya:</label>
                <input type="text" id="stock-order-sebelumnya" required>
                <input type="text" id="input3">
                <button type="button">...</button>
            </div>
            <div class="input-container">
                <label for="sisa-stock">Sisa Stock:</label>
                <input type="text" id="sisa-stock" required>
            </div>
            <div class="input-container">
                <label for="hasil">Hasil:</label>
                <input type="text" id="hasil" required>
            </div>
            <div class="input-container">
                <label for="tgl-dikerjakan">Tanggal Dikerjakan:</label>
                <input type="date" id="tgl-dikerjakan" required>
            </div>
            <div class="input-container">
                <label for="tgl-finish">Tanggal Finish:</label>
                <input type="date" id="tgl-finish" required>
            </div>
        </div>

        <div class="button-container">
            <button class="add">Add</button>
            <button class="update">Update</button>
            <button class="del">Delete</button>
        </div>

        <div class="scrollable-container">
            <!-- Add content here -->
        </div>

@endsection
