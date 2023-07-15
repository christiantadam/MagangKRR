@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    ACC Manager -- Order Proyek
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
        <div class="col-lg-6">

            <div class="row">
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
            <button type="button" class="btn btn-light">Pilih Semua</button>

        </div>

        <div class="col-lg-6">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-3 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="acc">
                        <label class="form-check-label" for="radio-acc-manager-gambar">
                            ACC
                        </label>
                    </div>
                </div>

                <div class="col-lg-3 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="batal_acc">
                        <label class="form-check-label" for="radio-acc-manager-gambar">
                            Batal ACC
                        </label>
                    </div>
                </div>

                <div class="col-lg-4 content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="tdk_setuju">
                        <label class="form-check-label" for="radio-acc-manager-gambar">
                            Tdk disetujui
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-5">
                    <span class="custom-alignment">User ACC:</span>
                </div>

                <div class="col-lg-3">
                    <input type="text" name="no_order" class="form-control"
                        style="font-size: large; color: blue; font-weight: bold;" value="4199" disabled>
                </div>
            </div>

            <div class="row mt-3">
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
                    <span class="custom-alignment">ACC Direktur:</span>
                </div>

                <div class="col-lg-6">
                    <input type="text" name="acc_direktur" class="form-control">
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
                <div class="col-lg-6 content-center">
                    <button type="button" class="btn btn-primary" style="width: inherit;"><b>PROSES</b></button>
                </div>

                <div class="col-lg-4 content-center">
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