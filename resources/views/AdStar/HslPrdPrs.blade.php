
@extends('layouts.appAdStar')
@section('content')

<h2>Maint Hasil Produksi</h2>

<div class="body">
    <div class="card">
        {{-- <h3 class="card-title">Sales</h3> --}}
        <div class="input-container">
            <label for="tgl-produksi">Tanggal Produksi:</label>
            <input type="date" id="tgl-produksi" required>
        </div>
        <div class="input-container">
            <label for="no-transaksi">No. Transaksi:</label>
            <input type="text" id="no-transaksi" required>
            <button type="button">List Data</button>
        </div>
        <div class="input-container">
            <label>No. Order Kerja:</label>
            <input type="text" name="noOrderKerja" placeholder="No. Order Kerja">
            <button type="button">...</button>
            <input type="text" name="inputNoOrderKerja" placeholder="Input No. Order Kerja">
        </div>
        <div class="input-container">
            <label>Mesin Produksi:</label>
            <input type="text" name="mesinProduksi" placeholder="Mesin Produksi">
            <input type="text" name="kotaMesinProduksi" placeholder="Mesin Produksi">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="grup-pelaksana-dropdown">grup pelaksana:</label>
            <select id="grup-pelaksana-dropdown" required>
                <option value="1">grup 1</option>
                <option value="2">grup 2</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="input-container">
            <label>Jam Mulai:</label>
            <input type="time" name="jamMulai">
        </div>
        <div class="input-container">
            <label>Jam Akhir:</label>
            <input type="time" name="jamAkhir">
        </div>
        <div class="input-container">
            <label for="jml-ball">Jumlah Ball:</label>
            <input type="number" id="jml-ball" required>
        </div>
        <div class="input-container">
            <label for="jml-lembar">Jumlah Lembar:</label>
            <input type="number" id="jml-lembar" required>
        </div>
        <div class="input-container">
            <label for="jml-kg">Jumlah Kg:</label>
            <input type="number" id="jml-kg" required>
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
