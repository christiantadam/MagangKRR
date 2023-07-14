@extends('layouts.appAdStar')
@section('content')

<h2>Maintenance Order Press</h2>

<div class="body">
    <div class="card">
        <h3 class="card-title">Sales</h3>
        <div class="input-container">
            <label for="customer">Customer:</label>
            <input type="text" id="customer" required>
            <input type="text" id="input1" placeholder="Mesin Produksi">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="nama-barang">Nama Barang:</label>
            <input type="text" id="nama-barang" required>
            <input type="text" id="input2">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="no-pesanan">No. Pesanan:</label>
            <input type="text" id="no-pesanan" required>
        </div>
        <div class="input-container">
            <label for="surat-pesanan">Surat Pesanan:</label>
            <input type="text" id="surat-pesanan" required>
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="jumlah-order">Jumlah Order:</label>
            <input type="number" id="jumlah-order" required>
        </div>
        <div class="input-container">
            <label for="jumlah-press">Jumlah Press:</label>
            <input type="number" id="jumlah-press" required>
        </div>
    </div>

    <div class="card">
        <h3 class="card-title">AdStar</h3>
        <div class="input-container">
            <label for="no-order-kerja">No. Order Kerja:</label>
            <input type="text" id="no-order-kerja" required>
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="tgl-order">Tanggal Order:</label>
            <input type="date" id="tgl-order" required>
        </div>
        <div class="input-container">
            <label for="stock-order-sebelumnya">Stock Order Sebelumnya:</label>
            <input type="text" id="stock-order-sebelumnya" required>
            <input type="text" id="input3">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="sisa-stock">Sisa Stock:</label>
            <input type="text" id="sisa-stock" required>
        </div>
        <div class="input-container">
            <label for="hasil">Hasil:</label>
            <input type="text" id="hasil" required>
        </div>
        <div class="input-container">
            <label for="tgl-dikerjakan">Tanggal Dikerjakan:</label>
            <input type="date" id="tgl-dikerjakan" required>
        </div>
        <div class="input-container">
            <label for="tgl-finish">Tanggal Finish:</label>
            <input type="date" id="tgl-finish" required>
        </div>
    </div>

    <div class="button-container">
        <button class="add">Add</button>
        <button class="update">Update</button>
        <button class="del">Delete</button>
    </div>

    <div class="scrollable-container">
        <!-- Add content here -->
    </div>
</div>

@endsection
