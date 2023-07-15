@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Maintenance Order Proyek
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-3">
                    <span class="custom-alignment">Tgl. Order:</span>
                </div>

                <div class="col-lg-9">
                    <div class="row">
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
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <span class="custom-alignment">Divisi:</span>
                </div>

                <div class="col-lg-9">
                    <div class="input-group">
                        <input type="text" name="divisi" class="form-control">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
                </div>
            </div>

            <table class="table mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>title1</th>
                        <th>title2</th>
                        <th>title3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>data1</td>
                        <td>data2</td>
                        <td>data3</td>
                    </tr>
                    <tr>
                        <td>data1</td>
                        <td>data2</td>
                        <td>data3</td>
                    </tr>
                    <tr>
                        <td>data1</td>
                        <td>data2</td>
                        <td>data3</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-info">Refresh</button>

        </div>

        <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-5">
                    <span class="custom-alignment">No. Order:</span>
                </div>

                <div class="col-lg-5">
                    <input type="text" name="no_order" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Jumlah:</span>
                </div>

                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="number" name="jmlh1" class="form-control" value="1">
                        <input type="text" name="jmlh2" class="form-control" style="width: 7.5vw;">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Keterangan Order:</span>
                </div>

                <div class="col-lg-7">
                    <input type="text" name="keterangan_order" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Peng-Order:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="pengorder" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">ACC Manager:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="acc_manager" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Manager:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="manager" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">ACC Direktur:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="acc_direktur" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Tgl. tdk disetujui Manager:</span>
                </div>

                <div class="col-lg-6">
                    <input type="date" name="tgl_manager" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Ket. tdk disetujui Manager:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="ket_manager" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Tgl. tdk disetujui Direktur:</span>
                </div>

                <div class="col-lg-6">
                    <input type="date" name="tgl_direktur" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Ket. tdk disetujui Direktur:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="ket_direktur" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Tgl. Ditolak Div. Teknik:</span>
                </div>

                <div class="col-lg-6">
                    <input type="date" name="tgl_teknik" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Ket. Ditolak Div. Teknik:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="ket_teknik_tolak" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">Ket. Ditunda Div. Teknik:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="ket_teknik_tunda" class="form-control">
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-lg-8 content-center">
                    <div class="input-group">
                        <button type="button" class="btn btn-success custom-btn">ISI</button>
                        <button type="button" class="btn btn-warning custom-btn">KOREKSI</button>
                        <button type="button" class="btn btn-danger custom-btn">HAPUS</button>
                    </div>
                </div>

                <div class="col-lg-2 content-center">
                    <button type="button" class="btn btn-secondary custom-btn">KELUAR</button>
                </div>
            </div>

            <div class="keterangan keterangan-padding mt-3">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color: red;">xxxxx -></span>
                        <span> : ACC Direktur</span><br>

                        <span style="color: deeppink;">xxxxx -></span>
                        <span> : Ditunda Div. Teknik</span><br>

                        <span style="color: green;">xxxxx -></span>
                        <span> : Ditolak Div. Teknik</span><br>
                    </div>

                    <div class="col-lg-6">
                        <span style="color: blue;">xxxxx -></span>
                        <span> : ACC Direktur</span><br>

                        <span style="color: grey;">xxxxx -></span>
                        <span> : Tdk disetujui Direktur</span>

                        <span style="color: brown;">xxxxx -></span>
                        <span> : Tdk disetujui Manager</span><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection