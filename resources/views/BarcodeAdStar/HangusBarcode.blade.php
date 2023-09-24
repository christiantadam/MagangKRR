@extends('layouts.appBarcode')
@section('content')

<link href="{{ asset('css/Barcode/HangusBarcode.css') }}" rel="stylesheet">
<h2>Form Hanguskan Barcode</h2>


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
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="form berat_woven">


                <div class="card">
                <div class="card-header">Type</div>
                <h6 class="mt-3">Beri tanda (v) pada barcode yang ingin dihanguskan</h6>
                        <table>
                            <tr>
                                <th>Type </th>
                                <th>No Barcode </th>
                                <th>Sub Kelompok </th>
                                <th>Kelompok </th>
                                <th>Kode Barang </th>
                                <th>No Indeks </th>
                                <th>Jumlah Primer </th>
                                <th>Jumlah Sekunder </th>
                                <th>Jumlah Tritier </th>
                                <th>Tanggal </th>
                                <th>User </th>
                                <th>IdType </th>
                                <th>IdTransaksi </th>
                            </tr>
                        </table>
                    </div>
                </div>

            <div class="card mt-4">
                <div class="card-header">Type</div>
                <h6 class="mt-3">Daftar barcode yang akan dihanguskan</h6>
                        <table>
                            <tr>
                                <th>Type </th>
                                <th>Jumlah Primer </th>
                                <th>Jumlah Sekunder </th>
                                <th>Jumlah Tritier </th>
                                <th>IdType </th>
                                <th>Tanggal </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Cari</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                    </div>
                </div>
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

    <script src="{{ asset('js\AdStar\HangusBarcode.js')}}"></script>
@endsection
