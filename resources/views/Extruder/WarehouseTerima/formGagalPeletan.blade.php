@extends('layouts.appExtruder')

@section('title')
    Tidak Tersimpan Peletan
@endsection

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
                </div>

                <div class="col-lg-4"></div>

                <div class="col-lg-2">
                    <button type="button" class="btn btn-outline-secondary btn-scan-barcode" disabled
                        style="color: black; font-size: xx-large;">0</button>
                </div>
            </div>

            <div class="mt-4">
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
                                <th>Shift</th>
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

            <div class="mt-3 mb-5 float-end text-center">
                <button type="submit" class="btn btn-outline-success" style="margin-right: 10px;">Proses</button>
                <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;">Batal Proses</button>
                <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px;">Keluar</button>
            </div>
        </form>
    </div>
@endsection
