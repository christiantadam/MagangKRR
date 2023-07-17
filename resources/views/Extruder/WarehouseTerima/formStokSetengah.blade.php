@extends('layouts.appExtruder')
@section('content')
    <div id="nama_form" class="form" data-aos="fade-up">
        <form>
            <div class="float-end">
                <button type="button" class="btn btn-outline-danger">KELUAR</button>
            </div>

            <div class="row mt-3">

                <div class="col-lg-2">
                    <span class="aligned-text">Divisi:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="text" name="divisi1" id="divisi1" class="form-control">
                        <input type="text" name="divisi2" id="divisi2" class="form-control" style="width: 22.5vw;">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
                </div>

            </div>

            <div class="float-end">
                <button type="button" class="btn bg-transparent" style="color: white;" disabled>KELUAR</button>
            </div>

            <div class="row mt-3">

                <div class="col-lg-2">
                    <span class="aligned-text">Objek:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="text" name="objek1" id="objek1" class="form-control">
                        <input type="text" name="objek2" id="objek2" class="form-control" style="width: 22.5vw;">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <span><b>STOK SAAT INI</b></span>

            <div class="table-responsive">
                <table class="table table-hover" style="width: max-content">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item Number</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Ball</th>
                            <th>Lembar</th>
                            <th>Kg</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
    </div>
@endsection
