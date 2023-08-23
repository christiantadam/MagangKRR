@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_order_maintenance" class="form" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Tanggal:</div>
            <div class="col-lg-2">
                <input type="date" id="tanggal" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">No. Order:</div>
            <div class="col-lg-2">
                <input type="text" id="no_order" class="form-control" disabled>
            </div>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-lg-2 aligned-text">Identifikasi Order:</div>
            <div class="col-lg-8">
                <input type="text" id="identifikasi" class="form-control" disabled>
            </div>
        </div>

        <table id="table_order" class="hover cell-border">
            <thead>
                <tr>
                    <th>Nama Type</th>
                    <th>Qty. Primer</th>
                    <th>Sat. Primer</th>
                    <th>Qty. Sekunder</th>
                    <th>Sat. Sekunder</th>
                    <th>Qty. Tertier</th>
                    <th>Sat. Tertier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php $tableWidth = 7; @endphp
                    <td colspan="{{ $tableWidth }}">
                        <h1 class="mt-3 text-center">Tabel masih kosong...</h1>
                    </td>
                    @for ($i = 0; $i < $tableWidth - 1; $i++)
                        <td class="hidden"></td>
                    @endfor
                </tr>
            </tbody>
        </table>

        <div class="card mt-4">
            <div class="card-header">Detail Order</div>

            <div class="card-body">
                <div class="mt-3 row">
                    <div class="col-lg-2"><span class="aligned-text">Type Benang:</span></div>
                    <div class="col-lg-8">
                        <select id="select_benang" class="form-select" disabled>
                            <option selected disabled>-- Pilih Type Benang --</option>
                            @foreach ($formData['listBenang'] as $d)
                                <option value="{{ $d->SatPrimer . ',' . $d->SatSekunder . ',' . $d->SatTritier }}">
                                    {{ $d->NamaType }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-3 row">
                    <div class="col-lg-2"><span class="aligned-text">Primer:</span></div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <input type="number" id="primer_qty" class="form-control detail_order" placeholder="0"
                                disabled>
                            <span id="primer_sat" class="input-group-text">NULL</span>
                        </div>
                    </div>
                </div>

                <div class="mt-3 row">
                    <div class="col-lg-2"><span class="aligned-text">Sekunder:</span></div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <input type="number" id="sekunder_qty" class="form-control detail_order" placeholder="0"
                                disabled>
                            <span id="sekunder_sat" class="input-group-text">NULL</span>
                        </div>
                    </div>
                </div>

                <div class="mt-3 row">
                    <div class="col-lg-2"><span class="aligned-text">Tersier:</span></div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <input type="number" id="tersier_qty" class="form-control detail_order" placeholder="0"
                                disabled>
                            <span id="tersier_sat" class="input-group-text">NULL</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <button type="button" id="btn_detail" class="btn btn-outline-info float-end"
                            disabled>Tambah<br>Detail</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="button" id="btn_baru" class="btn btn-outline-primary">Tambah</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center">
                <button type="button" id="btn_proses" class="btn btn-outline-success" disabled>Proses</button>
                <button type="button" id="btn_keluar" class="btn btn-outline-danger">Keluar</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/ExtruderNet/orderMaintenance.js') }}"></script>
@endsection
