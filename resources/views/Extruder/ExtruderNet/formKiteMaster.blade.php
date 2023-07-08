@extends('layouts.appExtruder')
@section('content')

<div id="kite_master" class="form" data-aos="fade-up">
    <form>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <div class="form-check">
                        <input class="form-check-input custom-radio" type="radio" name="fasilitas"
                            id="fasilitas_pembebasan" value="pembebasan">
                        <label class="form-check-label custom-radio" for="fasilitas_pembebasan">Fasilitas
                            Pembebasan</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <div class="form-check">
                        <input class="form-check-input custom-radio" type="radio" name="fasilitas"
                            id="fasilitas_pengembalian" value="pengembalian">
                        <label class="form-check-label custom-radio" for="fasilitas_pengembalian">Fasilitas
                            Pengembalian</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Tgl Start:</span>
            </div>
            <div class="col-md-6">
                <input type="date" class="form-control" id="tgl_start" name="tgl_start">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Kode Barang:</span>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                    <button type="button" class="btn btn-outline-secondary">Cek</button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Nama Barang:</span>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Bahan PP:</span>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="bahan_pp" name="bahan_pp" style="width: 90%">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Benang:</span>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="benang" name="benang" style="width: 90%">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Hasil:</span>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="hasil" name="hasil" style="width: 90%">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Sisa:</span>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="sisa" name="sisa" style="width: 90%">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 row justify-content-md-center">
                <div class="text-center col-md-auto"><button type="submit">Simpan</button></div>
                <div class="col-md-4"></div>
                <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
            </div>
        </div>
    </form>
</div>

@endsection