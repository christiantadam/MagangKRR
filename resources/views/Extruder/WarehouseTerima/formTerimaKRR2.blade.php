@extends('layouts.appExtruder')
@section('content')
    <div id="nama_form" class="form" data-aos="fade-up">
        <form>
            <div class="row mt-3">
                <div class="col-lg-3">
                    <span class="aligned-text">No. Surat Jalan:</span>
                </div>

                <div class="col-lg-3">
                    <input type="text" name="surat_jalan" id="surat_jalan" class="form-control">
                </div>

                <div class="col-lg-5">
                    <button type="button" class="btn btn-light">Open SJ JBK JBN JBJ
                        JBL</button>
                    <button type="button" class="btn btn-light">Open SJ WVN
                        Nganjuk</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <span class="aligned-text"><b>SCAN BARCODE:</b></span>
                </div>

                <div class="col-lg-5">
                    <input type="text" name="scan_bar" id="scan_bar" class="form-control">
                </div>
            </div>

            <div class="mt-4">
                <span>Daftar Terima</span>

                <div class="table-responsive">
                    <table class="table table-hover" style="width: max-content">
                        <thead>
                            <tr>
                                <th>Spesifikasi</th>
                                <th>Ball</th>
                                <th>Lembar</th>
                                <th>Kg</th>
                                <th>Validated</th>
                                <th>No. SP</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <span>Jumlah item: </span><span id="jmlh_item"><b>0</b></span><br>
                    <span>Tervalidasi: </span><span id="tervalidasi"><b>0</b></span>
                </div>

                <div class="col-lg-5"></div>

                <div class="col-lg-2">
                    <button type="button" class="btn btn-outline-success">Proses</button>
                </div>

                <div class="col-lg-2">
                    <button type="button" class="btn btn-outline-secondary">Keluar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
