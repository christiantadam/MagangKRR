@extends('layouts.appAdStar')
@section('content')

<h2>Form Copy Tabel </h2>

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
            <div class=checkbox>
            <label for="customer">Model:</label>
            <input type="checkbox" id="opsi1" name="opsi" value="opsi1">Top Open
            <input type="checkbox" id="opsi2" name="opsi" value="opsi2">Top Close
            </div>
        </div>
        <div class="input-container">
            <label for="customer">Design For:</label>
            <input type="text" id="customer" required>
            <input type="text" id="input1" placeholder="">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="nama-barang">Product Type:</label>
            <input type="text" id="nama-barang" required>
            <input type="text" id="input2">
            <button type="button">List Type</button>
        </div>
        <h1>Copy To</h1>
        <div class="input-container">
            <label for="no-pesanan">Design For:</label>
            <input type="text" id="no-pesanan" required>
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="surat-pesanan">Product Type:</label>
            <input type="text" id="surat-pesanan" required>
        </div>
    <div class="button-container">
        <button class="update">Copy</button>
    </div>

@endsection
