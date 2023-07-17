@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
    <div class="card-header">
        Penerima Order Gambar
    </div>

    <div class="card-body">
        <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

        <div class="row">
            <div class="col-lg-6 row">
                <label for="tgl_acc_direktur" style="margin: 10px 0px 0px 10px;">Tgl. ACC Direktur:</label>
                <div class="col-lg-5">
                    <input type="Date" class="form-control" name="tgl_awal">
                </div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <span style="margin-top: 5px;">s/d</span>
                </div>
                <div class="col-lg-5">
                    <input type="Date" class="form-control" name="tgl_akhir">
                </div>
            </div>

            <div class="col-lg-6">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="acc_order">
                            <label class="form-check-label" for="radio-terima-kerja">
                                ACC Order
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="batal_acc">
                            <label class="form-check-label" for="radio-terima-kerja">
                                Batal ACC
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="tunda">
                            <label class="form-check-label" for="radio-terima-kerja">
                                Ditunda
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center mt-1">
                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_kerja">
                            <label class="form-check-label" for="radio-terima-kerja">
                                Order Dikerjakan
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_selesai">
                            <label class="form-check-label" for="radio-terima-kerja">
                                Order Selesai
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_batal">
                            <label class="form-check-label" for="radio-terima-kerja">
                                Order Dibatalkan
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center mt-1">
                    <div class="col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_tolak">
                            <label class="form-check-label" for="radio-terima-kerja">
                                Order Ditolak
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4"></div>

                    <div class="col-lg-4"></div>
                </div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table mt-3" style="width: max-content">
                <thead class="table-dark">
                    <tr>
                        <th>No. Order</th>
                        <th>Tgl. Order</th>
                        <th>Tgl. ACC Direktur</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-light">Refresh</button>
                        <button type="button" class="btn btn-info">Pilih Semua</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="keterangan keterangan-padding">
                        <div class="row">
                            <div class="col-lg-6">
                                <span style="color: red;">xxxxx -></span>
                                <span>Sudah diterima</span><br>

                                <span style="color: blue;">xxxxx -></span>
                                <span>Sedang dikerjakan</span><br>
                            </div>

                            <div class="col-lg-6">
                                <span>xxxxx -> Belum Diterima</span><br>

                                <span style="color: grey;">xxxxx -></span>
                                <span>Ditolak</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary w-100"><b>PROSES</b></button>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-warning w-100">KOREKSI</button>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-secondary w-100">KELUAR</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="saldo saldo-padding mt-3">
                    <div class="row">
                        <div class="col-lg-5">
                            <span class="custom-alignment">Saldo Primer:</span>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" name="saldo_primer" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-5">
                            <span class="custom-alignment">Saldo Sekunder:</span>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" name="saldo_sekunder" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-5">
                            <span class="custom-alignment">Saldo Tritier:</span>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" name="saldo_tritier" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
