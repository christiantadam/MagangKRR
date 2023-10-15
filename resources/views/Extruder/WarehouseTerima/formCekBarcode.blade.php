@extends('layouts.appExtruder')

@section('title')
    Cek Barcode
@endsection

@section('content')
    <div id="nama_form" class="form" data-aos="fade-up">
        <form>
            <label for="kode_barang">Item Number - Kode Barang:</label>
            <div class="input-group">
                <input type="text" name="kode_barang" id="kode_barang" class="form-control">
                <button type="button" class="btn btn-outline-danger">KELUAR</button>
            </div>
        </form>
    </div>
@endsection
