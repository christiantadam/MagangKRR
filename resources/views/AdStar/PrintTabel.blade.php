@extends('layouts.appAdStar')
@section('content')
<link href="{{ asset('css/AdStar/PrintTabel.css') }}" rel="stylesheet">

<h2>Form Print Tabel </h2>

<div class="container">
    <div class="card">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Product name :</div>
            <div class="col-lg-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1">StarPark
                    <label class="form-check-label" for="radio1"></label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="2">AdStar
                    <label class="form-check-label" for="radio2"></label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Desing For :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idcust' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namacust' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btncust1" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_customer1">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Ukuran :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idukuran' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" id="btnukuran" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_customer1">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="input-container">
            <label for="customer">Ukuran:</label>
            <input type="text" id="customer" required>
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="nama-barang">Product Name:</label>
            <input type="text" id="nama-barang" required>
            <input type="text" id="input2">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <b><label for="customer">Printing:</label></b>
            <label for="customer">Front:</label>
            <input type="text" id="customer" required>
        </div>
    </div>
    <div class="button-container">
        <button class="update">Copy</button>
    </div>


    <script src="{{ asset('js\AdStar\PrintTabel.js')}}"></script>
@endsection
