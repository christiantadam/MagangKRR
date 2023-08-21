@extends('layouts.appAdStar')
@section('content')
<link href="{{ asset('css/AdStar/StpOrdPrs.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<div class="container">
<h2>Stop Order Press</h2>
</div>


<div class="container">
    <div class="card">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">No. Order Kerja:</div>
            <div class="col-lg-4">
                <div class="input-group mb-3">
                    <input type="text" class="input-small" placeholder="" aria-label="">
                    <button type="button" id="btn_noorder" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noorderkerja">
                        ...
                    </button>
                    <input type="text" class="input" placeholder="" aria-label="">
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

<!-- Modal -->
<div class="modal fade" id="noorderkerja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="noorderkerja" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="noorderkerja">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tabel_noorder" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Brg</th>
                        <th>No Order</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($dataorder as $data)
                        <tr data-nmbrng="{{ $data->Nama_brg }}" data-noordr="{{ $data->No_Order }}">
                            <td>{{ $data->Nama_brg }}</td>
                            <td>{{ $data->No_Order }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<script src="{{ asset('js\AdStar\StpOrdPrs.js')}}"></script>

@endsection
