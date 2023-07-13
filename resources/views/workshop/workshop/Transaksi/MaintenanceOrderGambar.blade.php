@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Maintenance Order Gambar
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-4">
                    <span class="custom-alignment">Tgl. Order:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="date" name="tgl_awal" class="form-control">
                        <span class="input-group-text">s/d</span>
                        <input type="date" name="tgl_akhir" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <span class="custom-alignment">Divisi:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="text" name="divisi" class="form-control">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
                </div>
            </div>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">title1</th>
                        <th scope="col">title2</th>
                        <th scope="col">title3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                </tbody>
            </table>

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
                    <span class="custom-alignment">No. Gambar Rev:</span>
                </div>

                <div class="col-lg-5">
                    <input type="text" name="no_gambar_rev" class="form-control">
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
                    <input type="text" name="ket_teknik" class="form-control">
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

            <div class="card card-keterangan mt-3">
                <div class="card-header">Keterangan</div>

                <div class="card-body row">
                    <div class="col-lg-6">
                        <span style="color: red;">xxxxx -></span>
                        <span>ACC Direktur</span><br>

                        <span style="color: green;">xxxxx -></span>
                        <span>Ditolak Div. Teknik</span><br>

                        <span style="color: brown;">xxxxx -></span>
                        <span>Tdk disetujui Manager</span><br>
                    </div>

                    <div class="col-lg-6">
                        <span style="color: blue;">xxxxx -></span>
                        <span>ACC Direktur</span><br>

                        <span style="color: grey;">xxxxx -></span>
                        <span>Tdk disetujui Direktur</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection