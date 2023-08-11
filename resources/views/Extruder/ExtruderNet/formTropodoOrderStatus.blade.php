@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_order_status" class="form" data-aos="fade-up">
        <div class="form-group mt-3 row">
            <div class="col-lg-2"><span class="aligned-text">No. Order:</span></div>
            <div class="col-lg-9">
                <select id="select_order" class="form-select">
                    <option selected disabled>-- Pilih Nomor Order --</option>
                    <option value="loading" style="display: none" disabled>Loading...</option>
                    @foreach ($formData['listBatalOrder'] as $d)
                        <option value="{{ $d->IdOrder }}">{{ $d->IdOrder . ' | ' . $d->Identifikasi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card mt-3 mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 aligned-text">Tanggal:</div>
                    <div class="col-lg-3">
                        <input type="date" id="tanggal" class="form-control" disabled>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Spek:</div>
                    <div class="col-lg-9">
                        <input type="text" id="spek" class="form-control" disabled>
                    </div>
                </div>

                <div class="row mt-3">

                    <div class="col-lg-2 aligned-text">Jumlah Order:</div>
                    <div class="col-lg-3">
                        <input type="number" id="jmlh_order" class="form-control" placeholder="0" disabled>
                    </div>

                    <div class="col-lg-3 aligned-text">Jumlah Produksi:</div>
                    <div class="col-lg-3">
                        <input type="number" id="jmlh_produksi" class="form-control" placeholder="0" disabled>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Status:</div>
                    <div class="col-lg-3">
                        <select id="select_status" class="form-select">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="FINISH">Finish</option>
                            <option value="CANCEL">Cancel</option>
                            <option value="STOP">Stop</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Keterangan:</div>
                    <div class="col-lg-9">
                        <input type="text" id="keterangan" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <table id="table_order" class="hover cell-border">
            <thead>
                <tr>
                    <th>Tanggal Order</th>
                    <th>Spek</th>
                    <th>Jumlah Order</th>
                    <th>Jumlah Konversi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" class="text-center">
                        <h1 class="mt-3">Tabel masih kosong...</h1>
                    </td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                </tr>
            </tbody>
        </table>

        <div class="float-end mt-3 mb-3">
            <button id="btn_proses" type="button" class="btn btn-outline-success" disabled>Proses</button>
            <button id="btn_keluar" type="button" class="btn btn-outline-danger" style="margin-left: 25px">Keluar</button>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/ExtruderNet/tropodoOrderStatus.js') }}"></script>
@endsection
