@extends('layouts.appExtruder')
@section('content')
    <div id="scan_gelondongan" class="form" data-aos="fade-up">
        <form>
            <div class="row mt-3">
                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="divisi">Divisi:</label>
                            <div class="input-group">
                                <input type="text" name="divisi1" id="divisi1" class="form-control">
                                <input type="text" name="divisi2" id="divisi2" class="form-control">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="no_barcode">No. Barcode:</label>
                            <input type="text" name="no_barcode" id="no_barcode" class="form-control">
                        </div>

                        <div class="col-lg-4">
                            <span style="display: flex; margin-top: 25px;">Tekan Enter</span>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <span class="aligned-text">Tujuan:</span>
                        </div>
                        <div class="col-lg-6 row d-flex align-items-center">
                            <div class="col-md-6 text-end">
                                <div class="form-check">
                                    <input type="radio" name="tanggal" value="mojosari" id="mojosari">
                                    <label for="mojosari">
                                        Mojosari
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-start">
                                <div class="form-check">
                                    <input type="radio" name="tanggal" value="nganjuk" id="nganjuk">
                                    <label for="nganjuk">
                                        Nganjuk
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <button type="button" class="btn btn-outline-warning btn-scan-barcode">Lihat<br>Data</button>
                    <button type="button" class="btn btn-outline-success btn-scan-barcode">Proses</button>
                    <button type="button" class="btn btn-outline-danger btn-scan-barcode">Keluar</button>
                    <button type="button" class="btn btn-outline-secondary btn-scan-barcode" disabled
                        style="color: black; font-size: xx-large;">0</button>
                </div>
            </div>

            <div class="mt-5">
                <span>Rekap Barcode yang diterima</span>

                <div class="table-responsive">
                    <table class="table table-hover" style="width: max-content">
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
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <span>Daftar Barcode yang diterima gudang</span>

                <div class="table-responsive">
                    <table class="table table-hover" style="width: max-content">
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
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
