@extends('layouts.appBarcodeAdStar')
@section('content')

<link href="{{ asset('css/Barcode/BatalKirim.css') }}" rel="stylesheet">
<h2>Form Batal Kirim Gudang</h2>

<div class="form-wrapper mt-4">
    <div class="form-container">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
        <div class="form berat_woven">
            <form action="#" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Divisi:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" required>
                        <div class="text-center col-md-auto"><button type="submit" data-bs-target="#mdl_divisi">...</button></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Objek:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Objek" id="Objek" placeholder="Objek" required>
                        <div class="text-center col-md-auto"><button type="submit" data-bs-target="#mdl_objek">...</button></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Kelompok Utama:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Kelompok_Utama" id="Kelompok_Utama" placeholder="Kelompok Utama" required>
                        <div class="text-center col-md-auto"><button type="submit" data-bs-target="#mdl_kelut">...</button></div>
                    </div>
                </div>

                <div class="card mt-4">
                <h5 class="mt-3">Rekap Barcode Yang Dikirim</h5>
                        <table>
                            <thead>
                            <tr>
                                {{-- <th>Tanggal </th>
                                <th>Type </th>
                                <th>Shift </th>
                                <th>Primer </th>
                                <th>Sekunder </th>
                                <th>Tertier </th>
                                <th>IdType</th>
                                <th>-</th> --}}
                                <th>Type </th>
                            <th>No Barcode </th>
                            <th>Sub Kelompok </th>
                            <th>Kelompok </th>
                            <th>Kode Barang</th>
                            <th>NoIndex </th>
                            <th>Primer</th>
                            <th>Sekunder</th>
                            <th>Tertier</th>
                            <th>Tanggal</th>
                            <th>Divisi</th>
                            <th>Shift</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKirim as $data)
                                    <tr>
                                        <td>{{ $data->NamaType }}</td>
                                        <td>{{ $data->No_Barcode }}</td>
                                        <td>{{ $data->NamaSubKelompok }}</td>
                                        <td>{{ $data->NamaKelompok }}</td>
                                        <td>{{ $data->Kode_barang }}</td>
                                        <td>{{ $data->NoIndeks }}</td>
                                        <td>{{ $data->Jml_Primer }}</td>
                                        <td>{{ $data->Jml_Sekunder }}</td>
                                        <td>{{ $data->Jml_Tritier }}</td>
                                        <td>{{ $data->Tgl_Terima }}</td>
                                        <td>{{ $data->IdDivisi }}</td>
                                        <td>{{ $data->Shift }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>




                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Cari</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                    </div>
                </div>
            </form>
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

<script src="{{ asset('js\Barcode.js\BatalKirim.js')}}"></script>
@endsection
