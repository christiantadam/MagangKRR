@extends('layouts.appBarcode')
@section('content')

<link href="{{ asset('css/Barcode/KirimGudang.css') }}" rel="stylesheet">
<h2>Scan Barcode Sebelum Dikirim Ke Gudang</h2>

<div class="form-wrapper mt-4">
    <div class="form-container">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
        <div class="form berat_woven">
            <form action="#" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">No Barcode:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="No_barcode" id="No_barcode" placeholder="No Barcode" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">No SP:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="No_sp" id="No_sp" placeholder="No SP" required>
                        <div class="text-center col-md-auto"><button id="btn_nosp" type="submit" data-bs-target="#mdl_nosp">...</button></div>
                    </div>
                </div>

                <div class="card mt-4">
                <h5 class="mt-3">Rekap Barcode Yang Dikirim</h5>
                        <table>
                            <tr>
                                <th>Tanggal </th>
                                <th>Type </th>
                                <th>Shift </th>
                                <th>Primer </th>
                                <th>Sekunder </th>
                                <th>Tertier </th>
                                <th>IdType</th>
                                <th>-</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mt-4">
                <h5 class="mt-3">Daftar Barcode Yang Dikirim</h5>
                        <table>
                            <tr>
                                <th>Tanggal </th>
                                <th>Type </th>
                                <th>Shift </th>
                                <th>No Barcode </th>
                                <th>SubKelompok </th>
                                <th>Kelompok </th>
                                <th>-</th>
                                <th>-</th>
                            </tr>
                        </table>
                    </div>
                </div>




                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Belum Dikirim</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal customer tujuan-->
<div class="modal fade" id="mdl_nosp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_customer" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_customer">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_nosp" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No. SP</th>
                        <th>Jenis Barang</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($dataCust2 as $data)
                    <tr data-namacust="{{ $data->NAMACUST }}" data-idcust="{{ $data->IDCust }}">
                        <td>{{ $data->NAMACUST }}</td>
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

<script src="{{ asset('js\Barcode.js\KirimGudang.js')}}"></script>
@endsection
