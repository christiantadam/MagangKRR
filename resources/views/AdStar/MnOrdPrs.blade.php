@extends('layouts.appAdStar')
@section('content')
<link href="{{ asset('css/AdStar/MnOrdPrs.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_customer">
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
    <div class="container">
        <div class="card">
            <h3 class="card-title">AdStar</h3>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">No. Order Kerja:</div>
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
                <div class="col-lg-2 aligned-text">Tanggal Order:</div>
                <div class="col-lg-2">
                    <input type="date" id="tgl-order" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Stock Order Sebelumnya:</div>
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
                <div class="col-lg-2 aligned-text">Sisa Stock:</div>
                <div class="col-lg-2">
                    <input type="number" id="sisa-stock" class="input-small" required min="0" placeholder="lbr">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Hasil:</div>
                <div class="col-lg-2">
                    <input type="number" id="hasil" class="input-small" required min="0" placeholder="lbr">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Tanggal Dikerjakan:</div>
                <div class="col-lg-2">
                    <input type="date" id="tanggal" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">Tanggal Finish:</div>
                <div class="col-lg-2">
                    <input type="date" id="tanggal" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-2 aligned-text">
                    <button class="btn btn-primary">Add</button>
                </div>
                <div class="col-lg-2 aligned-text">
                    <button class="btn btn-success">Update</button>
                </div>
                <div class="col-lg-2 aligned-text">
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <div class="scrollable-container">
            <!-- Add content here -->
        </div>
    </div>

@endsection
