@extends('layouts.appExtruder')

@section('title')
    Scan Barcode Kerta 2
@endsection

@section('content')
    <div id="scan_gelondongan" class="form" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-7">

                <div class="row">
                    <div class="col-lg-3">
                        <span class="aligned-text">Divisi:</span>
                    </div>
                    <div class="col-lg-7">
                        <select id="select_divisi" class="form-select">
                            <option disabled selected>-- Pilih Divisi --</option>
                            @foreach ($formData['listDivisi'] as $d)
                                <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi . ' | ' . $d->NamaDivisi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-3">
                        <span class="aligned-text">Objek:</span>
                    </div>
                    <div class="col-lg-7">
                        <select id="select_objek" class="form-select">
                            <option disabled selected>-- Pilih Objek --</option>
                            {{-- @foreach ($formData['listDivisi'] as $d)
                                    <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi . ' | ' . $d->NamaDivisi }}</option>
                                @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-3">
                        <span id="spn_tujuan" class="aligned-text">Tujuan:</span>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2 row d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_tujuan" id="radio_brebek">
                            <label class="form-check-label" for="radio_brebek">
                                Brebek
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-2 row d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_tujuan" id="radio_nganjuk">
                            <label class="form-check-label" for="radio_nganjuk">
                                Nganjuk
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-2 row d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_tujuan" id="radio_mojosari">
                            <label class="form-check-label" for="radio_mojosari">
                                Mojosari
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-3">
                        <span class="aligned-text">No. Barcode:</span>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" id="no_barcode" class="form-control" placeholder="<<no barcode>>">
                    </div>
                    <div class="col-lg-2">
                        <span class="spn_enter">Enter</span>
                    </div>
                </div>

            </div>

            <div class="col-lg-5">
                <button type="button" class="btn btn-outline-warning btn-scan-barcode">Lihat<br>Data</button>
                <button type="button" class="btn btn-outline-success btn-scan-barcode">Proses</button>
                <button type="button" class="btn btn-outline-danger btn-scan-barcode">Keluar</button>
                <button type="button" class="btn btn-outline-secondary btn-scan-barcode" disabled
                    style="color: black; font-size: xx-large;">0</button>
            </div>
        </div>

        <div class="mt-4">
            <span style="font-size: large"><b>Rekap Barcode Yang Diterima</b></span>

            <table id="table_rekap" class="hover cell-border">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Type</th>
                        <th>Primer</th>
                        <th>Sekunder</th>
                        <th>Tritier</th>
                        <th>Id Type</th>
                        <th>Divisi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="mt-4">
            <span style="font-size: large"><b>Daftar Barcode Yang Diterima Gudang</b></span>

            <table id="table_kirim" class="hover cell-border">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Type</th>
                        <th>No. Barcode</th>
                        <th>Sub-Kelompok</th>
                        <th>Kelompok</th>
                        <th>Kode Barang</th>
                        <th>No. Indeks</th>
                        <th>Primer</th>
                        <th>Sekunder</th>
                        <th>Tritier</th>
                        <th>Divisi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js\Extruder\WarehouseTerima\scanKrr2.js') }}"></script>
@endsection
