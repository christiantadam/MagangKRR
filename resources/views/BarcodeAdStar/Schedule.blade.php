@extends('layouts.appBarcode')
@section('content')

<link href="{{ asset('css/Barcode/Schedule.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<h2>Schedule</h2>

<div class="container">
    <div class="card">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Divisi :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='iddiv' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namadiv' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btndiv" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_divisi">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Objek :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idobj' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namaobj' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btnobj" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_objek">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Kelut :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idkelut' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namakelut' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btnkelut" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_kelut">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Kelompok :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idklmp' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namaklmp' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btnklmp" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_kelompok">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Sub Kelompok :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idsubkel' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namasubkel' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btnsubkel" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_subkel">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Type :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idtype' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namatype' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btntype" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_type">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">
                <button id="btntambah" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                <div class="card">
                <div class="card-header">Type</div>
                        <table>
                            <tr>
                                <th>Divisi </th>
                                <th>Order </th>
                                <th>Kelut </th>
                                <th>Kelompok </th>
                                <th>Sub Kelompok </th>
                                <th>Type </th>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Pilih Semua</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                    </div>
                </div>
    </div>


    <!-- Modal divisi-->
<div class="modal fade" id="mdl_divisi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_divisi" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_divisi">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_divisi" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Divisi</th>
                        <th>Id Divisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataDivisi as $data)
                    <tr>
                        <td>{{ $data->IdDivisi }}</td>
                        <td>{{ $data->NamaDivisi }}</td>
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

 <!-- Modal objek-->
<div class="modal fade" id="mdl_objek" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_objek" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_objek">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_objek" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Objek</th>
                        <th>Id Objek</th>
                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($dataCust as $data)
                         <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                             <td>{{ $data->NamaCust }}</td>
                             <td>{{ $data->IDCust }}</td>
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

 <!-- Modal kelompok utama-->
<div class="modal fade" id="mdl_kelut" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_kelut" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_kelut">Kelompok Utama</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_prodtype" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Kel.Utama</th>
                        <th>Id Kel.Utama</th>
                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($dataCust as $data)
                         <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                             <td>{{ $data->NamaCust }}</td>
                             <td>{{ $data->IDCust }}</td>
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

 <!-- Modal kelompok-->
<div class="modal fade" id="mdl_kelompok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_kelompok" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_kelompok">Kelompok</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_kelompok" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Kelompok</th>
                        <th>Id Kelompok</th>
                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($dataCust as $data)
                         <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                             <td>{{ $data->NamaCust }}</td>
                             <td>{{ $data->IDCust }}</td>
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

 <!-- Modal sub kelompok-->
<div class="modal fade" id="mdl_subkel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_subkel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_subkel">Sub Kelompok</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_subkel" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Sub Kelompok</th>
                        <th>Id Sub Kelompok</th>
                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($dataCust as $data)
                         <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                             <td>{{ $data->NamaCust }}</td>
                             <td>{{ $data->IDCust }}</td>
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

 <!-- Modal type-->
<div class="modal fade" id="mdl_type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_type" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_type">Sub Kelompok</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_type" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Type</th>
                        <th>Id Type</th>
                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($dataCust as $data)
                         <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                             <td>{{ $data->NamaCust }}</td>
                             <td>{{ $data->IDCust }}</td>
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

<script src="{{ asset('js\AdStar\Schedule.js')}}"></script>
@endsection
