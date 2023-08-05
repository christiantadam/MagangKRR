@extends('layouts.appAdStar')
@section('content')
<link href="{{ asset('css/AdStar/PrintTbl.css') }}" rel="stylesheet">

<h2>Form Print Tabel </h2>

<div class="body">
    <div class="card">
        <div class="input-container">
            <div class=radio>
            <label for="customer">Product Name:</label>
            <input type="radio" id="pilihan1" name="pilihan" value="pilihan1">StarPark
            {{-- <label for="pilihan1">StarPark</label><br> --}}
            <input type="radio" id="pilihan2" name="pilihan" value="pilihan2">AdStar
            {{-- <label for="pilihan2">AdStar</label><br> --}}
            </div>
        </div>
        <div class="input-container">
            <label for="customer">Design For:</label>
            <input type="text" id="customer" required>
            <input type="text" id="input1" placeholder="">
            <button type="button">...</button>
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

@endsection
