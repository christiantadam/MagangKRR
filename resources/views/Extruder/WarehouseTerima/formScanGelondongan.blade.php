@extends('layouts.appExtruder')
@section('content')
    <div id="scan_gelondongan" class="form" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-6">

                <div class="row">
                    <div class="col-lg-3">
                        <span class="aligned-text">Divisi:</span>
                    </div>
                    <div class="col-lg-7">
                        <select id="select_divisi" class="form-select" disabled>
                            <option selected disabled>-- Pilih Divisi --</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <span class="spn_enter">Enter</span>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-3">
                        <span class="aligned-text">No. Barcode:</span>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" id="no_barcode" class="form-control">
                    </div>

                    <div class="col-lg-2">
                        <span class="spn_enter">Enter</span>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <button type="button" id="btn_lihat"
                    class="btn btn-outline-warning btn-scan-barcode">Lihat<br>Data</button>
                <button type="button" id="btn_proses" class="btn btn-outline-success btn-scan-barcode">Proses</button>
                <button type="button" id="btn_keluar" class="btn btn-outline-danger btn-scan-barcode">Keluar</button>
                <button type="button" id="btn_barcode" class="btn btn-outline-secondary btn-scan-barcode" disabled
                    style="color: black; font-size: xx-large;">0</button>
            </div>
        </div>

        <div class="mt-4">
            <span>Rekap Barcode yang diterima</span>

            <table id="table_rekap" class="hover cell-border">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Type</th>
                        <th>Primer</th>
                        <th>Sekunder</th>
                        <th>Tritier</th>
                        <th>Id Type</th>
                        <th>Penerima</th>
                        <th>Divisi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="mt-4">
            <span>Daftar Barcode yang diterima gudang</span>

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
                        <th>Id Type</th>
                        <th>Penerima</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/WarehouseTerima/scanGelondongan.js') }}"></script>
@endsection
