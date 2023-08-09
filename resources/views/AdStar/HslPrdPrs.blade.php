
@extends('layouts.appAdStar')
@section('content')

<link href="{{ asset('css/AdStar/HslPrdPrs.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<div class="container">
    <h2>Maint Hasil Produksi</h2>
</div>


        {{-- <h3 class="card-title">Sales</h3> --}}
        <div class="container">
            <div class="card">
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Tanggal Produksi:</div>
                    <div class="col-lg-2">
                        <input type="date" id="tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">No. Transaksi:</div>
                    <div class="col-lg-3">
                        <div class="input-group mb-3">
                        <input type="text" id="no-transaksi" class="form-control" required>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notransaksi">
                            List Data
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">No. Order Kerja:</div>
                    <div class="col-lg-4">
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
                    <div class="col-lg-2 aligned-text">Mesin Produksi:</div>
                    <div class="col-lg-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="" aria-label="">
                            <input type="text" class="form-control" placeholder="" aria-label="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                ...
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Grup Pelaksana:</div>
                    <div class="col-lg-2">
                        <select id="grup-pelaksana-dropdown" required>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jam Mulai:</div>
                    <div class="col-lg-2">
                        <input type="time" id="jammulai" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jam Akhir:</div>
                    <div class="col-lg-2">
                        <input type="time" id="jamakhir" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jumlah Ball:</div>
                    <div class="col-lg-2">
                        <input type="number" id="jml-ball" class="input-small" required min="0">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jumlah lembar:</div>
                    <div class="col-lg-2">
                        <input type="number" id="jml-lembar" class="input-small" required min="0">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jumlah Kg:</div>
                    <div class="col-lg-2">
                        <input type="number" id="jml-kg" class="input-small" required min="0">
                    </div>
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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_Barang2" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Mesin</th>
                            <th>KD Mesin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMesin as $data)
                            <tr data-idmesin="{{ $data->IdMesin }}" data-namamesin="{{ $data->NamaMesin }}">
                                <td>{{ $data->NamaMesin }}</td>
                                <td>{{ $data->IdMesin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="notransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notransasksiLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="notransaksiLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_notransaksi" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Grup/Mesin/Order</th>
                            <th>No Trans</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTransaksi as $data)
                            <tr data-grupmesinorder="{{ $data->GrupMesinOrder }}" data-notrans="{{ $data->IDLog }}">
                                <td>{{ $data->GrupMesinOrder }}</td>
                                <td>{{ $data->IDLog }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="noorderkerja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="noorderkerja" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="noorderkerja">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_notransaksi" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Brg</th>
                            <th>No Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($dataTransaksi as $data)
                            <tr data-idmesin="{{ $data->IdMesin }}" data-namamesin="{{ $data->NamaMesin }}">
                                <td>{{ $data->NamaMesin }}</td>
                                <td>{{ $data->IdMesin }}</td>
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

@endsection